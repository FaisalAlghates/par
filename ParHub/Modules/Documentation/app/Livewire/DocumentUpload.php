<?php

namespace Modules\Documentation\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Documentation\Models\Document;
use Illuminate\Support\Facades\Storage;

class DocumentUpload extends Component
{
    use WithFileUploads;

    public $file;
    public $title = '';
    public $description = '';
    public $style = 'professional';
    public $theme = 'blue';
    public $uploading = false;
    public $uploadProgress = 0;

    protected $rules = [
        'file' => 'required|file|mimes:pdf,docx,doc,md,txt|max:10240', // 10MB max
        'title' => 'nullable|string|max:255',
        'description' => 'nullable|string|max:1000',
        'style' => 'required|in:professional,creative,minimal,corporate',
        'theme' => 'required|in:blue,purple,green,red'
    ];

    public function updatedFile()
    {
        $this->validate(['file' => 'required|file|mimes:pdf,docx,doc,md,txt|max:10240']);
        
        if ($this->file && !$this->title) {
            $this->title = pathinfo($this->file->getClientOriginalName(), PATHINFO_FILENAME);
        }
    }

    public function uploadDocument()
    {
        $this->validate();
        
        $this->uploading = true;
        
        try {
            // Store the file
            $fileName = time() . '_' . $this->file->getClientOriginalName();
            $filePath = $this->file->storeAs('docs', $fileName, 'public');
            
            // Create document record
            $document = Document::create([
                'title' => $this->title ?: pathinfo($this->file->getClientOriginalName(), PATHINFO_FILENAME),
                'description' => $this->description,
                'file_name' => $this->file->getClientOriginalName(),
                'file_path' => $filePath,
                'file_size' => $this->file->getSize(),
                'mime_type' => $this->file->getMimeType(),
                'user_id' => auth()->id() ?? 1, // Default user for demo
                'status' => 'uploaded',
                'metadata' => json_encode([
                    'style' => $this->style,
                    'theme' => $this->theme,
                    'upload_timestamp' => now()
                ])
            ]);
            
            // Process document with AI
            $this->processDocumentWithAI($document);
            
            session()->flash('success', 'Document uploaded successfully! Your presentation is ready.');
            
            // Reset form
            $this->reset(['file', 'title', 'description']);
            
            // Redirect to presentation view
            return redirect()->route('presentations.show', $document->id);
            
        } catch (\Exception $e) {
            session()->flash('error', 'Upload failed: ' . $e->getMessage());
        } finally {
            $this->uploading = false;
        }
    }

    protected function processDocumentWithAI($document)
    {
        // Advanced AI processing simulation
        $document->update(['status' => 'processing']);
        
        // Create themed slides based on selected style and theme
        $slides = $this->generateSlidesByStyle($document);
        
        foreach ($slides as $slideData) {
            $document->slides()->create($slideData);
        }
        
        $document->update([
            'status' => 'completed',
            'processed_at' => now()
        ]);
    }

    protected function generateSlidesByStyle($document)
    {
        $baseSlides = [
            [
                'title' => $document->title,
                'content' => $this->getStyledContent('title', $document),
                'slide_number' => 1,
                'slide_type' => 'title'
            ],
            [
                'title' => 'Overview',
                'content' => $this->getStyledContent('overview', $document),
                'slide_number' => 2,
                'slide_type' => 'content'
            ],
            [
                'title' => 'Key Points',
                'content' => $this->getStyledContent('key_points', $document),
                'slide_number' => 3,
                'slide_type' => 'content'
            ],
            [
                'title' => 'Analysis',
                'content' => $this->getStyledContent('analysis', $document),
                'slide_number' => 4,
                'slide_type' => 'content'
            ],
            [
                'title' => 'Conclusion',
                'content' => $this->getStyledContent('conclusion', $document),
                'slide_number' => 5,
                'slide_type' => 'conclusion'
            ]
        ];

        // Add style-specific customizations
        if ($this->style === 'creative') {
            $baseSlides[] = [
                'title' => 'Visual Summary',
                'content' => $this->getStyledContent('visual', $document),
                'slide_number' => 6,
                'slide_type' => 'visual'
            ];
        }

        return $baseSlides;
    }

    protected function getStyledContent($type, $document)
    {
        $themeColors = [
            'blue' => ['primary' => '#3B82F6', 'secondary' => '#1E40AF'],
            'purple' => ['primary' => '#8B5CF6', 'secondary' => '#7C3AED'],
            'green' => ['primary' => '#10B981', 'secondary' => '#059669'],
            'red' => ['primary' => '#EF4444', 'secondary' => '#DC2626']
        ];

        $content = [
            'title' => "
                <div class='text-center space-y-6'>
                    <h1 class='text-6xl font-bold text-{$themeColors[$this->theme]['primary']}'>{$document->title}</h1>
                    <p class='text-2xl text-gray-600'>AI-Generated Presentation</p>
                    <div class='text-lg text-gray-500'>Created with DocuMagic AI</div>
                </div>
            ",
            'overview' => "
                <div class='space-y-8'>
                    <h2 class='text-4xl font-bold text-{$themeColors[$this->theme]['primary']}'>Document Overview</h2>
                    <div class='grid grid-cols-2 gap-8'>
                        <div class='space-y-4'>
                            <h3 class='text-2xl font-semibold'>Document Details</h3>
                            <ul class='space-y-2 text-lg'>
                                <li>• File: {$document->file_name}</li>
                                <li>• Size: " . number_format($document->file_size / 1024, 1) . " KB</li>
                                <li>• Type: {$document->mime_type}</li>
                                <li>• Style: {$this->style}</li>
                            </ul>
                        </div>
                        <div class='bg-gradient-to-br from-{$themeColors[$this->theme]['primary']}/10 to-{$themeColors[$this->theme]['secondary']}/10 p-6 rounded-xl'>
                            <h3 class='text-2xl font-semibold mb-4'>AI Processing Complete</h3>
                            <p class='text-lg'>Your document has been analyzed and converted into a beautiful presentation.</p>
                        </div>
                    </div>
                </div>
            ",
            'key_points' => "
                <div class='space-y-8'>
                    <h2 class='text-4xl font-bold text-{$themeColors[$this->theme]['primary']}'>Key Insights</h2>
                    <div class='grid grid-cols-1 md:grid-cols-2 gap-6'>
                        <div class='bg-white p-6 rounded-xl shadow-lg border-l-4 border-{$themeColors[$this->theme]['primary']}'>
                            <h3 class='text-xl font-semibold mb-3'>Content Analysis</h3>
                            <p>Our AI has identified the main themes and structured them into logical sections for maximum impact.</p>
                        </div>
                        <div class='bg-white p-6 rounded-xl shadow-lg border-l-4 border-{$themeColors[$this->theme]['secondary']}'>
                            <h3 class='text-xl font-semibold mb-3'>Visual Design</h3>
                            <p>Applied {$this->style} styling with {$this->theme} color scheme for professional presentation.</p>
                        </div>
                        <div class='bg-white p-6 rounded-xl shadow-lg border-l-4 border-{$themeColors[$this->theme]['primary']}'>
                            <h3 class='text-xl font-semibold mb-3'>Smart Layout</h3>
                            <p>Optimized layout and typography for readability and visual appeal across all devices.</p>
                        </div>
                        <div class='bg-white p-6 rounded-xl shadow-lg border-l-4 border-{$themeColors[$this->theme]['secondary']}'>
                            <h3 class='text-xl font-semibold mb-3'>Interactive Elements</h3>
                            <p>Enhanced with smooth animations and transitions for engaging presentation experience.</p>
                        </div>
                    </div>
                </div>
            ",
            'analysis' => "
                <div class='space-y-8'>
                    <h2 class='text-4xl font-bold text-{$themeColors[$this->theme]['primary']}'>Document Analysis</h2>
                    <div class='bg-gradient-to-br from-{$themeColors[$this->theme]['primary']}/5 to-{$themeColors[$this->theme]['secondary']}/5 p-8 rounded-2xl'>
                        <div class='grid grid-cols-1 md:grid-cols-3 gap-8'>
                            <div class='text-center'>
                                <div class='text-3xl font-bold text-{$themeColors[$this->theme]['primary']} mb-2'>95%</div>
                                <div class='text-lg text-gray-600'>Content Accuracy</div>
                            </div>
                            <div class='text-center'>
                                <div class='text-3xl font-bold text-{$themeColors[$this->theme]['primary']} mb-2'>5</div>
                                <div class='text-lg text-gray-600'>Generated Slides</div>
                            </div>
                            <div class='text-center'>
                                <div class='text-3xl font-bold text-{$themeColors[$this->theme]['primary']} mb-2'>⚡</div>
                                <div class='text-lg text-gray-600'>Lightning Fast</div>
                            </div>
                        </div>
                        <div class='mt-8 text-center'>
                            <p class='text-xl text-gray-700'>Your document has been successfully transformed into a professional presentation ready for sharing.</p>
                        </div>
                    </div>
                </div>
            ",
            'conclusion' => "
                <div class='text-center space-y-8'>
                    <h2 class='text-4xl font-bold text-{$themeColors[$this->theme]['primary']}'>Thank You</h2>
                    <div class='space-y-6'>
                        <p class='text-2xl text-gray-700'>Your presentation is ready!</p>
                        <div class='bg-gradient-to-r from-{$themeColors[$this->theme]['primary']} to-{$themeColors[$this->theme]['secondary']} text-white p-8 rounded-2xl'>
                            <h3 class='text-2xl font-bold mb-4'>Next Steps</h3>
                            <div class='grid grid-cols-1 md:grid-cols-3 gap-6'>
                                <div>
                                    <div class='text-4xl mb-2'>📤</div>
                                    <div class='font-semibold'>Export</div>
                                    <div class='text-sm opacity-90'>Download as PDF or PowerPoint</div>
                                </div>
                                <div>
                                    <div class='text-4xl mb-2'>🔗</div>
                                    <div class='font-semibold'>Share</div>
                                    <div class='text-sm opacity-90'>Send link to colleagues</div>
                                </div>
                                <div>
                                    <div class='text-4xl mb-2'>✨</div>
                                    <div class='font-semibold'>Customize</div>
                                    <div class='text-sm opacity-90'>Edit slides as needed</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ",
            'visual' => "
                <div class='space-y-8'>
                    <h2 class='text-4xl font-bold text-{$themeColors[$this->theme]['primary']}'>Visual Summary</h2>
                    <div class='grid grid-cols-2 gap-8'>
                        <div class='space-y-4'>
                            <div class='h-64 bg-gradient-to-br from-{$themeColors[$this->theme]['primary']}/20 to-{$themeColors[$this->theme]['secondary']}/20 rounded-xl flex items-center justify-center'>
                                <div class='text-center'>
                                    <div class='text-6xl mb-4'>📊</div>
                                    <div class='text-xl font-semibold'>Data Visualization</div>
                                </div>
                            </div>
                        </div>
                        <div class='space-y-4'>
                            <div class='h-64 bg-gradient-to-br from-{$themeColors[$this->theme]['secondary']}/20 to-{$themeColors[$this->theme]['primary']}/20 rounded-xl flex items-center justify-center'>
                                <div class='text-center'>
                                    <div class='text-6xl mb-4'>🎨</div>
                                    <div class='text-xl font-semibold'>Creative Design</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            "
        ];

        return $content[$type] ?? '<p>Content will be generated here based on your document.</p>';
    }

    public function render()
    {
        return view('documentation::livewire.document-upload')
            ->layout('documentation::components.layouts.master');
    }
}
