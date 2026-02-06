<x-app-layout>
    <style>
        .profile-card {
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
        
        .profile-card:hover {
            border-color: rgba(0, 243, 255, 0.4);
            box-shadow: 
                0 15px 50px rgba(0, 0, 0, 0.4),
                0 0 20px rgba(0, 243, 255, 0.2);
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="profile-card p-4 sm:p-8">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="profile-card p-4 sm:p-8">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="profile-card p-4 sm:p-8">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
