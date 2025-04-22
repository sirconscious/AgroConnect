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
            background-color: #F9FAFB;
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
    </style>
</head>
<body class="py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <header class="mb-12 text-center">
            <h1 class="text-4xl font-extrabold tracking-tight mb-2">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-orange-500 to-orange-600">Agro</span><span class="bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-green-700">Connect</span>
            </h1>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Premium quality farm-fresh vegetables delivered directly from local farmers to your table</p>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Vegetable Card 1 -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-custom card-hover border border-gray-100">
                <!-- Product Image -->
                <div class="img-container">
                    <span class="badge organic-badge text-white">Organic</span>
                    <img src="https://images.unsplash.com/photo-1566842600175-97dca3c5ad8d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2000&q=80" 
                         alt="Fresh Organic Tomatoes" 
                         class="w-full h-full object-cover">
                    <div class="price-tag">
                        $3.99<span class="text-sm font-normal">/kg</span>
                    </div>
                </div>
                
                <!-- Product Info -->
                <div class="p-6">
                    <div class="flex justify-between items-start mb-3">
                        <h2 class="text-xl font-bold text-gray-800">Organic Tomatoes</h2>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            <span class="w-2 h-2 bg-green-500 rounded-full mr-1.5"></span>In Stock
                        </span>
                    </div>
                    
                    <p class="text-gray-600 mb-5 text-sm leading-relaxed">
                        Fresh, locally grown organic tomatoes. Perfect for salads, sauces, or eating fresh. Harvested within the last 24 hours for maximum freshness and flavor.
                    </p>
                    
                    <!-- Seller Info -->
                    <div class="border-t border-gray-100 pt-5 mt-5">
                        <div class="flex items-center">
                            <div class="seller-badge">
                                GF
                            </div>
                            <div class="ml-3">
                                <h3 class="font-semibold text-gray-800">Green Fields Farm</h3>
                                <div class="flex items-center mt-1">
                                    <div class="rating-stars flex">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="text-xs text-gray-500 ml-2">(128 reviews)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex mt-6 space-x-3">
                        <button class="flex-1 btn-primary flex items-center justify-center">
                            <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                        </button>
                        <button class="btn-secondary w-12 flex items-center justify-center">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Vegetable Card 2 -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-custom card-hover border border-gray-100">
                <!-- Product Image -->
                <div class="img-container">
                    <span class="badge sale-badge text-white">Sale</span>
                    <img src="https://images.unsplash.com/photo-1598170845058-32b9d6a5da37?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2000&q=80" 
                         alt="Fresh Bell Peppers" 
                         class="w-full h-full object-cover">
                    <div class="price-tag">
                        $4.50<span class="text-sm font-normal">/kg</span>
                    </div>
                </div>
                
                <!-- Product Info -->
                <div class="p-6">
                    <div class="flex justify-between items-start mb-3">
                        <h2 class="text-xl font-bold text-gray-800">Bell Peppers Mix</h2>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            <span class="w-2 h-2 bg-green-500 rounded-full mr-1.5"></span>In Stock
                        </span>
                    </div>
                    
                    <p class="text-gray-600 mb-5 text-sm leading-relaxed">
                        Colorful mix of red, yellow, and green bell peppers. Rich in vitamins and perfect for stir-fries, salads, or roasting. Grown without pesticides.
                    </p>
                    
                    <!-- Seller Info -->
                    <div class="border-t border-gray-100 pt-5 mt-5">
                        <div class="flex items-center">
                            <div class="seller-badge" style="background: linear-gradient(135deg, #F97316 0%, #EA580C 100%);">
                                SF
                            </div>
                            <div class="ml-3">
                                <h3 class="font-semibold text-gray-800">Sunny Fields Produce</h3>
                                <div class="flex items-center mt-1">
                                    <div class="rating-stars flex">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <span class="text-xs text-gray-500 ml-2">(94 reviews)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex mt-6 space-x-3">
                        <button class="flex-1 btn-primary flex items-center justify-center">
                            <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                        </button>
                        <button class="btn-secondary w-12 flex items-center justify-center">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Vegetable Card 3 -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-custom card-hover border border-gray-100">
                <!-- Product Image -->
                <div class="img-container">
                    <span class="badge organic-badge text-white">Organic</span>
                    <img src="https://images.unsplash.com/photo-1603431777007-61db4494a034?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2000&q=80" 
                         alt="Fresh Spinach" 
                         class="w-full h-full object-cover">
                    <div class="price-tag">
                        $2.75<span class="text-sm font-normal">/bunch</span>
                    </div>
                </div>
                
                <!-- Product Info -->
                <div class="p-6">
                    <div class="flex justify-between items-start mb-3">
                        <h2 class="text-xl font-bold text-gray-800">Fresh Spinach</h2>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                            <span class="w-2 h-2 bg-yellow-500 rounded-full mr-1.5"></span>Limited
                        </span>
                    </div>
                    
                    <p class="text-gray-600 mb-5 text-sm leading-relaxed">
                        Nutrient-rich spinach leaves, freshly harvested from our hydroponic system. High in iron and vitamins. Perfect for salads, smoothies, or cooking.
                    </p>
                    
                    <!-- Seller Info -->
                    <div class="border-t border-gray-100 pt-5 mt-5">
                        <div class="flex items-center">
                            <div class="seller-badge" style="background: linear-gradient(135deg, #15803D 0%, #166534 100%);">
                                HF
                            </div>
                            <div class="ml-3">
                                <h3 class="font-semibold text-gray-800">Hydro Fresh Farms</h3>
                                <div class="flex items-center mt-1">
                                    <div class="rating-stars flex">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="text-xs text-gray-500 ml-2">(156 reviews)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex mt-6 space-x-3">
                        <button class="flex-1 btn-primary flex items-center justify-center">
                            <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                        </button>
                        <button class="btn-secondary w-12 flex items-center justify-center">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>