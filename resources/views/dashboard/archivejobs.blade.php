<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Archived Jobs</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-white to-blue-50 min-h-screen font-sans">
 @include('includes.header')
     @include('pages.popup')
 

  <div class="flex min-h-screen">

    <!-- Sidebar Include -->
    @include('sidebardash')

    <!-- Main Content -->
    <div class="flex-1 p-8 space-y-8">

      <!-- Wallet & Referral -->
      <div class="flex items-center gap-4">
        <?php include('walletmoney.php'); ?>
      </div>

      <!-- Tabs + Red Notification -->
      <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div class="flex gap-4">
          <a href="jobslist.php" class="text-blue-600 font-medium underline hover:text-blue-800">UPCOMING</a>
          <button class="bg-blue-600 text-white px-4 py-1 rounded-full font-medium shadow hover:bg-blue-700">ARCHIVED</button>
        </div>
        <div class="bg-red-600 text-white px-4 py-1.5 rounded-full text-sm font-medium shadow flex items-center gap-2">
          77 ongoing service requests
          <a href="ongoingservices.php" class="underline font-semibold ml-1">| DISCOVER</a>
        </div>
      </div>

      <!-- Job List Header -->
      <h2 class="text-xl font-bold text-blue-900">MY JOB LIST <span class="text-gray-600 font-normal">(2 archived services)</span></h2>

      <!-- Job Cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php for ($i = 0; $i < 3; $i++): ?>
        <div class="bg-white rounded-2xl shadow p-5 relative space-y-3">
          <!-- Title -->
          <h3 class="text-blue-900 font-bold text-sm">NIGHT BABYSTILLING MOM</h3>

          <!-- Details -->
          <p class="text-sm text-gray-700">15 August 2024 at 16h00</p>
          <p class="text-sm text-gray-700">Duration: 1 hour</p>

          <!-- See Button -->
          <button class="border border-blue-400 text-blue-500 text-sm px-4 py-1.5 rounded-full hover:bg-blue-50 transition">See</button>

          <!-- Price -->
          <p class="text-red-600 font-bold text-sm">Service price 36 $</p>

          <!-- New SVG Icon -->
          <div class="absolute right-4 top-1/3 transform -translate-y-1/2 w-14 h-14 bg-red-400 rounded-full flex items-center justify-center">
            <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
            </svg>
          </div>
        </div>
        <?php endfor; ?>
      </div>

    </div>
  </div>
  <?php include('bottomnavbar.php'); ?>
</body>
</html>