@props(['product'])
<div>
    <div class="bg-white rounded-2xl overflow-hidden shadow-custom card-hover border border-gray-100">
        <!-- Product Image -->
        <div class="img-container">
            <span class="badge organic-badge text-white">Organic</span>
            <img src="https://images.unsplash.com/photo-1598170845058-32b9d6a5da37?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2000&q=80"
                 alt="Fresh Organic Tomatoes" 
                 class="w-full h-full object-cover">
            <div class="price-tag">
                {{$product->price}}<span class="text-sm font-normal">/kg</span>
            </div>
        </div>
        
        <!-- Product Info -->
        <div class="p-6">
            <div class="flex justify-between items-start mb-3">
                <h2 class="text-xl font-bold text-gray-800">{{$product->name}}</h2>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                    <span class="w-2 h-2 bg-green-500 rounded-full mr-1.5"></span>In Stock
                </span>
            </div>
            
            <p class="text-gray-600 mb-5 text-sm leading-relaxed">
                {{$product->description}}
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

</div>