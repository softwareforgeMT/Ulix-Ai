<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Partnership Request</title>
</head>
<body>


 @include('includes.header')


<section class="max-w-lg mx-auto px-6 py-16 bg-white border border-blue-200 rounded-xl shadow-md mt-10 mb-10">
  <h2 class="text-2xl font-bold text-blue-700 text-center mb-6">
    📝 Partnership Request
  </h2>
<div id="partnershipForm">
  <form class="space-y-4">
    <!-- Entity Name -->
    <input type="text" required placeholder="Entity name (Required)" class="w-full bg-gray-200 px-4 py-2 border  rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" />

    <!-- Full Name -->
    <input type="text" required placeholder="Your full name (Required)" class="w-full bg-gray-200 px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" />

    <!-- Phone Number -->
    <input type="text" placeholder="Phone number (with country code)" class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" />

    <!-- Country of Activity -->
    <input type="text" placeholder="Country of activity" class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" />

    <!-- Sector of Activity -->
    <input type="text" placeholder="Sector of activity" class="w-full bg-gray-200 px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" />

    <!-- Languages Spoken -->
    <input type="text" placeholder="Languages spoken" class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" />

    <!-- Preferred Time -->
    <input type="text" placeholder="Preferred time for a reply" class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" />

    <!-- Type of Partnership -->
    <select class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-700">
      <option disabled selected>— Choose an option —</option>
      <option>Content Collaboration</option>
      <option>Distribution Partner</option>
      <option>Sponsorship</option>
    </select>

    <!-- How did you hear -->
    <input type="text" placeholder="How did you hear about Ulixai?" class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" />

    <!-- Motivation -->
    <textarea rows="3" placeholder="What motivates you to collaborate?" class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>

    <!-- Submit Button -->
    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-full">
      ✅ Submit my partnership request
    </button>
  </form>
    </div>

<div id="thankYouMessage" class="hidden text-center">
    <img src="https://cdn-icons-png.flaticon.com/512/44/44386.png" alt="Globe" class="w-12 h-12 mx-auto mb-2" />
    <h3 class="text-xl font-bold text-blue-800">Thank you for your request!</h3>
    <p class="text-gray-700">We have received it and will get back to you <strong>within 24 hours.</strong></p>
    <p class="text-sm text-gray-600 mt-2">See you soon on this exciting <strong>Ulixai</strong> journey 🌍</p>
  </div>

</section>























@include('includes.footer')




<script>
  document.getElementById('partnershipForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent form from refreshing the page

    // Optionally, you can validate here or send to backend

    // Hide the form and show the thank you message
    document.getElementById('partnershipForm').classList.add('hidden');
    document.getElementById('thankYouMessage').classList.remove('hidden');
  });
</script>

</body>
</html>