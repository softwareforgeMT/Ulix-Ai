@extends('dashboard.layouts.master')

@section('title', 'Service Request Details')

@section('content')
  <div class="flex flex-col lg:flex-row min-h-screen">
    <!-- Main Content -->
    <div class="flex-1 p-4 sm:p-6 lg:pl-10 lg:pr-8">
      <div class="bg-white rounded-2xl shadow p-4 sm:p-8  mx-auto space-y-6">

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
            <a href="#" onclick="openCancelServicePopup(event)" class="text-blue-600 font-medium underline">Cancel the service</a>
          </div>
        </div>

      </div>
    </div>
  </div>

<!-- Cancel Service Popup Modal -->
<div id="cancelServicePopup" class="fixed inset-0 bg-black/40 z-50 flex items-center justify-center px-2 hidden">
  <div class="bg-white rounded-2xl shadow-xl max-w-md w-full p-6 text-center relative">
    <button onclick="closeCancelServicePopup()" class="absolute top-2 right-3 text-gray-400 hover:text-gray-700 text-2xl">&times;</button>
    <h2 class="text-xl font-bold text-blue-800 mb-3">Why do you want to cancel your job for service requester?</h2>
    <form id="cancelServiceForm" class="space-y-4 text-left">
      <div>
        <label class="block text-sm font-semibold mb-2">Select a reason</label>
        <select class="w-full border rounded-lg px-3 py-2" required>
          <option value="">-- Please choose --</option>
          <option>I'm no longer available on the scheduled dates.</option>
          <option>I was unable to establish communication with the requester.</option>
          <option>I have changed location and can no longer complete the mission.</option>
          <option>The mission details are unclear or insufficient.</option>
          <option>I'm dealing with a personal or family emergency.</option>
          <option>I lack the necessary tools or resources to complete the mission.</option>
          <option>I don't feel comfortable with the client's profile.</option>
          <option value="other">Other reason (please specify below)</option>
        </select>
      </div>
      <div>
        <label class="block text-sm font-semibold mb-1">Other reason (please specify):</label>
        <textarea class="w-full border rounded-lg px-3 py-2" maxlength="300" placeholder="Free text field"></textarea>
      </div>
      <div class="text-lg text-blue-700 mb-2">
        By providing this service, you increase the number of point in your account and you will be more visible.
      </div>
      <div class="text-lg text-red-600 mb-2">
        If you cancel your service, you will lose 150 points on your ranking and you will be much less visible.
      </div>
      <div class="flex justify-between items-center mt-4">
        <button type="button" onclick="closeCancelServicePopup()" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-full px-4 py-2 text-xs transition">
          I WILL STILL PROVIDE THE SERVICE
        </button>
        <button type="submit" class="text-blue-700 underline font-semibold text-xs">
          I CANCEL
        </button>
      </div>
    </form>
  </div>
</div>

<!-- Cancel Service Result Popup -->
<div id="cancelServiceResultPopup" class="fixed inset-0 bg-black/40 z-50 flex items-center justify-center px-2 hidden">
  <div class="bg-white rounded-2xl shadow-xl max-w-lg w-full p-8 text-center">
    <div class="text-2xl font-bold text-blue-800 mb-2">TOO BAD. THE SERVICE REQUESTER<br>WILL BE DISAPPOINTED</div>
    <div class="text-red-600 mt-2 text-base">You have lost some points</div>
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
  document.getElementById('cancelServiceForm').addEventListener('submit', function(e) {
    e.preventDefault();
    closeCancelServicePopup();
    document.getElementById('cancelServiceResultPopup').classList.remove('hidden');
  });
  document.getElementById('cancelServiceResultPopup').addEventListener('click', function(e) {
    if (e.target === this) this.classList.add('hidden');
  });
</script>
@endsection

