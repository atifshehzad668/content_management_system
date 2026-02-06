@extends('layouts.admin')

@section('page-title', 'Manage Services')

@section('content')
<div class="content-card mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h5 class="fw-bold mb-1">Services Management</h5>
            <p class="text-muted mb-0">Create and manage your service offerings</p>
        </div>
        <a href="{{ route('admin.services.create') }}" class="btn btn-primary-custom">
            <i class="bi bi-plus-circle me-2"></i>Add New Service
        </a>
    </div>
</div>

@if($services->count() > 0)
<div class="table-container">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Title</th>
                    <th>Icon</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                <tr>
                    <td class="fw-bold">{{ $service->order }}</td>
                    <td>
                        <div class="fw-semibold">{{ $service->title }}</div>
                        <small class="text-muted">{{ Str::limit($service->description, 50) }}</small>
                    </td>
                    <td>
                        @if($service->icon)
                            <i class="bi bi-{{ $service->icon }} fs-4" style="color: var(--primary-color);"></i>
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if($service->is_active)
                            <span class="badge-custom bg-success">Active</span>
                        @else
                            <span class="badge-custom bg-secondary">Inactive</span>
                        @endif
                    </td>
                    <td>{{ $service->created_at->format('M d, Y') }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-sm btn-secondary-custom">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
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
    <i class="bi bi-inbox" style="font-size: 4rem; color: #cbd5e1;"></i>
    <h5 class="fw-bold mt-3 mb-2">No Services Yet</h5>
    <p class="text-muted mb-4">Start by adding your first service</p>
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary-custom">
        <i class="bi bi-plus-circle me-2"></i>Add New Service
    </a>
</div>
@endif
@endsection
