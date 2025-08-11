
  @include('includes.header')
  @include('pages.popup')

    <section class="bg-white py-16 px-4">
      <div class="max-w-4xl mx-auto text-center">
        <h2 class="text-xl md:text-2xl font-bold text-blue-800 mb-2">🌍 Who are we at @site?</h2>
        <h3 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">A platform designed for everyone living, traveling, or investing abroad</h3>
        <p class="text-gray-700 text-sm md:text-base mb-4">
         @site is more than just a website. It’s your co-pilot. A human (and digital) partner ready to help you, wherever you are.
        </p>
        <p class="text-gray-800 text-sm md:text-base font-medium mb-8">
          Whether you’re on vacation, on assignment, in exile, an expat, in transition, or simply on the move… @site is with you everywhere 👋
        </p>

        <div class="aspect-[16/10] md:aspect-[16/9] lg:aspect-[16/8] relative">
          <iframe 
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3168.639225589593!2d-122.08424908469285!3d37.42199997982525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fba02425dad8f%3A0x6c296c66619367e0!2sGoogleplex!5e0!3m2!1sen!2sus!4v1703123456789!5m2!1sen!2sus" 
              class="w-full h-full border-0 transition-all duration-500 group-hover:scale-105"
              allowfullscreen="" 
              loading="lazy" 
              referrerpolicy="no-referrer-when-downgrade"
              title="Our Location">
          </iframe>
        </div>
      </div>
    </section>

    <!-- Identity Section -->
    <section class="bg-white py-16 px-4">
      <div class="max-w-6xl mx-auto text-center space-y-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-10">
          <!-- Feature cards (same as before) -->
          <?php
            $features = [
              ['image' => 'verified.png', 'title' => 'Verified identity', 'desc' => 'All providers are verified.'],
              ['image' => 'legall.png', 'title' => 'Legal security', 'desc' => 'A clear, reliable and fully supervised framework.'],
              ['image' => 'digital.png', 'title' => '100% digital', 'desc' => 'Request, book, and manage everything from your phone.'],
              ['image' => 'human.png', 'title' => 'Human & responsive', 'desc' => 'Real humans ready to help you quickly and with care.'],
            ];

            foreach ($features as $f) {
              echo '
              <div class="border border-gray-200 p-6 hover:scale-105 transition-transform rounded-xl shadow-sm flex flex-col items-center space-y-4">
                <div class="w-24 h-24 overflow-hidden">
                  <img src="images/' . $f['image'] . '" alt="' . $f['title'] . '" class="w-full h-full object-cover" />
                </div>
                <h3 class="text-blue-800 font-bold text-lg">' . $f['title'] . '</h3>
                <p class="text-sm text-gray-600">' . $f['desc'] . '</p>
              </div>';
            }
          ?>
        </div>
      </div>
    </section>

    <!-- SOS Coming Soon -->
    <section class="bg-white py-24 px-6">
      <div class="max-w-5xl mx-auto bg-red-50 rounded-2xl px-10 py-16 text-center shadow-md">
        <h2 class="text-2xl md:text-3xl font-extrabold text-red-700 mb-4">🎧 Coming soon: S.O.S Emergency Service</h2>
        <p class="text-base md:text-lg text-gray-800 font-medium leading-relaxed">
          Trouble abroad? You’ll be connected by phone with the expert of your choice.<br>
          <strong class="text-red-600">7 days a week, in just seconds.</strong>
        </p>
      </div>
    </section>

  @include('includes.footer')
