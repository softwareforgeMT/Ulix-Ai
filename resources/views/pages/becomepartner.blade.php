<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Become a Partner</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .fancy-border {
      position: relative;
      background: white;
      border-radius: 16px;
      padding: 12px 16px;
      border: 1px solid #e5e7eb;
      overflow: hidden;
    }

    .fancy-border::before,
    .fancy-border::after {
      content: '';
      position: absolute;
      top: 0;
      bottom: 0;
      width: 4px;
      background: linear-gradient(to bottom, #1e40af, #3b82f6, #2563eb);
      background-size: 100% 200%;
      animation: gradientShift 4s ease infinite;
      border-radius: 16px 0 0 16px;
    }

    .fancy-border::after {
      right: 0;
      left: auto;
      border-radius: 0 16px 16px 0;
      animation-direction: reverse;
    }

    .fancy-border:before {
      content: '';
      position: absolute;
      left: 0;
      top: 0;
      right: 0;
      height: 3px;
      background: linear-gradient(to right, #1e40af, #3b82f6, #1e3a8a, #2563eb);
      border-radius: 16px 16px 0 0;
      background-size: 200% 100%;
      animation: gradientShiftHorizontal 6s ease infinite;
      z-index: 1;
    }

    .fancy-border:hover {
      transform: translateY(-1px);
      transition: all 0.3s ease;
      box-shadow: 0 6px 20px rgba(30, 64, 175, 0.15);
    }

    @keyframes gradientShift {
      0% {
        background-position: 0% 0%;
      }
      50% {
        background-position: 0% 100%;
      }
      100% {
        background-position: 0% 0%;
      }
    }

    @keyframes gradientShiftHorizontal {
      0% {
        background-position: 0% 50%;
      }
      50% {
        background-position: 100% 50%;
      }
      100% {
        background-position: 0% 50%;
      }
    }
  </style>
</head>
<body class="bg-white text-gray-800">

 @include('includes.header')
    @include('pages.popup')


<section class="bg-white py-16 px-6 text-center max-w-4xl mx-auto mt-12">
  <h2 class="text-2xl md:text-3xl font-bold text-blue-800 mb-4">👋 Hello and welcome!</h2>
  <p class="text-gray-700 mb-2">Thank you for your interest <span class="text-yellow-500">✨</span></p>
  <p class="text-gray-600 max-w-xl mx-auto mb-6">
    Ulixai supports everyone living abroad, regardless of their language or country of origin.
  </p>
  <p class="text-gray-800 font-medium mb-10">
    We believe in partnerships that are human, simple and impactful 💡
  </p>

  <!-- Card Grid -->
  <div class="bg-blue-50 border border-blue-200 rounded-xl p-6">
    <h3 class="text-xl font-semibold text-blue-700 mb-6">You might be…</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-left">
      <div class="fancy-border flex items-center gap-2">
        🏙️ <span>A local or international business</span>
      </div>
      <div class="fancy-border flex items-center gap-2">
        🏪 <span>A brand, retailer or startup</span>
      </div>
      <div class="fancy-border flex items-center gap-2">
        💬 <span>A Facebook, WhatsApp, Discord, or Telegram community</span>
      </div>
      <div class="fancy-border flex items-center gap-2">
        🧡 <span>An NGO, nonprofit or grassroots initiative</span>
      </div>
      <div class="fancy-border flex items-center gap-2">
        🏛️ <span>A municipality, city hall or public institution</span>
      </div>
      <div class="fancy-border flex items-center gap-2">
        📰 <span>A media outlet, platform or website</span>
      </div>
      <div class="fancy-border flex items-center gap-2">
        📱 <span>A content creator or influencer</span>
      </div>
      <div class="fancy-border flex items-center gap-2">
        🧑‍💻 <span>An incubator, student network or coworking space</span>
      </div>
    </div>
  </div>

  <!-- CTA -->
  <p class="text-gray-800 mt-10 mb-4">
    If you'd like to take action and support those far from home, <br>
    we’d be happy to connect with you 🤝
  </p>
  <a href="/partnershipRequest" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-full transition">
    ➕ Suggest a partnership
  </a>
  <p class="text-sm text-gray-500 mt-4">Response within 72h. Simple, human and friendly contact.</p>
</section>

 @include('includes.footer')
</body>
</html>