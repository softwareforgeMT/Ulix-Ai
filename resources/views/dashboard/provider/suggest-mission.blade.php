<div id="suggestMissionModal" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl shadow-lg p-8 w-full max-w-md relative">
            <button id="closeSuggestMissionModal" class="absolute top-2 right-2 bg-gray-200 rounded-full p-1 hover:bg-gray-300">
                <i class="fas fa-times text-xl text-gray-700"></i>
            </button>
            <!-- Step 1 -->
            <div id="suggestStep1">
                <h2 class="text-2xl font-bold text-center mb-6 text-blue-900">Select your category</h2>
                <form>
                    <div class="mb-4">
                        <label class="block font-semibold mb-1" for="category">Category:</label>
                        <select id="category" class="w-full border rounded px-3 py-2">
                            <option value="">-- Select Category --</option>
                            <!-- Populate dynamically as needed -->
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block font-semibold mb-1" for="subcategory">Subcategory:</label>
                        <select id="subcategory" class="w-full border rounded px-3 py-2">
                            <option value="">-- Select Subcategory --</option>
                            <!-- Populate dynamically as needed -->
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block font-semibold mb-1" for="subsubcategory">Sub-subcategory:</label>
                        <select id="subsubcategory" class="w-full border rounded px-3 py-2">
                            <option value="">-- Select Sub-subcategory --</option>
                            <!-- Populate dynamically as needed -->
                        </select>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" id="toStep2Btn" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Next</button>
                    </div>
                </form>
                <div class="mt-6">
                    <div class="w-full h-2 bg-gray-200 rounded">
                        <div class="h-2 bg-blue-500 rounded" style="width: 25%"></div>
                    </div>
                </div>
            </div>
            <!-- Step 2 -->
            <div id="suggestStep2" class="hidden">
                <h2 class="text-2xl font-bold text-center mb-6 text-blue-900">In which country is your need?</h2>
                <form>
                    <input type="text" id="countryInput" class="w-full border  bg-gray-100 rounded px-3 py-3 mb-8 text-lg placeholder-gray-400" placeholder="ex: USA" required />
                    <div class="flex justify-between items-center">
                        <button type="button" id="backToStep1Btn" class="text-blue-600 font-semibold">Back</button>
                        <button type="button" id="toStep3Btn" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Next</button>
                    </div>
                    <div class="mt-6">
                        <div class="w-full h-2 bg-gray-200 rounded">
                            <div class="h-2 bg-blue-500 rounded" style="width: 40%"></div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Step 3 -->
            <div id="suggestStep3" class="hidden">
                <h2 class="text-2xl font-bold text-center mb-6 text-blue-700">What is your country of origin?</h2>
                <form>
                    <input type="text" id="originCountryInput" class="w-full border border-blue-200 bg-gray-100 rounded px-3 py-3 mb-4 text-lg placeholder-gray-400" placeholder="ex: Bangkok, New York..." required />
                    <!-- <div class="bg-yellow-100 border-l-4 border-yellow-400 text-yellow-800 px-4 py-3 mb-8 rounded flex items-center justify-center">
                        <span class="font-semibold mx-auto text-center">It is important to know the local legislation</span>
                    </div> -->
                    <div class="flex justify-between items-center">
                        <button type="button" id="backToStep2Btn" class="text-blue-600 font-semibold">Back</button>
                        <button type="button" id="toStep4Btn" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Next</button>
                    </div>
                    <div class="mt-6">
                        <div class="w-full h-2 bg-gray-200 rounded">
                            <div class="h-2 bg-blue-600 rounded" style="width: 60%"></div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Step 4 -->
            <div id="suggestStep4" class="hidden">
                <h2 class="text-2xl font-bold text-center mb-6" style="color:#2563eb;">What city are you currently in?</h2>
                <form>
                    <input type="text" id="currentCityInput" class="w-full border border-blue-200 bg-gray-200 rounded px-3 py-3 mb-8 text-lg placeholder-gray-400" placeholder="ex: Bangkok, New York..." required />
                    <div class="flex justify-between items-center mb-2">
                        <button type="button" id="backToStep3Btn" class="text-blue-600 font-semibold">Back</button>
                        <button type="button" id="toStep5Btn" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">Next</button>
                    </div>
                    <div class="mt-6">
                        <div class="w-full h-2 bg-gray-200 rounded">
                            <div class="h-2 rounded" style="width: 80%; background:#2563eb;"></div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Step 5 -->
            <div id="suggestStep5" class="hidden">
                <h2 class="text-2xl font-bold text-center mb-8" style="color:#2563eb;">How long have you been here?</h2>
                <form>
                    <div class="grid grid-cols-2 gap-4 max-w-lg mx-auto mb-8">
                        <button type="button" class="duration-btn border border-blue-500 rounded-full py-3 text-center text-blue-700 font-semibold transition">Not yet arrived</button>
                        <button type="button" class="duration-btn border border-blue-500 rounded-full py-3 text-center text-blue-700 font-semibold transition">1 - 7 days</button>
                        <button type="button" class="duration-btn border border-blue-500 rounded-full py-3 text-center text-blue-700 font-semibold transition">1 - 4 weeks</button>
                        <button type="button" class="duration-btn border border-blue-500 rounded-full py-3 text-center text-blue-700 font-semibold transition">1 - 12 months</button>
                        <button type="button" class="duration-btn border border-blue-500 rounded-full py-3 text-center text-blue-700 font-semibold transition">1 - 2 years</button>
                        <button type="button" class="duration-btn border border-blue-500 rounded-full py-3 text-center text-blue-700 font-semibold transition">2 - 5 years</button>
                        <button type="button" class="duration-btn col-span-2 border border-blue-500 rounded-full py-3 text-center text-blue-700 font-semibold transition">More than 5 years</button>
                    </div>
                    <input type="hidden" id="durationHere" name="durationHere" />
                    <div class="flex justify-between items-center">
                        <button type="button" id="backToStep4Btn" class="text-blue-600 font-semibold">Back</button>
                        <button type="button" id="toStep6Btn" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">Next</button>
                    </div>
                    <div class="mt-6">
                        <div class="w-full h-2 bg-gray-200 rounded">
                            <div class="h-2 rounded" style="width: 95%; background:#2563eb;"></div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Step 6 -->
            <div id="suggestStep6" class="hidden">
                <h2 class="text-2xl font-bold text-center mb-8" style="color:#2563eb;">What title do you want for your request for help?</h2>
                <form>
                    <input type="text" id="requestTitle" class="w-full border border-blue-300 bg-gray-100 rounded px-3 py-3 mb-6 text-lg placeholder-gray-400" placeholder="I need someone to warm her meal," required />
                    <label for="moreDetails" class="block font-semibold mb-2 text-blue-800">CAN YOU GIVE US MORE DETAILS?</label>
                    <textarea id="moreDetails" rows="5" maxlength="1500" placeholder="Describe the circumstances, dates, places, people involved..." class="w-full border border-blue-300 bg-gray-100 rounded px-3 py-3 mb-2 resize-none"></textarea>
                    <div class="text-right text-sm text-gray-500 mb-4" id="charCount">0 / 1500</div>
                    <div class="flex justify-between items-center">
                        <button type="button" id="backToStep5Btn" class="text-blue-600 font-semibold">Back</button>
                        <button type="button" id="toStep7Btn" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">Next</button>
                    </div>
                    <div class="mt-6">
                        <div class="w-full h-2 bg-gray-200 rounded">
                            <div class="h-2 rounded" style="width: 100%; background:#2563eb;"></div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Step 7 -->
            <div id="suggestStep7" class="hidden">
                <h2 class="text-2xl font-bold text-center mb-8" style="color:#2563eb;">Add photos if you wish</h2>
                <form>
                    <div class="flex justify-center mb-8">
                        <div class="flex border-2 border-blue-300 rounded-2xl p-6 gap-6 bg-white" style="box-shadow:0 0 0 2px #2563eb22;">
                            <!-- 3 photo upload slots -->
                            <?php for ($i = 0; $i < 3; $i++): ?>
                            <div class="flex flex-col items-center px-2 py-1">
                                <button type="button" class="photo-menu-btn flex flex-col items-center group focus:outline-none" data-index="<?= $i ?>">
                                    <div class="w-16 h-16 rounded-full bg-blue-50 flex items-center justify-center border-2 border-blue-200 group-hover:border-blue-500 transition">
                                        <img src="https://cdn-icons-png.flaticon.com/512/545/545682.png" alt="Upload" class="w-10 h-10 photo-preview" id="photoPreview<?= $i ?>" />
                                    </div>
                                    <span class="text-blue-700 font-medium text-xs mt-2">Upload photo</span>
                                </button>
                                <input type="file" accept="image/*" class="hidden photo-input" id="photoInput<?= $i ?>" />
                            </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <button type="button" id="backToStep6Btn" class="text-blue-600 font-semibold">Back</button>
                        <button type="submit" id="finishMissionBtn" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-2 rounded text-lg font-semibold">Next</button>
                    </div>
                    <div class="mt-8">
                        <div class="w-full h-2 bg-blue-100 rounded">
                            <div class="h-2 bg-blue-600 rounded" style="width: 100%"></div>
                        </div>
                    </div>
                </form>
                <!-- Photo Menu Modal -->
                <div id="photoMenuModal" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 hidden">
                  <div class="bg-white rounded-xl shadow-lg p-6 w-80 flex flex-col gap-2">
                    <button type="button" class="photo-menu-option flex items-center gap-3 px-4 py-3 rounded hover:bg-blue-50" data-action="library">
                      <i class="fa fa-image text-blue-600"></i>
                      <span>Photo Library</span>
                    </button>
                    <button type="button" class="photo-menu-option flex items-center gap-3 px-4 py-3 rounded hover:bg-blue-50" data-action="camera">
                      <i class="fa fa-camera text-blue-600"></i>
                      <span>Take a Photo</span>
                    </button>
                    <button type="button" class="photo-menu-option flex items-center gap-3 px-4 py-3 rounded hover:bg-blue-50" data-action="file">
                      <i class="fa fa-folder text-blue-600"></i>
                      <span>Choose File</span>
                    </button>
                    <button type="button" id="closePhotoMenuModal" class="mt-2 text-gray-500 hover:text-blue-700 text-center">Cancel</button>
                  </div>
                </div>
                <!-- Camera Modal -->
                <div id="cameraModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 hidden">
                  <div class="bg-white rounded-xl p-6 flex flex-col items-center relative">
                    <button id="closeCameraModal" class="absolute top-2 right-2 text-gray-600 hover:text-black text-xl">&times;</button>
                    <video id="cameraVideo" width="320" height="240" autoplay class="rounded mb-4"></video>
                    <button id="capturePhotoBtn" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Capture Photo</button>
                  </div>
                </div>
            </div>
            <!-- Step 8 -->
            <div id="suggestStep8" class="hidden">
                <h2 class="text-2xl font-bold text-center mb-8" style="color:#2563eb;">What type of help do you need?</h2>
                <div class="text-center mb-6">
                    <span class="font-semibold text-lg text-blue-800">How can you provide support?</span>
                </div>
                <form>
                    <div class="space-y-5 max-w-xl mx-auto mb-8">
                        <div class="flex items-center justify-between border border-blue-300 rounded-full px-6 py-3">
                            <span class="text-base font-medium">Online</span>
                            <div class="flex gap-2">
                                <button type="button" class="toggle-btn border border-blue-500 rounded-full px-5 py-1 text-blue-700 font-semibold bg-white transition" data-group="online" data-value="yes">Yes</button>
                                <button type="button" class="toggle-btn border border-blue-500 rounded-full px-5 py-1 text-blue-700 font-semibold bg-white transition" data-group="online" data-value="no">No</button>
                            </div>
                        </div>
                        <div class="flex items-center justify-between border border-blue-300 rounded-full px-6 py-3">
                            <span class="text-base font-medium">In person</span>
                            <div class="flex gap-2">
                                <button type="button" class="toggle-btn border border-blue-500 rounded-full px-5 py-1 text-blue-700 font-semibold bg-white transition" data-group="inperson" data-value="yes">Yes</button>
                                <button type="button" class="toggle-btn border border-blue-500 rounded-full px-5 py-1 text-blue-700 font-semibold bg-white transition" data-group="inperson" data-value="no">No</button>
                            </div>
                        </div>
                        <div class="flex items-center justify-between border border-blue-300 rounded-full px-6 py-3">
                            <span class="text-base font-medium">I don't know</span>
                            <div class="flex gap-2">
                                <button type="button" class="toggle-btn border border-blue-500 rounded-full px-5 py-1 text-blue-700 font-semibold bg-white transition" data-group="unknown" data-value="yes">Yes</button>
                                <button type="button" class="toggle-btn border border-blue-500 rounded-full px-5 py-1 text-blue-700 font-semibold bg-white transition" data-group="unknown" data-value="no">No</button>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="helpOnline" name="helpOnline" />
                    <input type="hidden" id="helpInPerson" name="helpInPerson" />
                    <input type="hidden" id="helpUnknown" name="helpUnknown" />
                    <div class="flex justify-between items-center">
                        <button type="button" id="backToStep7Btn" class="text-blue-600 font-semibold">Back</button>
                        <button type="submit" id="toStep9Btn" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-2 rounded text-lg font-semibold">Next</button>
                    </div>
                    <div class="mt-8">
                        <div class="w-full h-2 bg-blue-100 rounded">
                            <div class="h-2 bg-blue-600 rounded" style="width: 100%"></div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Step 9 -->
            <div id="suggestStep9" class="hidden">
                <h2 class="text-2xl font-bold text-center mb-8" style="color:#2563eb;">How soon do you need this service?</h2>
                <div class="text-center mb-6">
                    <span class="text-blue-600 font-medium">Please select an option below</span>
                </div>
                <form>
                    <div class="space-y-4 max-w-xl mx-auto mb-8">
                        <button type="button" class="urgency-btn w-full flex items-center justify-between border border-blue-300 rounded-xl px-6 py-4 text-lg font-medium text-blue-700 bg-white transition">
                            It's urgent
                            <span class="ml-4 w-6 h-6 flex items-center justify-center rounded-full border-2 border-blue-300">
                                <span class="urgency-radio bg-white w-3 h-3 rounded-full block"></span>
                            </span>
                        </button>
                        <button type="button" class="urgency-btn w-full flex items-center justify-between border border-blue-300 rounded-xl px-6 py-4 text-lg font-medium text-blue-700 bg-white transition">
                            Within a week
                            <span class="ml-4 w-6 h-6 flex items-center justify-center rounded-full border-2 border-blue-300">
                                <span class="urgency-radio bg-white w-3 h-3 rounded-full block"></span>
                            </span>
                        </button>
                        <button type="button" class="urgency-btn w-full flex items-center justify-between border border-blue-300 rounded-xl px-6 py-4 text-lg font-medium text-blue-700 bg-white transition">
                            Between 1 and 2 weeks
                            <span class="ml-4 w-6 h-6 flex items-center justify-center rounded-full border-2 border-blue-300">
                                <span class="urgency-radio bg-white w-3 h-3 rounded-full block"></span>
                            </span>
                        </button>
                        <button type="button" class="urgency-btn w-full flex items-center justify-between border border-blue-300 rounded-xl px-6 py-4 text-lg font-medium text-blue-700 bg-white transition">
                            Between 2 weeks and 1 month
                            <span class="ml-4 w-6 h-6 flex items-center justify-center rounded-full border-2 border-blue-300">
                                <span class="urgency-radio bg-white w-3 h-3 rounded-full block"></span>
                            </span>
                        </button>
                        <button type="button" class="urgency-btn w-full flex items-center justify-between border border-blue-300 rounded-xl px-6 py-4 text-lg font-medium text-blue-700 bg-white transition">
                            More than a month
                            <span class="ml-4 w-6 h-6 flex items-center justify-center rounded-full border-2 border-blue-300">
                                <span class="urgency-radio bg-white w-3 h-3 rounded-full block"></span>
                            </span>
                        </button>
                    </div>
                    <input type="hidden" id="urgencyValue" name="urgencyValue" />
                    <div class="flex justify-between items-center">
                        <button type="button" id="backToStep8Btn" class="text-blue-600 font-semibold">Back</button>
                        <button type="submit" id="finishAllBtn" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-2 rounded text-lg font-semibold">Next</button>
                    </div>
                    <div class="mt-8">
                        <div class="w-full h-2 bg-blue-100 rounded">
                            <div class="h-2 bg-blue-600 rounded" style="width: 100%"></div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Step 10 -->
            <div id="suggestStep10" class="hidden">
                <h2 class="text-2xl font-bold text-center mb-8" style="color:#2563eb;">Which language do you speak?</h2>
                <form>
                    <div class="grid grid-cols-2 md:grid-cols-2 gap-4 max-w-2xl mx-auto mb-8">
                        <button type="button" class="lang-btn flex items-center gap-3 px-6 py-3 rounded-xl bg-blue-500 text-white font-medium text-lg transition border-2 border-blue-500">
                            <img src="https://flagcdn.com/us.svg" alt="English" class="w-7 h-5 rounded shadow" /> English
                        </button>
                        <button type="button" class="lang-btn flex items-center gap-3 px-6 py-3 rounded-xl bg-blue-500 text-white font-medium text-lg transition border-2 border-blue-500">
                            <img src="https://flagcdn.com/fr.svg" alt="French" class="w-7 h-5 rounded shadow" /> French
                        </button>
                        <button type="button" class="lang-btn flex items-center gap-3 px-6 py-3 rounded-xl bg-blue-500 text-white font-medium text-lg transition border-2 border-blue-500">
                            <img src="https://flagcdn.com/es.svg" alt="Spanish" class="w-7 h-5 rounded shadow" /> Spanish
                        </button>
                        <button type="button" class="lang-btn flex items-center gap-3 px-6 py-3 rounded-xl bg-blue-500 text-white font-medium text-lg transition border-2 border-blue-500">
                            <img src="https://flagcdn.com/pt.svg" alt="Portuguese" class="w-7 h-5 rounded shadow" /> Portuguese
                        </button>
                        <button type="button" class="lang-btn flex items-center gap-3 px-6 py-3 rounded-xl bg-blue-500 text-white font-medium text-lg transition border-2 border-blue-500">
                            <img src="https://flagcdn.com/de.svg" alt="German" class="w-7 h-5 rounded shadow" /> German
                        </button>
                        <button type="button" class="lang-btn flex items-center gap-3 px-6 py-3 rounded-xl bg-blue-500 text-white font-medium text-lg transition border-2 border-blue-500">
                            <img src="https://flagcdn.com/it.svg" alt="Italian" class="w-7 h-5 rounded shadow" /> Italian
                        </button>
                        <button type="button" class="lang-btn flex items-center gap-3 px-6 py-3 rounded-xl bg-blue-500 text-white font-medium text-lg transition border-2 border-blue-500">
                            <img src="https://flagcdn.com/sa.svg" alt="Arabic" class="w-7 h-5 rounded shadow" /> Arabic
                        </button>
                        <button type="button" class="lang-btn flex items-center gap-3 px-6 py-3 rounded-xl bg-blue-500 text-white font-medium text-lg transition border-2 border-blue-500">
                            <img src="https://flagcdn.com/jp.svg" alt="Japanese" class="w-7 h-5 rounded shadow" /> Japanese
                        </button>
                        <button type="button" class="lang-btn flex items-center gap-3 px-6 py-3 rounded-xl bg-blue-500 text-white font-medium text-lg transition border-2 border-blue-500">
                            <img src="https://flagcdn.com/kr.svg" alt="Korean" class="w-7 h-5 rounded shadow" /> Korean
                        </button>
                        <button type="button" class="lang-btn flex items-center gap-3 px-6 py-3 rounded-xl bg-blue-500 text-white font-medium text-lg transition border-2 border-blue-500">
                            <img src="https://flagcdn.com/in.svg" alt="Hindi" class="w-7 h-5 rounded shadow" /> Hindi
                        </button>
                        <button type="button" class="lang-btn flex items-center gap-3 px-6 py-3 rounded-xl bg-blue-500 text-white font-medium text-lg transition border-2 border-blue-500">
                            <img src="https://flagcdn.com/tr.svg" alt="Turkish" class="w-7 h-5 rounded shadow" /> Turkish
                        </button>
                    </div>
                    <input type="hidden" id="selectedLanguage" name="selectedLanguage" />
                    <div class="flex justify-between items-center">
                        <button type="button" id="backToStep9Btn" class="text-blue-600 font-semibold">Back</button>
                        <button type="submit" id="finishLangBtn" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-2 rounded text-lg font-semibold">Next</button>
                    </div>
                    <div class="mt-8">
                        <div class="w-full h-2 bg-blue-100 rounded">
                            <div class="h-2 bg-blue-600 rounded" style="width: 100%"></div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Step 11 -->
            <div id="suggestStep11" class="hidden">
                <h2 class="text-2xl font-bold text-center mb-8" style="color:#2563eb;">What's your first name & surname?</h2>
                <form>
                    <div class="max-w-lg mx-auto mb-8">
                        <input type="text" id="firstName" class="w-full border border-blue-200 bg-gray-200 rounded-lg px-4 py-4 mb-6 text-lg placeholder-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Your first name" autocomplete="off" />
                        <input type="text" id="surname" class="w-full border border-blue-200 bg-gray-200 rounded-lg px-4 py-4 mb-6 text-lg placeholder-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Your surname" autocomplete="off" />
                    </div>
                    <div class="flex justify-between items-center">
                        <button type="button" id="backToStep10Btn" class="text-blue-600 font-semibold">Back</button>
                        <button type="submit" id="finishNameBtn" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-2 rounded-lg text-lg font-semibold">Next</button>
                    </div>
                    <div class="mt-8">
                        <div class="w-full h-2 bg-blue-100 rounded">
                            <div class="h-2 bg-blue-600 rounded" style="width: 80%"></div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Step 12 -->
            <div id="suggestStep12" class="hidden">
                <h2 class="text-3xl font-bold text-center mb-8" style="color:#2563eb;">What's your e-mail?</h2>
                <form>
                    <div class="max-w-2xl mx-auto mb-8">
                        <input type="email" id="emailInput" class="w-full border border-blue-200 bg-gray-200 rounded-lg px-4 py-4 mb-6 text-lg placeholder-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Enter your address" autocomplete="off" />
                    </div>
                    <div class="flex justify-between items-center">
                        <button type="button" id="backToStep11Btn" class="text-blue-600 font-semibold">Back</button>
                        <button type="submit" id="finishEmailBtn" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-2 rounded-lg text-lg font-semibold">Next</button>
                    </div>
                    <div class="mt-8">
                        <div class="w-full h-2 bg-blue-100 rounded">
                            <div class="h-2 bg-blue-600 rounded" style="width: 90%"></div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Step 13 -->
            <div id="suggestStep13" class="hidden">
                <h2 class="text-3xl font-bold text-center mb-8" style="color:#2563eb;">What's your password?</h2>
                <form>
                    <div class="max-w-2xl mx-auto mb-8">
                        <input type="password" id="passwordInput" class="w-full border border-blue-200 bg-gray-200 rounded-lg px-4 py-4 mb-6 text-lg placeholder-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Password" autocomplete="off" />
                    </div>
                    <div class="flex justify-between items-center">
                        <button type="button" id="backToStep12Btn" class="text-blue-600 font-semibold">Back</button>
                        <button type="submit" id="finishPasswordBtn" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-2 rounded-lg text-lg font-semibold">Next</button>
                    </div>
                    <div class="mt-8">
                        <div class="w-full h-2 bg-blue-100 rounded">
                            <div class="h-2 bg-blue-600 rounded" style="width: 100%"></div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Step 14 -->
            <div id="suggestStep14" class="hidden">
                <h2 class="text-3xl font-bold text-center mb-8" style="color:#2563eb;">How long should your request be visible?</h2>
                <div class="text-center mb-6 text-lg text-gray-700">Choose the desired duration</div>
                <form>
                    <div class="flex justify-center gap-6 mb-8">
                        <button type="button" class="duration-visible-btn bg-blue-600 text-white px-8 py-3 rounded-lg text-lg font-semibold focus:outline-none">1 week</button>
                        <button type="button" class="duration-visible-btn bg-blue-600 text-white px-8 py-3 rounded-lg text-lg font-semibold focus:outline-none">2 weeks</button>
                        <button type="button" class="duration-visible-btn bg-blue-600 text-white px-8 py-3 rounded-lg text-lg font-semibold focus:outline-none">1 month</button>
                    </div>
                    <input type="hidden" id="visibleDuration" name="visibleDuration" />
                    <div class="bg-yellow-100 border-l-4 border-yellow-400 text-yellow-900 px-6 py-4 mb-8 rounded">
                        <span class="font-bold">Note:</span> Your Service request will be automatically deleted after the selected duration. After you have chosen <a href="#" class="underline text-blue-700">The service provider</a> you will need to submit a new request if you will need help. When you choose a service provider your ad will be archived.
                    </div>
                    <div class="flex justify-between items-center">
                        <button type="button" id="backToStep13Btn" class="text-blue-600 font-semibold">Back</button>
                        <button type="submit" id="finishVisibleBtn" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-2 rounded-lg text-lg font-semibold">Send Request</button>
                    </div>
                    <div class="mt-8">
                        <div class="w-full h-2 bg-blue-100 rounded">
                            <div class="h-2 bg-blue-600 rounded" style="width: 100%"></div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Step 15 -->
            <div id="suggestStep15" class="hidden">
                <div class="flex flex-col items-center justify-center py-16">
                    <div class="mb-4">
                        <span style="font-size:3rem;display:inline-block;transform:rotate(-15deg);">📣</span>
                    </div>
                    <div class="bg-white rounded-xl shadow p-8 text-center max-w-lg border border-blue-100">
                        <h2 class="text-2xl font-bold mb-3 text-blue-900">Your service provider has been notified!</h2>
                        <p class="text-gray-700 text-lg">Your service request is now published and visible on the platform.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>