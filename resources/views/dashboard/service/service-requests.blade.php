
@extends('dashboard.layouts.master')

@section('title', 'Service Cards')

@section('content')

<!-- Main Content -->
<div class="flex-1 p-4 sm:p-6 flex flex-col min-h-screen">

  <!-- See Service Provider Button (top right) -->
  <div class="flex justify-end mb-2">
    <a href="{{ route('service-providers' )}}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded-lg shadow transition-all duration-150 text-sm md:text-base">
      See service provider
    </a>
  </div>

  <!-- Tabs + Title -->
  <div class="flex flex-col gap-4 mb-6">
    <!-- Buttons -->
    <!-- <div class="flex justify-center gap-3">
      <button class="bg-blue-500 text-white px-6 py-2 rounded-full font-semibold">UPCOMING</button>
      <button class="text-blue-500 underline font-medium">ARCHIVED</button>
    </div> -->
    <!-- Centered Title -->
    <h3 class="text-blue-700 text-xl md:text-2xl font-medium text-center mb-6">My Current Service Request</h3>
  </div>

  <!-- Cards Grid -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php for ($i = 0; $i < 3; $i++): ?>
    <div class="bg-white rounded-2xl shadow-md p-6 relative">
      <!-- Right-side circular icon -->
      <div class="absolute right-4 top-4 sm:top-1/3 transform sm:-translate-y-1/2 w-16 h-16 bg-<?= ['yellow','red','blue'][$i] ?>-400 rounded-full flex items-center justify-center">
        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
          <path d="<?= [
            'M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 5.5V10.5C15 11.9 14.1 13.1 12.8 13.6L12 14L11.2 13.6C9.9 13.1 9 11.9 9 10.5V5.5L3 7V9H1V7C1 6.4 1.4 5.9 2 5.8L8 4.3V2H9V4.3L15 5.8C15.6 6 16 6.4 16 7V9H21Z',
            'M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z',
            'M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z'
          ][$i] ?>"/>
        </svg>
      </div>
      <div class="pr-0 sm:pr-20">
        <h3 class="text-blue-900 font-bold mb-1 text-sm">NIGHT BABYSTILLING MOM</h3>
        <p class="text-gray-700 text-sm">Duration : 23 jun 2024  1 hour</p>
        <p class="text-gray-700 text-sm mb-1">France</p>
        <!-- <p class="text-gray-700 text-sm mb-1">Lyon</p> -->
        <p class="text-gray-700 text-sm mb-1">French</p>
        <p class="text-gray-700 text-sm mb-2">Mission Ends In : 59:30</p>
        <div class="space-y-2">
          <a href="{{ route('view.request') }}" class="block border border-blue-400 text-blue-500 rounded-full px-4 py-2 text-sm font-medium text-center hover:bg-blue-50 transition">See my request</a>
        </div>
        <div class="flex justify-between items-center mt-6">
          <span></span>
          <a href="{{ route('service-providers' )}}" class="bg-green-500 text-white px-4 py-2 text-sm rounded-full hover:bg-green-600 transition">See the Ulysses</a>
        </div>
      </div>
    </div>
    <?php endfor; ?>
  </div>
  <!-- New Section: Published - Not yet provider -->
  <div class="mt-10">
    <h3 class="text-center text-blue-700 text-2xl font-semibold mb-6">Published - Not yet provider</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php for ($i = 0; $i < 3; $i++): ?>
      <div class="bg-blue-100 rounded-2xl shadow-md p-6 relative">
        <div class="absolute right-4 top-4 sm:top-1/3 transform sm:-translate-y-1/2 w-16 h-16 bg-blue-400 rounded-full flex items-center justify-center">
          <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 5.5V10.5C15 11.9 14.1 13.1 12.8 13.6L12 14L11.2 13.6C9.9 13.1 9 11.9 9 10.5V5.5L3 7V9H1V7C1 6.4 1.4 5.9 2 5.8L8 4.3V2H9V4.3L15 5.8C15.6 6 16 6.4 16 7V9H21Z"/>
          </svg>
        </div>
        <div class="pr-0 sm:pr-20">
          <h3 class="text-blue-900 font-bold mb-1 text-sm">WAITING FOR PROVIDER</h3>
          <p class="text-gray-700 text-sm">Duration : 24 jun 2024  2 hours</p>
          <p class="text-gray-700 text-sm mb-1">France</p>
          <p class="text-gray-700 text-sm mb-1">English</p>
          <p class="text-gray-700 text-sm mb-2">Mission Ends In : 12:00</p>
          <div class="space-y-2">
            <a href="{{ route('qoute-offer') }}" class="block border border-blue-400 text-blue-500 rounded-full px-4 py-2 text-sm font-medium text-center hover:bg-blue-200 transition">See my request</a>
            <?php
              // Example: $proposals = 0; // Always 0 for these cards
              $proposals = 0;
              if ($proposals > 0) {
                echo '<div class="text-green-600 text-center font-semibold text-sm">', $proposals, ' proposals received</div>';
              } else {
                echo '<div class="text-red-600 text-center font-semibold text-sm">0 proposals received</div>';
              }
            ?>
          </div>
          <div class="flex justify-end items-center mt-6 gap-2 flex-wrap">
            <span class="bg-gray-300 text-gray-700 px-3 py-1 text-xs rounded-full">No provider yet</span>
            <button 
              class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 text-xs rounded-full font-semibold transition-all whitespace-nowrap"
              onclick="openCancelRequestPopup(event)">
              Cancel my help request
            </button>
          </div>
        </div>
      </div>
      <?php endfor; ?>
    </div>
  </div>
  <!-- End New Section -->

  <!-- Tabs at bottom center (not sticky, just after all content) -->
  <div class="flex justify-center gap-3  mb-4 pb-8 mt-6">
    <button class="bg-blue-500 text-white px-6 py-2 rounded-full font-semibold">UPCOMING</button>
    <button class="text-blue-500 underline font-medium">ARCHIVED</button>
  </div>
</div>

@include('dashboard.service.cancel-service-request')
@endSection