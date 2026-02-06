<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Orbitron:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            :root {
                --neon-cyan: #00f3ff;
                --neon-pink: #ff00e6;
                --neon-purple: #7b2ff7;
                --dark-bg: #0a0a1f;
                --darker-bg: #050510;
                --card-bg: rgba(20, 20, 42, 0.7);
            }
            
            * {
                font-family: 'Space Grotesk', sans-serif;
            }
            
            body {
                background: linear-gradient(135deg, var(--darker-bg) 0%, var(--dark-bg) 50%, #1a1a3e 100%);
                background-attachment: fixed;
                min-height: 100vh;
                color: #ffffff;
            }
            
            body::before {
                content: '';
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-image: 
                    radial-gradient(circle at 20% 50%, rgba(0, 243, 255, 0.08) 0%, transparent 50%),
                    radial-gradient(circle at 80% 80%, rgba(123, 47, 247, 0.08) 0%, transparent 50%),
                    radial-gradient(circle at 40% 20%, rgba(255, 0, 230, 0.06) 0%, transparent 50%);
                pointer-events: none;
                z-index: 0;
            }
            
            .page-container {
                min-height: 100vh;
                position: relative;
                z-index: 1;
            }
            
            .page-header {
                background: rgba(10, 10, 31, 0.8);
                backdrop-filter: blur(20px);
                border-bottom: 1px solid rgba(0, 243, 255, 0.2);
                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.3);
            }
            
            .page-header h2 {
                font-family: 'Orbitron', sans-serif;
                background: linear-gradient(135deg, var(--neon-cyan), var(--neon-pink));
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                color: white; /* Fallback */
            }

            /* Global Text Visibility */
            h1, h2, h3, h4, h5, h6, p, label, span, div {
                color: #ffffff;
            }
            
            .text-gray-600, .text-gray-500, .text-gray-400 {
                color: rgba(255, 255, 255, 0.7) !important;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="page-container">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="page-header">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
