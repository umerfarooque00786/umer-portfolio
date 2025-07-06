@extends('layouts.admin')

@section('title', 'CV Details')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0 text-gray-800">CV Details</h1>
                <div>
                    <a href="{{ route('admin.cvs.edit', $cv) }}" class="btn btn-warning me-2">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="{{ route('admin.cvs.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to CVs
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">CV Information</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tr>
                                    <td width="150"><strong>Title:</strong></td>
                                    <td>{{ $cv->title }}</td>
                                </tr>
                                <tr>
                                    <td><strong>File Name:</strong></td>
                                    <td>{{ $cv->original_name }}</td>
                                </tr>
                                <tr>
                                    <td><strong>File Size:</strong></td>
                                    <td>{{ $cv->formatted_size }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Status:</strong></td>
                                    <td>
                                        @if($cv->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Uploaded:</strong></td>
                                    <td>{{ $cv->created_at->format('M d, Y \a\t g:i A') }}</td>
                                </tr>
                                @if($cv->updated_at != $cv->created_at)
                                <tr>
                                    <td><strong>Last Updated:</strong></td>
                                    <td>{{ $cv->updated_at->format('M d, Y \a\t g:i A') }}</td>
                                </tr>
                                @endif
                                @if($cv->description)
                                <tr>
                                    <td><strong>Description:</strong></td>
                                    <td>{{ $cv->description }}</td>
                                </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Actions</h6>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <a href="{{ $cv->download_url }}" class="btn btn-info" target="_blank">
                                    <i class="fas fa-download"></i> Download CV
                                </a>
                                
                                @if(!$cv->is_active)
                                    <form action="{{ route('admin.cvs.set-active', $cv) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success w-100" 
                                                onclick="return confirm('Set this CV as active?')">
                                            <i class="fas fa-check"></i> Set as Active
                                        </button>
                                    </form>
                                @endif
                                
                                <a href="{{ route('admin.cvs.edit', $cv) }}" class="btn btn-warning">
                                    <i class="fas fa-edit"></i> Edit CV
                                </a>
                                
                                <form action="{{ route('admin.cvs.destroy', $cv) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger w-100" 
                                            onclick="return confirm('Are you sure you want to delete this CV? This action cannot be undone.')">
                                        <i class="fas fa-trash"></i> Delete CV
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    @if($cv->is_active)
                    <div class="card shadow border-success">
                        <div class="card-header bg-success text-white py-3">
                            <h6 class="m-0 font-weight-bold">Active CV</h6>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <i class="fas fa-check-circle text-success"></i> 
                                This CV is currently active and available for download on your website.
                            </p>
                            <p class="card-text">
                                <small class="text-muted">
                                    Visitors can download this CV from: 
                                    <a href="{{ route('download.cv') }}" target="_blank">{{ route('download.cv') }}</a>
                                </small>
                            </p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
