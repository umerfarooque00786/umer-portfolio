@extends('layouts.admin')

@section('title', 'View Message')
@section('page-title', 'Message Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Message from {{ $message->name }}</h2>
    <div class="btn-group">
        <a href="mailto:{{ $message->email }}" class="btn btn-success">
            <i class="fas fa-reply me-2"></i>Reply via Email
        </a>
        <a href="{{ route('admin.messages.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Messages
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white">
                <h5 class="card-title mb-0">Message Content</h5>
            </div>
            <div class="card-body">
                <div class="message-content" style="white-space: pre-wrap; line-height: 1.6;">{{ $message->message }}</div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white">
                <h6 class="card-title mb-0">Contact Information</h6>
            </div>
            <div class="card-body">
                <p><strong>Name:</strong><br>{{ $message->name }}</p>
                <p><strong>Email:</strong><br>
                    <a href="mailto:{{ $message->email }}" class="text-decoration-none">{{ $message->email }}</a>
                </p>
                <p><strong>Received:</strong><br>{{ $message->created_at->format('M d, Y \a\t g:i A') }}</p>
                
                <hr>
                
                <div class="d-grid gap-2">
                    <a href="mailto:{{ $message->email }}" class="btn btn-success">
                        <i class="fas fa-reply me-2"></i>Reply via Email
                    </a>
                    <a href="mailto:{{ $message->email }}?subject=Re: Your message&body=Hi {{ $message->name }},%0D%0A%0D%0AThank you for your message:%0D%0A%0D%0A{{ urlencode($message->message) }}%0D%0A%0D%0ABest regards,%0D%0AUmer Farooque" 
                       class="btn btn-outline-success">
                        <i class="fas fa-reply me-2"></i>Quick Reply
                    </a>
                    <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger w-100" 
                                onclick="return confirm('Are you sure you want to delete this message? This action cannot be undone.')">
                            <i class="fas fa-trash me-2"></i>Delete Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
