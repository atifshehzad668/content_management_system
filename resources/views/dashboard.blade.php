<x-app-layout>
    <style>
        .dashboard-card {
            background: rgba(20, 20, 42, 0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(0, 243, 255, 0.2);
            border-radius: 24px;
            box-shadow: 
                0 10px 40px rgba(0, 0, 0, 0.3),
                0 0 0 1px rgba(255, 255, 255, 0.05),
                inset 0 0 20px rgba(0, 243, 255, 0.05);
            transition: all 0.3s ease;
        }
        
        .welcome-text {
            font-family: 'Orbitron', sans-serif;
            background: linear-gradient(135deg, var(--neon-cyan), var(--neon-pink));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: bold;
            font-size: 1.5rem;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dashboard-card overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8">
                    <h1 class="welcome-text mb-4">{{ __("Access Granted") }}</h1>
                    <p class="text-white text-lg">
                        {{ __("Welcome back, ") }} <span class="text-[#00f3ff] font-bold">{{ Auth::user()->name }}</span>! {{ __("You're successfully logged into your futuristic wallet portal.") }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
