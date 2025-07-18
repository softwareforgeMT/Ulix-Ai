<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- CDN (Free version) -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
	<link rel="stlesheet" href="css/styles.css">
  <!-- Toastr CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
  <!-- Toastr JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


  <script src="https://cdn.tailwindcss.com"></script>
  <title>ULIXAI - Modern Navbar</title>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          animation: {
            'fade-in': 'fadeIn 0.3s ease-out',
            'slide-down': 'slideDown 0.3s ease-out',
            'bounce-subtle': 'bounceSubtle 0.6s ease-out',
            'glow': 'glow 2s ease-in-out infinite alternate',
          },
          keyframes: {
            fadeIn: {
              '0%': { opacity: '0', transform: 'translateY(-10px)' },
              '100%': { opacity: '1', transform: 'translateY(0)' }
            },
            slideDown: {
              '0%': { opacity: '0', transform: 'translateY(-20px)' },
              '100%': { opacity: '1', transform: 'translateY(0)' }
            },
            bounceSubtle: {
              '0%, 100%': { transform: 'translateY(0)' },
              '50%': { transform: 'translateY(-5px)' }
            },
            glow: {
              '0%': { boxShadow: '0 0 20px rgba(59, 130, 246, 0.5)' },
              '100%': { boxShadow: '0 0 30px rgba(59, 130, 246, 0.8)' }
            }
          }
        }
      }
    }
  </script>

  <!-- <style>
  #searchPopup {
    display: flex !important;
    justify-content: center;
    align-items: center;
  }

  @media (max-width: 768px) {
    #searchPopup {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      z-index: 9999;
      background-color: rgba(0, 0, 0, 0.6);
    }
  }
</style> -->

</head>
<body class="min-h-screen bg-white">

<!-- Navbar -->
<nav class="top-0 z-50 border-b border-white/20 shadow-xl">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-20 items-center">

      <!-- Logo -->
   <div class="hidden lg:flex items-center space-x-3 group">
  <div class="relative">
    <div class="rounded-xl blur opacity-30 group-hover:opacity-50 transition duration-300"></div>
  </div>
  <div class="flex items-center h-full">
  <a href="/">
    <img src="/images/headerlogo.png" alt="Logo" class="w-20 h-auto max-h-12 object-contain" />
  </a>
</div>

</div>

      <!-- Desktop Buttons -->
     
<div class="hidden lg:flex items-center space-x-3 group">
  <button onclick="openHelpPopup()" class="nav-button bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-3 rounded-full text-sm font-semibold hover:from-blue-700 hover:to-blue-800 transition-all duration-300 hover-glow transform hover:scale-105 shadow-lg">
  <span class="flex items-center space-x-2">
    <i class="fas fa-lock text-white-600 text-xl"></i>
    <span>Request Help</span>
  </span>
</button>








<div id="travailleursProtectionSocialeSubSubcategoriesPopup" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">

    <div class="sticky top-0 bg-white rounded-t-2xl border-b border-gray-100 p-6 flex items-center justify-between">
      <div class="flex items-center">
        <button onclick="goBackToTravailleursProtectionSocialeSubcategories()" class="mr-4 text-gray-400 hover:text-gray-600 transition-colors" aria-label="Back">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <polyline points="15,18 9,12 15,6"></polyline>
          </svg>
        </button>
        <h2 class="text-xl font-semibold text-gray-800">Travailleurs & Freelances - Protection sociale</h2>
      </div>
      <button onclick="closeAllPopups()" class="text-gray-400 hover:text-gray-600 transition-colors" aria-label="Close">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </button>
    </div>

    <!-- Sub-Subcategories Grid -->
    <div class="p-6 pt-2">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           <a href="request-for-help.php"> Autres protections sociales </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-yellow-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           <a href="request-for-help.php"> Je cherche une assurance invalidité freelance </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

       
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-peach-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           <a href="request-for-help.php"> Je veux une assurance retraite internationale </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>


<!-- Travailleurs Trouver un emploi ou une mission Sub-Subcategories Popup -->
<div id="travailleursTrouverEmploiSubSubcategoriesPopup" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
    <!-- Header -->
    <div class="sticky top-0 bg-white rounded-t-2xl border-b border-gray-100 p-6 flex items-center justify-between">
      <div class="flex items-center">
        <button onclick="goBackToTravailleursTrouverEmploiSubcategories()" class="mr-4 text-gray-400 hover:text-gray-600 transition-colors" aria-label="Back">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <polyline points="15,18 9,12 15,6"></polyline>
          </svg>
        </button>
        <h2 class="text-xl font-semibold text-gray-800">Travailleurs & Freelances - Trouver un emploi ou une mission</h2>
      </div>
      <button onclick="closeAllPopups()" class="text-gray-400 hover:text-gray-600 transition-colors" aria-label="Close">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </button>
    </div>

    <!-- Sub-Subcategories Grid -->
    <div class="p-6 pt-2">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-green-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           <a href="request-for-help.php"> Autres recherches d’emploi ou missions </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           <a href="request-for-help.php"> Je cherche des agences de recrutement </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

    

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-purple-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           <a href="request-for-help.php"> Je veux trouver des missions freelance en ligne </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<!-- Travailleurs Visa et autorisations de travail Sub-Subcategories Popup -->
<div id="travailleursVisaAutorisationsSubSubcategoriesPopup" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
    <!-- Header -->
    <div class="sticky top-0 bg-white rounded-t-2xl border-b border-gray-100 p-6 flex items-center justify-between">
      <div class="flex items-center">
        <button onclick="goBackToTravailleursVisaAutorisationsSubcategories()" class="mr-4 text-gray-400 hover:text-gray-600 transition-colors" aria-label="Back">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <polyline points="15,18 9,12 15,6"></polyline>
          </svg>
        </button>
        <h2 class="text-xl font-semibold text-gray-800">Travailleurs & Freelances - Visa et autorisations de travail</h2>
      </div>
      <button onclick="closeAllPopups()" class="text-gray-400 hover:text-gray-600 transition-colors" aria-label="Close">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </button>
    </div>

    <!-- Sub-Subcategories Grid -->
    <div class="p-6 pt-2">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-purple-300 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           <a href="request-for-help.php"> Autres démarches de visas et permis </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>


        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-cyan-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           <a href="request-for-help.php"> Je veux obtenir une carte professionnelle locale</a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>






        
<!-- SOS Button -->
<a href="/sos" 
   
   class="nav-button bg-gradient-to-r from-red-500 to-red-600 text-white px-6 py-3 rounded-full text-sm font-semibold hover:from-red-600 hover:to-red-700 transition-all duration-300 animate-glow transform hover:scale-105 shadow-lg">
  <span class="flex items-center space-x-2">
    	<i class="fas fa-phone-alt text-white-600 text-xl"></i>
    <span>S.O.S</span>
  </span>
</a>

<!-- Popup Modal -->
<div id="sos-popup" class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center min-h-screen px-4 hidden">
  <div class="bg-white rounded-xl p-6 shadow-2xl max-w-md w-full text-center">
    <h2 class="text-xl font-bold text-gray-800 mb-3">Coming Soon</h2>
    <p class="text-gray-600 italic mb-4 leading-relaxed">
      Service available in the coming weeks.<br>
    </p>
    <button onclick="closeComingSoonPopup()" 
            class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-md transition-all duration-200">
      Close
    </button>
  </div>
</div>

      @if(Auth::check() && Auth::user()->user_role != 'service_provider' || Auth::check() === false)
        <a href="/serviceProvider" class="nav-button border-2 border-gradient-to-r from-purple-500 to-blue-500 bg-gradient-to-r from-purple-50 to-blue-50 text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-blue-600 px-6 py-3 rounded-full text-sm font-semibold hover:bg-gradient-to-r hover:from-purple-100 hover:to-blue-100 transition-all duration-300 transform hover:scale-105 shadow-lg border-blue-300">
          <span class="flex items-center space-x-2 text-blue-600">
            <!-- Simple Icon -->
            <i class="fas fa-file-signature text-blue-600 text-2xl"></i>
            <span>Become a Provider</span>
          </span>
        </a>
      @endif
      </div>

      <!-- Desktop Right Side -->
      <div class="hidden lg:flex items-center space-x-6">
        <!-- Language Dropdown -->
        <div class="relative group">
          <button id="desktopLangBtn" type="button" class="flex items-center space-x-2 px-3 py-2 rounded-lg hover:bg-white/50 transition-all duration-300 focus:outline-none">
            <div class="w-6 h-6 rounded-full overflow-hidden border-2 border-white shadow-sm">
              <img src="https://flagcdn.com/24x18/fr.png" alt="FR" class="w-full h-full object-cover" />
            </div>
            <svg class="w-4 h-4 text-gray-600 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <ul id="desktopLangMenu" class="absolute right-0 hidden bg-white/95 backdrop-blur-lg shadow-2xl border border-white/20 rounded-xl mt-2 w-40 z-20 animate-slide-down overflow-hidden">
            <li class="hover:bg-blue-50/80 px-4 py-3 cursor-pointer flex items-center space-x-3 transition-colors border-b border-gray-100/50">
              <img src="https://flagcdn.com/20x15/fr.png" alt="FR" class="w-5 h-4 rounded-sm" />
              <span class="text-sm font-medium text-gray-700">Français</span>
            </li>
            <li class="hover:bg-blue-50/80 px-4 py-3 cursor-pointer flex items-center space-x-3 transition-colors border-b border-gray-100/50">
              <img src="https://flagcdn.com/20x15/us.png" alt="EN" class="w-5 h-4 rounded-sm" />
              <span class="text-sm font-medium text-gray-700">English</span>
            </li>
            <li class="hover:bg-blue-50/80 px-4 py-3 cursor-pointer flex items-center space-x-3 transition-colors">
              <img src="https://flagcdn.com/20x15/de.png" alt="DE" class="w-5 h-4 rounded-sm" />
              <span class="text-sm font-medium text-gray-700">Deutsch</span>
            </li>
          </ul>
        </div>

 <!-- Auth Buttons -->
<div class="flex items-center space-x-3">
  @php 
    $isActive = Auth::check();
  @endphp
  @if(!$isActive)
  <a href="/login" class="flex items-center space-x-2 px-4 py-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-300 group">
   <i class="fas fa-user mr-2 text-lg text-blue-600"></i>
    <span class="font-medium text-blue-600"> Log in</span>
  </a>

  <button id="signupBtn" class="bg-blue-600 text-white px-5 py-2 rounded-lg font-semibold hover:from-emerald-600 hover:to-teal-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 flex items-center space-x-2">
    <i class="fas fa-user-plus mr-2 text-lg "></i>
    <span>Sign Up</span>
  </button>
  @endif
</div>

<!-- Popup Overlay -->
<div id="signupPopup" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 p-6 hidden z-50 min-h-screen">
  <div class="bg-white rounded-2xl p-8 max-w-3xl w-full relative shadow-lg max-h-[90vh] overflow-auto">
    <button id="closePopup" class="absolute top-4 right-4 text-gray-500 hover:text-gray-800 text-2xl font-bold">&times;</button>
		<!-- Step 1 -->
		@include('includes.provider.choose_step')
    <!-- Step 2 -->
    @include('includes.provider.native_language')

    <!-- Step 3 -->
    @include('includes.provider.spoken_language')

    <!-- Step 4 -->
		@include('includes.provider.provider_services')

    <!-- Step 5 -->
    <div id="step5" class="hidden">
      <h2 class="font-bold mb-6 text-xl text-blue-900">In which country do you live?</h2>
      <input id="location-input" type="text" placeholder="Your address (geolocation)" class="w-full border border-blue-400 rounded-full px-5 py-3 text-blue-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 mb-6" value=""/>
      <div class="flex justify-between items-center">
        <button id="backToStep4" class="text-blue-700 hover:underline">Back</button>
        <button id="nextStep5" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Next</button>
      </div>
    </div>

 		<!-- Step 6 -->
		@include('includes.provider.operational_countries')
 
    <!-- Step 7: Special Status -->
    @include('includes.provider.special_status')
   
    <!-- Step 8: Speak Online or In Person -->
    @include('includes.provider.communication_preference')

    <!-- Step 9: Profile Description -->
    @include('includes.provider.profile_description')

   <!-- Step 10: Profile Picture -->
		@include('includes.provider.profile_picture')

		<!-- Step 11: Identity Documents -->
		@include('includes.provider.identity_documents')

		<!-- Step 12: First and Last Name -->
		@include('includes.provider.first_last_name')

		<!-- Step 13: Email and Phone Number -->
		@include('includes.provider.email')

		<!-- Step 14: Password Creation -->
		@include('includes.provider.verify_email')

		<!-- Step 15: Phone Number -->
		@include('includes.provider.phone_number')
		


		<!-- Step 16: Success Confirmation -->
		<div id="step16" class="hidden space-y-6 text-center">
			<h2 class="text-blue-900 font-extrabold text-2xl">
YOUR PROVIDER ACCOUNT IS CREATED</h2>
			<p class="text-blue-800 font-semibold text-md">YOU ARE OFFICIALLY A ULYSSE</p>
			<p class="text-gray-600">Go check out the service requests in your area now</p>

			<button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-full">
			<a href="{{ route('ongoing-requests') }}"> CURRENT SERVICE REQUESTS </a></button>

			<p class="text-gray-600 text-sm mt-2">You can boost your profile to have more jobs to do</p>

			<button class="border-2 border-blue-600 text-blue-600 hover:bg-blue-50 font-bold px-6 py-2 rounded-full">
				I BOOTS MY PROFILE TO BE AMONG THE FIRST SERVICE PROVIDERS
			</button>
		</div>

	</div>
		<!-- Mobile Controls -->
		<div class="lg:hidden flex items-center space-x-2">
			<div class="w-8 h-8 rounded-full overflow-hidden border-2 border-white shadow-sm">
				<img src="https://flagcdn.com/24x18/fr.png" alt="FR" class="w-full h-full object-cover" />
			</div>
			<button id="menu-toggle" class="p-2 rounded-lg bg-sky-300 hover:bg-sky-400 transition-colors shadow">

				<svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
				</svg>
			</button>
		</div>
	</div>
</div>

	<!-- Mobile Header -->
	<div class="lg:hidden fixed top-0 left-0 w-full bg-white z-50 flex items-center justify-between  py-2 shadow-md">
		<!-- Logo -->
	<a href="/index.php">
		<img src="/images/headerlogo.png" alt="ULIXAI Logo" class="w-10 h-10 object-contain" />
	</a>


  <!-- Request Help Button -->
   <button id="mobileSearchButton" onclick="openHelpPopup()" class="nav-button bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-3 rounded-full text-sm font-semibold hover:from-blue-700 hover:to-blue-800 transition-all duration-300 hover-glow transform hover:scale-105 shadow-lg">
    <span class="flex items-center space-x-2">
      <i class="fas fa-lock text-white-600 text-xl"></i>
      <span>Request Help</span>
    </span>
</button>

  <!-- Hamburger -->
<button id="menu-toggle-top" class="p-2 rounded-lg hover:bg-white/50 transition-colors">
  <!-- Hamburger Icon -->
  <svg class="icon-hamburger w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
  </svg>
  <!-- X Icon -->
  <svg class="icon-close w-6 h-6 hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
  </svg>
</button>

</div>

<!-- Mobile Dropdown Menu -->
<div id="mobile-menu" class="lg:hidden fixed top-[64px] left-0 w-full bg-sky-100 z-40 shadow-md hidden px-6 py-4 space-y-4 animate-slide-down">

  <!-- Close (X) Button for mobile menu -->
  <div class="flex justify-end mb-2">
    <button id="mobileMenuCloseBtn" class="p-2 rounded-full hover:bg-blue-200 focus:outline-none" aria-label="Close menu">
      <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
  </div>

  <a href="/serviceProvider" class="block text-gray-800 text-base font-semibold hover:text-blue-600">Become a provider</a>
  <a href="/login" class="block text-gray-800 text-base font-semibold hover:text-blue-600">Log in</a>
  <a href="/signup"class="block text-gray-800 text-base font-semibold hover:text-blue-600">Sign up</a>
  <a href="/affiliate" class="block text-gray-800 text-base font-semibold hover:text-blue-600">Affiliate Program</a> <!-- New link added here -->


  <!-- Language Dropdown -->
  <div class="relative">
    <button id="languageToggle" class="w-full flex justify-between items-center border border-gray-300 rounded-lg px-4 py-2 text-gray-800">
      <span>Language</span>
      <img src="https://flagcdn.com/24x18/fr.png" class="ml-2 w-5 h-4 object-cover" alt="Lang" />
    </button>
    <ul id="languageMenu" class="absolute mt-2 w-full bg-white border border-gray-300 rounded-lg shadow-md hidden">
      <li class="px-4 py-2 hover:bg-blue-50 cursor-pointer flex items-center gap-2">
        <img src="https://flagcdn.com/24x18/fr.png" class="w-5 h-4" />
        Français
      </li>
      <li class="px-4 py-2 hover:bg-blue-50 cursor-pointer flex items-center gap-2">
        <img src="https://flagcdn.com/24x18/us.png" class="w-5 h-4" />
        English
      </li>
      <li class="px-4 py-2 hover:bg-blue-50 cursor-pointer flex items-center gap-2">
        <img src="https://flagcdn.com/24x18/de.png" class="w-5 h-4" />
        Deutsch
      </li>
    </ul>
  </div>

  <!-- SOS Button -->
  <a href="/sos"  class="block w-full text-center bg-red-600 text-white font-semibold py-2 rounded-full shadow hover:bg-red-700 transition">
    <i class="fas fa-phone-alt mr-1"></i> S.O.S
  </a>
</div>

@include('pages.popup')
</nav>
<script>
	function showComingSoonPopup(e) {
		e.preventDefault();
		document.getElementById('sos-popup').classList.remove('hidden');
	}
	function closeComingSoonPopup() {
		document.getElementById('sos-popup').classList.add('hidden');
	}

	document.addEventListener('DOMContentLoaded', function () {
		const popup = document.getElementById('signupPopup');
		const closePopup = document.getElementById('closePopup');
		const signupBtn = document.getElementById('signupBtn');
		const progressText = document.getElementById('progressText');

		const steps = Array.from({ length: 16 }, (_, i) => document.getElementById('step' + (i + 1)));
		let currentStep = 0;

		function showStep(stepIndex) {
			steps.forEach((step, i) => step?.classList.toggle('hidden', i !== stepIndex));
			currentStep = stepIndex;
			const progress = ((stepIndex + 1) / steps.length) * 100;
			progressBar.style.width = progress + '%';
			progressText.textContent = `Step ${stepIndex + 1} of ${steps.length}`;
		}

		function validateStep(index) {
			switch(index) {
				case 1: // Step 2 - language selected
					return !!document.querySelector('#step2 .lang-btn.bg-blue-900');
				case 2: // Step 3 - multiple selected
					return document.querySelectorAll('#step3 .lang-btn.bg-blue-900').length > 0;
				case 3: // Step 4 - help icon selected
					return document.querySelectorAll('#step4 .help-icon.ring-4').length > 0;
          	case 4: // Step 9 - text filled
					return document.getElementById('location-input').value.trim().length > 0;
          	case 5: // Step 9 - text filled
					return document.getElementById('countriesInput').value.trim().length > 0;
				case 6: // Step 7 - one toggle selected in each group
					return Array.from(document.querySelectorAll('#step7 .special-status-item'));
				case 7: // Step 8 - yes/no selected in each group
					return Array.from(document.querySelectorAll('#step8 .speak-toggle')).every(group =>
						group.querySelector('.bg-green-500')
					);
				case 8: // Step 9 - text filled
					return document.getElementById('profileDescription').value.trim().length > 0;
				case 9: // Step 10 - image uploaded
					return document.getElementById('profileUpload').files.length > 0;
          case 11:
          return document.getElementById('first_name_input').value.trim().length > 0;
           case 12:
          return document.getElementById('email_input').value.trim().length > 0;
          case 13:
          return document.getElementById('phone_number_input').value.trim().length > 0;
          case 14:
          return document.getElementById('otp_input').value.trim().length > 0;
				default:
					return true;
			}
		}

	

		signupBtn?.addEventListener('click', () => {
			popup.classList.remove('hidden');
		});

		closePopup?.addEventListener('click', () => {
			popup.classList.add('hidden');
		});

		popup.addEventListener('click', (e) => {
			if (e.target === popup) popup.classList.add('hidden');
		});

		const stepNavigation = [
			['whiteCardBtn', 1], ['backToStep1', 0], ['nextStep2', 2], ['backToStep2', 1],
			['nextStep3', 3], ['backToStep3', 2], ['nextStep4', 4], ['backToStep4', 3],
			['nextStep5', 5], ['backToStep5', 4], ['nextStep6', 6], ['backToStep6', 5],
			['nextStep7', 7], ['backToStep7', 6], ['nextStep8', 8], ['backToStep8', 7],
			['nextStep9', 9], ['backToStep9', 8], ['nextStep10', 10], ['backToStep10', 9],
			['nextStep11', 11], ['backToStep11', 10], ['nextStep12', 12], ['backToStep12', 11],
			['nextStep13', 13], ['backToStep13', 12], ['nextStep14', 14], ['backToStep14', 13],
			['nextStep15', 15], ['backToStep15', 14]
		];

		stepNavigation.forEach(([btnId, stepIndex]) => {
			document.getElementById(btnId)?.addEventListener('click', () => {
				if (stepIndex > currentStep && !validateStep(currentStep)) {
					alert("Please complete this step before continuing.");
					return;
				}
				showStep(stepIndex);
			});
		});

		document.getElementById('completeSignup')?.addEventListener('click', () => {
			if (!validateStep(currentStep)) {
				alert("Please complete this step before finishing.");
				return;
			}
			showStep(15);
		});

		// Step 2: Language selection
		document.querySelectorAll('#step2 .lang-btn').forEach(btn => {
			btn.addEventListener('click', () => {
				document.querySelectorAll('#step2 .lang-btn').forEach(b => {
					b.classList.remove('bg-blue-900', 'text-white');
					b.classList.add('bg-white', 'text-blue-700');
				});
				btn.classList.remove('bg-white', 'text-blue-700');
				btn.classList.add('bg-blue-900', 'text-white');
        // Get the text/content of the clicked button
        const selectedLanguage = btn.textContent.trim();

        // Get current session object or create new
        const expats = JSON.parse(localStorage.getItem('expats')) || {};
        expats.native_language = selectedLanguage;
        localStorage.setItem('expats', JSON.stringify(expats));

			});
		});

		// Step 3: Multiple selection
    let selectedLanguage = [];
		document.querySelectorAll('#step3 .lang-btn').forEach(btn => {
      
			btn.addEventListener('click', () => {
				btn.classList.toggle('bg-blue-900');
				btn.classList.toggle('text-white');
				btn.classList.toggle('bg-blue-600');
        const lang = btn.textContent.trim();

        if (selectedLanguage.includes(lang)) {
            selectedLanguage = selectedLanguage.filter(item => item !== lang);
        } else {
            selectedLanguage.push(lang);
        }

        // Store in localStorage
        const expats = JSON.parse(localStorage.getItem('expats')) || {};
        expats.spoken_language = selectedLanguage;
        localStorage.setItem('expats', JSON.stringify(expats));
		});
  });
		// Step 4: Help icon toggle
		document.querySelectorAll('#step4 .help-icon').forEach(btn => {
			btn.addEventListener('click', () => {
        // console.log("Button clicked", btn.textContent.trim())
				btn.classList.toggle('ring-4');
				btn.classList.toggle('ring-white');
				btn.classList.toggle('ring-offset-2');



        console.log("Newss", JSON.parse(localStorage.getItem('expats')));
			});
		});

    //Step 5
      const location = document.querySelector('#step5 #location-input');
			if (location) {
        location.addEventListener('change', () => {
          const expats = JSON.parse(localStorage.getItem('expats')) || {};
          expats.location = location.value;
          localStorage.setItem('expats', JSON.stringify(expats));
        });
      }

    //Step 6
      const countries = document.querySelector('#step6 #countriesInput');
      if (countries) {
        countries.addEventListener('change', () => {
          const expats = JSON.parse(localStorage.getItem('expats')) || {};
          expats.operational_countries = countries.value;
          localStorage.setItem('expats', JSON.stringify(expats));
        });
      }
    
		// Step 7: Toggle logic
		let specialStatus = {};

    document.querySelectorAll('#step7 .status-checkbox').forEach(checkbox => {
      checkbox.addEventListener('change', () => {
        const label = checkbox.dataset.label;
        specialStatus[label] = checkbox.checked;
        // Save to localStorage
        const expats = JSON.parse(localStorage.getItem('expats')) || {};
        expats.special_status = specialStatus;
        localStorage.setItem('expats', JSON.stringify(expats));
      });
    });

    
		// Step 8: Speak toggle
    communicationPreference = {};
		document.querySelectorAll('#step8 .speak-toggle').forEach(group => {
			const yesBtn = group.children[0];
			const noBtn = group.children[1];
			[yesBtn, noBtn].forEach(btn => {
				btn.addEventListener('click', () => {
          const label = btn.dataset.label;
					yesBtn.classList.remove('bg-green-500', 'text-white');
					yesBtn.classList.add('bg-white', 'text-green-600');
					noBtn.classList.remove('bg-green-500', 'text-white');
					noBtn.classList.add('bg-white', 'text-green-600');
					btn.classList.remove('bg-white', 'text-green-600');
					btn.classList.add('bg-green-500', 'text-white');
          communicationPreference[label] = btn.textContent === 'Yes' ? 'true' : 'false';
          const expats = JSON.parse(localStorage.getItem('expats')) || {};
          expats.communication_preference = communicationPreference;
          localStorage.setItem('expats', JSON.stringify(expats));
				});
			});
		});

		// Step 9: Character counter
		const textarea = document.getElementById('profileDescription');
		const charCount = document.getElementById('charCount');
		if (textarea && charCount) {
			textarea.addEventListener('input', () => {
				charCount.textContent = textarea.value.length;

        const expats = JSON.parse(localStorage.getItem('expats')) || {};
        expats.profile_description = textarea.value;
        localStorage.setItem('expats', JSON.stringify(expats));
			});
		}


		
		// Step 10: Profile image preview
    const profileUpload = document.getElementById('profileUpload');
    const profilePreview = document.getElementById('profilePreview');
    const profilePlaceholder = document.getElementById('profilePlaceholder');

    if (profileUpload) {
      profileUpload.addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = (e) => {
            const imageDataUrl = e.target.result;

            // Show preview
            profilePreview.src = imageDataUrl;
            profilePreview.classList.remove('hidden');
            profilePlaceholder.classList.add('hidden');

            // Save to localStorage
            const expats = JSON.parse(localStorage.getItem('expats')) || {};
            expats.profile_image = imageDataUrl; // Store as base64 URL
            localStorage.setItem('expats', JSON.stringify(expats));
          };
          reader.readAsDataURL(file);
        }
      });
    }

    //Step 11: Identity Documents

    //Step:12 Username
    const firstNameInput = document.querySelector('#step12 #first_name_input');
    const lastNameInput = document.querySelector('#step12 #last_name_input');
    const nextStep12 = document.getElementById('nextStep12');

    if (nextStep12) {
      nextStep12.addEventListener('click', () => {
        const expats = JSON.parse(localStorage.getItem('expats')) || {};
        expats.first_name = firstNameInput.value.trim();
        expats.last_name = lastNameInput.value.trim();
        localStorage.setItem('expats', JSON.stringify(expats));
      });
    }

    // Step13: Email 
    const emailInput = document.querySelector('#step13 #email_input');
    const nextStep13 = document.getElementById('nextStep13');

    if (nextStep13) {
      nextStep13.addEventListener('click', () => {
        const expats = JSON.parse(localStorage.getItem('expats')) || {};
        expats.email = emailInput.value.trim();
        localStorage.setItem('expats', JSON.stringify(expats));

        // createProviderAccount()
      });
    }

    const phoneNumberInput = document.querySelector('#step14 #phone_number_input');
    const nextStep14 = document.getElementById('nextStep14');
    if (nextStep14 && phoneNumberInput) {
      nextStep14.addEventListener('click', () => {
        const expats = JSON.parse(localStorage.getItem('expats')) || {};
        expats.phone_number = phoneNumberInput.value.trim();
        localStorage.setItem('expats', JSON.stringify(expats));

        console.log("In", phoneNumberInput);
        createProviderAccount();
      });
    }

    function createProviderAccount() {
      const expats = JSON.parse(localStorage.getItem('expats')) || {};

      fetch('/register', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
          'Accept': 'application/json'
        },
        body: JSON.stringify(expats)
      })
      .then(response => {
        if (!response.ok) throw response;
        return response.json();
      })
      .then(data => {
        console.log('Account created:', data);
        // toastr.success(data.message || 'Account created successfully!');
        // Optional: redirect after toast
      })
      .catch(async error => {
        let errorMessage = 'Failed to create account. Please try again.';
        try {
          const errData = await error.json();
          errorMessage = errData.message || errorMessage;
        } catch (_) {}
        console.error('Error creating account:', errorMessage);
        // toastr.error(errorMessage);
      });
    }




		// Mobile nav toggles
		const toggleButtons = [
			document.getElementById("menu-toggle-top"),
			document.getElementById("menu-toggle")
		];
		const mobileMenu = document.getElementById("mobile-menu");
		const langToggle = document.getElementById("languageToggle");
		const langMenu = document.getElementById("languageMenu");

		// Add close button logic for mobile menu
		const mobileMenuCloseBtn = document.getElementById("mobileMenuCloseBtn");
		if (mobileMenuCloseBtn) {
			mobileMenuCloseBtn.addEventListener("click", () => {
				mobileMenu.classList.add("hidden");
			});
		}

		toggleButtons.forEach(btn => {
			if (btn) btn.addEventListener("click", () => {
				mobileMenu.classList.toggle("hidden");
			});
		});

		if (langToggle) {
			langToggle.addEventListener("click", (e) => {
				e.stopPropagation();
				langMenu.classList.toggle("hidden");
			});
		}

		document.addEventListener("click", (e) => {
			if (langToggle && langMenu && !langToggle.contains(e.target) && !langMenu.contains(e.target)) {
				langMenu.classList.add('hidden');
			}
		});

		// Desktop language dropdown open/close on click
		const desktopLangBtn = document.getElementById('desktopLangBtn');
		const desktopLangMenu = document.getElementById('desktopLangMenu');
		if (desktopLangBtn && desktopLangMenu) {
			desktopLangBtn.addEventListener('click', function (e) {
				e.stopPropagation();
				desktopLangMenu.classList.toggle('hidden');
			});
			// Close dropdown when clicking outside
			document.addEventListener('click', function (e) {
				if (!desktopLangBtn.contains(e.target) && !desktopLangMenu.contains(e.target)) {
					desktopLangMenu.classList.add('hidden');
				}
			});
		}
	});

	// Modal functions
	function openModal() {
		document.getElementById('modal')?.classList.remove('hidden');
	}
	function closeModal() {
		document.getElementById('modal')?.classList.add('hidden');
	}
	function nextStep(stepNumber) {
		document.querySelectorAll('.step-content').forEach(step => step.classList.add('hidden'));
		document.getElementById('step' + stepNumber)?.classList.remove('hidden');
	}
</script>

<script>
  // function openHelpPopup() {
  //   document.getElementById('searchPopup').classList.remove('hidden');
  // }

  // function closeSearchPopup() {
  //   document.getElementById('searchPopup').classList.add('hidden');
  // }

  // Optional: close on ESC key
  document.addEventListener('keydown', function (e) {
    if (e.key === "Escape") closeSearchPopup();
  });

  // Optional: attach close button
  document.addEventListener('DOMContentLoaded', () => {
    const closeBtn = document.getElementById('closeSearchPopupBtn');
    if (closeBtn) {
      closeBtn.addEventListener('click', closeSearchPopup);
    }
  });
</script>



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

    //     // Add some interactive particles effect
    //     function createParticle() {
    //         const particle = document.createElement('div');
    //         particle.className = 'fixed w-2 h-2 bg-white/20 rounded-full pointer-events-none';
    //         particle.style.left = Math.random() * window.innerWidth + 'px';
    //         particle.style.top = window.innerHeight + 'px';
    //         document.body.appendChild(particle);

    //         const animation = particle.animate([
    //             { transform: 'translateY(0px) rotate(0deg)', opacity: 1 },
    //             { transform: `translateY(-${window.innerHeight + 100}px) rotate(360deg)`, opacity: 0 }
    //         ], {
    //             duration: Math.random() * 3000 + 2000,
    //             easing: 'linear'
    //         });

    //         animation.onfinish = () => particle.remove();
    //     }

    //     // Create particles periodically
    //     setInterval(createParticle, 300);
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
<!-- JavaScript to toggle popup -->
<script>
  function toggleCategoryPopup() {
    const popup = document.getElementById("search-category-popup");
    popup.classList.toggle("hidden");
  }
</script>




 <script>
  // Back to main categories
  function goBackToMainCategories() {
    closeAllPopups();
    openHelpPopup();
  }

function closeAllPopups() {
  document.getElementById('searchPopup').classList.add('hidden');
  document.getElementById('expatriesPopup').classList.add('hidden');
  document.getElementById('vacanciersPopup').classList.add('hidden');
  document.getElementById('vacanciersPreparationPopup').classList.add('hidden');
  // Add other popups here as well if needed
}



function closeAllPopups() {
  const popups = [
    'searchPopup',
    'expatriesPopup',
    'vacanciersPopup',
    'vacanciersPreparationPopup',
    'vacanciersUrgencePopup',
    'vacanciersProblemesVoyagesPopup',
    'expatriesUrgencePopup',
    'expatriesPreparationPopup',
    'expatriesAssurancePopup',
    'expatriesBesoinsPopup',
    'expatriesSantePopup',
    "vacanciersAutresBesoinsPopup",
    'investisseursPopup',
    'investisseurBienImmobilierPopup',
    "Acheter un bien immobilier",
    "investirMarchesFinanciersPopup",
    "investisseurSecuriserInvestissementsPopup",
    "investisseurOptimisationFiscalePopup",
    "investisseurObligationsLegalesPopup",
    "travailleursFreelancesPopup",
    "travailleursCreerEntreprisePopup",
    "travailleursDevelopperReseauPopup",
    "travailleursGestionFinancierePopup",
    "travailleursProtectionSocialePopup",
    "travailleursTrouverEmploiPopup",
    "travailleursVisaAutorisationsPopup",
    "travailleursCreerEntrepriseSubSubcategoriesPopup",
    "travailleursDevelopperReseauSubSubcategoriesPopup",
    "travailleursGestionFinanciereSubSubcategoriesPopup",
    "travailleursProtectionSocialeSubSubcategoriesPopup",
    "travailleursTrouverEmploiSubSubcategoriesPopup",
    "travailleursVisaAutorisationsSubSubcategoriesPopup"
    // Add more popup IDs here if you have them
  ];
  popups.forEach(id => {
    const el = document.getElementById(id);
    if (el) el.classList.add('hidden');
  });
  localStorage.removeItem('create-request');
}


    // Close popups when clicking outside
    document.addEventListener('click', function(event) {
      const popups = [
        document.getElementById('searchPopup'),
        document.getElementById('expatriesPopup'),
        document.getElementById('vacanciersPopup')
      ];
      const searchInput = document.getElementById('searchInput');
      const searchButton = document.getElementById('searchButton');

      const isAnyPopupVisible = popups.some(popup => popup && !popup.classList.contains('hidden'));
      if (isAnyPopupVisible) {
        const clickedInsidePopup = popups.some(popup => popup && popup.contains(event.target));
        if (!clickedInsidePopup && !searchInput.contains(event.target) && !searchButton.contains(event.target)) {
          closeAllPopups();
        }
      }
    });





  </script>



<script>
  function openHelpPopup() {
    document.getElementById('searchPopup')?.classList.remove('hidden');
    fetch('/api/categories')
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          const category = document.querySelector('#searchPopup .main-categories');
          category.innerHTML = '';

          data.categories.forEach(cat => {
            const div = document.createElement('div');
            div.className = "category-card bg-white rounded-xl p-4 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex flex-col items-center text-center group";
            div.innerHTML = `
              <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M14,6V4H10V6H9A2,2 0 0,0 7,8V19A2,2 0 0,0 9,21H15A2,2 0 0,0 17,19V8A2,2 0 0,0 15,6H14M12,7A2,2 0 0,1 14,9A2,2 0 0,1 12,11A2,2 0 0,1 10,9A2,2 0 0,1 12,7Z"/>
                </svg>
              </div>
              <h3 class="text-sm font-semibold text-gray-800">${cat.name}</h3>
            `;
            div.addEventListener('click', () => handleCategoryClick(cat.id, cat.name));
            category.appendChild(div);
          });
        }
      })
      .catch(err => console.error('Failed to load categories:', err));
  }

  function handleCategoryClick(categoryId, categoryName) {
    document.getElementById('searchPopup')?.classList.add('hidden');
    document.getElementById('expatriesPopup')?.classList.remove('hidden');

    const createRequest = JSON.parse(localStorage.getItem('create-request')) || {};

    createRequest.category = JSON.stringify({
      id: categoryId,
      name: categoryName
    });

    localStorage.setItem('create-request', JSON.stringify(createRequest));

    fetch(`/api/categories/${categoryId}/subcategories`)
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          const subcategory = document.querySelector('#expatriesPopup .sub-category');
          subcategory.innerHTML = '';

          data.subcategories.forEach(sub => {
            const div = document.createElement('div');
            div.className = "category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group";
            div.innerHTML = `
              <div class="w-14 h-14 bg-cyan-400 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
              <div class="flex-grow font-semibold text-gray-800">${sub.name}</div>
              <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <polyline points="9,18 15,12 9,6"></polyline>
                </svg>
              </div>
            `;
            div.addEventListener('click', () => handleSubcategoryClick(sub.id, sub.name));
            subcategory.appendChild(div);
          });

          document.getElementById('expatriesPopup')?.classList.remove('hidden');
        }
      })
      .catch(err => {
        console.error('Error fetching subcategories:', err);
      });
  }

  function handleSubcategoryClick(parentId, categoryName) {
    const createRequest = JSON.parse(localStorage.getItem('create-request')) || {};

    createRequest.sub_category = JSON.stringify({
      id: parentId,
      name: categoryName
    });


    localStorage.setItem('create-request', JSON.stringify(createRequest));
    fetch(`/api/categories/${parentId}/children`)
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          const grid = document.querySelector('#vacanciersAutresBesoinsPopup .child-categories');
          grid.innerHTML = '';

          data.subcategories.forEach(child => {
            const div = document.createElement('div');
            div.className = "category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group";
            div.innerHTML = `
              <div class="w-14 h-14 bg-cyan-300 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
              <div class="flex-grow font-semibold text-gray-800">${child.name}</div>
              <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <polyline points="9,18 15,12 9,6"></polyline>
                </svg>
              </div>
            `;

            div.addEventListener('click', () => requestForHelp(child.id, child.name));

            grid.appendChild(div);
          });

          document.getElementById('vacanciersAutresBesoinsPopup')?.classList.remove('hidden');
        }
      })
      .catch(err => {
        console.error('Error loading child categories:', err);
      });
  }

  function requestForHelp(childId, childName) {
    const createRequest = JSON.parse(localStorage.getItem('create-request')) || {};
    createRequest.child_category = JSON.stringify({
      id: childId,
      name: childName
    });

    localStorage.setItem('create-request', JSON.stringify(createRequest));

    // Redirect to the request creation page
    window.location.href = '/create-request';
  }


  function closeSearchPopup() {
    document.getElementById('searchPopup')?.classList.add('hidden');
  }

  function goBackToVacanciersSubcategories() {
    document.getElementById('vacanciersAutresBesoinsPopup')?.classList.add('hidden');
    document.getElementById('expatriesPopup')?.classList.remove('hidden');
  }

</script>








</body>
</html>