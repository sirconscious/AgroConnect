<header class="h-16 border-b bg-white flex items-center justify-between px-4 md:px-6 shadow-sm z-10">
    <div class="flex items-center">
        <h1 class="text-xl font-semibold text-gray-800">Admin Dashboard</h1>
    </div>

    <div class="flex items-center gap-5">
        <div class="relative" x-data="{ notificationsOpen: false }">
            <button 
                @click="notificationsOpen = !notificationsOpen" 
                class="relative p-2 rounded-full text-gray-500 hover:bg-gray-100 transition-colors"
            >
                <i class="fas fa-bell"></i>
                <span class="absolute top-1 right-1 h-2 w-2 rounded-full bg-orange-500"></span>
            </button>
            
            <div 
                x-show="notificationsOpen" 
                @click.away="notificationsOpen = false" 
                class="absolute right-0 mt-2 w-80 rounded-lg shadow-soft bg-white ring-1 ring-black ring-opacity-5 fade-in"
                style="display: none;"
            >
                <div class="p-3 border-b">
                    <div class="flex items-center justify-between">
                        <h3 class="text-sm font-semibold text-gray-800">Notifications</h3>
                        <span class="text-xs font-medium text-green-600 bg-green-50 rounded-full px-2 py-0.5">5 New</span>
                    </div>
                </div>
                <div class="max-h-72 overflow-y-auto scrollbar-thin">
                    <a href="#" class="block p-3 hover:bg-gray-50 border-b">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-orange-100 rounded-full p-2 mr-3">
                                <i class="fas fa-user-plus text-orange-600 text-sm"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-800">New Farmer Registration</p>
                                <p class="text-xs text-gray-500 mt-0.5">Samira Ouazzani has submitted a registration</p>
                                <p class="text-xs text-gray-400 mt-1">10 minutes ago</p>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="block p-3 hover:bg-gray-50 border-b">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-green-100 rounded-full p-2 mr-3">
                                <i class="fas fa-check-circle text-green-600 text-sm"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-800">Registration Approved</p>
                                <p class="text-xs text-gray-500 mt-0.5">Admin user Ahmed has approved a registration</p>
                                <p class="text-xs text-gray-400 mt-1">1 hour ago</p>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="block p-3 hover:bg-gray-50">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-red-100 rounded-full p-2 mr-3">
                                <i class="fas fa-times-circle text-red-600 text-sm"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-800">Registration Rejected</p>
                                <p class="text-xs text-gray-500 mt-0.5">Admin user Fatima has rejected a registration</p>
                                <p class="text-xs text-gray-400 mt-1">3 hours ago</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="p-2 border-t text-center">
                    <a href="#" class="text-xs font-medium text-green-600 hover:text-green-700">View all notifications</a>
                </div>
            </div>
        </div>

        <div class="relative" x-data="{ userMenuOpen: false }">
            <button 
                @click="userMenuOpen = !userMenuOpen" 
                class="flex items-center gap-2 p-1.5 rounded-lg hover:bg-gray-100 transition-colors"
            >
                <div class="h-8 w-8 rounded-full bg-gradient-to-r from-blue-500 to-blue-600 flex items-center justify-center text-white shadow-sm">
                    <i class="fas fa-user-shield text-xs"></i>
                </div>
                <div class="hidden md:block text-left">
                    <p class="text-sm font-medium text-gray-700">Admin User</p>
                    <p class="text-xs text-gray-500">System Administrator</p>
                </div>
                <i class="fas fa-chevron-down text-gray-400 text-xs hidden md:block"></i>
            </button>
            
            <div 
                x-show="userMenuOpen" 
                @click.away="userMenuOpen = false" 
                class="absolute right-0 mt-2 w-56 rounded-lg shadow-soft bg-white ring-1 ring-black ring-opacity-5 fade-in"
                style="display: none;"
            >
                <div class="p-3 border-b">
                    <p class="text-sm font-medium text-gray-800">Admin User</p>
                    <p class="text-xs text-gray-500">admin@agroconnect.com</p>
                </div>
                <div class="py-1">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                        <i class="fas fa-user-circle mr-2 text-gray-400"></i> My Profile
                    </a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                        <i class="fas fa-cog mr-2 text-gray-400"></i> Account Settings
                    </a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                        <i class="fas fa-history mr-2 text-gray-400"></i> Activity Log
                    </a>
                </div>
                <div class="py-1 border-t">
                    <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-50">
                        <i class="fas fa-sign-out-alt mr-2"></i> Log out
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
