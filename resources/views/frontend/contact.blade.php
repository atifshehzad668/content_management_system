@extends('layouts.frontend')

@section('title', 'Contact Us - ' . config('app.name'))
@section('meta_description', 'Get in touch with us. We would love to hear from you and discuss how we can help your business.')

@section('content')
<!-- Page Header -->
<section class="hero-section" style="min-height: 400px; padding: 100px 0;">
    <div class="container">
        <div class="text-center">
            <div class="mono-text mb-2" style="color: var(--primary-color);">Comm-Link Status: Active</div>
            <h1 class="hero-title">{{ $header->title ?? 'Connect With the Registry' }}</h1>
            <p class="hero-subtitle">{{ $header->content ?? 'Assisting your neural synchronization and academic journey' }}</p>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="section-padding">
    <div class="container">
        <div class="row g-5">
            <!-- Contact Information -->
            <div class="col-lg-4">
                <div class="mb-5">
                    <h2 class="h3 mb-4" style="color: var(--primary-color); font-family: 'Playfair Display', serif;">Digital Registry HQ</h2>
                    <p class="text-dim">Our administrative nodes are ready to assist with enrollment, quantum scholarships, and general academic inquires.</p>
                </div>

                <div class="mb-5">
                    <div class="d-flex align-items-start mb-4">
                        <div class="me-3">
                            <i class="bi bi-geo-alt fs-4" style="color: var(--primary-color);"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Campus Coordinates</h5>
                            <p class="text-dim mb-0">{{ $registryInfo->additional_data['Coordinates'] ?? 'Nexus Quad 101, Future City' }}</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-4">
                        <div class="me-3">
                            <i class="bi bi-broadcast fs-4" style="color: var(--primary-color);"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Comm-Link Hotline</h5>
                            <p class="text-dim mb-0">{{ $registryInfo->additional_data['Comm-Link'] ?? '+99 (0) 243-NEXUS' }}</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-4">
                        <div class="me-3">
                            <i class="bi bi-cpu fs-4" style="color: var(--primary-color);"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Neural Email</h5>
                            <p class="text-dim mb-0">{{ $registryInfo->additional_data['Neural Email'] ?? 'registry@nexus.edu' }}</p>
                        </div>
                    </div>
                </div>

                <div>
                    <h5 class="mono-text mb-4" style="color: var(--heritage-gold);">Lattice Network</h5>
                    <div class="social-icons">
                        <a href="#"><i class="bi bi-meta"></i></a>
                        <a href="#"><i class="bi bi-twitter-x"></i></a>
                        <a href="#"><i class="bi bi-discord"></i></a>
                        <a href="#"><i class="bi bi-github"></i></a>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-lg-8">
                <div class="card-custom shadow-lg">
                    <div class="card-body">
                        <div class="mono-text mb-3" style="color: var(--primary-color) !important;">[ Initialize Inquiry ]</div>
                        <h3 class="h4 mb-4" style="font-family: 'Playfair Display', serif; color: #fff;">Inquiry Synchronization</h3>

                        @if(session('success'))
                        <div class="alert alert-info border-0 rounded-0" style="background: rgba(0, 243, 255, 0.1); color: var(--primary-color);">
                            <i class="bi bi-check-circle me-2"></i>
                            {{ session('success') }}
                        </div>
                        @endif

                        <form action="{{ route('contact.submit') }}" method="POST">
                            @csrf
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="mono-text small mb-2" style="color: #fff;">Subject Name</label>
                                    <input type="text" name="name" class="form-control bg-transparent border-secondary text-white rounded-0 py-3 @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="mono-text small mb-2" style="color: #fff;">Neural Address (Email)</label>
                                    <input type="email" name="email" class="form-control bg-transparent border-secondary text-white rounded-0 py-3 @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="mono-text small mb-2" style="color: #fff;">Research Sector</label>
                                    <select name="subject" class="form-select bg-transparent border-secondary text-white rounded-0 py-3 @error('subject') is-invalid @enderror" required>
                                        <option value="" class="bg-dark">Select Sector</option>
                                        <option value="Neural Architecture" class="bg-dark">Neural Architecture</option>
                                        <option value="Quantum Ethics" class="bg-dark">Quantum Ethics</option>
                                        <option value="Digital Humanities" class="bg-dark">Digital Humanities</option>
                                        <option value="Applied Cybernetics" class="bg-dark">Applied Cybernetics</option>
                                        <option value="Vanguard Medicine" class="bg-dark">Vanguard Medicine</option>
                                    </select>
                                    @error('subject')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="mono-text small mb-2" style="color: #fff;">Sync Link (Phone)</label>
                                    <input type="tel" name="phone" class="form-control bg-transparent border-secondary text-white rounded-0 py-3" value="{{ old('phone') }}">
                                </div>

                                <div class="col-12">
                                    <label class="mono-text small mb-2" style="color: #fff;">Sync Payload (Details)</label>
                                    <textarea name="message" class="form-control bg-transparent border-secondary text-white rounded-0 py-3 @error('message') is-invalid @enderror" rows="5" required>{{ old('message') }}</textarea>
                                    @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-12 mt-5">
                                    <button type="submit" class="btn btn-primary-custom w-100 py-3">
                                        Synchronize Data Payload <i class="bi bi-send-check ms-2"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
