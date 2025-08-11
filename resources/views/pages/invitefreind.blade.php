<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Invite Friends - ULIX AI</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .glass-effect {
      backdrop-filter: blur(10px);
      background: rgba(255, 255, 255, 0.9);
      border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .gradient-border {
      background: linear-gradient(135deg, #3b82f6, #1d4ed8);
      padding: 1px;
      border-radius: 0.75rem;
    }
    
    .gradient-border-content {
      background: white;
      border-radius: calc(0.75rem - 1px);
    }
    
    .hover-lift {
      transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }
    
    .hover-lift:hover {
      transform: translateY(-2px);
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    
    .pulse-animation {
      animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
    
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translate3d(0, 40px, 0);
      }
      to {
        opacity: 1;
        transform: translate3d(0, 0, 0);
      }
    }
    
    .fade-in-up {
      animation: fadeInUp 0.6s ease-out;
    }
    
    .status-badge {
      display: inline-flex;
      align-items: center;
      padding: 0.25rem 0.75rem;
      border-radius: 9999px;
      font-size: 0.75rem;
      font-weight: 500;
    }
    
    .status-sent {
      background-color: rgb(254 240 138);
      color: rgb(146 64 14);
    }
    
    .status-accepted {
      background-color: rgb(187 247 208);
      color: rgb(22 101 52);
    }
  </style>
</head>
<body class="bg-gradient-to-br from-slate-50 to-blue-50 min-h-screen">

 @include('includes.header')
     @include('pages.popup')

<!-- Hero Section with improved gradient -->
<section class="relative bg-gradient-to-r from-blue-600 via-blue-500 to-blue-400 text-center py-20 px-4 overflow-hidden">
  <!-- Background decoration -->
  <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>
  
  <div class="relative max-w-4xl mx-auto fade-in-up">
    <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm rounded-full px-4 py-2 mb-6 text-white/90 text-sm font-medium">
      <span class="w-2 h-2 bg-green-400 rounded-full pulse-animation"></span>
      Team Collaboration
    </div>
    <h1 class="text-5xl md:text-6xl font-bold text-white mb-4 leading-tight">
      Invite Friends to 
      <span class="bg-gradient-to-r from-blue-200 to-white bg-clip-text text-transparent">@site</span>
    </h1>
    <p class="text-blue-100 text-xl max-w-2xl mx-auto leading-relaxed">
      Share your dashboard or invite team members via email to collaborate and grow together.
    </p>
  </div>
</section>

<!-- Main Invite Section with improved layout -->
<section class="py-16 px-4 -mt-8 relative z-10">
  <div class="max-w-7xl mx-auto">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
      
      <!-- Dashboard Link & QR Code - Enhanced -->
      <div class="gradient-border hover-lift">
        <div class="gradient-border-content p-8">
          <div class="flex items-start justify-between mb-6">
            <div>
              <h2 class="text-2xl font-bold text-gray-800 mb-2">Dashboard Published</h2>
              <p class="text-gray-600">Your dashboard is live and updates automatically</p>
            </div>
            <div class="w-3 h-3 bg-green-400 rounded-full pulse-animation"></div>
          </div>

          <!-- URL Section -->
          <div class="bg-gray-50 rounded-xl p-4 mb-6">
            <label class="text-sm font-medium text-gray-700 mb-2 block">Dashboard URL</label>
            <div class="flex items-center gap-3">
              <div class="flex-1 flex items-center bg-white rounded-lg border border-gray-200 px-4 py-3">
                <span class="text-gray-400 mr-2">🔗</span>
                <input type="text" readonly value="sales.@site.com" class="flex-1 text-gray-800 bg-transparent outline-none font-mono text-sm" id="dashboardUrl" />
              </div>
              <button onclick="copyDashboard()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-3 rounded-lg transition-colors duration-200 flex items-center gap-2">
                <span>📋</span>
                <span class="hidden sm:inline">Copy</span>
              </button>
            </div>
          </div>

          <button class="inline-flex items-center gap-2 text-blue-600 font-medium hover:text-blue-700 transition-colors mb-8 group">
            <span class="w-5 h-5 bg-blue-100 rounded-full flex items-center justify-center group-hover:bg-blue-200 transition-colors">+</span>
            Add custom domain
          </button>

          <!-- QR Code Section -->
          <div class="text-center bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-6">
            <div class="inline-block p-4 bg-white rounded-2xl shadow-sm mb-4">
              <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=sales.ulixai.com" alt="QR Code" class="w-32 h-32" />
            </div>
            <h3 class="font-semibold text-gray-800 mb-2">Mobile Access</h3>
            <p class="text-sm text-gray-600">Scan with your phone to open the dashboard instantly</p>
          </div>
        </div>
      </div>

      <!-- Invite by Email - Enhanced -->
      <div class="gradient-border hover-lift">
        <div class="gradient-border-content p-8">
          <div class="flex items-start justify-between mb-6">
            <div>
              <h2 class="text-2xl font-bold text-gray-800 mb-2">Invite Team Members</h2>
              <p class="text-gray-600">Send email invitations with account setup instructions</p>
            </div>
            <div class="bg-blue-100 rounded-full p-2">
              <span class="text-blue-600 text-xl">👥</span>
            </div>
          </div>

          <!-- Email Input -->
          <div class="mb-8">
            <label class="text-sm font-medium text-gray-700 mb-2 block">Email Address</label>
            <div class="flex gap-3">
              <div class="flex-1 relative">
                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">✉️</span>
                <input type="email" placeholder="Enter email address" class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none transition-all" />
              </div>
              <button class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-6 py-3 rounded-lg font-medium transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                Send Invite
              </button>
            </div>
          </div>

          <!-- Invited Users List -->
          <div class="mb-8">
            <h3 class="font-semibold text-gray-800 mb-4">Team Members</h3>
            <div class="space-y-3">
              <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                <div class="flex items-center gap-3">
                  <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                    J
                  </div>
                  <span class="text-gray-800 font-medium">jack@site.com</span>
                </div>
                <span class="status-badge status-sent">Invite sent</span>
              </div>
              
              <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                <div class="flex items-center gap-3">
                  <div class="w-10 h-10 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                    S
                  </div>
                  <span class="text-gray-800 font-medium">sienna@site.com</span>
                </div>
                <span class="status-badge status-sent">Invite sent</span>
              </div>
              
              <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                <div class="flex items-center gap-3">
                  <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                    F
                  </div>
                  <span class="text-gray-800 font-medium">frankie@site.com</span>
                </div>
                <span class="status-badge status-sent">Invite sent</span>
              </div>
              
              <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                <div class="flex items-center gap-3">
                  <div class="w-10 h-10 bg-gradient-to-br from-orange-400 to-orange-600 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                    M
                  </div>
                  <span class="text-gray-800 font-medium">matt@site.com</span>
                </div>
                <span class="status-badge status-sent">Invite sent</span>
              </div>
              
              <div class="flex items-center justify-between p-3 bg-green-50 border border-green-200 rounded-lg">
                <div class="flex items-center gap-3">
                  <img src="https://i.pravatar.cc/40?u=amelie" alt="Amélie" class="w-10 h-10 rounded-full border-2 border-green-300" />
                  <span class="text-gray-800 font-medium">amelie@site.com</span>
                </div>
                <span class="status-badge status-accepted">✓ Active</span>
              </div>
            </div>
          </div>

          <!-- Team Seats Usage -->
          <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6">
            <div class="flex items-center justify-between mb-3">
              <h3 class="font-semibold text-gray-800">Team Capacity</h3>
              <span class="text-2xl font-bold text-blue-600">6/10</span>
            </div>
            <div class="w-full bg-blue-100 rounded-full h-3 mb-4 overflow-hidden">
              <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-full rounded-full transition-all duration-500 ease-out" style="width: 60%"></div>
            </div>
            <div class="flex items-center justify-between text-sm">
              <span class="text-gray-600">4 seats remaining</span>
              <a href="#" class="inline-flex items-center gap-1 text-blue-700 hover:text-blue-800 font-medium transition-colors">
                <span>⚙️</span>
                Manage seats
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Success Toast (Hidden by default) -->
<!-- <div id="successToast" class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300 z-50">
  <div class="flex items-center gap-2">
    <span>✅</span>
    <span>Dashboard link copied to clipboard!</span>
  </div>
</div> -->

<script>
  function copyDashboard() {
    const input = document.getElementById('dashboardUrl');
    input.select();
    input.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(input.value).then(() => {
      showSuccessToast();
    }).catch(() => {
      // Fallback for older browsers
      document.execCommand('copy');
      showSuccessToast();
    });
  }
  
  function showSuccessToast() {
    const toast = document.getElementById('successToast');
    toast.classList.remove('translate-x-full');
    setTimeout(() => {
      toast.classList.add('translate-x-full');
    }, 3000);
  }
  
  // Add subtle animations on scroll
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };
  
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('fade-in-up');
      }
    });
  }, observerOptions);
  
  document.querySelectorAll('.hover-lift').forEach(el => {
    observer.observe(el);
  });
</script>

 @include('includes.footer')

</body>
</html>