@extends('dashboard.layouts.master')

@section('title', 'Job List')

@section('content')
    <!-- Main Content -->
    <div class="flex-1 p-4 sm:p-6 flex flex-col min-h-screen bg-gradient-to-br from-blue-50 to-white">

      <!-- Header Section -->
      <div class="mb-8">
        <!-- Top Actions -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
          <div class="flex gap-4 flex-wrap">
            <!-- Empty space for future tabs if needed -->
          </div>
          <a href="{{ route('ongoing-requests')}}"
             class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-6 py-3 rounded-xl text-sm font-semibold shadow-lg hover:shadow-xl transition-all duration-300 flex items-center gap-3 w-full md:w-auto justify-center md:justify-start transform hover:-translate-y-0.5">
            <div class="flex items-center space-x-2">
              <div class="w-6 h-6 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                <span class="text-white font-bold text-xs">{{ $jobs->count() }}</span>
              </div>
              <span>ongoing service requests</span>
            </div>
            <span class="border-l border-white border-opacity-30 pl-3 font-bold text-sm">DISCOVER</span>
          </a>
        </div>

        <!-- Page Title -->
        <div class="text-center mb-8">
          <div class="inline-block">
            <h1 class="text-blue-800 text-2xl md:text-3xl font-bold mb-2">My Job Dashboard</h1>
            <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-blue-300 mx-auto rounded-full"></div>
          </div>
          <p class="text-blue-600 mt-3 text-sm md:text-base">The validated missions that I must do</p>
        </div>
      </div>

      @php 
          $jobsAccepted = $jobs->filter(function($job) {
              return in_array($job->status, ['accepted']);
          });

          $jobsOffer = $jobs->filter(function($job) {
              return in_array($job->status, ['pending']);
          });
      @endphp

      <!-- Current Jobs Section -->
      <div class="mb-12">
        <div class="flex items-center justify-center mb-8">
          <div class="flex items-center space-x-3">
            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
              <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
              </svg>
            </div>
            <h2 class="text-blue-700 text-xl md:text-2xl font-semibold">Current Jobs to Do</h2>
            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
              <span class="text-white font-bold text-sm">{{ $jobs->count() }}</span>
            </div>
          </div>
        </div>

        <!-- Job Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          @forelse($jobs as $job)
          <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 p-4 relative border border-blue-100 overflow-hidden transform hover:-translate-y-1">
            <!-- Subtle background decoration -->
            <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-blue-50 to-transparent rounded-bl-full opacity-60"></div>
            
            <!-- Right-side circular icon -->
            <div class="absolute right-4 top-4 w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-500 rounded-full flex items-center justify-center shadow-lg hover:scale-105 transition-transform duration-200">
              <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
              </svg>
            </div>
            
            <div class="pr-0 sm:pr-16">
              <!-- Header -->
              <div class="mb-3">
                <h3 class="text-blue-900 font-bold mb-1 text-base tracking-wide leading-tight">{{ strtoupper($job->title ?? 'Job') }}</h3>
                <div class="w-12 h-0.5 bg-gradient-to-r from-blue-500 to-blue-300"></div>
              </div>
              
              <!-- Deadline info -->
              <div class="mb-3">
                <div class="flex items-center space-x-2">
                  <div class="w-1.5 h-1.5 rounded-full bg-blue-400"></div>
                  <span class="text-blue-700 font-medium text-xs">Deadline:</span>
                  <span class="text-gray-600 text-xs">{{ $job->service_durition ?? '-' }}</span>
                </div>
              </div>

              <!-- Earnings Box -->
              <div class="bg-gradient-to-r from-blue-50 to-blue-100 border border-blue-200 rounded-lg p-2 mb-3">
                <div class="text-center">
                  <div class="text-blue-800 font-bold text-sm">€ -</div>
                  <div class="text-blue-600 text-xs font-medium">Earnings for this job</div>
                </div>
              </div>
              
              <!-- Action Buttons -->
              <div class="space-y-2 mb-3">
                <a href="{{ route('view-job', ['id' => $job->id]) }}" 
                   class="block w-full border-2 border-blue-500 text-blue-600 rounded-lg px-4 py-2 text-xs font-semibold text-center hover:bg-blue-50 hover:border-blue-600 hover:text-blue-700 transition-all duration-200">
                  See the Job
                </a>
                
                @if($job->status === 'waiting_to_start')
                  <button class="w-full bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white text-xs font-semibold px-4 py-2 rounded-lg shadow-md hover:shadow-lg transition-all duration-200" onclick="startMission({{$job->id}})">
                    Start Mission
                  </button>
                @elseif($job->status === 'in_progress')
                  <button class="w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white text-xs font-semibold px-4 py-2 rounded-lg shadow-md hover:shadow-lg transition-all duration-200"
                    onclick="openDeliveryConfirmPopup({{$job->id}})">
                    Job Finished
                  </button>
                @elseif($job->status === 'disputed')
                  <button class="w-full bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-600 hover:to-yellow-700 text-white text-xs font-semibold px-4 py-2 rounded-lg shadow-md hover:shadow-lg transition-all duration-200"
                    onclick="resolveDispute({{$job->id}})">
                    Resolve Dispute
                  </button>
                @endif
              </div>

              <!-- Dispute Notice -->
              @if($job->dispute_count ?? 0)
              <div class="mt-2">
                <button
                  type="button"
                  class="bg-red-50 text-red-600 border border-red-300 text-xs px-3 py-1.5 rounded-lg font-semibold w-full focus:outline-none hover:bg-red-100 transition-colors duration-200"
                  onclick="openDisputePopup({{ $job->id }})"
                >
                  ⚠️ {{ $job->dispute_count }} Ongoing Dispute
                </button>
              </div>
              @endif
            </div>
          </div>
          @empty
          <div class="col-span-3 text-center py-16">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-blue-100 rounded-full mb-6">
              <svg class="w-10 h-10 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
              </svg>
            </div>
            <h3 class="text-blue-800 font-semibold text-lg mb-2">No Current Jobs</h3>
            <p class="text-blue-600">You have no current jobs to do at the moment.</p>
          </div>
          @endforelse
        </div>
      </div>

      <!-- My Quote Offers Section -->
      <div class="mb-8">
        <div class="flex items-center justify-center mb-8">
          <div class="flex items-center space-x-3">
            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
              <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/>
              </svg>
            </div>
            <h2 class="text-blue-700 text-xl md:text-2xl font-semibold">My Quote Offers</h2>
            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
              <span class="text-white font-bold text-sm">{{ $offers->count() }}</span>
            </div>
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          @forelse($offers as $offer)
          <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 p-4 relative border-l-4 border-l-green-400 overflow-hidden transform hover:-translate-y-1">
            <!-- Subtle background decoration -->
            <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-green-50 to-transparent rounded-bl-full opacity-60"></div>
            
            <!-- Right-side circular icon -->
            <div class="absolute right-4 top-4 w-12 h-12 bg-gradient-to-br from-green-400 to-green-500 rounded-full flex items-center justify-center shadow-lg hover:scale-105 transition-transform duration-200">
              <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
              </svg>
            </div>
            
            <div class="pr-0 sm:pr-16">
              <!-- Header -->
              <div class="mb-3">
                <h3 class="text-blue-900 font-bold mb-1 text-base tracking-wide leading-tight">{{ strtoupper($offer->mission->title ?? 'Job Offer') }}</h3>
                <div class="w-12 h-0.5 bg-gradient-to-r from-green-400 to-green-300"></div>
              </div>
              
              <!-- Deadline info -->
              <div class="mb-3">
                <div class="flex items-center space-x-2">
                  <div class="w-1.5 h-1.5 rounded-full bg-green-400"></div>
                  <span class="text-blue-700 font-medium text-xs">Deadline:</span>
                  <span class="text-gray-600 text-xs">{{ $offer->mission->service_durition ?? '-' }}</span>
                </div>
              </div>

              <!-- Status highlight -->
              <div class="bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-lg p-2 mb-3">
                <div class="text-center">
                  <div class="text-green-600 font-bold text-sm">Pending</div>
                  <div class="text-green-600 text-xs font-medium">Awaiting Response</div>
                </div>
              </div>
              
              <!-- Action Button -->
              <a href="{{ route('qoute-offer', ['id' => $offer->mission->id])}}" 
                 class="block w-full border-2 border-green-500 text-green-600 rounded-lg px-4 py-2 text-xs font-semibold text-center hover:bg-green-50 hover:border-green-600 hover:text-green-700 transition-all duration-200">
                View Job Offer
              </a>
            </div>
          </div>
          @empty
          <div class="col-span-3 text-center py-16">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-green-100 rounded-full mb-6">
              <svg class="w-10 h-10 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
              </svg>
            </div>
            <h3 class="text-blue-800 font-semibold text-lg mb-2">No Pending Offers</h3>
            <p class="text-blue-600">You have no pending quote offers at the moment.</p>
          </div>
          @endforelse
        </div>
      </div>

    </div>

    <!-- Dispute Popup Modal -->
    <div id="disputePopup" class="fixed inset-0 bg-black bg-opacity-40 z-50 flex items-center justify-center hidden">
      <div class="bg-white rounded-2xl shadow-xl max-w-lg w-full p-6 sm:p-8 relative mx-4">
        <button onclick="closeDisputePopup()" class="absolute top-3 right-4 text-gray-400 hover:text-gray-700 text-2xl">&times;</button>
        <div class="flex items-center gap-2 mb-4">
          <span class="bg-red-100 text-red-600 rounded-full p-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <circle cx="12" cy="12" r="10"/>
              <path d="M12 8v4m0 4h.01"/>
            </svg>
          </span>
          <span class="text-lg font-semibold text-red-700">You have received a dispute</span>
        </div>
        <div class="text-gray-700 mb-2 text-sm">The client has sent you the following message:</div>
        <div class="bg-blue-50 rounded-lg p-4 mb-4 text-sm text-gray-800 text-left">
          Hi "name service provider",<br><br>
          I hope you're doing well. I'm contacting you because I have some concerns about the current order:
          <ul class="list-disc pl-5 my-2">
            <li>No update has been shared since the project started.</li>
            <li>The expected delivery date was 3 days ago.</li>
            <li>I sent 2 messages without a reply.</li>
          </ul>
          I'd really appreciate it if you could either provide a clear update or cancel the order if you're unable to continue. Looking forward to your response. Thanks in advance!
        </div>
        <div class="flex items-center gap-2 mb-4">
          <span class="text-orange-500 text-base">⏰</span>
          <span class="text-sm text-orange-600 font-medium">Time remaining to respond: <span id="disputeTimer">23:51:43</span></span>
        </div>
        <div class="flex gap-4 mt-2">
          <button onclick="openDecisionPopup()" class="bg-white border border-red-400 text-red-600 px-6 py-2 rounded-lg font-semibold hover:bg-red-50 transition w-full">Refuse Request</button>
          <button onclick="openDecisionPopup()" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold transition w-full">Accept Request</button>
        </div>
      </div>
    </div>

    <!-- Decision Sent Popup Modal -->
    <div id="decisionPopup" class="fixed inset-0 bg-black bg-opacity-40 z-50 flex items-center justify-center hidden">
      <div class="bg-green-50 border border-green-200 rounded-2xl shadow-xl max-w-md w-full p-8 text-center relative mx-4">
        <button onclick="closeDecisionPopup()" class="absolute top-3 right-4 text-gray-400 hover:text-gray-700 text-2xl">&times;</button>
        <div class="flex flex-col items-center mb-4">
          <div class="w-14 h-14 bg-green-500 rounded-full flex items-center justify-center mb-4">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
              <circle cx="12" cy="12" r="10" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4"/>
            </svg>
          </div>
          <h2 class="text-xl font-bold text-green-700 mb-2">Your decision has been sent!</h2>
        </div>
        <p class="text-gray-700 mb-2">The service requester has just received your message.<br>
          We'll keep you in the loop for what happens next.</p>
        <p class="text-gray-600 mt-4">Thanks a bunch for your trust! 🙌</p>
      </div>
    </div>

    @include('dashboard.provider.jobs.delivery-confirm-popup')

    <script>
      function openDisputePopup(idx) {
        document.getElementById('disputePopup').classList.remove('hidden');
      }
      function closeDisputePopup() {
        document.getElementById('disputePopup').classList.add('hidden');
      }
      function openDecisionPopup() {
        closeDisputePopup();
        document.getElementById('decisionPopup').classList.remove('hidden');
      }
      function closeDecisionPopup() {
        document.getElementById('decisionPopup').classList.add('hidden');
      }
      function startMission(missionId) {
        if (!confirm('Are you sure you want to start this mission?')) {
          return;
        }

        fetch('/api/provider/jobs/start', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          body: JSON.stringify({
            mission_id: missionId
          })
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            alert('Mission started successfully!');
            location.reload();
          } else {
            alert(data.message || 'Failed to start the mission. Please try again.');
          }
        })
        .catch(error => {
          console.error('Error:', error);
          alert('An unexpected error occurred.');
        });
      }

      function resolveDispute(missionId) {
        if (!confirm('Are you sure you want to resolve this mission?')) {
          return;
        }

        fetch('/api/provider/jobs/resolve', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          body: JSON.stringify({
            mission_id: missionId
          })
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            alert('Dispute Resolved successfully!');
            location.reload();
          } else {
            alert(data.message || 'Failed to resolve the mission. Please try again.');
          }
        })
        .catch(error => {
          console.error('Error:', error);
          alert('An unexpected error occurred.');
        });
      }
    </script>

@endsection