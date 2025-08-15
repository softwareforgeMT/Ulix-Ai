
@extends('dashboard.layouts.master')

@section('title', 'Service Cards')

@section('content')

<!-- Main Content -->
<div class="flex-1 p-4 sm:p-6 flex flex-col min-h-screen bg-gradient-to-br from-blue-50 to-white">

  <!-- Header Section -->
  <div class="mb-8">
    <!-- See Service Provider Button (top right) -->
    <div class="flex justify-end mb-6">
      <a href="{{ route('service-providers' )}}" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold px-8 py-3 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 text-sm md:text-base transform hover:-translate-y-0.5">
        <span class="flex items-center space-x-2">
          <span>See service provider</span>
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
          </svg>
        </span>
      </a>
    </div>

    <!-- Page Title with improved styling -->
    <div class="text-center mb-8">
      <div class="inline-block">
        <h1 class="text-blue-800 text-2xl md:text-3xl font-bold mb-2">My Service Requests</h1>
        <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-blue-300 mx-auto rounded-full"></div>
      </div>
    </div>
  </div>

  @php
      $currentRequests = $missions->filter(function($m) {
          return !empty($m->selected_provider_id) && in_array($m->status, ['in_progress', 'completed', 'disputed', 'cancelled', 'waiting_to_start']) && $m->payment_status !== 'released';
      });
      $publishedNoProvider = $missions->filter(function($m) {
          return empty($m->selected_provider_id) && $m->status === 'published';
      });
  @endphp

  <!-- Current Service Requests Section -->
  <div class="mb-12">
    <div class="flex items-center justify-center mb-8">
      <div class="flex items-center space-x-3">
        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
          <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
          </svg>
        </div>
        <h2 class="text-blue-700 text-xl md:text-2xl font-semibold">Current Service Requests</h2>
        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
          <span class="text-white font-bold text-sm">{{ $currentRequests->count() }}</span>
        </div>
      </div>
    </div>

    <!-- Cards Grid: My Current Service Request -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @forelse($currentRequests as $mission)
        <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 p-4 relative border border-blue-100 overflow-hidden transform hover:-translate-y-1">
          <!-- Subtle background decoration -->
          <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-50 to-transparent rounded-bl-full opacity-60"></div>
          
          <!-- Right-side circular icon -->
          <div class="absolute right-6 top-6 sm:top-1/3 transform sm:-translate-y-1/2 w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center shadow-lg hover:scale-105 transition-transform duration-200">
            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
              <path d="M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z"/>
            </svg>
          </div>
          
          <div class="pr-0 sm:pr-20">
            <!-- Header with improved typography -->
            <div class="mb-3">
              <h3 class="text-blue-900 font-bold mb-1 text-base tracking-wide leading-tight">{{ strtoupper($mission->title ?? 'Service Request') }}</h3>
              <div class="w-12 h-0.5 bg-gradient-to-r from-blue-500 to-blue-300"></div>
            </div>
            
            <!-- Information grid with compact spacing -->
            <div class="space-y-2 mb-4">
              <div class="flex items-center space-x-2">
                <div class="w-1.5 h-1.5 rounded-full bg-blue-400"></div>
                <span class="text-blue-700 font-medium text-xs">Duration:</span>
                <span class="text-gray-600 text-xs">{{ $mission->service_durition ?? '-' }}</span>
              </div>
              
              <div class="flex items-center space-x-2">
                <div class="w-1.5 h-1.5 rounded-full bg-blue-400"></div>
                <span class="text-blue-700 font-medium text-xs">Location:</span>
                <span class="text-gray-600 text-xs">{{ $mission->location_city ?? '-' }}, {{ $mission->location_country ?? '-' }}</span>
              </div>
              
              <div class="flex items-center space-x-2">
                <div class="w-1.5 h-1.5 rounded-full bg-blue-400"></div>
                <span class="text-blue-700 font-medium text-xs">Language:</span>
                <span class="text-gray-600 text-xs">{{ $mission->language ?? '-' }}</span>
              </div>
              
              <div class="flex items-center space-x-2">
                <div class="w-1.5 h-1.5 rounded-full bg-blue-400"></div>
                <span class="text-blue-700 font-medium text-xs">Status:</span>
                <span class="px-2 py-0.5 rounded-full text-xs font-medium
                  @if($mission->status === 'completed') bg-green-100 text-green-700
                  @elseif($mission->status === 'in_progress') bg-blue-100 text-blue-700
                  @elseif($mission->status === 'disputed') bg-red-100 text-red-700
                  @elseif($mission->status === 'waiting_to_start') bg-yellow-100 text-yellow-700
                  @else bg-gray-100 text-gray-700
                  @endif">
                  {{ 
                    ucfirst(
                      $mission->status === 'in_progress' ? 'In Progress' : 
                      ($mission->status === 'completed' ? 'Completed' : 
                      ($mission->status === 'disputed' ? 'Disputed' : 
                      ($mission->status === 'waiting_to_start' ? 'Waiting to Start' : 'N/A' )))
                    )
                  }}
                </span>
              </div>
            </div>

            <!-- Action buttons with compact design -->
            <div class="space-y-2">
              <a href="{{ route('view.request', ['id' => $mission->id]) }}" 
                 class="block w-full border-2 border-blue-500 text-blue-600 rounded-lg px-4 py-2 text-xs font-semibold text-center hover:bg-blue-50 hover:border-blue-600 hover:text-blue-700 transition-all duration-200">
                View Request Details
              </a>
              
              <a href="{{ route('service-providers') }}" 
                 class="block w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-2 text-xs font-semibold rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-200 text-center shadow-md hover:shadow-lg">
                See the Ulysses
              </a>
            </div>
          </div>
        </div>
      @empty
        <div class="col-span-3 text-center py-16">
          <div class="inline-flex items-center justify-center w-20 h-20 bg-blue-100 rounded-full mb-6">
            <svg class="w-10 h-10 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
            </svg>
          </div>
          <h3 class="text-blue-800 font-semibold text-lg mb-2">No Active Requests</h3>
          <p class="text-blue-600">You have no active service requests at the moment.</p>
        </div>
      @endforelse
    </div>
  </div>

  <!-- Published - Not yet provider Section -->
  <div class="mb-8">
    <div class="flex items-center justify-center mb-8">
      <div class="flex items-center space-x-3">
        <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center">
          <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
          </svg>
        </div>
        <h2 class="text-blue-700 text-xl md:text-2xl font-semibold">Awaiting Provider</h2>
        <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center">
          <span class="text-white font-bold text-sm">{{ $publishedNoProvider->count() }}</span>
        </div>
      </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @forelse($publishedNoProvider as $mission)
        <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 p-4 relative border-l-4 border-l-yellow-400 overflow-hidden transform hover:-translate-y-1">
          <!-- Subtle background decoration -->
          <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-yellow-50 to-transparent rounded-bl-full opacity-60"></div>
          
          <!-- Right-side circular icon -->
          <div class="absolute right-4 top-4 w-12 h-12 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-full flex items-center justify-center shadow-lg hover:scale-105 transition-transform duration-200">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 5.5V10.5C15 11.9 14.1 13.1 12.8 13.6L12 14L11.2 13.6C9.9 13.1 9 11.9 9 10.5V5.5L3 7V9H1V7C1 6.4 1.4 5.9 2 5.8L8 4.3V2H9V4.3L15 5.8C15.6 6 16 6.4 16 7V9H21Z"/>
            </svg>
          </div>
          
          <div class="pr-0 sm:pr-16">
            <!-- Header with improved typography -->
            <div class="mb-3">
              <h3 class="text-blue-900 font-bold mb-1 text-base tracking-wide leading-tight">{{ strtoupper($mission->title ?? 'WAITING FOR PROVIDER') }}</h3>
              <div class="w-12 h-0.5 bg-gradient-to-r from-yellow-400 to-yellow-300"></div>
            </div>
            
            <!-- Information with compact spacing -->
            <div class="space-y-1.5 mb-3">
              <div class="flex items-center space-x-2">
                <div class="w-1.5 h-1.5 rounded-full bg-yellow-400"></div>
                <span class="text-blue-700 font-medium text-xs">Duration:</span>
                <span class="text-gray-600 text-xs">{{ $mission->service_durition ?? '-' }}</span>
              </div>
              
              <div class="flex items-center space-x-2">
                <div class="w-1.5 h-1.5 rounded-full bg-yellow-400"></div>
                <span class="text-blue-700 font-medium text-xs">Location:</span>
                <span class="text-gray-600 text-xs">{{ $mission->location_country ?? '-' }}</span>
              </div>
              
              <div class="flex items-center space-x-2">
                <div class="w-1.5 h-1.5 rounded-full bg-yellow-400"></div>
                <span class="text-blue-700 font-medium text-xs">Language:</span>
                <span class="text-gray-600 text-xs">{{ $mission->language ?? '-' }}</span>
              </div>
              
              <div class="flex items-center space-x-2">
                <div class="w-1.5 h-1.5 rounded-full bg-yellow-400"></div>
                <span class="text-blue-700 font-medium text-xs">Urgency:</span>
                <span class="text-gray-600 text-xs">{{ ucfirst($mission->urgency) ?? '-' }}</span>
              </div>
            </div>
            
            <!-- Proposals received highlight -->
            <div class="bg-gradient-to-r from-red-50 to-pink-50 border border-red-200 rounded-lg p-2 mb-3">
              <div class="text-center">
                <div class="text-red-600 font-bold text-base">{{ $mission->offers->count() ?? 0 }}</div>
                <div class="text-red-600 text-xs font-medium">Proposals Received</div>
              </div>
            </div>
            
            <!-- Action buttons -->
            <div class="mb-3">
              <a href="{{ route('qoute-offer', ['id'=> $mission->id]) }}" 
                 class="block w-full border-2 border-blue-500 text-blue-600 rounded-lg px-4 py-2 text-xs font-semibold text-center hover:bg-blue-50 hover:border-blue-600 hover:text-blue-700 transition-all duration-200">
                View My Request
              </a>
            </div>
            
            <!-- Footer actions -->
            <div class="flex justify-between items-center gap-2">
              @if($mission->offers->count() > 0)
                <span class="bg-green-100 text-green-700 px-2 py-1 text-xs rounded-full font-medium">
                  {{ $mission->offers->count() }} {{ $mission->offers->count() === 1 ? 'Offer' : 'Offers' }}
                </span>
              @else
                <span class="bg-gray-100 text-gray-600 px-2 py-1 text-xs rounded-full font-medium">No provider yet</span>
              @endif
              
              <button 
                class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-3 py-1.5 text-xs rounded-lg font-semibold transition-all duration-200 whitespace-nowrap shadow-md hover:shadow-lg"
                onclick="openCancelRequestPopup({{ $mission->id }})">
                Cancel Request
              </button>
            </div>
          </div>
        </div>
      @empty
        <div class="col-span-3 text-center py-16">
          <div class="inline-flex items-center justify-center w-20 h-20 bg-yellow-100 rounded-full mb-6">
            <svg class="w-10 h-10 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
          </div>
          <h3 class="text-blue-800 font-semibold text-lg mb-2">No Pending Requests</h3>
          <p class="text-blue-600">No published requests are currently waiting for a provider.</p>
        </div>
      @endforelse
    </div>
  </div>

</div>

@include('dashboard.service.cancel-service-request')
@endsection