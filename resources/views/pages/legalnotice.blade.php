<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Legal Notice - ULIX AI</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>
<body class="bg-gray-50 text-gray-800">

@include('includes.header')

<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-blue-400 py-20 px-6 text-white text-center">
  <div class="max-w-3xl mx-auto">
    <div class="text-4xl mb-4">📜</div>
    <h1 class="text-4xl font-bold mb-2">Legal Notice</h1>
    <p class="text-lg">Understand your rights, responsibilities, and how we handle legal matters at ULIX AI.</p>
  </div>
</section>

<!-- Main Content with Sticky Sidebar -->
<section class="py-20 px-6">
  <div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-12">

    <!-- Sidebar Navigation -->
    <aside class="lg:w-1/4 sticky top-28 self-start">
      <nav class="bg-white p-6 rounded-xl shadow border border-gray-200 space-y-4">
        <h3 class="text-lg font-bold text-blue-700 mb-2">Jump to Section</h3>
        <ul class="space-y-2 text-sm">
          <li><a href="#publisher" class="text-blue-600 hover:underline">📇 Publisher Info</a></li>
          <li><a href="#ip" class="text-blue-600 hover:underline">🧠 Intellectual Property</a></li>
          <li><a href="#liability" class="text-blue-600 hover:underline">⚖️ Liability Disclaimer</a></li>
          <li><a href="#privacy" class="text-blue-600 hover:underline">🔒 Privacy & Data</a></li>
          <li><a href="#law" class="text-blue-600 hover:underline">📚 Governing Law</a></li>
        </ul>
      </nav>
    </aside>

    <!-- Legal Content -->
    <div class="flex-1 space-y-16">

      <!-- Section 1 -->
      <div id="publisher" class="bg-white p-8 rounded-2xl shadow-md border border-gray-200" data-aos="fade-up">
        <h2 class="text-2xl font-semibold text-blue-700 mb-4">📇 Publisher Information</h2>
        <p>
          This website is operated by <strong>ULIX AI</strong>. For inquiries:<br>
          📧 Email: <a href="mailto:legal@ulixai.com" class="text-blue-600 underline">legal@ulixai.com</a><br>
          📍 Address: 123 Innovation Street, Global City, Earth 00001
        </p>
      </div>

      <!-- Section 2 -->
      <div id="ip" class="bg-white p-8 rounded-2xl shadow-md border border-gray-200" data-aos="fade-up">
        <h2 class="text-2xl font-semibold text-blue-700 mb-4">🧠 Intellectual Property</h2>
        <p>
          All content including text, images, code, and design belongs to ULIX AI or its partners. Unauthorized reproduction or distribution is strictly prohibited.
        </p>
      </div>

      <!-- Section 3 -->
      <div id="liability" class="bg-white p-8 rounded-2xl shadow-md border border-gray-200" data-aos="fade-up">
        <h2 class="text-2xl font-semibold text-blue-700 mb-4">⚖️ Liability Disclaimer</h2>
        <p>
          We strive for accuracy but cannot guarantee completeness. Users are responsible for how they use the information provided.
        </p>
      </div>

      <!-- Section 4 -->
      <div id="privacy" class="bg-white p-8 rounded-2xl shadow-md border border-gray-200" data-aos="fade-up">
        <h2 class="text-2xl font-semibold text-blue-700 mb-4">🔒 Privacy and Data Protection</h2>
        <p>
          We follow legal standards to handle your personal data. For more details, refer to our 
          <a href="/privacy-policy.php" class="text-blue-600 underline">Privacy Policy</a>.
        </p>
      </div>

      <!-- Section 5 -->
      <div id="law" class="bg-white p-8 rounded-2xl shadow-md border border-gray-200" data-aos="fade-up">
        <h2 class="text-2xl font-semibold text-blue-700 mb-4">📚 Governing Law</h2>
        <p>
          These terms are governed by the laws of the country where ULIX AI is headquartered. Disputes are subject to that jurisdiction’s courts.
        </p>
      </div>

    </div>
  </div>
</section>


  @include('includes.footer')

<!-- AOS Animation Script -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 700,
    once: true,
  });
</script>

</body>
</html>