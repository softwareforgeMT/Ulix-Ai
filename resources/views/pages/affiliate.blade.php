<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Affiliate</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    .gradient-text {
      background: linear-gradient(135deg, #3b82f6, #1d4ed8, #1e40af);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }
    
    .glass-effect {
      backdrop-filter: blur(20px);
      background: rgba(255, 255, 255, 0.9);
      border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .gradient-border {
      background: linear-gradient(135deg, #3b82f6, #1d4ed8);
      padding: 2px;
      border-radius: 1rem;
    }
    
    .gradient-border-content {
      background: white;
      border-radius: calc(1rem - 2px);
    }
    
    .card-hover {
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .card-hover:hover {
      transform: translateY(-8px) scale(1.02);
      box-shadow: 0 25px 50px -12px rgba(59, 130, 246, 0.3);
    }
    
    .floating-animation {
      animation: float 6s ease-in-out infinite;
    }
    
    @keyframes float {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-10px); }
    }
    
    .pulse-glow {
      animation: pulseGlow 3s ease-in-out infinite;
    }
    
    @keyframes pulseGlow {
      0%, 100% {
        box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
      }
      50% {
        box-shadow: 0 0 40px rgba(59, 130, 246, 0.6);
      }
    }
    
    .social-icon {
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }
    
    .social-icon::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
      transition: left 0.5s;
    }
    
    .social-icon:hover::before {
      left: 100%;
    }
    
    .status-badge {
      display: inline-flex;
      align-items: center;
      padding: 0.5rem 1rem;
      border-radius: 9999px;
      font-size: 0.875rem;
      font-weight: 600;
      background: linear-gradient(135deg, #10b981, #059669);
      color: white;
      box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
    }
    
    .affiliate-code-display {
      background: linear-gradient(135deg, #eff6ff, #dbeafe);
      border: 2px solid #3b82f6;
      position: relative;
      overflow: hidden;
    }
    
    .affiliate-code-display::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: linear-gradient(45deg, transparent, rgba(59, 130, 246, 0.1), transparent);
      animation: shimmer 2s infinite;
    }
    
    @keyframes shimmer {
      0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
      100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
    }
    
    .feature-icon {
      background: linear-gradient(135deg, #3b82f6, #1d4ed8);
      width: 4rem;
      height: 4rem;
      border-radius: 1rem;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.5rem;
      color: white;
      box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
    }
  </style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 min-h-screen">

 @include('includes.header')
 @include('pages.popup')

<!-- Affiliate Code Status Banner -->
@if($user?->affiliate_code)
  <div class="max-w-7xl mx-auto px-4 mt-6">
    <div class="affiliate-code-display rounded-2xl p-4 text-center relative">
      <div class="relative z-10 flex items-center justify-center gap-3">
        <span class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></span>
        <span class="text-blue-800 font-bold text-lg">
          Your affiliate code: <span class="font-mono bg-white px-3 py-1 rounded-lg">{{ $user->affiliate_code }}</span>
        </span>
        <span class="status-badge">Active</span>
      </div>
    </div>
  </div>
@else
  <div class="max-w-7xl mx-auto px-4 mt-6">
    <div class="bg-red-50 border-2 border-red-200 rounded-2xl p-4 text-center">
      <div class="flex items-center justify-center gap-3">
        <span class="w-3 h-3 bg-red-400 rounded-full"></span>
        <span class="text-red-600 font-bold text-lg">Affiliate code not available</span>
      </div>
    </div>
  </div>
@endif

<!-- Enhanced Social Media Share Card -->
<div class="max-w-7xl mx-auto px-4 mt-6 mb-8">
  <div class="flex justify-end">
    <div class="glass-effect rounded-2xl px-8 py-4 shadow-2xl">
      <div class="flex items-center space-x-6">
        <div class="flex items-center gap-3">
          <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center floating-animation">
            <span class="text-white text-xl">🚀</span>
          </div>
          <span class="text-blue-900 font-bold text-lg">Share this page to help your friends</span>
        </div>
        
        <div class="flex items-center gap-3">
          <a href="#" class="social-icon w-10 h-10 flex items-center justify-center rounded-full bg-blue-600 hover:bg-blue-700 transition-all duration-300 text-white hover:scale-110">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#" class="social-icon w-10 h-10 flex items-center justify-center rounded-full bg-gradient-to-r from-pink-400 to-pink-600 hover:from-pink-500 hover:to-pink-700 transition-all duration-300 text-white hover:scale-110">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="#" class="social-icon w-10 h-10 flex items-center justify-center rounded-full bg-black hover:bg-gray-800 transition-all duration-300 text-white hover:scale-110">
            <i class="fab fa-tiktok"></i>
          </a>
          <a href="#" class="social-icon w-10 h-10 flex items-center justify-center rounded-full bg-red-600 hover:bg-red-700 transition-all duration-300 text-white hover:scale-110">
            <i class="fab fa-youtube"></i>
          </a>
          <a href="#" class="social-icon w-10 h-10 flex items-center justify-center rounded-full bg-sky-500 hover:bg-sky-600 transition-all duration-300 text-white hover:scale-110">
            <i class="fab fa-twitter"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Enhanced Hero Section -->
<section class="relative py-20 px-4 overflow-hidden">
  <!-- Background decorative elements -->
  <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%233b82f6" fill-opacity="0.03"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-40"></div>
  
  <div class="relative max-w-4xl mx-auto text-center space-y-8">
    <div class="inline-flex items-center gap-3 bg-green-100 border border-green-200 rounded-full px-6 py-3 mb-6">
      <span class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></span>
      <span class="text-green-800 font-semibold">Affiliate Program Active</span>
      <span class="text-2xl">🎉</span>
    </div>
    
    <h1 class="text-5xl md:text-6xl font-bold leading-tight">
      <span class="gradient-text">You're already part of</span><br>
      <span class="text-blue-900">the affiliate program</span>
    </h1>
    
    <p class="text-xl text-gray-700 max-w-3xl mx-auto leading-relaxed">
      Thank you for being part of the <strong class="text-blue-600">@site adventure!</strong><br>
      Talk about us around you — <span class="bg-yellow-100 px-2 py-1 rounded-lg font-semibold">you earn revenue</span>, you help us grow ✨
    </p>
    
    <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4">
      <button class="group bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-8 py-4 rounded-2xl font-bold text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 pulse-glow">
        <span class="flex items-center gap-3">
          <span class="text-xl group-hover:animate-bounce">🔗</span>
          Share your affiliate link
        </span>
      </button>
      
      <div class="flex items-center gap-3">
        <a href="https://instagram.com" target="_blank" class="social-icon w-12 h-12 bg-gradient-to-r from-pink-500 to-pink-600 rounded-full flex items-center justify-center text-white hover:scale-110 shadow-lg">
          <i class="fab fa-instagram text-lg"></i>
        </a>
        <a href="https://facebook.com" target="_blank" class="social-icon w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white hover:scale-110 shadow-lg">
          <i class="fab fa-facebook-f text-lg"></i>
        </a>
        <a href="https://twitter.com" target="_blank" class="social-icon w-12 h-12 bg-sky-500 rounded-full flex items-center justify-center text-white hover:scale-110 shadow-lg">
          <i class="fab fa-twitter text-lg"></i>
        </a>
        <a href="https://tiktok.com" target="_blank" class="social-icon w-12 h-12 bg-black rounded-full flex items-center justify-center text-white hover:scale-110 shadow-lg">
          <i class="fab fa-tiktok text-lg"></i>
        </a>
        <a href="https://linkedin.com" target="_blank" class="social-icon w-12 h-12 bg-blue-700 rounded-full flex items-center justify-center text-white hover:scale-110 shadow-lg">
          <i class="fab fa-linkedin-in text-lg"></i>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Enhanced Why Recommend Section -->
<section class="py-20 px-4">
  <div class="max-w-7xl mx-auto">
    <div class="text-center mb-16">
      <h2 class="text-4xl md:text-5xl font-bold mb-6">
        <span class="gradient-text">Why recommend</span> <span class="text-blue-900">@site?</span>
      </h2>
      <div class="flex items-center justify-center gap-4 text-2xl text-blue-800 font-semibold">
        <span class="text-5xl floating-animation">🌍</span>
        <span>The only platform that helps all people moving internationally.</span>
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- Enhanced Card 1 -->
      <div class="gradient-border card-hover">
        <div class="gradient-border-content p-8 h-full">
          <div class="flex flex-col h-full">
            <div class="flex items-center gap-4 mb-6">
              <div class="feature-icon">
                <span>🤝</span>
              </div>
              <h3 class="text-2xl font-bold text-blue-900">Why @site?</h3>
            </div>
            
            <div class="flex-1 space-y-4">
              <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-4 rounded-xl border-l-4 border-blue-400">
                <p class="text-blue-900 font-semibold text-lg">Are you already a member?</p>
              </div>
              <div class="pl-4 border-l-4 border-blue-200 space-y-2">
                <p class="text-blue-700 leading-relaxed">The one and only platform that meets all the needs of expats and travelers worldwide.</p>
                <div class="flex items-center gap-2 text-sm text-blue-600">
                  <span class="w-2 h-2 bg-blue-400 rounded-full"></span>
                  <span>Global reach</span>
                </div>
                <div class="flex items-center gap-2 text-sm text-blue-600">
                  <span class="w-2 h-2 bg-blue-400 rounded-full"></span>
                  <span>Comprehensive services</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Enhanced Card 2 -->
      <div class="gradient-border card-hover">
        <div class="gradient-border-content p-8 h-full">
          <div class="flex flex-col h-full">
            <div class="flex items-center gap-4 mb-6">
              <div class="feature-icon">
                <span>💰</span>
              </div>
              <h3 class="text-2xl font-bold text-blue-900">Remuneration</h3>
            </div>
            
            <div class="flex-1 space-y-4">
              <div class="bg-gradient-to-r from-green-50 to-emerald-50 p-4 rounded-xl border-l-4 border-green-400">
                <p class="text-green-900 font-semibold text-lg">Exceptional affiliate commissions for life</p>
              </div>
              <div class="space-y-3">
                <div class="flex items-center gap-3 p-3 bg-blue-50 rounded-lg">
                  <span class="text-2xl font-bold text-blue-600">75%</span>
                  <span class="text-blue-700">commission on service provider fees</span>
                </div>
                <p class="text-blue-700 text-sm leading-relaxed">Each time one of your referrals uses our platform, you receive 75% of the fee - for life!</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Enhanced Card 3 -->
      <div class="gradient-border card-hover">
        <div class="gradient-border-content p-8 h-full">
          <div class="flex flex-col h-full">
            <div class="flex items-center gap-4 mb-6">
              <div class="feature-icon">
                <span>📊</span>
              </div>
              <h3 class="text-2xl font-bold text-blue-900">The Programme</h3>
            </div>
            
            <div class="flex-1 space-y-4">
              <div class="bg-gradient-to-r from-purple-50 to-indigo-50 p-4 rounded-xl border-l-4 border-purple-400">
                <p class="text-purple-900 font-semibold text-lg">A private link to earn money</p>
              </div>
              <div class="space-y-3">
                <div class="flex items-center gap-2 text-blue-700">
                  <span class="w-2 h-2 bg-blue-400 rounded-full"></span>
                  <span>Unique affiliate link at signup</span>
                </div>
                <div class="flex items-center gap-2 text-blue-700">
                  <span class="w-2 h-2 bg-blue-400 rounded-full"></span>
                  <span>Real-time tracking dashboard</span>
                </div>
                <div class="flex items-center gap-2 text-blue-700">
                  <span class="w-2 h-2 bg-blue-400 rounded-full"></span>
                  <span>Detailed earnings reports</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Enhanced Affiliate Link Card -->
<section class="py-16 px-4">
  <div class="max-w-2xl mx-auto">
    <div class="gradient-border card-hover">
      <div class="gradient-border-content p-8 text-center relative overflow-hidden">
        <!-- Background decoration -->
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-400 via-purple-500 to-blue-600"></div>
        
        <!-- Icon -->
        <div class="relative -top-4 mb-6">
          <div class="inline-flex w-20 h-20 bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl items-center justify-center text-white text-3xl shadow-2xl floating-animation">
            🔗
          </div>
        </div>

        <h2 class="text-3xl font-bold text-blue-900 mb-3">Your Affiliate Link</h2>
        <p class="text-gray-600 mb-8 text-lg">Share this link and earn rewards by inviting others to @site!</p>

        <!-- Enhanced Link Display -->
        <div class="mb-8">
          <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border-2 border-blue-200 rounded-2xl p-6 relative overflow-hidden">
            <div class="flex items-center justify-between">
              <div class="flex-1 text-left">
                <label class="text-sm font-semibold text-blue-700 block mb-2">Your Unique Affiliate URL</label>
                <div class="font-mono text-gray-800 text-sm break-all">
                  @if($user?->affiliate_code)
                    {{ url('/?ref=' . $user->affiliate_code) }}
                  @else
                    <span class="text-red-500 font-sans">No affiliate link available</span>
                  @endif
                </div>
              </div>
              @if($user?->affiliate_code)
                <button onclick="copyAffiliateLink()" class="ml-4 bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-xl transition-all duration-300 hover:scale-105 group">
                  <i class="fas fa-copy group-hover:animate-pulse"></i>
                </button>
              @endif
            </div>
            
            <!-- Shimmer effect -->
            @if($user?->affiliate_code)
              <div class="absolute inset-0 opacity-20">
                <div class="w-full h-full bg-gradient-to-r from-transparent via-white to-transparent animate-pulse"></div>
              </div>
            @endif
          </div>
        </div>

        <!-- Enhanced Copy Button -->
        <button 
          onclick="copyAffiliateLink()" 
          class="w-full mb-8 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white py-4 px-8 rounded-2xl font-bold text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none"
          @if(!$user?->affiliate_code) disabled @endif>
          <span class="flex items-center justify-center gap-3">
            <i class="fas fa-copy text-xl"></i>
            Copy My Affiliate Link
          </span>
        </button>

        <!-- Enhanced Social Icons Grid -->
        <div class="space-y-4">
          <h3 class="text-lg font-semibold text-gray-800">Share on social media</h3>
          <div class="grid grid-cols-5 gap-4">
            <a href="https://facebook.com" target="_blank" class="social-icon w-12 h-12 bg-blue-600 hover:bg-blue-700 rounded-2xl flex items-center justify-center text-white transition-all duration-300 hover:scale-110 shadow-lg">
              <i class="fab fa-facebook-f text-lg"></i>
            </a>
            <a href="https://twitter.com" target="_blank" class="social-icon w-12 h-12 bg-sky-500 hover:bg-sky-600 rounded-2xl flex items-center justify-center text-white transition-all duration-300 hover:scale-110 shadow-lg">
              <i class="fab fa-twitter text-lg"></i>
            </a>
            <a href="@if($user?->affiliate_code){{ 'https://wa.me/?text=' . urlencode(url('/?ref=' . $user->affiliate_code)) }}@else#@endif" target="_blank" class="social-icon w-12 h-12 bg-green-500 hover:bg-green-600 rounded-2xl flex items-center justify-center text-white transition-all duration-300 hover:scale-110 shadow-lg">
              <i class="fab fa-whatsapp text-lg"></i>
            </a>
            <a href="https://instagram.com" target="_blank" class="social-icon w-12 h-12 bg-gradient-to-r from-pink-500 to-pink-600 hover:from-pink-600 hover:to-pink-700 rounded-2xl flex items-center justify-center text-white transition-all duration-300 hover:scale-110 shadow-lg">
              <i class="fab fa-instagram text-lg"></i>
            </a>
            <a href="https://linkedin.com" target="_blank" class="social-icon w-12 h-12 bg-blue-700 hover:bg-blue-800 rounded-2xl flex items-center justify-center text-white transition-all duration-300 hover:scale-110 shadow-lg">
              <i class="fab fa-linkedin-in text-lg"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Success Toast -->
<!-- <div id="successToast" class="fixed top-4 right-4 bg-green-500 text-white px-6 py-4 rounded-2xl shadow-lg transform translate-x-full transition-transform duration-300 z-50">
  <div class="flex items-center gap-3">
    <i class="fas fa-check-circle text-xl"></i>
    <span class="font-semibold">Affiliate link copied to clipboard!</span>
  </div>
</div> -->

<div class="mb-20"></div>

@include('includes.footer')

<script>
  function copyAffiliateLink() {
    @if($user?->affiliate_code)
      const affiliateLink = "{{ url('/?ref=' . $user->affiliate_code) }}";
      navigator.clipboard.writeText(affiliateLink).then(() => {
        showSuccessToast();
      }).catch(() => {
        // Fallback for older browsers
        const textArea = document.createElement('textarea');
        textArea.value = affiliateLink;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand('copy');
        document.body.removeChild(textArea);
        showSuccessToast();
      });
    @endif
  }
  
  function showSuccessToast() {
    const toast = document.getElementById('successToast');
    toast.classList.remove('translate-x-full');
    setTimeout(() => {
      toast.classList.add('translate-x-full');
    }, 3000);
  }
  
  // Add scroll animations
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };
  
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = '1';
        entry.target.style.transform = 'translateY(0)';
      }
    });
  }, observerOptions);
  
  document.querySelectorAll('.card-hover').forEach((el, index) => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(20px)';
    el.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
    observer.observe(el);
  });
</script>

</body>
</html>