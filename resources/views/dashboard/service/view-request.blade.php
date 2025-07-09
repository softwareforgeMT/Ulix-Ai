@extends('dashboard.layouts.master')

@section('title', 'Service Request Details')

@section('content')
<!-- Main Content -->
<div class="flex-1 p-4 sm:p-6 lg:pl-10 lg:pr-8">
  <div class="bg-white rounded-2xl shadow p-4 sm:p-8 mx-auto space-y-6">

    <!-- Title -->
    <h2 class="text-blue-900 font-bold text-lg sm:text-xl">NIGHT BABYSTILLING MOM</h2>

    <!-- Requester Info -->
    <div class="space-y-2 text-sm text-gray-800">
      <p>First of the requester: <span class="text-red-500 font-medium">Jean</span></p>
      <p>Number phone of the requester: <span class="text-red-600 font-semibold">00 00 00 00</span></p>
      <p>Date: 15/10/2023</p>
      <p>From: 16h00 to 18h00</p>
      <p class="break-words">(exact address) 23 kghjdfgbvkcgfjvhgjbvgfj - 42170 Saint Just Saint Rambert</p>
    </div>

    <!-- Service Details -->
    <h3 class="text-blue-900 font-bold mt-6">DETAILS OF THE SERVICE REQUEST</h3>
    <div class="border border-blue-200 rounded-xl p-4 text-gray-700 text-sm bg-blue-50">
      Watch over my mom for part of the night. She is calm and sleeps through the night without waking up.
    </div>

    <!-- Image Thumbnails -->
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
      <?php for ($i = 0; $i < 4; $i++): ?>
      <div class="border border-blue-200 rounded-xl p-4 flex items-center justify-center h-32 bg-blue-50">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-blue-400" viewBox="0 0 24 24" fill="none" stroke="currentColor">
          <path d="M4 16l4-4a3 3 0 014 0l4 4M2 20h20M12 12a4 4 0 100-8 4 4 0 000 8z"/>
        </svg>
      </div>
      <?php endfor; ?>
    </div>

    <!-- Action Buttons + Cancel -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mt-6">

      <!-- Left Buttons -->
      <div class="flex flex-wrap gap-4">
        <!-- <a href="modifyrequest.php" class="bg-blue-600 text-white px-6 py-2 rounded-full font-medium hover:bg-blue-700 transition">MODIFICATIONS</a> -->
        <a href="/privatemsg" class="border border-blue-500 text-blue-600 px-6 py-2 rounded-full font-medium hover:bg-blue-50 transition">PRIVATE MESSAGING</a>
      </div>

      <!-- Right Text -->
      <div class="text-left sm:text-right">
        <a href="#" onclick="openCancelServicePopup(event)" class="text-blue-600 font-medium underline">I Start Dispute</a>
      </div>
    </div>

  </div>
</div>

<!-- Cancel Service Popup Modal -->
<div id="cancelServicePopup" class="fixed inset-0 bg-black/40 z-50 flex items-center justify-center px-2 hidden">
  <div class="bg-white rounded-2xl shadow-xl max-w-md w-full p-6 text-center relative">
    <button onclick="closeCancelServicePopup()" class="absolute top-2 right-3 text-gray-400 hover:text-gray-700 text-2xl">&times;</button>
    <h2 class="text-xl font-bold text-blue-800 mb-3">WHY DO YOU WISH TO CANCEL THIS ADD?</h2>
    <form id="cancelServiceForm" class="space-y-4 text-left">
      <div>
        <select class="w-full border rounded-lg px-3 py-2" required>
          <option value="">Select a reason...</option>
          <option>I made a mistake in the information provided.</option>
          <option>My situation has changed, I no longer need the service.</option>
          <option>I found a solution elsewhere.</option>
          <option>The timing is too short to organize this mission.</option>
          <option>My budget is not sufficient for the type of service I need.</option>
          <option>I didn’t receive any relevant proposals.</option>
          <option>The available providers do not match my criteria.</option>
          <option>I’ve decided to postpone this request.</option>
          <option>I submitted this request just to test the platform.</option>
          <option>Other reason (please specify below)</option>
        </select>
      </div>
      <div>
        <textarea class="w-full border rounded-lg px-3 py-2" maxlength="300" placeholder="Describe here the reason for your cancellation" required></textarea>
      </div>
      <div class="text-xs text-blue-700 mb-2">
        Your service provider will recieve your mesasge . they have 3 days to respond
      </div>
      <div class="flex justify-between items-center mt-4">
        <button type="button" onclick="closeCancelServicePopup()" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-full px-4 py-2 text-xs transition">
          I keep my add online 
        </button>
        <button type="submit" class="text-red-700 underline font-semibold text-xs">
          I confirm the dispute
        </button>
      </div>
    </form>
  </div>
</div>

<!-- Dispute Sent Confirmation Popup -->
<div id="disputeSentPopup" class="fixed inset-0 bg-black/40 z-50 flex items-center justify-center px-2 hidden">
  <div class="bg-white rounded-2xl shadow-xl max-w-md w-full p-8 text-center relative">
    <div class="flex flex-col items-center">
      <div class="w-16 h-16 bg-green-400 rounded-full flex items-center justify-center mb-4">
        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
        </svg>
      </div>
      <h3 class="text-lg font-bold text-blue-800 mb-2">Your decision has been sent!</h3>
      <div class="text-gray-700 mb-1">The service provider has just received your message.<br>
        We'll keep you in the loop for what happens next.<br>
        <span class="block mt-2">Thanks a bunch for your trust! 🙌</span>
      </div>
    </div>
  </div>
</div>

<script>
  function openCancelServicePopup(e) {
    e.preventDefault();
    document.getElementById('cancelServicePopup').classList.remove('hidden');
  }
  function closeCancelServicePopup() {
    document.getElementById('cancelServicePopup').classList.add('hidden');
  }
  function openDisputeSentPopup() {
    document.getElementById('disputeSentPopup').classList.remove('hidden');
  }
  function closeDisputeSentPopup() {
    document.getElementById('disputeSentPopup').classList.add('hidden');
  }
  document.getElementById('cancelServiceForm').addEventListener('submit', function(e) {
    e.preventDefault();
    closeCancelServicePopup();
    openDisputeSentPopup();
  });
  document.getElementById('disputeSentPopup').addEventListener('click', function(e) {
    if (e.target === this) closeDisputeSentPopup();
  });
</script>
@endsection