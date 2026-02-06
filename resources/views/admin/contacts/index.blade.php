@extends('layouts.admin')

@section('page-title', 'Contact Messages')

@section('content')
<div class="content-card mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h5 class="fw-bold mb-1">Contact Messages</h5>
            <p class="text-muted mb-0">View and manage contact form submissions</p>
        </div>
        <div class="badge-custom bg-primary">
            {{ $contacts->total() }} Total Messages
        </div>
    </div>
</div>

@if($contacts->count() > 0)
<div class="table-container">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                <tr class="{{ !$contact->is_read ? 'table-light' : '' }}">
                    <td class="fw-semibold">
                        @if(!$contact->is_read)
                            <i class="bi bi-circle-fill text-warning me-2" style="font-size: 0.5rem;"></i>
                        @endif
                        {{ $contact->name }}
                    </td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ Str::limit($contact->subject, 40) }}</td>
                    <td>{{ $contact->created_at->format('M d, Y H:i') }}</td>
                    <td>
                        @if($contact->is_read)
                            <span class="badge-custom bg-success">Read</span>
                        @else
                            <span class="badge-custom bg-warning text-dark">Unread</span>
                        @endif
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-sm btn-primary-custom">
                                <i class="bi bi-eye"></i>
                            </a>
                            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
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
    
    <div class="d-flex justify-content-center mt-4">
        {{ $contacts->links() }}
    </div>
</div>
@else
<div class="content-card text-center py-5">
    <i class="bi bi-inbox" style="font-size: 4rem; color: #cbd5e1;"></i>
    <h5 class="fw-bold mt-3 mb-2">No Messages Yet</h5>
    <p class="text-muted mb-0">Contact form submissions will appear here</p>
</div>
@endif
@endsection
