@extends('dashboard.layouts.master')

@section('title', 'Payments')

@section('content')
    
    <!-- Main Content -->
    <div class="flex-1 p-4 sm:p-6 lg:p-8">
      <h1 class="text-xl sm:text-2xl font-bold mb-6 sm:mb-8 text-center lg:text-left">I VALIDATE JULIEN</h1>

      <div class="flex flex-col lg:flex-row gap-6 justify-center items-start">
        <!-- Payment Form -->
        <div class="bg-white rounded-lg p-6 w-full max-w-md mx-auto lg:mx-0">
          <h2 class="text-lg font-semibold mb-6">MEANS OF PAYMENT</h2>

          <!-- Credit Card Option -->
          <div class="mb-6">
            <div class="flex items-center justify-between mb-4">
              <div class="flex items-center">
                <i class="fas fa-credit-card mr-3 text-gray-600"></i>
                <span class="font-medium">Credit or debit card</span>
              </div>
              <div class="w-4 h-4 bg-blue-500 rounded-full"></div>
            </div>

            <!-- Card Form -->
            <div class="space-y-4">
              <div>
                <label class="block text-sm text-gray-600 mb-1">Card number</label>
                <div class="flex items-center border border-gray-300 rounded-lg p-3">
                  <input type="number" placeholder="•••• •••• •••• ••••" class="flex-1 outline-none text-gray-600" />
                  <div class="flex space-x-1 ml-3">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/41/Visa_Logo.png" alt="Visa" class="w-8 h-5 object-contain" />
                    <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Mastercard-logo.png" alt="Mastercard" class="w-8 h-5 object-contain" />
                  </div>
                </div>
                <div class="text-xs text-gray-400 mt-1">Secure payment</div>
              </div>

              <div class="flex flex-col sm:flex-row sm:space-x-4 space-y-4 sm:space-y-0">
                <div class="flex-1">
                  <label class="block text-sm text-gray-600 mb-1">Expiration date</label>
                  <input type="text" placeholder="12 / 24" class="w-full border border-gray-300 rounded-lg p-3 text-gray-600" />
                </div>
                <div class="flex-1">
                  <label class="block text-sm text-gray-600 mb-1">Security code</label>
                  <input type="text" placeholder="123" class="w-full border border-gray-300 rounded-lg p-3 text-gray-600" />
                </div>
              </div>

              <!-- PayPal Option -->
              <div class="mb-4">
                <div class="flex items-center justify-between p-4 border border-gray-300 rounded-lg">
                  <div class="flex items-center">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" alt="PayPal" class="w-6 h-6 object-contain mr-2" />
                    <span class="font-medium">PayPal</span>
                  </div>
                  <div class="w-4 h-4 border-2 border-gray-300 rounded-full"></div>
                </div>
              </div>

              <!-- Reserve Button -->
              <button class="w-full bg-blue-500 text-white rounded-lg py-2.5 text-sm font-semibold hover:bg-blue-600 transition">
                <a href="/orderconfirm">RESERVE FOR 41.40$</a>
              </button>

              <p class="text-xs text-gray-500 text-center">
                This is a prepayment, the amount is refunded in the event of cancellation
              </p>
            </div>
          </div>
        </div>

        <!-- Order Summary -->
        <div class="w-full max-w-md bg-white rounded-lg p-6 mx-auto lg:mx-0">
          <div class="flex items-center mb-6">
            <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Profile Photo" class="w-16 h-16 rounded-full object-cover mr-4 border border-gray-300" />

            <div class="flex-1">
              <div class="flex items-center mb-2">
                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                <span class="text-sm font-medium">Profile verified</span>
              </div>
              <div class="flex items-center">
                <i class="fas fa-star text-yellow-400 mr-1"></i>
                <span class="text-sm">4.85 / 5</span>
              </div>
            </div>
            <div class="text-right">
              <i class="fas fa-file-alt text-blue-500 text-2xl"></i>
            </div>
          </div>

          <div class="text-center mb-6">
            <div class="text-sm text-gray-600 mb-1">Expected delivery</div>
            <div class="font-semibold">12 October 2024</div>
          </div>

          <div class="border-t pt-4 space-y-3">
            <div class="flex justify-between">
              <span class="text-sm">Zeiper</span>
              <span class="text-sm">36.00 €</span>
            </div>
            <div class="flex justify-between">
              <span class="text-sm">Service fees</span>
              <span class="text-sm">5.40 €</span>
            </div>
            <div class="border-t pt-3 flex justify-between font-semibold">
              <span>TOTAL</span>
              <span>41.40 €</span>
            </div>
          </div>

          <div class="mt-4 text-right">
            <i class="fas fa-info-circle text-gray-400"></i>
          </div>
        </div>
      </div>
    </div>
    @endsection
 