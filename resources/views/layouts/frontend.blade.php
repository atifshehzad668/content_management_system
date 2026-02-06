<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('meta_description', 'Professional services and solutions')">
    <meta name="keywords" content="@yield('meta_keywords', 'services, professional, solutions')">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@700;800&family=Space+Mono&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #00f3ff; /* Quantum Cyan */
            --secondary-color: #ff00e6; /* Neural Pink */
            --accent-color: #7b2ff7; /* Portal Purple */
            --heritage-gold: #d4af37; /* Academic Gold */
            --dark-bg: #050510; /* Deep Space */
            --dark-card: rgba(15, 15, 35, 0.7);
            --text-light: #f1f5f9;
            --text-dim: #94a3b8;
            --neon-blue: rgba(0, 243, 255, 0.5);
            --neon-gold: rgba(212, 175, 55, 0.4);
        }

        * {
            font-family: 'Inter', sans-serif;
        }

        h1, h2, h3, h4, .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
        }

        .mono-text {
            font-family: 'Space Mono', monospace;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 0.8rem;
        }

        body {
            background: var(--dark-bg);
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(0, 243, 255, 0.05) 0%, transparent 40%),
                radial-gradient(circle at 90% 80%, rgba(123, 47, 247, 0.05) 0%, transparent 40%),
                url('data:image/svg+xml,<svg width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"><path d="M0 40 L40 40 L40 0" fill="none" stroke="rgba(255,255,255,0.03)" stroke-width="0.5"/></svg>');
            background-attachment: fixed;
            color: #ffffff;
            min-height: 100vh;
        }

        /* Holographic Navigation */
        .navbar {
            background: rgba(5, 5, 20, 0.8) !important;
            backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(0, 243, 255, 0.2);
            padding: 1rem 0;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.5);
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            background: linear-gradient(135deg, var(--primary-color), var(--heritage-gold));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -1px;
        }

        .nav-link {
            color: var(--text-light) !important;
            font-weight: 500;
            margin: 0 1rem;
            position: relative;
            transition: 0.3s;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 1px;
            background: var(--primary-color);
            transition: 0.3s;
            box-shadow: 0 0 10px var(--primary-color);
        }

        .nav-link:hover::after, .nav-link.active::after {
            width: 100%;
        }

        /* Futuristic Sections */
        .section-padding { padding: 8rem 0; }

        .hero-section {
            min-height: 80vh;
            display: flex;
            align-items: center;
            background: radial-gradient(circle at center, rgba(30, 30, 60, 0.5) 0%, transparent 70%);
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=2072&auto=format&fit=crop');
            background-size: cover;
            opacity: 0.15;
            z-index: -1;
        }

        .hero-title {
            font-size: 4.5rem;
            line-height: 1.1;
            margin-bottom: 2rem;
            background: linear-gradient(to bottom, #fff, #94a3b8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            color: var(--text-dim);
            max-width: 600px;
            margin-bottom: 3rem;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }

        /* Glassmorphic Cards */
        .card-custom {
            background: var(--dark-card);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 2.5rem;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            color: #fff !important;
        }

        .card-custom p, 
        .card-custom span, 
        .card-custom h1, 
        .card-custom h2, 
        .card-custom h3, 
        .card-custom h4, 
        .card-custom h5,
        .card-custom .mono-text {
            color: #fff !important;
        }

        .card-custom::before {
            content: '';
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 2px;
            background: linear-gradient(90deg, transparent, var(--primary-color), transparent);
            transform: translateX(-100%);
            transition: 0.6s;
        }

        .card-custom:hover {
            transform: translateY(-10px);
            border-color: var(--primary-color);
            box-shadow: 0 20px 40px rgba(0, 243, 255, 0.1);
        }

        .card-custom:hover::before {
            transform: translateX(100%);
        }

        .card-icon {
            font-size: 2.5rem;
            margin-bottom: 2rem;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Buttons: Plasma Style */
        .btn-primary-custom {
            background: transparent;
            color: var(--primary-color);
            border: 1px solid var(--primary-color);
            padding: 1rem 2.5rem;
            border-radius: 50px;
            font-weight: 600;
            position: relative;
            overflow: hidden;
            transition: 0.3s;
            box-shadow: inset 0 0 10px rgba(0, 243, 255, 0.2), 0 0 10px rgba(0, 243, 255, 0.2);
        }

        .btn-primary-custom:hover {
            background: var(--primary-color);
            color: var(--dark-bg);
            box-shadow: 0 0 30px var(--primary-color);
            transform: translateY(-2px);
        }

        .btn-outline-custom {
            background: transparent;
            color: var(--heritage-gold);
            border: 1px solid var(--heritage-gold);
            padding: 1rem 2.5rem;
            border-radius: 50px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-outline-custom:hover {
            background: var(--heritage-gold);
            color: var(--dark-bg);
            box-shadow: 0 0 30px var(--heritage-gold);
        }

        /* Scanline Animation */
        @keyframes scan {
            0% { transform: translateY(-100%); }
            100% { transform: translateY(1000%); }
        }

        .scanline {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 5px;
            background: rgba(0, 243, 255, 0.03);
            pointer-events: none;
            z-index: 1000;
            animation: scan 10s linear infinite;
        }

        /* Footer */
        .footer {
            background: #02020a;
            padding: 5rem 0 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        .footer-title {
            font-family: 'Playfair Display', serif;
            color: #fff;
            margin-bottom: 1.5rem;
        }

        .social-icons a {
            color: var(--text-dim);
            font-size: 1.2rem;
            margin-right: 1.5rem;
            transition: 0.3s;
        }

        .social-icons a:hover {
            color: var(--primary-color);
            text-shadow: 0 0 10px var(--primary-color);
        }

        @media (max-width: 768px) {
            .hero-title { font-size: 2.5rem; }
            .section-title { font-size: 2rem; }
        }
    </style>

    @stack('styles')
</head>
<body>
    <div class="scanline"></div>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="bi bi-gem me-2"></i>{{ config('app.name', 'YourBrand') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ url('/about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('services') ? 'active' : '' }}" href="{{ url('/services') }}">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">Contact</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <i class="bi bi-speedometer2 me-1"></i>Dashboard
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="bi bi-box-arrow-in-right me-1"></i>Login
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main style="margin-top: 76px;">
        @yield('content')
    </main>

    <!-- Futuristic Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <div class="navbar-brand mb-4 d-block">{{ config('app.name', 'Nexus') }}</div>
                    <p class="text-dim">Archiving human intelligence and neural potential since the Heritage Era. Our mission is the recursive evolution of knowledge.</p>
                    <div class="mono-text mt-4 py-2 px-3 d-inline-block" style="border: 1px solid var(--neon-gold); color: var(--heritage-gold); font-size: 0.7rem;">
                        <i class="bi bi-shield-check me-2"></i>Lattice Protocol: Secure
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6">
                    <h5 class="mono-text mb-4" style="color: var(--primary-color);">Lattice Nodes</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ url('/') }}" class="text-dim text-decoration-none hover-glow">Core Nexus</a></li>
                        <li class="mb-2"><a href="{{ url('/about') }}" class="text-dim text-decoration-none hover-glow">Heritage Archive</a></li>
                        <li class="mb-2"><a href="{{ url('/services') }}" class="text-dim text-decoration-none hover-glow">Research Sectors</a></li>
                        <li class="mb-2"><a href="{{ url('/contact') }}" class="text-dim text-decoration-none hover-glow">Comm-Link</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5 class="mono-text mb-4" style="color: var(--primary-color);">Active Streams</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-dim text-decoration-none hover-glow">Post-Human Ethics</a></li>
                        <li class="mb-2"><a href="#" class="text-dim text-decoration-none hover-glow">Quantum Synthesis</a></li>
                        <li class="mb-2"><a href="#" class="text-dim text-decoration-none hover-glow">Neural Humanities</a></li>
                        <li class="mb-2"><a href="#" class="text-dim text-decoration-none hover-glow">Biotype Optima</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5 class="mono-text mb-4" style="color: var(--primary-color);">Registry Base</h5>
                    <p class="text-dim small mb-2"><i class="bi bi-geo-alt me-2"></i>Nexus Quad 101, Future City</p>
                    <p class="text-dim small mb-2"><i class="bi bi-broadcast me-2"></i>+99 (0) 243-NEXUS</p>
                    <p class="text-dim small"><i class="bi bi-cpu me-2"></i>registry@nexus.edu</p>
                    
                    <div class="social-icons mt-4">
                        <a href="#"><i class="bi bi-discord"></i></a>
                        <a href="#"><i class="bi bi-github"></i></a>
                        <a href="#"><i class="bi bi-meta"></i></a>
                        <a href="#"><i class="bi bi-twitter-x"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="mt-5 pt-4" style="border-top: 1px solid rgba(255,255,255,0.05);">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p class="small text-dim mb-md-0">&copy; {{ date('Y') }} {{ config('app.name') }}. Neural Registry Active.</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <a href="#" class="small text-dim text-decoration-none me-4 hover-glow">System Privacy</a>
                        <a href="#" class="small text-dim text-decoration-none hover-glow">Neural Terms</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <style>
        .hover-glow:hover {
            color: var(--primary-color) !important;
            text-shadow: 0 0 8px var(--primary-color);
            transition: 0.3s;
        }
    </style>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    @stack('scripts')
</body>
</html>
