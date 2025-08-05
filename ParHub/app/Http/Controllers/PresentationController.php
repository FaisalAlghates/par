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
