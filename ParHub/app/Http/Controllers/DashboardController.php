<?php

namespace App\Http\Controllers;

use App\Models\Presentation;
use App\Models\Template;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        // Basic Stats
        $stats = [
            'presentations' => [
                'total' => Presentation::byUser($user->id)->count(),
                'published' => Presentation::byUser($user->id)->published()->count(),
                'drafts' => Presentation::byUser($user->id)->where('status', 'draft')->count(),
                'totalViews' => Presentation::byUser($user->id)->sum('views'),
            ],
            'templates' => [
                'total' => Template::active()->count(),
                'free' => Template::free()->count(),
                'premium' => Template::premium()->count(),
                'totalDownloads' => Template::sum('downloads'),
            ],
            'categories' => [
                'total' => Category::active()->count(),
                'withTemplates' => Category::has('templates')->count(),
            ],
            'reviews' => [
                'total' => Review::approved()->count(),
                'averageRating' => Review::approved()->avg('rating'),
            ]
        ];

        // Recent Activity
        $recentPresentations = Presentation::byUser($user->id)
            ->with('template')
            ->latest()
            ->take(5)
            ->get();

        $popularTemplates = Template::with('category')
            ->active()
            ->popular()
            ->take(6)
            ->get();

        // Chart Data - Presentations per month
        $presentationsChart = Presentation::byUser($user->id)
            ->select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('YEAR(created_at) as year'),
                DB::raw('COUNT(*) as count')
            )
            ->where('created_at', '>=', Carbon::now()->subMonths(6))
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get()
            ->map(function ($item) {
                $item->month_name = Carbon::createFromDate($item->year, $item->month, 1)->format('M Y');
                return $item;
            });

        // Views per day for last 7 days
        $viewsChart = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $views = Presentation::byUser($user->id)
                ->whereDate('updated_at', $date)
                ->sum('views');
            
            $viewsChart[] = [
                'date' => $date->format('M j'),
                'views' => $views
            ];
        }

        // Category Distribution
        $categoryStats = Category::withCount(['templates as template_count'])
            ->active()
            ->having('template_count', '>', 0)
            ->orderBy('template_count', 'desc')
            ->take(5)
            ->get();

        // Recent Reviews
        $recentReviews = Review::with(['user', 'template'])
            ->approved()
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard-advanced', compact(
            'stats',
            'recentPresentations',
            'popularTemplates',
            'presentationsChart',
            'viewsChart',
            'categoryStats',
            'recentReviews'
        ));
    }

    public function analytics()
    {
        $user = auth()->user();

        // Advanced Analytics Data
        $analytics = [
            'presentations' => [
                'totalViews' => Presentation::byUser($user->id)->sum('views'),
                'averageViews' => Presentation::byUser($user->id)->avg('views'),
                'mostViewed' => Presentation::byUser($user->id)->orderBy('views', 'desc')->first(),
                'leastViewed' => Presentation::byUser($user->id)->orderBy('views', 'asc')->first(),
            ],
            'growth' => [
                'thisMonth' => Presentation::byUser($user->id)->whereMonth('created_at', Carbon::now()->month)->count(),
                'lastMonth' => Presentation::byUser($user->id)->whereMonth('created_at', Carbon::now()->subMonth()->month)->count(),
                'thisYear' => Presentation::byUser($user->id)->whereYear('created_at', Carbon::now()->year)->count(),
                'lastYear' => Presentation::byUser($user->id)->whereYear('created_at', Carbon::now()->subYear()->year)->count(),
            ]
        ];

        // Calculate growth percentages
        $analytics['growth']['monthlyGrowth'] = $analytics['growth']['lastMonth'] > 0 
            ? (($analytics['growth']['thisMonth'] - $analytics['growth']['lastMonth']) / $analytics['growth']['lastMonth']) * 100
            : 0;

        $analytics['growth']['yearlyGrowth'] = $analytics['growth']['lastYear'] > 0 
            ? (($analytics['growth']['thisYear'] - $analytics['growth']['lastYear']) / $analytics['growth']['lastYear']) * 100
            : 0;

        // Template Usage
        $templateUsage = Template::withCount(['presentations as usage_count' => function($query) use ($user) {
                $query->where('user_id', $user->id);
            }])
            ->having('usage_count', '>', 0)
            ->orderBy('usage_count', 'desc')
            ->take(10)
            ->get();

        // Daily Activity for last 30 days
        $dailyActivity = [];
        for ($i = 29; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $count = Presentation::byUser($user->id)
                ->whereDate('created_at', $date)
                ->count();
            
            $dailyActivity[] = [
                'date' => $date->format('Y-m-d'),
                'count' => $count
            ];
        }

        return view('analytics.index', compact('analytics', 'templateUsage', 'dailyActivity'));
    }

    public function quickStats()
    {
        $user = auth()->user();
        
        return response()->json([
            'presentations' => Presentation::byUser($user->id)->count(),
            'views' => Presentation::byUser($user->id)->sum('views'),
            'published' => Presentation::byUser($user->id)->published()->count(),
            'drafts' => Presentation::byUser($user->id)->where('status', 'draft')->count(),
        ]);
    }
}
