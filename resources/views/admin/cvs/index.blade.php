@extends('layouts.admin')

@section('title', 'CV Management')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0 text-gray-800">CV Management</h1>
                <a href="{{ route('admin.cvs.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Upload New CV
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">All CVs</h6>
                </div>
                <div class="card-body">
                    @if($cvs->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>File Name</th>
                                        <th>Size</th>
                                        <th>Status</th>
                                        <th>Uploaded</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cvs as $cv)
                                        <tr>
                                            <td>
                                                <strong>{{ $cv->title }}</strong>
                                                @if($cv->description)
                                                    <br><small class="text-muted">{{ $cv->description }}</small>
                                                @endif
                                            </td>
                                            <td>{{ $cv->original_name }}</td>
                                            <td>{{ $cv->formatted_size }}</td>
                                            <td>
                                                @if($cv->is_active)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-secondary">Inactive</span>
                                                @endif
                                            </td>
                                            <td>{{ $cv->created_at->format('M d, Y') }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ $cv->download_url }}" class="btn btn-sm btn-info" target="_blank">
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                    <a href="{{ route('admin.cvs.show', $cv) }}" class="btn btn-sm btn-primary">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.cvs.edit', $cv) }}" class="btn btn-sm btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    @if(!$cv->is_active)
                                                        <form action="{{ route('admin.cvs.set-active', $cv) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm btn-success" 
                                                                    onclick="return confirm('Set this CV as active?')">
                                                                <i class="fas fa-check"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                    <form action="{{ route('admin.cvs.destroy', $cv) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" 
                                                                onclick="return confirm('Are you sure you want to delete this CV?')">
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
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-file-pdf fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">No CVs uploaded yet</h5>
                            <p class="text-muted">Upload your first CV to get started.</p>
                            <a href="{{ route('admin.cvs.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Upload CV
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
