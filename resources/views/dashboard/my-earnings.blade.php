@extends('dashboard.layouts.master')
@section('title', 'My Earnings')

@section('content')
    
    <!-- Main Content -->
    <div class="flex-1 px-4 sm:px-6 lg:pl-10 lg:pr-8 py-6 space-y-10">

      <!-- Wallet Summary -->
      <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
        
      </div>

      <!-- Total Balance -->
      <div class="w-full flex justify-center">
        <div class="w-full max-w-xs mx-auto border-2 border-blue-400 rounded-2xl p-4 bg-white text-center">
          <h2 class="text-base font-medium text-blue-500 mb-1">My total balance</h2>
          <div class="text-3xl font-bold text-blue-600 mb-1">292,00 €</div>
        </div>

        <div class="mt-6 flex flex-col sm:flex-row gap-3">
          <!-- <button class="flex-1 bg-blue-600 text-white py-3 px-4 rounded-xl font-medium hover:bg-blue-700 transition">
            Withdraw Funds
          </button>
          <button class="flex-1 bg-white text-gray-700 py-3 px-4 rounded-xl font-medium border border-gray-200 hover:bg-gray-50 transition">
            View History
          </button> -->
        </div>
      </div>

      <!-- Matching 3 Cards -->
      <div class="flex flex-col items-center mt-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full max-w-5xl">
          <!-- Affiliate Commissions -->
          <div class="flex flex-col items-center">
            <div class="w-full max-w-xs mx-auto border-2 border-blue-400 rounded-2xl p-4 bg-white text-center">
              <h3 class="text-base font-medium text-blue-500 mb-1">Affiliate commissions</h3>
              <p class="text-3xl font-bold text-blue-600 mb-1">150,00 €</p>
            </div>
            <div class="flex gap-3 mt-4 w-full max-w-xs mx-auto">
              <button class="flex-1 bg-blue-600 text-white py-3 px-4 rounded-xl font-medium hover:bg-blue-700 transition">
                Withdraw Funds
              </button>
            </div>
          </div>

          <!-- Missions Carried Out -->
          <div class="flex flex-col items-center">
            <div class="w-full max-w-xs mx-auto border-2 border-blue-400 rounded-2xl p-4 bg-white text-center">
              <h3 class="text-base font-medium text-blue-500 mb-1">Missions carried out</h3>
              <p class="text-3xl font-bold text-blue-600 mb-1">60,00 €</p>
            </div>
            <div class="flex gap-3 mt-4 w-full max-w-xs mx-auto">
              <button class="flex-1 bg-blue-600 text-white py-3 px-4 rounded-xl font-medium hover:bg-blue-700 transition">
                Withdraw Funds
              </button>
            </div>
          </div>

          <!-- Refund -->
          <div class="flex flex-col items-center">
            <div class="w-full max-w-xs mx-auto border-2 border-blue-400 rounded-2xl p-4 bg-white text-center">
              <h3 class="text-base font-medium text-blue-500 mb-1">Refund</h3>
              <p class="text-3xl font-bold text-blue-600 mb-1">92,00 €</p>
              <p class="text-xs text-blue-400 mt-2">Your refund will be deducted<br>from your next service request</p>
            </div>
            <div class="flex gap-3 mt-4 w-full max-w-xs mx-auto">
              <!-- <button class="flex-1 bg-blue-600 text-white py-3 px-4 rounded-xl font-medium hover:bg-blue-700 transition">
                Withdraw Funds
              </button> -->
        
            </div>
          </div>
        </div>
      </div>
    </div>

    <style>
    .blue-card {
      @apply rounded-2xl p-8 text-white shadow-xl text-center;
      background: linear-gradient(to bottom right, #2563eb, #1d4ed8); /* same as total balance */
    }
  </style>
@endsection