<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Klean Header</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
  />
  <style>
    /* Dropdown for desktop */
    .dropdown-menu {
      display: none;
    }
    .dropdown.open > .dropdown-menu {
      display: flex;
      flex-direction: column;
    }
    /* Modal styles */
    #mobile-modal {
      display: none;
      background-color: rgba(10, 12, 42, 0.95);
      position: fixed;
      inset: 0;
      z-index: 1000;
      overflow-y: auto;
    }
    #mobile-modal.open {
      display: flex;
      flex-direction: column;
    }
  </style>
</head>
<body>
  <header class="w-full relative">
    <!-- Top black bar with social icons (hidden on small screens) -->
    <div class="hidden md:flex bg-[#0a0c2a] justify-end items-center h-8 px-4 space-x-4 text-yellow-400 text-sm relative z-10">
      <a href="#" aria-label="Facebook" class="hover:text-yellow-300"><i class="fab fa-facebook-f"></i></a>
      <a href="#" aria-label="Twitter" class="hover:text-yellow-300"><i class="fab fa-twitter"></i></a>
      <a href="#" aria-label="LinkedIn" class="hover:text-yellow-300"><i class="fab fa-linkedin-in"></i></a>
      <a href="#" aria-label="Instagram" class="hover:text-yellow-300"><i class="fab fa-instagram"></i></a>
      <a href="#" aria-label="YouTube" class="hover:text-yellow-300"><i class="fab fa-youtube"></i></a>
    </div>

    <!-- Desktop header -->
    <div class="hidden md:flex relative z-20">
      <div class="bg-green-700 flex items-center justify-center md:w-72 w-full h-20 flex-shrink-0 -mt-8 relative z-30">
        <h1 class="text-yellow-400 font-extrabold text-4xl font-sans select-none">Klean</h1>
      </div>
      <div class="flex-grow relative">
        <div class="bg-[#0a0c2a] absolute top-0 left-0 right-0 h-10" style="margin-left:18rem; z-index: 20;"></div>
        <nav class="flex items-center justify-between bg-white px-4 md:px-6 h-20 relative z-30">
          <ul class="flex items-center gap-6 text-sm font-semibold text-[#0a0c2a]">
            <li><a href="#" class="text-green-700 font-bold">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Service</a></li>
            <li><a href="#">Project</a></li>
            <li class="relative dropdown cursor-pointer" id="pages-dropdown">
              <button
                type="button"
                class="flex items-center gap-1 select-none focus:outline-none"
                aria-haspopup="true"
                aria-expanded="false"
                id="pages-button"
              >
                Pages <i class="fas fa-chevron-down text-xs"></i>
              </button>
              <ul
                class="dropdown-menu absolute top-full left-0 mt-1 w-40 bg-white border border-gray-300 rounded-md shadow-lg flex-col z-50"
                role="menu"
                aria-labelledby="pages-button"
              >
                <li><a href="#" class="block px-4 py-2 text-sm text-[#0a0c2a] hover:bg-yellow-400 hover:text-[#0a0c2a]" role="menuitem">Page 1</a></li>
                <li><a href="#" class="block px-4 py-2 text-sm text-[#0a0c2a] hover:bg-yellow-400 hover:text-[#0a0c2a]" role="menuitem">Page 2</a></li>
                <li><a href="#" class="block px-4 py-2 text-sm text-[#0a0c2a] hover:bg-yellow-400 hover:text-[#0a0c2a]" role="menuitem">Page 3</a></li>
                <li><a href="#" class="block px-4 py-2 text-sm text-[#0a0c2a] hover:bg-yellow-400 hover:text-[#0a0c2a]" role="menuitem">Page 4</a></li>
                <li><a href="#" class="block px-4 py-2 text-sm text-[#0a0c2a] hover:bg-yellow-400 hover:text-[#0a0c2a]" role="menuitem">Page 5</a></li>
              </ul>
            </li>
            <li><a href="#">Contact</a></li>
          </ul>
          <a
          href="views/admin/login.php"
          class="bg-yellow-400 text-[#0a0c2a] font-semibold rounded-full px-5 py-2 text-sm hover:bg-yellow-500 transition block text-center"
          >
          Administrador
        </a>

        </nav>
        <div class="flex text-xs text-white absolute top-0 right-0 h-10 items-center gap-4 px-4" style="margin-left:18rem; z-index: 25;">
          <div class="flex items-center gap-2 border-r border-yellow-400 pr-4">
            <i class="fas fa-envelope"></i>
            <span>info@example.com</span>
          </div>
          <div class="flex items-center gap-2">
            <i class="fas fa-phone-alt"></i>
            <span>+012 345 6789</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Mobile header -->
    <div class="md:hidden relative z-30 bg-green-700 flex items-center h-20 px-4">
      <button
        id="mobile-menu-button"
        aria-label="Open menu"
        aria-expanded="false"
        class="text-white text-2xl focus:outline-none mr-4"
      >
        <i class="fas fa-bars"></i>
      </button>
      <h1 class="text-yellow-400 font-extrabold text-4xl font-sans select-none flex-grow text-center">Klean</h1>
    </div>

    <!-- Mobile modal menu -->
    <div id="mobile-modal" class="hidden fixed inset-0 bg-[#0a0c2a] bg-opacity-95 z-50 flex flex-col p-6 text-white">
      <button
        id="mobile-modal-close"
        aria-label="Close menu"
        class="self-end text-3xl mb-6 focus:outline-none"
      >
        <i class="fas fa-times"></i>
      </button>
      <nav class="flex flex-col space-y-6 text-lg font-semibold">
        <a href="#" class="hover:text-yellow-400">Home</a>
        <a href="#" class="hover:text-yellow-400">About</a>
        <a href="#" class="hover:text-yellow-400">Service</a>
        <a href="#" class="hover:text-yellow-400">Project</a>
        <div>
          <button
            id="mobile-pages-toggle"
            class="flex items-center justify-between w-full font-semibold text-lg hover:text-yellow-400 focus:outline-none"
            aria-expanded="false"
          >
            Pages <i class="fas fa-chevron-down text-sm ml-2"></i>
          </button>
          <ul id="mobile-pages-list" class="mt-2 ml-4 space-y-3 hidden flex-col">
            <li><a href="#" class="hover:text-yellow-400">Page 1</a></li>
            <li><a href="#" class="hover:text-yellow-400">Page 2</a></li>
            <li><a href="#" class="hover:text-yellow-400">Page 3</a></li>
            <li><a href="#" class="hover:text-yellow-400">Page 4</a></li>
            <li><a href="#" class="hover:text-yellow-400">Page 5</a></li>
          </ul>
        </div>
        <a href="/views/admin/login.php" class="hover:text-yellow-400">Contact</a>
        <button
           href="/views/admin/login.php"
          class="bg-yellow-400 text-[#0a0c2a] font-semibold rounded-full px-6 py-3 text-base hover:bg-yellow-500 transition mt-6 w-full"
          type="button"
        >
          Administrador
        </button>
      </nav>
    </div>

    <script>
      // Desktop Pages dropdown toggle
      const dropdown = document.getElementById('pages-dropdown');
      const button = document.getElementById('pages-button');

      button.addEventListener('click', (e) => {
        e.preventDefault();
        dropdown.classList.toggle('open');
        const expanded = button.getAttribute('aria-expanded') === 'true';
        button.setAttribute('aria-expanded', String(!expanded));
      });

      document.addEventListener('click', (e) => {
        if (!dropdown.contains(e.target)) {
          dropdown.classList.remove('open');
          button.setAttribute('aria-expanded', 'false');
        }
      });

      // Mobile modal toggle
      const mobileMenuButton = document.getElementById('mobile-menu-button');
      const mobileModal = document.getElementById('mobile-modal');
      const mobileModalClose = document.getElementById('mobile-modal-close');

      mobileMenuButton.addEventListener('click', () => {
        mobileModal.classList.add('open');
        mobileModal.classList.remove('hidden');
        mobileMenuButton.setAttribute('aria-expanded', 'true');
        document.body.style.overflow = 'hidden'; // prevent background scroll
      });

      mobileModalClose.addEventListener('click', () => {
        mobileModal.classList.remove('open');
        mobileModal.classList.add('hidden');
        mobileMenuButton.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = ''; // restore scroll
      });

      // Mobile Pages submenu toggle
      const mobilePagesToggle = document.getElementById('mobile-pages-toggle');
      const mobilePagesList = document.getElementById('mobile-pages-list');

      mobilePagesToggle.addEventListener('click', () => {
        const isHidden = mobilePagesList.classList.contains('hidden');
        if (isHidden) {
          mobilePagesList.classList.remove('hidden');
          mobilePagesToggle.setAttribute('aria-expanded', 'true');
        } else {
          mobilePagesList.classList.add('hidden');
          mobilePagesToggle.setAttribute('aria-expanded', 'false');
        }
      });
    </script>
  </header>
</body>
</html>


