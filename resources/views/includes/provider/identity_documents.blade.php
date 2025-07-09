<div id="step11" class="hidden space-y-6">
  <h2 class="text-blue-900 font-bold text-xl mb-2">MY IDENTITY DOCUMENTS</h2>
  <p class="text-sm text-blue-600 mb-6">Click on the document you are going to send us</p>

  <div class="space-y-4">
    <button onclick="openDocumentModal('european_id')" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium w-full py-3 rounded-xl transition">
      European identity card
    </button>
    <button onclick="openDocumentModal('passport')" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium w-full py-3 rounded-xl transition">
      Passport
    </button>
    <button onclick="openDocumentModal('license')" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium w-full py-3 rounded-xl transition">
      Driver’s license
    </button>
  </div>

  <div class="flex justify-between items-center mt-6">
    <button id="backToStep10" class="text-blue-600 font-medium"> Back</button>
    <button id="nextStep11" class="bg-blue-500 hover:bg-blue-600 text-white font-medium px-6 py-2 rounded-full" disabled>Next</button>
  </div>
  <div class="mt-6">
    <div class="w-full h-2 rounded-full overflow-hidden">
    </div>
  </div>
</div>

<!-- European Identity Card Modal -->
<div id="modal-european_id" class="fixed inset-0 bg-black/40 z-50 flex items-center justify-center hidden">
  <div class="bg-white rounded-xl p-8 shadow-xl w-full max-w-xl relative">
    <h3 class="text-xl font-bold mb-6 text-blue-900">I SEND MY IDENTITY CARD</h3>
    <div class="flex justify-center gap-8 mb-8">
      <div class="flex flex-col items-center">
        <span class="mb-2 text-blue-700 font-semibold">Front</span>
        <label class="flex flex-col items-center justify-center border-2 border-blue-200 rounded-xl w-48 h-48 cursor-pointer hover:border-blue-400 transition">
          <input type="file" accept="image/*" id="upload-european_id-front" class="hidden" />
          <div id="preview-european_id-front" class="flex flex-col items-center">
            <i class="fa-regular fa-image text-4xl text-blue-300 mb-2"></i>
            <span class="border border-blue-200 rounded-full px-4 py-1 text-blue-600 text-sm bg-blue-50">Upload photo</span>
          </div>
        </label>
      </div>
      <div class="flex flex-col items-center">
        <span class="mb-2 text-blue-700 font-semibold">Back</span>
        <label class="flex flex-col items-center justify-center border-2 border-blue-200 rounded-xl w-48 h-48 cursor-pointer hover:border-blue-400 transition">
          <input type="file" accept="image/*" id="upload-european_id-back" class="hidden" />
          <div id="preview-european_id-back" class="flex flex-col items-center">
            <i class="fa-regular fa-image text-4xl text-blue-300 mb-2"></i>
            <span class="border border-blue-200 rounded-full px-4 py-1 text-blue-600 text-sm bg-blue-50">Upload photo</span>
          </div>
        </label>
      </div>
    </div>
    <div class="flex justify-between items-center mt-6">
      <button onclick="closeDocumentModal('european_id')" class="text-blue-600 font-semibold">BACK</button>
      <button id="next-european_id" onclick="saveDocument('european_id')" class="bg-blue-500 text-white font-semibold px-8 py-2 rounded-full disabled:opacity-50" disabled>NEXT</button>
    </div>
    <div class="w-full mt-6">
      <div class="h-2 rounded-full bg-blue-100">
        <div class="h-full bg-blue-400 rounded-full" style="width: 65%;"></div>
      </div>
    </div>
  </div>
</div>

<!-- Passport Modal -->
<div id="modal-passport" class="fixed inset-0 bg-black/40 z-50 flex items-center justify-center hidden">
  <div class="bg-white rounded-xl p-8 shadow-xl w-full max-w-xl relative">
    <h3 class="text-xl font-bold mb-6 text-blue-900">I SEND MY PASSPORT</h3>
    <div class="flex justify-center mb-8">
      <div class="flex flex-col items-center">
        <label class="flex flex-col items-center justify-center border-2 border-blue-200 rounded-xl w-48 h-48 cursor-pointer hover:border-blue-400 transition">
          <input type="file" accept="image/*" id="upload-passport-front" class="hidden" />
          <div id="preview-passport-front" class="flex flex-col items-center">
            <i class="fa-regular fa-image text-4xl text-blue-300 mb-2"></i>
            <span class="border border-blue-200 rounded-full px-4 py-1 text-blue-600 text-sm bg-blue-50">Upload photo</span>
          </div>
        </label>
      </div>
    </div>
    <div class="flex justify-between items-center mt-6">
      <button onclick="closeDocumentModal('passport')" class="text-blue-600 font-semibold">BACK</button>
      <button id="next-passport" onclick="saveDocument('passport')" class="bg-blue-500 text-white font-semibold px-8 py-2 rounded-full disabled:opacity-50" disabled>NEXT</button>
    </div>
    <div class="w-full mt-6">
      <div class="h-2 rounded-full bg-blue-100">
        <div class="h-full bg-blue-400 rounded-full" style="width: 65%;"></div>
      </div>
    </div>
  </div>
</div>

<!-- Driver's License Modal -->
<div id="modal-license" class="fixed inset-0 bg-black/40 z-50 flex items-center justify-center hidden">
  <div class="bg-white rounded-xl p-8 shadow-xl w-full max-w-xl relative">
    <h3 class="text-xl font-bold mb-6 text-blue-900">I SEND MY DRIVER'S LICENCE</h3>
    <div class="flex justify-center gap-8 mb-8">
      <div class="flex flex-col items-center">
        <span class="mb-2 text-blue-700 font-semibold">Front</span>
        <label class="flex flex-col items-center justify-center border-2 border-blue-200 rounded-xl w-48 h-48 cursor-pointer hover:border-blue-400 transition">
          <input type="file" accept="image/*" id="upload-license-front" class="hidden" />
          <div id="preview-license-front" class="flex flex-col items-center">
            <i class="fa-regular fa-image text-4xl text-blue-300 mb-2"></i>
            <span class="border border-blue-200 rounded-full px-4 py-1 text-blue-600 text-sm bg-blue-50">Upload photo</span>
          </div>
        </label>
      </div>
      <div class="flex flex-col items-center">
        <span class="mb-2 text-blue-700 font-semibold">Back</span>
        <label class="flex flex-col items-center justify-center border-2 border-blue-200 rounded-xl w-48 h-48 cursor-pointer hover:border-blue-400 transition">
          <input type="file" accept="image/*" id="upload-license-back" class="hidden" />
          <div id="preview-license-back" class="flex flex-col items-center">
            <i class="fa-regular fa-image text-4xl text-blue-300 mb-2"></i>
            <span class="border border-blue-200 rounded-full px-4 py-1 text-blue-600 text-sm bg-blue-50">Upload photo</span>
          </div>
        </label>
      </div>
    </div>
    <div class="flex justify-between items-center mt-6">
      <button onclick="closeDocumentModal('license')" class="text-blue-600 font-semibold">BACK</button>
      <button id="next-license" onclick="saveDocument('license')" class="bg-blue-500 text-white font-semibold px-8 py-2 rounded-full disabled:opacity-50" disabled>NEXT</button>
    </div>
    <div class="w-full mt-6">
      <div class="h-2 rounded-full bg-blue-100">
        <div class="h-full bg-blue-400 rounded-full" style="width: 65%;"></div>
      </div>
    </div>
  </div>
</div>

<script>
  function openDocumentModal(type) {
    ['european_id', 'passport', 'license'].forEach(t => {
      document.getElementById('modal-' + t).classList.add('hidden');
    });
    document.getElementById('modal-' + type).classList.remove('hidden');
  }
  function closeDocumentModal(type) {
    document.getElementById('modal-' + type).classList.add('hidden');
    // Clear file inputs and previews
    if (type === 'european_id' || type === 'license') {
      ['front', 'back'].forEach(side => {
        document.getElementById('upload-' + type + '-' + side).value = '';
        resetPreview(type, side);
      });
    } else {
      document.getElementById('upload-' + type + '-front').value = '';
      resetPreview(type, 'front');
    }
    setNextButtonState(type, false);
    updateStep11NextButton();
  }

  function resetPreview(type, side) {
    const preview = document.getElementById('preview-' + type + '-' + side);
    if (preview) {
      preview.innerHTML = `
        <i class="fa-regular fa-image text-4xl text-blue-300 mb-2"></i>
        <span class="border border-blue-200 rounded-full px-4 py-1 text-blue-600 text-sm bg-blue-50">Upload photo</span>
      `;
    }
  }

  // Preview image and enable NEXT if all required images are uploaded
  ['european_id', 'license'].forEach(type => {
    ['front', 'back'].forEach(side => {
      const input = document.getElementById('upload-' + type + '-' + side);
      if (input) {
        input.addEventListener('change', function(e) {
          const file = e.target.files[0];
          const preview = document.getElementById('preview-' + type + '-' + side);
          if (file) {
            const reader = new FileReader();
            reader.onload = function(ev) {
              preview.innerHTML = `<img src="${ev.target.result}" class="w-full h-40 object-contain rounded shadow"/>`;
            };
            reader.readAsDataURL(file);
          } else {
            resetPreview(type, side);
          }
          setNextButtonState(type, checkBothImagesUploaded(type));
        });
      }
    });
  });

  // Passport (single image)
  const passportInput = document.getElementById('upload-passport-front');
  if (passportInput) {
    passportInput.addEventListener('change', function(e) {
      const file = e.target.files[0];
      const preview = document.getElementById('preview-passport-front');
      if (file) {
        const reader = new FileReader();
        reader.onload = function(ev) {
          preview.innerHTML = `<img src="${ev.target.result}" class="w-full h-40 object-contain rounded shadow"/>`;
        };
        reader.readAsDataURL(file);
      } else {
        resetPreview('passport', 'front');
      }
      setNextButtonState('passport', !!file);
    });
  }

  function checkBothImagesUploaded(type) {
    const front = document.getElementById('upload-' + type + '-front').files.length > 0;
    const back = document.getElementById('upload-' + type + '-back').files.length > 0;
    return front && back;
  }

  function setNextButtonState(type, enabled) {
    const btn = document.getElementById('next-' + type);
    if (btn) btn.disabled = !enabled;
  }

  // Utility: Check if at least one document is present in localStorage
  function hasAnyDocument() {
    const expats = JSON.parse(localStorage.getItem('expats')) || {};
    const docs = expats.documents || {};
    return !!(docs.passport || docs.european_id || docs.license);
  }

  // Enable/disable the Next button for step 11
  function updateStep11NextButton() {
    const btn = document.getElementById('nextStep11');
    if (btn) btn.disabled = !hasAnyDocument();
  }

  // Save document to localStorage under expats.documents
  function saveDocument(type) {
    let expats = JSON.parse(localStorage.getItem('expats')) || {};
    expats.documents = expats.documents || {};
    if (type === 'european_id' || type === 'license') {
      const frontInput = document.getElementById('upload-' + type + '-front');
      const backInput = document.getElementById('upload-' + type + '-back');
      if (!frontInput.files[0] || !backInput.files[0]) {
        alert('Please upload both front and back images.');
        return;
      }
      const readerFront = new FileReader();
      const readerBack = new FileReader();
      readerFront.onload = function(evFront) {
        readerBack.onload = function(evBack) {
          expats.documents[type] = {
            front: evFront.target.result,
            back: evBack.target.result,
            uploaded_at: new Date().toISOString()
          };
          localStorage.setItem('expats', JSON.stringify(expats));
          closeDocumentModal(type);
          updateStep11NextButton();
        };
        readerBack.readAsDataURL(backInput.files[0]);
      };
      readerFront.readAsDataURL(frontInput.files[0]);
    } else if (type === 'passport') {
      const input = document.getElementById('upload-passport-front');
      if (!input.files[0]) {
        alert('Please upload your passport image.');
        return;
      }
      const reader = new FileReader();
      reader.onload = function(ev) {
        expats.documents[type] = {
          image: ev.target.result,
          uploaded_at: new Date().toISOString()
        };
        localStorage.setItem('expats', JSON.stringify(expats));
        closeDocumentModal(type);
        updateStep11NextButton();
      };
      reader.readAsDataURL(input.files[0]);
    }
  }

  // On page load, set the correct state for the Next button
  document.addEventListener('DOMContentLoaded', function () {
    updateStep11NextButton();
  });
</script>
