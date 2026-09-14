# ParHub — Presentation Management Platform

ParHub is a web-based presentation management platform built with Laravel, Livewire, Alpine.js, and Tailwind CSS.

The platform provides users with a centralized workspace for creating, managing, organizing, uploading, and editing presentations. It also includes presentation templates, categories, search functionality, analytics, file management, and an AI-assisted presentation creation workflow.

## Features

* User authentication and account management
* Interactive dashboard
* Presentation creation and management
* Presentation templates
* Template categories
* Search and autocomplete
* Presentation file uploads
* AI-assisted presentation creation
* Presentation analytics
* Presentation view tracking
* Draft, published, and archived presentation states
* Media library
* Shared files interface
* Trash management
* User profile and settings
* Billing and upgrade interfaces
* Responsive user interface

## AI-Assisted Presentation Creation

ParHub includes an AI-assisted workflow that accepts structured presentation-generation data and creates a presentation record containing:

* Presentation title
* Presentation type
* Theme
* Number of slides
* Estimated presentation duration
* Slide structure
* AI metadata

Supported presentation concepts include:

### Business

* Executive Summary
* Problem Statement
* Solution
* Market Analysis
* Business Model
* Competition
* Financial Projections

### Educational

* Learning Objectives
* Introduction
* Key Concepts
* Examples
* Case Studies
* Knowledge Checks
* Summary

### Marketing

* Brand Story
* Target Audience
* Campaign Strategy
* Creative Concepts
* Social Media Plan
* Budget
* Success Metrics

### Portfolio

* Professional Introduction
* Skills
* Projects
* Achievements
* Goals
* Contact Information

Note: The current repository implements the AI presentation creation workflow and data structure. An external production AI API integration can be added as a future enhancement.

## Dashboard & Analytics

The platform provides dashboard functionality for tracking presentation activity, including:

* Total presentations
* Published presentations
* Draft presentations
* Presentation views
* Analytics data

This allows users to monitor their presentation library and engagement.

## Presentation Management

Users can:

* Create presentations
* Edit presentations
* Upload presentation files
* Select templates
* Update presentation information
* Publish presentations
* Archive presentations
* Delete presentations
* Duplicate presentations
* View presentation statistics

## Templates & Categories

ParHub includes a template management system with categories to help users organize and discover presentation designs.

Templates can include:

* Name
* Category
* Layout
* Rating
* Download information
* Premium status
* Active/inactive status

## Search

The application includes several search capabilities:

* Presentation search
* Template search
* Category search
* Search suggestions
* Autocomplete

## Architecture

```text
                         +----------------------+
                         |      ParHub UI       |
                         | Blade / Livewire     |
                         | Alpine.js / Tailwind |
                         +----------+-----------+
                                    |
                                    v
                         +----------------------+
                         |     Laravel 12       |
                         | Controllers / Models |
                         | Routes / Livewire    |
                         +----------+-----------+
                                    |
                +-------------------+-------------------+
                |                   |                   |
                v                   v                   v
          Presentations         Templates          Categories
                |
                v
             Database
                |
                v
          AI Metadata /
          Uploaded Files
```

## Modules

The project includes modular components for different areas of the platform, including:

* Landing Page
* Documentation
* Presentation
* Admin

The modular structure helps separate application functionality and makes the system easier to maintain and extend.

## Technologies

### Backend

* PHP
* Laravel 12
* Laravel Blade
* Livewire
* Laravel Modules

### Frontend

* HTML5
* CSS3
* Tailwind CSS
* Alpine.js
* JavaScript

### Build Tools

* Vite
* npm
* Composer

### Testing & Code Quality

* Pest
* Laravel Pint

## Project Structure

```text
ParHub/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Livewire/
│   └── Models/
│
├── database/
│   ├── migrations/
│   ├── factories/
│   └── seeders/
│
├── Modules/
│   ├── Admin/
│   ├── Documentation/
│   ├── LandingPage/
│   └── Presentation/
│
├── resources/
│   └── views/
│       ├── ai-assistant/
│       ├── analytics/
│       ├── presentations/
│       ├── templates/
│       ├── media/
│       ├── shared/
│       └── dashboard/
│
├── routes/
│   ├── web.php
│   └── auth.php
│
├── package.json
├── composer.json
└── README.md
```

## Installation

### Requirements

* PHP 8.2+
* Composer
* Node.js and npm
* Database supported by Laravel

### 1. Clone the Repository

```bash
git clone <YOUR_REPOSITORY_URL>
cd ParHub
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install Frontend Dependencies

```bash
npm install
```

### 4. Configure Environment

```bash
cp .env.example .env
```

Generate the Laravel application key:

```bash
php artisan key:generate
```

Configure your database settings inside `.env`.

### 5. Run Migrations

```bash
php artisan migrate
```

### 6. Start the Development Server

In one terminal:

```bash
php artisan serve
```

In another terminal:

```bash
npm run dev
```

Then open:

```text
http://127.0.0.1:8000
```

## Testing

Run the project's test suite with:

```bash
php artisan test
```

## Authentication & Authorization

ParHub includes authentication functionality with:

* Registration
* Login
* Email verification
* Password recovery
* Password confirmation
* Profile management
* Protected application routes

Presentation records are associated with authenticated users, with authorization checks used to protect user-owned content.

## File Management

The platform supports presentation file uploads, including:

* PDF
* DOCX
* PPTX

Uploaded presentations are stored and associated with the corresponding user and presentation record.

## Future Improvements

Possible future development includes:

* Full OpenAI API integration
* Automatic presentation file generation
* PowerPoint export
* AI-generated images
* AI-generated speaker notes
* Collaborative editing
* Real-time collaboration
* Advanced presentation analytics
* Cloud storage integration
* Subscription and payment integration
* More presentation formats
* Arabic AI-generated content

## Project Goals

ParHub was designed to simplify the presentation creation and management process by bringing presentation creation, templates, organization, analytics, file management, and AI-assisted workflows into one platform.

The project demonstrates practical experience with:

* Laravel application architecture
* MVC development
* Livewire
* Modular application design
* Database-driven web applications
* Authentication and authorization
* REST/AJAX endpoints
* File management
* Responsive UI development
* AI-assisted application workflows

## License

This project is available for educational and portfolio purposes.
