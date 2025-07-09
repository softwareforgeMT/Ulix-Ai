@extends('dashboard.layouts.master')

@section('title', 'My Account')

@section('content')
    
    <!-- Main Content -->
<div class="flex flex-col lg:flex-row min-h-screen">

  <!-- Main Content -->
  <div class="flex-1 p-4 sm:p-6 space-y-10">

    <!-- Wallet Section -->
    <!-- Wallet Section -->
    <div class="flex flex-wrap justify-center sm:justify-start gap-4 mt-4 lg:ml-6">
    
    </div>


    <!-- Offer Services Alert -->
    <div class="bg-blue-400 text-white rounded-2xl shadow px-6 py-6 max-w-6xl mx-auto">
      <h2 class="text-lg font-bold uppercase">To offer service and be a service provider, fully complete your profile  </h2>
      <p class="text-white text-sm mt-1"></p>
     
    </div>

    <!-- Profile Completion Section -->
    <div class="bg-white rounded-2xl shadow px-4 sm:px-6 py-8 space-y-6 max-w-6xl mx-auto">
      <h3 class="text-blue-900 font-bold text-sm sm:text-base uppercase text-center sm:text-left">
        OR YOU CAN ALSO COMPLETE YOUR PROFILE SERVICE PROVIDER
      </h3>

      <!-- Grid of Steps -->
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        <a href="{{ route('personal-info') }}" class="border-2 border-red-500 rounded-xl px-4 py-6 text-center font-semibold text-sm">
          Personal Information
        </a>

        <a href="{{ route('my-documents') }}" class="border-2 border-blue-500 rounded-xl px-4 py-6 text-center font-semibold text-sm relative">
          Your Documents
          <span class="absolute top-2 right-3 text-blue-600 text-lg font-bold">✔</span>
        </a>

        <div class="border-2 border-blue-500 rounded-xl px-4 py-6 text-center font-semibold text-sm relative">
          The Conditions
          <span class="absolute top-2 right-3 text-blue-600 text-lg font-bold">✔</span>
        </div>

        <div class="border-2 border-blue-500 rounded-xl px-4 py-6 text-center font-semibold text-sm relative cursor-pointer">
          <button id="searchInput" onclick="openSearchPopup()">Categories</button>
          <span class="absolute top-2 right-3 text-blue-600 text-lg font-bold">✔</span>
        </div>

        <div class="border-2 border-red-500 rounded-xl px-4 py-6 text-center font-semibold text-sm cursor-pointer" onclick="openAboutYouPopup()">
          About You
        </div>

        <div class="border-2 border-red-500 rounded-xl px-4 py-6 text-center font-semibold text-sm">
          <a id="openSpecialStatusModal" href="#">Special Status</a>
        </div>
      </div>

      <!-- Bottom CTA -->
      <div class="pt-4 text-center">
        <a href="{{ route('points-calculation') }}" class="inline-block px-6 py-2 border border-blue-400 rounded-full text-blue-700 font-semibold text-sm hover:bg-blue-50 transition">
          The Ulysse points to be visible
        </a>
      </div>
    </div>
  </div>
</div>



<!-- About You Modal -->
<div id="aboutYouPopup" class="hidden fixed inset-0 bg-black bg-opacity-40 z-50 flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl w-full max-w-xl p-6 shadow-xl relative">
    <button onclick="closeAboutYouPopup()" class="absolute top-3 right-3 text-gray-400 hover:text-black text-2xl">&times;</button>
    <h2 class="text-xl sm:text-2xl font-semibold text-blue-600 mb-4">Say a few words about yourself to make your profile stand out</h2>
    <textarea id="aboutYouText" rows="5" class="w-full border border-gray-300 rounded-lg p-4 text-gray-700 resize-none mb-4 placeholder:text-sm" placeholder="What you fill out here will be on your profile sheet and is important to get more missions"></textarea>
    <button onclick="submitAboutYou()" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-xl w-full">Submit</button>
  </div>
</div>

<!-- Special Status Modal -->
<div id="specialStatusModal" class="fixed inset-0 bg-black bg-opacity-40 hidden z-50 flex items-center justify-center p-2 sm:p-4">
  <div class="bg-white rounded-2xl p-4 sm:p-6 w-full max-w-xs sm:max-w-xl shadow-xl relative max-h-[90vh] overflow-y-auto">
    <button id="closeSpecialStatusModal" class="absolute top-3 right-3 text-gray-500 hover:text-black text-2xl">&times;</button>
    <h2 class="font-bold mb-4 text-lg sm:text-xl text-blue-700">DO YOU HAVE A SPECIAL STATUS?</h2>
    <div class="space-y-3 mb-6">
      <?php
        $statuses = [
          ['label' => 'Expatriates for 2 to 5 years', 'color' => 'bg-pink-400'],
          ['label' => 'Expatriates for 6 to 10 years', 'color' => 'bg-blue-600'],
          ['label' => 'Expatriates for more than 10 years', 'color' => 'bg-green-400'],
          ['label' => 'Lawyer', 'color' => 'bg-pink-400'],
          ['label' => 'Legal advice', 'color' => 'bg-pink-400'],
          ['label' => 'Insurer', 'color' => 'bg-blue-600'],
          ['label' => 'Real estate agent', 'color' => 'bg-blue-600'],
          ['label' => 'Translator', 'color' => 'bg-pink-400'],
          ['label' => 'Guide', 'color' => 'bg-pink-400'],
          ['label' => 'Language teacher', 'color' => 'bg-pink-400']
        ];
        foreach ($statuses as $idx => $status) {
          echo '
          <div class="flex flex-col sm:flex-row items-center justify-between border border-blue-400 rounded-full px-4 py-2 special-status-item">
            <div class="flex items-center space-x-3 mb-2 sm:mb-0">
              <div class="w-5 h-5 rounded-full '.$status['color'].'"></div>
              <span class="text-sm">'.$status['label'].'</span>
            </div>
            <div class="flex space-x-2">
              <button type="button" class="toggle-btn bg-white text-blue-600 border border-blue-600 rounded-full px-4 py-1 text-sm">Yes</button>
              <button type="button" class="toggle-btn bg-white text-blue-600 border border-blue-600 rounded-full px-4 py-1 text-sm">No</button>
            </div>
          </div>';
        }
      ?>
    </div>
  </div>
</div>

<!-- JS -->
<script>
  function openAboutYouPopup() {
    document.getElementById('aboutYouPopup').classList.remove('hidden');
  }
  function closeAboutYouPopup() {
    document.getElementById('aboutYouPopup').classList.add('hidden');
  }
  function submitAboutYou() {
    const value = document.getElementById('aboutYouText').value;
    alert("Submitted: " + value);
    closeAboutYouPopup();
  }

  document.getElementById('openSpecialStatusModal')?.addEventListener('click', () => {
    document.getElementById('specialStatusModal').classList.remove('hidden');
  });
  document.getElementById('closeSpecialStatusModal')?.addEventListener('click', () => {
    document.getElementById('specialStatusModal').classList.add('hidden');
  });
</script>

          
       <!---Category search -- popup -->
         <!-- Main Search Popup -->
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

      <!-- Search Input in Popup -->
      <!-- <div class="px-6 py-4">
        <div class="flex items-center rounded-full border-2 border-gray-200 bg-gray-50 px-4 py-3">
          <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <circle cx="11" cy="11" r="7" />
            <line x1="21" y1="21" x2="16.65" y2="16.65" />
          </svg>
          <input
           id="categorySearch"
            type="text"
            placeholder="Ex: Aide administrative"
            class="flex-grow bg-transparent text-gray-700 focus:outline-none placeholder-gray-500"
          />
        </div>
      </div> -->

      <!-- Categories Grid -->
      <div class="p-6 pt-2">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <!-- Expatriés -->
          <div data-name="expatriés"  data-keywords="visa,expat,relocation,help" class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group" onclick="showExpatriesSubcategories()">
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
          <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group" onclick="showVacanciersSubcategories()">
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
          <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group" onclick = "showInvestisseursSubcategories()">
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
          <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group" onclick = "showTravailleursFreelancesSubcategories()">
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

          <!-- Globe Trotter -->
          <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
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

          <!-- Etudiants -->
          <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
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


  <!-- Investisseurs Subcategories Popup -->
  <div id="investisseursPopup" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
      <!-- Header with back and close buttons -->
      <div class="sticky top-0 bg-white rounded-t-2xl border-b border-gray-100 p-6 flex items-center justify-between">
        <div class="flex items-center">
          <button onclick="goBackToMainCategories()" class="mr-4 text-gray-400 hover:text-gray-600 transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="15,18 9,12 15,6"></polyline>
            </svg>
          </button>
          <h2 class="text-xl font-semibold text-gray-800">Investisseurs - Choose Your Need</h2>
        </div>
        <button onclick="closeAllPopups()" class="text-gray-400 hover:text-gray-600 transition-colors">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
          </svg>
        </button>
      </div>

      <!-- Search Input in Popup -->
      <div class="px-6 py-4">
        <div class="flex items-center rounded-full border-2 border-gray-200 bg-gray-50 px-4 py-3">
          <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <circle cx="11" cy="11" r="7" />
            <line x1="21" y1="21" x2="16.65" y2="16.65" />
          </svg>
          <input
            type="text"
            placeholder="Ex: Consultant fiscal"
            class="flex-grow bg-transparent text-gray-700 focus:outline-none placeholder-gray-500"
          />
        </div>
      </div>

      <!-- Vacanssit Subcategories Grid -->
      <div class="p-6 pt-2">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <!-- Acheter un bien immobilier -->

  
          <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group" onclick = "showInvestisseurBienImmobilierPopup() ">
            <div class="w-14 h-14 bg-purple-300 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
            <div class="flex-grow font-semibold text-gray-800">Acheter un bien immobilier</div>
            <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <polyline points="9,18 15,12 9,6"></polyline>
              </svg>
            </div>
          </div>

          <!-- Je prépare mon expatriation -->
            <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group " onclick="showExpatriesPreparationSubcategories()">
              <div class="w-14 h-14 bg-green-300 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
              <div class="flex-grow font-semibold text-gray-800">
              Je prépare mon expatriation 
              </div>
              <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <polyline points="9,18 15,12 9,6"></polyline>
                </svg>
              </div>
            </div>

          <!-- Investir dans les marchés financiers étrangers -->
          <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group" onclick = "showInvestirMarchesFinanciersPopup()">
            <div class="w-14 h-14 aspect-square bg-yellow-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
            <div class="flex-grow font-semibold text-gray-800">Investir dans les marchés financiers étrangers</div>
            <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <polyline points="9,18 15,12 9,6"></polyline>
              </svg>
            </div>
          </div>

            <!-- J'ai des besoins sur place -->
            <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group" onclick="showExpatriesBesoinsSubcategories()">
              <div class="w-14 h-14 bg-pink-400 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
              <div class="flex-grow font-semibold text-gray-800">J'ai des besoins sur place</div>
              <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <polyline points="9,18 15,12 9,6"></polyline>
                </svg>
              </div>
            </div>

          <!-- Optimisation fiscale -->
          <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group" onclick = "showInvestisseurOptimisationFiscalePopup()">
            <div class="w-14 h-14 bg-blue-300 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
            <div class="flex-grow font-semibold text-gray-800">Optimisation fiscale</div>
            <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <polyline points="9,18 15,12 9,6"></polyline>
              </svg>
            </div>
          </div>

          <!-- Les obligations légales de mes investissements -->
          <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group" onclick = "showInvestisseurObligationsLegalesPopup()">
            <div class="w-14 h-14 aspect-square bg-green-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
            <div class="flex-grow font-semibold text-gray-800">Les obligations légales de mes investissements</div>
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


  <!-- Expatriés Subcategories Popup -->
  <div id="expatriesPopup" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
      <div class="sticky top-0 bg-white rounded-t-2xl border-b border-gray-100 p-6 flex items-center justify-between">
        <div class="flex items-center">
          <button onclick="goBackToMainCategories()" class="mr-4 text-gray-400 hover:text-gray-600 transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="15,18 9,12 15,6"></polyline>
            </svg>
          </button>
          <h2 class="text-xl font-semibold text-gray-800">Expatriés - Choose Your Need</h2>
        </div>
        <button onclick="closeAllPopups()" class="text-gray-400 hover:text-gray-600 transition-colors">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
          </svg>
        </button>
      </div>

      <div class="px-6 py-4">
        <div class="flex items-center rounded-full border-2 border-gray-200 bg-gray-50 px-4 py-3">
          <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <circle cx="11" cy="11" r="7" />
            <line x1="21" y1="21" x2="16.65" y2="16.65" />
          </svg>
          <input
            type="text"
            placeholder="Ex: Aide administrative"
            class="flex-grow bg-transparent text-gray-700 focus:outline-none placeholder-gray-500"
          />
        </div>
      </div>

      <div class="p-6 pt-2">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <!-- J'ai une urgence -->
          <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group" onclick="showExpatriesUrgenceSubcategories()">
            <div class="w-14 h-14 bg-cyan-400 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
            <div class="flex-grow font-semibold text-gray-800">J'ai une urgence</div>
            <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <polyline points="9,18 15,12 9,6"></polyline>
              </svg>
            </div>
          </div>

          <!-- Je prépare mon expatriation -->
          <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group " onclick="showExpatriesPreparationSubcategories()">
            <div class="w-14 h-14 bg-green-300 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
            <div class="flex-grow font-semibold text-gray-800">
             Je prépare mon expatriation 
            </div>
            <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <polyline points="9,18 15,12 9,6"></polyline>
              </svg>
            </div>
          </div>

          <!-- Je cherche une assurance -->
          <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group" onclick="showExpatriesAssuranceSubcategories()">
            <div class="w-14 h-14 bg-purple-300 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
            <div class="flex-grow font-semibold text-gray-800">Je cherche une assurance</div>
            <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <polyline points="9,18 15,12 9,6"></polyline>
              </svg>
            </div>
          </div>

          <!-- J'ai des besoins sur place -->
          <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group" onclick="showExpatriesBesoinsSubcategories()">
            <div class="w-14 h-14 bg-pink-400 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
            <div class="flex-grow font-semibold text-gray-800">J'ai des besoins sur place</div>
            <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <polyline points="9,18 15,12 9,6"></polyline>
              </svg>
            </div>
          </div>

          <!-- Santé et bien-être pour expatrié -->
          <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group md:col-span-2">
            <div class="w-14 h-14 bg-orange-300 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
            <div class="flex-grow font-semibold text-gray-800">Santé et bien-être pour expatrié</div>
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


<!-- Travailleurs & Freelances Subcategories Popup -->
<div id="travailleursFreelancesPopup" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4" >
  <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
    <!-- Header with back and close buttons -->
    <div class="sticky top-0 bg-white rounded-t-2xl border-b border-gray-100 p-6 flex items-center justify-between">
      <div class="flex items-center">
        <button onclick="goBackToMainCategories()" class="mr-4 text-gray-400 hover:text-gray-600 transition-colors">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <polyline points="15,18 9,12 15,6"></polyline>
          </svg>
        </button>
        <h2 class="text-xl font-semibold text-gray-800">Worker & Freelances</h2>
      </div>
      <button onclick="closeAllPopups()" class="text-gray-400 hover:text-gray-600 transition-colors">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </button>
    </div>

    <!-- Subcategories Grid -->
    <div class="p-6 pt-2">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
 
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group" onclick = "showTravailleursCreerEntrepriseSubSubcategoriesPopup() ">
          <div class="w-14 h-14 bg-purple-300 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">Créer son entreprise ou son activité</div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group" onclick = "showTravailleursDevelopperReseauSubSubcategoriesPopup()">
          <div class="w-14 h-14 bg-tan-300 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">Développer son réseau professionnel</div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group" onclick = "showTravailleursGestionFinanciereSubSubcategoriesPopup()">
          <div class="w-14 h-14 bg-cyan-300 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">Gestion financière et fiscalité</div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group" onclick ="showTravailleursProtectionSocialeSubSubcategoriesPopup()" >
          <div class="w-14 h-14 aspect-square bg-sky-400 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">Protection sociale et assurance professionnelle</div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group" onclick = "showTravailleursTrouverEmploiSubSubcategoriesPopup()">
          <div class="w-14 h-14 bg-purple-300 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">Trouver un emploi ou des missions</div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group" onclick = " showTravailleursVisaAutorisationsSubSubcategoriesPopup()">
          <div class="w-14 h-14 bg-purple-300 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">Visa et autorisations de travail</div>
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


  <!-- Vacanciers Subcategories Popup -->
  <div id="vacanciersPopup" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
      <div class="sticky top-0 bg-white rounded-t-2xl border-b border-gray-100 p-6 flex items-center justify-between">
        <div class="flex items-center">
          <button onclick="goBackToMainCategories()" class="mr-4 text-gray-400 hover:text-gray-600 transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="15,18 9,12 15,6"></polyline>
            </svg>
          </button>
          <h2 class="text-xl font-semibold text-gray-800">Vacanciers - Choose Your Need</h2>
        </div>
        <button onclick="closeAllPopups()" class="text-gray-400 hover:text-gray-600 transition-colors">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
          </svg>
        </button>
      </div>

      <div class="px-6 py-4">
        <div class="flex items-center rounded-full border-2 border-gray-200 bg-gray-50 px-4 py-3">
          <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <circle cx="11" cy="11" r="7" />
            <line x1="21" y1="21" x2="16.65" y2="16.65" />
          </svg>
          <input
            type="text"
            placeholder="Ex: Avocat immobilier"
            class="flex-grow bg-transparent text-gray-700 focus:outline-none placeholder-gray-500"
          />
        </div>
      </div>

      <div class="p-6 pt-2">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <!-- préparer mon voyage -->
          <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group" onclick="showVacanciersPreparationSubcategories()">
            <div class="w-14 h-14 bg-purple-300 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
              <!-- Icon: clipboard/checklist -->
              <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                <path d="M9 11l3 3L22 4l-1.5-1.5L12 13l-3-3-2 2z" />
                <path d="M5 20h14v-2H5v2z" />
              </svg>
            </div>
            <div class="flex-grow font-semibold text-gray-800">préparer mon voyage</div>
            <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <polyline points="9,18 15,12 9,6"></polyline>
              </svg>
            </div>
          </div>

          <!-- urgence à l'étranger -->
          <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group"  onclick="showVacanciersUrgenceSubcategories()">
            <div class="w-14 h-14 bg-purple-300 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
              <!-- Icon: warning triangle -->
              <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                <path d="M1 21h22L12 2 1 21z" />
                <path d="M12 16v-4" stroke="#fff" stroke-width="2" stroke-linecap="round" />
                <circle cx="12" cy="18" r="1" fill="#fff" />
              </svg>
            </div>
            <div class="flex-grow font-semibold text-gray-800">I am preparing my expatriation</div>
            <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <polyline points="9,18 15,12 9,6"></polyline>
              </svg>
            </div>
          </div>

          <!-- Problèmes en voyages -->
          <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group" onclick="showVacanciersProblemesVoyagesSubcategories()">
            <div class="w-14 h-14 bg-yellow-300 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
            <div class="flex-grow font-semibold text-gray-800">Problèmes en voyages</div>
            <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <polyline points="9,18 15,12 9,6"></polyline>
              </svg>
            </div>
          </div>

          <!-- Besoins divers à l'étranger -->
          <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group" onclick = "showVacanciersAutresBesoinsSubcategories()">
            <div class="w-14 h-14 bg-cyan-300 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
              <!-- Icon: airplane inside circle -->
              <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                <path d="M2.5 19l19-7-19-7v5l13 2-13 2v5z" />
              </svg>
            </div>
            <div class="flex-grow font-semibold text-gray-800">I have needs on site</div>
            <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <polyline points="9,18 15,12 9,6"></polyline>
              </svg>
            </div>
          </div>

          <!-- Santé & Bien-être -->
          <div id="expatriesSantePopup" class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group md:col-span-2"onclick="showExpatriesSanteSubcategories()">
            <div class="w-14 h-14 bg-blue-300 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
            <div class="flex-grow font-semibold text-gray-800">Santé & Bien-être</div>
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

  <!-- Expatriés - J'ai une urgence Sub-subcategories Popup -->
<div id="expatriesUrgencePopup" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
    <div class="sticky top-0 bg-white rounded-t-2xl border-b border-gray-100 p-6 flex items-center justify-between">
      <div class="flex items-center">
        <button onclick="goBackToExpatriesSubcategories()" class="mr-4 text-gray-400 hover:text-gray-600 transition-colors">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <polyline points="15,18 9,12 15,6"></polyline>
          </svg>
        </button>
        <h2 class="text-xl font-semibold text-gray-800">Expatriés → J'ai une urgence</h2>
      </div>
      <button onclick="closeAllPopups()" class="text-gray-400 hover:text-gray-600 transition-colors">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </button>
    </div>

    <div class="px-6 py-4">
      <input
        type="text"
        placeholder="Ex: Aide administrative"
        class="w-full rounded-full border-2 border-gray-200 bg-gray-50 px-4 py-3 text-gray-700 focus:outline-none placeholder-gray-500"
      />
    </div>

    <div class="p-6 pt-2">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Sub-subcategory cards -->
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-gray-100 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           Autres urgences vitales
</a>
           </div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-orange-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
         J'ai perdu mon passeport
</a>
           </div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-orange-100 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           Je cherche une pharmacie ouverte en urgence
</a>
           </div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-pink-50 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
            Je dois contacter mon ambassade immédiatement
</a>
            </div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>




<!-- JS -->
<!-- <script>
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
</script> -->


  </div>


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
      openBtn.addEventListener("click", () => {
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

    // === CLOSE POPUPS ON OUTSIDE CLICK ===
    document.addEventListener("click", function (event) {
      const popups = [
        document.getElementById("searchPopup"),
        document.getElementById("expatriesPopup"),
        document.getElementById("vacanciersPopup")
      ];
      const isInside = popups.some(p => p && p.contains(event.target));
      if (!isInside && !searchInput.contains(event.target)) {
        closeAllPopups();
      }
    });

    // === TOGGLE BUTTON STYLE ===
    document.querySelectorAll(".special-status-item").forEach(group => {
      const buttons = group.querySelectorAll(".toggle-btn");

      buttons.forEach(button => {
        button.addEventListener("click", () => {
          buttons.forEach(btn => {
            btn.classList.remove("bg-blue-600", "text-white");
            btn.classList.add("bg-white", "text-blue-600");
          });

          button.classList.remove("bg-white", "text-blue-600");
          button.classList.add("bg-blue-600", "text-white");
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
    document.getElementById('searchPopup').classList.remove('hidden');
    document.getElementById('expatriesPopup')?.classList.add('hidden');
    document.getElementById('vacanciersPopup')?.classList.add('hidden');
  }

  // === GLOBAL CLOSE ALL POPUPS ===
  function closeAllPopups() {
    const ids = [
      'searchPopup', 'expatriesPopup', 'vacanciersPopup', 'vacanciersPreparationPopup',
      'vacanciersUrgencePopup', 'vacanciersProblemesVoyagesPopup',
      'expatriesUrgencePopup', 'expatriesPreparationPopup', 'expatriesAssurancePopup',
      'expatriesBesoinsPopup', 'expatriesSantePopup', "vacanciersAutresBesoinsPopup",
      'investisseursPopup', 'investisseurBienImmobilierPopup', "Acheter un bien immobilier",
      "investirMarchesFinanciersPopup", "investisseurSecuriserInvestissementsPopup",
      "investisseurOptimisationFiscalePopup", "investisseurObligationsLegalesPopup",
      "travailleursFreelancesPopup", "travailleursCreerEntreprisePopup",
      "travailleursDevelopperReseauPopup", "travailleursGestionFinancierePopup",
      "travailleursProtectionSocialePopup", "travailleursTrouverEmploiPopup",
      "travailleursVisaAutorisationsPopup", "travailleursCreerEntrepriseSubSubcategoriesPopup",
      "travailleursDevelopperReseauSubSubcategoriesPopup", "travailleursGestionFinanciereSubSubcategoriesPopup",
      "travailleursProtectionSocialeSubSubcategoriesPopup", "travailleursTrouverEmploiSubSubcategoriesPopup",
      "travailleursVisaAutorisationsSubSubcategoriesPopup"
    ];
    ids.forEach(id => {
      const el = document.getElementById(id);
      if (el) el.classList.add("hidden");
    });
  }
</script>
<script>
  function openSignupPopup() {
    document.getElementById('signupPopup').classList.remove('hidden');
  }

  function closeSignupPopup() {
    document.getElementById('signupPopup').classList.add('hidden');
  }

  // Optional: auto-close on ESC key
  document.addEventListener('keydown', function (event) {
    if (event.key === "Escape") {
      closeSignupPopup();
    }
  });

  // Attach close button if dynamically needed
  document.addEventListener('DOMContentLoaded', () => {
    const closeBtn = document.getElementById('closePopup');
    if (closeBtn) {
      closeBtn.addEventListener('click', closeSignupPopup);
    }
  });
</script>
@endsection