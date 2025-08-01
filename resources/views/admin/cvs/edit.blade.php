@extends('layouts.admin')

@section('title', 'Edit CV')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit CV</h1>
                <a href="{{ route('admin.cvs.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to CVs
                </a>
            </div>

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">CV Details</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.cvs.update', $cv) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">CV Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                           id="title" name="title" value="{{ old('title', $cv->title) }}" 
                                           placeholder="e.g., Umer Farooque - Full Stack Developer CV">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cv_file" class="form-label">CV File (PDF)</label>
                                    <input type="file" class="form-control @error('cv_file') is-invalid @enderror" 
                                           id="cv_file" name="cv_file" accept=".pdf">
                                    <div class="form-text">
                                        Current file: <strong>{{ $cv->original_name }}</strong> ({{ $cv->formatted_size }})<br>
                                        Leave empty to keep current file. Maximum file size: 10MB.
                                    </div>
                                    @error('cv_file')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="3" 
                                      placeholder="Optional description about this CV version">{{ old('description', $cv->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" 
                                       {{ old('is_active', $cv->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    Set as Active CV
                                </label>
                                <div class="form-text">If checked, this CV will be available for download on the website. Only one CV can be active at a time.</div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.cvs.index') }}" class="btn btn-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update CV
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current CV Preview -->
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Current CV Preview</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Title:</strong> {{ $cv->title }}</p>
                            <p><strong>File Name:</strong> {{ $cv->original_name }}</p>
                            <p><strong>File Size:</strong> {{ $cv->formatted_size }}</p>
                            <p><strong>Status:</strong> 
                                @if($cv->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </p>
                            <p><strong>Uploaded:</strong> {{ $cv->created_at->format('M d, Y \a\t g:i A') }}</p>
                            @if($cv->description)
                                <p><strong>Description:</strong> {{ $cv->description }}</p>
                            @endif
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ $cv->download_url }}" class="btn btn-info" target="_blank">
                                <i class="fas fa-download"></i> Download Current CV
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('cv_file').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        // Check file size (10MB = 10 * 1024 * 1024 bytes)
        if (file.size > 10 * 1024 * 1024) {
            alert('File size must be less than 10MB');
            e.target.value = '';
            return;
        }
        
        // Check file type
        if (file.type !== 'application/pdf') {
            alert('Only PDF files are allowed');
            e.target.value = '';
            return;
        }
    }
});
</script>
@endsection
