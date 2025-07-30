@extends('dashboard.layouts.master')

@section('title', 'My Account')

@section('content')
    
<!-- Main Content -->
<div class="flex flex-col lg:flex-row min-h-screen">
  <div class="flex-1 p-4 sm:p-6 space-y-10">

    <!-- Wallet Section (Empty placeholder) -->
    <div class="flex flex-wrap justify-center sm:justify-start gap-4 mt-4 lg:ml-6"></div>

    @if(auth()->user()->user_role === 'service_provider')
      @include('dashboard.my-account-partials.service-provider-section')
    @else
      @include('dashboard.my-account-partials.regular-user-section')
    @endif

  </div>
</div>

<!-- Modals for Service Providers -->
@if(auth()->user()->user_role === 'service_provider')
  @include('dashboard.my-account-partials.about-you-modal')
  @include('dashboard.my-account-partials.special-status-modal')
  @include('dashboard.my-account-partials.category-search-modal')
@endif

<!-- JavaScript -->
<script>
document.addEventListener("DOMContentLoaded", function () {
  initializeSpecialStatusModal();
  initializeToggleButtons();
});

// === MODAL FUNCTIONS ===
function openAboutYouPopup() {
  showModal("aboutYouPopup");
}

function closeAboutYouPopup() {
  hideModal("aboutYouPopup");
}

function openSearchPopup() {
  showModal('signupPopup');
}

function openSpecialStatusModal() {
  showModal("specialStatusModal");
}

function closeAllPopups() {
  const modalIds = ['signupPopup', 'aboutYouPopup', 'specialStatusModal'];
  modalIds.forEach(id => hideModal(id));
}

// === UTILITY FUNCTIONS ===
function showModal(modalId) {
  const modal = document.getElementById(modalId);
  if (modal) {
    modal.classList.remove("hidden");
  }
}

function hideModal(modalId) {
  const modal = document.getElementById(modalId);
  if (modal) {
    modal.classList.add("hidden");
  }
}

// === INITIALIZATION FUNCTIONS ===
function initializeSpecialStatusModal() {
  const openBtn = document.getElementById("openSpecialStatusModal");
  const modal = document.getElementById("specialStatusModal");
  const closeBtn = document.getElementById("closeSpecialStatusModal");

  if (openBtn && modal && closeBtn) {
    openBtn.addEventListener("click", (e) => {
      e.preventDefault();
      openSpecialStatusModal();
    });

    closeBtn.addEventListener("click", () => {
      hideModal("specialStatusModal");
    });

    // Close modal when clicking outside
    window.addEventListener("click", (e) => {
      if (e.target === modal) {
        hideModal("specialStatusModal");
      }
    });
  }
}

function initializeToggleButtons() {
  document.querySelectorAll(".special-status-item").forEach(group => {
    const buttons = group.querySelectorAll(".toggle-btn");

    buttons.forEach(button => {
      button.addEventListener("click", () => {
        // Reset all buttons in this group
        buttons.forEach(btn => {
          btn.classList.remove("bg-blue-500", "text-white", "border-blue-500");
          btn.classList.add("bg-white", "text-gray-600", "border-gray-300");
        });

        // Activate clicked button
        button.classList.remove("bg-white", "text-gray-600", "border-gray-300");
        button.classList.add("bg-blue-500", "text-white", "border-blue-500");
      });
    });
  });
}

// === FORM SUBMISSION ===
function submitAboutYou() {
  const text = document.getElementById("aboutYouText").value;
  if (text.trim() === "") {
    alert("Please tell us something about yourself.");
    return;
  }
  
  // Here you would typically send the data to your server
  alert("Submitted:\n" + text);
  closeAboutYouPopup();
}

// === CATEGORY FUNCTIONS ===
function showExpatriesSubcategories() {
  // Add your subcategory logic here
  console.log("Showing Expatriés subcategories");
}

function showVacanciersSubcategories() {
  // Add your subcategory logic here
  console.log("Showing Vacanciers subcategories");
}

function showInvestisseursSubcategories() {
  // Add your subcategory logic here
  console.log("Showing Investisseurs subcategories");
}

function showTravailleursFreelancesSubcategories() {
  // Add your subcategory logic here
  console.log("Showing Travailleurs & Freelances subcategories");
}

// === EVENT LISTENERS ===
document.addEventListener('keydown', function (event) {
  if (event.key === "Escape") {
    closeAllPopups();
  }
});
</script>

@endsection