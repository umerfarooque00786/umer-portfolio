@extends('dashboard.layout')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-header">
                <h1 class="page-title">Dashboard</h1>
                <p class="page-subtitle">Welcome back! Here's what's happening with your portfolio.</p>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="stats-card">
                <div class="stats-icon bg-primary">
                    <i class="fas fa-project-diagram"></i>
                </div>
                <div class="stats-content">
                    <h3 class="stats-number">{{ $totalProjects }}</h3>
                    <p class="stats-label">Total Projects</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="stats-card">
                <div class="stats-icon bg-success">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="stats-content">
                    <h3 class="stats-number">{{ $totalMessages }}</h3>
                    <p class="stats-label">Total Messages</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="stats-card">
                <div class="stats-icon bg-warning">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="stats-content">
                    <h3 class="stats-number">1,234</h3>
                    <p class="stats-label">Page Views</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="stats-card">
                <div class="stats-icon bg-info">
                    <i class="fas fa-download"></i>
                </div>
                <div class="stats-content">
                    <h3 class="stats-number">89</h3>
                    <p class="stats-label">CV Downloads</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Recent Projects -->
        <div class="col-lg-6 mb-4">
            <div class="dashboard-card">
                <div class="card-header">
                    <h5 class="card-title">Recent Projects</h5>
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="card-body">
                    @forelse($recentProjects as $project)
                        <div class="recent-item">
                            <div class="recent-item-icon">
                                <i class="fas fa-project-diagram"></i>
                            </div>
                            <div class="recent-item-content">
                                <h6 class="recent-item-title">{{ $project->title }}</h6>
                                <p class="recent-item-meta">{{ $project->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="recent-item-actions">
                                <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="empty-state">
                            <i class="fas fa-project-diagram fa-2x text-muted mb-2"></i>
                            <p class="text-muted">No projects yet</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Recent Messages -->
        <div class="col-lg-6 mb-4">
            <div class="dashboard-card">
                <div class="card-header">
                    <h5 class="card-title">Recent Messages</h5>
                    <a href="{{ route('admin.messages.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="card-body">
                    @forelse($recentMessages as $message)
                        <div class="recent-item">
                            <div class="recent-item-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="recent-item-content">
                                <h6 class="recent-item-title">{{ $message->name }}</h6>
                                <p class="recent-item-subtitle">{{ $message->subject }}</p>
                                <p class="recent-item-meta">{{ $message->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="recent-item-actions">
                                <a href="{{ route('admin.messages.show', $message) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="empty-state">
                            <i class="fas fa-envelope fa-2x text-muted mb-2"></i>
                            <p class="text-muted">No messages yet</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row">
        <div class="col-12">
            <div class="dashboard-card">
                <div class="card-header">
                    <h5 class="card-title">Quick Actions</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-3">
                            <a href="{{ route('admin.projects.create') }}" class="quick-action-card">
                                <div class="quick-action-icon bg-primary">
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="quick-action-content">
                                    <h6>Add New Project</h6>
                                    <p>Create a new portfolio project</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <a href="{{ route('admin.projects.index') }}" class="quick-action-card">
                                <div class="quick-action-icon bg-success">
                                    <i class="fas fa-list"></i>
                                </div>
                                <div class="quick-action-content">
                                    <h6>Manage Projects</h6>
                                    <p>View and edit existing projects</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <a href="{{ route('admin.messages.index') }}" class="quick-action-card">
                                <div class="quick-action-icon bg-warning">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="quick-action-content">
                                    <h6>View Messages</h6>
                                    <p>Check contact form messages</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <a href="{{ route('home') }}" target="_blank" class="quick-action-card">
                                <div class="quick-action-icon bg-info">
                                    <i class="fas fa-external-link-alt"></i>
                                </div>
                                <div class="quick-action-content">
                                    <h6>View Website</h6>
                                    <p>See your live portfolio</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
