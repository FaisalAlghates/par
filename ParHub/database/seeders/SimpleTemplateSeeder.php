<?php

namespace Database\Seeders;

use App\Models\Template;
use App\Models\Category;
use Illuminate\Database\Seeder;

class SimpleTemplateSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all()->keyBy('name');

        $templates = [
            [
                'name' => 'Business Pitch',
                'description' => 'Professional business pitch template with modern design',
                'category_id' => $categories['Business']->id,
                'thumbnail' => '/images/templates/business-pitch.jpg',
                'layout' => json_encode([
                    'slides' => [
                        ['type' => 'title', 'title' => 'Company Name', 'subtitle' => 'Business Pitch'],
                        ['type' => 'content', 'title' => 'Problem Statement'],
                        ['type' => 'content', 'title' => 'Our Solution'],
                        ['type' => 'content', 'title' => 'Market Opportunity'],
                        ['type' => 'content', 'title' => 'Business Model'],
                        ['type' => 'content', 'title' => 'Financial Projections'],
                        ['type' => 'content', 'title' => 'Team'],
                        ['type' => 'content', 'title' => 'Thank You']
                    ]
                ]),
                'styles' => json_encode([
                    'primary_color' => '#6366f1',
                    'secondary_color' => '#8b5cf6',
                    'background' => 'gradient',
                    'font_family' => 'Inter'
                ]),
                'is_premium' => false,
                'downloads' => 1500,
                'rating' => 4.5
            ],
            [
                'name' => 'Corporate Presentation',
                'description' => 'Clean and professional corporate presentation template',
                'category_id' => $categories['Business']->id,
                'thumbnail' => '/images/templates/corporate.jpg',
                'layout' => json_encode([
                    'slides' => [
                        ['type' => 'title', 'title' => 'Corporate Overview', 'subtitle' => '2025'],
                        ['type' => 'content', 'title' => 'About Us'],
                        ['type' => 'content', 'title' => 'Our Services'],
                        ['type' => 'content', 'title' => 'Portfolio'],
                        ['type' => 'content', 'title' => 'Client Testimonials'],
                        ['type' => 'content', 'title' => 'Contact Information']
                    ]
                ]),
                'styles' => json_encode([
                    'primary_color' => '#1f2937',
                    'secondary_color' => '#374151',
                    'background' => 'solid',
                    'font_family' => 'Roboto'
                ]),
                'is_premium' => true,
                'price' => 19.99,
                'downloads' => 800,
                'rating' => 4.7
            ],
            [
                'name' => 'Creative Portfolio',
                'description' => 'Vibrant and creative portfolio template for designers',
                'category_id' => $categories['Creative']->id,
                'thumbnail' => '/images/templates/creative-portfolio.jpg',
                'layout' => json_encode([
                    'slides' => [
                        ['type' => 'title', 'title' => 'Creative Portfolio', 'subtitle' => 'Your Name'],
                        ['type' => 'content', 'title' => 'About Me'],
                        ['type' => 'gallery', 'title' => 'My Work'],
                        ['type' => 'content', 'title' => 'Skills'],
                        ['type' => 'content', 'title' => 'Experience'],
                        ['type' => 'content', 'title' => 'Contact']
                    ]
                ]),
                'styles' => json_encode([
                    'primary_color' => '#ec4899',
                    'secondary_color' => '#f472b6',
                    'background' => 'creative',
                    'font_family' => 'Poppins'
                ]),
                'is_premium' => false,
                'downloads' => 1200,
                'rating' => 4.8
            ],
            [
                'name' => 'Education Course',
                'description' => 'Interactive educational course presentation template',
                'category_id' => $categories['Education']->id,
                'thumbnail' => '/images/templates/education-course.jpg',
                'layout' => json_encode([
                    'slides' => [
                        ['type' => 'title', 'title' => 'Course Title', 'subtitle' => 'Learning Made Easy'],
                        ['type' => 'content', 'title' => 'Course Overview'],
                        ['type' => 'content', 'title' => 'Learning Objectives'],
                        ['type' => 'content', 'title' => 'Module 1'],
                        ['type' => 'content', 'title' => 'Module 2'],
                        ['type' => 'content', 'title' => 'Assessment'],
                        ['type' => 'content', 'title' => 'Resources']
                    ]
                ]),
                'styles' => json_encode([
                    'primary_color' => '#10b981',
                    'secondary_color' => '#34d399',
                    'background' => 'educational',
                    'font_family' => 'Open Sans'
                ]),
                'is_premium' => false,
                'downloads' => 2500,
                'rating' => 4.6
            ],
            [
                'name' => 'Tech Startup',
                'description' => 'Modern tech startup presentation template',
                'category_id' => $categories['Technology']->id,
                'thumbnail' => '/images/templates/tech-startup.jpg',
                'layout' => json_encode([
                    'slides' => [
                        ['type' => 'title', 'title' => 'Tech Startup', 'subtitle' => 'Innovation Begins Here'],
                        ['type' => 'content', 'title' => 'The Problem'],
                        ['type' => 'content', 'title' => 'Our Technology'],
                        ['type' => 'content', 'title' => 'Product Demo'],
                        ['type' => 'content', 'title' => 'Market Analysis'],
                        ['type' => 'content', 'title' => 'Roadmap'],
                        ['type' => 'content', 'title' => 'Investment']
                    ]
                ]),
                'styles' => json_encode([
                    'primary_color' => '#3b82f6',
                    'secondary_color' => '#60a5fa',
                    'background' => 'tech',
                    'font_family' => 'JetBrains Mono'
                ]),
                'is_premium' => true,
                'price' => 24.99,
                'downloads' => 900,
                'rating' => 4.4
            ],
            [
                'name' => 'Marketing Strategy',
                'description' => 'Comprehensive marketing strategy presentation template',
                'category_id' => $categories['Marketing']->id,
                'thumbnail' => '/images/templates/marketing-strategy.jpg',
                'layout' => json_encode([
                    'slides' => [
                        ['type' => 'title', 'title' => 'Marketing Strategy', 'subtitle' => '2025 Campaign'],
                        ['type' => 'content', 'title' => 'Market Research'],
                        ['type' => 'content', 'title' => 'Target Audience'],
                        ['type' => 'content', 'title' => 'Marketing Mix'],
                        ['type' => 'content', 'title' => 'Campaign Timeline'],
                        ['type' => 'content', 'title' => 'Budget & ROI'],
                        ['type' => 'content', 'title' => 'Success Metrics']
                    ]
                ]),
                'styles' => json_encode([
                    'primary_color' => '#f59e0b',
                    'secondary_color' => '#fbbf24',
                    'background' => 'marketing',
                    'font_family' => 'Nunito'
                ]),
                'is_premium' => false,
                'downloads' => 1200,
                'rating' => 4.3
            ],
            [
                'name' => 'Medical Conference',
                'description' => 'Professional medical conference presentation template',
                'category_id' => $categories['Medical']->id,
                'thumbnail' => '/images/templates/medical-conference.jpg',
                'layout' => json_encode([
                    'slides' => [
                        ['type' => 'title', 'title' => 'Medical Research', 'subtitle' => 'Conference 2025'],
                        ['type' => 'content', 'title' => 'Introduction'],
                        ['type' => 'content', 'title' => 'Methodology'],
                        ['type' => 'content', 'title' => 'Results'],
                        ['type' => 'content', 'title' => 'Discussion'],
                        ['type' => 'content', 'title' => 'Conclusion'],
                        ['type' => 'content', 'title' => 'References']
                    ]
                ]),
                'styles' => json_encode([
                    'primary_color' => '#ef4444',
                    'secondary_color' => '#f87171',
                    'background' => 'medical',
                    'font_family' => 'Source Sans Pro'
                ]),
                'is_premium' => true,
                'price' => 34.99,
                'downloads' => 400,
                'rating' => 4.2
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
