@extends('admin.dashboard.index')

@section('admin-content')
<div class="mx-auto py-8 px-4">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-2">Create Fake Provider</h1>
        <p class="text-gray-600 text-sm">Add a new fake provider for testing purposes</p>
    </div>

    @if(session('error'))
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded mb-6">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <form method="POST" action="{{ route('admin.fake-content.create') }}" enctype="multipart/form-data" class="p-6">
            @csrf
            <input type="hidden" name="type" value="provider">

            <!-- Basic Information -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">First Name <span class="text-red-500">*</span></label>
                    <input type="text" name="first_name" id="first_name" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                           required>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                    <input type="text" name="last_name" id="last_name" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Gender</label>
                    <select name="gender" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Full Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" id="name" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                           required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Profile Photo</label>
                    <input type="file" name="profile_photo" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           accept="image/*">
                </div>
            </div>

            <!-- Contact Information -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email <span class="text-red-500">*</span></label>
                    <input type="email" name="email" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                           required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                    <input type="text" name="phone_number" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Communication Online</label>
                    <select name="communication_online" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Communication In Person</label>
                    <select name="communication_inperson" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>

            <!-- Location & Languages -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Country <span class="text-red-500">*</span></label>
                    <select name="country" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        <option value="">Select Country</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->country }}">{{ $country->country }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Native Language</label>
                    <select name="native_language" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">Select Language</option>
                        @foreach($languages as $lang)
                            <option value="{{ $lang }}">{{ $lang }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Preferred Language</label>
                    <select name="preferred_language" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">Select Language</option>
                        @foreach($languages as $lang)
                            <option value="{{ $lang }}">{{ $lang }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Languages Spoken</label>
                    <div class="relative">
                        <select name="spoken_language[]" id="spoken_languages" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white" >
                            @foreach($languages as $lang)
                                <option value="{{ $lang }}">{{ $lang }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Operational Countries <span class="text-red-500">*</span>
                    <small class="font-normal text-gray-500">(select at least 2)</small>
                </label>

                {{-- Selected chips will appear here --}}
                <div id="operationalCountriesChips" class="flex flex-wrap gap-2 mb-2"></div>

                <div class="relative">
                    <select multiple
                            name="operational_countries[]"
                            id="operational_countries"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white min-h-[400px]">
                        @foreach($countries as $country)
                            <option value="{{ $country->country }}" class="border mt-2 bg-blue-100 hover:bg-blue-50 rounded p-2" >{{ $country->country }}</option>
                        @endforeach
                    </select>
                    <p class="mt-1 text-xs text-gray-500">Tip: Hold Ctrl (Windows) or Cmd (Mac) to select multiple.</p>
                </div>
            </div>


            <!-- Professional Information -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Category <span class="text-red-500">*</span></label>
                    <select name="category_id" id="categorySelect" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Subcategory</label>
                    <select name="subcategory_id" id="subcategorySelect" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">Select Subcategory</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Sub Subcategory</label>
                    <select name="subsubcategory_id" id="subsubcategorySelect" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">Select Sub Subcategory</option>
                    </select>
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Special Statuses</label>

                {{-- Selected chips will appear here --}}
                <div id="specialStatusesChips" class="flex flex-wrap gap-2 mb-2"></div>

                <div class="relative">
                    <select multiple
                            name="special_status[]"
                            id="special_statuses"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white min-h-[400px]">
                        @foreach($specialStatuses as $status)
                            <option value="{{ $status->stitle }}" class="border mt-2 bg-blue-100 hover:bg-blue-50 rounded p-2">{{ $status->stitle }}</option>
                        @endforeach
                    </select>
                    <p class="mt-1 text-xs text-gray-500">Tip: Hold Ctrl (Windows) or Cmd (Mac) to select multiple.</p>
                </div>
            </div>
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Profile Description</label>
                <textarea name="profile_description" rows="4" 
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                          placeholder="Enter provider description..."></textarea>
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-200">
                <button type="button" onclick="history.back()" 
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Cancel
                </button>
                <button type="submit" 
                        class="px-6 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Create Provider
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-fill full name
    const firstNameInput = document.getElementById('first_name');
    const lastNameInput = document.getElementById('last_name');
    const fullNameInput = document.getElementById('name');

    function updateFullName() {
        const firstName = firstNameInput.value.trim();
        const lastName = lastNameInput.value.trim();
        if (firstName || lastName) {
            fullNameInput.value = `${firstName} ${lastName}`.trim();
        }
    }

    firstNameInput.addEventListener('input', updateFullName);
    lastNameInput.addEventListener('input', updateFullName);

    // Category cascade
    document.getElementById('categorySelect').addEventListener('change', function() {
        const categoryId = this.value;
        const subcategorySelect = document.getElementById('subcategorySelect');
        const subsubcategorySelect = document.getElementById('subsubcategorySelect');
        
        subcategorySelect.innerHTML = '<option value="">Select Subcategory</option>';
        subsubcategorySelect.innerHTML = '<option value="">Select Sub Subcategory</option>';
        
        if (categoryId) {
            subcategorySelect.innerHTML = '<option value="">Loading...</option>';
            
            fetch('/api/categories/' + categoryId + '/subcategories')
                .then(response => response.json())
                .then(data => {
                    subcategorySelect.innerHTML = '<option value="">Select Subcategory</option>';
                    if (data.subcategories && data.subcategories.length > 0) {
                        data.subcategories.forEach(function(subcat) {
                            const option = document.createElement('option');
                            option.value = subcat.id;
                            option.textContent = subcat.name;
                            subcategorySelect.appendChild(option);
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    subcategorySelect.innerHTML = '<option value="">Error loading subcategories</option>';
                });
        }
    });

    document.getElementById('subcategorySelect').addEventListener('change', function() {
        const subcategoryId = this.value;
        const subsubcategorySelect = document.getElementById('subsubcategorySelect');
        
        subsubcategorySelect.innerHTML = '<option value="">Select Sub Subcategory</option>';
        
        if (subcategoryId) {
            subsubcategorySelect.innerHTML = '<option value="">Loading...</option>';
            
            fetch('/api/categories/' + subcategoryId + '/subcategories')
                .then(response => response.json())
                .then(data => {
                    subsubcategorySelect.innerHTML = '<option value="">Select Sub Subcategory</option>';
                    if (data.subcategories && data.subcategories.length > 0) {
                        data.subcategories.forEach(function(subsubcat) {
                            const option = document.createElement('option');
                            option.value = subsubcat.id;
                            option.textContent = subsubcat.name;
                            subsubcategorySelect.appendChild(option);
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    subsubcategorySelect.innerHTML = '<option value="">Error loading sub-subcategories</option>';
                });
        }
    });

    // Form validation
    document.querySelector('form').addEventListener('submit', function(e) {
        const operationalCountries = document.getElementById('operational_countries');
        if (operationalCountries.selectedOptions.length < 2) {
            e.preventDefault();
            alert('Please select at least 2 operational countries.');
            operationalCountries.focus();
            return false;
        }
    });
});
</script>


<script>
document.addEventListener('DOMContentLoaded', function () {
  const ocSelect  = document.getElementById('operational_countries');
  const ocChips   = document.getElementById('operationalCountriesChips');

  const ssSelect  = document.getElementById('special_statuses');
  const ssChips   = document.getElementById('specialStatusesChips');

  function renderChips(selectEl, chipsEl) {
    // Clear chips
    chipsEl.innerHTML = '';

    // For each selected option, render a chip
    Array.from(selectEl.selectedOptions).forEach(opt => {
      const chip = document.createElement('span');
      chip.className = 'inline-flex items-center gap-1 px-2 py-1 rounded-full bg-blue-50 text-blue-700 border border-blue-200 text-xs';
      chip.textContent = opt.textContent;

      const btn = document.createElement('button');
      btn.type = 'button';
      btn.className = 'ml-1 rounded-full w-4 h-4 flex items-center justify-center bg-blue-100 hover:bg-blue-200 text-blue-700';
      btn.innerHTML = '&times;';
      btn.addEventListener('click', () => {
        // deselect this option and re-render
        opt.selected = false;
        // Trigger change so any listeners (like validation) run
        selectEl.dispatchEvent(new Event('change', { bubbles: true }));
        renderChips(selectEl, chipsEl);
      });

      chip.appendChild(btn);
      chipsEl.appendChild(chip);
    });
  }

  // Initial render (in case of old input/validation back)
  renderChips(ocSelect, ocChips);
  renderChips(ssSelect, ssChips);

  // Re-render on change
  ocSelect.addEventListener('change', () => renderChips(ocSelect, ocChips));
  ssSelect.addEventListener('change', () => renderChips(ssSelect, ssChips));

  // Strengthen your existing validation: require >= 2 operational countries
  const form = document.querySelector('form');
  form.addEventListener('submit', function (e) {
    if (ocSelect.selectedOptions.length < 2) {
      e.preventDefault();
      alert('Please select at least 2 operational countries.');
      ocSelect.focus();
    }
  });
});
</script>
    
@endsection