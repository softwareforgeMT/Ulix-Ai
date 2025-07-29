@extends('dashboard.layouts.master')

@section('title', 'Private Messaging')

@section('content')
@php
    $activeTab = request('tab') === 'jobs' ? 'jobs' : 'services';
@endphp

<style>
    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }
    .message-animation {
        animation: slideIn 0.3s ease-out;
    }
    @keyframes slideIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .mission-card {
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }
    .mission-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }
    .mission-card.active {
        border-color: #3b82f6;
        box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.2);
    }
    .online-status {
        animation: pulse 2s infinite;
    }
    .file-preview {
        max-width: 80px;
        max-height: 80px;
        object-fit: cover;
    }
    .tab-btn {
        background:  #3b82f6;
        color: white;
        transition: all 0.3s ease;
    }
    .tab-btn:not(.active) {
        background: #f8fafc;
        color: #64748b;
        border: 2px solid #e2e8f0;
    }
    .tab-btn:not(.active):hover {
        background: #f1f5f9;
        border-color: #cbd5e1;
    }
</style>

<div class="min-h-screen p-4">
    <div class="mx-auto">
        <!-- Header Section -->
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl p-6 mb-6 border border-white/20">
            <h1 class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-6">
                Private Messaging
            </h1>
            
            <!-- Tab Navigation -->
            <div class="flex gap-4">
                <a href="?tab=services" 
                   class="tab-btn {{ $activeTab === 'services' ? 'active' : '' }} px-6 py-3 rounded-xl font-semibold flex items-center gap-2 shadow-lg">
                    <i class="fas fa-tools"></i>
                    <span>Service Requests</span>
                </a>
                <a href="?tab=jobs" 
                   class="tab-btn {{ $activeTab === 'jobs' ? 'active' : '' }} px-6 py-3 rounded-xl font-semibold flex items-center gap-2 shadow-lg">
                    <i class="fas fa-briefcase"></i>
                    <span>Job Listings</span>
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 h-[calc(100vh-200px)]">
            <!-- Mission List Sidebar -->
            <div class="lg:col-span-1 bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl border border-white/20 p-4 flex flex-col">
                <div class="flex items-center justify-between mb-4 pb-4 border-b border-gray-200">
                    <h2 class="text-lg font-bold text-gray-800">Conversations</h2>
                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">
                        {{ count($missions) }}
                    </span>
                </div>
                
                <div class="flex-1 space-y-3 overflow-y-auto scrollbar-hide">
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
                        <div class="mission-card bg-white rounded-xl p-4 cursor-pointer group"
                             data-mission-id="{{ $mission->id }}"
                             data-conversation-id="{{ $conv ? $conv->id : '' }}"
                             data-other-name="{{ $otherParty ? ($otherParty->name ?? ($otherParty->first_name . ' ' . $otherParty->last_name)) : 'Unknown' }}"
                             data-other-phone="{{ $otherParty->phone_number ?? '' }}">
                            
                            <div class="flex items-start gap-3">
                                <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-user text-white text-sm"></i>
                                </div>
                                
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-semibold text-gray-900 text-sm truncate group-hover:text-blue-600 transition-colors">
                                        {{ $mission->title }}
                                    </h3>
                                    <p class="text-xs text-gray-600 mb-1">
                                        {{ $otherParty ? ($otherParty->name ?? ($otherParty->first_name . ' ' . $otherParty->last_name)) : 'Unknown' }}
                                    </p>
                                    <div class="flex items-center gap-2 mb-2">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium
                                            {{ $mission->status === 'in_progress' ? 'bg-green-100 text-green-800' : 
                                               ($mission->status === 'completed' ? 'bg-blue-100 text-blue-800' : 
                                               ($mission->status === 'disputed' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800')) }}">
                                            {{ ucfirst(str_replace('_', ' ', $mission->status)) }}
                                        </span>
                                    </div>
                                    <p class="text-xs text-gray-500">{{ $mission->location_city ?? 'Remote' }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @if(count($missions) === 0)
                        <div class="text-center py-8 text-gray-500">
                            <i class="fas fa-inbox text-3xl mb-3 text-gray-300"></i>
                            <p class="text-sm">No conversations yet</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Chat Interface -->
            <div class="lg:col-span-3 bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl border border-white/20 flex flex-col">
                <!-- Chat Header -->
                <div id="chatHeader" class="p-6 border-b border-gray-200 hidden">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-white"></i>
                            </div>
                            <div>
                                <h3 id="chatUserName" class="font-bold text-gray-900 text-lg"></h3>
                                <div class="flex items-center gap-2">
                                    <span id="chatPhone" class="text-sm text-gray-600"></span>
                                    <!-- <div class="flex items-center gap-1">
                                        <div id="onlineStatus" class="w-2 h-2 bg-gray-400 rounded-full"></div>
                                        <span id="statusText" class="text-xs text-gray-500">Offline</span>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <button id="closeChatBtn" class="p-2 hover:bg-gray-100 rounded-lg transition-colors text-gray-500 hover:text-gray-700">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>
                </div>

                <!-- Messages Container -->
                <div class="flex-1 flex flex-col min-h-0">
                    <!-- Empty State -->
                    <div id="emptyState" class="flex-1 flex items-center justify-center p-8">
                        <div class="text-center">
                            <div class="w-20 h-20 bg-gradient-to-br from-blue-100 to-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-comments text-3xl text-blue-500"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">Select a Conversation</h3>
                            <p class="text-gray-600">Choose a mission from the sidebar to start messaging</p>
                        </div>
                    </div>

                    <!-- Messages Area -->
                    <div id="messagesContainer" class="flex-1 p-6 overflow-y-auto scrollbar-hide hidden">
                        <div id="chatMessages" class="space-y-4 max-h-[400px] overflow-y-auto"></div>
                        <div id="typingIndicator" class="hidden">
                            <div class="flex items-center gap-2 text-gray-500 text-sm">
                                <div class="flex gap-1">
                                    <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce"></div>
                                    <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                                    <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                                </div>
                                <span>Typing...</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- File Preview Area -->
                <div id="attachmentPreview" class="px-6 py-3 border-t border-gray-100 hidden">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                            <i class="fas fa-paperclip text-blue-500"></i>
                            Attachments
                        </span>
                        <button id="clearAttachments" class="text-gray-400 hover:text-red-500 transition-colors">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div id="previewContainer" class="flex gap-3 overflow-x-auto scrollbar-hide pb-2"></div>
                </div>

                <!-- Message Input -->
                <div id="messageInputArea" class="p-6 border-t border-gray-200 hidden">
                    <form id="chatForm" class="flex items-end gap-3">
                        <input type="hidden" id="conversationId">
                        
                        <!-- File Upload Button -->
                        <div class="flex flex-col gap-2">
                            <input type="file" id="fileInput" multiple accept="image/*,.pdf,.doc,.docx" class="hidden">
                            <button type="button" id="attachBtn" class="p-3 bg-gray-100 hover:bg-blue-100 rounded-xl transition-colors group">
                                <i class="fas fa-paperclip text-gray-600 group-hover:text-blue-600"></i>
                            </button>
                        </div>

                        <!-- Message Input Field -->
                        <div class="flex-1 relative">
                            <input type="text" id="chatInput" placeholder="Type your message..." 
                                   class="w-full px-4 py-3 pr-12 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">
                            <button type="submit" id="sendBtn" class="absolute right-2 top-1/2 -translate-y-1/2 p-2 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white rounded-lg transition-all transform hover:scale-105">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Application State
    let currentConversationId = null;
    let selectedFiles = [];
    let userId = {{ $user->id }};
    let conversationChannel = null; // Store the current channel subscription
    let lastMessageTimestamp = null;

    // DOM Elements
    const elements = {
        chatHeader: document.getElementById('chatHeader'),
        chatUserName: document.getElementById('chatUserName'),
        chatPhone: document.getElementById('chatPhone'),
        onlineStatus: document.getElementById('onlineStatus'),
        statusText: document.getElementById('statusText'),
        emptyState: document.getElementById('emptyState'),
        messagesContainer: document.getElementById('messagesContainer'),
        chatMessages: document.getElementById('chatMessages'),
        messageInputArea: document.getElementById('messageInputArea'),
        chatForm: document.getElementById('chatForm'),
        chatInput: document.getElementById('chatInput'),
        fileInput: document.getElementById('fileInput'),
        attachBtn: document.getElementById('attachBtn'),
        attachmentPreview: document.getElementById('attachmentPreview'),
        previewContainer: document.getElementById('previewContainer'),
        clearAttachments: document.getElementById('clearAttachments'),
        closeChatBtn: document.getElementById('closeChatBtn'),
        conversationId: document.getElementById('conversationId')
    };

    // Utility Functions
    const utils = {
        formatTime(timestamp) {
            return new Date(timestamp).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
        },

        scrollToBottom() {
            elements.messagesContainer.scrollTop = elements.messagesContainer.scrollHeight;
        },

        showNotification(message, type = 'info') {
            // Simple notification - you can enhance this
            console.log(`${type.toUpperCase()}: ${message}`);
        }
    };

    // Message Management
    const messageManager = {
        renderMessage(message) {
            const messageDiv = document.createElement('div');
            messageDiv.className = `message-animation ${message.sender_id === userId ? 'flex justify-end' : 'flex justify-start'}`;
            messageDiv.setAttribute('data-message-id', message.id);
            
            const isOwn = message.sender_id === userId;
            const bubbleClass = isOwn 
                ? 'bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-tl-2xl rounded-tr-2xl rounded-bl-2xl'
                : 'bg-gray-100 text-gray-800 rounded-tl-2xl rounded-tr-2xl rounded-br-2xl';

            messageDiv.innerHTML = `
                <div class="max-w-xs lg:max-md px-4 py-3 ${bubbleClass} shadow-lg">
                    <p class="text-sm">${this.escapeHtml(message.body || message.message)}</p>
                    ${message.attachments ? this.renderAttachments(message.attachments) : ''}
                    <div class="text-xs mt-1 ${isOwn ? 'text-blue-100' : 'text-gray-500'}">
                        ${utils.formatTime(message.created_at)}
                    </div>
                </div>
            `;

            return messageDiv;
        },

        renderAttachments(attachments) {
            if (!attachments || attachments.length === 0) return '';
            
            return `
                <div class="mt-2 space-y-1">
                    ${attachments.map(att => `
                        <div class="bg-white/20 rounded p-2 text-xs">
                            <i class="fas fa-paperclip mr-1"></i>
                            ${att.filename || 'Attachment'}
                        </div>
                    `).join('')}
                </div>
            `;
        },

        escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        },

        addMessage(message) {
            // Check if message already exists to prevent duplicates
            const existingMessage = document.querySelector(`[data-message-id="${message.id}"]`);
            if (existingMessage) {
                return; // Message already exists, don't add again
            }

            const messageElement = this.renderMessage(message);
            elements.chatMessages.appendChild(messageElement);
            utils.scrollToBottom();
            
            // Update last message timestamp
            lastMessageTimestamp = message.created_at;
        },

        loadMessages(messages) {
            elements.chatMessages.innerHTML = '';
            lastMessageTimestamp = null;
            
            messages.forEach(message => {
                const messageElement = this.renderMessage(message);
                elements.chatMessages.appendChild(messageElement);
            });
            
            if (messages.length > 0) {
                lastMessageTimestamp = messages[messages.length - 1].created_at;
            }
            
            utils.scrollToBottom();
        },

        // Handle new message from broadcasted channel
        handleBroadcastMessage(data) {
            const message = data.message;
            if (message.conversation_id = currentConversationId) {
              this.addMessage(message);
            }
        }
    };

    // Broadcasting Management
    const broadcastManager = {
        subscribeToConversation(conversationId) {
            // Unsubscribe from previous channel if exists
            this.unsubscribeFromConversation();
            
            if (!window.Echo) {
                console.error('Laravel Echo is not initialized');
                return;
            }
            
            // Subscribe to the conversation channel
            conversationChannel = window.Echo.channel(`conversation.${conversationId}`)
                .listen('MessageSent', (data) => {
                    messageManager.handleBroadcastMessage(data);
                })
                .error((error) => {
                    console.error('Channel subscription error:', error);
                });
        },
        
        unsubscribeFromConversation() {
            if (conversationChannel) {
                window.Echo.leave(`conversation.${currentConversationId}`);
                conversationChannel = null;
                console.log('Unsubscribed from conversation channel');
            }
        }
    };

    // Chat Management - Updated to use broadcasting instead of polling
    const chatManager = {
        openChat(conversationId, userName, phone, missionId) {
            currentConversationId = conversationId;
            
            // Update UI
            elements.emptyState.classList.add('hidden');
            elements.chatHeader.classList.remove('hidden');
            elements.messagesContainer.classList.remove('hidden');
            elements.messageInputArea.classList.remove('hidden');
            
            elements.chatUserName.textContent = userName;
            elements.chatPhone.textContent = phone;
            elements.conversationId.value = conversationId;

            // Update active mission card
            document.querySelectorAll('.mission-card').forEach(card => {
                card.classList.remove('active');
            });
            document.querySelector(`[data-conversation-id="${conversationId}"]`)?.classList.add('active');

            // Load initial messages
            this.loadMessages(conversationId);
            
            // Subscribe to conversation broadcasts
            broadcastManager.subscribeToConversation(conversationId);
        },

        closeChat() {
            // Unsubscribe from broadcasts
            broadcastManager.unsubscribeFromConversation();
            
            currentConversationId = null;
            lastMessageTimestamp = null;
            
            elements.chatHeader.classList.add('hidden');
            elements.messagesContainer.classList.add('hidden');
            elements.messageInputArea.classList.add('hidden');
            elements.emptyState.classList.remove('hidden');
            
            document.querySelectorAll('.mission-card').forEach(card => {
                card.classList.remove('active');
            });
            
            fileManager.clearAttachments();
        },

        async loadMessages(conversationId) {
            try {
                const response = await fetch(`/conversations/${conversationId}/messages`);
                if (!response.ok) throw new Error('Failed to load messages');
                
                const messages = await response.json();
                messageManager.loadMessages(messages);
            } catch (error) {
                console.error('Error loading messages:', error);
                utils.showNotification('Failed to load messages', 'error');
            }
        },

        async sendMessage() {
            const messageText = elements.chatInput.value.trim();
            if (!messageText && selectedFiles.length === 0) return;
            if (!currentConversationId) return;

            try {
                const formData = new FormData();
                formData.append('body', messageText);
                formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
                
                selectedFiles.forEach((file, index) => {
                    formData.append(`files[${index}]`, file);
                });

                const response = await fetch(`/conversations/${currentConversationId}/message`, {
                    method: 'POST',
                    body: formData
                });

                if (!response.ok) {
                    const errorData = await response.json();
                    throw new Error(errorData.message || 'Failed to send message');
                }

                // Don't manually add the message here - let the broadcast handle it
                // This ensures consistency and prevents duplicates
                elements.chatInput.value = '';
                fileManager.clearAttachments();
            } catch (error) {
                console.error('Error sending message:', error);
                utils.showNotification('Failed to send message', 'error');
            }
        },

        async startConversation(missionId) {
            try {
                const response = await fetch('/conversations/start', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        mission_id: missionId
                    })
                });

                if (!response.ok) throw new Error('Failed to start conversation');
                
                const conversation = await response.json();
                return conversation.id;
            } catch (error) {
                console.error('Error starting conversation:', error);
                utils.showNotification('Failed to start conversation', 'error');
                return null;
            }
        }
    };

    // File Manager (assuming this exists - add if missing)
    const fileManager = {
        handleFileSelect(files) {
            selectedFiles = Array.from(files);
            this.updatePreview();
        },

        updatePreview() {
            if (selectedFiles.length === 0) {
                elements.attachmentPreview.classList.add('hidden');
                return;
            }

            elements.attachmentPreview.classList.remove('hidden');
            elements.previewContainer.innerHTML = selectedFiles.map((file, index) => `
                <div class="flex items-center justify-between bg-gray-100 p-2 rounded">
                    <span class="text-sm truncate">${file.name}</span>
                    <button type="button" onclick="removeFile(${index})" class="text-red-500 hover:text-red-700">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            `).join('');
        },

        clearAttachments() {
            selectedFiles = [];
            elements.fileInput.value = '';
            elements.attachmentPreview.classList.add('hidden');
        }
    };

    // Event Listeners
    function initializeEventListeners() {
        // Mission card clicks
        document.querySelectorAll('.mission-card').forEach(card => {
            card.addEventListener('click', async function() {
                let conversationId = this.dataset.conversationId;
                const missionId = this.dataset.missionId;
                const userName = this.dataset.otherName;
                const phone = this.dataset.otherPhone;
                
                if (!conversationId) {
                    conversationId = await chatManager.startConversation(missionId);
                    if (conversationId) {
                        this.dataset.conversationId = conversationId;
                    } else {
                        return;
                    }
                }
                
                chatManager.openChat(conversationId, userName, phone, missionId);
            });
        });

        // Close chat
        elements.closeChatBtn.addEventListener('click', () => {
            chatManager.closeChat();
        });

        // File upload
        elements.attachBtn.addEventListener('click', () => {
            elements.fileInput.click();
        });

        elements.fileInput.addEventListener('change', (e) => {
            fileManager.handleFileSelect(e.target.files);
        });

        // Clear attachments
        elements.clearAttachments.addEventListener('click', () => {
            fileManager.clearAttachments();
        });

        // Send message
        elements.chatForm.addEventListener('submit', (e) => {
            e.preventDefault();
            chatManager.sendMessage();
        });

        // Enter key to send
        elements.chatInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                chatManager.sendMessage();
            }
        });
    }

    // Global function for removing files (called from HTML)
    window.removeFile = function(index) {
        selectedFiles.splice(index, 1);
        fileManager.updatePreview();
    };

    // Initialize Echo connection status monitoring
    function initializeEchoMonitoring() {
        if (window.Echo) {
            window.Echo.connector.pusher.connection.bind('connected', () => {
                console.log('WebSocket connected');
                utils.showNotification('Connected to real-time messaging', 'success');
            });

            window.Echo.connector.pusher.connection.bind('disconnected', () => {
                console.log('WebSocket disconnected');
                utils.showNotification('Disconnected from real-time messaging', 'warning');
            });

            window.Echo.connector.pusher.connection.bind('error', (error) => {
                console.error('WebSocket error:', error);
                utils.showNotification('Real-time messaging error', 'error');
            });
        }
    }

    // Initialize the application
    document.addEventListener('DOMContentLoaded', function() {
        initializeEventListeners();
        initializeEchoMonitoring();
    });

    // Cleanup on page unload
    window.addEventListener('beforeunload', () => {
        broadcastManager.unsubscribeFromConversation();
    });
</script>

@endsection