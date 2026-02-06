@extends('layouts.admin')

@section('page-title', 'Page Content')

@section('content')
<div class="content-card mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h5 class="fw-bold mb-1">Page Content Management</h5>
            <p class="text-muted mb-0">Manage dynamic content for your website pages</p>
        </div>
        <a href="{{ route('admin.page-contents.create') }}" class="btn btn-primary-custom">
            <i class="bi bi-plus-circle me-2"></i>Add New Content
        </a>
    </div>
</div>

@if($contents->count() > 0)
<div class="table-container">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Page</th>
                    <th>Section</th>
                    <th>Title</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contents as $content)
                <tr>
                    <td>
                        <span class="badge-custom bg-primary">{{ ucfirst($content->page_name) }}</span>
                    </td>
                    <td class="fw-semibold">{{ ucfirst($content->section_name) }}</td>
                    <td>{{ Str::limit($content->title, 50) }}</td>
                    <td>{{ $content->created_at->format('M d, Y') }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('admin.page-contents.edit', $content) }}" class="btn btn-sm btn-secondary-custom">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.page-contents.destroy', $content) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@else
<div class="content-card text-center py-5">
    <i class="bi bi-file-text" style="font-size: 4rem; color: #cbd5e1;"></i>
    <h5 class="fw-bold mt-3 mb-2">No Page Content Yet</h5>
    <p class="text-muted mb-4">Add dynamic content for your website pages</p>
    <a href="{{ route('admin.page-contents.create') }}" class="btn btn-primary-custom">
        <i class="bi bi-plus-circle me-2"></i>Add New Content
    </a>
</div>
@endif
@endsection
