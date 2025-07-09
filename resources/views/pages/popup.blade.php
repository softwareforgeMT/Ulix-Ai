 <!-- Main Search Popup -->
<div id="searchPopup" class="hidden fixed inset-0 z-50 bg-black bg-opacity-50 flex justify-center items-center p-4 overflow-hidden">
  <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">

    <!-- Header -->
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
      <div class="grid grid-cols-2 gap-4">
        <!-- Category Card Template -->
        <div onclick="showExpatriesSubcategories()" class="category-card bg-white rounded-xl p-4 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex flex-col items-center text-center group">
          <div class="w-12 h-12 bg-orange-400 rounded-full flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
            </svg>
          </div>
          <h3 class="text-sm font-semibold text-gray-800">Expatriés</h3>
        </div>

        <div onclick="showVacanciersSubcategories()" class="category-card bg-white rounded-xl p-4 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex flex-col items-center text-center group">
          <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
              <path d="M14,6V4H10V6H9A2,2 0 0,0 7,8V19A2,2 0 0,0 9,21H15A2,2 0 0,0 17,19V8A2,2 0 0,0 15,6H14M12,7A2,2 0 0,1 14,9A2,2 0 0,1 12,11A2,2 0 0,1 10,9A2,2 0 0,1 12,7Z" />
            </svg>
          </div>
          <h3 class="text-sm font-semibold text-gray-800">Vacanciers</h3>
        </div>

        <div onclick="showInvestisseursSubcategories()" class="category-card bg-white rounded-xl p-4 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex flex-col items-center text-center group">
          <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
              <path d="M11.8,10.9C9.53,10.31 8.8,9.7 8.8,8.75C8.8,7.66 9.81,6.9 11.5,6.9C13.28,6.9 13.94,7.75 14,9H16.21C16.14,7.28 15.09,5.7 13,5.19V3H10V5.16C8.06,5.58 6.5,6.84 6.5,8.77C6.5,11.08 8.41,12.23 11.2,12.9C13.7,13.5 14.2,14.38 14.2,15.31C14.2,16 13.71,17.1 11.5,17.1C9.44,17.1 8.63,16.18 8.5,15H6.32C6.44,17.19 8.08,18.42 10,18.83V21H13V18.85C14.95,18.5 16.5,17.35 16.5,15.3C16.5,12.46 14.07,11.5 11.8,10.9Z" />
            </svg>
          </div>
          <h3 class="text-sm font-semibold text-gray-800">Investisseurs</h3>
        </div>

        <div onclick="showTravailleursFreelancesSubcategories()" class="category-card bg-white rounded-xl p-4 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex flex-col items-center text-center group">
          <div class="w-12 h-12 bg-gray-500 rounded-full flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
              <path d="M20,6C20.58,6 21.05,6.2 21.42,6.59C21.8,7 22,7.45 22,8V19C22,19.55 21.8,20 21.42,20.41C21.05,20.8 20.58,21 20,21H4C3.42,21 2.95,20.8 2.58,20.41C2.2,20 2,19.55 2,19V8C2,7.45 2.2,7 2.58,6.59C2.95,6.2 3.42,6 4,6H8V4C8,3.42 8.2,2.95 8.58,2.58C8.95,2.2 9.42,2 10,2H14C14.58,2 15.05,2.2 15.42,2.58C15.8,2.95 16,3.42 16,4V6H20M4,8V19H20V8H4M10,4V6H14V4H10Z" />
            </svg>
          </div>
          <h3 class="text-sm font-semibold text-gray-800">Travailleurs & Freelances</h3>
        </div>

        <div class="category-card bg-white rounded-xl p-4 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex flex-col items-center text-center group">
          <div class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4M12,6A6,6 0 0,0 6,12A6,6 0 0,0 12,18A6,6 0 0,0 18,12A6,6 0 0,0 12,6M12,8A4,4 0 0,1 16,12A4,4 0 0,1 12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8Z" />
            </svg>
          </div>
          <h3 class="text-sm font-semibold text-gray-800">Digital Nomade</h3>
        </div>

        <div class="category-card bg-white rounded-xl p-4 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex flex-col items-center text-center group">
          <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12,3L1,9L12,15L21,10.09V17H23V9M5,13.18V17.18L12,21L19,17.18V13.18L12,17L5,13.18Z" />
            </svg>
          </div>
          <h3 class="text-sm font-semibold text-gray-800">Students</h3>
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
          <div class="flex-grow font-semibold text-gray-800">
            Acheter un bien immobilier </div>
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
          <a href="/requestforhelp"> Autres urgences vitales </a>
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
      <a href="/requestforhelp">   J'ai perdu mon passeport
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
          <a href="/requestforhelp">  Je cherche une pharmacie ouverte en urgence
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
          <a href="/requestforhelp"> >  Je dois contacter mon ambassade immédiatement
</a>
            </div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

       

    

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-yellow-50 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
         <a href="/requestforhelp">   Je dois trouver un avocat en urgence
</a>
           </div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

       

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-purple-100 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
         <a href="/requestforhelp">  Je suis coincé à la frontière ou refusé à l'entrée
</a>
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
  
<!-- Expatriés - Je prépare mon expatriation Sub-subcategories Popup -->
<div id="expatriesPreparationPopup" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
    <div class="sticky top-0 bg-white rounded-t-2xl border-b border-gray-100 p-6 flex items-center justify-between">
      <div class="flex items-center">
        <button onclick="goBackToExpatriesSubcategories()" class="mr-4 text-gray-400 hover:text-gray-600 transition-colors">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <polyline points="15,18 9,12 15,6"></polyline>
          </svg>
        </button>
        <h2 class="text-xl font-semibold text-gray-800">
         <a href="/requestforhelp">   Expatriés → Je prépare mon expatriation
</a>
          </h2>
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
        placeholder="Ex: Consultant fiscal"
        class="w-full rounded-full border-2 border-gray-200 bg-gray-50 px-4 py-3 text-gray-700 focus:outline-none placeholder-gray-500"
      />
    </div>

    <div class="p-6 pt-2">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Sub-subcategory cards -->
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-orange-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           <a href="/requestForHelp.php"> Je cherche un logement avant d’arriver
</a>
           </div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-green-300 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           <a href="/requestforhelp">  Je cherche un visa adapté à mon projet
</a>
           </div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-yellow-50 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
          <a href="/requestforhelp">  Je cherche une assurance santé expatrié
</a>
           </div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           <a href="/requestforhelp">  Je choisis mon pays d’expatriation
</a>
           </div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

       

      

      

      

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-yellow-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
        <a href="/requestforhelp">     Je veux transférer mon argent en toute sécurité </a></div>
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

<!-- Expatriés - Je cherche une assurance Sub-subcategories Popup -->
<div id="expatriesAssurancePopup" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
    <div class="sticky top-0 bg-white rounded-t-2xl border-b border-gray-100 p-6 flex items-center justify-between">
      <div class="flex items-center">
        <button onclick="goBackToExpatriesSubcategories()" class="mr-4 text-gray-400 hover:text-gray-600 transition-colors">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <polyline points="15,18 9,12 15,6"></polyline>
          </svg>
        </button>
        <h2 class="text-xl font-semibold text-gray-800">Expatriés → Je cherche une assurance</h2>
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
        placeholder="Ex: Traduction de documents"
        class="w-full rounded-full border-2 border-gray-200 bg-gray-50 px-4 py-3 text-gray-700 focus:outline-none placeholder-gray-500"
      />
    </div>

    <div class="p-6 pt-2">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Sub-subcategory cards -->
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-purple-100 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           <a href="/requestforhelp">  Autres problèmes courants </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-orange-100 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
          <a href="/requestforhelp">  J'ai des difficultés avec la langue locale </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           <a href="/requestforhelp">  Je galère pour trouver un logement stable </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-green-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           <a href="/requestforhelp">  Je m'intègre mal dans la société locale </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>


        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-purple-100 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           <a href="/requestforhelp"> > Mon visa est expiré ou en problème </a></div>
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

<!-- Expatriés - J'ai des besoins sur place Sub-subcategories Popup -->
<div id="expatriesBesoinsPopup" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
    <div class="sticky top-0 bg-white rounded-t-2xl border-b border-gray-100 p-6 flex items-center justify-between">
      <div class="flex items-center">
        <button onclick="goBackToExpatriesSubcategories()" class="mr-4 text-gray-400 hover:text-gray-600 transition-colors">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <polyline points="15,18 9,12 15,6"></polyline>
          </svg>
        </button>
        <h2 class="text-xl font-semibold text-gray-800">Expatriés → J'ai des besoins sur place</h2>
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
        placeholder="Ex: Dépannage urgent"
        class="w-full rounded-full border-2 border-gray-200 bg-gray-50 px-4 py-3 text-gray-700 focus:outline-none placeholder-gray-500"
      />
    </div>

    <div class="p-6 pt-2">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Sub-subcategory cards -->
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-purple-100 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
          <a href="/requestforhelp">  Autres besoins du quotidien
</a>
           </div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-purple-100 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
         <a href="/requestforhelp">  Je cherche à me faire un réseau d'amis
</a>
           </div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-cyan-100 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
          <a href="/requestforhelp">  Je cherche des groupes ou communautés d'expatriés
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
          <a href="/requestforhelp">  Je cherche un logement à louer
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
          <a href="/requestforhelp">  Je veux trouver des restaurants adaptés à mon régime alimentaire
</a>
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

<!-- Expatriés - Santé et bien-être pour expatrié Sub-subcategories Popup -->
<div id="expatriesSantePopup" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
    <div class="sticky top-0 bg-white rounded-t-2xl border-b border-gray-100 p-6 flex items-center justify-between">
      <div class="flex items-center">
        <button onclick="goBackToExpatriesSubcategories()" class="mr-4 text-gray-400 hover:text-gray-600 transition-colors">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <polyline points="15,18 9,12 15,6"></polyline>
          </svg>
        </button>
        <h2 class="text-xl font-semibold text-gray-800">Expatriés → Santé et bien-être pour expatrié</h2>
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
        placeholder="Ex: Avocat immobilier"
        class="w-full rounded-full border-2 border-gray-200 bg-gray-50 px-4 py-3 text-gray-700 focus:outline-none placeholder-gray-500"
      />
    </div>

    <div class="p-6 pt-2">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Sub-subcategory cards -->
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-green-50 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
          <a href="/requestforhelp">  Autres besoins santé et bien-être </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-yellow-50 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           <a href="/requestforhelp">  Je cherche des soins préventifs (vaccins, bilans santé) </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-pink-50 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
          <a href="/requestforhelp">  Je cherche un thérapeute ou un psychologue </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-gray-100 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           <a href="/requestforhelp">  Je cherche une assurance santé adaptée </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

       

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-yellow-50 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
          <a href="/requestforhelp">  Je veux trouver un médecin généraliste </a></div>
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

    <!-- Vacanciers - Préparer mon voyage Sub-subcategories Popup -->
<div id="vacanciersPreparationPopup" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
    <!-- Header with back and close buttons -->
    <div class="sticky top-0 bg-white rounded-t-2xl border-b border-gray-100 p-6 flex items-center justify-between">
      <div class="flex items-center">
        <button onclick="goBackToVacanciersSubcategories()" class="mr-4 text-gray-400 hover:text-gray-600 transition-colors">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <polyline points="15,18 9,12 15,6"></polyline>
          </svg>
        </button>
        <h2 class="text-xl font-semibold text-gray-800">Vacanciers → préparer mon voyage</h2>
      </div>
      <button onclick="closeAllPopups()" class="text-gray-400 hover:text-gray-600 transition-colors">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </button>
    </div>

    <!-- Search input -->
    <div class="px-6 py-4">
      <input
        type="text"
        placeholder="Ex: Avocat immobilier"
        class="w-full rounded-full border-2 border-gray-200 bg-gray-50 px-4 py-3 text-gray-700 focus:outline-none placeholder-gray-500"
      />
    </div>

    <!-- Sub-subcategories grid -->
    <div class="p-6 pt-2">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-pink-100 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           <a href="/requestforhelp">  Je cherche des activités à faire sur place </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-pink-50 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
          <a href="/requestforhelp">  Je cherche des astuces pour voyager léger </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>
        
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-cyan-100 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
          <a href="/requestforhelp">  Je cherche des conseils sécurité voyage </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>
        
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-purple-100 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
          <a href="/requestforhelp">  Je cherche des idées de destination </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>
        
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-gray-100 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
          <a href="/requestforhelp">  Je cherche des infos sur la météo </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>
      

        <!-- Add more sub-subcategories as needed -->

      </div>
    </div>
  </div>
</div>


<!-- Urgence à l'étranger Sub-subcategories Popup -->
<div id="vacanciersUrgencePopup" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
    <!-- Header with back and close buttons -->
    <div class="sticky top-0 bg-white rounded-t-2xl border-b border-gray-100 p-6 flex items-center justify-between">
      <div class="flex items-center">
        <button onclick="goBackToVacanciersCategories()" class="mr-4 text-gray-400 hover:text-gray-600 transition-colors">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <polyline points="15,18 9,12 15,6"></polyline>
          </svg>
        </button>
        <h2 class="text-xl font-semibold text-gray-800">Urgence à l'étranger - Détails</h2>
      </div>
      <button onclick="closeAllPopups()" class="text-gray-400 hover:text-gray-600 transition-colors">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </button>
    </div>

    <!-- Sub-subcategories Grid -->
    <div class="p-6 pt-2">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-pink-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           <a href="/requestforhelp"> Autres urgences </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-yellow-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
          <a href="/requestforhelp">  J'ai perdu mon passeport </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-yellow-300 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           <a href="/requestforhelp">  Je dois contacter mon ambassade </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-yellow-300 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           <a href="/requestforhelp">  Je dois contacter un service de rapatriement </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

       
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
         <a href="/requestforhelp"> Je suis en danger immédiat </a></div>
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

<!-- Problèmes en voyages Sub-subcategories Popup -->
<div id="vacanciersProblemesVoyagesPopup" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
    <!-- Header with back and close buttons -->
    <div class="sticky top-0 bg-white rounded-t-2xl border-b border-gray-100 p-6 flex items-center justify-between">
      <div class="flex items-center">
        <button onclick="goBackToVacanciersCategories()" class="mr-4 text-gray-400 hover:text-gray-600 transition-colors">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <polyline points="15,18 9,12 15,6"></polyline>
          </svg>
        </button>
        <h2 class="text-xl font-semibold text-gray-800">Problèmes en voyages - Détails</h2>
      </div>
      <button onclick="closeAllPopups()" class="text-gray-400 hover:text-gray-600 transition-colors">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </button>
    </div>

    <!-- Sub-subcategories Grid -->
    <div class="p-6 pt-2">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-yellow-300 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           <a href="/requestforhelp">  Autres problèmes de voyage </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-yellow-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
          <a href="/requestforhelp">  Je me suis fait arnaquer </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>


        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-green-300 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           <a href="/requestforhelp">  Mon vol est annulé ou retardé </a></div>
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

<!-- Vacanciers - Autres besoins sub-subcategories Popup -->
<div id="vacanciersAutresBesoinsPopup" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
    <!-- Header with back and close buttons -->
    <div class="sticky top-0 bg-white rounded-t-2xl border-b border-gray-100 p-6 flex items-center justify-between">
      <div class="flex items-center">
        <button onclick="goBackToVacanciersSubcategories()" class="mr-4 text-gray-400 hover:text-gray-600 transition-colors">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <polyline points="15,18 9,12 15,6"></polyline>
          </svg>
        </button>
        <h2 class="text-xl font-semibold text-gray-800">Autres besoins - Vacanciers</h2>
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
          placeholder="Ex: Aide administrative"
          class="flex-grow bg-transparent text-gray-700 focus:outline-none placeholder-gray-500"
        />
      </div>
    </div>

    <!-- Subcategories Grid -->
    <div class="p-6 pt-2">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-cyan-300 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
          <a href="/requestforhelp">  Je veux acheter une carte SIM locale </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-orange-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           <a href="/requestforhelp">  Je veux changer de l'argent </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

      

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group md:col-span-2">
          <div class="w-14 h-14 bg-yellow-50 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
          <a href="/requestforhelp">  Je veux trouver des activités sur place </a></div>
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

<!-- Acheter un bien immobilier Sub-Subcategories Popup -->
<div id="investisseurBienImmobilierPopup" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
    <!-- Header with back and close buttons -->
    <div class="sticky top-0 bg-white rounded-t-2xl border-b border-gray-100 p-6 flex items-center justify-between">
      <div class="flex items-center">
        <button onclick="goBackToInvestisseursSubcategories()" class="mr-4 text-gray-400 hover:text-gray-600 transition-colors">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <polyline points="15,18 9,12 15,6"></polyline>
          </svg>
        </button>
        <h2 class="text-xl font-semibold text-gray-800">Acheter un bien immobilier - Options</h2>
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
          placeholder="Ex: Aide administrative"
          class="flex-grow bg-transparent text-gray-700 focus:outline-none placeholder-gray-500"
        />
      </div>
    </div>

    <!-- Sub-Subcategories Grid -->
    <div class="p-6 pt-2">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Je cherche un agent immobilier fiable -->
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group"
          onclick="alert('Clicked Je cherche un agent immobilier fiable')">
          <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           <a href="/requestforhelp">  Je cherche un agent immobilier fiable </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <!-- Je cherche un bien pour un investissement locatif -->
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group"
          onclick="alert('Clicked Je cherche un bien pour un investissement locatif')">
          <div class="w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
          <a href="/requestforhelp">  Je cherche un bien pour un investissement locatif </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

    
        <!-- Je veux investir dans l’immobilier commercial -->
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group"
          onclick="alert('Clicked Je veux investir dans l’immobilier commercial')">
          <div class="w-14 h-14 bg-pink-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
          <a href="/requestforhelp">  Je veux investir dans l’immobilier commercial </a></div>
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


<!-- Investisseur Acheter un bien immobilier Sub-Subcategories Popup -->
<div id="Acheter un bien immobilier" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
    <!-- Header with back and close buttons -->
    <div class="sticky top-0 bg-white rounded-t-2xl border-b border-gray-100 p-6 flex items-center justify-between">
      <div class="flex items-center">
        <button onclick="goBackToInvestisseursSubcategories()" class="mr-4 text-gray-400 hover:text-gray-600 transition-colors">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <polyline points="15,18 9,12 15,6"></polyline>
          </svg>
        </button>
        <h2 class="text-xl font-semibold text-gray-800">Acheter un bien immobilier</h2>
      </div>
      <button onclick="closeAllPopups()" class="text-gray-400 hover:text-gray-600 transition-colors">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </button>
    </div>

    <!-- Sub-subcategories Grid -->
    <div class="p-6 pt-2">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-blue-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
<a href="/requestforhelp">            Je cherche un agent immobilier fiable </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-yellow-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           <a href="/requestforhelp">  Je cherche un bien pour un investissement locatif </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
         <a href="/requestforhelp">  Je veux acheter un appartement à l'étranger </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>
      
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-pink-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
          <a href="/requestforhelp">  Je veux investir dans l’immobilier commercial </a></div>
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


<!-- Investir dans les marchés financiers étrangers Sub-Subcategories Popup -->
<div id="investirMarchesFinanciersPopup" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
    <!-- Header with back and close buttons -->
    <div class="sticky top-0 bg-white rounded-t-2xl border-b border-gray-100 p-6 flex items-center justify-between">
      <div class="flex items-center">
        <button onclick="goBackToInvestisseursSubcategories()" class="mr-4 text-gray-400 hover:text-gray-600 transition-colors">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <polyline points="15,18 9,12 15,6"></polyline>
          </svg>
        </button>
        <h2 class="text-xl font-semibold text-gray-800">Investir dans les marchés financiers étrangers</h2>
      </div>
      <button onclick="closeAllPopups()" class="text-gray-400 hover:text-gray-600 transition-colors">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </button>
    </div>

    <!-- Sub-subcategories Grid -->
    <div class="p-6 pt-2">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-purple-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           <a href="/requestforhelp">  Je cherche un courtier pour investir à l'étranger </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
          <a href="/requestforhelp">  Je veux acheter des actions internationales </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-yellow-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
          <a href="/requestforhelp">  Je veux comprendre la fiscalité des plus-values </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>
       
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
          <a href="/requestforhelp">  Je veux ouvrir un compte-titres international </a></div>
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

<!-- Sécuriser ses investissements Sub-Subcategories Popup -->
<div id="investisseurSecuriserInvestissementsPopup" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
    <!-- Header with back and close buttons -->
    <div class="sticky top-0 bg-white rounded-t-2xl border-b border-gray-100 p-6 flex items-center justify-between">
      <div class="flex items-center">
        <button onclick="goBackToInvestisseursSubcategories()" class="mr-4 text-gray-400 hover:text-gray-600 transition-colors">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <polyline points="15,18 9,12 15,6"></polyline>
          </svg>
        </button>
        <h2 class="text-xl font-semibold text-gray-800">Sécuriser ses investissements</h2>
      </div>
      <button onclick="closeAllPopups()" class="text-gray-400 hover:text-gray-600 transition-colors">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </button>
    </div>

    <!-- Sub-subcategories Grid -->
    <div class="p-6 pt-2">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-yellow-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
          <a href="/requestforhelp"> Je cherche un auditeur pour mon projet </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-cyan-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           <a href="/requestforhelp">  Je dois obtenir une garantie bancaire locale </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-yellow-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
             <a href="/requestforhelp">  Je veux éviter les arnaques immobilières </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
          <a href="/requestforhelp"> Je veux protéger mes investissements avec une assurance spécialisée </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>
       
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           <a href="/requestforhelp">  Je veux vérifier la réputation de mes partenaires locaux </a></div>
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

<!-- Optimisation fiscale Sub-Subcategories Popup -->
<div id="investisseurOptimisationFiscalePopup" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
    <!-- Header with back and close buttons -->
    <div class="sticky top-0 bg-white rounded-t-2xl border-b border-gray-100 p-6 flex items-center justify-between">
      <div class="flex items-center">
        <button onclick="goBackToInvestisseursSubcategories()" class="mr-4 text-gray-400 hover:text-gray-600 transition-colors">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <polyline points="15,18 9,12 15,6"></polyline>
          </svg>
        </button>
        <h2 class="text-xl font-semibold text-gray-800">Optimisation fiscale</h2>
      </div>
      <button onclick="closeAllPopups()" class="text-gray-400 hover:text-gray-600 transition-colors">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </button>
    </div>

    <!-- Sub-subcategories Grid -->
    <div class="p-6 pt-2">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-yellow-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">Je cherche des outils de gestion immobilière à distance</div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-cyan-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
             <a href="/requestforhelp"> Je cherche un expert en optimisation de patrimoine </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-yellow-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
             <a href="/requestforhelp"> Je veux augmenter la rentabilité de mon entreprise locale </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

       
        

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-yellow-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
            <a href="/requestforhelp">  Je veux trouver une agence de gestion locative </a></div>
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

<!-- Les obligations légales de mes investissements Sub-Subcategories Popup -->
<div id="investisseurObligationsLegalesPopup" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
    <!-- Header with back and close buttons -->
    <div class="sticky top-0 bg-white rounded-t-2xl border-b border-gray-100 p-6 flex items-center justify-between">
      <div class="flex items-center">
        <button onclick="goBackToInvestisseursSubcategories()" class="mr-4 text-gray-400 hover:text-gray-600 transition-colors">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <polyline points="15,18 9,12 15,6"></polyline>
          </svg>
        </button>
        <h2 class="text-xl font-semibold text-gray-800">Les obligations légales de mes investissements</h2>
      </div>
      <button onclick="closeAllPopups()" class="text-gray-400 hover:text-gray-600 transition-colors">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </button>
    </div>

    <!-- Sub-subcategories Grid -->
    <div class="p-6 pt-2">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-yellow-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
            <a href="/requestforhelp"> Je cherche un conseiller fiscal international </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

     

     
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-green-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
            <a href="/requestforhelp">  Je veux savoir comment payer mes impôts à l’étranger </a></div>
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

<!-- Travailleurs Creer Entreprise Sub-Subcategories Popup -->
<div id="travailleursCreerEntrepriseSubSubcategoriesPopup" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
    <!-- Header -->
    <div class="sticky top-0 bg-white rounded-t-2xl border-b border-gray-100 p-6 flex items-center justify-between">
      <div class="flex items-center">
        <button onclick="goBackToTravailleursCreerEntrepriseSubcategories()" class="mr-4 text-gray-400 hover:text-gray-600 transition-colors" aria-label="Back">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <polyline points="15,18 9,12 15,6"></polyline>
          </svg>
        </button>
        <h2 class="text-xl font-semibold text-gray-800">Travailleurs & Freelances - Créer son entreprise ou son activité</h2>
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
          <div class="w-14 h-14 bg-peach-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
             <a href="/requestforhelp">  Autres démarches de création d’activité </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

      

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-peach-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
             <a href="/requestforhelp">  Je dois ouvrir un compte bancaire professionnel </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

    
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-yellow-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
             <a href="/requestforhelp"> Je veux créer un site web professionnel </a></div>
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


<!-- Travailleurs Développer son réseau professionnel Sub-Subcategories Popup -->
<div id="travailleursDevelopperReseauSubSubcategoriesPopup" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
    <!-- Header -->
    <div class="sticky top-0 bg-white rounded-t-2xl border-b border-gray-100 p-6 flex items-center justify-between">
      <div class="flex items-center">
        <button onclick="goBackToTravailleursDevelopperReseauSubcategories()" class="mr-4 text-gray-400 hover:text-gray-600 transition-colors" aria-label="Back">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <polyline points="15,18 9,12 15,6"></polyline>
          </svg>
        </button>
        <h2 class="text-xl font-semibold text-gray-800">Travailleurs & Freelances - Développer son réseau professionnel</h2>
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
          <div class="w-14 h-14 bg-indigo-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
             <a href="/requestforhelp"> Autres moyens de développer son réseau </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           <a href="/requestforhelp">  Je cherche des clubs d'affaires locaux </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

     

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
            <a href="/requestforhelp">  Je veux organiser un événement business </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-lime-100 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
             <a href="/requestforhelp">  Je veux participer à des événements professionnels </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

      

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-green-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           <a href="/requestforhelp">  Je veux utiliser LinkedIn pour développer mon réseau </a></div>
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


<!-- Travailleurs Gestion financière et fiscalité Sub-Subcategories Popup -->
<div id="travailleursGestionFinanciereSubSubcategoriesPopup" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
    <!-- Header -->
    <div class="sticky top-0 bg-white rounded-t-2xl border-b border-gray-100 p-6 flex items-center justify-between">
      <div class="flex items-center">
        <button onclick="goBackToTravailleursGestionFinanciereSubcategories()" class="mr-4 text-gray-400 hover:text-gray-600 transition-colors" aria-label="Back">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <polyline points="15,18 9,12 15,6"></polyline>
          </svg>
        </button>
        <h2 class="text-xl font-semibold text-gray-800">Travailleurs & Freelances - Gestion financière et fiscalité</h2>
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
          <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           <a href="/requestforhelp"> Autres démarches financières </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           <a href="/requestforhelp">  Je cherche un conseiller fiscal spécialisé expatriés </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>


        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-purple-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
           <a href="/requestforhelp">  Je veux utiliser un service de paiement international </a></div>
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


<!-- Travailleurs Protection sociale Sub-Subcategories Popup -->
<div id="travailleursProtectionSocialeSubSubcategoriesPopup" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
    <!-- Header -->
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
           <a href="/requestForHelp.php"> Autres protections sociales </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-yellow-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
          <a href="/requestforhelp"> Je cherche une assurance invalidité freelance </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

       
        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-peach-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
          <a href="/requestforhelp">  Je veux une assurance retraite internationale </a></div>
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
          <a href="/requestforhelp">  Autres recherches d’emploi ou missions </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
          <a href="/requestforhelp">  Je cherche des agences de recrutement </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>

    

        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-purple-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
         <a href="/requestforhelp">  Je veux trouver des missions freelance en ligne </a></div>
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
          <a href="/requestforhelp">  Autres démarches de visas et permis </a></div>
          <div class="text-gray-400 group-hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="9,18 15,12 9,6"></polyline>
            </svg>
          </div>
        </div>


        <div class="category-card bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md cursor-pointer flex items-center group">
          <div class="w-14 h-14 bg-cyan-200 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"></div>
          <div class="flex-grow font-semibold text-gray-800">
        <a href="/requestforhelp">  Je veux obtenir une carte professionnelle locale</a></div>
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