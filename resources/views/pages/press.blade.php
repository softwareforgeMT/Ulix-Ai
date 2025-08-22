<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Ulixai – Press</title>
</head>

<style>
        .upload-overlay {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(16, 185, 129, 0.1));
            border: 2px dashed #3b82f6;
            transition: all 0.3s ease;
        }
        .upload-overlay:hover {
            border-color: #10b981;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(59, 130, 246, 0.1));
        }
        .upload-overlay.dragover {
            border-color: #10b981;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.2), rgba(59, 130, 246, 0.2));
            transform: scale(1.02);
        }
    </style>

     <style>
        .contact-button {
            background: linear-gradient(135deg, #1e40af, #3b82f6);
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.4);
        }
        .contact-button:hover {
            background: linear-gradient(135deg, #1d4ed8, #2563eb);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.6);
        }
    </style>

<body class="bg-white text-gray-800">

 @include('includes.header')
     @include('pages.popup')

<!-- Hero Section -->
<section class="bg-gradient-to-br from-blue-100 via-white to-blue-50 py-6 px-6">
  <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-10 items-center">
    <!-- Text Content -->
    <div class="text-center md:text-left">
      <div class="text-5xl mb-4">🌍 ✈️ 📦</div>
      <h1 class="text-3xl md:text-4xl font-extrabold text-blue-800 mb-4">@site – Press Area</h1>
      <h1 class="text-lg text-gray-700 mb-4">
        For everyone who travels, invests, studies or lives abroad.
      </h1>
      <h1 class="text-base md:text-lg font-medium text-gray-600">
        @site is the only platform that centralizes essential services for vacationers, expats, students, digital nomads, investors, and families living abroad. We are an international, agile, independent startup — and completely human-centered.
      </h1>
    </div>

    <!-- Decorative Image or Icon -->
    <div class="flex justify-center">
      <!-- <img src="images/img 12.png" alt="Press Icon" class="w-72 h-auto opacity-90"> -->
    </div>
  </div>
</section>

<!-- Press Kit Section -->
<section class="py-20 bg-white">
  <div class="max-w-6xl mx-auto px-4 text-center">
    <h2 class="text-2xl font-bold text-blue-800 mb-8">📛 Download the @site Press Kit</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <!-- Card 1 - Official Logo -->
      <div class="bg-blue-50 rounded-xl p-6 border border-blue-300 shadow hover:shadow-lg transition">
        <div class="mb-4 bg-white rounded-lg p-4 shadow-sm">
          <svg class="w-16 h-16 mx-auto text-blue-600" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
          </svg>
        </div>
        <p class="font-semibold mb-2">Official logo (PNG + SVG)</p>
        <a href="#" class="inline-block mt-4 bg-blue-700 text-white font-semibold px-5 py-2 rounded-full hover:bg-blue-800 transition">Download</a>
      </div>

      <!-- Card 2 - Press Kit PDF -->
      <div class="bg-blue-50 rounded-xl p-6 border border-blue-300 shadow hover:shadow-lg transition">
        <div class="mb-4 bg-white rounded-lg p-4 shadow-sm">
          <svg class="w-16 h-16 mx-auto text-red-500" fill="currentColor" viewBox="0 0 24 24">
            <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
          </svg>
        </div>
        <p class="font-semibold mb-2">Press Kit (PDF)</p>
        <a href="#" class="inline-block mt-4 bg-blue-700 text-white font-semibold px-5 py-2 rounded-full hover:bg-blue-800 transition">Download</a>
      </div>

      <!-- Card 3 - Brand Guidelines -->
      <div class="bg-blue-50 rounded-xl p-6 border border-blue-300 shadow hover:shadow-lg transition">
        <div class="mb-4 bg-white rounded-lg p-4 shadow-sm">
          <svg class="w-16 h-16 mx-auto text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM7 3H5a2 2 0 00-2 2v12a4 4 0 004 4h2a2 2 0 002-2V5a2 2 0 00-2-2z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 3h4a2 2 0 012 2v12a4 4 0 01-4 4h-4a2 2 0 01-2-2V5a2 2 0 012-2z"/>
          </svg>
        </div>
        <p class="font-semibold mb-2">Brand Guidelines</p>
        <a href="#" class="inline-block mt-4 bg-blue-700 text-white font-semibold px-5 py-2 rounded-full hover:bg-blue-800 transition">Download</a>
      </div>

      <!-- Card 4 - HD Photos -->
      <div class="bg-blue-50 rounded-xl p-6 border border-blue-300 shadow hover:shadow-lg transition">
        <div class="mb-4 bg-white rounded-lg p-4 shadow-sm">
          <svg class="w-16 h-16 mx-auto text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
          </svg>
        </div>
        <p class="font-semibold mb-2">HD Photos</p>
        <a href="#" class="inline-block mt-4 bg-blue-700 text-white font-semibold px-5 py-2 rounded-full hover:bg-blue-800 transition">Download</a>
      </div>
    </div>
  </div>
</section>


   
<!-- Contact Us Button -->
<div class="flex justify-center items-center my-10">
  <button onclick="openModal()" class="bg-blue-700 hover:bg-blue-800 text-white font-semibold px-8 py-3 rounded-full text-lg">
    Contact-us
  </button>
</div>

<!-- FORM MODAL -->
<div id="contactModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center">
  <div class="bg-white w-full max-w-lg p-8 rounded-2xl shadow-xl relative h-[750px]">
    <button onclick="closeModal()" class="absolute top-4 right-4 text-gray-400 hover:text-red-500 text-2xl font-bold">&times;</button>

    <div class="flex items-center gap-2 mb-6">
      <img src="https://img.icons8.com/emoji/48/memo.png" class="w-6 h-6" />
      <h2 class="text-xl font-bold">press relations</h2>
    </div>

    <form onsubmit="submitForm(event)" class="space-y-4">
      <input type="text" placeholder="Media name " class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm">
      <input type="text" placeholder="Your full name" class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm">
      <input type="text" placeholder="Phone number (with country code)" class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm">
      <input type="text" placeholder="Website if you have" class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm">
      <input type="email" placeholder="your email" class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm">
      <input type="text" placeholder="Languages spoken" class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm">
      

      <input type="text" placeholder="How did you hear about Ulixai?" class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm">
      <textarea placeholder="A little words" class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm h-24"></textarea>

      <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white px-6 py-3 rounded-full w-full font-semibold flex items-center justify-center gap-2">
        <input type="checkbox" checked class="accent-green-500" />
        Submit my partnership request
      </button>
    </form>
  </div>
</div>

<!-- THANK YOU POPUP -->
<div id="thankYouModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center">
  <div class="bg-white px-8 py-10 rounded-xl shadow-xl max-w-md text-center relative">
    <img src="https://img.icons8.com/color/96/internet--v1.png" class="absolute -top-12 left-1/2 transform -translate-x-1/2 w-16 h-16" />
    <h2 class="text-xl font-bold text-blue-700 mt-6">Thank you for your request!</h2>
    <p class="mt-2 text-gray-700">We have received it and will get back to you <strong>within 24 hours</strong>.</p>
    <p class="mt-2 text-gray-600">See you soon on this exciting <strong>@site</strong> journey 🌍</p>
  </div>
</div>




<!-- Key Figures & Milestones -->
<section class="bg-gray-50 py-20 px-6">
  <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-10">
    <div class="bg-white border border-blue-100 p-6 rounded-xl shadow">
      <h3 class="text-xl font-bold text-blue-700 mb-4">📊 Key Figures</h3>
      <ul class="list-disc pl-5 text-gray-700 space-y-2">
        <li>1,200+ active users</li>
        <li>500+ requests handled</li>
        <li>30+ countries covered</li>
        <li>Avg. response time: under 4 hours</li>
      </ul>
    </div>
    <div class="bg-white border border-blue-100 p-6 rounded-xl shadow">
      <h3 class="text-xl font-bold text-blue-700 mb-4">📅 Key Milestones</h3>
      <ul class="list-disc pl-5 text-gray-700 space-y-2">
        <li>Jan 2025 – Project Launch</li>
        <li>Feb 2025 – First active countries</li>
        <li>Mar 2025 – 100 verified providers</li>
        <li>May 2025 – Public launch</li>
      </ul>
    </div>
  </div>
</section>

<!-- Press Releases Section -->
<section class="bg-white py-16 px-6">
  <div class="max-w-6xl mx-auto">
    <h3 class="text-2xl font-bold text-blue-800 mb-6 text-center">📰 Recent Press Releases</h3>
    <div class="grid md:grid-cols-3 gap-6">
      <div class="bg-blue-50 p-6 rounded-xl shadow hover:shadow-md transition">
        <div class="flex justify-between items-start mb-4">
          <h4 class="font-semibold text-green-700 mb-2">@site Launch – May 2025</h4>
        </div>
        <p class="text-sm text-gray-600 mb-4">Full details of our platform launch and international coverage.</p>
        
        <!-- Download Button -->
        <a href="path/to/your/file1.pdf" download class="bg-blue-600 hover:bg-blue-700 text-white p-2 rounded-full text-center block transition-colors shadow-sm">
          Download
        </a>
      </div>

      <div class="bg-blue-50 p-6 rounded-xl shadow hover:shadow-md transition">
        <div class="flex justify-between items-start mb-4">
          <h4 class="font-semibold text-green-700 mb-2">S.O.S Service – April 2025</h4>
        </div>
        <p class="text-sm text-gray-600 mb-4">How we're solving emergency needs abroad for travelers and students.</p>
        
        <!-- Download Button -->
        <a href="path/to/your/file2.pdf" download class="bg-blue-600 hover:bg-blue-700 text-white p-2 rounded-full text-center block transition-colors shadow-sm">
          Download
        </a>
      </div>

      <div class="bg-blue-50 p-6 rounded-xl shadow hover:shadow-md transition">
        <div class="flex justify-between items-start mb-4">
          <h4 class="font-semibold text-green-700 mb-2">100 Certified Providers – March 2025</h4>
        </div>
        <p class="text-sm text-gray-600 mb-4">Milestone achieved with trusted professionals in 30+ countries.</p>
        
        <!-- Download Button -->
        <a href="path/to/your/file3.pdf" download class="bg-blue-600 hover:bg-blue-700 text-white p-2 rounded-full text-center block transition-colors shadow-sm">
          Download
        </a>
      </div>
    </div>
  </div>
</section>



<!-- Quotes & Headlines -->
<section class="bg-gray-50 py-16 px-6">
  <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-8">
    <div class="bg-white p-6 rounded-xl shadow">
      <h3 class="text-xl font-bold text-blue-700 mb-4">💬 Official Quotes</h3>
      <p class="italic text-gray-700 mb-4">“Whether you’re leaving for 6 days or 6 years, the unexpected happens fast. @site is your human Plan B abroad.”</p>
      <p class="italic text-gray-700">“We created @site to solve real struggles people face when far from home — with real human support.”</p>
    </div>
    <div class="bg-white p-6 rounded-xl shadow">
      <h3 class="text-xl font-bold text-blue-700 mb-4">⚡ Suggested Headlines</h3>
      <ul class="list-disc pl-5 text-gray-800 space-y-2">
        <li>@site, the go-to platform for those on the move</li>
        <li>Travelers, expats, students: finally a simple solution abroad</li>
        <li>No more searching — @site centralizes everything you need abroad</li>
      </ul>
    </div>
  </div>
</section>

 @include('includes.footer')
<script>

function triggerUpload(cardId) {
  document.getElementById(`file-input-${cardId}`).click();
}

function handleFileUpload(event, cardId) {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function(e) {
      const uploadArea = document.getElementById(`upload-area-${cardId}`);
      uploadArea.innerHTML = `
        <div class="relative">
          <img src="${e.target.result}" alt="Uploaded image" class="w-full h-32 object-cover rounded-lg mb-2">
          <button onclick="removeImage('${cardId}')" class="absolute top-2 right-2 bg-red-500 hover:bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm">
            ×
          </button>
        </div>
        <p class="text-sm text-green-600 font-medium">Photo uploaded successfully!</p>
      `;
    };
    reader.readAsDataURL(file);
  }
}

function removeImage(cardId) {
  const uploadArea = document.getElementById(`upload-area-${cardId}`);
  uploadArea.innerHTML = `
    <svg class="w-8 h-8 mx-auto mb-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
    </svg>
    <p class="text-sm text-gray-600">Click or drag photo here</p>
  `;
  document.getElementById(`file-input-${cardId}`).value = '';
}

// Add drag and drop functionality
document.addEventListener('DOMContentLoaded', function() {
  ['card1', 'card2', 'card3'].forEach(cardId => {
    const uploadArea = document.getElementById(`upload-area-${cardId}`);
    
    uploadArea.addEventListener('dragover', function(e) {
      e.preventDefault();
      this.classList.add('dragover');
    });
    
    uploadArea.addEventListener('dragleave', function(e) {
      e.preventDefault();
      this.classList.remove('dragover');
    });
    
    uploadArea.addEventListener('drop', function(e) {
      e.preventDefault();
      this.classList.remove('dragover');
      
      const files = e.dataTransfer.files;
      if (files.length > 0 && files[0].type.startsWith('image/')) {
        const fileInput = document.getElementById(`file-input-${cardId}`);
        fileInput.files = files;
        handleFileUpload({target: {files: files}}, cardId);
      }
    });
  });
});
</script>

<!-- Script -->
<script>
  function openModal() {
    document.getElementById('contactModal').classList.remove('hidden');
  }

  function closeModal() {
    document.getElementById('contactModal').classList.add('hidden');
  }

  function submitForm(e) {
    e.preventDefault();
    closeModal();
    setTimeout(() => {
      document.getElementById('thankYouModal').classList.remove('hidden');
    }, 200);
    setTimeout(() => {
      document.getElementById('thankYouModal').classList.add('hidden');
    }, 5000); // Auto close after 5 seconds
  }

  // Close modals on outside click
  window.addEventListener('click', function (e) {
    if (e.target.id === 'contactModal') closeModal();
    if (e.target.id === 'thankYouModal') document.getElementById('thankYouModal').classList.add('hidden');
  });
</script>


</body>
</html>