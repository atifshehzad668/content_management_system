@extends('layouts.admin')

@section('page-title', 'Create Page Content')

@section('content')
<div class="content-card mb-4">
    <h5 class="fw-bold mb-1">Create Page Content</h5>
    <p class="text-muted mb-0">Add dynamic content to your website pages</p>
</div>

<div class="content-card">
    <form action="{{ route('admin.page-contents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="row g-4">
            <div class="col-md-6">
                <div class="mb-4">
                    <label for="page_name" class="form-label">Page Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('page_name') is-invalid @enderror" 
                           id="page_name" name="page_name" value="{{ old('page_name') }}" 
                           placeholder="e.g., home, about" required>
                    @error('page_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-4">
                    <label for="section_name" class="form-label">Section Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('section_name') is-invalid @enderror" 
                           id="section_name" name="section_name" value="{{ old('section_name') }}" 
                           placeholder="e.g., hero, features" required>
                    @error('section_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-12">
                <div class="mb-4">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                           id="title" name="title" value="{{ old('title') }}">
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-12">
                <div class="mb-4">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" 
                              id="content" name="content" rows="8">{{ old('content') }}</textarea>
                    @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-12">
                <div class="mb-4">
                    <label for="image_path" class="form-label">Image</label>
                    <input type="file" class="form-control @error('image_path') is-invalid @enderror" 
                           id="image_path" name="image_path" accept="image/*">
                    <small class="text-muted">Max size: 2MB</small>
                    @error('image_path')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <hr class="my-4">

        <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('admin.page-contents.index') }}" class="btn btn-secondary-custom">
                <i class="bi bi-x-circle me-2"></i>Cancel
            </a>
            <button type="submit" class="btn btn-primary-custom">
                <i class="bi bi-check-circle me-2"></i>Create Content
            </button>
        </div>
    </form>
</div>
@endsection
