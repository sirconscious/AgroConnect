<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroConnect - Premium Vegetable Marketplace</title>
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
                        'custom': '0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1)',
                        'custom-hover': '0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)'
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: #FCFCFC;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%2322c55e' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        
        .hero-section {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1464226184884-fa280b87c399?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 3rem;
            border-radius: 1rem;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
        }
        
        .badge {
            position: absolute;
            top: 12px;
            left: 12px;
            padding: 6px 12px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }
        
        .price-tag {
            position: absolute;
            bottom: 0;
            right: 0;
            background: linear-gradient(135deg, rgba(249, 115, 22, 0.9) 0%, rgba(234, 88, 12, 0.9) 100%);
            color: white;
            padding: 8px 16px;
            border-top-left-radius: 12px;
            font-weight: 700;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        
        .seller-badge {
            background: linear-gradient(135deg, #22C55E 0%, #16A34A 100%);
            color: white;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-weight: 700;
            font-size: 1rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        
        .rating-stars {
            color: #F59E0B;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #F97316 0%, #EA580C 100%);
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(249, 115, 22, 0.4), 0 2px 4px -1px rgba(249, 115, 22, 0.06);
        }
        
        .btn-primary:hover {
            box-shadow: 0 10px 15px -3px rgba(249, 115, 22, 0.4), 0 4px 6px -2px rgba(249, 115, 22, 0.05);
            transform: translateY(-2px);
        }
        
        .btn-secondary {
            background-color: white;
            color: #16A34A;
            border: 2px solid #16A34A;
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            background-color: #F0FDF4;
            transform: translateY(-2px);
        }
        
        .img-container {
            height: 220px;
            overflow: hidden;
            position: relative;
        }
        
        .img-container img {
            transition: transform 0.5s ease;
        }
        
        .card-hover:hover .img-container img {
            transform: scale(1.05);
        }
        
        .organic-badge {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.9) 0%, rgba(22, 163, 74, 0.9) 100%);
        }
        
        .sale-badge {
            background: linear-gradient(135deg, rgba(249, 115, 22, 0.9) 0%, rgba(234, 88, 12, 0.9) 100%);
        }
        
        .category-pill {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 0.875rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .category-pill:hover {
            transform: translateY(-2px);
        }
        
        .leaf-decoration {
            position: absolute;
            opacity: 0.1;
            z-index: -1;
        }
        
        .leaf-1 {
            top: 10%;
            left: 5%;
            transform: rotate(20deg);
        }
        
        .leaf-2 {
            bottom: 15%;
            right: 5%;
            transform: rotate(-15deg);
        }
        
        .navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 50;
        }
        
        .nav-link {
            position: relative;
            transition: all 0.3s ease;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(to right, #F97316, #16A34A);
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after, .nav-link.active::after {
            width: 100%;
        }
        
        .nav-link.active {
            color: #16A34A;
            font-weight: 600;
        }
        
        .mobile-menu {
            transition: transform 0.3s ease-in-out;
        }
        
        @media (max-width: 768px) {
            .mobile-menu {
                transform: translateX(-100%);
            }
            
            .mobile-menu.open {
                transform: translateX(0);
            }
        }
        
        .cart-icon {
            position: relative;
        }
        
        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: linear-gradient(135deg, #F97316 0%, #EA580C 100%);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="/" class="flex items-center">
                        <svg class="w-8 h-8 mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#16A34A" stroke-width="2"/>
                            <path d="M7 12.5L10 15.5L17 8.5" stroke="#F97316" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span class="text-xl font-bold">
                            <span class="text-orange-500">Agro</span><span class="text-green-600">Connect</span>
                        </span>
                    </a>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="nav-link active text-green-600">
                        <i class="fas fa-home mr-1"></i> Home
                    </a>
                    <a href="/marketplace" class="nav-link text-gray-700 hover:text-green-600">
                        <i class="fas fa-store mr-1"></i> Marketplace
                    </a>
                    <a href="/farmers" class="nav-link text-gray-700 hover:text-green-600">
                        <i class="fas fa-tractor mr-1"></i> Farmers
                    </a>
                    <a href="/about" class="nav-link text-gray-700 hover:text-green-600">
                        <i class="fas fa-info-circle mr-1"></i> About
                    </a>
                    <a href="/contact" class="nav-link text-gray-700 hover:text-green-600">
                        <i class="fas fa-envelope mr-1"></i> Contact
                    </a>
                </div>
                
                <!-- Right Navigation -->
                <div class="flex items-center space-x-4">
                    <a href="/search" class="text-gray-700 hover:text-green-600">
                        <i class="fas fa-search text-xl"></i>
                    </a>
                    <a href="/cart" class="text-gray-700 hover:text-green-600 cart-icon">
                        <i class="fas fa-shopping-cart text-xl"></i>
                        <span class="cart-count">3</span>
                    </a>
                    <a href="/account" class="text-gray-700 hover:text-green-600">
                        <i class="fas fa-user-circle text-xl"></i>
                    </a>
                    
                    <!-- Mobile menu button -->
                    <button class="md:hidden text-gray-700 hover:text-green-600 focus:outline-none" id="mobile-menu-button">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
            
            <!-- Mobile Navigation (Hidden by default) -->
            <div class="md:hidden mobile-menu absolute left-0 top-16 w-full bg-white shadow-md py-4 px-4 hidden" id="mobile-menu">
                <div class="flex flex-col space-y-4">
                    <a href="/" class="flex items-center py-2 px-4 bg-green-50 text-green-600 rounded-md">
                        <i class="fas fa-home mr-2"></i> Home
                    </a>
                    <a href="/marketplace" class="flex items-center py-2 px-4 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-md">
                        <i class="fas fa-store mr-2"></i> Marketplace
                    </a>
                    <a href="/farmers" class="flex items-center py-2 px-4 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-md">
                        <i class="fas fa-tractor mr-2"></i> Farmers
                    </a>
                    <a href="/about" class="flex items-center py-2 px-4 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-md">
                        <i class="fas fa-info-circle mr-2"></i> About
                    </a>
                    <a href="/contact" class="flex items-center py-2 px-4 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-md">
                        <i class="fas fa-envelope mr-2"></i> Contact
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Decorative elements -->
    <div class="leaf-decoration leaf-1">
        <svg width="200" height="200" viewBox="0 0 24 24" fill="#16A34A">
            <path d="M17.5,12C16.46,12 15.43,12.15 14.5,12.42V11.92C15.5,11.55 16.5,11.25 17.5,11C21,10 22,7 22,5C22,4.45 21.55,4 21,4C19,4 16,5 15,8.5C14.75,9.5 14.45,10.5 14.08,11.5C13.27,11.84 12.5,12.27 11.79,12.79C11.11,12.27 10.23,12 9.5,12H9C8.45,12 8,12.45 8,13V17C8,17.55 8.45,18 9,18H9.5C10.23,18 11.11,17.73 11.79,17.21C12.66,17.93 13.77,18.5 15,18.5C16.5,18.5 18.17,17.59 20.11,16.1C20.66,15.67 21,15.07 21,14.5C21,13.67 20.33,13 19.5,13H17.5M9.5,15.5V14.5H11.25C11.25,14.5 10.5,15.5 9.5,15.5Z" />
        </svg>
    </div>
    <div class="leaf-decoration leaf-2">
        <svg width="200" height="200" viewBox="0 0 24 24" fill="#F97316">
            <path d="M17.5,12C16.46,12 15.43,12.15 14.5,12.42V11.92C15.5,11.55 16.5,11.25 17.5,11C21,10 22,7 22,5C22,4.45 21.55,4 21,4C19,4 16,5 15,8.5C14.75,9.5 14.45,10.5 14.08,11.5C13.27,11.84 12.5,12.27 11.79,12.79C11.11,12.27 10.23,12 9.5,12H9C8.45,12 8,12.45 8,13V17C8,17.55 8.45,18 9,18H9.5C10.23,18 11.11,17.73 11.79,17.21C12.66,17.93 13.77,18.5 15,18.5C16.5,18.5 18.17,17.59 20.11,16.1C20.66,15.67 21,15.07 21,14.5C21,13.67 20.33,13 19.5,13H17.5M9.5,15.5V14.5H11.25C11.25,14.5 10.5,15.5 9.5,15.5Z" />
        </svg>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <!-- Hero Section -->
        <div class="hero-section mb-12">
            <div class="text-center text-white">
                <h1 class="text-5xl font-extrabold tracking-tight mb-4">
                    <span class="text-orange-300">Agro</span><span class="text-green-300">Connect</span>
                </h1>
                <p class="text-xl max-w-2xl mx-auto">Premium quality farm-fresh vegetables delivered directly from local farmers to your table</p>
                <div class="mt-6">
                    <a href="#products" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-full transition-all duration-300 inline-flex items-center">
                        <span>Browse Products</span>
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Category Pills -->
        <div class="flex flex-wrap justify-center gap-3 mb-10">
            <div class="category-pill bg-green-100 text-green-800 border border-green-200 shadow-sm">
                <i class="fas fa-carrot mr-2"></i> All Products
            </div>
            <div class="category-pill bg-white text-gray-700 border border-gray-200 shadow-sm">
                <i class="fas fa-seedling mr-2"></i> Vegetables
            </div>
            <div class="category-pill bg-white text-gray-700 border border-gray-200 shadow-sm">
                <i class="fas fa-apple-alt mr-2"></i> Fruits
            </div>
            <div class="category-pill bg-white text-gray-700 border border-gray-200 shadow-sm">
                <i class="fas fa-leaf mr-2"></i> Organic
            </div>
            <div class="category-pill bg-white text-gray-700 border border-gray-200 shadow-sm">
                <i class="fas fa-percentage mr-2"></i> On Sale
            </div>
        </div>

        <!-- Search and Sort -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-8">
            <div class="relative w-full md:w-64 mb-4 md:mb-0">
                <input type="text" placeholder="Search products..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                    <i class="fas fa-search"></i>
                </div>
            </div>
            <div class="flex items-center">
                <span class="text-gray-600 mr-2">Sort by:</span>
                <select class="border border-gray-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    <option>Newest</option>
                    <option>Price: Low to High</option>
                    <option>Price: High to Low</option>
                    <option>Popularity</option>
                </select>
            </div>
        </div>

        <!-- Products Grid -->
        <div id="products" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach ($products as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12 flex justify-center">
            <nav class="inline-flex rounded-md shadow">
                <a href="#" class="py-2 px-4 bg-white border border-gray-200 text-gray-700 rounded-l-md hover:bg-gray-50">
                    <i class="fas fa-chevron-left"></i>
                </a>
                <a href="#" class="py-2 px-4 bg-green-600 text-white border border-green-600">1</a>
                <a href="#" class="py-2 px-4 bg-white border border-gray-200 text-gray-700 hover:bg-gray-50">2</a>
                <a href="#" class="py-2 px-4 bg-white border border-gray-200 text-gray-700 hover:bg-gray-50">3</a>
                <a href="#" class="py-2 px-4 bg-white border border-gray-200 text-gray-700 rounded-r-md hover:bg-gray-50">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </nav>
        </div>

        <!-- Footer -->
        <footer class="mt-16 pt-8 border-t border-gray-200">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <div>
                    <h3 class="text-lg font-bold mb-4">
                        <span class="text-orange-500">Agro</span><span class="text-green-600">Connect</span>
                    </h3>
                    <p class="text-gray-600">Connecting farmers directly with consumers for the freshest produce possible.</p>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 hover:text-green-600">About Us</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-green-600">How It Works</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-green-600">Become a Seller</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-green-600">Contact Us</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Newsletter</h3>
                    <p class="text-gray-600 mb-4">Subscribe to get updates on new products and seasonal offers.</p>
                    <div class="flex">
                        <input type="email" placeholder="Your email" class="flex-1 px-4 py-2 rounded-l-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-r-lg">
                            Subscribe
                        </button>
                    </div>
                </div>
            </div>
            <div class="text-center py-6 border-t border-gray-200 text-gray-600">
                &copy; 2023 AgroConnect. All rights reserved.
            </div>
        </footer>
    </div>

    <!-- JavaScript for Mobile Menu Toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        });
    </script>
</body>
</html>