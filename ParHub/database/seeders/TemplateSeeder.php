<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Category;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all()->keyBy('slug');

        $templates = [
            // Business Templates
            [
                'name' => 'Business Pitch Deck',
                'description' => 'Professional pitch deck template for startups and business presentations',
                'category_id' => $categories['business']->id,
                'thumbnail' => '/images/templates/business-pitch.jpg',
                'layout' => json_encode([
                    'slides' => [
                        ['type' => 'title', 'title' => 'Company Overview'],
                        ['type' => 'content', 'title' => 'Problem Statement'],
                        ['type' => 'content', 'title' => 'Solution'],
                        ['type' => 'content', 'title' => 'Market Opportunity'],
                        ['type' => 'content', 'title' => 'Business Model'],
                        ['type' => 'content', 'title' => 'Financial Projections'],
                        ['type' => 'content', 'title' => 'Team'],
                        ['type' => 'content', 'title' => 'Investment Ask']
                    ]
                ]),
                'styles' => json_encode(['primary' => '#6366f1', 'secondary' => '#8b5cf6']),
                'is_premium' => false,
                'price' => 0,
                'rating' => 4.8,
                'downloads' => 1250,
                'is_active' => true
            ],
            [
                'name' => 'Corporate Report',
                'description' => 'Elegant template for annual reports and corporate presentations',
                'category_id' => $categories['business']->id,
                'thumbnail' => '/images/templates/corporate-report.jpg',
                'preview_images' => json_encode([
                    '/images/templates/corporate-report-1.jpg',
                    '/images/templates/corporate-report-2.jpg'
                ]),
                'layout' => json_encode([
                    'slides' => [
                        ['type' => 'title', 'title' => 'Annual Report 2024'],
                        ['type' => 'content', 'title' => 'Executive Summary'],
                        ['type' => 'chart', 'title' => 'Financial Performance'],
                        ['type' => 'content', 'title' => 'Key Achievements'],
                        ['type' => 'content', 'title' => 'Future Outlook']
                    ]
                ]),
                'color_scheme' => json_encode(['primary' => '#1e40af', 'secondary' => '#3b82f6']),
                'is_premium' => true,
                'price' => 19.99,
                'rating' => 4.9,
                'downloads' => 890,
                'is_active' => true
            ],

            // Creative Templates
            [
                'name' => 'Creative Portfolio',
                'description' => 'Stunning portfolio template for designers and creative professionals',
                'category_id' => $categories['creative']->id,
                'thumbnail' => '/images/templates/creative-portfolio.jpg',
                'preview_images' => json_encode([
                    '/images/templates/creative-portfolio-1.jpg',
                    '/images/templates/creative-portfolio-2.jpg',
                    '/images/templates/creative-portfolio-3.jpg'
                ]),
                'layout' => json_encode([
                    'slides' => [
                        ['type' => 'title', 'title' => 'Creative Portfolio'],
                        ['type' => 'about', 'title' => 'About Me'],
                        ['type' => 'gallery', 'title' => 'Featured Work'],
                        ['type' => 'gallery', 'title' => 'Recent Projects'],
                        ['type' => 'contact', 'title' => 'Get In Touch']
                    ]
                ]),
                'color_scheme' => json_encode(['primary' => '#ec4899', 'secondary' => '#f43f5e']),
                'is_premium' => false,
                'price' => 0,
                'rating' => 4.7,
                'downloads' => 2100,
                'is_active' => true
            ],
            [
                'name' => 'Agency Showcase',
                'description' => 'Modern template for creative agencies and design studios',
                'category_id' => $categories['creative']->id,
                'thumbnail' => '/images/templates/agency-showcase.jpg',
                'preview_images' => json_encode([
                    '/images/templates/agency-showcase-1.jpg',
                    '/images/templates/agency-showcase-2.jpg'
                ]),
                'layout' => json_encode([
                    'slides' => [
                        ['type' => 'hero', 'title' => 'Creative Agency'],
                        ['type' => 'services', 'title' => 'Our Services'],
                        ['type' => 'portfolio', 'title' => 'Case Studies'],
                        ['type' => 'team', 'title' => 'Meet the Team'],
                        ['type' => 'contact', 'title' => 'Start a Project']
                    ]
                ]),
                'color_scheme' => json_encode(['primary' => '#7c3aed', 'secondary' => '#a855f7']),
                'is_premium' => true,
                'price' => 24.99,
                'rating' => 4.9,
                'downloads' => 1567,
                'is_active' => true
            ],

            // Education Templates
            [
                'name' => 'Education Course',
                'description' => 'Clean and engaging template for educational content and online courses',
                'category_id' => $categories['education']->id,
                'thumbnail' => '/images/templates/education-course.jpg',
                'preview_images' => json_encode([
                    '/images/templates/education-course-1.jpg',
                    '/images/templates/education-course-2.jpg'
                ]),
                'layout' => json_encode([
                    'slides' => [
                        ['type' => 'title', 'title' => 'Course Introduction'],
                        ['type' => 'objectives', 'title' => 'Learning Objectives'],
                        ['type' => 'content', 'title' => 'Chapter 1'],
                        ['type' => 'content', 'title' => 'Chapter 2'],
                        ['type' => 'quiz', 'title' => 'Knowledge Check'],
                        ['type' => 'summary', 'title' => 'Course Summary']
                    ]
                ]),
                'color_scheme' => json_encode(['primary' => '#059669', 'secondary' => '#10b981']),
                'is_premium' => false,
                'price' => 0,
                'rating' => 4.6,
                'downloads' => 3200,
                'is_active' => true
            ],
            [
                'name' => 'Academic Research',
                'description' => 'Professional template for academic presentations and research papers',
                'category_id' => $categories['education']->id,
                'thumbnail' => '/images/templates/academic-research.jpg',
                'preview_images' => json_encode([
                    '/images/templates/academic-research-1.jpg',
                    '/images/templates/academic-research-2.jpg'
                ]),
                'layout' => json_encode([
                    'slides' => [
                        ['type' => 'title', 'title' => 'Research Title'],
                        ['type' => 'abstract', 'title' => 'Abstract'],
                        ['type' => 'introduction', 'title' => 'Introduction'],
                        ['type' => 'methodology', 'title' => 'Methodology'],
                        ['type' => 'results', 'title' => 'Results'],
                        ['type' => 'discussion', 'title' => 'Discussion'],
                        ['type' => 'conclusion', 'title' => 'Conclusion'],
                        ['type' => 'references', 'title' => 'References']
                    ]
                ]),
                'color_scheme' => json_encode(['primary' => '#1e40af', 'secondary' => '#3b82f6']),
                'is_premium' => true,
                'price' => 14.99,
                'rating' => 4.8,
                'downloads' => 756,
                'is_active' => true
            ],

            // Technology Templates
            [
                'name' => 'Tech Startup',
                'description' => 'Modern template for technology startups and product launches',
                'category_id' => $categories['technology']->id,
                'thumbnail' => '/images/templates/tech-startup.jpg',
                'preview_images' => json_encode([
                    '/images/templates/tech-startup-1.jpg',
                    '/images/templates/tech-startup-2.jpg'
                ]),
                'layout' => json_encode([
                    'slides' => [
                        ['type' => 'hero', 'title' => 'Product Launch'],
                        ['type' => 'problem', 'title' => 'The Problem'],
                        ['type' => 'solution', 'title' => 'Our Solution'],
                        ['type' => 'demo', 'title' => 'Product Demo'],
                        ['type' => 'market', 'title' => 'Market Size'],
                        ['type' => 'traction', 'title' => 'Traction'],
                        ['type' => 'funding', 'title' => 'Funding Round']
                    ]
                ]),
                'color_scheme' => json_encode(['primary' => '#0ea5e9', 'secondary' => '#06b6d4']),
                'is_premium' => true,
                'price' => 29.99,
                'rating' => 4.9,
                'downloads' => 1834,
                'is_active' => true
            ],

            // Technology Templates
            [
                'name' => 'Data Analytics Report',
                'description' => 'Comprehensive template for data analysis and business intelligence reports',
                'category_id' => $categories['technology']->id,
                'thumbnail' => '/images/templates/data-analytics.jpg',
                'preview_images' => json_encode([
                    '/images/templates/data-analytics-1.jpg',
                    '/images/templates/data-analytics-2.jpg'
                ]),
                'layout' => json_encode([
                    'slides' => [
                        ['type' => 'title', 'title' => 'Data Analysis Report'],
                        ['type' => 'executive_summary', 'title' => 'Executive Summary'],
                        ['type' => 'data_overview', 'title' => 'Data Overview'],
                        ['type' => 'key_metrics', 'title' => 'Key Metrics'],
                        ['type' => 'trends', 'title' => 'Trends Analysis'],
                        ['type' => 'insights', 'title' => 'Key Insights'],
                        ['type' => 'recommendations', 'title' => 'Recommendations']
                    ]
                ]),
                'color_scheme' => json_encode(['primary' => '#0f766e', 'secondary' => '#14b8a6']),
                'is_premium' => false,
                'price' => 0,
                'rating' => 4.7,
                'downloads' => 2890,
                'is_active' => true
            ],

            // Marketing Templates
            [
                'name' => 'Marketing Strategy',
                'description' => 'Strategic template for marketing plans and campaign presentations',
                'category_id' => $categories['marketing']->id,
                'thumbnail' => '/images/templates/marketing-strategy.jpg',
                'preview_images' => json_encode([
                    '/images/templates/marketing-strategy-1.jpg',
                    '/images/templates/marketing-strategy-2.jpg'
                ]),
                'layout' => json_encode([
                    'slides' => [
                        ['type' => 'title', 'title' => 'Marketing Strategy 2024'],
                        ['type' => 'market_analysis', 'title' => 'Market Analysis'],
                        ['type' => 'target_audience', 'title' => 'Target Audience'],
                        ['type' => 'positioning', 'title' => 'Brand Positioning'],
                        ['type' => 'channels', 'title' => 'Marketing Channels'],
                        ['type' => 'budget', 'title' => 'Budget Allocation'],
                        ['type' => 'timeline', 'title' => 'Campaign Timeline'],
                        ['type' => 'metrics', 'title' => 'Success Metrics']
                    ]
                ]),
                'color_scheme' => json_encode(['primary' => '#dc2626', 'secondary' => '#ef4444']),
                'is_premium' => true,
                'price' => 19.99,
                'rating' => 4.8,
                'downloads' => 1456,
                'is_active' => true
            ]
        ];

        foreach ($templates as $templateData) {
            Template::firstOrCreate(
                ['name' => $templateData['name']],
                $templateData
            );
        }
    }
}
