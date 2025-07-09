<div id="step7" class="hidden">
  <h2 class="font-bold mb-4 text-xl text-blue-700">DO YOU HAVE A SPECIAL STATUS?</h2>

  <div class="w-full mb-4 rounded-lg bg-yellow-100 border-l-4 border-yellow-400 py-2 px-4 text-center">
    <span class="text-brown-700" style="color:#8B5C00;font-weight:500;">Not obligatory but better for you</span>
  </div>

  <div class="space-y-3 mb-6 max-h-56 overflow-auto">
    @php
      $statuses = [
        'Expatriates for 2 to 5 years' => 'bg-pink-400',
        'Expatriates for 6 to 10 years' => 'bg-blue-600',
        'Expatriates for more than 10 years' => 'bg-green-400',
        'Lawyer' => 'bg-pink-400',
        'Legal advice' => 'bg-pink-400',
        'Insurer' => 'bg-blue-600',
        'Real estate agent' => 'bg-blue-600',
        'Translator' => 'bg-pink-400',
        'Guide' => 'bg-pink-400',
        'Language teacher' => 'bg-pink-400',
      ];
    @endphp

    @foreach ($statuses as $label => $dotColor)
    <label class="special-status-item flex items-center justify-between border border-blue-400 rounded-full px-4 py-2 cursor-pointer">
      <div class="flex items-center space-x-3">
        <div class="w-5 h-5 rounded-full {{ $dotColor }}"></div>
        <span>{{ $label }}</span>
      </div>
      <input type="checkbox" class="status-checkbox w-5 h-5 text-blue-600 rounded" data-label="{{ $label }}">
    </label>
    @endforeach
  </div>

  <div class="flex justify-between items-center">
    <button id="backToStep6" class="text-blue-700 hover:underline">Back</button>
    <button id="nextStep7" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Next</button>
  </div>
</div>
