@extends('layouts.admin')

@section('title', 'Edit Project')
@section('page-title', 'Edit Project')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white">
                <h5 class="card-title mb-0">Edit Project: {{ $project->title }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Project Title *</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title', $project->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description *</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="5" required>{{ old('description', $project->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tech_stack" class="form-label">Tech Stack *</label>
                        <input type="text" class="form-control @error('tech_stack') is-invalid @enderror" 
                               id="tech_stack" name="tech_stack" value="{{ old('tech_stack', $project->tech_stack) }}" 
                               placeholder="e.g., Laravel, PHP, JavaScript, Bootstrap" required>
                        @error('tech_stack')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="github_url" class="form-label">GitHub URL</label>
                        <input type="url" class="form-control @error('github_url') is-invalid @enderror" 
                               id="github_url" name="github_url" value="{{ old('github_url', $project->github_url) }}" 
                               placeholder="https://github.com/username/repository">
                        @error('github_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Primary Project Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                               id="image" name="image" accept="image/*">
                        <div class="form-text">Upload a new primary image to replace the current one (optional)</div>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Current Project Images -->
                    @if($project->images->count() > 0)
                    <div class="mb-3">
                        <label class="form-label">Current Project Images</label>
                        <div class="row g-2">
                            @foreach($project->images as $image)
                            <div class="col-md-3 col-sm-4 col-6">
                                <div class="card">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" class="card-img-top" style="height: 150px; object-fit: cover;">
                                    <div class="card-body p-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remove_images[]" value="{{ $image->id }}" id="remove_{{ $image->id }}">
                                            <label class="form-check-label small" for="remove_{{ $image->id }}">
                                                Remove
                                            </label>
                                        </div>
                                        @if($image->is_primary)
                                            <small class="text-primary">Primary</small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <div class="mb-3">
                        <label for="images" class="form-label">Add More Images</label>
                        <input type="file" class="form-control @error('images.*') is-invalid @enderror"
                               id="images" name="images[]" accept="image/*" multiple>
                        <div class="form-text">Upload additional images for your project gallery (JPG, PNG, GIF, etc.)</div>
                        @error('images.*')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <!-- Image preview container -->
                        <div id="imagePreview" class="mt-3 row g-2"></div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Project
                        </button>
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times me-2"></i>Cancel
                        </a>
                        <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-outline-info">
                            <i class="fas fa-eye me-2"></i>View
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white">
                <h6 class="card-title mb-0">Project Info</h6>
            </div>
            <div class="card-body">
                <p><strong>Created:</strong> {{ $project->created_at->format('M d, Y') }}</p>
                <p><strong>Last Updated:</strong> {{ $project->updated_at->format('M d, Y') }}</p>
                @if($project->image_path)
                    <div class="mt-3">
                        <strong>Current Image:</strong>
                        <img src="{{ asset('storage/' . $project->image_path) }}" class="img-fluid mt-2 rounded" alt="Project Image" style="max-height: 200px;">
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('images').addEventListener('change', function(e) {
    const preview = document.getElementById('imagePreview');
    preview.innerHTML = '';

    Array.from(e.target.files).forEach((file, index) => {
        if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const col = document.createElement('div');
                col.className = 'col-md-3 col-sm-4 col-6';
                col.innerHTML = `
                    <div class="card">
                        <img src="${e.target.result}" class="card-img-top" style="height: 150px; object-fit: cover;">
                        <div class="card-body p-2">
                            <small class="text-success">New Image ${index + 1}</small>
                        </div>
                    </div>
                `;
                preview.appendChild(col);
            };
            reader.readAsDataURL(file);
        }
    });
});
</script>
@endpush
