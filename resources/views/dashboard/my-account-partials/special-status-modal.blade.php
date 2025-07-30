<!-- Special Status Modal -->
<div id="specialStatusModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-2 sm:p-4">
  <div class="bg-white rounded-2xl p-4 sm:p-6 w-full max-w-xs sm:max-w-xl shadow-2xl relative max-h-[90vh] overflow-y-auto">
    <button id="closeSpecialStatusModal" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 text-2xl transition-colors">&times;</button>
    
    <h2 class="font-bold mb-4 text-lg sm:text-xl text-gray-800">Do you have a special status?</h2>
    
    <div class="space-y-3 mb-6">
      @php
        $statuses = [
          ['label' => 'Expatriates for 2 to 5 years', 'color' => 'bg-blue-400'],
          ['label' => 'Expatriates for 6 to 10 years', 'color' => 'bg-blue-500'],
          ['label' => 'Expatriates for more than 10 years', 'color' => 'bg-blue-600'],
          ['label' => 'Lawyer', 'color' => 'bg-purple-400'],
          ['label' => 'Legal advice', 'color' => 'bg-purple-500'],
          ['label' => 'Insurer', 'color' => 'bg-green-400'],
          ['label' => 'Real estate agent', 'color' => 'bg-green-500'],
          ['label' => 'Translator', 'color' => 'bg-orange-400'],
          ['label' => 'Guide', 'color' => 'bg-orange-500'],
          ['label' => 'Language teacher', 'color' => 'bg-cyan-400']
        ];
      @endphp

      @foreach ($statuses as $status)
        <div class="flex flex-col sm:flex-row items-center justify-between border border-gray-200 rounded-xl px-4 py-3 special-status-item hover:border-gray-300 transition-colors">
          <div class="flex items-center space-x-3 mb-2 sm:mb-0">
            <div class="w-4 h-4 rounded-full {{ $status['color'] }}"></div>
            <span class="text-sm text-gray-700">{{ $status['label'] }}</span>
          </div>
          <div class="flex space-x-2">
            <button type="button" class="toggle-btn bg-white text-gray-600 border border-gray-300 hover:border-blue-400 hover:text-blue-600 rounded-full px-4 py-1 text-sm transition-colors">Yes</button>
            <button type="button" class="toggle-btn bg-white text-gray-600 border border-gray-300 hover:border-blue-400 hover:text-blue-600 rounded-full px-4 py-1 text-sm transition-colors">No</button>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>