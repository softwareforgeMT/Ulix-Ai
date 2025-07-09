<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer with Enhanced About Section</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
  <footer class="relative bg-white border-t border-red-100 py-16 px-6 overflow-hidden">
  <!-- Decorative Blur Circles -->
  <div class="absolute -top-10 -left-10 w-64 h-64 bg-red-100 rounded-full blur-3xl opacity-30"></div>
  <div class="absolute -bottom-10 -right-10 w-64 h-64 bg-blue-100 rounded-full blur-3xl opacity-30"></div>

  <!-- Main Grid -->
  <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12 text-blue-900 items-start relative z-10">

    
    <!-- About Column -->
    <div class="flex flex-col gap-4 self-start -mt-6 ">
      <img class="w-16 h-16 " src="images/logoblue-64.png" alt="Ulixai Logo">

      <p class="text-gray-600 leading-relaxed text-sm">
        Ulixai.com is the solution for anyone who needs a helping hand — wherever they are in the world.
        <br><br>
        Need trusted, hassle-free assistance? Our platform connects you with verified providers who are available and ready to help — whether it's for an emergency or a one-time project.
        <br><br>
        At Ulixai, we never leave you alone. We simplify the connection, support you throughout the process, and ensure you find the right help at the right time.
      </p>

      <!-- Social Media Icons -->
      <div class="flex gap-3 pt-1">
        <a href="https://www.facebook.com/profile.php?id=61575873886727" class="w-9 h-9 bg-blue-600 hover:bg-blue-700 text-white rounded-full flex items-center justify-center hover:scale-110 transition-transform duration-300">
          <i class="fab fa-facebook-f text-sm"></i>
        </a>
        <a href="https://fr.pinterest.com/ulixai/" class="w-9 h-9 bg-red-600 hover:bg-red-700 text-white rounded-full flex items-center justify-center hover:scale-110 transition-transform duration-300">
          <i class="fab fa-pinterest-p text-sm"></i>
        </a>
        <a href="https://www.instagram.com/ulixai_officiel/" class="w-9 h-9 bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-full flex items-center justify-center hover:scale-110 transition-transform duration-300">
          <i class="fab fa-instagram text-sm"></i>
        </a>
        <a href="#" class="w-9 h-9 bg-black hover:bg-gray-800 text-white rounded-full flex items-center justify-center hover:scale-110 transition-transform duration-300">
          <i class="fab fa-tiktok text-sm"></i>
        </a>
        <a href="https://x.com/Ulixai_officiel" class="w-9 h-9 bg-blue-400 hover:bg-blue-500 text-white rounded-full flex items-center justify-center hover:scale-110 transition-transform duration-300">
          <i class="fab fa-twitter text-sm"></i>
        </a>
      </div>
    </div>

    <!-- Quick Links -->
    <div class="self-start">
      <h4 class="text-xl font-bold mb-4 tracking-wide">⚡ Quick Links</h4>
      <ul class="space-y-3 text-gray-700">
        <li><a href="index" class="hover:text-red-400 transition">Home</a></li>
        <li><a href="/inviteFreind" class="hover:text-red-400 transition">Invite Friends</a></li>
        <li><a href="/affiliate" class="text-blue-600 font-semibold hover:underline">Affiliate Program</a></li>
        <li><a href="/becomepartner" class="hover:text-red-400 transition">Become a Partner</a></li>
        <li><a href="/recruitment" class="hover:text-red-400 transition">Recruitment</a></li>
        <li><a href="/customerreviews" class="hover:text-red-400 transition">Customer Reviews</a></li>
        <li><a href="/aboutUS" class="hover:text-red-400 transition">About Us</a></li>
        <li><a href="/navigation" class="hover:text-red-400 transition">Navigation</a></li>
      </ul>
    </div>

    <!-- Legal Info -->
    <div class="self-start">
      <h4 class="text-xl font-bold mb-4 tracking-wide">📚 Legal & Info</h4>
      <ul class="space-y-3 text-gray-700">
        <li><a href="/trustnsecurity" class="hover:text-red-400 transition">Trust & Security</a></li>
        <li><a href="/howitwork" class="hover:text-red-400 transition">How It Works</a></li>
        <li><a href="/termsnconditions" class="hover:text-red-400 transition">Terms & Conditions</a></li>
        <li><a href="/cookiemanagment" class="hover:text-red-400 transition">Cookie Management</a></li>
        <li><a href="/legalnotice" class="hover:text-red-400 transition">Legal Notice</a></li>
        <li><a href="/press" class="hover:text-red-400 transition">Press</a></li>
      </ul>
    </div>
<!-- Payment Methods -->
<div class="self-start">
  <h4 class="text-xl font-bold mb-4 tracking-wide">💳 Payment Options</h4>
  <div class="flex items-center justify-center lg:justify-start space-x-4 mb-6">
    <img src="images/visa.png" alt="Visa" class="h-[60px]" />
    <img src="images/mastercard.png" alt="Mastercard" class="h-[60px]" />
    <img src="images/paypal.png" alt="PayPal" class="h-[60px]" />
  </div>
  
  <!-- Report Bug Button -->
  <!-- Report Bug Button -->
<div class="mt-12 flex justify-center lg:justify-start">
  <a href="/reportbug" class="bg-gradient-to-r from-orange-400 to-orange-500 hover:from-orange-500 hover:to-orange-600 text-white font-semibold py-3 px-6 rounded-full shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">
    Report a Bug
  </a>
</div>

</div>

<!-- Bottom Footer -->
<footer class="mt-12 pt-4 pb-4 border-t border-red-100">
  <div class="w-full text-center lg:text-left">
    <p class="text-xs text-gray-500 tracking-wide mx-auto lg:ml-0">
      2025 <span class="font-semibold text-blue-800">Ulixai.com</span> – Helping expatriates and travelers connect.
    </p>
  </div>
</footer>



</footer>

</body>
</html>