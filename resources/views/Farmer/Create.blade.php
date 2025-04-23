<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroConnect - Farmer Registration</title>
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
            background-color: #f8fafc;
            background-image: url('https://images.unsplash.com/photo-1523348837708-15d4a09cfac2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            position: relative;
        }
        
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.85));
            z-index: -1;
        }
        
        .form-header {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1625246333195-78d9c38ad449?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            position: relative;
            overflow: hidden;
        }
        
        .form-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(to right, #F97316, #16A34A);
        }
        
        .form-container {
            backdrop-filter: blur(10px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .form-section {
            transition: all 0.3s ease;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        }
        
        .form-section:hover {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.05);
            transform: translateY(-2px);
        }
        
        .file-upload {
            position: relative;
            overflow: hidden;
            display: inline-block;
            cursor: pointer;
        }
        
        .file-upload input[type=file] {
            position: absolute;
            font-size: 100px;
            opacity: 0;
            right: 0;
            top: 0;
            cursor: pointer;
        }
        
        .progress-step {
            position: relative;
            z-index: 1;
        }
        
        .progress-step::before {
            content: '';
            position: absolute;
            top: 50%;
            left: -50%;
            width: 100%;
            height: 3px;
            background-color: #E5E7EB;
            z-index: -1;
        }
        
        .progress-step:first-child::before {
            display: none;
        }
        
        .progress-step.active::before {
            background: linear-gradient(to right, #F97316, #16A34A);
        }
        
        .progress-step.completed::before {
            background: linear-gradient(to right, #F97316, #16A34A);
        }
        
        .progress-step-circle {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #E5E7EB;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6B7280;
            font-weight: 600;
            margin: 0 auto 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            border: 3px solid white;
            transition: all 0.3s ease;
        }
        
        .progress-step.active .progress-step-circle {
            background: linear-gradient(135deg, #F97316, #16A34A);
            color: white;
            transform: scale(1.1);
        }
        
        .progress-step.completed .progress-step-circle {
            background: linear-gradient(135deg, #16A34A, #15803D);
            color: white;
        }
        
        .required-field::after {
            content: '*';
            color: #EF4444;
            margin-left: 4px;
        }
        
        .section-header {
            position: relative;
            padding-bottom: 0.75rem;
            margin-bottom: 1.5rem;
            border-bottom: 1px solid #E5E7EB;
        }
        
        .section-header::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100px;
            height: 3px;
            background: linear-gradient(to right, #F97316, #16A34A);
            border-radius: 3px;
        }
        
        .input-field {
            transition: all 0.3s ease;
            border: 1px solid #E5E7EB;
        }
        
        .input-field:focus {
            border-color: #16A34A;
            box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.2);
        }
        
        .input-field:hover {
            border-color: #16A34A;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #F97316, #EA580C);
            color: white;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(249, 115, 22, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(249, 115, 22, 0.3);
        }
        
        .btn-secondary {
            background: white;
            color: #16A34A;
            border: 2px solid #16A34A;
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            background: #F0FDF4;
            transform: translateY(-2px);
        }
        
        .upload-box {
            transition: all 0.3s ease;
            border: 2px dashed #E5E7EB;
        }
        
        .upload-box:hover {
            border-color: #16A34A;
            background-color: #F0FDF4;
        }
        
        .leaf-decoration {
            position: absolute;
            opacity: 0.05;
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
        
        .leaf-3 {
            top: 40%;
            right: 10%;
            transform: rotate(45deg);
        }
        
        .leaf-4 {
            bottom: 30%;
            left: 10%;
            transform: rotate(-30deg);
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
        
        .nav-link:hover::after {
            width: 100%;
        }
    </style>
</head>
<body class="min-h-screen py-12 relative">
    <!-- Decorative elements -->
    <div class="leaf-decoration leaf-1">
        <svg width="300" height="300" viewBox="0 0 24 24" fill="#16A34A">
            <path d="M17.5,12C16.46,12 15.43,12.15 14.5,12.42V11.92C15.5,11.55 16.5,11.25 17.5,11C21,10 22,7 22,5C22,4.45 21.55,4 21,4C19,4 16,5 15,8.5C14.75,9.5 14.45,10.5 14.08,11.5C13.27,11.84 12.5,12.27 11.79,12.79C11.11,12.27 10.23,12 9.5,12H9C8.45,12 8,12.45 8,13V17C8,17.55 8.45,18 9,18H9.5C10.23,18 11.11,17.73 11.79,17.21C12.66,17.93 13.77,18.5 15,18.5C16.5,18.5 18.17,17.59 20.11,16.1C20.66,15.67 21,15.07 21,14.5C21,13.67 20.33,13 19.5,13H17.5M9.5,15.5V14.5H11.25C11.25,14.5 10.5,15.5 9.5,15.5Z" />
        </svg>
    </div>
    <div class="leaf-decoration leaf-2">
        <svg width="300" height="300" viewBox="0 0 24 24" fill="#F97316">
            <path d="M17.5,12C16.46,12 15.43,12.15 14.5,12.42V11.92C15.5,11.55 16.5,11.25 17.5,11C21,10 22,7 22,5C22,4.45 21.55,4 21,4C19,4 16,5 15,8.5C14.75,9.5 14.45,10.5 14.08,11.5C13.27,11.84 12.5,12.27 11.79,12.79C11.11,12.27 10.23,12 9.5,12H9C8.45,12 8,12.45 8,13V17C8,17.55 8.45,18 9,18H9.5C10.23,18 11.11,17.73 11.79,17.21C12.66,17.93 13.77,18.5 15,18.5C16.5,18.5 18.17,17.59 20.11,16.1C20.66,15.67 21,15.07 21,14.5C21,13.67 20.33,13 19.5,13H17.5M9.5,15.5V14.5H11.25C11.25,14.5 10.5,15.5 9.5,15.5Z" />
        </svg>
    </div>
    <div class="leaf-decoration leaf-3">
        <svg width="250" height="250" viewBox="0 0 24 24" fill="#16A34A">
            <path d="M17.5,12C16.46,12 15.43,12.15 14.5,12.42V11.92C15.5,11.55 16.5,11.25 17.5,11C21,10 22,7 22,5C22,4.45 21.55,4 21,4C19,4 16,5 15,8.5C14.75,9.5 14.45,10.5 14.08,11.5C13.27,11.84 12.5,12.27 11.79,12.79C11.11,12.27 10.23,12 9.5,12H9C8.45,12 8,12.45 8,13V17C8,17.55 8.45,18 9,18H9.5C10.23,18 11.11,17.73 11.79,17.21C12.66,17.93 13.77,18.5 15,18.5C16.5,18.5 18.17,17.59 20.11,16.1C20.66,15.67 21,15.07 21,14.5C21,13.67 20.33,13 19.5,13H17.5M9.5,15.5V14.5H11.25C11.25,14.5 10.5,15.5 9.5,15.5Z" />
        </svg>
    </div>
    <div class="leaf-decoration leaf-4">
        <svg width="200" height="200" viewBox="0 0 24 24" fill="#F97316">
            <path d="M17.5,12C16.46,12 15.43,12.15 14.5,12.42V11.92C15.5,11.55 16.5,11.25 17.5,11C21,10 22,7 22,5C22,4.45 21.55,4 21,4C19,4 16,5 15,8.5C14.75,9.5 14.45,10.5 14.08,11.5C13.27,11.84 12.5,12.27 11.79,12.79C11.11,12.27 10.23,12 9.5,12H9C8.45,12 8,12.45 8,13V17C8,17.55 8.45,18 9,18H9.5C10.23,18 11.11,17.73 11.79,17.21C12.66,17.93 13.77,18.5 15,18.5C16.5,18.5 18.17,17.59 20.11,16.1C20.66,15.67 21,15.07 21,14.5C21,13.67 20.33,13 19.5,13H17.5M9.5,15.5V14.5H11.25C11.25,14.5 10.5,15.5 9.5,15.5Z" />
        </svg>
    </div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Navigation -->
        <nav class="mb-8 bg-white bg-opacity-90 rounded-xl shadow-md p-4">
            <div class="flex items-center justify-between">
                <a href="/" class="flex items-center">
                    <svg class="w-10 h-10 mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#16A34A" stroke-width="2"/>
                        <path d="M7 12.5L10 15.5L17 8.5" stroke="#F97316" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="text-2xl font-bold">
                        <span class="text-orange-500">Agro</span><span class="text-green-600">Connect</span>
                    </span>
                </a>
                <a href="/" class="nav-link text-green-600 hover:text-green-700 flex items-center font-medium">
                    <i class="fas fa-arrow-left mr-2"></i> Back to Home
                </a>
            </div>
        </nav>
        
        <!-- Form Header -->
        <div class="form-header rounded-t-2xl p-10 text-white mb-6 shadow-xl">
            <h1 class="text-4xl font-bold mb-3">Farmer Registration</h1>
            <p class="text-xl opacity-90 max-w-2xl">Join our network of agricultural professionals and gain access to exclusive benefits and resources</p>
        </div>
        
        <!-- Progress Steps -->
        <div class="bg-white bg-opacity-95 p-8 mb-6 rounded-xl shadow-lg">
            <div class="flex justify-between">
                <div class="progress-step active">
                    <div class="progress-step-circle">1</div>
                    <div class="text-sm text-center font-medium">Personal Info</div>
                </div>
                <div class="progress-step">
                    <div class="progress-step-circle">2</div>
                    <div class="text-sm text-center font-medium">Farm Details</div>
                </div>
                <div class="progress-step">
                    <div class="progress-step-circle">3</div>
                    <div class="text-sm text-center font-medium">Documents</div>
                </div>
                <div class="progress-step">
                    <div class="progress-step-circle">4</div>
                    <div class="text-sm text-center font-medium">Review</div>
                </div>
            </div>
        </div>
        
        <!-- Registration Form -->
        <form class="form-container bg-white bg-opacity-95 rounded-2xl shadow-xl overflow-hidden">
            <!-- Section 1: Personal Information -->
            <div class="form-section p-8 border-b border-gray-100">
                <h2 class="section-header text-2xl font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-user-circle text-green-600 mr-3"></i> Personal Information
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="firstName" class="block text-sm font-medium text-gray-700 mb-1 required-field">First Name</label>
                        <input type="text" id="firstName" name="firstName" required
                            class="input-field w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>
                    
                    <div>
                        <label for="lastName" class="block text-sm font-medium text-gray-700 mb-1 required-field">Last Name</label>
                        <input type="text" id="lastName" name="lastName" required
                            class="input-field w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>
                    
                    <div>
                        <label for="cin" class="block text-sm font-medium text-gray-700 mb-1 required-field">CIN (National ID Number)</label>
                        <input type="text" id="cin" name="cin" required
                            class="input-field w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <p class="mt-1 text-xs text-gray-500">Enter your Carte d'identité nationale number</p>
                    </div>
                    
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1 required-field">Phone Number</label>
                        <input type="tel" id="phone" name="phone" required
                            class="input-field w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <input type="email" id="email" name="email"
                            class="input-field w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>
                    
                    <div>
                        <label for="dob" class="block text-sm font-medium text-gray-700 mb-1 required-field">Date of Birth</label>
                        <input type="date" id="dob" name="dob" required
                            class="input-field w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>
                </div>
                
                <div class="mt-6">
                    <label for="address" class="block text-sm font-medium text-gray-700 mb-1 required-field">Address</label>
                    <textarea id="address" name="address" rows="3" required
                        class="input-field w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"></textarea>
                    <p class="mt-1 text-xs text-gray-500">Address must match the rural/agricultural area on your CIN</p>
                </div>
            </div>
            
            <!-- Section 2: Farm Details -->
            <div class="form-section p-8 border-b border-gray-100">
                <h2 class="section-header text-2xl font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-tractor text-green-600 mr-3"></i> Farm Details
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="farmName" class="block text-sm font-medium text-gray-700 mb-1">Farm Name</label>
                        <input type="text" id="farmName" name="farmName"
                            class="input-field w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>
                    
                    <div>
                        <label for="farmSize" class="block text-sm font-medium text-gray-700 mb-1 required-field">Farm Size (Hectares)</label>
                        <input type="number" id="farmSize" name="farmSize" min="0" step="0.01" required
                            class="input-field w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>
                    
                    <div>
                        <label for="farmLocation" class="block text-sm font-medium text-gray-700 mb-1 required-field">Farm Location</label>
                        <input type="text" id="farmLocation" name="farmLocation" required
                            class="input-field w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <p class="mt-1 text-xs text-gray-500">Commune/Village/City where your farm is located</p>
                    </div>
                    
                    <div>
                        <label for="landOwnership" class="block text-sm font-medium text-gray-700 mb-1 required-field">Land Ownership Status</label>
                        <select id="landOwnership" name="landOwnership" required
                            class="input-field w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            <option value="">Select ownership status</option>
                            <option value="owned">Owned (Titre foncier)</option>
                            <option value="leased">Leased</option>
                            <option value="shared">Shared ownership</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
                
                <div class="mt-6">
                    <label class="block text-sm font-medium text-gray-700 mb-3 required-field">Primary Farming Activities</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        <div class="flex items-center p-3 border border-gray-200 rounded-lg hover:border-green-300 hover:bg-green-50 transition-colors">
                            <input type="checkbox" id="crops" name="farmingActivities[]" value="crops" class="h-5 w-5 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="crops" class="ml-3 text-sm text-gray-700">Crops/Vegetables</label>
                        </div>
                        <div class="flex items-center p-3 border border-gray-200 rounded-lg hover:border-green-300 hover:bg-green-50 transition-colors">
                            <input type="checkbox" id="fruits" name="farmingActivities[]" value="fruits" class="h-5 w-5 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="fruits" class="ml-3 text-sm text-gray-700">Fruits</label>
                        </div>
                        <div class="flex items-center p-3 border border-gray-200 rounded-lg hover:border-green-300 hover:bg-green-50 transition-colors">
                            <input type="checkbox" id="livestock" name="farmingActivities[]" value="livestock" class="h-5 w-5 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="livestock" class="ml-3 text-sm text-gray-700">Livestock</label>
                        </div>
                        <div class="flex items-center p-3 border border-gray-200 rounded-lg hover:border-green-300 hover:bg-green-50 transition-colors">
                            <input type="checkbox" id="poultry" name="farmingActivities[]" value="poultry" class="h-5 w-5 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="poultry" class="ml-3 text-sm text-gray-700">Poultry</label>
                        </div>
                        <div class="flex items-center p-3 border border-gray-200 rounded-lg hover:border-green-300 hover:bg-green-50 transition-colors">
                            <input type="checkbox" id="dairy" name="farmingActivities[]" value="dairy" class="h-5 w-5 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="dairy" class="ml-3 text-sm text-gray-700">Dairy</label>
                        </div>
                        <div class="flex items-center p-3 border border-gray-200 rounded-lg hover:border-green-300 hover:bg-green-50 transition-colors">
                            <input type="checkbox" id="other" name="farmingActivities[]" value="other" class="h-5 w-5 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="other" class="ml-3 text-sm text-gray-700">Other</label>
                        </div>
                    </div>
                </div>
                
                <div class="mt-6">
                    <label for="farmDescription" class="block text-sm font-medium text-gray-700 mb-1">Farm Description</label>
                    <textarea id="farmDescription" name="farmDescription" rows="4"
                        class="input-field w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        placeholder="Describe your farm, including types of crops, livestock, equipment, etc."></textarea>
                </div>
            </div>
            
            <!-- Section 3: Required Documents -->
            <div class="form-section p-8 border-b border-gray-100">
                <h2 class="section-header text-2xl font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-file-alt text-green-600 mr-3"></i> Required Documents
                </h2>
                
                <div class="space-y-6">
                    <div class="p-5 bg-gradient-to-r from-orange-50 to-green-50 border-l-4 border-orange-500 rounded-md shadow-sm">
                        <p class="text-sm text-gray-700 flex items-start">
                            <i class="fas fa-info-circle text-orange-500 mr-2 mt-1"></i>
                            <span>All documents should be clear, legible scans or photos. Accepted formats: PDF, JPG, PNG (max 5MB each).</span>
                        </p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2 required-field">Certificat d'agriculteur (Farmer Certificate)</label>
                            <div class="file-upload w-full">
                                <div class="upload-box flex items-center justify-center w-full px-4 py-4 rounded-lg bg-white hover:bg-green-50 transition-colors">
                                    <i class="fas fa-upload text-green-500 mr-3 text-xl"></i>
                                    <span class="text-sm text-gray-600">Upload certificate</span>
                                    <input type="file" name="farmerCertificate" required accept=".pdf,.jpg,.jpeg,.png">
                                </div>
                                <p class="mt-2 text-xs text-gray-500">Issued by local authorities (commune rurale or caïdat)</p>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2 required-field">Carte d'identité nationale (CIN)</label>
                            <div class="file-upload w-full">
                                <div class="upload-box flex items-center justify-center w-full px-4 py-4 rounded-lg bg-white hover:bg-green-50 transition-colors">
                                    <i class="fas fa-id-card text-green-500 mr-3 text-xl"></i>
                                    <span class="text-sm text-gray-600">Upload ID card (both sides)</span>
                                    <input type="file" name="nationalId" required accept=".pdf,.jpg,.jpeg,.png">
                                </div>
                                <p class="mt-2 text-xs text-gray-500">National ID with address matching rural/agricultural area</p>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2 required-field">Titre de propriété / Contrat de location</label>
                            <div class="file-upload w-full">
                                <div class="upload-box flex items-center justify-center w-full px-4 py-4 rounded-lg bg-white hover:bg-green-50 transition-colors">
                                    <i class="fas fa-file-contract text-green-500 mr-3 text-xl"></i>
                                    <span class="text-sm text-gray-600">Upload land document</span>
                                    <input type="file" name="landDocument" required accept=".pdf,.jpg,.jpeg,.png">
                                </div>
                                <p class="mt-2 text-xs text-gray-500">Land ownership title or notarized lease agreement</p>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Attestation de l'ONCA (if available)</label>
                            <div class="file-upload w-full">
                                <div class="upload-box flex items-center justify-center w-full px-4 py-4 rounded-lg bg-white hover:bg-green-50 transition-colors">
                                    <i class="fas fa-certificate text-green-500 mr-3 text-xl"></i>
                                    <span class="text-sm text-gray-600">Upload ONCA attestation</span>
                                    <input type="file" name="oncaAttestation" accept=".pdf,.jpg,.jpeg,.png">
                                </div>
                                <p class="mt-2 text-xs text-gray-500">Proof of agricultural guidance or training</p>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Inscription au registre agricole (if available)</label>
                            <div class="file-upload w-full">
                                <div class="upload-box flex items-center justify-center w-full px-4 py-4 rounded-lg bg-white hover:bg-green-50 transition-colors">
                                    <i class="fas fa-book text-green-500 mr-3 text-xl"></i>
                                    <span class="text-sm text-gray-600">Upload register document</span>
                                    <input type="file" name="agriculturalRegister" accept=".pdf,.jpg,.jpeg,.png">
                                </div>
                                <p class="mt-2 text-xs text-gray-500">Formal agricultural register recognition</p>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Fiche d'exploitation agricole</label>
                            <div class="file-upload w-full">
                                <div class="upload-box flex items-center justify-center w-full px-4 py-4 rounded-lg bg-white hover:bg-green-50 transition-colors">
                                    <i class="fas fa-file-alt text-green-500 mr-3 text-xl"></i>
                                    <span class="text-sm text-gray-600">Upload farm details document</span>
                                    <input type="file" name="farmDetailsDoc" accept=".pdf,.jpg,.jpeg,.png">
                                </div>
                                <p class="mt-2 text-xs text-gray-500">Detailed document describing your farm</p>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Quittances / reçus d'achat (if available)</label>
                            <div class="file-upload w-full">
                                <div class="upload-box flex items-center justify-center w-full px-4 py-4 rounded-lg bg-white hover:bg-green-50 transition-colors">
                                    <i class="fas fa-receipt text-green-500 mr-3 text-xl"></i>
                                    <span class="text-sm text-gray-600">Upload receipts</span>
                                    <input type="file" name="farmingReceipts" accept=".pdf,.jpg,.jpeg,.png" multiple>
                                </div>
                                <p class="mt-2 text-xs text-gray-500">Receipts for farming-related purchases or tax payments</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Section 4: Terms and Submission -->
            <div class="form-section p-8">
                <h2 class="section-header text-2xl font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-check-circle text-green-600 mr-3"></i> Terms and Submission
                </h2>
                
                <div class="mb-6">
                    <div class="flex items-start p-4 bg-white rounded-lg shadow-sm border border-gray-100">
                        <div class="flex items-center h-5 mt-1">
                            <input id="terms" name="terms" type="checkbox" required
                                class="h-5 w-5 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="terms" class="font-medium text-gray-700">I agree to the Terms and Conditions</label>
                            <p class="text-gray-500 mt-1">By submitting this form, I certify that all information provided is accurate and complete. I understand that false information may result in rejection of my application.</p>
                        </div>
                    </div>
                </div>
                
                <div class="mb-6">
                    <div class="flex items-start p-4 bg-white rounded-lg shadow-sm border border-gray-100">
                        <div class="flex items-center h-5 mt-1">
                            <input id="dataConsent" name="dataConsent" type="checkbox" required
                                class="h-5 w-5 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="dataConsent" class="font-medium text-gray-700">Data Processing Consent</label>
                            <p class="text-gray-500 mt-1">I consent to AgroConnect processing my personal data for the purpose of farmer registration and verification in accordance with the Privacy Policy.</p>
                        </div>
                    </div>
                </div>
                
                <div class="flex flex-col sm:flex-row justify-between mt-8 gap-4">
                    <button type="button" class="btn-secondary px-6 py-3 rounded-lg text-center">
                        <i class="fas fa-save mr-2"></i> Save as Draft
                    </button>
                    
                    <button type="submit" class="btn-primary px-8 py-3 rounded-lg text-center font-semibold">
                        <i class="fas fa-paper-plane mr-2"></i> Submit Registration
                    </button>
                </div>
            </div>
        </form>
        
        <!-- Help Section -->
        <div class="mt-8 bg-white bg-opacity-95 rounded-xl shadow-lg p-6">
            <h3 class="text-xl font-semibold mb-4 text-gray-800 flex items-center">
                <i class="fas fa-question-circle text-orange-500 mr-2"></i> Need Help?
            </h3>
            <p class="text-gray-600 mb-4">If you have any questions about the registration process or required documents, please contact our support team:</p>
            <div class="flex flex-col sm:flex-row items-center gap-4">
                <a href="tel:+212500000000" class="text-green-600 hover:text-green-700 flex items-center bg-green-50 px-4 py-2 rounded-lg">
                    <i class="fas fa-phone mr-2"></i> +212 5 00 00 00 00
                </a>
                <a href="mailto:support@agroconnect.com" class="text-green-600 hover:text-green-700 flex items-center bg-green-50 px-4 py-2 rounded-lg">
                    <i class="fas fa-envelope mr-2"></i> support@agroconnect.com
                </a>
            </div>
        </div>
        
        <!-- Footer -->
        <footer class="mt-8 text-center text-gray-500 text-sm">
            <p>&copy; 2023 AgroConnect. All rights reserved.</p>
        </footer>
    </div>
    
    <!-- File Upload Preview Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInputs = document.querySelectorAll('input[type="file"]');
            
            fileInputs.forEach(input => {
                input.addEventListener('change', function() {
                    const fileLabel = this.parentElement.querySelector('span');
                    if (this.files.length > 0) {
                        if (this.files.length === 1) {
                            fileLabel.textContent = this.files[0].name;
                        } else {
                            fileLabel.textContent = `${this.files.length} files selected`;
                        }
                        this.parentElement.classList.add('bg-green-50');
                        this.parentElement.classList.add('border-green-300');
                    } else {
                        fileLabel.textContent = 'Upload document';
                        this.parentElement.classList.remove('bg-green-50');
                        this.parentElement.classList.remove('border-green-300');
                    }
                });
            });
        });
    </script>
</body>
</html>