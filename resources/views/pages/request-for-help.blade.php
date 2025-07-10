<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Request for Help - ULIX AI</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .floating {
      animation: float 6s ease-in-out infinite;
    }
    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
    }
  </style>

<style>
  /* WebKit Browsers (Chrome, Safari) */
  progress::-webkit-progress-bar {
    background-color: #e5e7eb; /* Tailwind's gray-200 */
    border-radius: 9999px;
  }

  progress::-webkit-progress-value {
    background-color: #2563eb; /* Tailwind's blue-600 */
    border-radius: 9999px;
  }

  /* Firefox */
  progress::-moz-progress-bar {
    background-color: #2563eb;
    border-radius: 9999px;
  }
</style>

</head>
<body class="bg-gradient-to-tr from-white to-blue-50 text-blue-900">

 @include('includes.header')
<div class ="mt-12">

<section class="py-16 px-4 max-w-4xl mx-auto bg-white rounded-lg shadow-lg">
  <h1 id="formStepLabel" class="text-3xl font-bold mb-8 text-center text-blue-700"></h1>

  
  <form action="{{ route('save-request-form') }}" id="helpRequestForm" class="space-y-8" method="POST">
    @csrf
    <!-- Step 1 -->
    <div class="form-step">
      <label for="countryNeed" class="block font-semibold mb-2 text-blue-800"></label>
      <input type="text" id="countryNeed" name="countryNeed"  placeholder="ex: USA" class="w-full p-3 bg-gray-200 border border-blue-300 rounded-lg mb-4" required />
    </div>

  <!-- Step 2 -->
    <div class="form-step hidden">
      <label for="originCountry" class="block font-semibold mb-2 text-blue-800"></label>
      
      <input 
        type="text" 
        id="originCountry" 
        name="originCountry" 
        placeholder="ex: Bangkok, New York..." 
        class="w-full p-3 bg-gray-200 border border-blue-300 rounded-lg mb-6" 
        required 
      />

      <!-- Highlighted Note -->
      <!-- <div class="bg-yellow-100 border-l-4 border-yellow-400 text-yellow-800 text-sm p-3 rounded-md">
        <p class="text-center font-semibold">It is important to know the local legislation</p>
      </div> -->
    </div>

    <!-- Step 3 -->
    <div class="form-step hidden">
      <label for="currentCity" class="block font-semibold mb-2 text-blue-800"></label>
      <input type="text" id="currentCity" name="currentCity" placeholder="ex: Bangkok, New York..." class="w-full p-3 bg-gray-200 border border-blue-300 rounded-lg mb-4" required />
      
    </div>

    <!-- Step 4 -->
    <div class="form-step hidden">
      <label class="block font-semibold mb-4 text-blue-800"></label>
      <div class="grid grid-cols-2 gap-4">
        <button type="button" class="option-btn border-2 border-blue-400 rounded-full py-3 text-center text-blue-700 transition-colors focus:outline-none">Not yet arrived</button>
        <button type="button" class="option-btn border-2 border-blue-400 rounded-full py-3 text-center text-blue-700 transition-colors focus:outline-none">1 - 7 days</button>
        <button type="button" class="option-btn border-2 border-blue-400 rounded-full py-3 text-center text-blue-700 transition-colors focus:outline-none">1 - 4 weeks</button>
        <button type="button" class="option-btn border-2 border-blue-400 rounded-full py-3 text-center text-blue-700 transition-colors focus:outline-none">1 - 12 months</button>
        <button type="button" class="option-btn border-2 border-blue-400 rounded-full py-3 text-center text-blue-700 transition-colors focus:outline-none">1 - 2 years</button>
        <button type="button" class="option-btn border-2 border-blue-400 rounded-full py-3 text-center text-blue-700 transition-colors focus:outline-none">2 - 5 years</button>
        <button type="button" class="option-btn col-span-2 border-2 border-blue-400 rounded-full py-3 text-center text-blue-700 transition-colors focus:outline-none">More than 5 years</button>
      </div>
      <input type="hidden" id="durationHere" name="durationHere" />
    </div>

    <!-- Step 5 -->
    <div class="form-step hidden space-y-4">
      <label for="requestTitle" class="block font-semibold text-blue-800"></label>
      <input type="text" id="requestTitle" name="requestTitle" placeholder="I need someone to warm her meal," class="w-full p-3 bg-gray-200 border border-blue-300 rounded-lg" required />
      
      <label for="moreDetails" class="block font-semibold text-blue-800">CAN YOU GIVE US MORE DETAILS?</label>
      <textarea id="moreDetails" name="moreDetails" rows="5" maxlength="1500" placeholder="Describe the circumstances, dates, places, people involved..." class="w-full p-3 bg-gray-200 border border-blue-300 rounded-lg resize-none"></textarea>
      <div class="text-right text-sm text-gray-500" id="charCount">0 / 1500</div>
    </div>

    <!-- Step 6 -->
    <div class="form-step hidden space-y-4">
      <label class="block font-semibold text-blue-800 mb-2"></label>
      <div class="grid grid-cols-4 gap-4">
        <?php for ($i = 1; $i <= 4; $i++): ?>
        <div class="photo-upload-box border border-blue-300 rounded-lg p-4 flex flex-col items-center justify-center cursor-pointer hover:bg-blue-50 relative group">
          <button type="button" class="photo-menu-btn w-full h-full flex flex-col items-center justify-center focus:outline-none">
            <img src="images/uploadpng.png" alt="Upload photo" class="w-12 h-12 mb-2 photo-preview" />
            <span class="text-sm text-blue-700">Upload photo</span>
          </button>
          <input type="file" name="photo<?= $i ?>" class="hidden photo-input" accept="image/*" />
        </div>
        <?php endfor; ?>
      </div>
    </div>

<!-- Photo Menu Modal -->
<div id="photoMenuModal" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 hidden">
  <div class="bg-white rounded-xl shadow-lg p-6 w-80 flex flex-col gap-2">
    <button type="button" class="photo-menu-option flex items-center gap-3 px-4 py-3 rounded hover:bg-blue-50" data-action="library">
      <i class="fa fa-image text-blue-600"></i>
      <span>Photo Library</span>
    </button>
    <button type="button" class="photo-menu-option flex items-center gap-3 px-4 py-3 rounded hover:bg-blue-50" data-action="camera">
      <i class="fa fa-camera text-blue-600"></i>
      <span>Take a Photo</span>
    </button>
    <button type="button" class="photo-menu-option flex items-center gap-3 px-4 py-3 rounded hover:bg-blue-50" data-action="file">
      <i class="fa fa-folder text-blue-600"></i>
      <span>Choose File</span>
    </button>
    <button type="button" id="closePhotoMenuModal" class="mt-2 text-gray-500 hover:text-blue-700 text-center">Cancel</button>
  </div>
</div>

<!-- Camera Modal -->
<div id="cameraModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 hidden">
  <div class="bg-white rounded-xl p-6 flex flex-col items-center relative">
    <button id="closeCameraModal" class="absolute top-2 right-2 text-gray-600 hover:text-black text-xl">&times;</button>
    <video id="cameraVideo" width="320" height="240" autoplay class="rounded mb-4"></video>
    <button id="capturePhotoBtn" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Capture Photo</button>
  </div>
</div>

    <!-- Step 7 -->
    <div class="form-step hidden space-y-4">
  <label class="block font-semibold text-blue-800 mb-4 text-center">How can you provide support?</label>

  <!-- Center wrapper -->
  <div class="w-full flex justify-center">
    <div class="grid grid-cols-1 gap-4 max-w-md w-full">
      <!-- Option 1 -->
      <div class="flex items-center justify-between border border-blue-300 rounded-full px-4 py-2">
        <span>Online</span>
        <div class="flex space-x-2">
          <button type="button" class="toggle-btn rounded-full px-4 py-1 text-sm border border-blue-600 text-blue-600 bg-white">Yes</button>
          <button type="button" class="toggle-btn rounded-full px-4 py-1 text-sm border border-blue-600 text-blue-600 bg-white">No</button>
        </div>
      </div>
      <!-- Option 2 -->
      <div class="flex items-center justify-between border border-blue-300 rounded-full px-4 py-2">
        <span>In person</span>
        <div class="flex space-x-2">
          <button type="button" class="toggle-btn rounded-full px-4 py-1 text-sm border border-blue-600 text-blue-600 bg-white">Yes</button>
          <button type="button" class="toggle-btn rounded-full px-4 py-1 text-sm border border-blue-600 text-blue-600 bg-white">No</button>
        </div>
      </div>
      <!-- Option 3 -->
      <div class="flex items-center justify-between border border-blue-300 rounded-full px-4 py-2">
        <span>I don't know</span>
        <div class="flex space-x-2">
          <button type="button" class="toggle-btn rounded-full px-4 py-1 text-sm border border-blue-600 text-blue-600 bg-white">Yes</button>
          <button type="button" class="toggle-btn rounded-full px-4 py-1 text-sm border border-blue-600 text-blue-600 bg-white">No</button>
        </div>
      </div>
    </div>
  </div>
</div>



  <!-- Step 8 -->
<div class="form-step hidden">
  <h2 class="text-center text-xl font-bold mb-4"></h2>
  <p class="text-center text-sm mb-6 text-blue-600">Please select an option below</p>

  <div class="max-w-md mx-auto space-y-3 text-left">
    <!-- Option -->
    <label class="flex items-center justify-between px-4 py-3 border border-blue-300 rounded-lg cursor-pointer">
      <span class="text-blue-800 font-medium">It's urgent</span>
      <input type="radio" name="urgency" value="urgent" class="w-5 h-5 text-blue-600 focus:ring-blue-500" required />
    </label>

    <label class="flex items-center justify-between px-4 py-3 border border-blue-300 rounded-lg cursor-pointer">
      <span class="text-blue-800 font-medium">Within a week</span>
      <input type="radio" name="urgency" value="within_week" class="w-5 h-5 text-blue-600 focus:ring-blue-500" />
    </label>

    <label class="flex items-center justify-between px-4 py-3 border border-blue-300 rounded-lg cursor-pointer">
      <span class="text-blue-800 font-medium">Between 1 and 2 weeks</span>
      <input type="radio" name="urgency" value="1_2_weeks" class="w-5 h-5 text-blue-600 focus:ring-blue-500" />
    </label>

    <label class="flex items-center justify-between px-4 py-3 border border-blue-300 rounded-lg cursor-pointer">
      <span class="text-blue-800 font-medium">Between 2 weeks and 1 month</span>
      <input type="radio" name="urgency" value="2_weeks_1_month" class="w-5 h-5 text-blue-600 focus:ring-blue-500" />
    </label>

    <label class="flex items-center justify-between px-4 py-3 border border-blue-300 rounded-lg cursor-pointer">
      <span class="text-blue-800 font-medium">More than a month</span>
      <input type="radio" name="urgency" value="more_than_month" class="w-5 h-5 text-blue-600 focus:ring-blue-500" />
    </label>
  </div>
</div>


    <!-- Step 9 -->
    <div class="form-step hidden space-y-6">
      <label class="block font-semibold text-blue-800 mb-4"></label>
      <div class="grid grid-cols-2 gap-3 max-w-lg mx-auto">
        <button type="button" class="lang-btn bg-blue-600 text-white rounded-lg py-2 px-4 flex items-center space-x-2">
          <img src="https://flagcdn.com/us.svg" alt="English" class="w-5 h-3" />
          <span>English</span>
        </button>
        <button type="button" class="lang-btn bg-blue-600 text-white rounded-lg py-2 px-4 flex items-center space-x-2">
          <img src="https://flagcdn.com/fr.svg" alt="French" class="w-5 h-3" />
          <span>French</span>
        </button>
        <button type="button" class="lang-btn bg-blue-600 text-white rounded-lg py-2 px-4 flex items-center space-x-2">
          <img src="https://flagcdn.com/es.svg" alt="Spanish" class="w-5 h-3" />
          <span>Spanish</span>
        </button>
        <button type="button" class="lang-btn bg-blue-600 text-white rounded-lg py-2 px-4 flex items-center space-x-2">
          <img src="https://flagcdn.com/pt.svg" alt="Portuguese" class="w-5 h-3" />
          <span>Portuguese</span>
        </button>
        <button type="button" class="lang-btn bg-blue-600 text-white rounded-lg py-2 px-4 flex items-center space-x-2">
          <img src="https://flagcdn.com/de.svg" alt="German" class="w-5 h-3" />
          <span>German</span>
        </button>
        <button type="button" class="lang-btn bg-blue-600 text-white rounded-lg py-2 px-4 flex items-center space-x-2">
          <img src="https://flagcdn.com/it.svg" alt="Italian" class="w-5 h-3" />
          <span>Italian</span>
        </button>
        <button type="button" class="lang-btn bg-blue-600 text-white rounded-lg py-2 px-4 flex items-center space-x-2">
          <img src="https://flagcdn.com/sa.svg" alt="Arabic" class="w-5 h-3" />
          <span>Arabic</span>
        </button>
        <button type="button" class="lang-btn bg-blue-600 text-white rounded-lg py-2 px-4 flex items-center space-x-2">
          <img src="https://flagcdn.com/jp.svg" alt="Japanese" class="w-5 h-3" />
          <span>Japanese</span>
        </button>
        <button type="button" class="lang-btn bg-blue-600 text-white rounded-lg py-2 px-4 flex items-center space-x-2">
          <img src="https://flagcdn.com/kr.svg" alt="Korean" class="w-5 h-3" />
          <span>Korean</span>
        </button>
        <button type="button" class="lang-btn bg-blue-600 text-white rounded-lg py-2 px-4 flex items-center space-x-2">
          <img src="https://flagcdn.com/in.svg" alt="Hindi" class="w-5 h-3" />
          <span>Hindi</span>
        </button>
        <button type="button" class="lang-btn bg-blue-600 text-white rounded-lg py-2 px-4 flex items-center space-x-2">
          <img src="https://flagcdn.com/tr.svg" alt="Turkish" class="w-5 h-3" />
          <span>Turkish</span>
        </button>
      </div>
    </div>

    <!-- Step 10 -->
<div class="form-step hidden w-full flex justify-center">
  <div class="grid grid-cols-1 gap-4 w-full max-w-md">
    <input
      type="text"
      id="firstName"
      name="firstName"
      placeholder="Your first name"
      class="p-3 bg-gray-200 border border-blue-300 rounded-lg w-full"
      required
    />
    <input
      type="text"
      id="lastName"
      name="lastName"
      placeholder="Your surname"
      class="p-3 bg-gray-200 border border-blue-300 rounded-lg w-full"
      required
    />
  </div>
</div>

    <!-- Step 11 - Email -->
    <div class="form-step hidden">
      <label for="email" class="block font-semibold mb-2 text-blue-800"></label>
      <input type="email" id="email" name="email" placeholder="Enter your address" class="w-full p-3 bg-gray-200 border border-blue-300 rounded-lg" required />
    </div>

    <!-- Step 12 - Password -->
    <div class="form-step hidden">
      <label for="password" class="block font-semibold mb-2 text-blue-800"></label>
      <input type="password" id="password" name="password" placeholder="Password" class="w-full p-3 bg-gray-200 border border-blue-300 rounded-lg" required />
    </div>

    <!-- Step 13 - Service Request Duration -->
    <div class="form-step hidden space-y-4">
      <h2 class="text-center font-bold text-lg text-blue-800 mb-4"></h2>
      <p class="text-center text-sm text-gray-700 mb-6">Choose the desired duration</p>
      <div class="flex justify-center space-x-4">
        <button type="button" class="duration-btn bg-blue-600 text-white px-6 py-2 rounded-lg">1 week</button>
        <button type="button" class="duration-btn bg-blue-600 text-white px-6 py-2 rounded-lg">2 weeks</button>
        <button type="button" class="duration-btn bg-blue-600 text-white px-6 py-2 rounded-lg">1 month</button>
      </div>
      <div class="bg-yellow-100 border-l-4 border-yellow-400 p-4 max-w-lg mx-auto mt-6 rounded">
        <strong>Note:</strong> Your Service request will be automatically deleted after you have choose <u>The service provider</u> you will need to submit a new request if you will need a help 
        when you choose a service provider your add will be archived 
      </div>
      <input type="hidden" id="serviceDuration" name="serviceDuration" />
    </div>

    <!-- Step 14 - Loading Message -->
    <div class="form-step hidden flex flex-col items-center justify-center space-y-4">
      <p class="font-bold text-center text-lg text-blue-900 max-w-md">
        Wait just a few seconds....<br>
        <em>We are informing the service providers for your needs </em><br>
       
      </p>
      <div class="loader ease-linear rounded-full border-8 border-t-8 border-blue-600 h-16 w-16"></div>
    </div>

    <!-- Step 15 - Two Buttons -->
    <div class="form-step hidden flex flex-col items-center space-y-4">
      <button type="button" class="px-8 py-4 bg-blue-400 rounded-lg text-white font-semibold hover:bg-blue-500 transition">
       <a href="{{ route('qoute-offer')}}"> SEE MA AD </a></button>
      <button type="button" class="px-8 py-4 bg-blue-400 rounded-lg text-white font-semibold hover:bg-blue-500 transition">
       <a href="/serviceproviders"> See service provider </a>
       </button>
    </div>

    <div class="flex justify-between">
      <button type="button" id="prevBtn" class="text-blue-600 font-semibold" disabled>Back</button>
      <button type="button" id="nextBtn" class="bg-blue-600 text-white px-6 py-2 rounded-lg">Next</button>
    </div>

    <progress id="progressBar" value="0" max="100" class="w-full mt-6 h-2 rounded-full bg-blue-100"></progress>
  </form>
</section>

<style>
  .loader {
    border-top-color: transparent;
    animation: spin 1s linear infinite;
  }

  @keyframes spin {
    0% { transform: rotate(0deg);}
    100% { transform: rotate(360deg);}
  }
</style>

<!-- TOASTR CDN (place in <head>) -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- YOUR SCRIPT -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const steps = document.querySelectorAll('.form-step');
    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');
    const progressBar = document.getElementById('progressBar');
    const stepLabel = document.getElementById('formStepLabel');
    let currentStep = 0;

    const stepLabels = [
      "In which country is your need?",
      "What is your country of origin?",
      "What city are you currently in?",
      "How long have you been here?",
      "What title do you want for your request for help?",
      "Add photos if you wish",
      "What type of help do you need?",
      "How soon do you need this service?",
      "Which language do you speak?",
      "What's your first name & surname?",
      "What's your e-mail?",
      "What's your password?",
      "How long should your request be visible?",
      "We are informing the service providers near you",
      "Your request is ready"
    ];

    // Step 4: duration selection
    const durationButtons = document.querySelectorAll('.option-btn');
    const durationInput = document.getElementById('durationHere');
    durationButtons.forEach(button => {
      button.addEventListener('click', () => {
        durationButtons.forEach(btn => btn.classList.remove('bg-blue-600', 'text-white'));
        button.classList.add('bg-blue-600', 'text-white');
        durationInput.value = button.textContent.trim();
      });
    });

    // Step 6: yes/no button logic (no validation required)
    const yesNoButtons = document.querySelectorAll('.yes-no-btn');
    yesNoButtons.forEach(btn => {
      btn.addEventListener('click', () => {
        const group = btn.parentElement.parentElement;
        group.querySelectorAll('.yes-no-btn').forEach(b => b.classList.remove('bg-green-600', 'text-white'));
        btn.classList.add('bg-green-600', 'text-white');
      });
    });

    // Step 7: toggle yes/no buttons and validation
    const toggleGroups = [
      { group: 0, name: 'supportOnline' },
      { group: 1, name: 'supportInPerson' },
      { group: 2, name: 'supportUnknown' }
    ];
    // Store selected values for each group
    let supportSelections = { supportOnline: null, supportInPerson: null, supportUnknown: null };

    document.querySelectorAll('.form-step')[6].querySelectorAll('.flex.items-center.justify-between').forEach((row, idx) => {
      const btns = row.querySelectorAll('.toggle-btn');
      btns.forEach(btn => {
        btn.addEventListener('click', function () {
          btns.forEach(b => b.classList.remove('bg-blue-600', 'text-white'));
          btn.classList.add('bg-blue-600', 'text-white');
          btn.classList.remove('bg-white', 'text-blue-600');
          // Save selection
          supportSelections[toggleGroups[idx].name] = btn.textContent.trim().toLowerCase();
        });
      });
    });

    // Step 8: language buttons
    const langButtons = document.querySelectorAll('.lang-btn');
    let selectedLanguage = null;
    langButtons.forEach(btn => {
      btn.addEventListener('click', () => {
        langButtons.forEach(b => b.classList.remove('bg-blue-900'));
        btn.classList.add('bg-blue-900');
        selectedLanguage = btn.textContent.trim();
      });
    });

    // Step 9: language selection for radio buttons
    let selectedUrgency = null;
    document.querySelectorAll('input[name="urgency"]').forEach(radio => {
      radio.addEventListener('change', function() {
        if (this.checked) selectedUrgency = this.value;
      });
    });

    // Step 5: text count
    const moreDetails = document.getElementById('moreDetails');
    const charCount = document.getElementById('charCount');
    if (moreDetails && charCount) {
      moreDetails.addEventListener('input', () => {
        charCount.textContent = `${moreDetails.value.length} / 1500`;
      });
    }

    // Step 12: visibility duration
    const serviceDurationBtns = document.querySelectorAll('.duration-btn');
    const serviceDurationInput = document.getElementById('serviceDuration');
    serviceDurationBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        serviceDurationBtns.forEach(b => b.classList.remove('bg-blue-800'));
        btn.classList.add('bg-blue-800');
        serviceDurationInput.value = btn.textContent.trim();
      });
    });

    function showStep(index) {
      steps.forEach((step, i) => step.classList.toggle('hidden', i !== index));
      prevBtn.disabled = index === 0;
      progressBar.value = ((index + 1) / steps.length) * 100;
      if (stepLabel) stepLabel.textContent = stepLabels[index] || "";

      if (index === 13) {
        nextBtn.disabled = true;
        setTimeout(() => {
          nextBtn.disabled = false;
          currentStep++;
          showStep(currentStep);
        }, 2000); // 2 seconds loading
      } else {
        nextBtn.disabled = false;
      }

      if (index === 13 || index === steps.length - 1) {
        nextBtn.classList.add('hidden');
        prevBtn.classList.add('hidden');
        progressBar.classList.add('hidden');
      } else {
        nextBtn.classList.remove('hidden');
        prevBtn.classList.remove('hidden');
        progressBar.classList.remove('hidden');
      }
    }

    function validateStep(stepIndex) {
      if ([13, 14].includes(stepIndex)) return true; // skip validation for step 6, 13, 14

      const step = steps[stepIndex];
      const requiredFields = step.querySelectorAll('input[required], textarea[required], select[required]');
      let valid = true;

      requiredFields.forEach(field => {
        if (!field.value.trim()) {
          field.classList.add('border-red-500');
          valid = false;
        } else {
          field.classList.remove('border-red-500');
        }
      });

      // Step 4 duration validation
      if (stepIndex === 3 && durationInput && !durationInput.value.trim()) {
        durationButtons.forEach(btn => btn.classList.add('border', 'border-red-500'));
        valid = false;
      } else {
        durationButtons.forEach(btn => btn.classList.remove('border', 'border-red-500'));
      }

      // Step 12 duration validation
      if (stepIndex === 12 && serviceDurationInput && !serviceDurationInput.value.trim()) {
        serviceDurationBtns.forEach(btn => btn.classList.add('border', 'border-red-500'));
        valid = false;
      } else {
        serviceDurationBtns.forEach(btn => btn.classList.remove('border', 'border-red-500'));
      }

      // Step 7 validation (support options must be selected)
      if (stepIndex === 6) {
        let validSupport = true;
        Object.keys(supportSelections).forEach(key => {
          if (!supportSelections[key]) validSupport = false;
        });
        // Highlight missing
        document.querySelectorAll('.form-step')[6].querySelectorAll('.flex.items-center.justify-between').forEach((row, idx) => {
          const btns = row.querySelectorAll('.toggle-btn');
          if (!supportSelections[toggleGroups[idx].name]) {
            btns.forEach(b => b.classList.add('border-red-500'));
          } else {
            btns.forEach(b => b.classList.remove('border-red-500'));
          }
        });
        if (!validSupport) {
          toastr.error("Please answer all support options (Yes/No) before continuing.");
          return false;
        }
      }

      // Step 8 validation (urgency radio required)
      if (stepIndex === 7) {
        if (!selectedUrgency) {
          toastr.error("Please select how soon you need this service.");
          // Highlight all radio labels
          document.querySelectorAll('.form-step')[7].querySelectorAll('label').forEach(lbl => {
            lbl.classList.add('border-red-500');
          });
          return false;
        } else {
          document.querySelectorAll('.form-step')[7].querySelectorAll('label').forEach(lbl => {
            lbl.classList.remove('border-red-500');
          });
        }
      }

      // Step 9 validation (language selection required)
      if (stepIndex === 8) {
        if (!selectedLanguage) {
          toastr.error("Please select a language.");
          langButtons.forEach(btn => btn.classList.add('border-red-500'));
          return false;
        } else {
          langButtons.forEach(btn => btn.classList.remove('border-red-500'));
        }
      }

      // Step 11 validation (proper email required)
      if (stepIndex === 10) {
        const emailInput = document.getElementById('email');
        const emailValue = emailInput ? emailInput.value.trim() : '';
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailValue || !emailPattern.test(emailValue)) {
          if (emailInput) emailInput.classList.add('border-red-500');
          toastr.error("Please enter a valid e-mail address.");
          return false;
        } else {
          if (emailInput) emailInput.classList.remove('border-red-500');
        }
      }

      if (!valid) {
        toastr.error("Please complete all required fields before continuing.");
      }

      return valid;
    }

    // --- Store step data in localStorage ---
    function storeStepData(stepIndex) {
      const expats = JSON.parse(localStorage.getItem('help-request')) || {};
      switch (stepIndex) {
        case 0: // Step 1
          expats.countryNeed = document.getElementById('countryNeed').value.trim();
          break;
        case 1: // Step 2
          expats.originCountry = document.getElementById('originCountry').value.trim();
          break;
        case 2: // Step 3
          expats.currentCity = document.getElementById('currentCity').value.trim();
          break;
        case 3: // Step 4
          expats.durationHere = document.getElementById('durationHere').value.trim();
          break;
        case 4: // Step 5
          expats.requestTitle = document.getElementById('requestTitle').value.trim();
          expats.moreDetails = document.getElementById('moreDetails').value.trim();
          break;
        case 5: // Step 6 (photos)
          // Handled by photo upload logic if needed
          break;
        case 6: // Step 7 (support options)
          expats.supportOnline = supportSelections.supportOnline;
          expats.supportInPerson = supportSelections.supportInPerson;
          expats.supportUnknown = supportSelections.supportUnknown;
          break;
        case 7: // Step 8 (urgency)
          expats.urgency = selectedUrgency;
          break;
        case 8: // Step 9 (language)
          expats.language = selectedLanguage;
          break;
        case 9: // Step 10 (name)
          expats.firstName = document.getElementById('firstName').value.trim();
          expats.lastName = document.getElementById('lastName').value.trim();
          break;
        case 10: // Step 11 (email)
          expats.email = document.getElementById('email').value.trim();
          break;
        case 11: // Step 12 (password)
          expats.password = document.getElementById('password').value;
          break;
        case 12: // Step 13 (service duration)
          expats.serviceDuration = document.getElementById('serviceDuration').value.trim();
          break;
        // Add more as needed
      }
      localStorage.setItem('help-request', JSON.stringify(expats));
    }

    // --- Restore data on page load ---
    function restoreStepData() {
      const expats = JSON.parse(localStorage.getItem('help-request')) || {};
      if (expats.countryNeed) document.getElementById('countryNeed').value = expats.countryNeed;
      if (expats.originCountry) document.getElementById('originCountry').value = expats.originCountry;
      if (expats.currentCity) document.getElementById('currentCity').value = expats.currentCity;
      if (expats.durationHere) document.getElementById('durationHere').value = expats.durationHere;
      if (expats.requestTitle) document.getElementById('requestTitle').value = expats.requestTitle;
      if (expats.moreDetails) document.getElementById('moreDetails').value = expats.moreDetails;
      if (expats.firstName) document.getElementById('firstName').value = expats.firstName;
      if (expats.lastName) document.getElementById('lastName').value = expats.lastName;
      if (expats.email) document.getElementById('email').value = expats.email;
      if (expats.password) document.getElementById('password').value = expats.password;
      if (expats.serviceDuration) document.getElementById('serviceDuration').value = expats.serviceDuration;
      // Restore selections for support, urgency, language, etc. as needed
    }
    restoreStepData();

    // --- Save on input change ---
    document.querySelectorAll('input, textarea, select').forEach(el => {
      el.addEventListener('change', function() {
        storeStepData(currentStep);
      });
      el.addEventListener('input', function() {
        storeStepData(currentStep);
      });
    });

    // --- Save on button selection (duration, language, etc.) ---
    durationButtons.forEach(button => {
      button.addEventListener('click', () => {
        storeStepData(3);
      });
    });
    serviceDurationBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        storeStepData(12);
      });
    });
    langButtons.forEach(btn => {
      btn.addEventListener('click', () => {
        storeStepData(8);
      });
    });
    document.querySelectorAll('input[name="urgency"]').forEach(radio => {
      radio.addEventListener('change', function() {
        storeStepData(7);
      });
    });

    // --- Save support selections ---
    document.querySelectorAll('.form-step')[6].querySelectorAll('.flex.items-center.justify-between').forEach((row, idx) => {
      const btns = row.querySelectorAll('.toggle-btn');
      btns.forEach(btn => {
        btn.addEventListener('click', function () {
          storeStepData(6);
        });
      });
    });

    // --- AJAX submit and move to next step ---
    nextBtn.addEventListener('click', () => {
      if (currentStep < steps.length - 1) {
        if (!validateStep(currentStep)) return;
        storeStepData(currentStep);
        if (currentStep === 12) {
          // AJAX submit
          const form = document.getElementById('helpRequestForm');
          const formData = new FormData(form);
          // Add localStorage data to formData
          const expats = JSON.parse(localStorage.getItem('help-request')) || {};
          
          Object.entries(expats).forEach(([key, val]) => {
            if (!formData.has(key)) formData.append(key, val);
          });

          const categories = JSON.parse(localStorage.getItem('create-request')) || {};

          if(categories) {
            formData.append('category', categories.category || '');
            formData.append('subcategory', categories.sub_category || '');
            formData.append('subcategory2', categories.child_category || '');
            console.log("Categories", categories);
          }

          nextBtn.disabled = true;
          fetch(form.action, {
            method: 'POST',
            headers: {
              'X-Requested-With': 'XMLHttpRequest',
              'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            body: formData
          })
          .then(res => res.json())
          .then(data => {
            console.error('Submission successful.');
            localStorage.removeItem('help-request');
            localStorage.removeItem('create-request');
            currentStep++;
            showStep(currentStep);
          })
          .catch(() => {
            console.error('Submission failed. Please try again.');
          })
          .finally(() => {
            nextBtn.disabled = false;
          });
          return;
        }
        currentStep++;
        showStep(currentStep);
      } else {
        alert('Form submitted! Thank you.');
      }
    });

    prevBtn.addEventListener('click', () => {
      if (currentStep > 0) {
        storeStepData(currentStep);
        currentStep--;
        showStep(currentStep);
      }
    });
 
    showStep(currentStep);

    // Image preview
    document.querySelectorAll('.photo-input').forEach(input => {
      input.addEventListener('change', e => {
        const file = e.target.files[0];
        if (!file) return;
        const preview = e.target.parentElement.querySelector('img');
        preview.src = URL.createObjectURL(file);
      });
    });

    // Photo upload menu logic for Step 6
    const photoBoxes = document.querySelectorAll('.photo-upload-box');
    const photoMenuModal = document.getElementById('photoMenuModal');
    const photoMenuOptions = document.querySelectorAll('.photo-menu-option');
    const closePhotoMenuModal = document.getElementById('closePhotoMenuModal');
    let activePhotoInput = null;
    let activePhotoPreview = null;

    // Camera logic
    const cameraModal = document.getElementById('cameraModal');
    const cameraVideo = document.getElementById('cameraVideo');
    const capturePhotoBtn = document.getElementById('capturePhotoBtn');
    const closeCameraModal = document.getElementById('closeCameraModal');
    let cameraStream = null;

    // Show menu on click
    photoBoxes.forEach(box => {
      const menuBtn = box.querySelector('.photo-menu-btn');
      const input = box.querySelector('.photo-input');
      const preview = box.querySelector('.photo-preview');
      menuBtn.addEventListener('click', function(e) {
        e.preventDefault();
        activePhotoInput = input;
        activePhotoPreview = preview;
        photoMenuModal.classList.remove('hidden');
      });
      // Preview for file input
      input.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;
        preview.src = URL.createObjectURL(file);
      });
    });

    // Handle menu options
    photoMenuOptions.forEach(option => {
      option.addEventListener('click', function() {
        const action = option.getAttribute('data-action');
        photoMenuModal.classList.add('hidden');
        if (!activePhotoInput) return;
        if (action === 'library' || action === 'file') {
          activePhotoInput.click();
        } else if (action === 'camera') {
          cameraModal.classList.remove('hidden');
          if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream){
              cameraStream = stream;
              cameraVideo.srcObject = stream;
              cameraVideo.play();
            });
          }
        }
      });
    });

    if (closePhotoMenuModal) closePhotoMenuModal.onclick = function() {
      photoMenuModal.classList.add('hidden');
    };

    if (closeCameraModal) closeCameraModal.onclick = function(){
      cameraModal.classList.add('hidden');
      if (cameraVideo.srcObject) {
        cameraVideo.srcObject.getTracks().forEach(track => track.stop());
        cameraVideo.srcObject = null;
      }
      cameraStream = null;
    };

    if (capturePhotoBtn) capturePhotoBtn.onclick = function(){
      if (!cameraVideo.srcObject) return;
      var canvas = document.createElement('canvas');
      canvas.width = cameraVideo.videoWidth;
      canvas.height = cameraVideo.videoHeight;
      var ctx = canvas.getContext('2d');
      ctx.drawImage(cameraVideo, 0, 0, canvas.width, canvas.height);
      var dataURL = canvas.toDataURL('image/png');
      if (activePhotoPreview) {
        activePhotoPreview.src = dataURL;
      }
      cameraModal.classList.add('hidden');
      if (cameraVideo.srcObject) {
        cameraVideo.srcObject.getTracks().forEach(track => track.stop());
        cameraVideo.srcObject = null;
      }
      cameraStream = null;
    };

  });
  </script>
</body>
</html>