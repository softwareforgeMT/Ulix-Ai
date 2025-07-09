<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provider Profiles</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .star-filled {
            color: #3B82F6;
        }
        .social-btn {
            width: 40px; height: 40px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 9999px;
            transition: all 0.3s;
            font-size: 1.25rem;
        }
        .social-btn:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    @include('includes.header')
     @include('pages.popup')


    <!-- Social Media Share Card (centered above cards) -->
    <div class="flex justify-center mt-4 mb-8">
      <div class="flex items-center bg-gradient-to-r from-blue-500 to-blue-700 rounded-2xl px-6 py-3 shadow-lg space-x-4">
        <span class="text-white font-semibold flex items-center text-base">
          <span class="mr-2">🚀</span>Share this sheet to help your friends
        </span>
        <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-blue-400 hover:bg-white transition">
          <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/facebook.svg" alt="Facebook" class="w-5 h-5" />
        </a>
        <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-pink-400 hover:bg-white transition">
          <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/instagram.svg" alt="Instagram" class="w-5 h-5" />
        </a>
        <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-white hover:bg-white transition">
          <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/tiktok.svg" alt="TikTok" class="w-5 h-5" />
        </a>
        <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-red-600 hover:bg-white transition">
          <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/youtube.svg" alt="YouTube" class="w-5 h-5" />
        </a>
        <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-blue-300 hover:bg-white 0 transition">
          <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/twitter.svg" alt="Twitter" class="w-5 h-5" />
        </a>
      </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-6xl mx-auto px-4 py-6">
        <!-- Provider Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Card 1 -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200 relative">
                <!-- Removed Social Media Dropdown -->
                <div class="text-center mb-4">
                    <div class="w-20 h-20 bg-gray-300 rounded-full mx-auto mb-4"></div>
                    <div class="flex items-center justify-center gap-1 text-blue-500 text-sm mb-2">
                        <i class="fas fa-check"></i>
                        <span>Profile verified</span>
                    </div>
                    <div class="flex items-center justify-center gap-1 mb-2">
                        <i class="fas fa-star star-filled"></i>
                        <span class="text-sm font-medium">4.85 / 5</span>
                    </div>
                    <div class="flex items-center justify-center gap-1 text-blue-500 text-sm">
                        <!-- <i class="fas fa-check"></i> -->
                        <!-- <span>Car</span> -->
                    </div>
                </div>
                
                <div class="border-t pt-4">
                    <div class="text-center mb-4">
                        <span class="text-xs text-gray-500 uppercase tracking-wider">ULYSSE DEPPLUS X <TIME></span>
                    </div>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center gap-2 text-sm">
                            <i class="fas fa-seedling text-blue-500"></i>
                            <span>Gardener</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm">
                            <i class="fas fa-tools text-blue-500"></i>
                            <span>Work in Handyman</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm">
                            <i class="fas fa-calculator text-blue-500"></i>
                            <span>Accounting</span>
                        </div>
                    </div>
                    
                    <button class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg text-sm font-medium hover:bg-blue-600 transition-colors">
                        <a href="{{ route('provider-details')}}"> SEE MORE </a>
                    </button>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200 relative">
                <!-- Removed Social Media Dropdown -->
                <div class="text-center mb-4">
                    <div class="w-20 h-20 bg-gray-300 rounded-full mx-auto mb-4"></div>
                    <div class="flex items-center justify-center gap-1 text-blue-500 text-sm mb-2">
                        <i class="fas fa-check"></i>
                        <span>Profile verified</span>
                    </div>
                    <div class="flex items-center justify-center gap-1 mb-2">
                        <i class="fas fa-star star-filled"></i>
                        <span class="text-sm font-medium">4.85 / 5</span>
                    </div>
                    <div class="flex items-center justify-center gap-1 text-blue-500 text-sm">
                        <!-- <i class="fas fa-check"></i>
                        <span>Car</span> -->
                    </div>
                </div>
                
                <div class="border-t pt-4">
                    <div class="text-center mb-4">
                        <span class="text-xs text-gray-500 uppercase tracking-wider">ULYSSE DEPPLUS X <TIME></span>
                    </div>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center gap-2 text-sm">
                            <i class="fas fa-seedling text-blue-500"></i>
                            <span>Gardener</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm">
                            <i class="fas fa-tools text-blue-500"></i>
                            <span>Work in Handyman</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm">
                            <i class="fas fa-calculator text-blue-500"></i>
                            <span>Accounting</span>
                        </div>
                    </div>
                    
                    <button class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg text-sm font-medium hover:bg-blue-600 transition-colors">
                   <a href="{{ route('provider-details')}}"> SEE MORE </a>
                    </button>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200 relative">
                <!-- Removed Social Media Dropdown -->
                <div class="text-center mb-4">
                    <div class="w-20 h-20 bg-gray-300 rounded-full mx-auto mb-4"></div>
                    <div class="flex items-center justify-center gap-1 text-blue-500 text-sm mb-2">
                        <i class="fas fa-check"></i>
                        <span>Profile verified</span>
                    </div>
                    <div class="flex items-center justify-center gap-1 mb-2">
                        <i class="fas fa-star star-filled"></i>
                        <span class="text-sm font-medium">4.85 / 5</span>
                    </div>
                    <div class="flex items-center justify-center gap-1 text-blue-500 text-sm">
                        <!-- <i class="fas fa-check"></i>
                        <span>Car</span> -->
                    </div>
                </div>
                
                <div class="border-t pt-4">
                    <div class="text-center mb-4">
                        <span class="text-xs text-gray-500 uppercase tracking-wider">ULYSSE DEPPLUS X <TIME></span>
                    </div>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center gap-2 text-sm">
                            <i class="fas fa-seedling text-blue-500"></i>
                            <span>Gardener</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm">
                            <i class="fas fa-tools text-blue-500"></i>
                            <span>Work in Handyman</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm">
                            <i class="fas fa-calculator text-blue-500"></i>
                            <span>Accounting</span>
                        </div>
                    </div>
                    
                    <button class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg text-sm font-medium hover:bg-blue-600 transition-colors">
                      <a href="{{ route('provider-details')}}"> SEE MORE </a>
                    </button>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200 relative">
                <!-- Removed Social Media Dropdown -->
                <div class="text-center mb-4">
                    <div class="w-20 h-20 bg-gray-300 rounded-full mx-auto mb-4"></div>
                    <div class="flex items-center justify-center gap-1 text-blue-500 text-sm mb-2">
                        <i class="fas fa-check"></i>
                        <span>Profile verified</span>
                    </div>
                    <div class="flex items-center justify-center gap-1 mb-2">
                        <i class="fas fa-star star-filled"></i>
                        <span class="text-sm font-medium">4.85 / 5</span>
                    </div>
                    <div class="flex items-center justify-center gap-1 text-blue-500 text-sm">
                        <!-- <i class="fas fa-check"></i>
                        <span>Car</span> -->
                    </div>
                </div>
                
                <div class="border-t pt-4">
                    <div class="text-center mb-4">
                        <span class="text-xs text-gray-500 uppercase tracking-wider">ULYSSE DEPPLUS X <TIME></span>
                    </div>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center gap-2 text-sm">
                            <i class="fas fa-seedling text-blue-500"></i>
                            <span>Gardener</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm">
                            <i class="fas fa-tools text-blue-500"></i>
                            <span>Work in Handyman</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm">
                            <i class="fas fa-calculator text-blue-500"></i>
                            <span>Accounting</span>
                        </div>
                    </div>
                    
                    <button class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg text-sm font-medium hover:bg-blue-600 transition-colors">
                      <a href="{{ route('provider-details')}}"> SEE MORE </a>
                    </button>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200 relative">
                <!-- Removed Social Media Dropdown -->
                <div class="text-center mb-4">
                    <div class="w-20 h-20 bg-gray-300 rounded-full mx-auto mb-4"></div>
                    <div class="flex items-center justify-center gap-1 text-blue-500 text-sm mb-2">
                        <i class="fas fa-check"></i>
                        <span>Profile verified</span>
                    </div>
                    <div class="flex items-center justify-center gap-1 mb-2">
                        <i class="fas fa-star star-filled"></i>
                        <span class="text-sm font-medium">4.85 / 5</span>
                    </div>
                    <div class="flex items-center justify-center gap-1 text-blue-500 text-sm">
                        <!-- <i class="fas fa-check"></i>
                        <span>Car</span> -->
                    </div>
                </div>
                
                <div class="border-t pt-4">
                    <div class="text-center mb-4">
                        <span class="text-xs text-gray-500 uppercase tracking-wider">ULYSSE DEPPLUS X <TIME></span>
                    </div>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center gap-2 text-sm">
                            <i class="fas fa-seedling text-blue-500"></i>
                            <span>Gardener</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm">
                            <i class="fas fa-tools text-blue-500"></i>
                            <span>Work in Handyman</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm">
                            <i class="fas fa-calculator text-blue-500"></i>
                            <span>Accounting</span>
                        </div>
                    </div>
                    
                    <button class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg text-sm font-medium hover:bg-blue-600 transition-colors">
                       <a href="{{ route('provider-details')}}"> SEE MORE </a>
                    </button>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200 relative">
                <!-- Removed Social Media Dropdown -->
                <div class="text-center mb-4">
                    <div class="w-20 h-20 bg-gray-300 rounded-full mx-auto mb-4"></div>
                    <div class="flex items-center justify-center gap-1 text-blue-500 text-sm mb-2">
                        <i class="fas fa-check"></i>
                        <span>Profile verified</span>
                    </div>
                    <div class="flex items-center justify-center gap-1 mb-2">
                        <i class="fas fa-star star-filled"></i>
                        <span class="text-sm font-medium">4.85 / 5</span>
                    </div>
                    <div class="flex items-center justify-center gap-1 text-blue-500 text-sm">
                        <!-- <i class="fas fa-check"></i>
                        <span>Car</span> -->
                    </div>
                </div>
                
                <div class="border-t pt-4">
                    <div class="text-center mb-4">
                        <span class="text-xs text-gray-500 uppercase tracking-wider">ULYSSE DEPPLUS X <TIME></span>
                    </div>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center gap-2 text-sm">
                            <i class="fas fa-seedling text-blue-500"></i>
                            <span>Gardener</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm">
                            <i class="fas fa-tools text-blue-500"></i>
                            <span>Work in Handyman</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm">
                            <i class="fas fa-calculator text-blue-500"></i>
                            <span>Accounting</span>
                        </div>
                    </div>
                    
                    <button class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg text-sm font-medium hover:bg-blue-600 transition-colors">
                      <a href="{{ route('provider-details')}}"> SEE MORE </a>
                    </button>
                </div>
            </div>

            <!-- Card 7 -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200 relative">
                <!-- Removed Social Media Dropdown -->
                <div class="text-center mb-4">
                    <div class="w-20 h-20 bg-gray-300 rounded-full mx-auto mb-4"></div>
                    <div class="flex items-center justify-center gap-1 text-blue-500 text-sm mb-2">
                        <i class="fas fa-check"></i>
                        <span>Profile verified</span>
                    </div>
                    <div class="flex items-center justify-center gap-1 mb-2">
                        <i class="fas fa-star star-filled"></i>
                        <span class="text-sm font-medium">4.85 / 5</span>
                    </div>
                    <div class="flex items-center justify-center gap-1 text-blue-500 text-sm">
                        <!-- <i class="fas fa-check"></i>
                        <span>Car</span> -->
                    </div>
                </div>
                
                <div class="border-t pt-4">
                    <div class="text-center mb-4">
                        <span class="text-xs text-gray-500 uppercase tracking-wider">ULYSSE DEPPLUS X <TIME></span>
                    </div>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center gap-2 text-sm">
                            <i class="fas fa-seedling text-blue-500"></i>
                            <span>Gardener</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm">
                            <i class="fas fa-tools text-blue-500"></i>
                            <span>Work in Handyman</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm">
                            <i class="fas fa-calculator text-blue-500"></i>
                            <span>Accounting</span>
                        </div>
                    </div>
                    
                    <button class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg text-sm font-medium hover:bg-blue-600 transition-colors">
                      <a href="{{ route('provider-details')}}"> SEE MORE </a>
                    </button>
                </div>
            </div>

            <!-- Card 8 -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200 relative">
                <!-- Removed Social Media Dropdown -->
                <div class="text-center mb-4">
                    <div class="w-20 h-20 bg-gray-300 rounded-full mx-auto mb-4"></div>
                    <div class="flex items-center justify-center gap-1 text-blue-500 text-sm mb-2">
                        <i class="fas fa-check"></i>
                        <span>Profile verified</span>
                    </div>
                    <div class="flex items-center justify-center gap-1 mb-2">
                        <i class="fas fa-star star-filled"></i>
                        <span class="text-sm font-medium">4.85 / 5</span>
                    </div>
                    <div class="flex items-center justify-center gap-1 text-blue-500 text-sm">
                        <!-- <i class="fas fa-check"></i>
                        <span>Car</span> -->
                    </div>
                </div>
                
                <div class="border-t pt-4">
                    <div class="text-center mb-4">
                        <span class="text-xs text-gray-500 uppercase tracking-wider">ULYSSE DEPPLUS X <TIME></span>
                    </div>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center gap-2 text-sm">
                            <i class="fas fa-seedling text-blue-500"></i>
                            <span>Gardener</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm">
                            <i class="fas fa-tools text-blue-500"></i>
                            <span>Work in Handyman</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm">
                            <i class="fas fa-calculator text-blue-500"></i>
                            <span>Accounting</span>
                        </div>
                    </div>
                    
                    <button class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg text-sm font-medium hover:bg-blue-600 transition-colors">
                    <a href="dashboard{{ route('provider-details')}}"> SEE MORE </a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.partials.dashboard-mobile-navbar')
</body>
</html>

