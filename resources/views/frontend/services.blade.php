@extends('layouts.frontend')

@section('title', 'Services - ' . config('app.name'))
@section('meta_description', 'Explore our comprehensive range of professional services designed to help your business thrive.')

@section('content')
<!-- Page Header -->
<section class="hero-section" style="min-height: 400px; padding: 100px 0;">
    <div class="container">
        <div class="text-center hero-content">
            <span class="service-badge"><i class="bi bi-gear me-2"></i>[ Knowledge Lattice ]</span>
            <h1 class="hero-title">Cognitive Research Sectors</h1>
            <p class="hero-subtitle">Comprehensive research nodes tailored to the evolution of digital intelligence</p>
        </div>
    </div>
</section>

<!-- Services Grid -->
<section class="section-padding" style="background: white;">
    <div class="container">
        @if($services->count() > 0)
        <div class="row g-4">
            @foreach($services as $service)
            <div class="col-lg-4 col-md-6">
                <div class="card card-custom h-100">
                    @if($service->image)
                    <img src="{{ asset('storage/' . $service->image) }}" class="card-img-top" alt="{{ $service->title }}" style="height: 250px; object-fit: cover; border-radius: 20px 20px 0 0;">
                    @endif
                    <div class="card-body p-4">
                        <div class="card-icon">
                            <i class="bi bi-{{ $service->icon ?? 'gear' }}"></i>
                        </div>
                        <h3 class="h4 fw-bold mb-3">{{ $service->title }}</h3>
                        <p class="text-muted mb-4">{{ $service->description }}</p>
                        <a href="{{ url('/contact') }}" class="btn btn-primary-custom w-100">
                            Get Started <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <!-- Default Services when database is empty -->
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card card-custom h-100">
                    <div class="card-body p-4">
                        <div class="card-icon">
                            <i class="bi bi-code-slash"></i>
                        </div>
                        <h3 class="h4 fw-bold mb-3">Web Development</h3>
                        <p class="text-muted mb-4">Create stunning, responsive websites that engage your audience and drive conversions. We use the latest technologies and best practices to build fast, secure, and scalable web applications.</p>
                        <ul class="list-unstyled text-muted small mb-4">
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Custom Website Design</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>E-commerce Solutions</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>CMS Integration</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Performance Optimization</li>
                        </ul>
                        <a href="{{ url('/contact') }}" class="btn btn-primary-custom w-100">
                            Get Started <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card card-custom h-100">
                    <div class="card-body p-4">
                        <div class="card-icon">
                            <i class="bi bi-phone"></i>
                        </div>
                        <h3 class="h4 fw-bold mb-3">Mobile Applications</h3>
                        <p class="text-muted mb-4">Build powerful mobile apps for iOS and Android that deliver exceptional user experiences. Our native and cross-platform solutions ensure your app performs flawlessly on all devices.</p>
                        <ul class="list-unstyled text-muted small mb-4">
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>iOS & Android Apps</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Cross-Platform Development</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>UI/UX Design</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>App Store Optimization</li>
                        </ul>
                        <a href="{{ url('/contact') }}" class="btn btn-primary-custom w-100">
                            Get Started <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card card-custom h-100">
                    <div class="card-body p-4">
                        <div class="card-icon">
                            <i class="bi bi-cloud"></i>
                        </div>
                        <h3 class="h4 fw-bold mb-3">Cloud Solutions</h3>
                        <p class="text-muted mb-4">Leverage cloud technology to scale your infrastructure and optimize performance. We help you migrate, deploy, and manage cloud-based solutions that grow with your business.</p>
                        <ul class="list-unstyled text-muted small mb-4">
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Cloud Migration</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Infrastructure Management</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>DevOps Services</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Security & Compliance</li>
                        </ul>
                        <a href="{{ url('/contact') }}" class="btn btn-primary-custom w-100">
                            Get Started <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card card-custom h-100">
                    <div class="card-body p-4">
                        <div class="card-icon">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <h3 class="h4 fw-bold mb-3">Digital Marketing</h3>
                        <p class="text-muted mb-4">Grow your online presence with data-driven digital marketing strategies. From SEO to social media, we help you reach and engage your target audience effectively.</p>
                        <ul class="list-unstyled text-muted small mb-4">
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>SEO Optimization</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Social Media Marketing</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Content Strategy</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Analytics & Reporting</li>
                        </ul>
                        <a href="{{ url('/contact') }}" class="btn btn-primary-custom w-100">
                            Get Started <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card card-custom h-100">
                    <div class="card-body p-4">
                        <div class="card-icon">
                            <i class="bi bi-palette"></i>
                        </div>
                        <h3 class="h4 fw-bold mb-3">UI/UX Design</h3>
                        <p class="text-muted mb-4">Create intuitive and visually stunning user experiences that keep your customers engaged. Our design team crafts interfaces that are both beautiful and functional.</p>
                        <ul class="list-unstyled text-muted small mb-4">
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>User Research</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Wireframing & Prototyping</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Visual Design</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Usability Testing</li>
                        </ul>
                        <a href="{{ url('/contact') }}" class="btn btn-primary-custom w-100">
                            Get Started <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card card-custom h-100">
                    <div class="card-body p-4">
                        <div class="card-icon">
                            <i class="bi bi-headset"></i>
                        </div>
                        <h3 class="h4 fw-bold mb-3">IT Consulting</h3>
                        <p class="text-muted mb-4">Get expert guidance on technology strategy and implementation. Our consultants help you make informed decisions that align with your business objectives.</p>
                        <ul class="list-unstyled text-muted small mb-4">
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Technology Strategy</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>System Architecture</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Process Optimization</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Training & Support</li>
                        </ul>
                        <a href="{{ url('/contact') }}" class="btn btn-primary-custom w-100">
                            Get Started <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Process Section -->
<section class="section-padding" style="background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 100%); color: #000;">
    <div class="container">
        <div class="text-center mb-5">
            <span class="service-badge" style="color: #000; border-color: rgba(0,0,0,0.2);"><i class="bi bi-diagram-3 me-2"></i>Our Process</span>
            <h2 class="section-title" style="color: #000;">How We Work</h2>
            <p class="section-subtitle" style="color: rgba(0,0,0,0.7);">A proven methodology for delivering exceptional results</p>
        </div>
        
        <div class="row g-4 text-dark">
            <div class="col-lg-3 col-md-6">
                <div class="text-center">
                    <div class="mb-3">
                        <div style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); border-radius: 50%; margin: 0 auto; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem; font-weight: bold;">
                            1
                        </div>
                    </div>
                    <h4 class="fw-bold mb-3" style="color: #000;">Discovery</h4>
                    <p style="color: rgba(0,0,0,0.6);">We learn about your business, goals, and challenges to create the perfect solution.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="text-center">
                    <div class="mb-3">
                        <div style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--secondary-color), var(--accent-color)); border-radius: 50%; margin: 0 auto; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem; font-weight: bold;">
                            2
                        </div>
                    </div>
                    <h4 class="fw-bold mb-3" style="color: #000;">Planning</h4>
                    <p style="color: rgba(0,0,0,0.6);">We develop a detailed strategy and roadmap for your project's success.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="text-center">
                    <div class="mb-3">
                        <div style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--accent-color), var(--primary-color)); border-radius: 50%; margin: 0 auto; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem; font-weight: bold;">
                            3
                        </div>
                    </div>
                    <h4 class="fw-bold mb-3" style="color: #000;">Execution</h4>
                    <p style="color: rgba(0,0,0,0.6);">Our team brings your vision to life with cutting-edge technology and expertise.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="text-center">
                    <div class="mb-3">
                        <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #f59e0b, var(--secondary-color)); border-radius: 50%; margin: 0 auto; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem; font-weight: bold;">
                            4
                        </div>
                    </div>
                    <h4 class="fw-bold mb-3" style="color: #000;">Delivery</h4>
                    <p style="color: rgba(0,0,0,0.6);">We launch your solution and provide ongoing support to ensure continued success.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section-padding" style="background: linear-gradient(135deg, var(--dark-bg), #1e40af);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 text-white mb-4 mb-lg-0">
                <h2 class="display-5 fw-bold mb-3">Ready to Start Your Project?</h2>
                <p class="lead mb-0">Let's discuss how we can help transform your business</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ url('/contact') }}" class="btn btn-hero btn-primary-custom btn-lg">
                    Contact Us <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
