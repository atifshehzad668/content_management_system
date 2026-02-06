@extends('layouts.admin')

@section('page-title', 'View Message')

@section('content')
<div class="content-card mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h5 class="fw-bold mb-1">Message Details</h5>
            <p class="text-muted mb-0">Submitted on {{ $contact->created_at->format('F d, Y \a\t H:i') }}</p>
        </div>
        <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary-custom">
            <i class="bi bi-arrow-left me-2"></i>Back to Messages
        </a>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="content-card mb-4">
            <h6 class="fw-bold mb-3">Message Content</h6>
            <div class="mb-3">
                <strong>Subject:</strong>
                <p class="mb-0">{{ $contact->subject }}</p>
            </div>
            <hr>
            <div>
                <strong>Message:</strong>
                <p class="mt-2" style="white-space: pre-wrap;">{{ $contact->message }}</p>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="content-card mb-4">
            <h6 class="fw-bold mb-3">Contact Information</h6>
            <div class="mb-3">
                <small class="text-muted d-block mb-1">Name</small>
                <strong>{{ $contact->name }}</strong>
            </div>
            <div class="mb-3">
                <small class="text-muted d-block mb-1">Email</small>
                <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
            </div>
            @if($contact->phone)
            <div class="mb-3">
                <small class="text-muted d-block mb-1">Phone</small>
                <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
            </div>
            @endif
            <div class="mb-3">
                <small class="text-muted d-block mb-1">Status</small>
                @if($contact->is_read)
                    <span class="badge-custom bg-success">Read</span>
                @else
                    <span class="badge-custom bg-warning text-dark">Unread</span>
                @endif
            </div>
        </div>

        <div class="content-card">
            <h6 class="fw-bold mb-3">Security Information</h6>
            <div class="mb-3">
                <small class="text-muted d-block mb-1">IP Address</small>
                <code>{{ $contact->ip_address ?? 'N/A' }}</code>
            </div>
            <div class="mb-3">
                <small class="text-muted d-block mb-1">Submitted</small>
                <span>{{ $contact->created_at->diffForHumans() }}</span>
            </div>
        </div>

        <div class="mt-3 d-grid gap-2">
            @if(!$contact->is_read)
            <form action="{{ route('admin.contacts.mark-read', $contact) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-secondary-custom w-100">
                    <i class="bi bi-check-circle me-2"></i>Mark as Read
                </button>
            </form>
            @endif
            
            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger w-100">
                    <i class="bi bi-trash me-2"></i>Delete Message
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
