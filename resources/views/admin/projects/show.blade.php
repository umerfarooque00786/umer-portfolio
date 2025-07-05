@extends('layouts.admin')

@section('title', 'View Project')
@section('page-title', 'Project Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>{{ $project->title }}</h2>
    <div class="btn-group">
        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-primary">
            <i class="fas fa-edit me-2"></i>Edit
        </a>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Projects
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Description</h5>
                <p class="card-text">{{ $project->description }}</p>
                
                <h5 class="card-title mt-4">Technology Stack</h5>
                <p class="card-text">
                    @foreach(explode(',', $project->tech_stack) as $tech)
                        <span class="badge bg-primary me-1">{{ trim($tech) }}</span>
                    @endforeach
                </p>

                @if($project->github_url)
                    <h5 class="card-title mt-4">GitHub Repository</h5>
                    <p class="card-text">
                        <a href="{{ $project->github_url }}" target="_blank" class="btn btn-outline-dark">
                            <i class="fab fa-github me-2"></i>View on GitHub
                        </a>
                    </p>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white">
                <h6 class="card-title mb-0">Project Information</h6>
            </div>
            <div class="card-body">
                <p><strong>Created:</strong><br>{{ $project->created_at->format('M d, Y \a\t g:i A') }}</p>
                <p><strong>Last Updated:</strong><br>{{ $project->updated_at->format('M d, Y \a\t g:i A') }}</p>
                
                <hr>
                
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-primary">
                        <i class="fas fa-edit me-2"></i>Edit Project
                    </a>
                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger w-100" 
                                onclick="return confirm('Are you sure you want to delete this project? This action cannot be undone.')">
                            <i class="fas fa-trash me-2"></i>Delete Project
                        </button>
                    </form>
                </div>
            </div>
        </div>

        @if($project->image_path)
            <div class="card border-0 shadow-sm mt-3">
                <div class="card-header bg-white">
                    <h6 class="card-title mb-0">Project Image</h6>
                </div>
                <div class="card-body p-0">
                    <img src="{{ asset('storage/' . $project->image_path) }}" class="img-fluid" alt="{{ $project->title }} Image">
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
