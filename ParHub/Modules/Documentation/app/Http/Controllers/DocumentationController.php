<?php

namespace Modules\Documentation\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Documentation\Models\Document;
use Illuminate\Http\Request;

class DocumentationController extends Controller
{
    /**
     * Display a listing of user's documents.
     */
    public function index()
    {
        $documents = Document::where('user_id', auth()->id())
            ->latest()
            ->paginate(12);

        return view('documentation::index', compact('documents'));
    }

    /**
     * Display the specified document and its presentation.
     */
    public function show(Document $document)
    {
        // Ensure user owns the document
        if ($document->user_id !== auth()->id()) {
            abort(403);
        }

        $slides = $document->slides()->orderBy('slide_number')->get();

        return view('documentation::show', compact('document', 'slides'));
    }

    /**
     * Remove the specified document.
     */
    public function destroy(Document $document)
    {
        // Ensure user owns the document
        if ($document->user_id !== auth()->id()) {
            abort(403);
        }

        // Delete the file
        if ($document->file_path && \Storage::disk('public')->exists($document->file_path)) {
            \Storage::disk('public')->delete($document->file_path);
        }

        $document->delete();

        return redirect()->route('documentation.index')
            ->with('success', 'Document deleted successfully.');
    }
}
