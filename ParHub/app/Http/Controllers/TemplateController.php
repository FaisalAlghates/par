<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\Category;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index(Request $request)
    {
        $query = Template::with('category');

        // Filter by category
        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        // Filter by type
        if ($request->type) {
            $query->where('type', $request->type);
        }

        // Search
        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%')
                  ->orWhere('tags', 'like', '%' . $request->search . '%');
            });
        }

        // Sorting
        switch ($request->sort) {
            case 'popular':
                $query->popular();
                break;
            case 'newest':
                $query->latest();
                break;
            case 'downloads':
                $query->orderBy('downloads', 'desc');
                break;
            case 'rating':
                $query->orderBy('rating', 'desc');
                break;
            default:
                $query->latest();
        }

        $templates = $query->active()->paginate(12);
        $categories = Category::active()->withCount('templates')->get();

        $stats = [
            'total' => Template::active()->count(),
            'free' => Template::free()->count(),
            'premium' => Template::premium()->count(),
            'totalDownloads' => Template::sum('downloads')
        ];

        return view('templates.index', compact('templates', 'categories', 'stats'));
    }

    public function create()
    {
        $categories = Category::active()->ordered()->get();
        return view('templates.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'type' => 'required|in:free,premium',
            'price' => 'nullable|numeric|min:0',
            'layout' => 'required|json',
            'styles' => 'required|json',
            'preview_image' => 'nullable|image|max:2048',
            'tags' => 'nullable|string',
            'is_active' => 'boolean'
        ]);

        // Handle file upload
        if ($request->hasFile('preview_image')) {
            $validated['preview_image'] = $request->file('preview_image')
                ->store('templates/previews', 'public');
        }

        $template = Template::create($validated);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'template' => $template->load('category'),
                'message' => 'Template created successfully'
            ]);
        }

        return redirect()->route('templates.index')
            ->with('success', 'Template created successfully');
    }

    public function show(Template $template)
    {
        $template->load('category');
        
        // Related templates
        $relatedTemplates = Template::where('category_id', $template->category_id)
            ->where('id', '!=', $template->id)
            ->active()
            ->take(4)
            ->get();

        $stats = [
            'downloads' => $template->downloads,
            'rating' => $template->rating,
            'category' => $template->category->name
        ];

        return view('templates.show', compact('template', 'relatedTemplates', 'stats'));
    }

    public function edit(Template $template)
    {
        $categories = Category::active()->ordered()->get();
        return view('templates.edit', compact('template', 'categories'));
    }

    public function update(Request $request, Template $template)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'type' => 'required|in:free,premium',
            'price' => 'nullable|numeric|min:0',
            'layout' => 'required|json',
            'styles' => 'required|json',
            'preview_image' => 'nullable|image|max:2048',
            'tags' => 'nullable|string',
            'is_active' => 'boolean'
        ]);

        // Handle file upload
        if ($request->hasFile('preview_image')) {
            $validated['preview_image'] = $request->file('preview_image')
                ->store('templates/previews', 'public');
        }

        $template->update($validated);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'template' => $template->load('category'),
                'message' => 'Template updated successfully'
            ]);
        }

        return redirect()->route('templates.index')
            ->with('success', 'Template updated successfully');
    }

    public function destroy(Template $template)
    {
        // Check if template is used in presentations
        if ($template->presentations()->count() > 0) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot delete template that is used in presentations'
            ], 422);
        }

        $template->delete();

        return response()->json([
            'success' => true,
            'message' => 'Template deleted successfully'
        ]);
    }

    // Download template
    public function download(Template $template)
    {
        // Increment download count
        $template->increment('downloads');

        // Return template data for download
        return response()->json([
            'success' => true,
            'template' => [
                'name' => $template->name,
                'layout' => $template->layout,
                'styles' => $template->styles
            ]
        ]);
    }

    // Preview template
    public function preview(Template $template)
    {
        return view('templates.preview', compact('template'));
    }

    // API Methods
    public function apiIndex(Request $request)
    {
        $query = Template::with('category');

        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->type) {
            $query->where('type', $request->type);
        }

        if ($request->popular) {
            $query->popular();
        }

        $templates = $query->active()->get();

        return response()->json([
            'success' => true,
            'templates' => $templates
        ]);
    }

    public function apiShow(Template $template)
    {
        $template->load('category');

        return response()->json([
            'success' => true,
            'template' => $template
        ]);
    }
}
