@extends('layouts.admin')

@section('title', 'Messages')
@section('page-title', 'Contact Messages')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Contact Messages</h2>
    <span class="badge bg-primary fs-6">{{ $messages->total() }} Total Messages</span>
</div>

@if($messages->count() > 0)
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($messages as $message)
                        <tr>
                            <td>
                                <strong>{{ $message->name }}</strong>
                            </td>
                            <td>
                                <a href="mailto:{{ $message->email }}" class="text-decoration-none">
                                    {{ $message->email }}
                                </a>
                            </td>
                            <td>
                                <div style="max-width: 300px;">
                                    {{ Str::limit($message->message, 80) }}
                                </div>
                            </td>
                            <td>
                                <div>
                                    {{ $message->created_at->format('M d, Y') }}
                                    <br>
                                    <small class="text-muted">{{ $message->created_at->format('g:i A') }}</small>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.messages.show', $message) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <a href="mailto:{{ $message->email }}" class="btn btn-sm btn-outline-success">
                                        <i class="fas fa-reply"></i> Reply
                                    </a>
                                    <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" 
                                                onclick="return confirm('Are you sure you want to delete this message?')">
                                            <i class="fas fa-trash"></i>
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
    </div>

    <!-- Pagination -->
    @if($messages->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $messages->links() }}
        </div>
    @endif
@else
    <div class="card border-0 shadow-sm">
        <div class="card-body text-center py-5">
            <i class="fas fa-envelope fa-3x text-muted mb-3"></i>
            <h5>No Messages Yet</h5>
            <p class="text-muted">Messages from the contact form will appear here.</p>
            <a href="{{ route('contact') }}" class="btn btn-outline-primary" target="_blank">
                <i class="fas fa-external-link-alt me-2"></i>View Contact Form
            </a>
        </div>
    </div>
@endif
@endsection
