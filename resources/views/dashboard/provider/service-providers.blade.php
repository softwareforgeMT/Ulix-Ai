<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provider Profiles</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .star-filled { color: #3B82F6; }
        .social-btn {
            width: 40px; height: 40px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 9999px;
            transition: all 0.3s;
            font-size: 1.25rem;
        }
        .social-btn:hover { transform: scale(1.1); }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    @include('includes.header')
    @include('pages.popup')

    <!-- Social Media Share Card (centered above cards) -->
    <div class="flex justify-center mt-4 mb-8">
      <div class="flex items-center bg-gradient-to-r from-blue-500 to-blue-700 rounded-2xl px-6 py-3 shadow-lg space-x-4">
        <span class="text-white font-semibold flex items-center text-base">
          <span class="mr-2">🚀</span>Share this sheet to help your friends
        </span>
        <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-blue-400 hover:bg-white transition">
          <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/facebook.svg" alt="Facebook" class="w-5 h-5" />
        </a>
        <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-pink-400 hover:bg-white transition">
          <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/instagram.svg" alt="Instagram" class="w-5 h-5" />
        </a>
        <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-white hover:bg-white transition">
          <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/tiktok.svg" alt="TikTok" class="w-5 h-5" />
        </a>
        <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-red-600 hover:bg-white transition">
          <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/youtube.svg" alt="YouTube" class="w-5 h-5" />
        </a>
        <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-blue-300 hover:bg-white 0 transition">
          <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/twitter.svg" alt="Twitter" class="w-5 h-5" />
        </a>
      </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-6xl mx-auto px-4 py-6">
<!-- Provider Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6  ">
            @forelse($providers as $provider)
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200 relative flex flex-col h-full">
                <div class="text-center mb-4">
                    <div class="w-20 h-20 bg-gray-200 rounded-full mx-auto mb-4 overflow-hidden flex items-center justify-center">
                        @if($provider->profile_photo)
                            <img src="{{ asset($provider->profile_photo) }}" alt="Profile" class="w-full h-full object-cover rounded-full">
                        @else
                            <i class="fas fa-user text-4xl text-blue-400"></i>
                        @endif
                    </div>
                    <div class="flex items-center justify-center gap-1 text-blue-500 text-sm mb-2">
                        <i class="fas fa-check"></i>
                        <span>Profile verified</span>
                    </div>
                    <div class="flex items-center justify-center gap-1 mb-2">
                        <i class="fas fa-star star-filled"></i>
                        <span class="text-sm font-medium">{{ number_format($provider->reviews()->avg('rating') ?? 5, 1) }} / 5</span>
                    </div>
                </div>
                <div class="border-t pt-4 flex-grow flex flex-col">
                    <div class="text-center mb-4">
                        <span class="text-xs text-gray-500 uppercase tracking-wider">
                            {{ strtoupper($provider->first_name . ' ' . $provider->last_name) }}
                            @if($provider->user && $provider->user->created_at)
                                &bull; Joined {{ $provider->user->created_at->format('M Y') }}
                            @endif
                        </span>
                    </div>

                    <div class="flex-grow"></div>
                    
                    @php
                    // Decode the stringified JSON into an actual array
                    $services = $provider->services_to_offer ? json_decode($provider->services_to_offer, true) : [];
                    @endphp

                    <div class="pt-3 border-t border-gray-100 mb-6">
                        <div class="flex flex-wrap gap-1.5">
                            @if(is_array($services) && count($services) > 0)
                                @foreach(array_slice($services, 0, 1) as $service)
                                    @php
                                        // Fetch the category by ID
                                        $category = \App\Models\Category::find($service);
                                    @endphp
                                    @if($category)
                                        <span class="bg-blue-50 border border-blue-200 text-blue-700 px-2.5 py-1 rounded-md text-xs font-medium">
                                            {{ $category->name }}
                                        </span>
                                    @endif
                                @endforeach
                                @if(count($services) > 1)
                                    <span class="bg-gray-50 border border-gray-200 text-gray-600 px-2.5 py-1 rounded-md text-xs font-medium">
                                        +{{ count($services) - 1 }}
                                    </span>
                                @endif
                            @else
                                <span class="bg-gray-50 border border-gray-200 text-gray-400 px-2.5 py-1 rounded-md text-xs font-medium">
                                    No services listed
                                </span>
                            @endif
                        </div>
                    </div>
                    <button class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg text-sm font-medium hover:bg-blue-600 transition-colors mt-auto">
                        <a href="{{ route('provider-details', ['id' => $provider->slug]) }}"> SEE MORE </a>
                    </button>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center text-gray-500 py-12">
                No service providers found.
            </div>
            @endforelse
        </div>
    </div>
    @include('dashboard.partials.dashboard-mobile-navbar')
</body>
</html>

