<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageContentController extends Controller
{
    public function index()
    {
        $contents = PageContent::orderBy('page_name')->orderBy('section_name')->get();
        return view('admin.page-contents.index', compact('contents'));
    }

    public function create()
    {
        return view('admin.page-contents.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'page_name' => 'required|string|max:255',
            'section_name' => 'required|string|max:255',
            'title' => 'nullable|string',
            'content' => 'nullable|string',
            'image_path' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image_path')) {
            $validated['image_path'] = $request->file('image_path')->store('page-contents', 'public');
        }

        PageContent::create($validated);

        return redirect()->route('admin.page-contents.index')
            ->with('success', 'Page content created successfully!');
    }

    public function edit(PageContent $pageContent)
    {
        return view('admin.page-contents.edit', compact('pageContent'));
    }

    public function update(Request $request, PageContent $pageContent)
    {
        $validated = $request->validate([
            'page_name' => 'required|string|max:255',
            'section_name' => 'required|string|max:255',
            'title' => 'nullable|string',
            'content' => 'nullable|string',
            'image_path' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image_path')) {
            // Delete old image
            if ($pageContent->image_path) {
                Storage::disk('public')->delete($pageContent->image_path);
            }
            $validated['image_path'] = $request->file('image_path')->store('page-contents', 'public');
        }

        $pageContent->update($validated);

        return redirect()->route('admin.page-contents.index')
            ->with('success', 'Page content updated successfully!');
    }

    public function destroy(PageContent $pageContent)
    {
        if ($pageContent->image_path) {
            Storage::disk('public')->delete($pageContent->image_path);
        }

        $pageContent->delete();

        return redirect()->route('admin.page-contents.index')
            ->with('success', 'Page content deleted successfully!');
    }
}
