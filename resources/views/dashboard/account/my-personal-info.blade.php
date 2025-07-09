@extends('dashboard.layouts.master')

@section('title', 'Personal Info')

@section('content')
  <!-- Page Layout -->
  <div class="flex flex-col lg:flex-row min-h-screen">

    <!-- Main Content -->
    <div class="flex-1 p-4 sm:p-6 lg:p-10 space-y-10">

      <!-- Wallet Overview -->
      <div class="flex flex-wrap gap-4 justify-center sm:justify-start">
        <div class="bg-blue-500 text-white px-4 py-2 rounded-full text-sm font-medium flex items-center gap-2">
          My piggi bank <span class="font-bold text-lg">243 $</span>
        </div>
        <div class="bg-yellow-300 text-black px-4 py-2 rounded-full text-sm font-medium flex items-center gap-2">
          Referral earnings <span class="font-bold text-lg">243 $</span>
        </div>
      </div>

      <!-- Personal Info Card -->
      <div class="bg-white rounded-2xl shadow-md p-6 sm:p-8 max-w-6xl mx-auto">
        <h2 class="text-blue-900 font-bold text-lg mb-6">MY PERSONAL INFORMATION</h2>

        <form action="" method="POST" class="space-y-8">
          <!-- Basic Info Fields -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="text-sm text-gray-600 block mb-1">Name</label>
              <input type="text" class="w-full border border-blue-300 rounded-full px-4 py-2" >
            </div>
            <div>
              <label class="text-sm text-gray-600 block mb-1">Surname</label>
              <input type="text" class="w-full border border-blue-300 rounded-full px-4 py-2">
            </div>

            <div>
              <label class="text-sm text-gray-600 block mb-1">Date of birth</label>
              <input type="text" class="w-full border border-blue-300 rounded-full px-4 py-2" >
            </div>
            <div>
              <label class="text-sm text-gray-600 block mb-1">Sexe</label>
              <input type="text" class="w-full border border-blue-300 rounded-full px-4 py-2">
            </div>

            <div>
              <label class="text-sm text-gray-600 block mb-1">Adress</label>
              <input type="text" class="w-full border border-blue-300 rounded-full px-4 py-2" >
            </div>
            <div>
              <label class="text-sm text-gray-600 block mb-1">Password</label>
              <input type="text" class="w-full border border-blue-300 rounded-full px-4 py-2" >
            </div>

            <div>
              <label class="text-sm text-gray-600 block mb-1">Nationality</label>
              <input type="text" class="w-full border border-blue-300 rounded-full px-4 py-2">
            </div>
            <div>
              <label class="text-sm text-gray-600 block mb-1">Native Language</label>
              <input type="text" class="w-full border border-blue-300 rounded-full px-4 py-2" >
            </div>

            <!-- Full Width Field -->
            <div class="md:col-span-2">
              <label class="text-sm text-gray-600 block mb-1">What languages do you speak?</label>
              <input type="text" class="w-full border border-blue-300 rounded-full px-4 py-2">
            </div>
          </div>

          <!-- Editable Fields -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="text-sm text-gray-600 block mb-1">Whatsapp Number</label>
              <div class="flex flex-col sm:flex-row gap-3">
                <input type="number" class="w-full border border-blue-300 rounded-full px-4 py-2">
                <button type="button" class="bg-yellow-400 text-black font-semibold px-4 py-2 rounded-full text-sm hover:bg-yellow-500">
                  Edit
                </button>
              </div>
            </div>

            <div>
              <label class="text-sm text-gray-600 block mb-1">Email</label>
              <div class="flex flex-col sm:flex-row gap-3">
                <input type="text" class="w-full border border-blue-300 rounded-full px-4 py-2">
                <button type="button" class="bg-yellow-400 text-black font-semibold px-4 py-2 rounded-full text-sm hover:bg-yellow-500">
                  Edit
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>

  @endsection