@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('content')
<!-- Stats Grid -->
<div class="row g-4 mb-4">
    <div class="col-lg-3 col-md-6">
        <div class="stat-card">
            <div class="stat-icon primary">
                <i class="bi bi-gear"></i>
            </div>
            <h2 class="stat-value">{{ $servicesCount }}</h2>
            <p class="stat-label">Total Services</p>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="stat-card secondary">
            <div class="stat-icon secondary">
                <i class="bi bi-envelope"></i>
            </div>
            <h2 class="stat-value">{{ $contactsCount }}</h2>
            <p class="stat-label">Contact Messages</p>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="stat-card warning">
            <div class="stat-icon warning">
                <i class="bi bi-envelope-exclamation"></i>
            </div>
            <h2 class="stat-value">{{ $unreadCount }}</h2>
            <p class="stat-label">Unread Messages</p>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="stat-card success">
            <div class="stat-icon success">
                <i class="bi bi-file-text"></i>
            </div>
            <h2 class="stat-value">{{ $pageContentsCount }}</h2>
            <p class="stat-label">Page Contents</p>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row g-4 mb-4">
    <div class="col-lg-12">
        <div class="content-card">
            <h5 class="fw-bold mb-3"><i class="bi bi-lightning me-2"></i>Quick Actions</h5>
            <div class="d-flex flex-wrap gap-2">
                <a href="{{ route('admin.services.create') }}" class="btn btn-primary-custom">
                    <i class="bi bi-plus-circle me-2"></i>Add Service
                </a>
                <a href="{{ route('admin.page-contents.create') }}" class="btn btn-primary-custom">
                    <i class="bi bi-plus-circle me-2"></i>Add Page Content
                </a>
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary-custom">
                    <i class="bi bi-envelope me-2"></i>View Messages
                </a>
                <a href="{{ route('home') }}" target="_blank" class="btn btn-secondary-custom">
                    <i class="bi bi-box-arrow-up-right me-2"></i>View Website
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Recent Contact Messages -->
<div class="row g-4">
    <div class="col-lg-12">
        <div class="table-container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold mb-0"><i class="bi bi-envelope me-2"></i>Recent Contact Messages</h5>
                <a href="{{ route('admin.contacts.index') }}" class="text-decoration-none">View All <i class="bi bi-arrow-right ms-1"></i></a>
            </div>
            
            @if($recentContacts->count() > 0)
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentContacts as $contact)
                        <tr>
                            <td class="fw-semibold">{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ Str::limit($contact->subject, 40) }}</td>
                            <td>{{ $contact->created_at->diffForHumans() }}</td>
                            <td>
                                @if($contact->is_read)
                                    <span class="badge-custom bg-success">Read</span>
                                @else
                                    <span class="badge-custom bg-warning text-dark">Unread</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-sm btn-primary-custom">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="text-center py-5">
                <i class="bi bi-inbox" style="font-size: 3rem; color: #cbd5e1;"></i>
                <p class="text-muted mt-3 mb-0">No contact messages yet</p>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Recent Services -->
<div class="row g-4 mt-4">
    <div class="col-lg-12">
        <div class="table-container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold mb-0"><i class="bi bi-gear me-2"></i>Services Overview</h5>
                <a href="{{ route('admin.services.index') }}" class="text-decoration-none">Manage Services <i class="bi bi-arrow-right ms-1"></i></a>
            </div>
            
            @if($services->count() > 0)
            <div class="row g-3">
                @foreach($services as $service)
                <div class="col-md-4">
                    <div class="content-card">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h6 class="fw-bold mb-0">{{ $service->title }}</h6>
                            @if($service->is_active)
                                <span class="badge-custom bg-success">Active</span>
                            @else
                                <span class="badge-custom bg-secondary">Inactive</span>
                            @endif
                        </div>
                        <p class="text-muted small mb-0">{{ Str::limit($service->description, 80) }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-5">
                <i class="bi bi-gear" style="font-size: 3rem; color: #cbd5e1;"></i>
                <p class="text-muted mt-3 mb-3">No services added yet</p>
                <a href="{{ route('admin.services.create') }}" class="btn btn-primary-custom">
                    <i class="bi bi-plus-circle me-2"></i>Add Your First Service
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
