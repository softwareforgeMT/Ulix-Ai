@extends('dashboard.layouts.master')

@section('title', 'Private Messaging')

@section('content')
@php
    $activeTab = request('tab') === 'jobs' ? 'jobs' : 'services';
@endphp

<div class="flex flex-col lg:flex-row min-h-screen">
    <div class="flex-1 p-4 sm:p-6 lg:pl-10 space-y-6">
      <!-- Tab Buttons -->
      <div class="flex flex-wrap justify-center gap-4">
        <a id="tabServiceRequest" href="?tab=services"
           class="{{ $activeTab === 'services' 
                    ? 'bg-blue-600 text-white px-6 py-2 rounded-full text-sm font-medium shadow hover:bg-blue-700 transition' 
                    : 'border-2 border-blue-600 text-blue-600 px-6 py-2 rounded-full text-sm font-medium hover:bg-blue-50 transition' }}">
          Messaging my service request
        </a>
        <a id="tabJobList" href="?tab=jobs"
           class="{{ $activeTab === 'jobs' 
                    ? 'bg-blue-600 text-white px-6 py-2 rounded-full text-sm font-medium shadow hover:bg-blue-700 transition' 
                    : 'border-2 border-blue-600 text-blue-600 px-6 py-2 rounded-full text-sm font-medium hover:bg-blue-50 transition' }}">
          Messaging my job list
        </a>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Missions List (Dynamic) -->
        <div id="mission-list" class="space-y-4">
          @foreach($missions as $mission)
            @php
                $conv = $conversations->firstWhere('mission_id', $mission->id);
                $otherParty = null;
                if ($user->user_role === 'service_requester') {
                    $otherParty = $mission->selected_provider ?? null;
                } else {
                    $otherParty = $mission->requester ?? null;
                }
            @endphp
            <div class="mission-card border rounded-xl p-4 bg-white flex items-center gap-4 cursor-pointer hover:shadow-lg transition"
                 data-mission-id="{{ $mission->id }}"
                 data-conversation-id="{{ $conv ? $conv->id : '' }}"
                 data-other-name="{{ $otherParty ? ($otherParty->name ?? ($otherParty->first_name . ' ' . $otherParty->last_name)) : '' }}"
                 data-other-phone="{{ $otherParty->phone_number ?? '' }}">
              <div class="flex-1 space-y-1">
                <h3 class="text-blue-900 font-bold text-sm">{{ $mission->title }}</h3>
                <p class="text-gray-700 text-sm">Duration: {{ $mission->service_durition ?? '-' }}</p>
                <p class="text-gray-700 text-sm">{{ $mission->location_country ?? '-' }}</p>
                <p class="text-gray-700 text-sm">{{ $mission->location_city ?? '-' }}</p>
                <p class="text-gray-700 text-sm">{{ $mission->language ?? '-' }}</p>
                <p class="text-gray-700 text-sm">Status: {{ $mission->status }}</p>
                <a href="{{ route('qoute-offer', ['id' => $mission->id])}}" class="inline-block bg-blue-600 text-white text-xs font-semibold rounded-full px-4 py-2 mt-2 hover:bg-blue-700 transition">
                  See My Job
                </a>
              </div>
              <div class="flex-shrink-0">
                <div class="w-16 h-16 bg-blue-400 rounded-full flex items-center justify-center">
                  <i class="fa fa-comments text-white"></i>
                </div>
              </div>
            </div>
          @endforeach
        </div>

        <!-- Chat Box -->
        <div id="chatBox" class="lg:col-span-2 bg-white rounded-xl border border-blue-200 p-4 flex-col justify-between min-h-[500px] hidden w-full"
             style="padding-bottom:1.5rem;">
          <div class="border-b pb-2 mb-4 text-sm">
            <div class="flex justify-between items-center">
              <p id="chatUserName" class="font-semibold text-gray-800">Select a conversation</p>
              <div class="flex items-center gap-2">
                <span id="chatPhone" class="text-xs text-gray-500"></span>
                <button id="closeChatBtn" class="text-gray-400 hover:text-gray-600 ml-2">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                  </svg>
                </button>
              </div>
            </div>
            <p id="chatStatus" class="text-gray-400 text-xs"></p>
          </div>
          <div class="flex-1 space-y-4 overflow-y-auto text-sm max-h-[300px]">
            <div id="chatMessages" class="space-y-4">
              <div class="text-center text-gray-500 py-8">
                <p>Click on a conversation to start chatting</p>
              </div>
            </div>
          </div>
          <form id="chatForm" class="pt-2 relative" autocomplete="off">
            <input type="text" id="chatInput" placeholder="Send a message here" class="w-full px-4 py-3 border border-blue-300 rounded-full focus:outline-none pr-14" style="padding-right:3.5rem; height:48px;" autocomplete="off" />
            <button type="submit" id="sendMessageBtn"
                class="absolute right-3 top-1/2 -translate-y-1/2 bg-blue-500 hover:bg-blue-600 text-white rounded-full w-10 h-10 flex items-center justify-center shadow transition"
                style="top: calc(30% + 16px); transform: translateY(-50%); padding:0;">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 12h14M12 5l7 7-7 7" />
                </svg>
            </button>
          </form>
        </div>
      </div>
    </div>
</div>
<style>
@media (max-width: 1024px) {
  #chatBox {
    padding-bottom: 4.5rem !important;
  }
}
</style>

@endsection
@section('scripts')

<script type="module">
  let currentConversationId = null;
  let userId = {{ $user->id }};
  let chatEcho = null;

  // Use the already configured Echo instance from bootstrap.js
  // No need to create a new one!

  function renderMessages(messages) {
    const chatMessages = document.getElementById('chatMessages');
    chatMessages.innerHTML = '';
    messages.forEach(msg => {
      const div = document.createElement('div');
      div.className = msg.sender_id === userId ? 'text-right' : 'text-left';
      div.innerHTML = `<div class="inline-block bg-${msg.sender_id === userId ? 'blue-600' : 'gray-100'} text-${msg.sender_id === userId ? 'white' : 'gray-800'} px-4 py-2 rounded-xl text-sm max-w-xs">${msg.body}</div>`;
      chatMessages.appendChild(div);
    });
    chatMessages.scrollTop = chatMessages.scrollHeight;
  }

  function appendMessage(msg) {
    const chatMessages = document.getElementById('chatMessages');
    const div = document.createElement('div');
    div.className = msg.sender_id === userId ? 'text-right' : 'text-left';
    div.innerHTML = `<div class="inline-block bg-${msg.sender_id === userId ? 'blue-600' : 'gray-100'} text-${msg.sender_id === userId ? 'white' : 'gray-800'} px-4 py-2 rounded-xl text-sm max-w-xs">${msg.body}</div>`;
    chatMessages.appendChild(div);
    chatMessages.scrollTop = chatMessages.scrollHeight;
  }

  function openChat(conversationId, userName, phone, status, missionId) {
    currentConversationId = conversationId;
    document.getElementById('chatBox').classList.remove('hidden');
    document.getElementById('chatUserName').textContent = userName;
    document.getElementById('chatPhone').textContent = phone;
    document.getElementById('chatStatus').textContent = status ? `${userName} / ${status}` : '';

    // Fetch messages
    fetch(`/conversations/${conversationId}/messages`)
      .then(res => res.json())
      .then(renderMessages);

    // Online status
    fetch(`/conversations/${conversationId}/status`)
      .then(res => res.json())
      .then(data => {
        document.getElementById('chatStatus').textContent = data.online ? 'Online' : 'Offline';
      });

    // Unsubscribe from previous channel if exists
    if (chatEcho) {
      chatEcho.leave();
      chatEcho = null;
    }
    
    // Subscribe to private channel using the global Echo instance
    chatEcho = window.Echo.channel('conversation.' + conversationId)
      .listen('MessageSent', (e) => {
        console.log('Message received:', e);
        if (e.message && e.message.conversation_id == currentConversationId) {
          appendMessage(e.message);
        }
      });

      
  }

  document.querySelectorAll('.mission-card').forEach(card => {
    card.addEventListener('click', function() {
      let conversationId = this.dataset.conversationId;
      let missionId = this.dataset.missionId;
      let userName = this.dataset.otherName;
      let phone = this.dataset.otherPhone;
      
      // If conversation doesn't exist, start it
      if (!conversationId) {
        fetch('/conversations/start', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          },
          body: JSON.stringify({
            mission_id: missionId,
            provider_id: null
          })
        })
        .then(res => res.json())
        .then(conv => {
          conversationId = conv.id;
          this.dataset.conversationId = conversationId;
          openChat(conversationId, userName, phone, '', missionId);
        });
      } else {
        openChat(conversationId, userName, phone, '', missionId);
      }
    });
  });

  document.getElementById('closeChatBtn').addEventListener('click', function() {
    document.getElementById('chatBox').classList.add('hidden');
    if (chatEcho) {
      chatEcho.leave();
      chatEcho = null;
    }
    currentConversationId = null;
  });

  document.getElementById('chatForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const input = document.getElementById('chatInput');
    const body = input.value.trim();
    if (!body || !currentConversationId) return;
    
    fetch(`/conversations/${currentConversationId}/message`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      },
      body: JSON.stringify({ body })
    })
    .then(res => res.json())
    .then(msg => {
      input.value = '';
      appendMessage(msg);
    })
    .catch(error => {
      console.error('Error sending message:', error);
    });
  });
</script>
@endsection
