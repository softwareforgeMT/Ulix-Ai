{{-- Provider Details Page --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provider Detail</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <style>
        .star-filled { color: #3B82F6; }
        .star-yellow { color: #FCD34D; }
    </style>
</head>
<body class="min-h-screen">
    
    @if (session('success'))
        <script>
            toastr.success('{{ session('success') }}', 'Success');
        </script>
    @endif

    @if (session('error'))
        <script>
            toastr.error('{{ session('error') }}', 'Error');
        </script>
    @endif
   @include('includes.header')
   @include('pages.popup')
@php
    $reviews = \App\Models\ProviderReview::where('provider_id', $provider->id ?? 0)->with('user')->latest()->get();
    $reviewCount = $reviews->count();
    $avgRating = $reviewCount ? round($reviews->avg('rating'), 2) : 5;
    $isProviderSelf = (auth()->check() && $provider->user_id == auth()->id());
@endphp



    <div class="max-w-6xl mx-auto space-y-6 mt-8">
<!-- Social Media Share Card -->
@php
    $shareUrl = route('provider.profile', ['slug' => $provider->slug]);
@endphp

<div class="flex justify-end mb-2">
    <div class="flex flex-wrap items-center bg-gradient-to-r from-blue-500 to-blue-700 rounded-2xl px-6 py-3 shadow-lg space-x-3 sm:space-x-4">
        <span class="text-white font-semibold flex items-center text-sm sm:text-base">
            <span class="mr-2">🚀</span>Share this sheet to help your friends
        </span>

        <!-- Facebook -->
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($shareUrl) }}"
           onclick="copyToClipboard('{{ $shareUrl }}')" target="_blank" rel="noopener"
           class="w-8 h-8 flex items-center justify-center rounded-full bg-blue-400 hover:bg-white transition">
            <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/facebook.svg" alt="Facebook" class="w-5 h-5" />
        </a>

        <!-- Instagram -->
        <a href="javascript:void(0);" onclick="copyAndNotify('{{ $shareUrl }}')"
           class="w-8 h-8 flex items-center justify-center rounded-full bg-pink-400 hover:bg-white transition" title="Link copied! Paste in Instagram bio or DMs">
            <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/instagram.svg" alt="Instagram" class="w-5 h-5" />
        </a>

        <!-- TikTok -->
        <a href="javascript:void(0);" onclick="copyAndNotify('{{ $shareUrl }}')"
           class="w-8 h-8 flex items-center justify-center rounded-full bg-white hover:bg-white transition" title="Link copied! Paste in TikTok bio or DMs">
            <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/tiktok.svg" alt="TikTok" class="w-5 h-5" />
        </a>

        <!-- YouTube -->
        <a href="javascript:void(0);" onclick="copyAndNotify('{{ $shareUrl }}')"
           class="w-8 h-8 flex items-center justify-center rounded-full bg-red-600 hover:bg-white transition" title="Link copied! Paste in YouTube comments or description">
            <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/youtube.svg" alt="YouTube" class="w-5 h-5" />
        </a>

        <!-- Twitter -->
        <a href="https://twitter.com/intent/tweet?url={{ urlencode($shareUrl) }}&text=Check out this service provider on ULIXAI!"
           onclick="copyToClipboard('{{ $shareUrl }}')" target="_blank" rel="noopener"
           class="w-8 h-8 flex items-center justify-center rounded-full bg-blue-300 hover:bg-white transition">
            <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/twitter.svg" alt="Twitter" class="w-5 h-5" />
        </a>

        <!-- Copy Link Button -->
        <button onclick="copyAndNotify('{{ $shareUrl }}')"
            class="flex items-center gap-2 text-white bg-green-500 hover:bg-green-600 transition px-3 py-1.5 rounded-full text-sm shadow-md"
            title="Copy this link">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V3" />
            </svg>
            Copy Link
        </button>
    </div>
</div>

<!-- Toast Notification -->
<div id="copy-toast"
     class="hidden fixed bottom-6 right-6 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg z-50 transition-opacity duration-300 ease-in-out">
    ✅ Link copied to clipboard!
</div>

<!-- JS for Copy + Toast -->
<script>
    function copyToClipboard(link) {
        navigator.clipboard.writeText(link)
            .then(() => console.log("Copied"))
            .catch(err => console.error("Failed to copy", err));
    }

    function copyAndNotify(link) {
        copyToClipboard(link);
        const toast = document.getElementById('copy-toast');
        toast.classList.remove('hidden');
        toast.classList.add('opacity-100');

        setTimeout(() => {
            toast.classList.add('hidden');
            toast.classList.remove('opacity-100');
        }, 2000);
    }
</script>

        <!-- Main Content Layout -->
        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Profile Card -->
            <div class="lg:w-1/3 w-full">
                <div class="bg-blue-100 rounded-2xl p-6">
                    <div class="text-center mb-4">
                        <button id="profileImgBtn" class="focus:outline-none">
                            @if(isset($provider) && $provider->profile_photo)
                                <img src="{{ asset($provider->profile_photo) }}" alt="Profile" class="w-20 h-20 rounded-full mx-auto mb-4 object-cover hover:scale-110 transition-transform">
                            @else
                                <img src="https://i.pravatar.cc/150?img=3" alt="Profile" class="w-20 h-20 rounded-full mx-auto mb-4 object-cover hover:scale-110 transition-transform">
                            @endif
                        </button>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-center gap-1 text-blue-500"><i class="fas fa-check"></i><span>Profile verified</span></div>
                            <div class="flex justify-center gap-1"><i class="fas fa-star star-filled"></i><span>{{ number_format($avgRating, 1) }}/ 5</span></div>
                        </div>
                    </div>
                    <div class="text-center text-xs text-gray-500 uppercase mb-4">
                        @if(isset($provider) && $provider->user && $provider->user->created_at)
                            ULYSSE SINCE {{ $provider->user->created_at->diffForHumans(null, true) }}
                        @else
                            ULYSSE SINCE 3 MONTHS
                        @endif
                    </div>
                    <div class="space-y-3 text-sm mb-6">
                        @php
                            // Decode the stringified JSON into an actual array
                            $services = $provider->services_to_offer ? json_decode($provider->services_to_offer, true) : [];
                        @endphp

                        @if(is_array($services) && count($services) > 0)
                            @foreach($services as $service)
                                @php
                                    // Fetch the category by ID
                                    $category = \App\Models\Category::find($service);
                                @endphp
                                @if($category)
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-briefcase text-blue-500"></i>{{ $category->name }}
                                    </div>
                                @else
                                    <div class="flex items-center gap-2 text-gray-400">
                                        <i class="fas fa-briefcase"></i>Category not found
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <div class="flex items-center gap-2 text-gray-400">
                                <i class="fas fa-briefcase"></i>No services listed
                            </div>
                        @endif

                        
                    </div>
                    <button onclick="openHelpPopup()" class="inline-block mt-6 bg-red-600 hover:bg-white hover:text-black text-white py-3 px-6 rounded-lg text-sm font-medium"> Suggest A Mission</button>
                </div>
            </div>
            <!-- Detail Section -->
            <div class="lg:w-2/3 w-full">
                <div class="flex justify-between items-start flex-wrap gap-4 mb-6">
                    <div>
                        <h2 class="text-xl font-bold">
                            {{ isset($provider) ? ($provider->first_name . ' ' . $provider->last_name) : 'NAME' }}
                        </h2>
                        <p class="text-sm text-gray-600">
                            NUMBER OF SERVICES PROVIDED: {{ isset($provider) && isset($provider->services_to_offer) ? (is_array($services) ? count($services) : 1) : 16 }}
                        </p>
                    </div>
                </div>
                <div class="bg-white rounded-lg p-4 mb-4 border">
                    <p class="text-sm text-gray-700">
                        {{ $provider->profile_description ?? 'A few words presentation of the Ulysse...' }}
                    </p>
                </div>
                <div class="bg-white rounded-lg p-4 mb-6 border">
                    <p class="text-sm font-medium mb-4">Special Status</p>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-x-6 gap-y-3">
                        @php
                            $specialStatus = $provider->special_status ?? [];
                            if (is_string($specialStatus)) {
                                $decoded = json_decode($specialStatus, true);
                                $specialStatus = is_array($decoded) ? $decoded : [];
                            }
                        @endphp
                        @if($specialStatus)
                            @foreach($specialStatus as $status => $val)
                                @if($val)
                                <div class="flex items-center gap-2 text-sm">
                                    <i class="fas fa-certificate text-blue-500"></i>
                                    <span>{{ $status }}</span>
                                </div>
                                @endif
                            @endforeach
                        @else
                            <div class="flex items-center gap-2 text-sm text-gray-400">
                                <i class="fas fa-certificate"></i>
                                <span>No special status</span>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- Reviews -->
                

                <div>
                    <h3 class="text-lg font-bold mb-3">REVIEWS AND COMMENTS</h3>
                    <div class="flex items-center gap-2 mb-2">
                        @for($i=1; $i<=5; $i++)
                            <i class="fas fa-star {{ $i <= round($avgRating) ? 'star-yellow' : 'text-gray-300' }}"></i>
                        @endfor
                        <span class="text-lg font-bold">{{ $avgRating }}</span>
                    </div>
                    <p class="text-sm text-gray-600 mb-4">Out of 5 for {{ $reviewCount }} reviews</p>

                    @auth
                    @if(!$isProviderSelf)
                    <form method="POST" action="{{ route('provider.review', $provider->id) }}" class="mb-6 bg-blue-50 rounded-lg p-4 border" id="reviewForm">
                        @csrf
                        <div class="flex items-center gap-2 mb-2">
                            <span class="font-semibold text-blue-700">Your Rating:</span>
                            <div class="flex gap-1" id="starRating">
                                @for($i=1; $i<=5; $i++)
                                    <label>
                                        <input type="radio" name="rating" value="{{ $i }}" class="hidden" {{ old('rating', 5) == $i ? 'checked' : '' }}>
                                        <i class="fas fa-star star cursor-pointer" data-value="{{ $i }}" data-index="{{ $i }}"></i>
                                    </label>
                                @endfor
                            </div>
                        </div>
                        <textarea name="comment" rows="2" class="w-full border border-blue-300 rounded-lg px-3 py-2 mb-2" placeholder="Add your comment...">{{ old('comment') }}</textarea>
                        <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded font-semibold hover:bg-blue-700">Submit Review</button>
                    </form>
                    @else
                    <div class="mb-6 bg-blue-50 rounded-lg p-4 border text-blue-700 font-semibold">
                        You cannot rate or comment on your own profile.
                    </div>
                    @endif
                    @endauth

<!-- Filter Section -->
<div class="mb-6">
    <div class="flex flex-wrap gap-3 items-center justify-between">
        <div class="flex items-center gap-3">
            <span class="text-sm font-medium text-gray-700">Filter by:</span>
            
            <!-- Filter Dropdown -->
            <div class="relative">
                <button id="filter-dropdown-btn" 
                        onclick="toggleDropdown()" 
                        class="flex items-center gap-2 px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <span id="selected-filter">All Reviews</span>
                    <i class="fas fa-chevron-down text-xs transition-transform duration-200" id="dropdown-arrow"></i>
                </button>
                
                <div id="filter-dropdown" 
                     class="absolute top-full left-0 mt-1 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-10 hidden">
                    <div class="py-1">
                        <button onclick="selectFilter('all', 'All Reviews')" 
                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 flex items-center gap-2">
                            <i class="fas fa-list text-xs w-4"></i>
                            All Reviews
                        </button>
                        <button onclick="selectFilter('newest', 'Newest First')" 
                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 flex items-center gap-2">
                            <i class="fas fa-clock text-xs w-4"></i>
                            Newest First
                        </button>
                        <button onclick="selectFilter('oldest', 'Oldest First')" 
                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 flex items-center gap-2">
                            <i class="fas fa-history text-xs w-4"></i>
                            Oldest First
                        </button>
                        <button onclick="selectFilter('high_rating', 'High Rating (4-5 ⭐)')" 
                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 flex items-center gap-2">
                            <i class="fas fa-star text-xs w-4 text-yellow-500"></i>
                            High Rating (4-5 ⭐)
                        </button>
                        <button onclick="selectFilter('low_rating', 'Low Rating (1-3 ⭐)')" 
                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 flex items-center gap-2">
                            <i class="fas fa-star-half-alt text-xs w-4 text-gray-400"></i>
                            Low Rating (1-3 ⭐)
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Results Count -->
        <div>
            <span id="results-count" class="text-sm text-gray-500">
                Showing {{ count($reviews) }} reviews
            </span>
        </div>
    </div>
</div>

<!-- Reviews Container -->
<div class="space-y-4" id="reviews-container">
    @forelse($reviews as $review)
    <div class="review-item border rounded-lg p-4 bg-white flex items-center gap-4" 
         data-rating="{{ $review->rating }}" 
         data-date="{{ $review->created_at->timestamp }}">
        <div>
            @if($review->user && $review->user->profile_photo)
                <img src="{{ asset($review->user->profile_photo) }}" alt="User" class="w-12 h-12 rounded-full object-cover border border-blue-200">
            @else
                <img src="https://i.pravatar.cc/150?u={{ $review->user->id ?? 0 }}" alt="User" class="w-12 h-12 rounded-full object-cover border border-blue-200">
            @endif
        </div>
        <div class="flex-1">
            <div class="flex items-center gap-2 mb-1">
                <span class="font-semibold text-blue-700">{{ $review->user->name ?? 'User' }}</span>
                <span class="text-xs text-gray-500">{{ $review->created_at->diffForHumans() }}</span>
                <div class="flex gap-1 ml-2">
                    @for($i=1; $i<=5; $i++)
                        <i class="fas fa-star {{ $i <= $review->rating ? 'star-yellow' : 'text-gray-300' }}"></i>
                    @endfor
                </div>
            </div>
            <div class="text-gray-700 text-sm">{{ $review->comment }}</div>
        </div>
    </div>
    @empty
    <div class="text-gray-400 text-center py-6" id="no-reviews-message">No reviews yet.</div>
    @endforelse
</div>

<!-- No Results Message (Hidden by default) -->
<div id="no-results-message" class="text-gray-400 text-center py-6 hidden">
    No reviews match the selected filter.
</div>

<div class="pb-12"></div>

<!-- Modal for enlarged profile image -->
<div id="profileImgModal" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 hidden">
    <div class="relative">
        <button id="closeProfileImgModal" class="absolute top-2 right-2 bg-white rounded-full p-1 shadow hover:bg-gray-200">
            <i class="fas fa-times text-xl text-gray-700"></i>
        </button>
        @if(isset($provider) && $provider->profile_photo)
            <img src="{{ asset($provider->profile_photo) }}" alt="Profile Large" class="w-72 h-72 rounded-full object-cover border-4 border-white shadow-xl">
        @else
            <img src="https://i.pravatar.cc/150?img=3" alt="Profile Large" class="w-72 h-72 rounded-full object-cover border-4 border-white shadow-xl">
        @endif
    </div>
</div>

<script>
// Dropdown functionality
function toggleDropdown() {
    const dropdown = document.getElementById('filter-dropdown');
    const arrow = document.getElementById('dropdown-arrow');
    
    dropdown.classList.toggle('hidden');
    arrow.classList.toggle('rotate-180');
}

function selectFilter(filterType, filterLabel) {
    // Update dropdown button text
    document.getElementById('selected-filter').textContent = filterLabel;
    
    // Close dropdown
    document.getElementById('filter-dropdown').classList.add('hidden');
    document.getElementById('dropdown-arrow').classList.remove('rotate-180');
    
    // Apply filter
    filterReviews(filterType);
}

// Close dropdown when clicking outside
document.addEventListener('click', function(event) {
    const dropdown = document.getElementById('filter-dropdown');
    const button = document.getElementById('filter-dropdown-btn');
    
    if (!dropdown.contains(event.target) && !button.contains(event.target)) {
        dropdown.classList.add('hidden');
        document.getElementById('dropdown-arrow').classList.remove('rotate-180');
    }
});

function filterReviews(filterType) {
    const reviewItems = document.querySelectorAll('.review-item');
    const resultsCount = document.getElementById('results-count');
    const noResultsMessage = document.getElementById('no-results-message');
    const noReviewsMessage = document.getElementById('no-reviews-message');
    
    let visibleCount = 0;
    const reviewsArray = Array.from(reviewItems);
    
    // Apply filter
    switch(filterType) {
        case 'all':
            reviewItems.forEach(item => {
                item.style.display = 'flex';
                visibleCount++;
            });
            break;
            
        case 'newest':
            // Sort by newest first (highest timestamp)
            reviewsArray.sort((a, b) => 
                parseInt(b.dataset.date) - parseInt(a.dataset.date)
            );
            reorderAndShow(reviewsArray);
            visibleCount = reviewsArray.length;
            break;
            
        case 'oldest':
            // Sort by oldest first (lowest timestamp)
            reviewsArray.sort((a, b) => 
                parseInt(a.dataset.date) - parseInt(b.dataset.date)
            );
            reorderAndShow(reviewsArray);
            visibleCount = reviewsArray.length;
            break;
            
        case 'high_rating':
            reviewItems.forEach(item => {
                const rating = parseInt(item.dataset.rating);
                if (rating >= 4) {
                    item.style.display = 'flex';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });
            break;
            
        case 'low_rating':
            reviewItems.forEach(item => {
                const rating = parseInt(item.dataset.rating);
                if (rating <= 3) {
                    item.style.display = 'flex';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });
            break;
    }
    
    // Update results count
    resultsCount.textContent = `Showing ${visibleCount} reviews`;
    
    // Show/hide no results message
    if (visibleCount === 0) {
        noResultsMessage.classList.remove('hidden');
        noReviewsMessage.classList.add('hidden');
    } else {
        noResultsMessage.classList.add('hidden');
        noReviewsMessage.classList.add('hidden');
    }
}

function reorderAndShow(sortedArray) {
    const container = document.getElementById('reviews-container');
    
    // Remove all review items from container
    sortedArray.forEach(item => {
        container.removeChild(item);
    });
    
    // Add them back in sorted order
    sortedArray.forEach(item => {
        item.style.display = 'flex';
        container.appendChild(item);
    });
}

// Initialize filter on page load
document.addEventListener('DOMContentLoaded', function() {
    // Set initial count
    const initialCount = document.querySelectorAll('.review-item').length;
    document.getElementById('results-count').textContent = `Showing ${initialCount} reviews`;
});
</script>

<style>
.star-yellow {
    color: #fbbf24;
}

.review-item {
    transition: opacity 0.3s ease;
}

/* Dropdown styles */
#filter-dropdown {
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
}

#filter-dropdown button:hover {
    background-color: rgb(239 246 255);
    color: rgb(29 78 216);
}

#dropdown-arrow {
    transition: transform 0.2s ease;
}

.rotate-180 {
    transform: rotate(180deg);
}
</style>

    <style>
    .loader { border-top-color: transparent; animation: spin 1s linear infinite; }
    @keyframes spin { 0% { transform: rotate(0deg);} 100% { transform: rotate(360deg);} }
    .social-btn { width: 38px; height: 38px; display: flex; align-items: center; justify-content: center; border-radius: 50%; color: #fff; font-size: 1.25rem; transition: transform 0.2s, box-shadow 0.2s; box-shadow: 0 2px 8px 0 rgba(59,130,246,0.07); border: none; outline: none; }
    .social-btn:hover { transform: scale(1.13) rotate(-6deg); box-shadow: 0 4px 16px 0 rgba(59,130,246,0.18); filter: brightness(1.08); }
    .photo-upload-box { min-width: 140px; min-height: 140px; }
    .group:hover .border-blue-200 { border-color: #2563eb !important; }
    .urgency-btn.selected { background: #2563eb; color: #fff; border-color: #2563eb; }
    .urgency-btn.selected .urgency-radio { background: #fff; border: 2px solid #fff; box-shadow: 0 0 0 4px #2563eb; }
    .urgency-btn .urgency-radio { border: 2px solid #2563eb; }
    .lang-btn.selected, .lang-btn:active { background: #1e40af !important; color: #fff !important; border-color: #1e40af !important; }
    </style>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
    // Get all the stars
    const stars = document.querySelectorAll('.star');
    
    // Handle hover effect (on mouse over)
    stars.forEach(star => {
        star.addEventListener('mouseover', function() {
            const currentRating = this.getAttribute('data-index');
            // Set class for the hovered stars
            stars.forEach(s => {
                s.classList.remove('star-yellow');
                if (s.getAttribute('data-index') <= currentRating) {
                    s.classList.add('star-yellow');
                }
            });
        });

        // Handle mouse leave (to reset the hover effect)
        star.addEventListener('mouseleave', function() {
            stars.forEach(s => s.classList.remove('star-yellow'));
            // Add the checked color back if the user has selected a rating
            const selectedRating = document.querySelector('input[name="rating"]:checked');
            if (selectedRating) {
                stars.forEach(s => {
                    if (s.getAttribute('data-index') <= selectedRating.value) {
                        s.classList.add('star-yellow');
                    }
                });
            }
        });

        // Handle click event (to save the rating value)
        star.addEventListener('click', function() {
            const selectedRating = this.getAttribute('data-index');
            document.querySelector('input[name="rating"][value="' + selectedRating + '"]').checked = true;
        });
    });
</script>

<style>
    .star {
        cursor: pointer;
        font-size: 1.5rem;
        color: #d1d5db; /* Gray color for unselected stars */
    }
    .star-yellow {
        color: #fbbf24; /* Yellow color for selected stars */
    }
</style>
</body>
</html>