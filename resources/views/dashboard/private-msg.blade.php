@extends('dashboard.layouts.master')

@section('title', 'Private Messaging')

@section('content')
@php
    $activeTab = request('tab') === 'jobs' ? 'jobs' : 'services';
@endphp

<div class="flex flex-col lg:flex-row min-h-screen">
    <!-- Sidebar is included in master layout -->

    <!-- Main Content -->
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

      <!-- Messaging Interface -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Chat List -->
        <div class="space-y-4">
          <!-- Message Card 1 -->
          <div class="message-card border rounded-xl p-4 bg-white flex items-center gap-4 cursor-pointer hover:shadow-lg transition"
               data-chat-id="chat1" data-user-name="Mohamed" data-phone="06 00 00 00" data-status="was online 2 hours ago">
            <div class="flex-1 space-y-1">
              <h3 class="text-blue-900 font-bold text-sm">PRIVATE LESSONS MY CHILD IN ENGLISH</h3>
              <p class="text-gray-700 text-sm">Duration: 1 hour</p>
              <p class="text-gray-700 text-sm">France</p>
              <p class="text-gray-700 text-sm">Lyon</p>
              <p class="text-gray-700 text-sm">French</p>
              <p class="text-gray-700 text-sm">Mission Ends In: 59:30</p>
              <a href="{{ route('qoute-offer') }}" class="inline-block bg-blue-600 text-white text-xs font-semibold rounded-full px-4 py-2 mt-2 hover:bg-blue-700 transition">
                See My Job
              </a>
            </div>
            <div class="flex-shrink-0">
              <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center">
                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/>
                </svg>
              </div>
            </div>
          </div>

          <!-- Message Card 2 -->
          <div class="message-card border rounded-xl p-4 bg-white flex items-center gap-4 cursor-pointer hover:shadow-lg transition"
               data-chat-id="chat2" data-user-name="Sarah" data-phone="07 11 22 33" data-status="online now">
            <div class="flex-1 space-y-1">
              <h3 class="text-blue-900 font-bold text-sm">PRIVATE LESSONS MY CHILD IN ENGLISH</h3>
              <p class="text-gray-700 text-sm">Duration: 1 hour</p>
              <p class="text-gray-700 text-sm">France</p>
              <p class="text-gray-700 text-sm">Lyon</p>
              <p class="text-gray-700 text-sm">French</p>
              <p class="text-gray-700 text-sm">Mission Ends In: 45:20</p>
              <a href="{{ route('qoute-offer') }}" class="inline-block bg-blue-600 text-white text-xs font-semibold rounded-full px-4 py-2 mt-2 hover:bg-blue-700 transition">
                See My Job
              </a>
            </div>
            <div class="flex-shrink-0">
              <div class="w-16 h-16 bg-red-400 rounded-full flex items-center justify-center">
                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                </svg>
              </div>
            </div>
          </div>
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
         <form action="#" method="POST" class="pt-2 relative">
            <input type="text" placeholder="Send a message here" class="w-full px-4 py-3 border border-blue-300 rounded-full focus:outline-none pr-14" style="padding-right:3.5rem; height:48px;" />
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
<script>
const messageCards = document.querySelectorAll('.message-card');
const chatBox = document.getElementById('chatBox');
const chatUserName = document.getElementById('chatUserName');
const chatPhone = document.getElementById('chatPhone');
const chatStatus = document.getElementById('chatStatus');
const chatMessages = document.getElementById('chatMessages');
const closeChatBtn = document.getElementById('closeChatBtn');

const chatData = {
  chat1: {
    messages: [
      { type: 'received', text: 'est qui dolorem ipsum quia dolor sit amet, consectetur,' },
      { type: 'sent', text: 'est qui dolorem ipsum quia dolor sit amet, consectetur, est qui dolorem ipsum...' }
    ]
  },
  chat2: {
    messages: [
      { type: 'received', text: 'Hello! I\'m ready for the English lesson.' },
      { type: 'sent', text: 'Great! Let\'s start with some basic vocabulary.' }
    ]
  }
};

function renderMessages(messages) {
  chatMessages.innerHTML = '';
  messages.forEach(msg => {
    const div = document.createElement('div');
    div.className = msg.type === 'sent' ? 'text-right' : 'text-left';
    div.innerHTML = `<div class="inline-block bg-${msg.type === 'sent' ? 'blue-600' : 'gray-100'} text-${msg.type === 'sent' ? 'white' : 'gray-800'} px-4 py-2 rounded-xl text-sm max-w-xs">${msg.text}</div>`;
    chatMessages.appendChild(div);
  });
}

function openChat(chatId, userName, phone, status) {
  chatUserName.textContent = userName;
  chatPhone.textContent = phone;
  chatStatus.textContent = `${userName} / ${status}`;
  renderMessages(chatData[chatId]?.messages || []);
  chatBox.classList.remove('hidden');
  chatBox.classList.add('flex');
}

function closeChat() {
  chatBox.classList.remove('flex');
  chatBox.classList.add('hidden');
}

messageCards.forEach(card => {
  card.addEventListener('click', () => {
    openChat(card.dataset.chatId, card.dataset.userName, card.dataset.phone, card.dataset.status);
  });
});

closeChatBtn.addEventListener('click', () => {
  closeChat();
});
</script>
@endsection