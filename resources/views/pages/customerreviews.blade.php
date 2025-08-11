<!-- Customer Reviews Page -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Customer Reviews</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800">
  @include('includes.header')
  @include('pages.popup')


<section class="py-16 px-4 text-center">
  <h2 class="text-3xl font-bold text-blue-900 mb-4">💬 What Customers are Saying</h2>
  <p class="text-gray-600 max-w-xl mx-auto mb-10">
    Thousands trust Ulixai abroad. Here’s what they’re saying.
  </p>

  <!-- ROW 1 -->
  <div class="flex flex-wrap justify-center gap-6 mb-6">
    <div class="bg-blue-50 rounded-2xl shadow p-6 w-[280px]">
      <img src="https://i.pravatar.cc/100?img=1" alt="Mateo Levi" class="w-16 h-16 rounded-full mx-auto mb-3" />
      <h4 class="font-bold text-gray-900 mb-1">Mateo Levi</h4>
      <!-- <p class="text-xs text-gray-600 mb-3">COO, San Brothers</p> -->
      <p class="text-sm text-gray-700 mb-2">The UI is intuitive and user-friendly. Even for someone like me!</p>
      <div class="text-yellow-400">★★★★★</div>
    </div>

    <div class="bg-pink-50 rounded-2xl shadow p-6 w-[280px]">
      <img src="https://i.pravatar.cc/100?img=47" alt="Olivia Emma" class="w-16 h-16 rounded-full mx-auto mb-3" />
      <h4 class="font-bold text-gray-900 mb-1">Olivia Emma</h4>
      <!-- <p class="text-xs text-gray-600 mb-3">CEO, Pixify</p> -->
      <p class="text-sm text-gray-700 mb-2">The team exceeded design expectations beautifully.</p>
      <div class="text-yellow-400">★★★★★</div>
    </div>

    <div class="bg-purple-50 rounded-2xl shadow p-6 w-[280px]">
      <img src="https://i.pravatar.cc/100?img=3" alt="Charlotte Amelia" class="w-16 h-16 rounded-full mx-auto mb-3" />
      <h4 class="font-bold text-gray-900 mb-1">David</h4>
      <!-- <p class="text-xs text-gray-600 mb-3">Manager, ImageIQ</p> -->
      <p class="text-sm text-gray-700 mb-2">The variety of styles and effects was amazing.</p>
      <div class="text-yellow-400">★★★★★</div>
    </div>
  </div>

  <!-- ROW 2 -->
  <div class="flex flex-wrap justify-center gap-6">
    <div class="bg-green-50 rounded-2xl shadow p-6 w-[280px]">
      <img src="https://i.pravatar.cc/100?img=12" alt="James Elijah" class="w-16 h-16 rounded-full mx-auto mb-3" />
      <h4 class="font-bold text-gray-900 mb-1">James Elijah</h4>
      <!-- <p class="text-xs text-gray-600 mb-3">CEO, FotoForge</p> -->
      <p class="text-sm text-gray-700 mb-2">Artistic brilliance that’s a game-changer.</p>
      <div class="text-yellow-400">★★★★★</div>
    </div>

    <div class="bg-indigo-50 rounded-2xl shadow p-6 w-[280px]">
      <img src="https://i.pravatar.cc/100?img=5" alt="William Henry" class="w-16 h-16 rounded-full mx-auto mb-3" />
      <h4 class="font-bold text-gray-900 mb-1">Audrey</h4>
      <!-- <p class="text-xs text-gray-600 mb-3">Director, SnapGen</p> -->
      <p class="text-sm text-gray-700 mb-2">Customization made expression effortless.</p>
      <div class="text-yellow-400">★★★★★</div>
    </div>

   <div class="bg-orange-50 rounded-2xl shadow p-6 w-[280px]">
  <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Estelle" class="w-16 h-16 rounded-full mx-auto mb-3" />
  <h4 class="font-bold text-gray-900 mb-1">Estelle</h4>
  <!-- <p class="text-xs text-gray-600 mb-3">Creative Lead, DesignPro</p> -->
  <p class="text-sm text-gray-700 mb-2">Loved comparing options and reviews.</p>
  <div class="text-yellow-400">★★★★★</div>
</div>

  </div>
</section>

  @include('includes.footer')
</body>
</html>
