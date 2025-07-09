@extends('dashboard.layouts.master')

@section('title', 'Payment Validate')

@section('content')
  <!-- Page Layout -->
  <div class="flex flex-col lg:flex-row min-h-screen">
    <!-- Main Content -->
    <main class="flex-1 p-4 sm:p-6 lg:p-10">
      <h2 class="text-blue-900 font-bold text-lg mb-6 uppercase">Reviews and Payments to Be Made</h2>

      <!-- Cards Grid -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-7xl">

        <!-- Payment Card 1 -->
        <a href="{{ route('user-reviews') }}" class="block">
          <div class="bg-yellow-300 rounded-2xl p-5 text-sm text-blue-900 shadow hover:shadow-md transition duration-300 h-full flex flex-col justify-between">
            <div class="flex justify-between items-start">
              <div>
                <div class="font-bold mb-2">1 &nbsp; Moving appliances <span class="font-extrabold">123.50 $</span></div>
                <div class="mb-1">Date: <span class="font-medium">05/10/2023</span></div>
                <div class="mb-1">Italy</div>
                <div>Spanish</div>
              </div>
              <div class="ml-4 flex-shrink-0">
                <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center">
                  <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </a>

        <!-- Payment Card 2 -->
        <div class="bg-yellow-300 rounded-2xl p-5 text-sm text-blue-900 shadow hover:shadow-md transition duration-300 h-full flex flex-col justify-between">
          <div class="flex justify-between items-start">
            <div>
              <div class="font-bold mb-2">2 &nbsp; Moving table <span class="font-extrabold">21.00 $</span></div>
              <div class="mb-1">Date: <span class="font-medium">05/10/2023</span></div>
              <div class="mb-1">Germany</div>
              <div>Deutsch</div>
            </div>
            <div class="ml-4 flex-shrink-0">
              <div class="w-16 h-16 bg-red-400 rounded-full flex items-center justify-center">
                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                </svg>
              </div>
            </div>
          </div>
        </div>

      </div>

     <!-- Blue Notification Bar -->
<div class="mt-6">
  <div class="bg-blue-600 text-white text-center text-sm font-medium px-6 py-4 rounded-full shadow-md max-w-3xl mx-auto hidden sm:block">
    You have <strong>7 days</strong> to validate a payment after the end date of a service request,
    otherwise it will be automatically triggered within the <strong>7-day</strong> period.
  </div>
</div>


</main>
</div>

@endsection