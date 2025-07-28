@extends('dashboard.layouts.master')

@section('title', 'Private Messaging')

@section('content')
@php
    $activeTab = request('tab') === 'jobs' ? 'jobs' : 'services';
@endphp

   <style>
        .chat-message {
            max-width: 80%;
        }
        .sent {
            margin-left: auto;
            background-color: #3b82f6;
            color: white;
        }
        .received {
            margin-right: auto;
            background-color: #f3f4f6;
            color: #374151;
        }
        .file-preview {
            max-width: 200px;
            max-height: 200px;
            border-radius: 8px;
        }
        .pdf-preview {
            width: 200px;
            height: 250px;
            border: 2px dashed #d1d5db;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            background-color: #f9fafb;
        }
        .attachment-preview {
            display: none;
            padding: 8px;
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            margin-bottom: 8px;
        }
        .file-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 4px;
            background-color: white;
            border-radius: 6px;
            border: 1px solid #e5e7eb;
        }
    </style>

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
                <p class="text-gray-700 text-sm">Status: {{ 
                  ucfirst(
                    $mission->status === 'in_progress' ? 'In Progress' : 
                    ($mission->status === 'completed' ? 'Completed' : 
                    ($mission->status === 'disputed' ? 'Disputed' : 
                    ($mission->status === 'waiting_to_start' ? 'Waiting for provider to Start' : 'N/A' )))
                  )
                }}
              </p>
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
            <div id="chatBox" class="lg:col-span-2 bg-white rounded-xl border border-blue-200 p-4 flex flex-col justify-between min-h-[500px] w-full">
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

                <div class="flex-1 space-y-4 overflow-y-auto text-sm max-h-[300px] mb-4">
                    <div id="chatMessages" class="space-y-4">
                        <div class="text-center text-gray-500 py-8">
                            <p>Click on a conversation to start chatting</p>
                        </div>
                    </div>
                </div>

                <!-- File Preview Area -->
                <div id="attachmentPreview" class="attachment-preview">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm font-medium text-gray-700">Attachments</span>
                        <button id="clearAttachments" class="text-gray-400 hover:text-gray-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div id="previewContainer" class="flex flex-wrap gap-2"></div>
                </div>

                <!-- Chat Form -->
             <form id="chatForm" class="relative" autocomplete="off">
  <input type="hidden" id="conversationId" name="conversation_id" value=""> <!-- Required -->

  <div class="flex items-end gap-2">
    <!-- File Upload Button -->
    <div class="relative">
      <input type="file" id="fileInput" name="file" accept="image/*,.pdf" class="hidden">
      <button type="button" id="attachBtn" class="bg-gray-100 hover:bg-gray-200 text-gray-600 rounded-full w-10 h-10 flex items-center justify-center transition">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
        </svg>
      </button>
    </div>

    <!-- Message Input -->
    <div class="flex-1 relative">
      <input type="text" id="chatInput" placeholder="Send a message here"
        class="w-full px-4 py-3 border border-blue-300 rounded-full focus:outline-none focus:border-blue-500 pr-14"
        autocomplete="off" />
      <button type="submit" id="sendMessageBtn"
        class="absolute right-3 top-1/2 -translate-y-1/2 bg-blue-500 hover:bg-blue-600 text-white rounded-full w-10 h-10 flex items-center justify-center shadow transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 12h14M12 5l7 7-7 7" />
        </svg>
      </button>
    </div>
  </div>
</form>
            </div>
        </div>
    </div>

 <script>
        let selectedFiles = [];
        let currentConversation = null;

        // DOM Elements
        const conversationItems = document.querySelectorAll('.conversation-item');
        const chatBox = document.getElementById('chatBox');
        const chatUserName = document.getElementById('chatUserName');
        const chatPhone = document.getElementById('chatPhone');
        const chatStatus = document.getElementById('chatStatus');
        const chatMessages = document.getElementById('chatMessages');
        const chatForm = document.getElementById('chatForm');
        const chatInput = document.getElementById('chatInput');
        const fileInput = document.getElementById('fileInput');
        const attachBtn = document.getElementById('attachBtn');
        const attachmentPreview = document.getElementById('attachmentPreview');
        const previewContainer = document.getElementById('previewContainer');
        const clearAttachments = document.getElementById('clearAttachments');
        const closeChatBtn = document.getElementById('closeChatBtn');

        // Conversation selection
        conversationItems.forEach(item => {
            item.addEventListener('click', () => {
                const name = item.dataset.name;
                const phone = item.dataset.phone;
                const status = item.dataset.status;
                
                currentConversation = { name, phone, status };
                
                chatUserName.textContent = name;
                chatPhone.textContent = phone;
                chatStatus.textContent = status;
                
                // Load sample messages
                loadSampleMessages();
                
                // Show chat box
                chatBox.classList.remove('hidden');
            });
        });

        // Close chat
        closeChatBtn.addEventListener('click', () => {
            chatBox.classList.add('hidden');
            currentConversation = null;
            clearAttachments.click();
        });

        // File upload handling
        attachBtn.addEventListener('click', () => {
            fileInput.click();
        });

        fileInput.addEventListener('change', (e) => {
            const files = Array.from(e.target.files);
            files.forEach(file => {
                if (!selectedFiles.find(f => f.name === file.name && f.size === file.size)) {
                    selectedFiles.push(file);
                }
            });
            updatePreview();
        });

        // Clear attachments
        clearAttachments.addEventListener('click', () => {
            selectedFiles = [];
            fileInput.value = '';
            updatePreview();
        });

        // Update preview
        function updatePreview() {
            if (selectedFiles.length === 0) {
                attachmentPreview.style.display = 'none';
                return;
            }

            attachmentPreview.style.display = 'block';
            previewContainer.innerHTML = '';

            selectedFiles.forEach((file, index) => {
                const fileDiv = document.createElement('div');
                fileDiv.className = 'file-item relative';

                if (file.type.startsWith('image/')) {
                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    img.className = 'file-preview object-cover';
                    img.onload = () => URL.revokeObjectURL(img.src);
                    
                    fileDiv.innerHTML = `
                        <div class="relative">
                            <img src="${img.src}" class="file-preview object-cover" />
                            <button onclick="removeFile(${index})" class="absolute -top-1 -right-1 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs">×</button>
                        </div>
                        <span class="text-xs text-gray-600 truncate max-w-[120px]">${file.name}</span>
                    `;
                } else if (file.type === 'application/pdf') {
                    fileDiv.innerHTML = `
                        <div class="pdf-preview relative">
                            <svg class="w-12 h-12 text-red-500 mb-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
                            </svg>
                            <span class="text-xs text-gray-600 text-center">PDF</span>
                            <button onclick="removeFile(${index})" class="absolute -top-1 -right-1 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs">×</button>
                        </div>
                        <span class="text-xs text-gray-600 truncate max-w-[120px]">${file.name}</span>
                    `;
                }

                previewContainer.appendChild(fileDiv);
            });
        }

        // Remove file
        window.removeFile = function(index) {
            selectedFiles.splice(index, 1);
            updatePreview();
        };

        // Send message
        chatForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            if (!currentConversation) return;
            
            const message = chatInput.value.trim();
            if (!message && selectedFiles.length === 0) return;

            // Create message element
            const messageDiv = document.createElement('div');
            messageDiv.className = 'chat-message sent p-3 rounded-lg';
            
            let messageContent = '';
            if (message) {
                messageContent += `<p class="mb-2">${message}</p>`;
            }
            
            if (selectedFiles.length > 0) {
                messageContent += '<div class="flex flex-wrap gap-2">';
                selectedFiles.forEach(file => {
                    if (file.type.startsWith('image/')) {
                        const imgUrl = URL.createObjectURL(file);
                        messageContent += `<img src="${imgUrl}" class="file-preview object-cover" />`;
                    } else if (file.type === 'application/pdf') {
                        messageContent += `
                            <div class="pdf-preview bg-white/20">
                                <svg class="w-8 h-8 text-white mb-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
                                </svg>
                                <span class="text-xs">PDF</span>
                            </div>
                        `;
                    }
                });
                messageContent += '</div>';
            }
            
            messageDiv.innerHTML = messageContent;

            // Add to chat
            if (chatMessages.children[0]?.textContent?.includes('Click on a conversation')) {
                chatMessages.innerHTML = '';
            }
            chatMessages.appendChild(messageDiv);

            // Scroll to bottom
            chatMessages.scrollTop = chatMessages.scrollHeight;

            // Clear form
            chatInput.value = '';
            selectedFiles = [];
            updatePreview();

            // Simulate response after 1 second
            setTimeout(() => {
                const responseDiv = document.createElement('div');
                responseDiv.className = 'chat-message received p-3 rounded-lg';
                responseDiv.innerHTML = '<p>Thanks for your message!</p>';
                chatMessages.appendChild(responseDiv);
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }, 1000);
        });

        // Load sample messages
        function loadSampleMessages() {
            chatMessages.innerHTML = `
                <div class="chat-message received p-3 rounded-lg">
                    <p>Hello! How can I help you today?</p>
                </div>
                <div class="chat-message sent p-3 rounded-lg">
                    <p>Hi there! I need some assistance.</p>
                </div>
            `;
        }
    </script>
<style>
@media (max-width: 1024px) {
  #chatBox {
    padding-bottom: 4.5rem !important;
  }
}
</style>

@endsection

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
    chatEcho = Echo.channel('conversation.' + conversationId)
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







