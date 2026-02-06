<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Login</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Orbitron:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            :root {
                --primary-glow: #00f3ff;
                --secondary-glow: #ff00e6;
                --tertiary-glow: #7b2ff7;
                --dark-bg: #0a0a1f;
                --card-bg: rgba(20, 20, 40, 0.7);
            }
            
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            
            body {
                font-family: 'Space Grotesk', sans-serif;
                background: var(--dark-bg);
                overflow-x: hidden;
                color: #ffffff;
            }

            /* Global Text Visibility for Auth Portal */
            h1, h2, h3, h4, h5, h6, p, label, span, div {
                color: #ffffff;
            }
            
            /* Animated Gradient Background */
            .futuristic-bg {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: linear-gradient(45deg, #0a0a1f, #1a1a3e, #2d1b4e, #1a1a3e, #0a0a1f);
                background-size: 400% 400%;
                animation: gradientFlow 15s ease infinite;
                z-index: -2;
            }
            
            @keyframes gradientFlow {
                0%, 100% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
            }
            
            /* Floating Particles */
            .particles {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: -1;
                overflow: hidden;
            }
            
            .particle {
                position: absolute;
                width: 4px;
                height: 4px;
                background: radial-gradient(circle, var(--primary-glow), transparent);
                border-radius: 50%;
                opacity: 0.6;
                animation: float 20s infinite ease-in-out;
            }
            
            .particle:nth-child(1) { left: 10%; animation-delay: 0s; animation-duration: 15s; }
            .particle:nth-child(2) { left: 20%; animation-delay: 2s; animation-duration: 18s; }
            .particle:nth-child(3) { left: 30%; animation-delay: 4s; animation-duration: 12s; }
            .particle:nth-child(4) { left: 40%; animation-delay: 1s; animation-duration: 20s; }
            .particle:nth-child(5) { left: 50%; animation-delay: 3s; animation-duration: 16s; }
            .particle:nth-child(6) { left: 60%; animation-delay: 5s; animation-duration: 14s; }
            .particle:nth-child(7) { left: 70%; animation-delay: 2.5s; animation-duration: 19s; }
            .particle:nth-child(8) { left: 80%; animation-delay: 4.5s; animation-duration: 13s; }
            .particle:nth-child(9) { left: 90%; animation-delay: 1.5s; animation-duration: 17s; }
            .particle:nth-child(10) { left: 15%; animation-delay: 3.5s; animation-duration: 21s; }
            
            @keyframes float {
                0%, 100% {
                    transform: translateY(100vh) scale(0);
                    opacity: 0;
                }
                10% {
                    opacity: 0.6;
                }
                90% {
                    opacity: 0.6;
                }
                100% {
                    transform: translateY(-100px) scale(1.5);
                    opacity: 0;
                }
            }
            
            /* Glassmorphism Container */
            .glass-container {
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 2rem 1rem;
                position: relative;
            }
            
            .glass-card {
                background: rgba(20, 20, 40, 0.6);
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
                border: 1px solid rgba(255, 255, 255, 0.1);
                border-radius: 24px;
                padding: 3rem 2.5rem;
                width: 100%;
                max-width: 450px;
                box-shadow: 
                    0 8px 32px 0 rgba(0, 243, 255, 0.1),
                    0 0 0 1px rgba(255, 255, 255, 0.05),
                    inset 0 0 20px rgba(0, 243, 255, 0.05);
                position: relative;
                overflow: hidden;
                animation: cardEntry 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
            }
            
            @keyframes cardEntry {
                0% {
                    opacity: 0;
                    transform: translateY(50px) scale(0.9);
                }
                100% {
                    opacity: 1;
                    transform: translateY(0) scale(1);
                }
            }
            
            .glass-card::before {
                content: '';
                position: absolute;
                top: -50%;
                left: -50%;
                width: 200%;
                height: 200%;
                background: radial-gradient(circle, rgba(0, 243, 255, 0.1) 0%, transparent 70%);
                animation: rotateGlow 10s linear infinite;
            }
            
            @keyframes rotateGlow {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
            
            /* Logo */
            .logo-container {
                text-align: center;
                margin-bottom: 2.5rem;
                position: relative;
                z-index: 1;
            }
            
            .logo-text {
                font-family: 'Orbitron', sans-serif;
                font-size: 2.5rem;
                font-weight: 800;
                background: linear-gradient(135deg, var(--primary-glow), var(--secondary-glow));
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                text-shadow: 0 0 30px rgba(0, 243, 255, 0.5);
                letter-spacing: 2px;
                animation: logoFloat 3s ease-in-out infinite;
            }
            
            @keyframes logoFloat {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-5px); }
            }
            
            .logo-subtitle {
                color: rgba(255, 255, 255, 0.6);
                font-size: 0.875rem;
                margin-top: 0.5rem;
                letter-spacing: 3px;
                text-transform: uppercase;
            }
            
            /* Content Wrapper */
            .content-wrapper {
                position: relative;
                z-index: 1;
            }
        </style>
    </head>
    <body>
        <!-- Animated Background -->
        <div class="futuristic-bg"></div>
        
        <!-- Floating Particles -->
        <div class="particles">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>
        
        <!-- Glass Container -->
        <div class="glass-container">
            <div class="glass-card">
                <!-- Logo -->
                <div class="logo-container">
                    <div class="logo-text">{{ config('app.name', 'FUTURE') }}</div>
                    <div class="logo-subtitle">Access Portal</div>
                </div>
                
                <!-- Content -->
                <div class="content-wrapper">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
