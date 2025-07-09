@extends('dashboard.layouts.master')
@section('title', 'Upload  Profile')
@section('content')
<div class="flex justify-center items-start min-h-screen p-6 bg-gradient-to-br from-white to-blue-50">

  <div class="bg-white rounded-3xl shadow-lg p-6 sm:p-8 max-w-xl w-full text-center space-y-6">

    <h2 class="text-blue-900 font-bold text-lg sm:text-xl">MY PROFILE PICTURE</h2>
    <p class="text-sm text-blue-600">Take a photo of yourself, preferably on a white background</p>

    @if(session('success'))
      <div class="text-green-600">{{ session('success') }}</div>
    @elseif(session('error'))
      <div class="text-red-600">{{ session('error') }}</div>
    @endif

    <form method="POST" enctype="multipart/form-data" action="{{ route('profile.photo.upload') }}" class="space-y-4" id="photoForm">
      @csrf
      <div class="border-2 border-blue-400 rounded-xl p-4 flex flex-col items-center gap-2">

        @if(session('uploaded_profile_picture'))
          <img src="{{ asset('storage/' . session('uploaded_profile_picture')) }}" alt="Uploaded" class="w-28 h-28 object-cover rounded-full border mb-2">
        @else
          <video id="camera" class="hidden w-28 h-28 object-cover rounded-full mb-2" autoplay></video>
          <canvas id="canvas" class="hidden"></canvas>
          <img id="preview" class="w-20 h-20 object-contain mb-2 opacity-60" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="preview" />
        @endif

        <label for="profile_picture" class="cursor-pointer border border-blue-400 text-blue-500 px-4 py-1 rounded-full text-sm hover:bg-blue-50 transition">
          Upload photo
        </label>
        <input type="file" name="profile_picture" id="profile_picture" accept="image/*" class="hidden" onchange="previewImage(event)">

        <button type="button" onclick="startCamera()" class="mt-2 border border-blue-400 text-blue-500 px-4 py-1 rounded-full text-sm hover:bg-blue-50 transition">
          📸 Take a Live Photo
        </button>
      </div>

      <input type="file" name="profile_picture" id="captured_file" class="hidden">

      <button type="submit" class="text-blue-600 underline font-semibold text-sm hover:text-blue-800">
        I validate
      </button>
    </form>
  </div>
</div>
@endsection

@section('scripts')
<script>
function previewImage(event) {
  const reader = new FileReader();
  reader.onload = function () {
    const output = document.getElementById('preview');
    output.src = reader.result;
    output.classList.remove('opacity-60');
  };
  reader.readAsDataURL(event.target.files[0]);
}

function startCamera() {
  const video = document.getElementById('camera');
  const canvas = document.getElementById('canvas');
  const preview = document.getElementById('preview');

  navigator.mediaDevices.getUserMedia({ video: true })
    .then(stream => {
      video.srcObject = stream;
      video.classList.remove('hidden');
      preview.classList.add('hidden');

      setTimeout(() => {
        const context = canvas.getContext('2d');
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        context.drawImage(video, 0, 0, canvas.width, canvas.height);

        stream.getTracks().forEach(track => track.stop());

        canvas.toBlob(blob => {
          const file = new File([blob], 'webcam_photo.jpg', { type: 'image/jpeg' });
          const dataTransfer = new DataTransfer();
          dataTransfer.items.add(file);
          const fileInput = document.getElementById('captured_file');
          fileInput.files = dataTransfer.files;
          document.getElementById('photoForm').submit();
        }, 'image/jpeg');
      }, 3000);
    })
    .catch(err => {
      alert('Could not access camera: ' + err.message);
    });
}
</script>
@endsection
