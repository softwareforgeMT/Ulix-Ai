<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <head>
  <title>Abroad Ease Guide - Your Global Companion</title>
  <link rel="icon" type="image/png" sizes="64x64" href="images/logoblue-64.png" />


</head> -->

  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
@import url('https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap');
</style>
  <!-- In the <head> -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />

  
  <style>
@font-face {
  font-family: 'Inter';
  src: url('font/Inter-Regular.woff2') format('woff2');
  font-weight: 400;
  font-style: normal;
}


body {
  font-family: 'Inter', sans-serif;
}





    
    /* Custom Animations */
    @keyframes float {
      0%, 100% { transform: translateY(0px) rotate(0deg); }
      50% { transform: translateY(-20px) rotate(3deg); }
    }
    
    @keyframes pulse-glow {
      0%, 100% { box-shadow: 0 0 20px rgba(59, 130, 246, 0.4); }
      50% { box-shadow: 0 0 40px rgba(59, 130, 246, 0.8); }
    }
    
    @keyframes slide-up {
      0% { opacity: 0; transform: translateY(50px); }
      100% { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes shimmer {
      0% { background-position: -200% 0; }
      100% { background-position: 200% 0; }
    }
    
    @keyframes bounce-in {
      0% { transform: scale(0.3) rotate(-10deg); opacity: 0; }
      50% { transform: scale(1.05) rotate(5deg); }
      70% { transform: scale(0.9) rotate(-2deg); }
      100% { transform: scale(1) rotate(0deg); opacity: 1; }
    }
    
    @keyframes orbit {
      0% { transform: rotate(0deg) translateX(20px) rotate(0deg); }
      100% { transform: rotate(360deg) translateX(20px) rotate(-360deg); }
    }
    
    @keyframes morph-blob {
      0%, 100% { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; }
      25% { border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%; }
      50% { border-radius: 50% 60% 30% 60% / 30% 60% 70% 40%; }
      75% { border-radius: 60% 40% 60% 30% / 70% 30% 60% 70%; }
    }
    
    @keyframes fade-in {
      0% { opacity: 0; transform: translateY(30px); }
      100% { opacity: 1; transform: translateY(0); }
    }
    
    
    .animate-pulse-glow { animation: pulse-glow 2s ease-in-out infinite; }
    .animate-slide-up { animation: slide-up 0.8s ease-out forwards; }
    .animate-shimmer { animation: shimmer 3s linear infinite; }
    .animate-bounce-in { animation: bounce-in 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55) forwards; }
    .animate-orbit { animation: orbit 8s linear infinite; }
    .animate-morph-blob { animation: morph-blob 6s ease-in-out infinite; }
    .animate-fade-in { animation: fade-in 0.8s ease-out forwards; }
    
    .glass-effect {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .shimmer-text {
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
      background-size: 200% 100%;
    }
    
    .hover-lift {
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    
    .hover-lift:hover {
      transform: translateY(-8px) scale(1.05);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }
    
    .feature-card {
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      position: relative;
      overflow: hidden;
    }
    
    .feature-card:hover {
      transform: translateY(-20px) scale(1.05);
    }
    
    .feature-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
      transition: left 0.6s ease;
    }
    
    .feature-card:hover::before {
      left: 100%;
    }
    
    .gradient-bg {
      background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 30%, #f1f5f9 60%, #e2e8f0 100%);
    }
    
    .mesh-pattern {
      background-image: 
        radial-gradient(circle at 25px 25px, rgba(59, 130, 246, 0.08) 2px, transparent 2px),
        radial-gradient(circle at 75px 75px, rgba(147, 51, 234, 0.06) 2px, transparent 2px);
      background-size: 100px 100px;
    }
    
    .popup-overlay {
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease;
    }
    
    .category-item:hover .popup-overlay {
      opacity: 1;
      visibility: visible;
    }
  </style>

   <style>
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-slide-up {
            animation: slideUp 0.8s ease-out forwards;
        }
        
        .testimonial-card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        
        .testimonial-card:hover {
            transform: translateY(-5px);
        }
        
        .center-card {
            background: white ;
            border-radius: 20px;
            padding: 32px;
            color: black;
            text-align: center;
            box-shadow: 0 20px 40px rgba(59, 130, 246, 0.3);
        }
    </style>


 <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .faq-content {
            max-height: 0;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .faq-content.active {
            max-height: 200px;
            animation: slideDown 0.4s ease-out forwards;
        }
        
        .faq-icon {
            transition: transform 0.3s ease;
        }
        
        .faq-toggle.active .faq-icon {
            transform: rotate(135deg);
        }
        
         .floating-shape {
            position: absolute;
            opacity: 0.1;
            animation: float 6s ease-in-out infinite;
        }
        
        .floating-shape:nth-child(2) { animation-delay: -2s; }
        .floating-shape:nth-child(3) { animation-delay: -4s; } 
        
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .card-hover:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }
        
        .bg-animated {
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }
        
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .number-badge {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 14px;
            margin-right: 12px;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }
    </style>
   <style>
        .search-popup {
             background: linear-gradient(135deg, #667eea 0%,rgb(55, 28, 129) 100%); 
        }
        .category-card {
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }
        .category-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

      .fade {
  transition: opacity 0.5s ease-in-out;
  opacity: 1;
}
.fade.out {
  opacity: 0;
}




    </style>

  

</head>

<body class="bg-gray-50 overflow-x-hidden w-full "  >
@include('includes.header')
 @include('pages.popup')

 


<!-- <section class="relative bg-blue-600 text-center py-32 px-4 overflow-hidden">

 
  <div class="absolute inset-0 opacity-10 z-0" 
       style="background-image: radial-gradient(circle at 2px 2px, rgba(255,255,255,0.3) 1px, transparent 0); 
              background-size: 40px 40px;">
  </div>  -->
<!-- Hero Section -->
<section data-aos="fade-up" class="search-popup min-h-[600px] w-full flex items-center justify-center p-6 bg-blue-700 relative font-inter">
  <!-- Hero Content -->
  <div class="max-w-4xl mx-auto relative z-10">
    <div class="space-y-6 mb-12">
      <h1 class="text-4xl md:text-7xl font-bold mb-6 leading-tight text-white">
        <span>Need help? Want to help?</span><br>
        <!-- <span class="text-white/90">when facing your</span><br>
        <span class="text-white/90 text-transparent">
          needs abroad
        </span> -->
      </h1>
    <p class="text-white/90 text-xl md:text-2xl mb-12 font-light leading-relaxed text-center">
  ulixai connects, expats and service provider worldwide
</p>

    </div>

    <!-- Search Box -->
    <div class="max-w-1xl mx-auto relative">
      <div class="flex items-center rounded-full overflow-hidden shadow-2xl border-2 border-white/20 bg-white/95 backdrop-blur-sm">
        <div class="flex-grow relative">
          <input
            id="searchInput"
             readonly
            type="text"
            placeholder="Search Here"
            class="w-full px-8 py-5 text-lg text-gray-700 bg-transparent focus:outline-none placeholder-gray-500"
            onfocus="openSearchPopup()"
            
          />
          <div class="absolute left-6 top-1/2 transform -translate-y-1/2 text-gray-400">
            <!-- <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <circle cx="11" cy="11" r="7" />
              <line x1="21" y1="21" x2="16.65" y2="16.65" />
            </svg> -->
          </div>
        </div>
        <button
          id=""
          
          class="w-16 h-16 rounded-full bg-blue-700 hover:bg-blue-800 flex items-center justify-center text-white mr-2 transition-colors"
          aria-label="Search"
        >
          <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <circle cx="11" cy="11" r="7" />
            <line x1="21" y1="21" x2="16.65" y2="16.65" />
          </svg>
        </button>
      </div>
    </div>
  </div>




<!---Demo--->
 
  <!-- <div class="max-w-6xl mx-auto text-center relative z-10">
    <h1 class="text-4xl md:text-6xl font-bold leading-tight">Welcome Abroad</h1>
    <p class="text-lg mt-4">Find services tailored to your journey</p>
  </div> -->

  <!-- Floating Categories Section -->
  <!-- Floating Categories Section (Desktop only) -->
<div class="hidden md:block absolute left-1/2 bottom-0 translate-y-[80%] -translate-x-1/2 z-20 w-full max-w-6xl px-4 mb-2">


    <div class="bg-white rounded-xl shadow-md py-2 px-2 backdrop-blur-sm">


      <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4 place-items-center text-center">


        <!-- Students -->
        <div class="group relative">
          <div class="flex flex-col items-center space-y-2 p-2 rounded-2xl bg-white/80 backdrop-blur-sm   transition-all duration-300 justify-center cursor-pointer">
            <div class="relative">
              <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-700 rounded-full flex items-center justify-center text-white text-2xl shadow-lg animate-pulse-glow hover:shadow-purple-300">
                🎓
              </div>
              <div class="absolute -top-1 -right-1 w-4 h-4 bg-green-400 rounded-full animate-pulse"></div>
            </div>
            <span class="text-sm text-gray-700 font-semibold group-hover:text-purple-600 transition-colors">Students</span>
          </div>
        </div>

        <!-- Expatriés (with popup) -->
        <div class="relative group" id="expat-container">
          <div onclick="toggleExpatPopup()" class="flex flex-col items-center space-y-2 p-2 rounded-2xl bg-white/80 backdrop-blur-sm  transition-all duration-300  cursor-pointer">
            <div class="relative">
              <div class="w-14 h-14 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-full flex items-center justify-center text-white text-2xl shadow-lg animate-pulse-glow hover:shadow-yellow-300">✈️</div>
              <div class="absolute -top-1 -right-1 w-4 h-4 bg-blue-400 rounded-full animate-pulse"></div>
            </div>
            <span class="text-sm text-gray-700 font-semibold group-hover:text-yellow-600 transition-colors">Expatriés</span>
          </div>

          <!-- Popup -->
          <div id="expat-popup" class="absolute top-full left-1/2 transform -translate-x-1/2 mt-4 scale-100 opacity-100 transition-all duration-300 z-50 hidden">
            <div class="w-80 bg-white/90 backdrop-blur-xl rounded-3xl shadow-2xl p-8 border-2 border-white/30">
              <div class="absolute -top-2 left-1/2 transform -translate-x-1/2 w-4 h-4 bg-white/90 rotate-45 border-l border-t border-white/30"></div>
              <div class="flex justify-center mb-4">
                <div class="w-10 h-10 rounded-full bg-red-500 text-white flex items-center justify-center text-lg shadow-lg animate-bounce">🚶‍♂️</div>
              </div>
              <h3 class="text-xl font-bold text-blue-800 mb-6 text-center">I'M…</h3>
              <div class="grid grid-cols-3 gap-3 text-white text-xs font-semibold">
                <div class="bg-gradient-to-br from-orange-400 to-orange-600 py-3 px-2 rounded-xl hover:scale-105 transition-transform cursor-pointer shadow-lg text-center">Vacationers</div>
                <div class="bg-gradient-to-br from-blue-500 to-blue-700 py-3 px-2 rounded-xl hover:scale-105 transition-transform cursor-pointer shadow-lg text-center">Expatriates</div>
                <div class="bg-gradient-to-br from-green-500 to-green-700 py-3 px-2 rounded-xl hover:scale-105 transition-transform cursor-pointer shadow-lg text-center">Investors</div>
                <div class="bg-gradient-to-br from-gray-600 to-gray-800 py-3 px-2 rounded-xl hover:scale-105 transition-transform cursor-pointer shadow-lg text-center">Workers</div>
                <div class="bg-gradient-to-br from-purple-500 to-purple-700 py-3 px-2 rounded-xl hover:scale-105 transition-transform cursor-pointer shadow-lg text-center">Digital Nomads</div>
                <div class="bg-gradient-to-br from-yellow-400 to-yellow-600 py-3 px-2 rounded-xl hover:scale-105 transition-transform cursor-pointer shadow-lg text-center text-gray-900">Students</div>
              </div>
              <div class="mt-6 text-right">
                <button class="text-blue-600 font-semibold hover:text-blue-800 transition-colors flex items-center justify-end w-full group/btn">
                  <span class="mr-2">Next</span>
                  <svg class="w-4 h-4 transform group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
         <!-- Migrants -->
      <div class="group relative">
        <div class="flex flex-col items-center space-y-2 p-2 rounded-2xl bg-white/80 backdrop-blur-sm transition-all duration-300 ">
          <div class="relative">
            <div class="w-16 h-16 bg-gradient-to-br from-red-400 to-red-600 rounded-full flex items-center justify-center text-white text-2xl shadow-lg animate-pulse-glow hover:shadow-red-300">
              🚶‍♂️
            </div>
            <div class="absolute -top-1 -right-1 w-4 h-4 bg-orange-400 rounded-full animate-pulse"></div>
          </div>
          <span class="text-sm text-gray-700 font-semibold group-hover:text-red-600 transition-colors">Migrants</span>
        </div>
      </div>
     <!-- Refugees (with click popup) -->
<div class="relative z-50">
  <!-- Trigger Button -->
  <div onclick="toggleRefugeePopup()" class="flex flex-col items-center space-y-2 p-2 rounded-2xl bg-white/80 backdrop-blur-sm transition-all duration-300 cursor-pointer">
    <div class="relative">
      <div class="w-14 h-14 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center text-white text-2xl shadow-lg animate-pulse-glow">
        👨‍👩‍👧‍👦
      </div>
      <div class="absolute -top-1 -right-1 w-4 h-4 bg-blue-400 rounded-full animate-pulse"></div>
    </div>
    <span class="text-sm text-gray-700 font-semibold transition-colors">Refugees</span>
  </div>

  <!-- Popup -->
  <div id="refugeePopup" class="absolute top-full left-1/2 transform -translate-x-1/2 mt-4 scale-95 opacity-0 invisible transition-all duration-300">
    <div class="w-80 bg-white/90 backdrop-blur-xl rounded-3xl shadow-2xl p-8 border-2 border-white/30">
      <div class="absolute -top-2 left-1/2 transform -translate-x-1/2 w-4 h-4 bg-white/90 rotate-45 border-l border-t border-white/30"></div>
      <h3 class="text-xl font-bold text-green-700 mb-6 text-center">I'M…</h3>
      <div class="grid grid-cols-3 gap-3 text-white text-xs font-semibold">
        <div class="bg-gradient-to-br from-green-400 to-green-600 py-3 px-2 rounded-xl hover:scale-105 transition-transform cursor-pointer shadow-lg text-center">Asylum Seeker</div>
        <div class="bg-gradient-to-br from-blue-400 to-blue-600 py-3 px-2 rounded-xl hover:scale-105 transition-transform cursor-pointer shadow-lg text-center">Displaced</div>
        <div class="bg-gradient-to-br from-yellow-400 to-yellow-600 py-3 px-2 rounded-xl hover:scale-105 transition-transform cursor-pointer shadow-lg text-center">Humanitarian</div>
      </div>
      <div class="mt-6 text-right">
        <button class="text-green-600 font-semibold hover:text-green-800 transition-colors flex items-center justify-end w-full group/btn">
          <span class="mr-2">Next</span>
          <svg class="w-4 h-4 transform group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
          </svg>
        </button>
      </div>
    </div>
  </div>
</div>


       <!-- Travelers -->
      <div class="group relative">
        <div class="flex flex-col items-center space-y-2 p-2 rounded-2xl bg-white/80 backdrop-blur-sm  transition-all duration-300 ">
          <div class="relative">
            <div class="w-14 h-14 bg-gradient-to-br from-gray-400 to-gray-600 rounded-full flex items-center justify-center text-white text-2xl shadow-lg animate-pulse-glow hover:shadow-gray-400">
              🧳
            </div>
            <div class="absolute -top-1 -right-1 w-4 h-4 bg-purple-400 rounded-full animate-pulse"></div>
          </div>
          <span class="text-sm text-gray-700 font-semibold group-hover:text-gray-600 transition-colors">Travelers & Freelancers</span>
        </div>
      </div>
        <!-- Add remaining categories exactly like you had: Migrants, Refugees, Travelers, etc. -->
        <!-- Just paste them inside the same grid row -->

      </div>
    </div>
  </div>

</section>








 @php 
    $country = [
        'English', 
        'French', 
        'Spanish', 
        'Portuguese', 
        'German', 
        'Italian', 
        'Arabic', 
        'Japanese', 
        'Korean', 
        'Hindi', 
        'Turkish'
    ];
@endphp

<div class="mt-0 sm:mt-[100px]">

<!-- Service Listings Section -->
<section class="max-w-7xl mx-auto px-4 py-8">
    <!-- Header -->
    <div class="text-center mb-8">
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold text-blue-500 mb-2">
            All your service needs worldwide
        </h1>
    </div>
  
    <!-- Filters -->
    <div class="flex flex-wrap justify-center items-center gap-4 mb-8 bg-white p-4 rounded-lg shadow-sm">       
        <!-- Country Dropdowns -->
        <select id="languageSelect" class="border border-blue-200 rounded-lg px-4 py-2 min-w-[150px] text-blue-900 bg-white">
            @foreach($country as $lang)
              <option value="{{ $lang }}">{{ $lang }}</option>
            @endforeach
        </select>
        <select id="countrySelect" class="border border-blue-200 rounded-lg px-4 py-2 min-w-[150px] text-blue-900 bg-white">
            @foreach($country as $lang)
              <option value="{{ $lang }}">{{ $lang }}</option>
            @endforeach
        </select>
        
        <!-- Category Dropdown -->
        <select id="categorySelect" class="border border-blue-200 rounded-lg px-4 py-2 min-w-[150px] text-blue-900 bg-white">
            <option value="">Select Category</option>
            @foreach($category as $cat)
              <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach  
        </select>

        <!-- Sub-category Dropdown (hidden initially) -->
        <select id="subcategorySelect" class="border border-blue-200 rounded-lg px-4 py-2 min-w-[150px] text-blue-900 bg-white hidden">
            <option value="">Select Sub-category</option>
            <!-- Subcategories will be dynamically added here based on the selected category -->
        </select>
        
        <button id="filterButton" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded-lg transition-all duration-150">
            Filter
        </button>
    </div>

    <!-- Service Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" id="serviceGrid">
        <!-- Card 1 -->
        @foreach ($providers as $provider)
            @php
                $avgRating = round($provider->reviews()->avg('rating') ?? 0);
                $reviewCount = $provider->reviews()->count();
                $statuses = json_decode($provider->special_status, true) ?? [];
            @endphp

            <a href="{{ route('provider-details', ['id' => $provider->slug]) }}" class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow cursor:pointer">
                <div class="relative aspect-[9/12] w-full">
                    <img src="{{ $provider->profile_photo ?? 'images/attachment.png'}}" 
                        alt="profile" class="absolute inset-0 w-full h-full object-cover">

                    <div class="absolute top-2 left-2 flex items-center flex-wrap">
                        <img src="https://flagcdn.com/w20/th.png" alt="Thailand Flag" class="w-4 h-3 mr-1">
                        
                        <span class="bg-blue-600 text-white px-2 py-1 rounded text-xs">{{ $provider->country ?? 'Visas' }}</span>
                           
                    </div>

                    <div class="absolute bottom-2 left-2">
                        <span class="bg-blue-500 text-white px-2 py-1 rounded text-xs">{{ $provider->preferred_language ?? 'English' }}</span>
                    </div>
                </div>

                <div class="p-4">
                    <div class="flex items-center mb-2">
                        <h3 class="font-semibold text-lg">{{ $provider->first_name ?? '_' }}</h3>
                        <span class="ml-auto text-lg font-semibold">45€/h</span>
                    </div>

                    <p class="text-gray-600 text-sm mb-2">Country service: {{ $provider->operational_countries }}</p>

                    <div class="flex items-center mb-3">
                        <div class="flex text-yellow-400">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $avgRating)
                                    <i class="fas fa-star"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
                        </div>
                        <span class="text-sm text-gray-600 ml-2">{{ number_format($provider->reviews()->avg('rating'), 1) }} ({{ $reviewCount }} Reviews)</span>
                    </div>

                    <div class="flex gap-2 text-xs text-gray-500">
                      @foreach ($statuses as $index => $status)
                        <span class="bg-gray-100 px-2 py-1 rounded">{{ $index }}</span>
                      @endforeach
                    </div>
                </div>
            </a>
        @endforeach

    </div>
</section>





<!-- Remove this spacer if not needed -->
  <!-- <div class="block sm:hidden h-16"></div> -->
  <!-- Enhanced Features Section -->
  <section data-aos="fade-left" class="relative gradient-bg py-24 px-4 overflow-hidden mt-2 ">

    <!-- Decorative Background -->
    <div class="absolute inset-0 overflow-hidden mesh-pattern opacity-40"></div>
    
    <!-- Floating Orbs -->
    <div class="absolute top-20 left-10 w-24 h-24 bg-blue-200/30 animate-morph-blob"></div>
    <div class="absolute top-40 right-20 w-32 h-32 bg-purple-200/20 " style="animation-delay: 2s;"></div>
    <div class="absolute bottom-20 left-1/4 w-40 h-40 bg-blue-100/40 animate-morph-blob" style="animation-delay: 4s;"></div>
    
    <div class="max-w-7xl mx-auto relative z-10">
      <!-- Section Header -->
      <div class="text-center mb-20">
        <div class="inline-block relative">
          <h2 class="text-5xl font-bold text-gray-800 mb-6 animate-slide-up">Why Choose Us</h2>
          <div class="absolute -inset-4 bg-gradient-to-r from-blue-600/20 via-purple-600/20 to-blue-600/20 blur-xl opacity-60 animate-pulse-glow"></div>
        </div>
        <div class="w-40 h-1.5 bg-gradient-to-r from-blue-500 via-purple-500 to-blue-500 mx-auto rounded-full animate-slide-up mb-8" style="animation-delay: 0.2s;"></div>
        <p class="text-gray-600 text-xl max-w-2xl mx-auto animate-slide-up" style="animation-delay: 0.4s;">
          Because we are the only platform that centralizes all you abroad needs , all in one place  Verified Providers that you choose yourself and rates that are much lower then traditional solutions 
        </p>
      </div>
      
      <!-- Features Grid -->
      <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-8">

        <!-- Feature 1: Users -->
        <div class="feature-card bg-white/80 backdrop-blur-sm p-8 rounded-3xl text-center animate-slide-up group border border-gray-100 hover:border-blue-200 transition-all duration-300" style="animation-delay: 0.1s;">
          <div class="relative mb-8">
            <div class="relative w-20 h-20 mx-auto">
              <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-700 rounded-2xl flex items-center justify-center animate-pulse-glow group-hover:scale-110 transition-transform duration-300 shadow-lg">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m3 0a4 4 0 016 0m6 0V7a4 4 0 00-4-4H7a4 4 0 00-4 4v7a4 4 0 004 4zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
              </div>
              <div class="absolute top-0 left-1/2 w-3 h-3 bg-blue-300 rounded-full animate-orbit"></div>
            </div>
          </div>
          
          <div class="space-y-3">
            <h3 class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">5,000+</h3>
            <p class="text-gray-700 font-bold text-lg">Happy Users</p>
            <p class="text-sm text-gray-500 leading-relaxed">Global community of satisfied customers worldwide</p>
          </div>
        </div>

        <!-- Feature 2: Verified -->
        <div class="feature-card bg-white/80 backdrop-blur-sm p-8 rounded-3xl text-center animate-slide-up group border border-gray-100 hover:border-green-200 transition-all duration-300" style="animation-delay: 0.2s;">
          <div class="relative mb-8">
            <div class="relative w-20 h-20 mx-auto">
              <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-emerald-700 rounded-2xl flex items-center justify-center animate-pulse-glow group-hover:scale-110 transition-transform duration-300 shadow-lg">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
              </div>
              <div class="absolute top-0 left-1/2 w-3 h-3 bg-green-300 rounded-full animate-orbit" style="animation-delay: 1s;"></div>
            </div>
          </div>
          
          <div class="space-y-3">
            <h3 class="text-3xl font-bold text-green-600">100%</h3>
            <p class="text-gray-700 font-bold text-lg">Verified</p>
            <p class="text-sm text-gray-500 leading-relaxed">All providers thoroughly vetted and certified</p>
          </div>
        </div>

        <!-- Feature 3: Security -->
        <div class="feature-card bg-white/80 backdrop-blur-sm p-8 rounded-3xl text-center animate-slide-up group border border-gray-100 hover:border-yellow-200 transition-all duration-300" style="animation-delay: 0.3s;">
          <div class="relative mb-8">
            <div class="relative w-20 h-20 mx-auto">
              <div class="w-20 h-20 bg-gradient-to-br from-yellow-500 to-orange-700 rounded-2xl flex items-center justify-center animate-pulse-glow group-hover:scale-110 transition-transform duration-300 shadow-lg">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
              </div>
              <div class="absolute top-0 left-1/2 w-3 h-3 bg-yellow-300 rounded-full animate-orbit" style="animation-delay: 2s;"></div>
            </div>
          </div>
          
          <div class="space-y-3">
            <h3 class="text-3xl font-bold text-yellow-600">SSL</h3>
            <p class="text-gray-700 font-bold text-lg">Secure</p>
            <p class="text-sm text-gray-500 leading-relaxed">256-bit encryption for maximum security</p>
          </div>
        </div>

        <!-- Feature 4: Support -->
        <div class="feature-card bg-white/80 backdrop-blur-sm p-8 rounded-3xl text-center animate-slide-up group border border-gray-100 hover:border-purple-200 transition-all duration-300" style="animation-delay: 0.4s;">
          <div class="relative mb-8">
            <div class="relative w-20 h-20 mx-auto">
              <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-indigo-700 rounded-2xl flex items-center justify-center animate-pulse-glow group-hover:scale-110 transition-transform duration-300 shadow-lg">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
              </div>
              <div class="absolute top-0 left-1/2 w-3 h-3 bg-purple-300 rounded-full animate-orbit" style="animation-delay: 3s;"></div>
            </div>
          </div>
          
          <div class="space-y-3">
            <h3 class="text-3xl font-bold text-purple-600">24/7</h3>
            <p class="text-gray-700 font-bold text-lg">Service</p>
            <p class="text-sm text-gray-500 leading-relaxed">Around the world</p>
          </div>
        </div>

      </div>
      
      <!-- Bottom CTA -->
      <div class="mt-20 text-center">
        <div class="inline-flex items-center space-x-4 bg-white/80 backdrop-blur-sm px-8 py-4 rounded-2xl border border-gray-100 shadow-lg">
          <div class="flex space-x-2">
            <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
            <div class="w-3 h-3 bg-blue-400 rounded-full animate-pulse" style="animation-delay: 0.5s;"></div>
            <div class="w-3 h-3 bg-purple-400 rounded-full animate-pulse" style="animation-delay: 1s;"></div>
          </div>
          <span class="text-gray-700 font-semibold">Trusted by thousands worldwide</span>
        </div>
      </div>
    </div>
  </section>

 <!-- How it works -->
<section data-aos="fade-right" class="bg-blue-50 py-16 px-4">
  <div class="max-w-7xl mx-auto text-center">
    <h2 class="text-4xl font-bold text-gray-900 mb-10">How does it work?</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">

      <!-- Step 1 -->
      <div class="bg-white rounded-xl shadow-lg p-8 text-center hover:shadow-xl transition-shadow duration-300 animate-slide-up" style="animation-delay: 0.1s;">
        <div class="flex justify-center mb-6">
          <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-700 rounded-2xl flex items-center justify-center">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z"/>
            </svg>
          </div>
        </div>
        <h3 class="text-xl font-semibold text-gray-900 mb-4">Describe your situation</h3>
        <p class="text-gray-600 leading-relaxed">
          Request help for free in 2 minutes
        </p>
      </div>

      <!-- Step 2 -->
      <div class="bg-white rounded-xl shadow-lg p-8 text-center hover:shadow-xl transition-shadow duration-300 animate-slide-up" style="animation-delay: 0.2s;">
        <div class="flex justify-center mb-6">
          <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-700 rounded-2xl flex items-center justify-center">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
          </div>
        </div>
        <h3 class="text-xl font-semibold text-gray-900 mb-4">Choose between 2 solutions</h3>
        <ul class="text-gray-600 space-y-2 text-left">
          <li class="flex items-start"><span class="text-orange-500 mr-2 mt-1">•</span> One or more service provider see your request for help</li>
          <li class="flex items-start"><span class="text-orange-500 mr-2 mt-1">•</span> And offer you their rates to meet your needs</li>
        </ul>
      </div>

      <!-- Step 3 -->
      <div class="bg-white rounded-xl shadow-lg p-8 text-center hover:shadow-xl transition-shadow duration-300 animate-slide-up" style="animation-delay: 0.3s;">
        <div class="flex justify-center mb-6">
          <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-700 rounded-2xl flex items-center justify-center">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
          </div>
        </div>
        <h3 class="text-xl font-semibold text-gray-900 mb-4">You Choose your Service</h3>
        <ul class="text-gray-600 space-y-2 text-left">
          <li class="flex items-start"><span class="text-purple-500 mr-2 mt-1">✔</span> You choose the service provider you prefer based on their price, review, and skills</li>
        </ul>
      </div>

      <!-- Step 4 -->
      <div class="bg-white rounded-xl shadow-lg p-8 text-center hover:shadow-xl transition-shadow duration-300 animate-slide-up" style="animation-delay: 0.4s;">
        <div class="flex justify-center mb-6">
          <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-pink-700 rounded-2xl flex items-center justify-center">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 20h9"/>
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16"/>
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 8l7-4 7 4"/>
            </svg>
          </div>
        </div>
        <h3 class="text-xl font-semibold text-gray-900 mb-4">In Progress</h3>
        <p class="text-gray-600 leading-relaxed">
          The Service Provider carries out the Mission
        </p>
      </div>

      <!-- Step 5 -->
      <div class="bg-white rounded-xl shadow-lg p-8 text-center hover:shadow-xl transition-shadow duration-300 animate-slide-up" style="animation-delay: 0.5s;">
        <div class="flex justify-center mb-6">
          <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-yellow-700 rounded-2xl flex items-center justify-center">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
              <path stroke-linecap="round" stroke-linejoin="round" d="M20 21V7"/>
            </svg>
          </div>
        </div>
        <h3 class="text-xl font-semibold text-gray-900 mb-4">Review the Work</h3>
        <p class="text-gray-600 leading-relaxed">
          your note and trigger payment to the service provider 
        </p>
      </div>

    </div>
  </div>
</section>


    <!-- Testimonials Section -->
    <section data-aos="fade-zoom-in" class="bg-gradient-to-br from-blue-400 via-blue-500 to-blue-600 py-20 px-4">
        <div class="max-w-7xl mx-auto">
            
            <!-- Grid Layout -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-center">
                
                <!-- Left Column - Top and Bottom Testimonials -->
                <div class="space-y-8">
                    <!-- Top Left Testimonial -->
                    <div class="testimonial-card animate-slide-up h-[300px]" style="animation-delay: 0.1s;">
                        <div class="flex items-center space-x-3 mb-4">
                            <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="User photo" class="w-12 h-12 rounded-full object-cover"/>
                            <div>
                                <h3 class="font-bold text-lg text-gray-800">Visa issue at the airport</h3>
                                <div class="text-yellow-400 text-sm">★★★★★</div>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            I was about to board my flight when I realized my visa had errors. Thanks to Ulixai, I got a personalized file in under 10 minutes and solved everything. What a relief!
                        </p>
                    </div>
                    
                    <!-- Bottom Left Testimonial -->
                    <div class="testimonial-card animate-slide-up h-[300px]" style="animation-delay: 0.4s;">
                        <div class="flex items-center space-x-3 mb-4">
                            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="User photo" class="w-12 h-12 rounded-full object-cover"/>
                            <div>
                                <h3 class="font-bold text-lg text-gray-800">Blocked by the local police</h3>
                                <div class="text-yellow-400 text-sm">★★★★★</div>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            I was stuck in a country where no one spoke English. Ulixai sent me the exact documents to show, and I was able to resolve the situation peacefully.
                        </p>
                    </div>
                </div>
                
                <!-- Center Column - Main Image and Featured Review -->
                <div class="space-y-8">
                    <!-- Center Image -->
                    <div class="flex justify-center animate-slide-up h-[400px]" style="animation-delay: 0.2s;">
                        <div class="w-80 h-150 bg-gradient-to-br from-blue-300 to-blue-500 rounded-2xl shadow-2xl border-4 border-white flex items-center justify-center overflow-hidden">
                            <img src="images/centerReview.png" alt="Woman smiling" class="w-full h-full object-cover"/>
                        </div>
                    </div>
                    
                    <!-- Center Featured Review -->
                    <div class="center-card animate-slide-up h-[300px]" style="animation-delay: 0.5s;">
                        <h3 class="text-2xl font-bold mb-4">Remarquable</h3>
                        <div class="text-yellow-300 text-xl mb-4">★★★★★</div>
                        <p class="text-black/90 leading-relaxed">
                            En moins de 10 minutes, j'ai retrouvé un poids en moins sur les épaules. Ulixai m'a aidé à trouver toutes les solutions adaptées à ma situation.
                            <br><br>
                            <strong class="text-yellow-700">Un immense soulagement.</strong>
                        </p>
                    </div>
                </div>
                
                <!-- Right Column - Top and Bottom Testimonials -->
                <div class="space-y-8">
                    <!-- Top Right Testimonial -->
                    <div class="testimonial-card animate-slide-up h-[300px]" style="animation-delay: 0.3s;">
                        <div class="flex items-center space-x-3 mb-4">
                            <img src="https://randomuser.me/api/portraits/men/44.jpg" alt="User photo" class="w-12 h-12 rounded-full object-cover"/>
                            <div>
                                <h3 class="font-bold text-lg text-gray-800">Mon passeport volé</h3>
                                <div class="text-yellow-400 text-sm">★★★★★</div>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Voler son passeport dans un pays inconnu est un cauchemar. Ulixai m'a guidé étape par étape pour refaire mes papiers et m'en sortir sans galère.
                        </p>
                    </div>
                    
                    <!-- Bottom Right Testimonial -->
                    <div class="testimonial-card animate-slide-up h-[300px]" style="animation-delay: 0.6s;">
                        <div class="flex items-center space-x-3 mb-4">
                            <img src="https://randomuser.me/api/portraits/women/29.jpg" alt="User photo" class="w-12 h-12 rounded-full object-cover"/>
                            <div>
                                <h3 class="font-bold text-lg text-gray-800">Démarches administratives</h3>
                                <div class="text-yellow-400 text-sm">★★★★★</div>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Toutes les démarches compliquées pour s'installer à l'étranger sont devenues faciles grâce à Ulixai. Un vrai changement de vie.
                        </p>
                    </div>
                </div>
                
            </div>
            
        </div>
    </section>



          <!-- Maps Section -->
    <section class="relative py-20 px-4 sm:px-6 lg:px-8 bg-blue-900 overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 bg-black/10"></div>
        <div class="absolute top-0 left-0 w-full h-full">
            <div class="absolute top-20 left-10 w-72 h-72 bg-blue-200/20 rounded-full blur-3xl animate-pulse-slow"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-blue-800/20 rounded-full blur-3xl animate-pulse-slow" style="animation-delay: 1.5s;"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-16 animate-fade-in">
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6">
                    Service <span class="bg-gradient-to-r from-blue-200 to-cyan-200 bg-clip-text text-transparent">Providers Worldwide</span>
                </h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
                    Visit us at our headquarters or get in touch. We're conveniently located in the heart of the city with easy access to public transportation.
                </p>
            </div>

            <!-- Maps Container -->
            <div class="flex justify-center animate-slide-up">
                <!-- Google Maps -->
                <div class="relative max-w-4xl w-full">
                    <div class="relative overflow-hidden rounded-3xl shadow-2xl border border-white/20 group">
                        <!-- Map Container -->
                        <div class="aspect-[16/10] md:aspect-[16/9] lg:aspect-[16/8] relative">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3168.639225589593!2d-122.08424908469285!3d37.42199997982525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fba02425dad8f%3A0x6c296c66619367e0!2sGoogleplex!5e0!3m2!1sen!2sus!4v1703123456789!5m2!1sen!2sus" 
                                class="w-full h-full border-0 transition-all duration-500 group-hover:scale-105"
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade"
                                title="Our Location">
                            </iframe>
                        </div>
                        
                        <!-- Overlay gradient for better visual integration -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent pointer-events-none"></div>
                        
                        <!-- Floating action button -->
                        <div class="absolute bottom-4 right-4">
                            <a href="https://maps.google.com/?q=Googleplex,+Mountain+View,+CA" 
                               target="_blank"
                               class="inline-flex items-center space-x-2 bg-white/90 backdrop-blur-sm text-gray-900 px-4 py-2 rounded-full shadow-lg hover:bg-white hover:scale-105 transition-all duration-300 font-medium">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm4-16h6m0 0v6m0-6L10 14"></path>
                                </svg>
                                <span>Open in Maps</span>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Decorative elements -->
                    <div class="absolute -top-4 -left-4 w-24 h-24 bg-blue-400/30 rounded-full blur-xl"></div>
                    <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-cyan-400/30 rounded-full blur-xl"></div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="text-center mt-16 animate-fade-in" style="animation-delay: 0.5s;">
                <div class="inline-flex items-center space-x-4 bg-white/10 backdrop-blur-lg rounded-full px-8 py-4 border border-white/20">
                    <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                    <span class="text-white font-medium">We're open and ready to help!</span>
                </div>
            </div>
        </div>
    </section>


  <!-- News Section (Desktop only) -->
<section data-aos="fade-zoom-out" class="hidden md:block bg-white py-16 px-4">
  <div class="max-w-7xl mx-auto">
    <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">Latest News</h2>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-8">
      
      <!-- News Card 1 -->
      <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 animate-slide-up" style="animation-delay: 0.1s;">
        <div class="w-full h-48 bg-gradient-to-br from-amber-400 to-orange-500 flex items-center justify-center text-4xl">
          🍺
        </div>
        <div class="p-6">
          <a href="https://blog.ulixai.com/visa-remote-working-secrets-pour-expatries-inspires/" class="text-blue-700 font-semibold text-lg block hover:underline transition-colors">
            Incredible Secrets for a Globetrotter's Temporary Residency
          </a>
          <p class="text-gray-500 mt-3 text-sm">May 25, 2025</p>
        </div>
      </div>

      <!-- News Card 2 -->
      <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 animate-slide-up" style="animation-delay: 0.2s;">
        <div class="w-full h-48 bg-gradient-to-br from-orange-400 to-red-500 flex items-center justify-center text-4xl">
          🍂
        </div>
        <div class="p-6">
          <a href="https://blog.ulixai.com/guide-rapide-formuler-parfaitement-avec-ulixai/" class="text-blue-700 font-semibold text-lg block hover:underline transition-colors">
            Step-by-Step Guide: Leaving a Country Quickly and Efficiently
          </a>
          <p class="text-gray-500 mt-3 text-sm">May 25, 2025</p>
        </div>
      </div>

      <!-- News Card 3 -->
      <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 animate-slide-up" style="animation-delay: 0.3s;">
        <div class="w-full h-48 bg-gradient-to-br from-yellow-400 to-orange-400 flex items-center justify-center text-4xl">
          🏜️
        </div>
        <div class="p-6">
          <a href="https://blog.ulixai.com/lancer-un-business-a-letranger-1ere-checklist/" class="text-blue-700 font-semibold text-lg block hover:underline transition-colors">
            Essential Tip: Avoid Traps with Ulixai
          </a>
          <p class="text-gray-500 mt-3 text-sm">May 25, 2025</p>
        </div>
      </div>

    </div>
  </div>
</section>

   <!-- Floating Background Shapes -->
    <!-- <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="floating-shape w-64 h-64 bg-purple-300 rounded-full blur-3xl absolute top-20 left-10"></div>
        <div class="floating-shape w-96 h-96 bg-blue-300 rounded-full blur-3xl absolute top-1/2 right-10"></div>
        <div class="floating-shape w-80 h-80 bg-pink-300 rounded-full blur-3xl absolute bottom-20 left-1/2"></div>
    </div> -->
<!-- FAQ Section -->
<section  data-aos="fade-flip-lef" t class="relative py-20 px-4 min-h-screen flex items-center bg-white">
  <div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="text-center mb-16">
      <h1 class="text-6xl font-black mb-4 text-blue-600">Frequently Asked</h1>
      <h2 class="text-6xl font-black mb-6 text-black">Questions</h2>
      <div class="w-24 h-1 bg-blue-600 mx-auto rounded-full"></div>
      <p class="text-xl text-gray-700 mt-6 max-w-2xl mx-auto">
        Everything you need to know about our services, answered with clarity and precision.
      </p>
    </div>

    <!-- FAQ Container -->
    <div class="space-y-2" id="faq-container"> <!-- reduced spacing -->

      <!-- FAQ Item 1 -->
      <div class="card-hover glass-effect rounded-2xl overflow-hidden group border border-gray-200 bg-white">
        <button class="w-full flex items-center p-4 text-left font-bold text-black faq-toggle hover:bg-gray-100 transition-all duration-300">
          <div class="number-badge mr-4 text-white">1</div>
          <span class="flex-1 text-xl">How does your service work?</span>
          <div class="faq-icon text-3xl text-gray-600 font-light">+</div>
        </button>
        <div class="faq-content px-8 pb-0 text-gray-800 hidden">
          <div class="pb-8 pt-4 border-t border-gray-200">
            <p class="text-lg leading-relaxed">
              Our service connects you with industry experts who provide step-by-step guidance 
              for your specific needs. We deliver personalized, comprehensive documents tailored 
              to your requirements with lightning-fast turnaround times.
            </p>
          </div>
        </div>
      </div>

      <!-- Repeat for other FAQs -->
      <!-- FAQ Item 2 -->
      <div class="card-hover glass-effect rounded-2xl overflow-hidden group border border-gray-200 bg-white">
        <button class="w-full flex items-center p-4 text-left font-bold text-black faq-toggle hover:bg-gray-100 transition-all duration-300">
          <div class="number-badge mr-4 text-white">2</div>
          <span class="flex-1 text-xl">How long does it take to receive my report?</span>
          <div class="faq-icon text-3xl text-gray-600 font-light">+</div>
        </button>
        <div class="faq-content px-8 pb-0 text-gray-800 hidden">
          <div class="pb-8 pt-4 border-t border-gray-200">
            <p class="text-lg leading-relaxed">
              Our advanced processing system ensures you receive your comprehensive report 
              within 10-15 minutes of submission. For complex requests, delivery may take 
              up to 30 minutes, but we always keep you informed of the progress.
            </p>
          </div>
        </div>
      </div>

      <!-- FAQ Item 3 -->
      <div class="card-hover glass-effect rounded-2xl overflow-hidden group border border-gray-200 bg-white">
        <button class="w-full flex items-center p-4 text-left font-bold text-black faq-toggle hover:bg-gray-100 transition-all duration-300">
          <div class="number-badge mr-4 text-white">3</div>
          <span class="flex-1 text-xl">How much does the service cost?</span>
          <div class="faq-icon text-3xl text-gray-600 font-light">+</div>
        </button>
        <div class="faq-content px-8 pb-0 text-gray-800 hidden">
          <div class="pb-8 pt-4 border-t border-gray-200">
            <p class="text-lg leading-relaxed">
              Our transparent pricing starts from just $5 for basic requests. The final cost 
              depends on complexity, urgency, and specific requirements. We provide upfront 
              pricing with no hidden fees, and premium features for enhanced service levels.
            </p>
          </div>
        </div>
      </div>

      <!-- FAQ Item 4 -->
      <div class="card-hover glass-effect rounded-2xl overflow-hidden group border border-gray-200 bg-white">
        <button class="w-full flex items-center p-4 text-left font-bold text-black faq-toggle hover:bg-gray-100 transition-all duration-300">
          <div class="number-badge mr-4 text-white">4</div>
          <span class="flex-1 text-xl">What payment methods do you accept?</span>
          <div class="faq-icon text-3xl text-gray-600 font-light">+</div>
        </button>
        <div class="faq-content px-8 pb-0 text-gray-800 hidden">
          <div class="pb-8 pt-4 border-t border-gray-200">
            <p class="text-lg leading-relaxed">
              We accept all major credit cards (Visa, MasterCard, American Express), 
              PayPal, Apple Pay, Google Pay, and various digital wallets. All transactions 
              are secured with bank-level encryption for your peace of mind.
            </p>
          </div>
        </div>
      </div>

      <!-- FAQ Item 5 -->
      <div class="card-hover glass-effect rounded-2xl overflow-hidden group border border-gray-200 bg-white">
        <button class="w-full flex items-center p-4 text-left font-bold text-black faq-toggle hover:bg-gray-100 transition-all duration-300">
          <div class="number-badge mr-4 text-white">5</div>
          <span class="flex-1 text-xl">Is my data secure and confidential?</span>
          <div class="faq-icon text-3xl text-gray-600 font-light">+</div>
        </button>
        <div class="faq-content px-8 pb-0 text-gray-800 hidden">
          <div class="pb-8 pt-4 border-t border-gray-200">
            <p class="text-lg leading-relaxed">
              Absolutely! We employ enterprise-grade security measures including end-to-end 
              encryption, secure data centers, and strict confidentiality protocols. Your 
              information is never shared with third parties and is automatically purged 
              after service completion.
            </p>
          </div>
        </div>
      </div>

    </div>

   
  </div>
</section>



@include('includes.footer')
<script>
  document.querySelectorAll(".faq-toggle").forEach((btn) => {
  btn.addEventListener("click", () => {
    const content = btn.nextElementSibling;
    const icon = btn.querySelector(".faq-icon");

    // Close all other FAQ items
    document.querySelectorAll(".faq-content").forEach((item) => {
      if (item !== content) {
        item.classList.add("hidden");
      }
    });

    document.querySelectorAll(".faq-icon").forEach((item) => {
      if (item !== icon) {
        item.textContent = "+";
      }
    });

    // Toggle current item
    content.classList.toggle("hidden");
    icon.textContent = content.classList.contains("hidden") ? "+" : "–";
  });
});

</script>

  <script>
  


        // FAQ Toggle Functionality
        const faqToggles = document.querySelectorAll('.faq-toggle');

        faqToggles.forEach((toggle, index) => {
            toggle.addEventListener('click', () => {
                const content = toggle.nextElementSibling;
                const isActive = toggle.classList.contains('active');

                // Close all other FAQ items
                faqToggles.forEach((otherToggle, otherIndex) => {
                    if (otherIndex !== index) {
                        const otherContent = otherToggle.nextElementSibling;
                        otherToggle.classList.remove('active');
                        otherContent.classList.remove('active');
                    }
                });

                // Toggle current FAQ item
                if (isActive) {
                    toggle.classList.remove('active');
                    content.classList.remove('active');
                } else {
                    toggle.classList.add('active');
                    content.classList.add('active');
                }
            });
        });

   
    // </script>

     <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'glow': 'glow 2s ease-in-out infinite alternate',
                        'slideDown': 'slideDown 0.3s ease-out',
                        'slideUp': 'slideUp 0.3s ease-out',
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' }
                        },
                        glow: {
                            '0%': { boxShadow: '0 0 20px rgba(59, 130, 246, 0.5)' },
                            '100%': { boxShadow: '0 0 40px rgba(59, 130, 246, 0.8)' }
                        },
                        slideDown: {
                            '0%': { opacity: '0', maxHeight: '0', transform: 'translateY(-10px)' },
                            '100%': { opacity: '1', maxHeight: '200px', transform: 'translateY(0)' }
                        },
                        slideUp: {
                            '0%': { opacity: '1', maxHeight: '200px', transform: 'translateY(0)' },
                            '100%': { opacity: '0', maxHeight: '0', transform: 'translateY(-10px)' }
                        }
                    }
                }
            }
        }
    </script>
<script>
  function toggleExpatPopup() {
    const popup = document.getElementById("expat-popup");
    popup.classList.toggle("hidden");
  }
</script>

<script>
  function toggleCategoryPopup() {
    const popup = document.getElementById("search-category-popup");
    popup.classList.toggle("hidden");
  }
</script>






<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init();
</script>


<!-- JS -->
<script>
  function toggleRefugeePopup() {
    const popup = document.getElementById("refugeePopup");
    popup.classList.toggle("opacity-0");
    popup.classList.toggle("invisible");
    popup.classList.toggle("scale-95");
    popup.classList.toggle("scale-100");
  }

  // Optional: Close when clicking outside
  document.addEventListener("click", function (event) {
    const trigger = event.target.closest('[onclick="toggleRefugeePopup()"]');
    const popup = document.getElementById("refugeePopup");
    if (!popup.contains(event.target) && !trigger) {
      popup.classList.add("opacity-0", "invisible", "scale-95");
      popup.classList.remove("scale-100");
    }
  });
</script>

<script>
      // Event listener for category select
      // Event listener for category select
document.getElementById('categorySelect').addEventListener('change', function() {
    var categoryId = this.value;
    var subcategorySelect = document.getElementById('subcategorySelect');
    
    if (categoryId) {
        // Fetch subcategories based on the selected category
        fetch(`/get-subcategories/${categoryId}`)
            .then(response => response.json())
            .then(subcategories => {
                // Populate the subcategory dropdown
                subcategorySelect.innerHTML = '<option value="">Select Sub-category</option>';  // Clear previous options
                
                subcategories.forEach(function(subcategory) {
                    var option = document.createElement('option');
                    option.value = subcategory.id;
                    option.textContent = subcategory.name;
                    subcategorySelect.appendChild(option);
                });
                
                // Show the subcategory select
                subcategorySelect.classList.remove('hidden');
            });
    } else {
        // Hide the subcategory dropdown if no category is selected
        subcategorySelect.classList.add('hidden');
    }
});

// Event listener for the "Filter" button to load providers
document.getElementById('filterButton').addEventListener('click', function() {
    var categoryId = document.getElementById('categorySelect').value;
    var subcategoryId = document.getElementById('subcategorySelect').value;
    var language = document.getElementById('languageSelect').value;
    var country = document.getElementById('countrySelect').value;

    // Fetch providers based on selected filters (category, subcategory, country, language)
    fetch(`/get-providers?category_id=${categoryId}&subcategory_id=${subcategoryId}&country=${country}&language=${language}`)
        .then(response => response.json())
        .then(providers => {
            // Render providers in the service grid
            const serviceGrid = document.getElementById('serviceGrid');
            serviceGrid.innerHTML = '';  // Clear previous providers

            if (providers.length > 0) {
                providers.forEach(function(provider) {
                    // Parse special_status if it's a stringified JSON
                    console.log(provider)
                    let specialStatus = provider.special_status ? JSON.parse(provider.special_status) : [];

                    const providerCard = document.createElement('div');
                    providerCard.className = 'bg-white rounded-3xl card-hover relative overflow-hidden shadow-xl border border-blue-100';

                    providerCard.innerHTML = `
                      <div class="absolute top-0 right-0 w-24 h-24 bg-blue-100 rounded-bl-3xl opacity-20"></div>
                      ${provider.urgent ? 
                        '<div class="absolute top-4 right-4 w-3 h-3 bg-blue-500 rounded-full pulse-animation"></div>' : ''}
                      <div class="relative z-10">
                        <a href="/provider-details/${provider.id}" class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow cursor:pointer">
                            <div class="relative aspect-[9/12] w-full">
                                <img src="${provider.profile_photo ?? 'images/attachment.png'}" 
                                    alt="profile" class="absolute inset-0 w-full h-full object-cover">

                                <div class="absolute top-2 left-2 flex items-center flex-wrap">
                                    <img src="https://flagcdn.com/w20/th.png" alt="Thailand Flag" class="w-4 h-3 mr-1">
                                  
                                    <span class="bg-blue-600 text-white px-2 py-1 rounded text-xs">${provider.country ?? 'Visas'}</span>
                                </div>

                                <div class="absolute bottom-2 left-2">
                                    <span class="bg-blue-500 text-white px-2 py-1 rounded text-xs">${provider.preferred_language ?? 'English'}</span>
                                </div>
                            </div>

                            <div class="p-4">
                                <div class="flex items-center mb-2">
                                    <h3 class="font-semibold text-lg">${provider.first_name ?? '_'}</h3>
                                    <span class="ml-auto text-lg font-semibold">45€/h</span>
                                </div>

                                <p class="text-gray-600 text-sm mb-2">Country service: ${provider.operational_countries}</p>

                                <div class="flex items-center mb-3">
                                    <div class="flex text-yellow-400">
                                        ${[1, 2, 3, 4, 5].map(i => 
                                            i <= provider.avgRating ? 
                                            '<i class="fas fa-star"></i>' : 
                                            '<i class="far fa-star"></i>'
                                        ).join('')}
                                    </div>
                                    <span class="text-sm text-gray-600 ml-2">${provider.avgRating} (${provider.reviewCount} Reviews)</span>
                                </div>

                                <div class="flex gap-2 text-xs text-gray-500">
                                  ${Object.keys(specialStatus).map(statusKey => 
                                      `<span class="bg-gray-100 px-2 py-1 rounded">${statusKey}</span>`
                                  ).join('')}
                                </div>
                            </div>
                        </a>
                      </div>
                    `;
                    serviceGrid.appendChild(providerCard);
                });
            } else {
                serviceGrid.innerHTML = '<p>No providers found.</p>';
            }
        });
});


</script>

</body>
</html>