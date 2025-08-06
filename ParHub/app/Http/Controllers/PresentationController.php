<?php

namespace App\Http\Controllers;

use App\Models\Presentation;
use App\Models\Template;
use Illuminate\Http\Request;

class PresentationController extends Controller
{
    public function index()
    {
        $presentations = Presentation::with(['user', 'template'])
            ->byUser(auth()->id())
            ->latest()
            ->paginate(12);

        $stats = [
            'total' => Presentation::byUser(auth()->id())->count(),
            'published' => Presentation::byUser(auth()->id())->published()->count(),
            'drafts' => Presentation::byUser(auth()->id())->where('status', 'draft')->count(),
            'totalViews' => Presentation::byUser(auth()->id())->sum('views')
        ];

        return view('presentations.index', compact('presentations', 'stats'));
    }

    public function create()
    {
        $popularTemplates = Template::with('category')
            ->active()
            ->popular()
            ->take(4)
            ->get();

        // If no templates exist, create some sample ones for demonstration
        if ($popularTemplates->isEmpty()) {
            $popularTemplates = collect([
                (object) [
                    'id' => 0,
                    'name' => 'Business Presentation',
                    'category' => (object) [
                        'name' => 'Business',
                        'color' => '#3b82f6',
                        'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'
                    ],
                    'rating' => 4.5,
                    'downloads' => 1250,
                    'is_premium' => false
                ],
                (object) [
                    'id' => 0,
                    'name' => 'Creative Portfolio',
                    'category' => (object) [
                        'name' => 'Creative',
                        'color' => '#8b5cf6',
                        'icon' => 'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z'
                    ],
                    'rating' => 4.8,
                    'downloads' => 890,
                    'is_premium' => true
                ],
                (object) [
                    'id' => 0,
                    'name' => 'Educational',
                    'category' => (object) [
                        'name' => 'Education',
                        'color' => '#10b981',
                        'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'
                    ],
                    'rating' => 4.3,
                    'downloads' => 567,
                    'is_premium' => false
                ],
                (object) [
                    'id' => 0,
                    'name' => 'Minimalist',
                    'category' => (object) [
                        'name' => 'Minimal',
                        'color' => '#6b7280',
                        'icon' => 'M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z'
                    ],
                    'rating' => 4.6,
                    'downloads' => 723,
                    'is_premium' => false
                ]
            ]);
        }

        return view('presentations.create', compact('popularTemplates'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'template_id' => 'nullable|exists:templates,id'
        ]);

        $presentation = Presentation::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'user_id' => auth()->id(),
            'template_id' => $validated['template_id'],
            'status' => 'draft'
        ]);

        // إذا كان هناك قالب، نسخ layout منه
        if ($validated['template_id']) {
            $template = Template::find($validated['template_id']);
            if ($template && $template->layout) {
                $presentation->slides = $template->layout;
                $presentation->save();
            }
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'presentation' => $presentation,
                'message' => 'تم إنشاء العرض التقديمي بنجاح'
            ]);
        }

        return redirect()->route('presentations.show', $presentation)
            ->with('success', 'تم إنشاء العرض التقديمي بنجاح');
    }

    public function show(Presentation $presentation)
    {
        // التحقق من الصلاحيات
        if ($presentation->user_id !== auth()->id() && $presentation->status !== 'published') {
            abort(403);
        }

        // زيادة عدد المشاهدات
        $presentation->increment('views');

        return view('presentations.show', compact('presentation'));
    }

    public function edit(Presentation $presentation)
    {
        // التأكد من أن المستخدم يملك العرض التقديمي
        if ($presentation->user_id !== auth()->id()) {
            abort(403);
        }

        return view('presentations.edit', compact('presentation'));
    }

    public function update(Request $request, Presentation $presentation)
    {
        // التأكد من أن المستخدم يملك العرض التقديمي
        if ($presentation->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|nullable|string',
            'slides' => 'sometimes|json',
            'status' => 'sometimes|in:draft,published,archived'
        ]);

        $presentation->update($validated);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'presentation' => $presentation,
                'message' => 'تم حفظ التغييرات بنجاح'
            ]);
        }

        return redirect()->route('presentations.edit', $presentation)
            ->with('success', 'تم حفظ التغييرات بنجاح');
    }

    public function destroy(Presentation $presentation)
    {
        // التحقق من الصلاحيات
        if ($presentation->user_id !== auth()->id()) {
            abort(403);
        }

        $presentation->delete();

        return redirect()->route('presentations.index')
            ->with('success', 'Presentation deleted successfully!');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,docx,pptx|max:20480', // Max 20MB
            'title' => 'required|string|max:255'
        ]);

        $file = $request->file('file');
        $title = $request->input('title');
        
        // Store the uploaded file
        $filePath = $file->store('uploads/presentations', 'public');
        
        // Create presentation record
        $presentation = Presentation::create([
            'title' => $title,
            'description' => 'Imported from ' . $file->getClientOriginalName(),
            'user_id' => auth()->id(),
            'status' => 'draft',
            'original_file' => $filePath,
            'file_type' => $file->getClientOriginalExtension()
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'presentation' => $presentation,
                'message' => 'File uploaded and presentation created successfully'
            ]);
        }

        return redirect()->route('presentations.edit', $presentation)
            ->with('success', 'File uploaded and presentation created successfully');
    }

    public function createFromAI(Request $request)
    {
        try {
            // Validate the incoming AI presentation data
            $request->validate([
                'title' => 'required|string|max:255',
                'type' => 'required|string',
                'theme' => 'required|string',
                'slides' => 'required|array',
                'slides.*.title' => 'required|string',
                'slides.*.content' => 'required|string',
                'slides.*.type' => 'required|string',
                'slideCount' => 'required|integer|min:1|max:50',
                'estimatedDuration' => 'required|integer|min:1'
            ]);

            // Create the presentation record
            $presentation = Presentation::create([
                'title' => $request->input('title'),
                'description' => "AI-generated {$request->input('type')} presentation with {$request->input('slideCount')} slides",
                'user_id' => auth()->id(),
                'status' => 'draft',
                'file_type' => 'ai_generated',
                'ai_metadata' => json_encode([
                    'presentation_type' => $request->input('type'),
                    'theme' => $request->input('theme'),
                    'slide_count' => $request->input('slideCount'),
                    'estimated_duration' => $request->input('estimatedDuration'),
                    'created_by_ai' => true,
                    'generation_timestamp' => now()->toISOString(),
                    'slides_structure' => $request->input('slides')
                ])
            ]);

            // Create individual slide records (if you have a slides table)
            foreach ($request->input('slides') as $index => $slideData) {
                // You can create a Slide model and table for this if needed
                // For now, we'll store slide data in the ai_metadata
            }

            // Log the AI presentation creation
            \Log::info('AI Presentation Created', [
                'user_id' => auth()->id(),
                'presentation_id' => $presentation->id,
                'title' => $presentation->title,
                'type' => $request->input('type'),
                'slide_count' => $request->input('slideCount')
            ]);

            return response()->json([
                'success' => true,
                'presentation_id' => $presentation->id,
                'presentation_url' => route('presentations.show', $presentation),
                'edit_url' => route('presentations.edit', $presentation),
                'message' => 'AI presentation created successfully!'
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors(),
                'message' => 'Validation failed. Please check your input data.'
            ], 422);

        } catch (\Exception $e) {
            \Log::error('AI Presentation Creation Failed', [
                'user_id' => auth()->id(),
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to create AI presentation. Please try again.'
            ], 500);
        }
    }

    public function duplicate(Presentation $presentation)
    {
        // التحقق من الصلاحيات
        if ($presentation->user_id !== auth()->id()) {
            abort(403);
        }

        $newPresentation = $presentation->replicate();
        $newPresentation->title = $presentation->title . ' (Copy)';
        $newPresentation->status = 'draft';
        $newPresentation->views = 0;
        $newPresentation->save();

        return redirect()->route('presentations.edit', $newPresentation)
            ->with('success', 'Presentation duplicated successfully!');
    }
}
