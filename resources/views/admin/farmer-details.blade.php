@extends('Layouts.admin')

@section('title', 'Farmer Details')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Farmer Details</h1>
            <p class="text-gray-500 mt-1">Review detailed information about the farmer</p>
        </div>
        
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.farmer-registrations') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to List
            </a>
            
            @if($farmerData['status'] === 'pending')
            <button 
                onclick="rejectFarmer('{{ $farmerData['id'] }}')"
                class="px-4 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition-colors flex items-center"
            >
                <i class="fas fa-times mr-2"></i>
                Reject
            </button>
            
            <button 
                onclick="confirmFarmer('{{ $farmerData['id'] }}')"
                class="px-4 py-2 bg-green-100 text-green-700 rounded-lg hover:bg-green-200 transition-colors flex items-center"
            >
                <i class="fas fa-check mr-2"></i>
                Confirm
            </button>
            @endif
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Farmer Information -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-user text-green-600 mr-3"></i>
                    Farmer Information
                </h2>
                <span class="px-3 py-1 rounded-full text-sm font-medium {{ 
                    $farmerData['status'] === 'pending' ? 'bg-orange-100 text-orange-800' : 
                    ($farmerData['status'] === 'confirmed' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') 
                }}">
                    {{ ucfirst($farmerData['status']) }}
                </span>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-500">Full Name</label>
                    <p class="mt-1 text-gray-800">{{ $farmerData['firstName'] }} {{ $farmerData['lastName'] }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-500">Email</label>
                    <p class="mt-1 text-gray-800">{{ $farmerData['email'] }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-500">CIN</label>
                    <p class="mt-1 text-gray-800">{{ $farmerData['cin'] }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-500">Phone</label>
                    <p class="mt-1 text-gray-800">{{ $farmerData['phone'] }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-500">Date of Birth</label>
                    <p class="mt-1 text-gray-800">{{ $farmerData['dob'] }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-500">Address</label>
                    <p class="mt-1 text-gray-800">{{ $farmerData['address'] }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-500">Registration Date</label>
                    <p class="mt-1 text-gray-800">{{ $farmerData['dateApplied'] }}</p>
                </div>
            </div>
        </div>

        <!-- Farm Information -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h2 class="text-xl font-semibold text-gray-800 flex items-center mb-6">
                <i class="fas fa-tractor text-green-600 mr-3"></i>
                Farm Information
            </h2>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-500">Farm Name</label>
                    <p class="mt-1 text-gray-800">{{ $farmerData['farmName'] }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-500">Location</label>
                    <p class="mt-1 text-gray-800">{{ $farmerData['farmLocation'] }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-500">Size</label>
                    <p class="mt-1 text-gray-800">{{ $farmerData['farmSize'] }} hectares</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-500">Farming Activities</label>
                    <div class="mt-2 flex flex-wrap gap-2">
                        @foreach($farmerData['farmingActivities'] as $activity)
                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-sm">
                            {{ ucfirst($activity) }}
                        </span>
                        @endforeach
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-500">Description</label>
                    <p class="mt-1 text-gray-800">{{ $farmerData['farmDescription'] }}</p>
                </div>
            </div>
        </div>

        <!-- Documents -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 lg:col-span-2">
            <h2 class="text-xl font-semibold text-gray-800 flex items-center mb-6">
                <i class="fas fa-file-alt text-green-600 mr-3"></i>
                Documents
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- National ID -->
                <div class="p-4 border border-gray-200 rounded-lg">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <i class="fas fa-id-card text-gray-400 mr-3"></i>
                            <span class="text-sm font-medium text-gray-700">National ID (CIN)</span>
                        </div>
                        @if($farmerData['documents']['nationalId'])
                        <div class="flex items-center gap-2">
                            <a href="{{ $farmerData['documents']['nationalId'] }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ $farmerData['documents']['nationalId'] }}" download class="text-gray-600 hover:text-gray-800">
                                <i class="fas fa-download"></i>
                            </a>
                        </div>
                        @else
                        <span class="text-sm text-gray-500">Not provided</span>
                        @endif
                    </div>
                </div>

                <!-- Farmer Certificate -->
                <div class="p-4 border border-gray-200 rounded-lg">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <i class="fas fa-certificate text-gray-400 mr-3"></i>
                            <span class="text-sm font-medium text-gray-700">Farmer Certificate</span>
                        </div>
                        @if($farmerData['documents']['farmerCertificate'])
                        <div class="flex items-center gap-2">
                            <a href="{{ $farmerData['documents']['farmerCertificate'] }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ $farmerData['documents']['farmerCertificate'] }}" download class="text-gray-600 hover:text-gray-800">
                                <i class="fas fa-download"></i>
                            </a>
                        </div>
                        @else
                        <span class="text-sm text-gray-500">Not provided</span>
                        @endif
                    </div>
                </div>

                <!-- Land Document -->
                <div class="p-4 border border-gray-200 rounded-lg">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <i class="fas fa-file-contract text-gray-400 mr-3"></i>
                            <span class="text-sm font-medium text-gray-700">Land Document</span>
                        </div>
                        @if($farmerData['documents']['landDocument'])
                        <div class="flex items-center gap-2">
                            <a href="{{ $farmerData['documents']['landDocument'] }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ $farmerData['documents']['landDocument'] }}" download class="text-gray-600 hover:text-gray-800">
                                <i class="fas fa-download"></i>
                            </a>
                        </div>
                        @else
                        <span class="text-sm text-gray-500">Not provided</span>
                        @endif
                    </div>
                </div>

                <!-- ONCA Attestation -->
                <div class="p-4 border border-gray-200 rounded-lg">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <i class="fas fa-award text-gray-400 mr-3"></i>
                            <span class="text-sm font-medium text-gray-700">ONCA Attestation</span>
                        </div>
                        @if($farmerData['documents']['oncaAttestation'])
                        <div class="flex items-center gap-2">
                            <a href="{{ $farmerData['documents']['oncaAttestation'] }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ $farmerData['documents']['oncaAttestation'] }}" download class="text-gray-600 hover:text-gray-800">
                                <i class="fas fa-download"></i>
                            </a>
                        </div>
                        @else
                        <span class="text-sm text-gray-500">Not provided</span>
                        @endif
                    </div>
                </div>

                <!-- Agricultural Register -->
                <div class="p-4 border border-gray-200 rounded-lg">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <i class="fas fa-book text-gray-400 mr-3"></i>
                            <span class="text-sm font-medium text-gray-700">Agricultural Register</span>
                        </div>
                        @if($farmerData['documents']['agriculturalRegister'])
                        <div class="flex items-center gap-2">
                            <a href="{{ $farmerData['documents']['agriculturalRegister'] }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ $farmerData['documents']['agriculturalRegister'] }}" download class="text-gray-600 hover:text-gray-800">
                                <i class="fas fa-download"></i>
                            </a>
                        </div>
                        @else
                        <span class="text-sm text-gray-500">Not provided</span>
                        @endif
                    </div>
                </div>

                <!-- Farm Details Document -->
                <div class="p-4 border border-gray-200 rounded-lg">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <i class="fas fa-file-alt text-gray-400 mr-3"></i>
                            <span class="text-sm font-medium text-gray-700">Farm Details Document</span>
                        </div>
                        @if($farmerData['documents']['farmDetailsDoc'])
                        <div class="flex items-center gap-2">
                            <a href="{{ $farmerData['documents']['farmDetailsDoc'] }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ $farmerData['documents']['farmDetailsDoc'] }}" download class="text-gray-600 hover:text-gray-800">
                                <i class="fas fa-download"></i>
                            </a>
                        </div>
                        @else
                        <span class="text-sm text-gray-500">Not provided</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Admin Notes -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 lg:col-span-2">
            <h2 class="text-xl font-semibold text-gray-800 flex items-center mb-6">
                <i class="fas fa-clipboard text-green-600 mr-3"></i>
                Admin Notes
            </h2>

            <textarea 
                class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                rows="4"
                placeholder="Add notes about this farmer..."
            ></textarea>
        </div>
    </div>
</div>

@push('scripts')
<script>
async function confirmFarmer(farmerId) {
    if (!confirm('Are you sure you want to confirm this farmer?')) return;
    
    try {
        const response = await fetch(`/admin/farmers/${farmerId}/confirm`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
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
}

async function rejectFarmer(farmerId) {
    if (!confirm('Are you sure you want to reject this farmer?')) return;
    
    try {
        const response = await fetch(`/admin/farmers/${farmerId}/reject`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
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
</script>
@endpush

@endsection 