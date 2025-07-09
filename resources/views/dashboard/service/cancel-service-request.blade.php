<!-- Cancel Request Popup Modal -->
<div id="cancelRequestPopup" class="fixed inset-0 bg-black/40 z-50 flex items-center justify-center px-2 hidden">
  <div class="bg-white rounded-2xl shadow-xl max-w-md w-full p-6 text-center relative">
    <button onclick="closeCancelRequestPopup()" class="absolute top-2 right-3 text-gray-400 hover:text-gray-700 text-2xl">&times;</button>
    <h2 class="text-xl font-bold text-blue-800 mb-3">Why do you want to cancel this ad?</h2>
    <form id="cancelRequestForm" class="space-y-4 text-left">
      <div>
        <label class="block text-sm font-semibold mb-2">Select a reason</label>
        <select id="cancelReasonSelect" class="w-full border rounded-lg px-3 py-2 mb-2" required>
          <option value="">-- Please choose --</option>
          <option>I made a mistake in the information provided.</option>
          <option>My situation has changed, I no longer need the service.</option>
          <option>I found a solution elsewhere.</option>
          <option>The timing is too short to organize this mission.</option>
          <option>My budget is not sufficient for the type of service I need.</option>
          <option>I didn’t receive any relevant proposals.</option>
          <option>The available providers do not match my criteria.</option>
          <option>I’ve decided to postpone this request.</option>
          <option>I submitted this request just to test the platform.</option>
          <option value="other">Other reason (please specify below)</option>
        </select>
      </div>
      <div>
        <label class="block text-sm font-semibold mb-1">Other reason (please specify):</label>
        <textarea id="cancelOtherReason" class="w-full border rounded-lg px-3 py-2" maxlength="300" placeholder="Free text field" style="display:block"></textarea>
      </div>
      <!-- <div class="text-xs text-blue-700 mb-2">
        By providing this service, you increase the number of points in your account and you will be more visible.
      </div> -->
      <div class="flex justify-between items-center mt-4">
        <button type="button" onclick="closeCancelRequestPopup()" class="text-blue-700 underline font-semibold text-xs">I keep my add online</button>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-full px-4 py-2 text-xs transition">
          I CANCEL
        </button>
      </div>
    </form>
  </div>
</div>

<!-- Cancel Success Popup Modal -->
<div id="cancelSuccessPopup" class="fixed inset-0 bg-black/40 z-50 flex items-center justify-center px-2 hidden">
  <div class="bg-white rounded-2xl shadow-xl max-w-xs w-full p-8 text-center relative">
    <div class="flex flex-col items-center">
      <div class="w-16 h-16 bg-green-400 rounded-full flex items-center justify-center mb-4">
        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
        </svg>
      </div>
      <h3 class="text-lg font-bold text-blue-800 mb-2">Thank you!</h3>
      <div class="text-blue-800 font-semibold">Your ad has been successfully deleted.</div>
    </div>
  </div>
</div>


 <script>
    function openCancelRequestPopup(e) {
      e.preventDefault();
      document.getElementById('cancelRequestPopup').classList.remove('hidden');
    }
    function closeCancelRequestPopup() {
      document.getElementById('cancelRequestPopup').classList.add('hidden');
    }
    function openCancelSuccessPopup() {
      document.getElementById('cancelSuccessPopup').classList.remove('hidden');
    }
    function closeCancelSuccessPopup() {
      document.getElementById('cancelSuccessPopup').classList.add('hidden');
    }
    document.getElementById('cancelRequestForm').addEventListener('submit', function(e) {
      e.preventDefault();
      closeCancelRequestPopup();
      openCancelSuccessPopup();
    });
    // Optional: close success popup on click outside or after a timeout
    document.getElementById('cancelSuccessPopup').addEventListener('click', function(e) {
      if (e.target === this) closeCancelSuccessPopup();
    });
    // Optionally, show/hide the textarea only if "Other reason" is selected
    document.getElementById('cancelReasonSelect').addEventListener('change', function() {
      var otherField = document.getElementById('cancelOtherReason');
      if (this.value === 'other') {
        otherField.style.display = 'block';
        otherField.required = true;
      } else {
        otherField.style.display = 'none';
        otherField.required = false;
        otherField.value = '';
      }
    });
  </script>