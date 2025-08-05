<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('templates')
            ->active()
            ->ordered()
            ->get();

        $stats = [
            'total' => Category::count(),
            'active' => Category::active()->count(),
            'totalTemplates' => Category::withCount('templates')->get()->sum('templates_count')
        ];

        return view('categories.index', compact('categories', 'stats'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'description' => 'nullable|string',
            'color' => 'nullable|string|max:7',
            'icon' => 'nullable|string|max:100',
            'is_active' => 'boolean'
        ]);

        $category = Category::create($validated);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'category' => $category,
                'message' => 'Category created successfully'
            ]);
        }

        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully');
    }

    public function show(Category $category)
    {
        $category->load(['templates' => function($query) {
            $query->active()->latest()->take(12);
        }]);

        $stats = [
            'templates' => $category->templates()->count(),
            'activeTemplates' => $category->templates()->active()->count(),
            'totalDownloads' => $category->templates()->sum('downloads')
        ];

        return view('categories.show', compact('category', 'stats'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'description' => 'nullable|string',
            'color' => 'nullable|string|max:7',
            'icon' => 'nullable|string|max:100',
            'is_active' => 'boolean'
        ]);

        $category->update($validated);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'category' => $category,
                'message' => 'Category updated successfully'
            ]);
        }

        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        // Check if category has templates
        if ($category->templates()->count() > 0) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot delete category with templates'
            ], 422);
        }

        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Category deleted successfully'
        ]);
    }

    // API Methods
    public function apiIndex()
    {
        $categories = Category::active()
            ->withCount('templates')
            ->ordered()
            ->get();

        return response()->json([
            'success' => true,
            'categories' => $categories
        ]);
    }

    public function apiShow(Category $category)
    {
        $category->load(['templates' => function($query) {
            $query->active()->latest();
        }]);

        return response()->json([
            'success' => true,
            'category' => $category
        ]);
    }
}
