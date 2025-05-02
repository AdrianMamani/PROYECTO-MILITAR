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
    body,
    html {
      height: 100%;
      margin: 0;
      font-family: "Inter", sans-serif;
    }
  </style>
</head>
<body class="flex flex-col min-h-screen">
  <main class="flex-grow"></main>
  <!-- FOOTER -->
  <footer
    id="footer"
    class="text-white bg-gray-900 w-full px-6 sm:px-10 md:px-16 lg:px-24 py-10 sm:py-12 border-t border-gray-700"
  >
    <div
      class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-y-10 gap-x-8"
    >
      <div class="flex flex-col items-center sm:items-start text-center sm:text-left">
        <img
          alt="Portrait of a smiling person with short hair wearing a casual shirt, outdoor background with soft sunlight"
          class="rounded-full mb-4 w-20 h-20 sm:w-20 sm:h-20"
          height="80"
          src="https://storage.googleapis.com/a1aa/image/235e8a6b-4619-422d-4445-10a6a69cd621.jpg"
          width="80"
        />
        <p class="text-sm leading-relaxed max-w-[280px]">
        La promoción CABO ALBERTO REYES GAMARRA representa
        el compromiso, la lealtad y la entrega al servicio militar.
        </p>
      </div>

      <div class="flex flex-col items-center sm:items-start text-center sm:text-left">
        <h2 class="text-yellow-400 font-semibold text-lg mb-5">Nuestras redes</h2>
        <div class="flex gap-4 mt-5 justify-center sm:justify-start">
          <a
            href="#"
            class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-[#0c1327] text-lg hover:opacity-90"
            aria-label="Twitter"
            ><i class="fab fa-twitter"></i
          ></a>
          <a
            href="#"
            class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-[#0c1327] text-lg hover:opacity-90"
            aria-label="Facebook"
            ><i class="fab fa-facebook-f"></i
          ></a>
          <a
            href="#"
            class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-[#0c1327] text-lg hover:opacity-90"
            aria-label="LinkedIn"
            ><i class="fab fa-linkedin-in"></i
          ></a>
          <a
            href="#"
            class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-[#0c1327] text-lg hover:opacity-90"
            aria-label="Instagram"
            ><i class="fab fa-instagram"></i
          ></a>
        </div>
      </div>

      <div class="flex flex-col items-center sm:items-start text-center sm:text-left">
        <h2 class="text-yellow-400 font-semibold text-lg mb-5">Quick Links</h2>
        <ul class="space-y-3 text-sm max-w-[180px]">
          <li>
            <a href="#" class="flex items-center gap-2 hover:underline justify-center sm:justify-start"
              ><i class="fas fa-angle-right text-white"></i> Home</a
            >
          </li>
          <li>
            <a href="#" class="flex items-center gap-2 hover:underline justify-center sm:justify-start"
              ><i class="fas fa-angle-right text-white"></i> About Us</a
            >
          </li>
          <li>
            <a href="#" class="flex items-center gap-2 hover:underline justify-center sm:justify-start"
              ><i class="fas fa-angle-right text-white"></i> Our Services</a
            >
          </li>
          <li>
            <a href="#" class="flex items-center gap-2 hover:underline justify-center sm:justify-start"
              ><i class="fas fa-angle-right text-white"></i> Our Projects</a
            >
          </li>
          <li>
            <a href="#" class="flex items-center gap-2 hover:underline justify-center sm:justify-start"
              ><i class="fas fa-angle-right text-white"></i> Contact Us</a
            >
          </li>
        </ul>
      </div>
    </div>

    <!-- Línea separadora y Copyright -->
    <div
      class="mt-8 pt-6 border-t border-gray-700 flex flex-col items-center text-sm text-white max-w-7xl mx-auto"
    >
      <p class="text-center">
        <span class="text-yellow-400">©</span>
        <span class="text-yellow-400 font-semibold">CABO ALBERTO REYES GAMARRA.</span>
        Todos los derechos reservados.
        <!--<span class="text-yellow-400 font-semibold">HTML Codex</span>-->
      </p>
    </div>
  </footer>
</body>
</html>