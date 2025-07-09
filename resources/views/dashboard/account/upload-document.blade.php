@extends('dashboard.layouts.master')

@section('title', 'Identity Documents')

@section('content')
  <div class="flex flex-col lg:flex-row min-h-screen">
    <!-- Main Content -->
    <main class="flex-1 p-4 sm:p-6 lg:p-10 flex justify-center items-start">
      <div class="bg-white rounded-3xl shadow-lg p-6 sm:p-8 max-w-3xl w-full space-y-6">

        <h2 class="text-blue-900 font-bold text-lg sm:text-xl">MY IDENTITY DOCUMENTS</h2>
        <p class="text-sm text-blue-600">Click on the document you are going to send us</p>

        <!-- Document Buttons -->
        <div class="space-y-4">
          <button onclick="openModal()" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium w-full py-3 rounded-xl transition">
            European identity card
          </button>
          <button onclick="openPassportModal()" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium w-full py-3 rounded-xl transition">
            Passport
          </button>
          <button onclick="openLicenseModal()" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium w-full py-3 rounded-xl transition">
            Driver’s license
          </button>
        </div>

        <!-- Progress Bar -->
        <div class="pt-4">
          <div class="w-full h-2 bg-gray-200 rounded-full overflow-hidden">
            <div class="h-full bg-blue-500 rounded-full" style="width: 25%;"></div>
          </div>
        </div>
      </div>
    </main>
  </div>

  <!-- Identity Card Modal -->
  <div id="modal" class="fixed inset-0 z-50 hidden bg-black/50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-[95vh] overflow-y-auto relative p-6">
      <button onclick="closeModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
      <div id="step1">
        <h3 class="text-blue-900 font-bold text-md mb-4 uppercase">I Send My Identity Card</h3>
        <div class="flex flex-col sm:flex-row gap-6 justify-center">
          <!-- Front -->
          <div class="text-center">
            <p class="text-sm text-gray-700 mb-1">Front</p>
            <label class="border-2 border-blue-400 rounded-xl w-40 h-40 flex flex-col items-center justify-center cursor-pointer">
              <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="w-10 h-10 mb-1 opacity-70" />
              <span class="text-blue-400 text-sm">Upload photo</span>
              <input type="file" class="hidden" />
            </label>
          </div>

          <!-- Back -->
          <div class="text-center">
            <p class="text-sm text-gray-700 mb-1">Back</p>
            <label class="border-2 border-blue-400 rounded-xl w-40 h-40 flex flex-col items-center justify-center cursor-pointer">
              <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="w-10 h-10 mb-1 opacity-70" />
              <span class="text-blue-400 text-sm">Upload photo</span>
              <input type="file" class="hidden" />
            </label>
          </div>
        </div>
        <div class="flex justify-end mt-6">
          <button onclick="nextStep(2)" class="bg-blue-500 hover:bg-blue-600 text-white font-medium px-6 py-2 rounded-full">Next</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Passport Modal -->
  <div id="passportModal" class="fixed inset-0 z-50 hidden bg-black/50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl max-w-xl w-full max-h-[90vh] overflow-y-auto relative p-6">
      <button onclick="closePassportModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
      <div class="text-center">
        <h3 class="text-blue-900 font-bold text-md mb-6 uppercase">I Sent My Passport</h3>
        <label class="border-2 border-blue-400 rounded-xl w-40 h-40 mx-auto flex flex-col items-center justify-center cursor-pointer">
          <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="w-10 h-10 mb-1 opacity-70" />
          <span class="text-blue-400 text-sm">Upload photo</span>
          <input type="file" class="hidden" />
        </label>
        <div class="flex justify-end mt-6">
          <button onclick="closePassportModal()" class="bg-blue-500 hover:bg-blue-600 text-white font-medium px-6 py-2 rounded-full">Done</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Driver’s License Modal -->
  <div id="licenseModal" class="fixed inset-0 z-50 hidden bg-black/50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-[95vh] overflow-y-auto relative p-6">
      <button onclick="closeLicenseModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
      <div class="text-center">
        <h3 class="text-blue-900 font-bold text-md mb-6 uppercase">I Sent My Driver’s License</h3>
        <div class="flex flex-col sm:flex-row gap-6 justify-center">
          <!-- Front -->
          <div class="text-center">
            <p class="text-sm text-gray-700 mb-1">Front</p>
            <label class="border-2 border-blue-400 rounded-xl w-40 h-40 flex flex-col items-center justify-center cursor-pointer">
              <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="w-10 h-10 mb-1 opacity-70" />
              <span class="text-blue-400 text-sm">Upload photo</span>
              <input type="file" class="hidden" />
            </label>
          </div>

          <!-- Back -->
          <div class="text-center">
            <p class="text-sm text-gray-700 mb-1">Back</p>
            <label class="border-2 border-blue-400 rounded-xl w-40 h-40 flex flex-col items-center justify-center cursor-pointer">
              <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="w-10 h-10 mb-1 opacity-70" />
              <span class="text-blue-400 text-sm">Upload photo</span>
              <input type="file" class="hidden" />
            </label>
          </div>
        </div>
        <div class="flex justify-end mt-6">
          <button onclick="closeLicenseModal()" class="bg-blue-500 hover:bg-blue-600 text-white font-medium px-6 py-2 rounded-full">Done</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script>
    function openModal() { document.getElementById('modal').classList.remove('hidden'); }
    function closeModal() { document.getElementById('modal').classList.add('hidden'); }

    function openPassportModal() { document.getElementById('passportModal').classList.remove('hidden'); }
    function closePassportModal() { document.getElementById('passportModal').classList.add('hidden'); }

    function openLicenseModal() { document.getElementById('licenseModal').classList.remove('hidden'); }
    function closeLicenseModal() { document.getElementById('licenseModal').classList.add('hidden'); }

    function nextStep(stepNumber) {
      const steps = document.querySelectorAll('.step-content');
      steps.forEach(step => step.classList.add('hidden'));
      document.getElementById('step' + stepNumber).classList.remove('hidden');
    }
  </script>
@endsection