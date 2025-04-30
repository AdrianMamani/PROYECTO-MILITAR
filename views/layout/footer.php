<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Klean Footer Fixed Bottom</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
  />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter&display=swap"
    rel="stylesheet"
  />
  <style>
    body, html {
      height: 100%;
      margin: 0;
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>
<body class="flex flex-col min-h-screen">
  <!-- FOOTER -->
  <footer id="footer" class="text-white bg-gray-900 w-full px-6 md:px-16 lg:px-24 py-12 border-t border-gray-700">
    <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
      <!-- Contenido arriba -->
      <div>
        <img
          alt="Profile photo"
          class="rounded-full mb-3"
          height="80"
          src="https://storage.googleapis.com/a1aa/image/da3f10b0-932c-4f1a-c9a1-96f1afe625f9.jpg"
          width="80"
        />
        <p class="text-sm leading-relaxed max-w-[280px]">
          Volup amet magna clita tempor. Tempor sea eos vero ipsum. Lorem lorem sit sed elitr sed kasd et
        </p>
        <div class="mt-4 text-sm">
          <p class="font-semibold mb-1">Opening Hours:</p>
          <p class="mb-1">Mon – Sat, 8AM – 5PM</p>
          <p>Sunday: Closed</p>
        </div>
      </div>

      <div>
        <h2 class="text-yellow-400 font-semibold text-lg mb-5">Get In Touch</h2>
        <ul class="space-y-3 text-sm max-w-[220px]">
          <li class="flex items-center gap-3">
            <i class="fas fa-map-marker-alt text-yellow-400"></i>
            <span>123 Street, New York, USA</span>
          </li>
          <li class="flex items-center gap-3">
            <i class="fas fa-phone-alt text-yellow-400"></i>
            <span>+012 345 67890</span>
          </li>
        </ul>
        <div class="flex gap-4 mt-5">
          <a href="#" class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-[#0c1327] text-lg hover:opacity-90" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
          <a href="#" class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-[#0c1327] text-lg hover:opacity-90" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-[#0c1327] text-lg hover:opacity-90" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
          <a href="#" class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-[#0c1327] text-lg hover:opacity-90" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
        </div>
      </div>

      <div>
        <h2 class="text-yellow-400 font-semibold text-lg mb-5">Quick Links</h2>
        <ul class="space-y-3 text-sm max-w-[180px]">
          <li><a href="#" class="flex items-center gap-2 hover:underline"><i class="fas fa-angle-right text-white"></i> Home</a></li>
          <li><a href="#" class="flex items-center gap-2 hover:underline"><i class="fas fa-angle-right text-white"></i> About Us</a></li>
          <li><a href="#" class="flex items-center gap-2 hover:underline"><i class="fas fa-angle-right text-white"></i> Our Services</a></li>
          <li><a href="#" class="flex items-center gap-2 hover:underline"><i class="fas fa-angle-right text-white"></i> Our Projects</a></li>
          <li><a href="#" class="flex items-center gap-2 hover:underline"><i class="fas fa-angle-right text-white"></i> Contact Us</a></li>
        </ul>
      </div>

      <div>
        <h2 class="text-yellow-400 font-semibold text-lg mb-5">Newsletter</h2>
        <p class="text-sm max-w-[280px] leading-relaxed">
          Rebum labore lorem dolores kasd est, et ipsum amet et at kasd, ipsum sea tempor magna tempor. Accu kasd sed ea duo ipsum.
        </p>
      </div>
    </div>

    <!-- Línea separadora y Copyright -->
    <div class="mt-8 pt-6 border-t border-gray-700 flex flex-col md:flex-row items-center justify-between text-sm text-white max-w-7xl mx-auto">
      <p class="mb-3 md:mb-0">
        <span class="text-yellow-400">©</span>
        <span class="text-yellow-400 font-semibold">Your Site Name.</span> All Rights Reserved. Designed by
        <span class="text-yellow-400 font-semibold">HTML Codex</span>
      </p>
      <nav class="flex gap-8 font-semibold">
        <a href="#" class="hover:underline">Privacy</a>
        <a href="#" class="hover:underline">Terms</a>
        <a href="#" class="hover:underline">FAQs</a>
        <a href="#" class="hover:underline">Help</a>
      </nav>
    </div>
  </footer>
</body>
</html>
