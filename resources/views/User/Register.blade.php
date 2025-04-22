<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroConnect Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        orange: {
                            light: '#FFA500',
                            DEFAULTF: '#FF8C00',
                            dark: '#FF4500'
                        },
                        green: {
                            light: '#6CBB3C',
                            DEFAULT: '#4F7942',
                            dark: '#2E8B57'
                        },
                        wheat: '#F5DEB3'
                    },
                    backgroundImage: {
                        'farm-pattern': "url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2232&q=80')"
                    }
                }
            }
        }
    </script>
    <style>
        .bg-overlay {
            background-image: url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2232&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 bg-overlay">
    <!-- Semi-transparent overlay to improve form readability -->
    <div class="absolute inset-0 bg-black/40"></div>
    
    <div class="bg-white rounded-lg shadow-xl p-8 w-full max-w-md border-2 border-green relative z-10">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold">
                <span class="text-orange-500">Agro</span><span class="text-green">Connect</span>
            </h1>
            <p class="text-green-dark mt-2">Join our growing community of farmers</p>
        </div>
 
        <form method="POST" action="/signup" class="space-y-4">
            @csrf
            <div class="mb-4">
                <label for="fullname" class="block text-sm font-medium text-black mb-1">Full Name</label>
                <input value="{{ old('name') }}" type="text" id="fullname" name="name" required 
                    class="w-full px-4 py-2 border border-green-light/50 rounded-md focus:outline-none focus:ring-2 focus:ring-green-">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-black mb-1">Email Address</label>
                <input value="{{ old('email') }}" type="email" id="email" name="email" required 
                    class="w-full px-4 py-2 border border-green-light/50 rounded-md focus:outline-none focus:ring-2 focus:ring-green-">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-black mb-1">Password</label>
                <input type="password" id="password" name="password" required 
                    class="w-full px-4 py-2 border border-green-light/50 rounded-md focus:outline-none focus:ring-2 focus:ring-green-">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="confirm-password" class="block text-sm font-medium text-black mb-1">Confirm Password</label>
                <input type="password" id="confirm-password" name="password_confirmation" required 
                    class="w-full px-4 py-2 border border-green-light/50 rounded-md focus:outline-none focus:ring-2 focus:ring-green-">
                @error('password_confirmation')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="flex flex-col sm:flex-row gap-4">
                <button type="submit" 
                    class="flex-1 bg-orange-400 hover:bg-orange-dark text-white font-bold py-3 px-4 rounded-md transition duration-300 shadow-md">
                    Register
                </button>
                
                <a href="/home" 
                    class="flex-1 bg-white border-2 border-green-DEFAULT text-green-DEFAULT hover:bg-green-light/10 font-bold py-3 px-4 rounded-md transition duration-300 shadow-md text-center">
                    Back to Home
                </a>
            </div>
        </form>

        <div class="mt-6 text-center text-sm text-black">
            Already have an account? <a href="{{route('login')}}" class="text-green-dark hover:underline font-medium">Sign in</a>
        </div>
    </div>
</body>
</html>