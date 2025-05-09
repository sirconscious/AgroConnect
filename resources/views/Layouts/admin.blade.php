<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - AgroConnect</title>
    <meta name="description" content="AgroConnect Admin Dashboard">
        <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        orange: {
                            50: '#FFF7ED',
                            100: '#FFEDD5',
                            200: '#FED7AA',
                            300: '#FDBA74',
                            400: '#FB923C',
                            500: '#F97316',
                            600: '#EA580C',
                            700: '#C2410C',
                            800: '#9A3412',
                            900: '#7C2D12'
                        },
                        green: {
                            50: '#F0FDF4',
                            100: '#DCFCE7',
                            200: '#BBF7D0',
                            300: '#86EFAC',
                            400: '#4ADE80',
                            500: '#22C55E',
                            600: '#16A34A',
                            700: '#15803D',
                            800: '#166534',
                            900: '#14532D'
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif']
                    },
                    boxShadow: {
                        'soft': '0 2px 15px -3px rgba(0, 0, 0, 0.07), 0 10px 20px -2px rgba(0, 0, 0, 0.04)',
                        'card': '0 7px 14px 0 rgba(65, 69, 88, 0.1), 0 3px 6px 0 rgba(0, 0, 0, 0.07)'
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        [x-cloak] { display: none !important; }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }
        
        .scrollbar-thin::-webkit-scrollbar {
            width: 4px;
            height: 4px;
        }
        
        .scrollbar-thin::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        .scrollbar-thin::-webkit-scrollbar-thumb {
            background: #d1d5db;
            border-radius: 20px;
        }
        
        .scrollbar-thin::-webkit-scrollbar-thumb:hover {
            background: #9ca3af;
        }
        
        .fade-in {
            animation: fadeIn 0.3s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .slide-in {
            animation: slideIn 0.3s ease-in-out;
        }
        
        @keyframes slideIn {
            from { transform: translateY(10px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-50">
    <div class="flex h-screen bg-gray-50" x-data="{ sidebarOpen: true }">
        <!-- Sidebar -->
        @include('partials.admin.sidebar')

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            @include('partials.admin.header')
            
            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto bg-gray-50 p-4 md:p-6 scrollbar-thin">
                <div class="fade-in slide-in">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</body>
</html>
