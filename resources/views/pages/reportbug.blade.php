<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bug Report Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="min-h-screen flex flex-col">
       @include('includes.header')
      @include('pages.popup')
        
        <!-- Main Content Container -->
        <main class="flex-1 flex items-center justify-center p-4 py-8">
        <!-- Bug Report Form -->
        <div id="bugForm" class="bg-white rounded-2xl shadow-lg p-8 w-full max-w-2xl">
            <!-- Header -->
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-blue-700 mb-2 flex items-center">
                    <span class="mr-2">🔧</span>
                    Having trouble using the platform?
                </h2>
                <p class="text-gray-600 text-sm">
                    Got ideas to improve Ulixai? Report any bugs or share your suggestions below — your feedback helps us make Ulixar better for everyone.
                </p>
            </div>

            <!-- Form -->
            <form id="feedbackForm" class="space-y-6">
                <!-- Country Selection -->
                <div>
                    <label class="block text-blue-700 font-semibold mb-2">Your country of installation</label>
                    <select class="w-full p-3 border border-gray-300 rounded-lg bg-white text-gray-700 focus:outline-none focus:border-blue-500">
                        <option>Select your country</option>
                        <option>United States</option>
                        <option>United Kingdom</option>
                        <option>Canada</option>
                        <option>Australia</option>
                        <option>Germany</option>
                        <option>France</option>
                        <option>Other</option>
                    </select>
                </div>

                <!-- Language Selection -->
                <div>
                    <label class="block text-blue-700 font-semibold mb-2">Your language</label>
                    <select class="w-full p-3 border border-gray-300 rounded-lg bg-white text-gray-700 focus:outline-none focus:border-blue-500">
                        <option>Select your language</option>
                        <option>English</option>
                        <option>Spanish</option>
                        <option>French</option>
                        <option>German</option>
                        <option>Portuguese</option>
                        <option>Italian</option>
                        <option>Other</option>
                    </select>
                </div>

                <!-- Bug Description -->
                <div>
                    <label class="block text-blue-700 font-semibold mb-2">Describe any bugs you've encountered</label>
                    <textarea 
                        class="w-full p-3 border border-gray-300 rounded-lg resize-none h-24 focus:outline-none focus:border-blue-500" 
                        placeholder="Describe the issue or malfunction you experienced..."
                    ></textarea>
                </div>

                <!-- Suggestions -->
                <div>
                    <label class="block text-blue-700 font-semibold mb-2">Do you have any suggestions for improving Ulixai?</label>
                    <textarea 
                        class="w-full p-3 border border-gray-300 rounded-lg resize-none h-24 focus:outline-none focus:border-blue-500" 
                        placeholder="Tell us how we could improve the platform..."
                    ></textarea>
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200"
                >
                    Send your feedback
                </button>
            </form>
        </div>
        </main>

    </div>

    <!-- Thank You Modal (Hidden by default) -->
    <div id="thankYouModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
        <div class="bg-white rounded-2xl p-8 w-full max-w-md text-center border border-blue-100">
            <div class="mb-4">
                <div class="inline-flex items-center justify-center w-12 h-12 bg-green-100 rounded-full mb-4">
                    <span class="text-green-600 text-2xl">✓</span>
                </div>
                <h3 class="text-2xl font-bold text-blue-700 mb-2">Thank You!</h3>
                <p class="text-gray-600 mb-2">We've received your feedback.</p>
                <p class="text-gray-600 mb-2">Our team will review your message carefully.</p>
                <p class="text-gray-600 mb-6">Thank you for helping us improve Ulixai!</p>
            </div>
            <button 
                id="backToUlixar" 
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition-colors duration-200 flex items-center justify-center mx-auto"
            >
                <span class="mr-2">←</span>
                Back to Ulixai
            </button>
        </div>
    </div>

     @include('includes.footer')

    <script>
        const feedbackForm = document.getElementById('feedbackForm');
        const bugForm = document.getElementById('bugForm');
        const thankYouModal = document.getElementById('thankYouModal');
        const backToUlixar = document.getElementById('backToUlixar');

        feedbackForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Hide the form
            bugForm.style.display = 'none';
            
            // Show the thank you modal
            thankYouModal.classList.remove('hidden');
        });

        backToUlixar.addEventListener('click', function() {
            // Hide the modal
            thankYouModal.classList.add('hidden');
            
            // Show the form again
            bugForm.style.display = 'block';
            
            // Reset the form
            feedbackForm.reset();
        });

        // Close modal when clicking outside
        thankYouModal.addEventListener('click', function(e) {
            if (e.target === thankYouModal) {
                thankYouModal.classList.add('hidden');
                bugForm.style.display = 'block';
                feedbackForm.reset();
            }
        });
    </script>
</body>
</html>