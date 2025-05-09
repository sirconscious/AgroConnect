@extends('Layouts.admin')

@section('title', 'Farmer Registration Management')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Farmer Registration Management</h1>
            <p class="text-gray-500 mt-1">Review and verify farmer registration applications</p>
        </div>
        
        <div class="flex items-center gap-3">
            <span class="text-sm text-gray-500">Quick filters:</span>
            <button class="px-3 py-2 bg-green-100 text-green-800 text-sm font-medium rounded-lg hover:bg-green-200 transition-colors">
                All ({{ $farmers->count() }})
            </button>
            <button class="px-3 py-2 bg-orange-100 text-orange-800 text-sm font-medium rounded-lg hover:bg-orange-200 transition-colors">
                Pending ({{ $farmers->where('status', 'pending')->count() }})
            </button>
            <button class="px-3 py-2 bg-blue-100 text-blue-800 text-sm font-medium rounded-lg hover:bg-blue-200 transition-colors">
                Confirmed ({{ $farmers->where('status', 'confirmed')->count() }})
            </button>
            <button class="px-3 py-2 bg-red-100 text-red-800 text-sm font-medium rounded-lg hover:bg-red-200 transition-colors">
                Rejected ({{ $farmers->where('status', 'rejected')->count() }})
            </button>
        </div>
    </div>

    <!-- Search and Filters -->
    <div class="bg-white p-5 rounded-xl shadow-card border border-gray-100" x-data="{
        searchQuery: '',
        status: '',
        dateRange: '',
        region: '',
        resetFilters() {
            this.searchQuery = '';
            this.status = '';
            this.dateRange = '';
            this.region = '';
        }
    }">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="relative flex-1">
                <i class="fas fa-search absolute left-3.5 top-3.5 h-4 w-4 text-gray-400"></i>
                <input 
                    type="search" 
                    placeholder="Search by name, email, CIN or farm name..." 
                    class="pl-10 pr-4 py-2.5 w-full rounded-lg border border-gray-200 focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50 bg-gray-50"
                    x-model="searchQuery"
                >
            </div>

            <div class="flex flex-wrap gap-4">
                <select 
                    x-model="status"
                    class="px-3 py-2.5 rounded-lg border border-gray-200 focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50 bg-gray-50"
                >
                    <option value="">All Statuses</option>
                    <option value="pending">Pending</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="rejected">Rejected</option>
                </select>

                <select 
                    x-model="dateRange"
                    class="px-3 py-2.5 rounded-lg border border-gray-200 focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50 bg-gray-50"
                >
                    <option value="">All Dates</option>
                    <option value="today">Today</option>
                    <option value="yesterday">Yesterday</option>
                    <option value="last7days">Last 7 Days</option>
                    <option value="last30days">Last 30 Days</option>
                    <option value="custom">Custom Range</option>
                </select>

                <select 
                    x-model="region"
                    class="px-3 py-2.5 rounded-lg border border-gray-200 focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50 bg-gray-50"
                >
                    <option value="">All Regions</option>
                    <option value="casablanca">Casablanca-Settat</option>
                    <option value="rabat">Rabat-Salé-Kénitra</option>
                    <option value="marrakech">Marrakech-Safi</option>
                    <option value="fes">Fès-Meknès</option>
                    <option value="tanger">Tanger-Tétouan-Al Hoceïma</option>
                    <option value="other">Other Regions</option>
                </select>
            </div>
        </div>

        <template x-if="searchQuery || status || dateRange || region">
            <div class="flex flex-wrap items-center mt-4 pt-4 border-t">
                <div class="text-sm text-gray-500 mr-2">Active filters:</div>
                <div class="flex flex-wrap gap-2">
                    <template x-if="searchQuery">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800 border border-gray-200">
                            Search: <span x-text="searchQuery" class="ml-1"></span>
                            <button @click="searchQuery = ''" class="ml-1 text-gray-500 hover:text-gray-700">
                                <i class="fas fa-times"></i>
                            </button>
                        </span>
                    </template>
                    
                    <template x-if="status">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800 border border-gray-200">
                            Status: <span x-text="status" class="ml-1"></span>
                            <button @click="status = ''" class="ml-1 text-gray-500 hover:text-gray-700">
                                <i class="fas fa-times"></i>
                            </button>
                        </span>
                    </template>
                    
                    <template x-if="dateRange">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800 border border-gray-200">
                            Date: <span x-text="dateRange" class="ml-1"></span>
                            <button @click="dateRange = ''" class="ml-1 text-gray-500 hover:text-gray-700">
                                <i class="fas fa-times"></i>
                            </button>
                        </span>
                    </template>
                    
                    <template x-if="region">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800 border border-gray-200">
                            Region: <span x-text="region" class="ml-1"></span>
                            <button @click="region = ''" class="ml-1 text-gray-500 hover:text-gray-700">
                                <i class="fas fa-times"></i>
                            </button>
                        </span>
                    </template>
                </div>
                <button @click="resetFilters()" class="ml-auto text-sm text-green-600 hover:text-green-700 font-medium">
                    Reset filters
                </button>
            </div>
        </template>
    </div>

    <!-- Farmers Table -->
    <div class="rounded-xl shadow-card bg-white border border-gray-100" x-data="{
        selectedFarmers: [],
        toggleSelectAll(farmers) {
            if (this.selectedFarmers.length === farmers.length) {
                this.selectedFarmers = [];
            } else {
                this.selectedFarmers = farmers.map(farmer => farmer.id);
            }
        },
        toggleSelectFarmer(farmerId) {
            if (this.selectedFarmers.includes(farmerId)) {
                this.selectedFarmers = this.selectedFarmers.filter(id => id !== farmerId);
            } else {
                this.selectedFarmers.push(farmerId);
            }
        },
        showFarmerDetails: false,
        currentFarmer: null,
        viewFarmerDetails(farmer) {
            this.currentFarmer = farmer;
            this.showFarmerDetails = true;
        },
        closeFarmerDetails() {
            this.showFarmerDetails = false;
            this.currentFarmer = null;
        },
        async confirmFarmer(farmerId) {
            try {
                const response = await fetch(`/admin/farmers/${farmerId}/confirm`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name=\"csrf-token\"]').content,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                });
                
                if (response.ok) {
                    window.location.reload();
                } else {
                    alert('Failed to confirm farmer. Please try again.');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            }
        },
        async rejectFarmer(farmerId) {
            try {
                const response = await fetch(`/admin/farmers/${farmerId}/reject`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name=\"csrf-token\"]').content,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                });
                
                if (response.ok) {
                    window.location.reload();
                } else {
                    alert('Failed to reject farmer. Please try again.');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            }
        }
    }">
        <div class="relative w-full overflow-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-50 text-gray-700">
                    <tr>
                        <th class="px-4 py-3 w-12">
                            <input 
                                type="checkbox" 
                                class="rounded border-gray-300 text-green-600 focus:ring-green-500"
                                @click="toggleSelectAll(farmers)"
                                :checked="selectedFarmers.length === farmers.length && farmers.length > 0"
                            >
                        </th>
                        <th class="px-4 py-3">Farmer Name</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">CIN</th>
                        <th class="px-4 py-3">Phone</th>
                        <th class="px-4 py-3">Farm Name</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Date Applied</th>
                        <th class="px-4 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($farmers as $farmer)
                    <tr class="border-t border-gray-200 hover:bg-gray-50">
                        <td class="px-4 py-3">
                            <input 
                                type="checkbox" 
                                class="rounded border-gray-300 text-green-600 focus:ring-green-500"
                                @click="toggleSelectFarmer('{{ $farmer['id'] }}')"
                                :checked="selectedFarmers.includes('{{ $farmer['id'] }}')"
                            >
                        </td>
                        <td class="px-4 py-3 font-medium text-gray-800">{{ $farmer['firstName'] }} {{ $farmer['lastName'] }}</td>
                        <td class="px-4 py-3 text-gray-700">{{ $farmer['email'] }}</td>
                        <td class="px-4 py-3 text-gray-700">{{ $farmer['cin'] }}</td>
                        <td class="px-4 py-3 text-gray-700">{{ $farmer['phone'] }}</td>
                        <td class="px-4 py-3 text-gray-700">{{ $farmer['farmName'] }}</td>
                        <td class="px-4 py-3">
                            <span 
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ 
                                    $farmer['status'] === 'pending' ? 'bg-orange-100 text-orange-800' : 
                                    ($farmer['status'] === 'confirmed' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') 
                                }}"
                            >
                                {{ ucfirst($farmer['status']) }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-gray-700">{{ $farmer['dateApplied'] }}</td>
                        <td class="px-4 py-3 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <button 
                                    @click="viewFarmerDetails({{ json_encode($farmer) }})"
                                    class="p-1.5 rounded-lg text-blue-600 hover:bg-blue-50 transition-colors"
                                    title="View Details"
                                >
                                    <i class="fas fa-eye"></i>
                                </button>
                                
                                @if($farmer['status'] === 'pending')
                                <button 
                                    @click="confirmFarmer('{{ $farmer['id'] }}')"
                                    class="p-1.5 rounded-lg text-green-600 hover:bg-green-50 transition-colors"
                                    title="Confirm"
                                >
                                    <i class="fas fa-check"></i>
                                </button>
                                
                                <button 
                                    @click="rejectFarmer('{{ $farmer['id'] }}')"
                                    class="p-1.5 rounded-lg text-red-600 hover:bg-red-50 transition-colors"
                                    title="Reject"
                                >
                                    <i class="fas fa-times"></i>
                                </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex items-center justify-between p-5 border-t">
            <div class="text-sm text-gray-500">
                Showing <strong>{{ $farmers->count() }}</strong> of <strong>{{ $farmers->count() }}</strong> farmers
            </div>
            <div class="flex items-center gap-2">
                <button 
                    disabled
                    class="px-3 py-1.5 text-sm border border-gray-300 rounded-md text-gray-400 bg-gray-50 cursor-not-allowed"
                >
                    Previous
                </button>
                <button 
                    class="px-3 py-1.5 text-sm border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50"
                >
                    Next
                </button>
            </div>
        </div>

        <!-- Farmer Details Slide-Over Panel -->
        <div 
            x-show="showFarmerDetails" 
            class="fixed inset-0 overflow-hidden z-50"
            style="display: none;"
        >
            <div 
                class="absolute inset-0 overflow-hidden"
                @click.self="closeFarmerDetails"
            >
                <div class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                
                <div class="fixed inset-y-0 right-0 pl-10 max-w-full flex">
                    <div 
                        class="relative w-screen max-w-2xl"
                        x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                        x-transition:enter-start="translate-x-full"
                        x-transition:enter-end="translate-x-0"
                        x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                        x-transition:leave-start="translate-x-0"
                        x-transition:leave-end="translate-x-full"
                    >
                        <div class="h-full flex flex-col bg-white shadow-xl overflow-y-scroll">
                            <div class="px-4 py-6 sm:px-6 border-b border-gray-200 sticky top-0 bg-white z-10">
                                <div class="flex items-start justify-between">
                                    <h2 class="text-lg font-medium text-gray-900" x-text="'Farmer Details: ' + currentFarmer?.firstName + ' ' + currentFarmer?.lastName"></h2>
                                    <div class="ml-3 h-7 flex items-center">
                                        <button 
                                            @click="closeFarmerDetails"
                                            class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-green-500"
                                        >
                                            <span class="sr-only">Close panel</span>
                                            <i class="fas fa-times text-xl"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="relative flex-1 px-4 py-6 sm:px-6">
                                <div class="space-y-8">
                                    <!-- Status Badge -->
                                    <div class="flex justify-between items-center">
                                        <span 
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium"
                                            :class="{
                                                'bg-orange-100 text-orange-800': currentFarmer?.status === 'pending',
                                                'bg-green-100 text-green-800': currentFarmer?.status === 'confirmed',
                                                'bg-red-100 text-red-800': currentFarmer?.status === 'rejected'
                                            }"
                                        >
                                            <span x-text="currentFarmer?.status.charAt(0).toUpperCase() + currentFarmer?.status.slice(1)"></span>
                                        </span>
                                        
                                        <span class="text-sm text-gray-500" x-text="'Applied on: ' + currentFarmer?.dateApplied"></span>
                                    </div>
                                    
                                    <!-- Farmer Information -->
                                    <div class="bg-gray-50 rounded-lg p-5 border border-gray-200">
                                        <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                            <i class="fas fa-user text-green-600 mr-2"></i> Farmer Information
                                        </h3>
                                        
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div>
                                                <p class="text-sm font-medium text-gray-500">Full Name</p>
                                                <p class="mt-1 text-sm text-gray-900" x-text="currentFarmer?.firstName + ' ' + currentFarmer?.lastName"></p>
                                            </div>
                                            
                                            <div>
                                                <p class="text-sm font-medium text-gray-500">Email</p>
                                                <p class="mt-1 text-sm text-gray-900" x-text="currentFarmer?.email"></p>
                                            </div>
                                            
                                            <div>
                                                <p class="text-sm font-medium text-gray-500">CIN (National ID)</p>
                                                <p class="mt-1 text-sm text-gray-900" x-text="currentFarmer?.cin"></p>
                                            </div>
                                            
                                            <div>
                                                <p class="text-sm font-medium text-gray-500">Phone Number</p>
                                                <p class="mt-1 text-sm text-gray-900" x-text="currentFarmer?.phone"></p>
                                            </div>
                                            
                                            <div>
                                                <p class="text-sm font-medium text-gray-500">Date of Birth</p>
                                                <p class="mt-1 text-sm text-gray-900" x-text="currentFarmer?.dob"></p>
                                            </div>
                                            
                                            <div class="md:col-span-2">
                                                <p class="text-sm font-medium text-gray-500">Address</p>
                                                <p class="mt-1 text-sm text-gray-900" x-text="currentFarmer?.address"></p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Farm Information -->
                                    <div class="bg-gray-50 rounded-lg p-5 border border-gray-200">
                                        <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                            <i class="fas fa-tractor text-green-600 mr-2"></i> Farm Information
                                        </h3>
                                        
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div>
                                                <p class="text-sm font-medium text-gray-500">Farm Name</p>
                                                <p class="mt-1 text-sm text-gray-900" x-text="currentFarmer?.farmName"></p>
                                            </div>
                                            
                                            <div>
                                                <p class="text-sm font-medium text-gray-500">Location</p>
                                                <p class="mt-1 text-sm text-gray-900" x-text="currentFarmer?.farmLocation"></p>
                                            </div>
                                            
                                            <div>
                                                <p class="text-sm font-medium text-gray-500">Size (Hectares)</p>
                                                <p class="mt-1 text-sm text-gray-900" x-text="currentFarmer?.farmSize + ' ha'"></p>
                                            </div>
                                            
                                            <div>
                                                <p class="text-sm font-medium text-gray-500">Farming Activities</p>
                                                <div class="mt-1 flex flex-wrap gap-1">
                                                    <template x-for="activity in currentFarmer?.farmingActivities" :key="activity">
                                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">
                                                            <span x-text="activity.charAt(0).toUpperCase() + activity.slice(1)"></span>
                                                        </span>
                                                    </template>
                                                </div>
                                            </div>
                                            
                                            <div class="md:col-span-2">
                                                <p class="text-sm font-medium text-gray-500">Farm Description</p>
                                                <p class="mt-1 text-sm text-gray-900" x-text="currentFarmer?.farmDescription"></p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Documents -->
                                    <div class="bg-gray-50 rounded-lg p-5 border border-gray-200">
                                        <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                            <i class="fas fa-file-alt text-green-600 mr-2"></i> Uploaded Documents
                                        </h3>
                                        
                                        <div class="space-y-4">
                                            <div class="flex items-center justify-between p-3 bg-white rounded-lg border border-gray-200">
                                                <div class="flex items-center">
                                                    <i class="fas fa-id-card text-gray-400 mr-3"></i>
                                                    <span class="text-sm font-medium text-gray-700">National ID (CIN)</span>
                                                </div>
                                                <div class="flex items-center gap-2" x-show="currentFarmer?.documents.nationalId">
                                                    <a 
                                                        :href="currentFarmer?.documents.nationalId" 
                                                        target="_blank" 
                                                        class="text-blue-600 hover:text-blue-800 text-sm font-medium"
                                                    >
                                                        View
                                                    </a>
                                                    <a 
                                                        :href="currentFarmer?.documents.nationalId" 
                                                        download 
                                                        class="text-gray-600 hover:text-gray-800"
                                                    >
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                </div>
                                                <span 
                                                    x-show="!currentFarmer?.documents.nationalId" 
                                                    class="text-sm text-gray-500"
                                                >
                                                    Not provided
                                                </span>
                                            </div>
                                            
                                            <div class="flex items-center justify-between p-3 bg-white rounded-lg border border-gray-200">
                                                <div class="flex items-center">
                                                    <i class="fas fa-certificate text-gray-400 mr-3"></i>
                                                    <span class="text-sm font-medium text-gray-700">Farmer Certificate</span>
                                                </div>
                                                <div class="flex items-center gap-2" x-show="currentFarmer?.documents.farmerCertificate">
                                                    <a 
                                                        :href="currentFarmer?.documents.farmerCertificate" 
                                                        target="_blank" 
                                                        class="text-blue-600 hover:text-blue-800 text-sm font-medium"
                                                    >
                                                        View
                                                    </a>
                                                    <a 
                                                        :href="currentFarmer?.documents.farmerCertificate" 
                                                        download 
                                                        class="text-gray-600 hover:text-gray-800"
                                                    >
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                </div>
                                                <span 
                                                    x-show="!currentFarmer?.documents.farmerCertificate" 
                                                    class="text-sm text-gray-500"
                                                >
                                                    Not provided
                                                </span>
                                            </div>
                                            
                                            <div class="flex items-center justify-between p-3 bg-white rounded-lg border border-gray-200">
                                                <div class="flex items-center">
                                                    <i class="fas fa-file-contract text-gray-400 mr-3"></i>
                                                    <span class="text-sm font-medium text-gray-700">Land Document</span>
                                                </div>
                                                <div class="flex items-center gap-2" x-show="currentFarmer?.documents.landDocument">
                                                    <a 
                                                        :href="currentFarmer?.documents.landDocument" 
                                                        target="_blank" 
                                                        class="text-blue-600 hover:text-blue-800 text-sm font-medium"
                                                    >
                                                        View
                                                    </a>
                                                    <a 
                                                        :href="currentFarmer?.documents.landDocument" 
                                                        download 
                                                        class="text-gray-600 hover:text-gray-800"
                                                    >
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                </div>
                                                <span 
                                                    x-show="!currentFarmer?.documents.landDocument" 
                                                    class="text-sm text-gray-500"
                                                >
                                                    Not provided
                                                </span>
                                            </div>
                                            
                                            <div class="flex items-center justify-between p-3 bg-white rounded-lg border border-gray-200">
                                                <div class="flex items-center">
                                                    <i class="fas fa-award text-gray-400 mr-3"></i>
                                                    <span class="text-sm font-medium text-gray-700">ONCA Attestation</span>
                                                </div>
                                                <div class="flex items-center gap-2" x-show="currentFarmer?.documents.oncaAttestation">
                                                    <a 
                                                        :href="currentFarmer?.documents.oncaAttestation" 
                                                        target="_blank" 
                                                        class="text-blue-600 hover:text-blue-800 text-sm font-medium"
                                                    >
                                                        View
                                                    </a>
                                                    <a 
                                                        :href="currentFarmer?.documents.oncaAttestation" 
                                                        download 
                                                        class="text-gray-600 hover:text-gray-800"
                                                    >
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                </div>
                                                <span 
                                                    x-show="!currentFarmer?.documents.oncaAttestation" 
                                                    class="text-sm text-gray-500"
                                                >
                                                    Not provided
                                                </span>
                                            </div>
                                            
                                            <div class="flex items-center justify-between p-3 bg-white rounded-lg border border-gray-200">
                                                <div class="flex items-center">
                                                    <i class="fas fa-book text-gray-400 mr-3"></i>
                                                    <span class="text-sm font-medium text-gray-700">Agricultural Register</span>
                                                </div>
                                                <div class="flex items-center gap-2" x-show="currentFarmer?.documents.agriculturalRegister">
                                                    <a 
                                                        :href="currentFarmer?.documents.agriculturalRegister" 
                                                        target="_blank" 
                                                        class="text-blue-600 hover:text-blue-800 text-sm font-medium"
                                                    >
                                                        View
                                                    </a>
                                                    <a 
                                                        :href="currentFarmer?.documents.agriculturalRegister" 
                                                        download 
                                                        class="text-gray-600 hover:text-gray-800"
                                                    >
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                </div>
                                                <span 
                                                    x-show="!currentFarmer?.documents.agriculturalRegister" 
                                                    class="text-sm text-gray-500"
                                                >
                                                    Not provided
                                                </span>
                                            </div>
                                            
                                            <div class="flex items-center justify-between p-3 bg-white rounded-lg border border-gray-200">
                                                <div class="flex items-center">
                                                    <i class="fas fa-file-alt text-gray-400 mr-3"></i>
                                                    <span class="text-sm font-medium text-gray-700">Farm Details Document</span>
                                                </div>
                                                <div class="flex items-center gap-2" x-show="currentFarmer?.documents.farmDetailsDoc">
                                                    <a 
                                                        :href="currentFarmer?.documents.farmDetailsDoc" 
                                                        target="_blank" 
                                                        class="text-blue-600 hover:text-blue-800 text-sm font-medium"
                                                    >
                                                        View
                                                    </a>
                                                    <a 
                                                        :href="currentFarmer?.documents.farmDetailsDoc" 
                                                        download 
                                                        class="text-gray-600 hover:text-gray-800"
                                                    >
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                </div>
                                                <span 
                                                    x-show="!currentFarmer?.documents.farmDetailsDoc" 
                                                    class="text-sm text-gray-500"
                                                >
                                                    Not provided
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Admin Notes -->
                                    <div class="bg-gray-50 rounded-lg p-5 border border-gray-200">
                                        <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                            <i class="fas fa-clipboard text-green-600 mr-2"></i> Admin Notes
                                        </h3>
                                        
                                        <textarea 
                                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                            rows="3"
                                            placeholder="Add notes about this application..."
                                        ></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Action buttons -->
                            <div class="flex-shrink-0 px-4 py-4 flex justify-end border-t border-gray-200 bg-white sticky bottom-0">
                                <button 
                                    type="button" 
                                    class="py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                    @click="closeFarmerDetails"
                                >
                                    Close
                                </button>
                                
                                <template x-if="currentFarmer?.status === 'pending'">
                                    <div class="ml-4 flex space-x-3">
                                        <button 
                                            type="button" 
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                            @click="rejectFarmer(currentFarmer?.id); closeFarmerDetails()"
                                        >
                                            Reject Application
                                        </button>
                                        
                                        <button 
                                            type="button" 
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                            @click="confirmFarmer(currentFarmer?.id); closeFarmerDetails()"
                                        >
                                            Confirm Application
                                        </button>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
