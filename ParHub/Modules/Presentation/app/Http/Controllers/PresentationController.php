<?php

namespace Modules\Presentation\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Documentation\Models\Document;
use Modules\Documentation\Models\Slide;

class PresentationController extends Controller
{
    /**
     * Display the presentation for a document.
     */
    public function show($documentId)
    {
        $document = Document::with('slides')->findOrFail($documentId);
        
        if ($document->status !== 'completed') {
            return redirect()->route('documentation.index')
                ->with('error', 'Presentation is still being processed. Please try again in a moment.');
        }

        return view('presentation::show', compact('document'));
    }

    /**
     * Display the presentation in fullscreen mode.
     */
    public function fullscreen($documentId)
    {
        $document = Document::with('slides')->findOrFail($documentId);
        
        if ($document->status !== 'completed') {
            return redirect()->route('documentation.index')
                ->with('error', 'Presentation is still being processed. Please try again in a moment.');
        }

        return view('presentation::fullscreen', compact('document'));
    }

    /**
     * Export the presentation.
     */
    public function export($documentId, Request $request)
    {
        $document = Document::with('slides')->findOrFail($documentId);
        $format = $request->get('format', 'pdf');

        // TODO: Implement actual export functionality
        switch ($format) {
            case 'pdf':
                return $this->exportToPdf($document);
            case 'pptx':
                return $this->exportToPowerPoint($document);
            case 'html':
                return $this->exportToHtml($document);
            default:
                return redirect()->back()->with('error', 'Unsupported export format.');
        }
    }

    private function exportToPdf($document)
    {
        // Placeholder for PDF export
        return response()->json(['message' => 'PDF export feature coming soon!']);
    }

    private function exportToPowerPoint($document)
    {
        // Placeholder for PowerPoint export
        return response()->json(['message' => 'PowerPoint export feature coming soon!']);
    }

    private function exportToHtml($document)
    {
        // Placeholder for HTML export
        return response()->json(['message' => 'HTML export feature coming soon!']);
    }
}
