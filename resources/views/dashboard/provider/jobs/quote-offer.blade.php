@extends('dashboard.layouts.master')
@section('title', 'Quote Offer')

@section('content')
  <div class="mx-auto">

    <!-- Top Section -->
    <div class="mb-6 relative">
      <h2 class="text-lg font-bold text-blue-900 mb-4">NIGHT BABYSITTING MOM</h2>

     <div class="border border-blue-200 rounded-xl p-4 bg-white flex items-start gap-4">
  <!-- Replaced image with SVG -->
  <div class="w-14 h-14 flex items-center justify-center bg-blue-100 rounded-full">
    <svg class="w-8 h-8 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
      <path d="M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z" />
    </svg>
  </div>

  <!-- Text Content -->
  <p class="text-gray-700 text-sm">
    Watch over my mom for part of the night. She is calm and sleeps through the night without waking up
    <span class="font-semibold text-blue-700">Details of the service request</span>
  </p>
</div>


    <!-- Image Thumbnails -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-6 mt-6">
      <?php for ($i = 0; $i < 4; $i++): ?>
      <div class="bg-gray-200 h-32 rounded-xl"></div>
      <?php endfor; ?>
    </div>

    <!-- Add JE POSTULE button below the 4 cards, bottom right -->
    <div class="flex justify-end mb-4">
      <button id="openOfferPopupBtn"
        class="border-2 border-blue-400 text-blue-500 font-bold px-8 py-2 rounded-full bg-white hover:bg-blue-50 transition-all duration-150 shadow-sm text-lg"
        style="box-shadow:0 2px 8px 0 rgba(0,0,0,0.03);">
       I APPLY
      </button>
    </div>

    <!-- Info + Actions -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
      <div class="bg-white px-6 py-4 rounded-xl text-sm text-gray-700 shadow w-full sm:w-auto">
        <p class="text-gray-700 text-sm">Duration : 23 jun 2024  1 hour</p>
                    <p class="text-gray-700 text-sm mb-2">france</p>
                    <p class="text-gray-700 text-sm mb-2">lyon</p>
                    <p class="text-gray-700 text-sm mb-2">French</p>
                    <!-- <p class="text-gray-700 text-sm mb-2">Mission Ends In : 59:30</p> -->
      </div>

      <div class="flex gap-4">
        <!-- <a href="canclerequest.php" class="text-blue-700 underline text-sm font-medium">Dispute</a> -->
        <!-- <button class="bg-blue-500 text-white font-medium px-5 py-2 rounded-full hover:bg-blue-600 transition">
          MODIFICATIONS
        </button> -->
      </div>
    </div>

    <hr class="my-6 border-gray-300" />

   <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-10">

    <!-- OFFERS RECEIVED -->
    <div>
      <h3 class="text-blue-900 font-bold mb-4">OFFERS RECEIVED</h3>

      <!-- JULIEN -->
      <div class="bg-white rounded-xl border border-blue-300 shadow p-4 mb-4">
        <div class="flex items-center gap-4 mb-2">
          <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center text-xl text-gray-500">
            <i class="fas fa-user"></i>
          </div>
          <div class="flex-1">
            <p class="font-semibold text-gray-900">JULIEN</p>
            <div class="flex items-center text-sm text-gray-500 gap-1">
              <i class="fas fa-star text-blue-500"></i> 4.85
            </div>
          </div>
          <div class="text-blue-900 font-bold text-lg">36 €</div>
        </div>
        <p class="text-sm text-gray-600 mb-4">Service provider purpose X days to realise this mission</p>
        <div class="flex gap-3">
          <button class="text-sm bg-blue-100 text-blue-700 px-4 py-1.5 rounded-full font-medium">
           <a href="{{ route('provider-details') }}"> Her profile </a></button>
          <button id="chooseProviderBtn" type="button" class="text-sm bg-yellow-400 text-black px-4 py-1.5 rounded-full font-semibold hover:bg-yellow-500 transition">
           I choose him
          </button>
        </div>
      </div>

      <!-- EMILI -->
      <div class="bg-white rounded-xl border border-pink-400 shadow p-4">
        <div class="flex items-center gap-4 mb-2">
          <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center text-xl text-gray-500">
            <i class="fas fa-user"></i>
          </div>
          <div class="flex-1">
            <p class="font-semibold text-gray-900">EMILI</p>
            <div class="flex items-center text-sm text-gray-500 gap-1">
              <i class="fas fa-star text-pink-500"></i> 4.85
            </div>
          </div>
          <div class="text-blue-900 font-bold text-lg">42 €</div>
        </div>
        <p class="text-sm text-gray-600 mb-4">Service provider purpose X days to realise this mission</p>
        <div class="flex gap-3">
          <button class="text-sm bg-blue-100 text-blue-700 px-4 py-1.5 rounded-full font-medium">
           <a href="{{ route('provider-details') }}"> Her profile </a></button>
          <button id="chooseProviderBtnHer" type="button" class="text-sm bg-yellow-400 text-black px-4 py-1.5 rounded-full font-semibold hover:bg-yellow-500 transition">
           I choose her
          </button>
        </div>
      </div>
    </div>

      <!-- PRIVATE MESSAGES -->
      <!-- PUBLIC MESSAGES -->
      <div>
        <h3 class="text-blue-900 font-bold mb-4">PUBLIC MESSAGES</h3>

        <div class="bg-white rounded-xl shadow p-4 flex flex-col max-h-[400px] h-[600px] mb-12">
          
          <!-- Scrollable messages -->
          <div class="space-y-10 overflow-y-auto pr-2">
            
            <!-- Message 1 -->
            <div class="space-y-3">
              <div class="flex gap-3 items-start">
                <img src="https://i.pravatar.cc/100?img=68" class="w-10 h-10 rounded-full" />
                <div class="text-sm">
                  <p class="font-semibold text-gray-900">Benjamin Mitchell <span class="text-xs text-gray-500 ml-1">4:32pm</span></p>
                  <p class="text-gray-700">Morning crew! Who’s tackling the hero image for the homepage today?</p>
                </div>
              </div>
            </div>

            <!-- Message 2 -->
            <div class="space-y-3">
              <div class="flex gap-3 items-start">
                <img src="https://i.pravatar.cc/100?img=3" class="w-10 h-10 rounded-full" />
                <div class="text-sm">
                  <p class="font-semibold text-gray-900">Dann Parker <span class="text-xs text-gray-500 ml-1">4:37pm</span></p>
                  <p class="text-gray-700">Hardeep, can you share the specific shades they had in mind? Meanwhile, <span class="font-semibold">@Tasha Smith</span>, the font used in the last mockup was spot on! Can we reuse?</p>
                </div>
              </div>
            </div>

            <!-- Message 3 -->
            <div class="space-y-3">
              <div class="flex gap-3 items-start">
                <img src="https://i.pravatar.cc/100?img=58" class="w-10 h-10 rounded-full" />
                <div class="text-sm">
                  <p class="font-semibold text-gray-900">Mia Alvarez <span class="text-xs text-gray-500 ml-1">42 mins ago</span></p>
                  <p class="text-gray-700">Morning! 🌞 I just got feedback from marketing.<br>They’d like to see some pop of color in the call-to-action buttons. <a href="#" class="text-blue-600 font-medium">@Lena Olsson</a>, would you like to take this up?</p>
                </div>
              </div>
            </div>

          </div>

          <!-- Bottom Input and Button -->
          <form class="flex gap-2 mt-4">
            <input type="text" placeholder="Type your public message..."
                  class="flex-1 px-4 py-2 border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <button type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded-full hover:bg-blue-700 transition font-medium">
              Send
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Confirmation Popup Modal -->
<div id="confirmProviderModal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
  <div class="bg-white rounded-2xl shadow-xl max-w-md w-full p-8 text-center relative">
    <div class="flex justify-center mb-4">
      <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto">
        <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4"/>
          <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
        </svg>
      </div>
    </div>
    <h2 class="text-xl font-bold text-blue-800 mb-2">You're almost there! <span class="align-middle">🎯</span></h2>
    <p class="text-gray-700 mb-2">You're about to work with <span class="font-semibold text-blue-700">JULIEN</span>.<br>
      Here's what happens next:</p>
    <ul class="text-left text-sm text-gray-700 mb-6 space-y-3 mt-4">
      <li class="flex items-start gap-2">
        <span class="text-purple-500 mt-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l7-7a1 1 0 000-1.414z"/></svg></span>
        <span><span class="font-semibold">Your payment is protected</span> — it’s securely held by Stripe and will only be released to the provider once the job is completed.</span>
      </li>
      <li class="flex items-start gap-2">
        <span class="text-purple-500 mt-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l7-7a1 1 0 000-1.414z"/></svg></span>
        <span><span class="font-semibold">You'll unlock chat</span> with the provider right after confirming your request.</span>
      </li>
      <li class="flex items-start gap-2">
        <span class="text-purple-500 mt-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l7-7a1 1 0 000-1.414z"/></svg></span>
        <span><span class="font-semibold">We're here to help</span> all along your service request — if anything goes wrong, just reach out!</span>
      </li>
    </ul>
    <div class="flex flex-col gap-3">
      <a href="/payments" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-full px-6 py-3 text-lg flex items-center justify-center gap-2 transition">
        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
        </svg>
        Confirm & Pay
      </a>
      <button id="chooseAnotherProviderBtn" type="button" class="border border-red-400 text-red-600 rounded-full px-6 py-2 font-semibold bg-white hover:bg-red-50 transition text-sm">
        &larr; Choose another provider
      </button>
    </div>
    <button id="closeConfirmProviderModal" class="absolute top-2 right-2 text-gray-400 hover:text-gray-700 text-xl">&times;</button>
  </div>
</div>

<!-- Offer Popup Modal -->
    <div id="offerPopupModal" class="fixed inset-0 bg-black/40 z-50 flex items-center justify-center px-2 hidden">
      <div class="bg-white rounded-2xl shadow-xl max-w-md w-full p-6 text-center relative">
        <button id="closeOfferPopupBtn" class="absolute top-2 right-3 text-gray-400 hover:text-gray-700 text-2xl">&times;</button>
        <h2 class="text-xl font-bold text-blue-800 mb-3">Move household appliances</h2>
        <form id="offerForm" class="space-y-4 text-left">
          <div>
            <label class="block text-sm font-semibold text-blue-900 mb-1">Your proposed price (€)</label>
            <input type="number" class="w-full border rounded-lg px-3 py-2" placeholder="e.g. 50" required>
          </div>
          <div>
            <label class="block text-sm font-semibold text-blue-900 mb-1">Estimated delivery time (in days)</label>
            <input type="text" class="w-full border rounded-lg px-3 py-2" placeholder="e.g. 2 days" required>
          </div>
          <div>
            <label class="block text-sm font-semibold text-blue-900 mb-1">A short message (max 300 characters)</label>
            <textarea class="w-full border rounded-lg px-3 py-2" maxlength="300" placeholder="I'm available and ready to help!" required></textarea>
          </div>
          <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white font-semibold rounded-full py-2 mt-2 transition">
            I'm sending my offer
          </button>
        </form>
      </div>
    </div>

    <!-- Offer Sent Confirmation Popup -->
    <div id="offerSentPopup" class="fixed inset-0 bg-black/40 z-50 flex items-center justify-center px-2 hidden">
      <div class="bg-white rounded-2xl shadow-xl max-w-md w-full p-6 text-center relative">
        <button id="closeOfferSentPopupBtn" class="absolute top-2 right-3 text-gray-400 hover:text-gray-700 text-2xl">&times;</button>
        <h2 class="text-xl font-bold text-blue-900 mb-1">Thank You !</h2>
        <div class="text-blue-800 font-semibold mb-2">Your request has been sent to the requester</div>
        <div class="text-gray-700 text-sm">

You will be informed if your application is accepted via your personal messaging and by email.
        </div>
      </div>
    </div>

<script>
  // Modal logic
  const chooseBtn = document.getElementById('chooseProviderBtn');
  const chooseBtnHer = document.getElementById('chooseProviderBtnHer');
  const modal = document.getElementById('confirmProviderModal');
  const closeModalBtn = document.getElementById('closeConfirmProviderModal');
  const chooseAnotherBtn = document.getElementById('chooseAnotherProviderBtn');

  chooseBtn.addEventListener('click', () => {
    modal.classList.remove('hidden');
  });
  chooseBtnHer.addEventListener('click', () => {
    modal.classList.remove('hidden');
  });
  closeModalBtn.addEventListener('click', () => {
    modal.classList.add('hidden');
  });
  chooseAnotherBtn.addEventListener('click', () => {
    modal.classList.add('hidden');
  });
  // Optional: close modal on outside click
  modal.addEventListener('click', (e) => {
    if (e.target === modal) modal.classList.add('hidden');
  });

  // Offer popup logic
  const openOfferPopupBtn = document.getElementById('openOfferPopupBtn');
  const offerPopupModal = document.getElementById('offerPopupModal');
  const closeOfferPopupBtn = document.getElementById('closeOfferPopupBtn');
  const offerForm = document.getElementById('offerForm');
  const offerSentPopup = document.getElementById('offerSentPopup');
  const closeOfferSentPopupBtn = document.getElementById('closeOfferSentPopupBtn');

  openOfferPopupBtn.addEventListener('click', () => {
    offerPopupModal.classList.remove('hidden');
  });
  closeOfferPopupBtn.addEventListener('click', () => {
    offerPopupModal.classList.add('hidden');
  });
  offerForm.addEventListener('submit', function(e) {
    e.preventDefault();
    offerPopupModal.classList.add('hidden');
    offerSentPopup.classList.remove('hidden');
  });
  closeOfferSentPopupBtn.addEventListener('click', () => {
    offerSentPopup.classList.add('hidden');
  });
  // Optional: close popup on outside click
  offerPopupModal.addEventListener('click', (e) => {
    if (e.target === offerPopupModal) offerPopupModal.classList.add('hidden');
  });
  offerSentPopup.addEventListener('click', (e) => {
    if (e.target === offerSentPopup) offerSentPopup.classList.add('hidden');
  });
</script>

@endsection