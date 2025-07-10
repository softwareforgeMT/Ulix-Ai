{{-- Provider Details Page --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provider Detail</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .star-filled { color: #3B82F6; }
        .star-yellow { color: #FCD34D; }
    </style>
</head>
<body class="min-h-screen">
   @include('includes.header')
   @include('pages.popup')

    <div class="max-w-6xl mx-auto space-y-6 mt-8">
        <!-- Social Media Share Card -->
        <div class="flex justify-end mb-2">
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
                <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-blue-300 hover:bg-white transition">
                  <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/twitter.svg" alt="Twitter" class="w-5 h-5" />
                </a>
            </div>
        </div>
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
                            <div class="flex justify-center gap-1"><i class="fas fa-star star-filled"></i><span>4.85 / 5</span></div>
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
                            $services = $provider->services_to_offer ?? [];
                            if (is_string($services)) {
                                $decoded = json_decode($services, true);
                                $services = is_array($decoded) ? $decoded : [$services];
                            }
                        @endphp
                        @if(is_array($services))
                            @foreach($services as $service)
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-briefcase text-blue-500"></i>{{ $service }}
                                </div>
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
                    <div class="flex items-center gap-2 mb-2"><i class="fas fa-star star-yellow"></i><span class="text-lg font-bold">4.88</span></div>
                    <p class="text-sm text-gray-600 mb-4">Out of 5 for 13 reviews</p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <button class="bg-yellow-300 text-black py-2 px-3 rounded text-sm font-medium">Home help (4)</button>
                        <button class="border border-gray-300 bg-white py-2 px-3 rounded text-sm flex items-center gap-1"><i class="fas fa-star text-gray-400"></i>5 (10)</button>
                        <button class="border border-gray-300 bg-white py-2 px-3 rounded text-sm flex items-center gap-1"><i class="fas fa-star text-gray-400"></i>4 (3)</button>
                    </div>
                    <div class="space-y-4">
                        <div class="flex gap-3">
                            <div class="w-12 h-12 bg-gray-300 rounded-full"></div>
                            <div class="flex-1">
                                <span class="text-sm font-medium">HOME DELIVERY</span>
                                <div class="flex gap-1 my-1">
                                    <i class="fas fa-star star-yellow text-xs"></i>
                                    <i class="fas fa-star star-yellow text-xs"></i>
                                    <i class="fas fa-star star-yellow text-xs"></i>
                                    <i class="fas fa-star star-yellow text-xs"></i>
                                    <i class="fas fa-star star-yellow text-xs"></i>
                                </div>
                                <p class="text-sm font-medium">Perfect</p>
                                <div class="flex flex-wrap gap-2 text-xs text-gray-500 items-center">
                                    <span class="font-medium">SARA</span>
                                    <span>4 months ago</span>
                                    <span class="bg-blue-500 text-white px-2 py-1 rounded-full"><i class="fas fa-check mr-1"></i>Very effective</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

    <!-- Suggest a Mission Modal (Step 1, 2 & 3) -->
    @include('dashboard.provider.suggest-mission')

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
    document.addEventListener('DOMContentLoaded', function () {
        var btn = document.getElementById('profileImgBtn');
        var modal = document.getElementById('profileImgModal');
        var closeBtn = document.getElementById('closeProfileImgModal');
        if (btn && modal && closeBtn) {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                modal.classList.remove('hidden');
            });
            closeBtn.addEventListener('click', function () {
                modal.classList.add('hidden');
            });
            modal.addEventListener('click', function (e) {
                if (e.target === modal) modal.classList.add('hidden');
            });
        }

        // Suggest a Mission Modal logic
        function openSuggestMissionModal() {
            document.getElementById('suggestMissionModal').classList.remove('hidden');
            document.getElementById('suggestStep1').classList.remove('hidden');
            document.getElementById('suggestStep2').classList.add('hidden');
        }
        function closeSuggestMissionModal() {
            document.getElementById('suggestMissionModal').classList.add('hidden');
        }
        // Attach to both buttons
        var suggestMissionBtn1 = document.getElementById('suggestMissionBtn');
        var suggestMissionBtn2 = document.querySelector('button[onclick*="window.history.back"]');
        if (suggestMissionBtn1) suggestMissionBtn1.addEventListener('click', function(e){ e.preventDefault(); openSuggestMissionModal(); });
        if (suggestMissionBtn2) suggestMissionBtn2.addEventListener('click', function(e){ e.preventDefault(); openSuggestMissionModal(); });
        var closeSuggestMissionModalBtn = document.getElementById('closeSuggestMissionModal');
        if (closeSuggestMissionModalBtn) closeSuggestMissionModalBtn.addEventListener('click', closeSuggestMissionModal);
        var suggestMissionModal = document.getElementById('suggestMissionModal');
        if (suggestMissionModal) suggestMissionModal.addEventListener('click', function(e){
            if (e.target === suggestMissionModal) closeSuggestMissionModal();
        });

        // Step navigation with validation
        var toStep2Btn = document.getElementById('toStep2Btn');
        var backToStep1Btn = document.getElementById('backToStep1Btn');
        var toStep3Btn = document.getElementById('toStep3Btn');
        var toStep4Btn = document.getElementById('toStep4Btn');
        var backToStep2Btn, backToStep3Btn, toStep5Btn, backToStep4Btn, finishMissionBtn;

        if (toStep2Btn) toStep2Btn.addEventListener('click', function(e){
            e.preventDefault();
            // No validation for Step 1
            document.getElementById('suggestStep1').classList.add('hidden');
            document.getElementById('suggestStep2').classList.remove('hidden');
        });
        if (backToStep1Btn) backToStep1Btn.addEventListener('click', function(e){
            e.preventDefault();
            document.getElementById('suggestStep2').classList.add('hidden');
            document.getElementById('suggestStep1').classList.remove('hidden');
        });
        if (toStep3Btn) toStep3Btn.addEventListener('click', function(e){
            e.preventDefault();
            // Validate Step 2
            var country = document.getElementById('countryInput').value.trim();
            if (!country) {
                toastr.error('Please enter the country.');
                return;
            }
            document.getElementById('suggestStep2').classList.add('hidden');
            document.getElementById('suggestStep3').classList.remove('hidden');
            // Attach back/next for step 3
            backToStep2Btn = document.getElementById('backToStep2Btn');
            toStep4Btn = document.getElementById('toStep4Btn');
            if (backToStep2Btn) backToStep2Btn.onclick = function(e){
                e.preventDefault();
                document.getElementById('suggestStep3').classList.add('hidden');
                document.getElementById('suggestStep2').classList.remove('hidden');
            };
            if (toStep4Btn) toStep4Btn.onclick = function(e){
                e.preventDefault();
                // Validate Step 3
                var origin = document.getElementById('originCountryInput').value.trim();
                if (!origin) {
                    toastr.error('Please enter your country of origin.');
                    return false;
                }
                document.getElementById('suggestStep3').classList.add('hidden');
                document.getElementById('suggestStep4').classList.remove('hidden');
                // Attach back for step 4
                backToStep3Btn = document.getElementById('backToStep3Btn');
                toStep5Btn = document.getElementById('toStep5Btn');
                if (backToStep3Btn) backToStep3Btn.onclick = function(e){
                    e.preventDefault();
                    document.getElementById('suggestStep4').classList.add('hidden');
                    document.getElementById('suggestStep3').classList.remove('hidden');
                };
                if (toStep5Btn) toStep5Btn.onclick = function(e){
                    e.preventDefault();
                    // Validate Step 4
                    var city = document.getElementById('currentCityInput').value.trim();
                    if (!city) {
                        toastr.error('Please enter your current city.');
                        return false;
                    }
                    document.getElementById('suggestStep4').classList.add('hidden');
                    document.getElementById('suggestStep5').classList.remove('hidden');
                    // Attach back/finish for step 5
                    backToStep4Btn = document.getElementById('backToStep4Btn');
                    finishMissionBtn = document.getElementById('finishMissionBtn');
                    if (backToStep4Btn) backToStep4Btn.onclick = function(e){
                        e.preventDefault();
                        document.getElementById('suggestStep5').classList.add('hidden');
                        document.getElementById('suggestStep4').classList.remove('hidden');
                    };

                    // Step 5: duration selection logic
                    var durationBtns = document.querySelectorAll('.duration-btn');
                    var durationInput = document.getElementById('durationHere');
                    durationBtns.forEach(function(btn){
                        btn.onclick = function(ev){
                            ev.preventDefault();
                            durationBtns.forEach(function(b){ 
                                b.classList.remove('bg-blue-600', 'text-white', 'border-blue-800');
                                b.classList.add('text-blue-700', 'border-blue-500');
                            });
                            btn.classList.add('bg-blue-600', 'text-white', 'border-blue-800');
                            btn.classList.remove('text-blue-700', 'border-blue-500');
                            durationInput.value = btn.textContent.trim();
                        };
                    });

                    if (finishMissionBtn) finishMissionBtn.onclick = function(e){
                        // Validate Step 5
                        var duration = document.getElementById('durationHere').value.trim();
                        if (!duration) {
                            e.preventDefault();
                            toastr.error('Please select how long you have been here.');
                            return false;
                        }
                        e.preventDefault();
                        toastr.success('All steps completed!');
                        closeSuggestMissionModal();
                    };
                };
            };
        });
        // Step 5 -> Step 6
        var toStep6Btn, backToStep5Btn;
        toStep6Btn = document.getElementById('toStep6Btn');
        if (toStep6Btn) toStep6Btn.onclick = function(e){
            e.preventDefault();
            // Validate Step 5
            var duration = document.getElementById('durationHere').value.trim();
            if (!duration) {
                toastr.error('Please select how long you have been here.');
                return false;
            }
            document.getElementById('suggestStep5').classList.add('hidden');
            document.getElementById('suggestStep6').classList.remove('hidden');
            // Attach back/finish for step 6
            backToStep5Btn = document.getElementById('backToStep5Btn');
            finishMissionBtn = document.getElementById('finishMissionBtn');
            if (backToStep5Btn) backToStep5Btn.onclick = function(e){
                e.preventDefault();
                document.getElementById('suggestStep6').classList.add('hidden');
                document.getElementById('suggestStep5').classList.remove('hidden');
            };

            // Character count for textarea
            var moreDetails = document.getElementById('moreDetails');
            var charCount = document.getElementById('charCount');
            if (moreDetails && charCount) {
                moreDetails.addEventListener('input', function() {
                    charCount.textContent = moreDetails.value.length + " / 1500";
                });
            }

            if (finishMissionBtn) finishMissionBtn.onclick = function(e){
                // Validate Step 6
                var title = document.getElementById('requestTitle').value.trim();
                if (!title) {
                    e.preventDefault();
                    toastr.error('Please enter a title for your request.');
                    return false;
                }
                // Optionally validate moreDetails if required
                // var details = document.getElementById('moreDetails').value.trim();
                // if (!details) {
                //     e.preventDefault();
                //     toastr.error('Please provide more details.');
                //     return false;
                // }
                e.preventDefault();
                toastr.success('All steps completed!');
                closeSuggestMissionModal();
            };
        };
        // Step 6 -> Step 7
        var toStep7Btn = document.getElementById('toStep7Btn');
        var backToStep6Btn, finishMissionBtn;
        if (toStep7Btn) toStep7Btn.onclick = function(e){
            e.preventDefault();
            // Validate Step 6
            var title = document.getElementById('requestTitle').value.trim();
            if (!title) {
                toastr.error('Please enter a title for your request.');
                return false;
            }
            document.getElementById('suggestStep6').classList.add('hidden');
            document.getElementById('suggestStep7').classList.remove('hidden');
            // Attach back/next for step 7
            backToStep6Btn = document.getElementById('backToStep6Btn');
            finishMissionBtn = document.getElementById('finishMissionBtn');
            if (backToStep6Btn) backToStep6Btn.onclick = function(e){
                e.preventDefault();
                document.getElementById('suggestStep7').classList.add('hidden');
                document.getElementById('suggestStep6').classList.remove('hidden');
            };

            // Photo upload logic for 3 slots
            var photoInputs = [
                document.getElementById('photoInput0'),
                document.getElementById('photoInput1'),
                document.getElementById('photoInput2')
            ];
            var photoPreviews = [
                document.getElementById('photoPreview0'),
                document.getElementById('photoPreview1'),
                document.getElementById('photoPreview2')
            ];
            photoInputs.forEach(function(input, idx){
                input.onchange = function(){
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e){
                            photoPreviews[idx].src = e.target.result;
                        };
                        reader.readAsDataURL(input.files[0]);
                    }
                };
            });

            // Photo menu modal logic
            var photoMenuModal = document.getElementById('photoMenuModal');
            var photoMenuOptions = document.querySelectorAll('.photo-menu-option');
            var closePhotoMenuModal = document.getElementById('closePhotoMenuModal');
            var cameraModal = document.getElementById('cameraModal');
            var cameraVideo = document.getElementById('cameraVideo');
            var capturePhotoBtn = document.getElementById('capturePhotoBtn');
            var closeCameraModal = document.getElementById('closeCameraModal');
            var activePhotoInput = null;
            var activePhotoPreview = null;
            var cameraStream = null;

            document.querySelectorAll('.photo-menu-btn').forEach(function(btn, idx){
                btn.addEventListener('click', function(e){
                    e.preventDefault();
                    activePhotoInput = document.getElementById('photoInput' + idx);
                    activePhotoPreview = document.getElementById('photoPreview' + idx);
                    photoMenuModal.classList.remove('hidden');
                });
            });

            photoMenuOptions.forEach(function(option){
                option.addEventListener('click', function(){
                    var action = option.getAttribute('data-action');
                    photoMenuModal.classList.add('hidden');
                    if (!activePhotoInput) return;
                    if (action === 'library' || action === 'file') {
                        activePhotoInput.click();
                    } else if (action === 'camera') {
                        cameraModal.classList.remove('hidden');
                        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                            navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream){
                                cameraStream = stream;
                                cameraVideo.srcObject = stream;
                                cameraVideo.play();
                            });
                        }
                    }
                });
            });

            if (closePhotoMenuModal) closePhotoMenuModal.onclick = function() {
                photoMenuModal.classList.add('hidden');
            };

            if (closeCameraModal) closeCameraModal.onclick = function(){
                cameraModal.classList.add('hidden');
                if (cameraVideo.srcObject) {
                    cameraVideo.srcObject.getTracks().forEach(track => track.stop());
                    cameraVideo.srcObject = null;
                }
                cameraStream = null;
            };

            if (capturePhotoBtn) capturePhotoBtn.onclick = function(){
                if (!cameraVideo.srcObject) return;
                var canvas = document.createElement('canvas');
                canvas.width = cameraVideo.videoWidth;
                canvas.height = cameraVideo.videoHeight;
                var ctx = canvas.getContext('2d');
                ctx.drawImage(cameraVideo, 0, 0, canvas.width, canvas.height);
                var dataURL = canvas.toDataURL('image/png');
                if (activePhotoPreview) {
                    activePhotoPreview.src = dataURL;
                }
                cameraModal.classList.add('hidden');
                if (cameraVideo.srcObject) {
                    cameraVideo.srcObject.getTracks().forEach(track => track.stop());
                    cameraVideo.srcObject = null;
                }
                cameraStream = null;
            };

            // Attach next for step 7
            if (finishMissionBtn) finishMissionBtn.onclick = function(e){
                e.preventDefault();
                document.getElementById('suggestStep7').classList.add('hidden');
                document.getElementById('suggestStep8').classList.remove('hidden');

                // Step 8 logic: toggle yes/no and next
                var helpOnline = document.getElementById('helpOnline');
                var helpInPerson = document.getElementById('helpInPerson');
                var helpUnknown = document.getElementById('helpUnknown');
                var toggleBtns = document.querySelectorAll('.toggle-btn');
                toggleBtns.forEach(function(btn){
                    btn.onclick = function(ev){
                        ev.preventDefault();
                        var group = btn.getAttribute('data-group');
                        var value = btn.getAttribute('data-value');
                        // Remove active from both in group
                        toggleBtns.forEach(function(b){
                            if (b.getAttribute('data-group') === group) {
                                b.classList.remove('bg-blue-600', 'text-white');
                                b.classList.add('bg-white', 'text-blue-700');
                            }
                        });
                        btn.classList.add('bg-blue-600', 'text-white');
                        btn.classList.remove('bg-white', 'text-blue-700');
                        // Set hidden input
                        if (group === 'online') helpOnline.value = value;
                        if (group === 'inperson') helpInPerson.value = value;
                        if (group === 'unknown') helpUnknown.value = value;
                    };
                });

                var backToStep7Btn = document.getElementById('backToStep7Btn');
                if (backToStep7Btn) backToStep7Btn.onclick = function(e){
                    e.preventDefault();
                    document.getElementById('suggestStep8').classList.add('hidden');
                    document.getElementById('suggestStep7').classList.remove('hidden');
                };

                var toStep9Btn = document.getElementById('toStep9Btn');
                if (toStep9Btn) toStep9Btn.onclick = function(e){
                    e.preventDefault();
                    // Validation: all 3 must be answered
                    if (!helpOnline.value || !helpInPerson.value || !helpUnknown.value) {
                        toastr.error('Please answer all support options.');
                        return false;
                    }
                    document.getElementById('suggestStep8').classList.add('hidden');
                    document.getElementById('suggestStep9').classList.remove('hidden');

                    // Step 9 logic: urgency selection and next
                    var urgencyBtns = document.querySelectorAll('.urgency-btn');
                    var urgencyInput = document.getElementById('urgencyValue');
                    urgencyBtns.forEach(function(btn){
                        btn.onclick = function(ev){
                            ev.preventDefault();
                            urgencyBtns.forEach(function(b){
                                b.classList.remove('selected');
                            });
                            btn.classList.add('selected');
                            urgencyInput.value = btn.childNodes[0].textContent.trim();
                        };
                    });

                    var backToStep8Btn = document.getElementById('backToStep8Btn');
                    if (backToStep8Btn) backToStep8Btn.onclick = function(e){
                        e.preventDefault();
                        document.getElementById('suggestStep9').classList.add('hidden');
                        document.getElementById('suggestStep8').classList.remove('hidden');
                    };

                    var finishAllBtn = document.getElementById('finishAllBtn');
                    if (finishAllBtn) finishAllBtn.onclick = function(e){
                        e.preventDefault();
                        if (!urgencyInput.value) {
                            toastr.error('Please select how soon you need this service.');
                            return false;
                        }
                        document.getElementById('suggestStep9').classList.add('hidden');
                        document.getElementById('suggestStep10').classList.remove('hidden');
                        // ...continue with step 10 logic as before...
                    };
                };
            };
        };
        // Step 8 -->
        var toStep8Btn = document.getElementById('finishMissionBtn');
        if (toStep8Btn) {
            toStep8Btn.onclick = function(e){
                e.preventDefault();
                document.getElementById('suggestStep7').classList.add('hidden');
                document.getElementById('suggestStep8').classList.remove('hidden');
                // Attach back/next for step 8
                var backToStep7Btn = document.getElementById('backToStep7Btn');
                var toStep9Btn = document.getElementById('toStep9Btn');
                if (backToStep7Btn) backToStep7Btn.onclick = function(e){
                    e.preventDefault();
                    document.getElementById('suggestStep8').classList.add('hidden');
                    document.getElementById('suggestStep7').classList.remove('hidden');
                };

                // Toggle logic for Yes/No buttons
                var helpOnline = document.getElementById('helpOnline');
                var helpInPerson = document.getElementById('helpInPerson');
                var helpUnknown = document.getElementById('helpUnknown');
                var toggleBtns = document.querySelectorAll('.toggle-btn');
                toggleBtns.forEach(function(btn){
                    btn.onclick = function(ev){
                        ev.preventDefault();
                        var group = btn.getAttribute('data-group');
                        var value = btn.getAttribute('data-value');
                        // Remove active from both in group
                        toggleBtns.forEach(function(b){
                            if (b.getAttribute('data-group') === group) {
                                b.classList.remove('bg-blue-600', 'text-white');
                                b.classList.add('bg-white', 'text-blue-700');
                            }
                        });
                        btn.classList.add('bg-blue-600', 'text-white');
                        btn.classList.remove('bg-white', 'text-blue-700');
                        // Set hidden input
                        if (group === 'online') helpOnline.value = value;
                        if (group === 'inperson') helpInPerson.value = value;
                        if (group === 'unknown') helpUnknown.value = value;
                    };
                });

                if (toStep9Btn) toStep9Btn.onclick = function(e){
                    e.preventDefault();
                    // Validation: all 3 must be answered
                    if (!helpOnline.value || !helpInPerson.value || !helpUnknown.value) {
                        toastr.error('Please answer all support options.');
                        return false;
                    }
                    toastr.success('Step 8 complete!');
                    // document.getElementById('suggestStep8').classList.add('hidden');
                    // document.getElementById('suggestStep9').classList.remove('hidden');
                };
            };
        }
        // Step 8 -> Step 9
        var toStep9Btn = document.getElementById('toStep9Btn');
        if (toStep9Btn) {
            toStep9Btn.addEventListener('click', function(e){
                e.preventDefault();
                // Validation for step 8
                var helpOnline = document.getElementById('helpOnline');
                var helpInPerson = document.getElementById('helpInPerson');
                var helpUnknown = document.getElementById('helpUnknown');
                if (!helpOnline.value || !helpInPerson.value || !helpUnknown.value) {
                    toastr.error('Please answer all support options.');
                    return false;
                }
                document.getElementById('suggestStep8').classList.add('hidden');
                document.getElementById('suggestStep9').classList.remove('hidden');
                // Attach back/finish for step 9
                var backToStep8Btn = document.getElementById('backToStep8Btn');
                var finishAllBtn = document.getElementById('finishAllBtn');
                if (backToStep8Btn) backToStep8Btn.onclick = function(e){
                    e.preventDefault();
                    document.getElementById('suggestStep9').classList.add('hidden');
                    document.getElementById('suggestStep8').classList.remove('hidden');
                };

                // Urgency selection logic
                var urgencyBtns = document.querySelectorAll('.urgency-btn');
                var urgencyInput = document.getElementById('urgencyValue');
                urgencyBtns.forEach(function(btn){
                    btn.onclick = function(ev){
                        ev.preventDefault();
                        urgencyBtns.forEach(function(b){
                            b.classList.remove('selected');
                        });
                        btn.classList.add('selected');
                        urgencyInput.value = btn.childNodes[0].textContent.trim();
                    };
                });

                if (finishAllBtn) finishAllBtn.onclick = function(e){
                    e.preventDefault();
                    // Validation: must select one urgency
                    if (!urgencyInput.value) {
                        toastr.error('Please select how soon you need this service.');
                        return false;
                    }
                    toastr.success('All steps completed!');
                    closeSuggestMissionModal();
                };
            });
        }
        // Step 9 -> Step 10 (fix: use event listener, not submit)
        var finishAllBtn = document.getElementById('finishAllBtn');
        if (finishAllBtn) {
            finishAllBtn.addEventListener('click', function(e){
                e.preventDefault();
                var urgencyInput = document.getElementById('urgencyValue');
                if (!urgencyInput.value) {
                    toastr.error('Please select how soon you need this service.');
                    return false;
                }
                document.getElementById('suggestStep9').classList.add('hidden');
                document.getElementById('suggestStep10').classList.remove('hidden');
                // Attach back/finish for step 10
                var backToStep9Btn = document.getElementById('backToStep9Btn');
                var finishLangBtn = document.getElementById('finishLangBtn');
                if (backToStep9Btn) backToStep9Btn.onclick = function(e){
                    e.preventDefault();
                    document.getElementById('suggestStep10').classList.add('hidden');
                    document.getElementById('suggestStep9').classList.remove('hidden');
                };

                // Language selection logic
                var langBtns = document.querySelectorAll('.lang-btn');
                var langInput = document.getElementById('selectedLanguage');
                langBtns.forEach(function(btn){
                    btn.onclick = function(ev){
                        ev.preventDefault();
                        langBtns.forEach(function(b){
                            b.classList.remove('selected');
                        });
                        btn.classList.add('selected');
                        langInput.value = btn.textContent.trim();
                    };
                });

                if (finishLangBtn) finishLangBtn.onclick = function(e){
                    e.preventDefault();
                    if (!langInput.value) {
                        toastr.error('Please select a language.');
                        return false;
                    }
                    toastr.success('All steps completed!');
                    closeSuggestMissionModal();
                };
            });
        }
        // Step 10 -> Step 11
        var finishLangBtn = document.getElementById('finishLangBtn');
        if (finishLangBtn) {
            finishLangBtn.addEventListener('click', function(e){
                e.preventDefault();
                var langInput = document.getElementById('selectedLanguage');
                if (!langInput.value) {
                    toastr.error('Please select a language.');
                    return false;
                }
                document.getElementById('suggestStep10').classList.add('hidden');
                document.getElementById('suggestStep11').classList.remove('hidden');
                // Attach back/finish for step 11
                var backToStep10Btn = document.getElementById('backToStep10Btn');
                var finishNameBtn = document.getElementById('finishNameBtn');
                if (backToStep10Btn) backToStep10Btn.onclick = function(e){
                    e.preventDefault();
                    document.getElementById('suggestStep11').classList.add('hidden');
                    document.getElementById('suggestStep10').classList.remove('hidden');
                };
                if (finishNameBtn) finishNameBtn.onclick = function(e){
                    e.preventDefault();
                    var firstName = document.getElementById('firstName').value.trim();
                    var surname = document.getElementById('surname').value.trim();
                    if (!firstName || !surname) {
                        toastr.error('Please enter your first name and surname.');
                        return false;
                    }
                    toastr.success('All steps completed!');
                    closeSuggestMissionModal();
                };
            });
        }
        // Step 11 -> Step 12
        var finishNameBtn = document.getElementById('finishNameBtn');
        if (finishNameBtn) {
            finishNameBtn.addEventListener('click', function(e){
                e.preventDefault();
                var firstName = document.getElementById('firstName').value.trim();
                var surname = document.getElementById('surname').value.trim();
                if (!firstName || !surname) {
                    toastr.error('Please enter your first name and surname.');
                    return false;
                }
                document.getElementById('suggestStep11').classList.add('hidden');
                document.getElementById('suggestStep12').classList.remove('hidden');
                // Attach back/finish for step 12
                var backToStep11Btn = document.getElementById('backToStep11Btn');
                var finishEmailBtn = document.getElementById('finishEmailBtn');
                if (backToStep11Btn) backToStep11Btn.onclick = function(e){
                    e.preventDefault();
                    document.getElementById('suggestStep12').classList.add('hidden');
                    document.getElementById('suggestStep11').classList.remove('hidden');
                };
                if (finishEmailBtn) finishEmailBtn.onclick = function(e){
                    e.preventDefault();
                    var email = document.getElementById('emailInput').value.trim();
                    // Simple email validation
                    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!email || !emailPattern.test(email)) {
                        toastr.error('Please enter a valid e-mail address.');
                        return false;
                    }
                    toastr.success('All steps completed!');
                    closeSuggestMissionModal();
                };
            });
        }
        // Step 12 -> Step 13 (ensure only one handler and use addEventListener)
        var finishEmailBtn = document.getElementById('finishEmailBtn');
        if (finishEmailBtn) {
            finishEmailBtn.addEventListener('click', function(e){
                e.preventDefault();
                var email = document.getElementById('emailInput').value.trim();
                var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!email || !emailPattern.test(email)) {
                    toastr.error('Please enter a valid e-mail address.');
                    return false;
                }
                document.getElementById('suggestStep12').classList.add('hidden');
                document.getElementById('suggestStep13').classList.remove('hidden');
                // Attach back/finish for step 13
                var backToStep12Btn = document.getElementById('backToStep12Btn');
                var finishPasswordBtn = document.getElementById('finishPasswordBtn');
                if (backToStep12Btn) backToStep12Btn.onclick = function(e){
                    e.preventDefault();
                    document.getElementById('suggestStep13').classList.add('hidden');
                    document.getElementById('suggestStep12').classList.remove('hidden');
                };
                if (finishPasswordBtn) finishPasswordBtn.onclick = function(e){
                    e.preventDefault();
                    var password = document.getElementById('passwordInput').value;
                    if (!password || password.length < 6) {
                        toastr.error('Please enter a password (at least 6 characters).');
                        return false;
                    }
                    toastr.success('All steps completed!');
                    closeSuggestMissionModal();
                };
            });
        }
        // Step 13 -> Step 14
        var finishPasswordBtn = document.getElementById('finishPasswordBtn');
        if (finishPasswordBtn) {
            finishPasswordBtn.addEventListener('click', function(e){
                e.preventDefault();
                var password = document.getElementById('passwordInput').value;
                if (!password || password.length < 6) {
                    toastr.error('Please enter a password (at least 6 characters).');
                    return false;
                }
                document.getElementById('suggestStep13').classList.add('hidden');
                document.getElementById('suggestStep14').classList.remove('hidden');
                // Duration selection logic
                var durationBtns = document.querySelectorAll('.duration-visible-btn');
                var durationInput = document.getElementById('visibleDuration');
                durationBtns.forEach(function(btn){
                    btn.onclick = function(ev){
                        ev.preventDefault();
                        durationBtns.forEach(function(b){
                            b.classList.remove('bg-blue-700');
                            b.classList.add('bg-blue-600');
                        });
                        btn.classList.remove('bg-blue-600');
                        btn.classList.add('bg-blue-700');
                        durationInput.value = btn.textContent.trim();
                    };
                });
                // Back/finish handlers
                var backToStep13Btn = document.getElementById('backToStep13Btn');
                var finishVisibleBtn = document.getElementById('finishVisibleBtn');
                if (backToStep13Btn) backToStep13Btn.onclick = function(e){
                    e.preventDefault();
                    document.getElementById('suggestStep14').classList.add('hidden');
                    document.getElementById('suggestStep13').classList.remove('hidden');
                };
                if (finishVisibleBtn) finishVisibleBtn.onclick = function(e){
                    e.preventDefault();
                    if (!durationInput.value) {
                        toastr.error('Please select how long your request should be visible.');
                        return false;
                    }
                    toastr.success('Your request has been sent to the selected service provider!');
                    closeSuggestMissionModal();
                };
            });
        }
        // Step 14 -> Step 15
        var finishVisibleBtn = document.getElementById('finishVisibleBtn');
        if (finishVisibleBtn) {
            // Remove any previous event listeners to avoid double binding
            finishVisibleBtn.addEventListener('click', function(e){
                e.preventDefault();
                var durationInput = document.getElementById('visibleDuration');
                if (!durationInput.value) {
                    toastr.error('Please select how long your request should be visible.');
                    return false;
                }
                document.getElementById('suggestStep14').classList.add('hidden');
                document.getElementById('suggestStep15').classList.remove('hidden');
            });
        }
    });
    </script>
</body>
</html>