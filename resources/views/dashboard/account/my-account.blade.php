@extends('dashboard.layouts.master')

@section('title', 'My Account')

@section('content')
    
    <!-- Main Content -->
<div class="flex flex-col lg:flex-row min-h-screen">

  <!-- Main Content -->
  <div class="flex-1 p-4 sm:p-6 space-y-10">

    <!-- Wallet Section -->
    <div class="flex flex-wrap justify-center sm:justify-start gap-4 mt-4 lg:ml-6">
    
    </div>

    @if(auth()->user()->user_role === 'service_provider')
    <!-- Service Provider Alert -->
    <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-2xl shadow-lg px-6 py-6 max-w-6xl mx-auto">
      <h2 class="text-lg font-bold">Welcome, Service Provider!</h2>
      <p class="text-blue-50 text-sm mt-1">Complete your profile to start offering services and attract more clients.</p>
    </div>

    <!-- Profile Completion Section for Service Providers -->
    <div class="bg-white rounded-2xl shadow-lg px-4 sm:px-6 py-8 space-y-6 max-w-6xl mx-auto border border-gray-100">
      <h3 class="text-gray-800 font-bold text-lg sm:text-xl text-center sm:text-left">
        Complete Your Service Provider Profile
      </h3>

      <!-- Grid of Steps -->
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        <a href="{{ route('personal-info') }}" class="group bg-white border-2 border-gray-200 hover:border-blue-400 rounded-xl px-4 py-6 text-center font-semibold text-sm transition-all duration-300 hover:shadow-md">
          <div class="text-gray-700 group-hover:text-blue-600">Personal Information</div>
        </a>

        <a href="{{ route('my-documents') }}" class="group bg-white border-2 border-gray-200 hover:border-blue-400 rounded-xl px-4 py-6 text-center font-semibold text-sm transition-all duration-300 hover:shadow-md">
          <div class="text-gray-700 group-hover:text-blue-600">Your Documents</div>
        </a>

        <div class="group bg-white border-2 border-gray-200 hover:border-blue-400 rounded-xl px-4 py-6 text-center font-semibold text-sm transition-all duration-300 hover:shadow-md cursor-pointer">
          <div class="text-gray-700 group-hover:text-blue-600">Terms & Conditions</div>
        </div>

        <div class="group bg-white border-2 border-gray-200 hover:border-blue-400 rounded-xl px-4 py-6 text-center font-semibold text-sm cursor-pointer transition-all duration-300 hover:shadow-md">
          <button id="searchInput" onclick="openSearchPopup()" class="text-gray-700 group-hover:text-blue-600">Categories</button>
        </div>

        <div class="group bg-white border-2 border-gray-200 hover:border-blue-400 rounded-xl px-4 py-6 text-center font-semibold text-sm cursor-pointer transition-all duration-300 hover:shadow-md" onclick="openAboutYouPopup()">
          <div class="text-gray-700 group-hover:text-blue-600">About You</div>
        </div>

        <div class="group bg-white border-2 border-gray-200 hover:border-blue-400 rounded-xl px-4 py-6 text-center font-semibold text-sm transition-all duration-300 hover:shadow-md">
          <a id="openSpecialStatusModal" href="#" class="text-gray-700 group-hover:text-blue-600">Special Status</a>
        </div>
      </div>

      <!-- Bottom CTA -->
      <div class="pt-4 text-center">
        <a href="{{ route('points-calculation') }}" class="inline-block px-8 py-3 bg-blue-500 hover:bg-blue-600 rounded-full text-white font-semibold text-sm transition-colors duration-300 shadow-md hover:shadow-lg">
          Calculate Ulysse Points
        </a>
      </div>
    </div>

    @else
    <!-- Regular User Section -->
    <div class="bg-gradient-to-r from-gray-50 to-gray-100 rounded-2xl shadow-lg px-6 py-6 max-w-6xl mx-auto border border-gray-200">
      <h2 class="text-lg font-bold text-gray-800">My Account</h2>
      <p class="text-gray-600 text-sm mt-1">Manage your personal information and account settings.</p>
    </div>

    <!-- Personal Information Section for Regular Users -->
    <div class="bg-white rounded-2xl shadow-lg px-4 sm:px-6 py-8 space-y-6 max-w-6xl mx-auto border border-gray-100">
      <h3 class="text-gray-800 font-bold text-lg sm:text-xl text-center sm:text-left">
        Account Settings
      </h3>

      <!-- Single Personal Info Card -->
      <div class="flex justify-center">
        <a href="{{ route('personal-info') }}" class="group bg-white border-2 border-gray-200 hover:border-blue-400 rounded-xl px-8 py-8 text-center font-semibold text-base transition-all duration-300 hover:shadow-md max-w-md w-full">
          <div class="flex flex-col items-center space-y-3">
            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center group-hover:bg-blue-200 transition-colors">
              <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
              </svg>
            </div>
            <div class="text-gray-700 group-hover:text-blue-600">Personal Information</div>
            <div class="text-sm text-gray-500">Update your profile details</div>
          </div>
        </a>
      </div>
    </div>
    @endif
  </div>
</div>

@if(auth()->user()->role === 'service_provider')
<!-- About You Modal -->
<div id="aboutYouPopup" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl w-full max-w-xl p-6 shadow-2xl relative">
    <button onclick="closeAboutYouPopup()" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 text-2xl transition-colors">&times;</button>
    <h2 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-4">Tell us about yourself</h2>
    <p class="text-gray-600 text-sm mb-4">Share a few words about yourself to make your profile stand out and attract more clients.</p>
    <textarea id="aboutYouText" rows="5" class="w-full border border-gray-300 rounded-lg p-4 text-gray-700 resize-none mb-4 placeholder:text-sm focus:border-blue-400 focus:outline-none" placeholder="What you fill out here will be on your profile sheet and is important to get more missions"></textarea>
    <button onclick="submitAboutYou()" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-xl w-full transition-colors">Submit</button>
  </div>
</div>

<!-- Special Status Modal -->
<div id="specialStatusModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-2 sm:p-4">
  <div class="bg-white rounded-2xl p-4 sm:p-6 w-full max-w-xs sm:max-w-xl shadow-2xl relative max-h-[90vh] overflow-y-auto">
    <button id="closeSpecialStatusModal" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 text-2xl transition-colors">&times;</button>
    <h2 class="font-bold mb-4 text-lg sm:text-xl text-gray-800">Do you have a special status?</h2>
    <div class="space-y-3 mb-6">
      <?php
        $statuses = [
          ['label' => 'Expatriates for 2 to 5 years', 'color' => 'bg-blue-400'],
          ['label' => 'Expatriates for 6 to 10 years', 'color' => 'bg-blue-500'],
          ['label' => 'Expatriates for more than 10 years', 'color' => 'bg-blue-600'],
          ['label' => 'Lawyer', 'color' => 'bg-purple-400'],
          ['label' => 'Legal advice', 'color' => 'bg-purple-500'],
          ['label' => 'Insurer', 'color' => 'bg-green-400'],
          ['label' => 'Real estate agent', 'color' => 'bg-green-500'],
          ['label' => 'Translator', 'color' => 'bg-orange-400'],
          ['label' => 'Guide', 'color' => 'bg-orange-500'],
          ['label' => 'Language teacher', 'color' => 'bg-cyan-400']
        ];
        foreach ($statuses as $idx => $status) {
          echo '
          <div class="flex flex-col sm:flex-row items-center justify-between border border-gray-200 rounded-xl px-4 py-3 special-status-item hover:border-gray-300 transition-colors">
            <div class="flex items-center space-x-3 mb-2 sm:mb-0">
              <div class="w-4 h-4 rounded-full '.$status['color'].'"></div>
              <span class="text-sm text-gray-700">'.$status['label'].'</span>
            </div>
            <div class="flex space-x-2">
              <button type="button" class="toggle-btn bg-white text-gray-600 border border-gray-300 hover:border-blue-400 hover:text-blue-600 rounded-full px-4 py-1 text-sm transition-colors">Yes</button>
              <button type="button" class="toggle-btn bg-white text-gray-600 border border-gray-300 hover:border-blue-400 hover:text-blue-600 rounded-full px-4 py-1 text-sm transition-colors">No</button>
            </div>
          </div>';
        }
      ?>
    </div>
  </div>
</div>

<!-- Category Search Popup -->
<div id="signupPopup" class="hidden absolute inset-0 z-50 bg-black bg-opacity-50 flex justify-center items-center p-4 overflow-hidden">
  <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-hidden">
    <div class="sticky top-0 bg-white rounded-t-2xl border-b border-gray-100 p-6 flex items-center justify-between">
      <h2 class="text-xl font-semibold text-gray-800">Choose Your Category</h2>
      <button onclick="closeAllPopups()" class="text-gray-400 hover:text-gray-600 transition-colors">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <line x1="18" y1="6" x2="6" y2="18" />
          <line x1="6" y1="6" x2="18" y2="18" />
        </svg>
      </button>
    </div>

    <!-- Categories Grid -->
    <div class="p-6 pt-2">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Expatriés -->
        <div data-name="expatriés" data-keywords="visa,expat,relocation,help" class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group transition-all" onclick="showExpatriesSubcategories()">
          <div class="w-14 h-14 bg-orange-400 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
            <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
            </svg>
          </div>
          <div class="flex-grow">
            <h3 class="text-lg font-semibold text-gray-800 mb-1">Expatriés</h3>
          </div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <!-- Vacanciers -->
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group transition-all" onclick="showVacanciersSubcategories()">
          <div class="w-14 h-14 bg-blue-500 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
            <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
              <path d="M14,6V4H10V6H9A2,2 0 0,0 7,8V19A2,2 0 0,0 9,21H15A2,2 0 0,0 17,19V8A2,2 0 0,0 15,6H14M12,7A2,2 0 0,1 14,9A2,2 0 0,1 12,11A2,2 0 0,1 10,9A2,2 0 0,1 12,7Z" />
            </svg>
          </div>
          <div class="flex-grow">
            <h3 class="text-lg font-semibold text-gray-800 mb-1">Vacanciers</h3>
          </div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <!-- Investisseurs -->
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group transition-all" onclick="showInvestisseursSubcategories()">
          <div class="w-14 h-14 bg-green-500 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
            <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
              <path d="M11.8,10.9C9.53,10.31 8.8,9.7 8.8,8.75C8.8,7.66 9.81,6.9 11.5,6.9C13.28,6.9 13.94,7.75 14,9H16.21C16.14,7.28 15.09,5.7 13,5.19V3H10V5.16C8.06,5.58 6.5,6.84 6.5,8.77C6.5,11.08 8.41,12.23 11.2,12.9C13.7,13.5 14.2,14.38 14.2,15.31C14.2,16 13.71,17.1 11.5,17.1C9.44,17.1 8.63,16.18 8.5,15H6.32C6.44,17.19 8.08,18.42 10,18.83V21H13V18.85C14.95,18.5 16.5,17.35 16.5,15.3C16.5,12.46 14.07,11.5 11.8,10.9Z" />
            </svg>
          </div>
          <div class="flex-grow">
            <h3 class="text-lg font-semibold text-gray-800 mb-1">Investisseurs</h3>
          </div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <!-- Travailleurs & Freelances -->
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group transition-all" onclick="showTravailleursFreelancesSubcategories()">
          <div class="w-14 h-14 bg-gray-500 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
            <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
              <path d="M20,6C20.58,6 21.05,6.2 21.42,6.59C21.8,7 22,7.45 22,8V19C22,19.55 21.8,20 21.42,20.41C21.05,20.8 20.58,21 20,21H4C3.42,21 2.95,20.8 2.58,20.41C2.2,20 2,19.55 2,19V8C2,7.45 2.2,7 2.58,6.59C2.95,6.2 3.42,6 4,6H8V4C8,3.42 8.2,2.95 8.58,2.58C8.95,2.2 9.42,2 10,2H14C14.58,2 15.05,2.2 15.42,2.58C15.8,2.95 16,3.42 16,4V6H20M4,8V19H20V8H4M10,4V6H14V4H10Z" />
            </svg>
          </div>
          <div class="flex-grow">
            <h3 class="text-lg font-semibold text-gray-800 mb-1">Travailleurs & Freelances</h3>
          </div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <!-- Digital Nomade -->
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group transition-all">
          <div class="w-14 h-14 bg-red-500 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
            <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4M12,6A6,6 0 0,0 6,12A6,6 0 0,0 12,18A6,6 0 0,0 18,12A6,6 0 0,0 12,6M12,8A4,4 0 0,1 16,12A4,4 0 0,1 12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8Z" />
            </svg>
          </div>
          <div class="flex-grow">
            <h3 class="text-lg font-semibold text-gray-800 mb-1">Digital Nomade</h3>
          </div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <!-- Students -->
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group transition-all">
          <div class="w-14 h-14 bg-purple-500 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
            <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12,3L1,9L12,15L21,10.09V17H23V9M5,13.18V17.18L12,21L19,17.18V13.18L12,17L5,13.18Z" />
            </svg>
          </div>
          <div class="flex-grow">
            <h3 class="text-lg font-semibold text-gray-800 mb-1">Students</h3>
          </div>
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

<!-- Additional popup content remains the same for service providers... -->
<!-- You would include all the other popups here with the same styling updates -->

<script>
  document.addEventListener("DOMContentLoaded", function () {
    // === CATEGORY POPUP OPEN ===
    const searchInput = document.getElementById("searchInput");
    if (searchInput) {
      searchInput.addEventListener("click", openSearchPopup);
    }

    // === SPECIAL STATUS MODAL OPEN ===
    const openBtn = document.getElementById("openSpecialStatusModal");
    const modal = document.getElementById("specialStatusModal");
    const closeBtn = document.getElementById("closeSpecialStatusModal");

    if (openBtn && modal && closeBtn) {
      openBtn.addEventListener("click", (e) => {
        e.preventDefault();
        modal.classList.remove("hidden");
      });

      closeBtn.addEventListener("click", () => {
        modal.classList.add("hidden");
      });

      window.addEventListener("click", (e) => {
        if (e.target === modal) {
          modal.classList.add("hidden");
        }
      });
    }

    // === TOGGLE BUTTON STYLE ===
    document.querySelectorAll(".special-status-item").forEach(group => {
      const buttons = group.querySelectorAll(".toggle-btn");

      buttons.forEach(button => {
        button.addEventListener("click", () => {
          buttons.forEach(btn => {
            btn.classList.remove("bg-blue-500", "text-white", "border-blue-500");
            btn.classList.add("bg-white", "text-gray-600", "border-gray-300");
          });

          button.classList.remove("bg-white", "text-gray-600", "border-gray-300");
          button.classList.add("bg-blue-500", "text-white", "border-blue-500");
        });
      });
    });
  });

  // === ABOUT YOU ===
  function openAboutYouPopup() {
    document.getElementById("aboutYouPopup").classList.remove("hidden");
  }

  function closeAboutYouPopup() {
    document.getElementById("aboutYouPopup").classList.add("hidden");
  }

  function submitAboutYou() {
    const text = document.getElementById("aboutYouText").value;
    if (text.trim() === "") {
      alert("Please tell us something about yourself.");
    } else {
      alert("Submitted:\n" + text);
      closeAboutYouPopup();
    }
  }

  // === CATEGORY POPUP OPEN FUNCTION ===
  function openSearchPopup() {
    document.getElementById('signupPopup').classList.remove('hidden');
  }

  // === GLOBAL CLOSE ALL POPUPS ===
  function closeAllPopups() {
    const ids = [
      'signupPopup', 'aboutYouPopup', 'specialStatusModal'
    ];
    ids.forEach(id => {
      const el = document.getElementById(id);
      if (el) el.classList.add("hidden");
    });
  }

  // Close popups on escape key
  document.addEventListener('keydown', function (event) {
    if (event.key === "Escape") {
      closeAllPopups();
    }
  });
</script>
@endif

@endsection