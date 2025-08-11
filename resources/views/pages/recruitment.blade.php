<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Recruitment</title>
</head>
<body class="bg-white text-gray-800">
 @include('includes.header')
    @include('pages.popup')

  <!-- Social Media Share Card (top of page, right side) -->
  <div class="flex justify-end max-w-7xl mx-auto px-4 mt-6 mb-4">
    <div class="flex items-center bg-gradient-to-r from-blue-500 to-blue-700 rounded-2xl px-6 py-3 shadow-lg space-x-4">
      <span class="text-white font-semibold flex items-center text-base">
        <span class="mr-2">🚀</span>Share this sheet to help your friends
      </span>
      <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-blue-400 hover:bg-blue-600 transition">
        <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/facebook.svg" alt="Facebook" class="w-5 h-5" />
      </a>
      <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-pink-400 hover:bg-pink-600 transition">
        <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/instagram.svg" alt="Instagram" class="w-5 h-5" />
      </a>
      <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-white border border-gray-200 hover:bg-gray-200 transition">
        <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/tiktok.svg" alt="TikTok" class="w-5 h-5" />
      </a>
      <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-red-600 hover:bg-red-700 transition">
        <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/youtube.svg" alt="YouTube" class="w-5 h-5" />
      </a>
      <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-blue-300 hover:bg-blue-500 transition">
        <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/twitter.svg" alt="Twitter" class="w-5 h-5" />
      </a>
    </div>
  </div>

  <section class="py-16 px-6 max-w-4xl mx-auto">
    <h2 class="text-3xl font-bold text-blue-800 mb-8 text-center">🚀 Join the Ulixai Adventure</h2>
    <p class="text-gray-700 max-w-2xl mx-auto mb-16 text-center">
      Are you a freelancer or independent worker? Want to work on a meaningful project, from anywhere, with a cool team? 🌍
    </p>

    <div class="space-y-12">
      <!-- Block 1 -->
      <div class="flex flex-col md:flex-row border border-blue-200 rounded-xl overflow-hidden shadow-md bg-white">
        <img src="images/whyulix.png" alt="Why Ulixai" class="w-full md:w-1/2 object-cover">
        <div class="p-6 md:w-1/2 flex flex-col justify-center">
          <h3 class="text-lg font-bold text-blue-700 mb-4">Why Ulixai? ✨</h3>
          <ul class="list-disc list-inside space-y-2">
            <li>Total flexibility: work when you want, from wherever you want</li>
            <li>A real project to help people far from their home country</li>
            <li>A friendly atmosphere, no unnecessary stress</li>
            <li>Fair and transparent pay</li>
            <li>A true team: human, dynamic and always listening</li>
          </ul>
        </div>
      </div>

      <!-- Block 2 -->
      <div class="flex flex-col md:flex-row border border-blue-200 rounded-xl overflow-hidden shadow-md bg-white">
        <div class="p-6 md:w-1/2 flex flex-col justify-center order-2 md:order-1">
          <h3 class="text-lg font-bold text-blue-700 mb-4">The Ulixai Mindset 🧠</h3>
          <ul class="list-disc list-inside space-y-2">
            <li>We love motivated, curious and independent people</li>
            <li>You can ask questions, suggest ideas</li>
            <li>We take our work seriously — but not ourselves</li>
            <li>You grow with us, at your own pace</li>
            <li>No heavy hierarchy — just openness and honesty</li>
          </ul>
        </div>
        <img src="images/ulixmindset.png" alt="Ulixai Mindset" class="w-full md:w-1/2 object-cover order-1 md:order-2">
      </div>

      <!-- Block 3 -->
      <div class="flex flex-col md:flex-row border border-blue-200 rounded-xl overflow-hidden shadow-md bg-white">
        <img src="images/maybe.png" alt="Maybe You Are" class="w-full md:w-1/2 object-cover">
        <div class="p-6 md:w-1/2 flex flex-col justify-center">
          <h3 class="text-lg font-bold text-blue-700 mb-4">And maybe you are… 🔍</h3>
          <ul class="list-disc list-inside space-y-2">
            <li>A developer, designer, translator, coach, assistant or trainer</li>
            <li>...or simply someone motivated, reliable, kind and enthusiastic!</li>
            <li>No matter your background — if you have heart, you belong here 💙</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Roles Section -->
  <section class="bg-white py-10 px-6 max-w-6xl mx-auto text-center">
    <h2 class="text-3xl font-bold text-blue-800 mb-10">🎯 Ulixai Opportunities</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 text-left">
      <!-- Role Cards -->
      <!-- Repeat for each role -->
      <!-- Use consistent text color classes -->
      <?php
        $roles = [
          ["📹 Field Videographer / Content Creator", "Capture real Ulixai life (team, users, behind-the-scenes).", "text-blue-700"],
          ["📱 Social Media Video Editor", "Create dynamic Reels, Shorts, and TikToks.", "text-pink-600"],
          ["🎞️ Motion Designer", "Animate visuals for tutorials and ads.", "text-indigo-600"],
          ["📚 Educational Video Producer", "Create onboarding and how-to videos.", "text-purple-600"],
          ["📈 Video Marketing Manager", "Design and manage Ulixai’s video strategy.", "text-pink-600"],
          ["🎬 Documentary Video Editor", "Create emotionally powerful visual stories.", "text-blue-700"],
          ["🎥 Multi-Cam Operator / Events", "Record interviews, conferences, professional shoots.", "text-gray-800"],
          ["📊 Growth Marketer", "Boost acquisition across all channels.", "text-blue-500"],
          ["🔍 SEO & Content Manager", "Manage organic growth and content strategy.", "text-indigo-700"],
          ["📝 Content Manager", "Write multilingual content: blogs, pages, social media.", "text-orange-600"],
          ["✍️ Copywriter", "Work on texts, emails, and conversion pages.", "text-gray-800"],
          ["🤝 Affiliate & Referral Manager", "Launch and grow our recommendation program.", "text-indigo-700"],
          ["🎤 Micro-Influencer Manager", "Recruit and activate local brand ambassadors.", "text-pink-500"],
          ["📣 Community Manager", "Manage social media and community engagement.", "text-blue-900"],
          ["📱 Social Content Creator", "Create native content (TikTok, Insta, Shorts).", "text-purple-700"],
          ["💁‍♀️ Customer Success Manager", "Support our users with care and empathy.", "text-pink-400"],
          ["🌍 International Providers Manager", "Handle registrations and onboarding process.", "text-indigo-900"],
          ["🤝 Partnerships Manager", "Create valuable collaborations with partners.", "text-blue-700"],
          ["🗂️ Project / Product Manager", "Coordinate teams and prioritize actions.", "text-green-600"],
          ["📬 CRM & Email Specialist", "Design smart scenarios and automations.", "text-purple-500"]
        ];
        foreach ($roles as $role) {
          echo '<div onclick="openModal(\'' . addslashes($role[0]) . '\')" class="bg-white rounded-xl p-5 shadow border cursor-pointer">
            <h3 class="' . $role[2] . ' font-semibold mb-1">' . $role[0] . '</h3>
            <p class="text-gray-600 text-sm">' . $role[1] . '</p>
          </div>';
        }
      ?>
    </div>
  </section>

<!-- Modal -->
<div id="popupModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
  <div class="bg-white rounded-lg w-full max-w-md p-6 relative shadow-lg">
    <button onclick="closeModal()" class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 text-2xl font-bold">&times;</button>
    <h2 id="modalTitle" class="text-xl font-bold text-blue-800 text-center mb-4">Apply for: [Title]</h2>
    <form class="space-y-3">
      <select class="w-full border border-gray-300 rounded px-3 py-2">
        <option selected disabled>Select your country</option>
        <option>France</option>
        <option>Canada</option>
        <option>Belgium</option>
      </select>
      <input type="text" placeholder="First name" class="w-full border border-gray-300 rounded px-3 py-2" />
      <input type="text" placeholder="Last name" class="w-full border border-gray-300 rounded px-3 py-2" />
      <input type="text" placeholder="Phone number (+33...)" class="w-full border border-gray-300 rounded px-3 py-2" />
      <input type="email" placeholder="Email address" class="w-full border border-gray-300 rounded px-3 py-2" />
      <textarea placeholder="Your message" class="w-full border border-gray-300 rounded px-3 py-2 h-24"></textarea>
      <input type="file" class="w-full border border-gray-300 rounded px-3 py-2" />
      <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white font-semibold py-2 rounded">
        Submit my application
      </button>
      <p class="text-center text-gray-500 text-xs">We will respond within 7 days.</p>
    </form>
  </div>
</div>


 @include('includes.footer')

  <script>
    function openModal(title) {
      document.getElementById('popupModal').classList.remove('hidden');
      document.getElementById('modalTitle').innerText = 'Apply For : ' + title;
    }

    function closeModal() {
      document.getElementById('popupModal').classList.add('hidden');
    }
  </script>

</body>
</html>