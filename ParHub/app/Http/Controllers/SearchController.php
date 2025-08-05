<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\Category;
use App\Models\Presentation;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->get('q', '');
        $type = $request->get('type', 'all'); // all, templates, presentations
        $category = $request->get('category', '');
        $sort = $request->get('sort', 'relevance');

        $results = collect();
        $stats = [];

        if ($query) {
            switch ($type) {
                case 'templates':
                    $results = $this->searchTemplates($query, $category, $sort);
                    $stats['templates'] = $results->count();
                    break;
                
                case 'presentations':
                    $results = $this->searchPresentations($query, $sort);
                    $stats['presentations'] = $results->count();
                    break;
                
                default:
                    $templates = $this->searchTemplates($query, $category, $sort);
                    $presentations = $this->searchPresentations($query, $sort);
                    
                    $results = collect([
                        'templates' => $templates,
                        'presentations' => $presentations
                    ]);
                    
                    $stats = [
                        'templates' => $templates->count(),
                        'presentations' => $presentations->count(),
                        'total' => $templates->count() + $presentations->count()
                    ];
                    break;
            }
        }

        $categories = Category::active()->withCount('templates')->get();

        return view('search.index', compact('results', 'stats', 'categories', 'query', 'type', 'category', 'sort'));
    }

    private function searchTemplates($query, $category = '', $sort = 'relevance')
    {
        $templates = Template::with('category')
            ->active()
            ->where(function($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                  ->orWhere('description', 'LIKE', "%{$query}%")
                  ->orWhere('tags', 'LIKE', "%{$query}%")
                  ->orWhereHas('category', function($cat) use ($query) {
                      $cat->where('name', 'LIKE', "%{$query}%");
                  });
            });

        if ($category) {
            $templates->where('category_id', $category);
        }

        switch ($sort) {
            case 'newest':
                $templates->latest();
                break;
            case 'popular':
                $templates->popular();
                break;
            case 'downloads':
                $templates->orderBy('downloads', 'desc');
                break;
            case 'rating':
                $templates->orderBy('rating', 'desc');
                break;
            default:
                // Relevance sorting - prioritize title matches
                $templates->orderByRaw("
                    CASE 
                        WHEN name LIKE '%{$query}%' THEN 1
                        WHEN description LIKE '%{$query}%' THEN 2
                        WHEN tags LIKE '%{$query}%' THEN 3
                        ELSE 4
                    END
                ");
                break;
        }

        return $templates->get();
    }

    private function searchPresentations($query, $sort = 'relevance')
    {
        $presentations = Presentation::with(['user', 'template'])
            ->byUser(auth()->id())
            ->where(function($q) use ($query) {
                $q->where('title', 'LIKE', "%{$query}%")
                  ->orWhere('description', 'LIKE', "%{$query}%")
                  ->orWhereHas('template', function($template) use ($query) {
                      $template->where('name', 'LIKE', "%{$query}%");
                  });
            });

        switch ($sort) {
            case 'newest':
                $presentations->latest();
                break;
            case 'views':
                $presentations->orderBy('views', 'desc');
                break;
            default:
                // Relevance sorting
                $presentations->orderByRaw("
                    CASE 
                        WHEN title LIKE '%{$query}%' THEN 1
                        WHEN description LIKE '%{$query}%' THEN 2
                        ELSE 3
                    END
                ");
                break;
        }

        return $presentations->get();
    }

    public function suggestions(Request $request)
    {
        $query = $request->get('q', '');
        
        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $suggestions = collect();

        // Template suggestions
        $templates = Template::active()
            ->where('name', 'LIKE', "%{$query}%")
            ->select('name as title', 'id')
            ->limit(5)
            ->get()
            ->map(function($item) {
                $item->type = 'template';
                return $item;
            });

        // Category suggestions
        $categories = Category::active()
            ->where('name', 'LIKE', "%{$query}%")
            ->select('name as title', 'id')
            ->limit(3)
            ->get()
            ->map(function($item) {
                $item->type = 'category';
                return $item;
            });

        $suggestions = $templates->concat($categories);

        return response()->json($suggestions->take(8));
    }

    public function autocomplete(Request $request)
    {
        $query = $request->get('q', '');
        
        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $results = [];

        // Popular search terms (you could store these in a database)
        $popularTerms = [
            'business presentation',
            'marketing slides',
            'pitch deck',
            'company profile',
            'product showcase',
            'financial report',
            'education template',
            'minimal design',
            'creative layout',
            'professional theme'
        ];

        foreach ($popularTerms as $term) {
            if (stripos($term, $query) !== false) {
                $results[] = [
                    'title' => $term,
                    'type' => 'suggestion'
                ];
            }
        }

        return response()->json(array_slice($results, 0, 5));
    }
}
