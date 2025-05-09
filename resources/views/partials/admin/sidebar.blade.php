<div 
    x-cloak
    class="border-r bg-white transition-all duration-300 flex flex-col shadow-sm z-20" 
    :class="sidebarOpen ? 'w-64' : 'w-20'"
>
    <div class="h-16 border-b flex items-center px-4" :class="sidebarOpen ? 'justify-between' : 'justify-center'">
        <template x-if="sidebarOpen">
            <a href="#" class="flex items-center">
                <div class="w-9 h-9 rounded-lg bg-gradient-to-r from-orange-500 to-green-600 flex items-center justify-center text-white font-bold mr-2 shadow-md">
                    <span class="text-lg">A</span>
                </div>
                <span class="text-xl font-bold">
                    <span class="text-orange-500">Agro</span>
                    <span class="text-green-600">Connect</span>
                    <span class="text-gray-700 text-sm ml-1">Admin</span>
                </span>
            </a>
        </template>

        <template x-if="!sidebarOpen">
            <div class="flex items-center justify-center">
                <div class="w-10 h-10 rounded-lg bg-gradient-to-r from-orange-500 to-green-600 flex items-center justify-center text-white font-bold shadow-md">
                    <span class="text-lg">A</span>
                </div>
            </div>
        </template>

        <button 
            @click="sidebarOpen = !sidebarOpen" 
            class="p-1.5 rounded-md hover:bg-gray-100 transition-colors text-gray-500" 
            :class="sidebarOpen ? 'ml-2' : 'ml-0'"
        >
            <i class="fas" :class="sidebarOpen ? 'fa-chevron-left' : 'fa-chevron-right'"></i>
        </button>
    </div>

    <div class="flex-1 py-6 flex flex-col gap-1 overflow-y-auto scrollbar-thin">
        <div class="px-3 mb-2" x-show="sidebarOpen">
            <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider pl-3">Dashboard</div>
        </div>
        
        <a 
            href="#" 
            class="flex items-center py-2.5 px-3 mx-2 rounded-lg transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-green-50 text-green-600' : 'text-gray-600 hover:bg-gray-100' }}"
            :class="!sidebarOpen ? 'justify-center' : ''"
        >
            <i class="fas fa-th-large text-lg" :class="!sidebarOpen ? '' : 'mr-3 w-5 text-center'"></i>
            <span x-show="sidebarOpen" class="font-medium">Dashboard</span>
        </a>

        <div class="px-3 my-3" x-show="sidebarOpen">
            <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider pl-3">Management</div>
        </div>

        <a 
            href="#" 
            class="flex items-center py-2.5 px-3 mx-2 rounded-lg transition-colors {{ request()->routeIs('admin.farmer-registrations*') ? 'bg-green-50 text-green-600' : 'text-gray-600 hover:bg-gray-100' }}"
            :class="!sidebarOpen ? 'justify-center' : ''"
        >
            <i class="fas fa-user-plus text-lg" :class="!sidebarOpen ? '' : 'mr-3 w-5 text-center'"></i>
            <span x-show="sidebarOpen" class="font-medium">Farmer Registrations</span>
        </a>

        <a 
            href="#" 
            class="flex items-center py-2.5 px-3 mx-2 rounded-lg transition-colors {{ request()->routeIs('admin.farmers*') ? 'bg-green-50 text-green-600' : 'text-gray-600 hover:bg-gray-100' }}"
            :class="!sidebarOpen ? 'justify-center' : ''"
        >
            <i class="fas fa-users text-lg" :class="!sidebarOpen ? '' : 'mr-3 w-5 text-center'"></i>
            <span x-show="sidebarOpen" class="font-medium">Farmers</span>
        </a>

        <a 
            href="#" 
            class="flex items-center py-2.5 px-3 mx-2 rounded-lg transition-colors {{ request()->routeIs('admin.products*') ? 'bg-green-50 text-green-600' : 'text-gray-600 hover:bg-gray-100' }}"
            :class="!sidebarOpen ? 'justify-center' : ''"
        >
            <i class="fas fa-box text-lg" :class="!sidebarOpen ? '' : 'mr-3 w-5 text-center'"></i>
            <span x-show="sidebarOpen" class="font-medium">Products</span>
        </a>

        <a 
            href="#" 
            class="flex items-center py-2.5 px-3 mx-2 rounded-lg transition-colors {{ request()->routeIs('admin.orders*') ? 'bg-green-50 text-green-600' : 'text-gray-600 hover:bg-gray-100' }}"
            :class="!sidebarOpen ? 'justify-center' : ''"
        >
            <i class="fas fa-shopping-cart text-lg" :class="!sidebarOpen ? '' : 'mr-3 w-5 text-center'"></i>
            <span x-show="sidebarOpen" class="font-medium">Orders</span>
        </a>

        <a 
            href="#" 
            class="flex items-center py-2.5 px-3 mx-2 rounded-lg transition-colors {{ request()->routeIs('admin.customers*') ? 'bg-green-50 text-green-600' : 'text-gray-600 hover:bg-gray-100' }}"
            :class="!sidebarOpen ? 'justify-center' : ''"
        >
            <i class="fas fa-user-friends text-lg" :class="!sidebarOpen ? '' : 'mr-3 w-5 text-center'"></i>
            <span x-show="sidebarOpen" class="font-medium">Customers</span>
        </a>

        <div class="px-3 my-3" x-show="sidebarOpen">
            <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider pl-3">System</div>
        </div>

        <a 
            href="#" 
            class="flex items-center py-2.5 px-3 mx-2 rounded-lg transition-colors {{ request()->routeIs('admin.settings*') ? 'bg-green-50 text-green-600' : 'text-gray-600 hover:bg-gray-100' }}"
            :class="!sidebarOpen ? 'justify-center' : ''"
        >
            <i class="fas fa-cog text-lg" :class="!sidebarOpen ? '' : 'mr-3 w-5 text-center'"></i>
            <span x-show="sidebarOpen" class="font-medium">Settings</span>
        </a>

        <a 
            href="#" 
            class="flex items-center py-2.5 px-3 mx-2 rounded-lg transition-colors {{ request()->routeIs('admin.users*') ? 'bg-green-50 text-green-600' : 'text-gray-600 hover:bg-gray-100' }}"
            :class="!sidebarOpen ? 'justify-center' : ''"
        >
            <i class="fas fa-user-shield text-lg" :class="!sidebarOpen ? '' : 'mr-3 w-5 text-center'"></i>
            <span x-show="sidebarOpen" class="font-medium">Admin Users</span>
        </a>
    </div>

    <div class="p-4 border-t">
        <a 
            href="#" 
            class="flex items-center py-2.5 px-3 rounded-lg text-red-600 hover:bg-red-50 transition-colors"
            :class="!sidebarOpen ? 'justify-center' : ''"
        >
            <i class="fas fa-sign-out-alt text-lg" :class="!sidebarOpen ? '' : 'mr-3 w-5 text-center'"></i>
            <span x-show="sidebarOpen" class="font-medium">Logout</span>
        </a>
    </div>
</div>
