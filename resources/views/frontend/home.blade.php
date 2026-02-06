@extends('layouts.frontend')

@section('title', 'Home - ' . config('app.name'))
@section('meta_description', 'Welcome to our professional services platform. We provide innovative solutions for your business needs.')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 hero-content">
                <div class="mono-text mb-2" style="color: var(--primary-color);">{{ $hero->page_name ?? 'Neural Nexus Academy' }}</div>
                <h1 class="hero-title">{{ $hero->title ?? 'Shaping Post-Human Intelligence Through Excellence' }}</h1>
                <p class="hero-subtitle">{{ $hero->content ?? 'Merging traditional academic rigor with quantum computing and neural research to build the leaders of tomorrow\'s digital heritage.' }}</p>
                <div class="d-flex align-items-center flex-wrap">
                    <a href="{{ url('/services') }}" class="btn btn-primary-custom me-4 mb-3">
                        {{ $hero->additional_data['btn_primary'] ?? 'Enter Registry' }} <i class="bi bi-cpu ms-2"></i>
                    </a>
                    <a href="{{ url('/contact') }}" class="btn btn-outline-custom mb-3">
                        {{ $hero->additional_data['btn_secondary'] ?? 'Comm-Link Inquiry' }} <i class="bi bi-broadcast ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Live Data Stream (Stats) -->
<section class="section-padding" style="background: rgba(5, 5, 20, 0.4);">
    <div class="container">
        <div class="row g-4">
            @if(isset($stats->additional_data) && is_array($stats->additional_data))
                @foreach($stats->additional_data as $label => $value)
                <div class="col-md-3 col-sm-6 text-center">
                    <div class="stat-card">
                        <div class="stat-number">{{ $value }}</div>
                        <div class="mono-text" style="color: var(--text-dim);">{{ $label }}</div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-md-3 col-sm-6 text-center">
                    <div class="stat-card">
                        <div class="stat-number">25,431</div>
                        <div class="mono-text" style="color: var(--text-dim);">Active Neural Links</div>
                    </div>
                </div>
                <!-- ... additional fallbacks if needed ... -->
            @endif
        </div>
    </div>
</section>

<!-- Cognitive Sectors -->
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Cognitive Research Sectors</h2>
            <p class="mono-text" style="color: var(--heritage-gold);">A heritage of cross-disciplinary evolution</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card-custom h-100">
                    <div class="card-icon"><i class="bi bi-diagram-3"></i></div>
                    <h3 class="h4 mb-3">Neural Architecture</h3>
                    <p>Designing the next generation of cognitive interfaces and synthetic intelligence frameworks.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card-custom h-100">
                    <div class="card-icon"><i class="bi bi-shield-lock"></i></div>
                    <h3 class="h4 mb-3">Quantum Ethics</h3>
                    <p>Developing legal and ethical frameworks for a post-singularity global society.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card-custom h-100">
                    <div class="card-icon"><i class="bi bi-infinity"></i></div>
                    <h3 class="h4 mb-3">Digital Humanities</h3>
                    <p>Preserving human heritage and literary legacy within the recursive data streams of the future.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Schools Index -->
<section class="section-padding" style="background: rgba(0, 243, 255, 0.02);">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Instructional Nodes</h2>
            <p class="mono-text">Global instructional streams via the Neural Lattice</p>
        </div>
        
        <div class="row g-4">
            @foreach($services as $service)
            <div class="col-lg-4 col-md-6">
                <div class="card-custom">
                    <div class="card-body">
                        <div class="card-icon">
                            <i class="bi bi-{{ $service->icon ?? 'terminal' }}"></i>
                        </div>
                        <h3 class="h4 mb-3">{{ $service->title }}</h3>
                        <p class="mb-4">{{ Str::limit($service->description, 100) }}</p>
                        <a href="{{ url('/services') }}" class="mono-text text-decoration-none" style="color: var(--primary-color) !important;">
                            Node Details <i class="bi bi-chevron-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

            @if($services->count() === 0)
            <div class="col-lg-4 col-md-6">
                <div class="card-custom">
                    <div class="card-body">
                        <div class="card-icon"><i class="bi bi-boxes"></i></div>
                        <h3 class="h4 mb-3">School of Applied Cybernetics</h3>
                        <p class="mb-4">Mastery of biomechanical integration and advanced robotic systems engineering.</p>
                        <a href="{{ url('/services') }}" class="mono-text text-decoration-none" style="color: var(--primary-color) !important;">
                            Node Details <i class="bi bi-chevron-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card-custom">
                    <div class="card-body">
                        <div class="card-icon"><i class="bi bi-activity"></i></div>
                        <h3 class="h4 mb-3">Vanguard Medicine</h3>
                        <p class="mb-4">Nanotechnology-based healthcare and genetic optimization research.</p>
                        <a href="{{ url('/services') }}" class="mono-text text-decoration-none" style="color: var(--primary-color) !important;">
                            Node Details <i class="bi bi-chevron-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

<!-- Final CTA -->
<section class="section-padding">
    <div class="container">
        <div class="text-center">
            <h2 class="display-5 mb-4" style="font-family: 'Playfair Display', serif;">Join the Evolution</h2>
            <p class="lead text-dim mb-5">Registration for the 2142 Cosmic Cycle is now active. Sync your profile to begin.</p>
            <a href="{{ url('/contact') }}" class="btn btn-primary-custom btn-lg">
                Initialize Enrollment <i class="bi bi-fingerprint ms-2"></i>
            </a>
        </div>
    </div>
</section>
@endsection
