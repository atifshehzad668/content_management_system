@extends('layouts.frontend')

@section('title', 'About Us - ' . config('app.name'))
@section('meta_description', 'Learn more about our company, mission, and the team driving innovation and excellence.')

@section('content')
<!-- Page Header -->
<section class="hero-section" style="min-height: 400px;">
    <div class="container">
        <div class="text-center hero-content">
            <span class="service-badge"><i class="bi bi-info-circle me-2"></i>[ Heritage Archive ]</span>
            <h1 class="hero-title">{{ $header->title ?? 'Our Story & Mission' }}</h1>
            <p class="hero-subtitle">{{ $header->content ?? 'Building the future through innovation, dedication, and excellence' }}</p>
        </div>
    </div>
</section>

<!-- Company Story -->
<section class="section-padding" style="background: rgba(5, 5, 20, 0.4);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div style="background: var(--dark-card); backdrop-filter: blur(10px); border: 1px solid rgba(0, 243, 255, 0.2); border-radius: 30px; padding: 3rem; color: white; min-height: 400px; display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden;">
                    <div class="text-center" style="position: relative; z-index: 2;">
                        <i class="bi bi-rocket-takeoff text-primary-custom" style="font-size: 5rem; opacity: 0.9; filter: drop-shadow(0 0 10px var(--primary-color));"></i>
                        <h3 class="mt-4 fw-bold mono-text">Neural Innovation</h3>
                    </div>
                    <div class="scanline"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <h2 class="section-title text-start">{{ $story->title ?? 'Who We Are' }}</h2>
                <div class="card-custom border-0 bg-transparent p-0">
                    <p class="mb-3 lead">{{ $story->content ?? 'Founded with a vision to revolutionize the digital landscape, we are a team of passionate professionals dedicated to delivering exceptional solutions.' }}</p>
                </div>
                
                <div class="row g-3 mt-4">
                    <div class="col-6">
                        <div class="p-3 border rounded border-secondary bg-dark-card backdrop-blur">
                            <h4 class="fw-bold mb-0 mono-text" style="color: var(--primary-color);">500+</h4>
                            <small class="text-white opacity-75">Research Cycles</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 border rounded border-secondary bg-dark-card backdrop-blur">
                            <h4 class="fw-bold mb-0 mono-text" style="color: var(--primary-color);">98%</h4>
                            <small class="text-white opacity-75">Neural Affinity</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision -->
<section class="section-padding" style="background: rgba(0, 243, 255, 0.02);">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card card-custom h-100">
                    <div class="card-body p-5">
                        <div class="mb-4">
                            <div style="width: 70px; height: 70px; background: linear-gradient(135deg, var(--primary-color), var(--accent-color)); border-radius: 20px; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem;">
                                <i class="bi bi-bullseye"></i>
                            </div>
                        </div>
                        <h3 class="fw-bold mb-3 mono-text">{{ $mission->title ?? 'Our Mission' }}</h3>
                        <p class="mb-0">{{ $mission->content ?? 'To empower businesses with innovative technology solutions that drive growth.' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-custom h-100">
                    <div class="card-body p-5">
                        <div class="mb-4">
                            <div style="width: 70px; height: 70px; background: linear-gradient(135deg, var(--secondary-color), var(--accent-color)); border-radius: 20px; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem;">
                                <i class="bi bi-eye"></i>
                            </div>
                        </div>
                        <h3 class="fw-bold mb-3 mono-text">{{ $vision->title ?? 'Our Vision' }}</h3>
                        <p class="mb-0">{{ $vision->content ?? 'To be recognized globally as the leading provider of cutting-edge technology solutions.' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Core Values -->
<section class="section-padding" style="background: white; color: #000;">
    <div class="container">
        <div class="text-center mb-5">
            <span class="service-badge" style="color: #000; border-color: rgba(0,0,0,0.2);"><i class="bi bi-heart me-2"></i>Our Values</span>
            <h2 class="section-title" style="color: #000;">{{ $values->title ?? 'What Drives Us' }}</h2>
            <p class="section-subtitle" style="color: rgba(0,0,0,0.7);">{{ $values->content ?? 'The principles that guide everything we do' }}</p>
        </div>
        
        <div class="row g-4 text-dark">
            @if(isset($values->additional_data) && is_array($values->additional_data))
                @foreach($values->additional_data as $title => $description)
                <div class="col-md-4">
                    <div class="text-center p-4">
                        <div class="mb-3">
                            <div class="card-icon mx-auto" style="color: var(--primary-color);">
                                <i class="bi bi-{{ $title == 'Innovation' ? 'lightbulb' : ($title == 'Integrity' ? 'shield-check' : 'star') }}"></i>
                            </div>
                        </div>
                        <h4 class="fw-bold mb-3" style="color: #000;">{{ $title }}</h4>
                        <p style="color: rgba(0,0,0,0.6);">{{ $description }}</p>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-md-4">
                    <div class="text-center p-4">
                        <div class="mb-3">
                            <div class="card-icon mx-auto"><i class="bi bi-lightbulb"></i></div>
                        </div>
                        <h4 class="fw-bold mb-3" style="color: #000;">Innovation</h4>
                        <p style="color: rgba(0,0,0,0.6);">We constantly push boundaries and embrace new technologies to deliver cutting-edge solutions.</p>
                    </div>
                </div>
                <!-- ... additional fallbacks ... -->
            @endif
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="section-padding" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
    <div class="container">
        <div class="text-center text-white mb-5">
            <span class="service-badge" style="background: rgba(255,255,255,0.2); color: white;"><i class="bi bi-people me-2"></i>Our Team</span>
            <h2 class="display-4 fw-bold mb-3">Meet the Experts</h2>
            <p class="lead opacity-75">Talented individuals working together to create amazing solutions</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="card card-custom text-center">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <div style="width: 100px; height: 100px; background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); border-radius: 50%; margin: 0 auto; display: flex; align-items: center; justify-content: center; color: white; font-size: 2.5rem; font-weight: bold;">
                                JD
                            </div>
                        </div>
                        <h5 class="fw-bold mb-1">John Doe</h5>
                        <p class="text-muted mb-3">CEO & Founder</p>
                        <div class="social-icons d-flex justify-content-center">
                            <a href="#" style="margin: 0 0.25rem;"><i class="bi bi-linkedin"></i></a>
                            <a href="#" style="margin: 0 0.25rem;"><i class="bi bi-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card card-custom text-center">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <div style="width: 100px; height: 100px; background: linear-gradient(135deg, #ec4899, #f59e0b); border-radius: 50%; margin: 0 auto; display: flex; align-items: center; justify-content: center; color: white; font-size: 2.5rem; font-weight: bold;">
                                JS
                            </div>
                        </div>
                        <h5 class="fw-bold mb-1">Jane Smith</h5>
                        <p class="text-muted mb-3">CTO</p>
                        <div class="social-icons d-flex justify-content-center">
                            <a href="#" style="margin: 0 0.25rem;"><i class="bi bi-linkedin"></i></a>
                            <a href="#" style="margin: 0 0.25rem;"><i class="bi bi-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card card-custom text-center">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <div style="width: 100px; height: 100px; background: linear-gradient(135deg, #06b6d4, #3b82f6); border-radius: 50%; margin: 0 auto; display: flex; align-items: center; justify-content: center; color: white; font-size: 2.5rem; font-weight: bold;">
                                MJ
                            </div>
                        </div>
                        <h5 class="fw-bold mb-1">Mike Johnson</h5>
                        <p class="text-muted mb-3">Lead Developer</p>
                        <div class="social-icons d-flex justify-content-center">
                            <a href="#" style="margin: 0 0.25rem;"><i class="bi bi-linkedin"></i></a>
                            <a href="#" style="margin: 0 0.25rem;"><i class="bi bi-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card card-custom text-center">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <div style="width: 100px; height: 100px; background: linear-gradient(135deg, #8b5cf6, #ec4899); border-radius: 50%; margin: 0 auto; display: flex; align-items: center; justify-content: center; color: white; font-size: 2.5rem; font-weight: bold;">
                                SW
                            </div>
                        </div>
                        <h5 class="fw-bold mb-1">Sarah Williams</h5>
                        <p class="text-muted mb-3">Design Director</p>
                        <div class="social-icons d-flex justify-content-center">
                            <a href="#" style="margin: 0 0.25rem;"><i class="bi bi-linkedin"></i></a>
                            <a href="#" style="margin: 0 0.25rem;"><i class="bi bi-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
