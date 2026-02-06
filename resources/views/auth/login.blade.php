<x-guest-layout>
    <style>
        /* Form Styling */
        .form-container {
            width: 100%;
        }
        
        .form-group {
            position: relative;
            margin-bottom: 1.75rem;
        }
        
        .form-input {
            width: 100%;
            padding: 1rem 1rem 1rem 1rem;
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid rgba(0, 243, 255, 0.3);
            border-radius: 12px;
            color: #ffffff;
            font-size: 1rem;
            font-family: 'Space Grotesk', sans-serif;
            transition: all 0.3s ease;
            outline: none;
        }
        
        .form-input:focus {
            border-color: #00f3ff;
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 
                0 0 20px rgba(0, 243, 255, 0.4),
                inset 0 0 20px rgba(0, 243, 255, 0.1);
        }
        
        .form-input:focus + .form-label {
            color: #00f3ff;
            transform: translateY(-140%) scale(0.85);
        }
        
        .form-input:not(:placeholder-shown) + .form-label {
            transform: translateY(-140%) scale(0.85);
        }
        
        .form-label {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.5);
            font-size: 1rem;
            pointer-events: none;
            transition: all 0.3s ease;
            background: transparent;
            padding: 0 0.5rem;
        }
        
        /* Checkbox Styling */
        .checkbox-container {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
        }
        
        .checkbox-input {
            width: 20px;
            height: 20px;
            margin-right: 0.75rem;
            accent-color: #00f3ff;
            cursor: pointer;
        }
        
        .checkbox-label {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.95rem;
            cursor: pointer;
            user-select: none;
        }
        
        /* Links */
        .form-link {
            color: #00f3ff;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            display: inline-block; 
        }
        
        .form-link:hover {
            color: #ff00e6;
            text-shadow: 0 0 10px rgba(255, 0, 230, 0.6);
        }
        
        /* Button Actions */
        .button-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        /* Cyberpunk Button */
        .cyber-button {
            position: relative;
            padding: 0.875rem 2.5rem;
            background: linear-gradient(135deg, #00f3ff, #7b2ff7);
            border: none;
            border-radius: 12px;
            color: #ffffff;
            font-size: 1rem;
            font-weight: 600;
            font-family: 'Space Grotesk', sans-serif;
            cursor: pointer;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 0 20px rgba(0, 243, 255, 0.5);
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .cyber-button::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }
        
        .cyber-button:hover::before {
            width: 300px;
            height: 300px;
        }
        
        .cyber-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 30px rgba(0, 243, 255, 0.8),
                        0 0 60px rgba(123, 47, 247, 0.5);
        }
        
        .cyber-button:active {
            transform: translateY(0);
        }
        
        .cyber-button span {
            position: relative;
            z-index: 1;
        }
        
        /* Error Messages */
        .error-message {
            color: #ff4757;
            font-size: 0.875rem;
            margin-top: 0.5rem;
            display: block;
            text-shadow: 0 0 5px rgba(255, 71, 87, 0.5);
        }
        
        /* Status Message */
        .status-message {
            background: rgba(0, 243, 255, 0.1);
            border: 1px solid rgba(0, 243, 255, 0.3);
            border-radius: 12px;
            padding: 1rem;
            color: #00f3ff;
            margin-bottom: 1.5rem;
            text-align: center;
            font-size: 0.95rem;
        }
        
        /* Mobile Responsive */
        @media (max-width: 480px) {
            .button-container {
                flex-direction: column;
                align-items: stretch;
            }
            
            .cyber-button {
                width: 100%;
            }
        }
    </style>
    
    <!-- Session Status -->
    @if (session('status'))
        <div class="status-message">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="form-container">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <input 
                id="email" 
                class="form-input" 
                type="email" 
                name="email" 
                value="{{ old('email') }}" 
                required 
                autofocus 
                autocomplete="username"
                placeholder=" "
            >
            <label for="email" class="form-label">Email Address</label>
            @error('email')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-group">
            <input 
                id="password" 
                class="form-input" 
                type="password" 
                name="password" 
                required 
                autocomplete="current-password"
                placeholder=" "
            >
            <label for="password" class="form-label">Password</label>
            @error('password')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="checkbox-container">
            <input 
                id="remember_me" 
                type="checkbox" 
                class="checkbox-input" 
                name="remember"
            >
            <label for="remember_me" class="checkbox-label">Remember me</label>
        </div>

        <div class="button-container">
            @if (Route::has('password.request'))
                <a class="form-link" href="{{ route('password.request') }}">
                    Forgot password?
                </a>
            @endif

            <button type="submit" class="cyber-button">
                <span>Log in</span>
            </button>
        </div>
    </form>
</x-guest-layout>
