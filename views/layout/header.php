<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Barra de navegación estilo red social sin &lt;header&gt;</title>
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    rel="stylesheet"
  />
  <style>
    /* Reset y base */
    * {
      box-sizing: border-box;
    }
    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background:rgb(255, 255, 255);
      padding-top: 6rem;
    }
    a {
      text-decoration: none;
      color: inherit;
    }
    button {
      cursor: pointer;
      background: none;
      border: none;
      font: inherit;
      color: inherit;
    }

    .fondo-navbar {
  background-color:rgb(255, 255, 255);
  height: 6rem;
  width: 100%;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 1000;
  transition: background-color 0.5s ease;
}
.fondo-navbar.transparent {
  background-color: transparent;
}
.nav-container {
  position: fixed;
  z-index: 10;
}

.logo-container {
  display: flex;
  align-items: center;
  gap: 12px;
}

.logo-img {
  width: 48px;
  height: 48px;
  object-fit: contain;
}

.logo-text {
  line-height: 1.1;
  color:rgb(0, 0, 0);
  font-size: 10px;
  font-weight: 400;
  text-transform: uppercase;
  font-family: 'Inter', sans-serif;
}

.logo-text p {
  margin: 0;
  color:rgb(0, 0, 0)
}

.logo-text .bold {
  font-weight: 700;
  font-size: 13px;
  line-height: 15px;
  text-transform: none;
}

/* Cuando se activa el scroll */
#nav-container.scrolled .logo-text,
#nav-container.scrolled .logo-text p,
#nav-container.scrolled .logo-text .bold {
  color: white;
}


    /* Contenedor principal de la barra */
    .nav-container {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      background:rgb(250, 250, 250);
      border-bottom-left-radius: 2rem;
      border-bottom-right-radius: 2rem;
      z-index: 1000;
      transition: background 0.3s ease, box-shadow 0.3s ease;
      padding: 0 2rem;
      height: 6rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .nav-container.scrolled {
      background:rgb(32, 32, 32);
      
    }
    /* Logo */
    .logo {
      display: flex;
      align-items: center;
      user-select: none;
      flex-shrink: 0;
    }
    .logo img {
      width: 80px;
      height: 80px;
      border-radius: 1rem;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
      object-fit: cover;
    }
    /* Navegación */
    nav {
      display: flex;
      align-items: center;
      gap: 1.5rem;
      font-weight: 600;
      font-size: 0.9rem;
      color:rgb(35, 35, 36);
      user-select: none;
    }
    nav a,
    nav button {
      display: flex;
      align-items: center;
      gap: 0.4rem;
      padding: 0.5rem 0.8rem;
      border-radius: 1.5rem;
      transition: background 0.3s ease, color 0.3s ease;
      color: inherit;
      position: relative;
      white-space: nowrap;
    }
    nav a:hover,
    nav button:hover {
      background: rgba(255 255 255 / 0.2);
      color: rgb(100, 100, 100);
    }
    nav a i,
    nav button i {
      font-size: 1.4rem;
      filter: drop-shadow(0 0 2px rgba(0, 0, 0, 0.15));
    }

    #nav-container.scrolled nav {
  color: white;
}

#nav-container.scrolled nav a:hover,
#nav-container.scrolled nav button:hover {
  color: white;
  background: rgba(7, 7, 7, 0.07); /* o ajusta si deseas un fondo más visible */
}

    /* Icono de flecha al lado del texto */
    .caret-icon {
      font-size: 0.85rem;
      margin-left: 0.25rem;
      filter: drop-shadow(0 0 1px rgba(0, 0, 0, 0.2));
    }
    /* Contenedor dropdown */
    .dropdown {
      position: relative;
    }
    /* Menú desplegable */
    .dropdown-menu {
      position: absolute;
      top: 100%;
      left: 50%;
      transform: translateX(-50%);
      /* margin-top: 0.5rem; */
      background: #fff;
      border-radius: 1rem;
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.12);
      min-width: 13rem;
      padding: 0.5rem 0;
      opacity: 0;
      pointer-events: none;
      transition: opacity 0.25s ease, transform 0.25s ease;
      transform-origin: top center;
      transform: translateX(-50%) translateY(-10px);
      z-index: 100;
    }
    .dropdown-menu.show {
      opacity: 1;
      pointer-events: auto;
      transform: translateX(-50%) translateY(0);
    }
    .dropdown-menu a {
      display: block;
      padding: 0.75rem 1.5rem;
      border-radius: 0.75rem;
      color:rgb(0, 0, 0);
      font-weight: 600;
      font-size: 0.95rem;
      transition: background 0.25s ease, color 0.25s ease;
    }
    .dropdown-menu a:hover {
      background:#097c05;
      color: #fff;
    }

    /* Estado con scroll */
#nav-container.scrolled .dropdown-menu a {
  color: black;
}

#nav-container.scrolled .dropdown-menu a:hover {
  background: #097c05;
  color: white;
}
    /* Botón Admin */
    .btn-admin {
      background:rgb(2, 148, 50);
      color:rgb(232, 233, 235);
      font-weight: 700;
      padding: 0.625rem 1.5rem;
      border-radius: 9999px;
      
      transition: background 0.3s ease, box-shadow 0.3s ease;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      font-size: 1.125rem;
      user-select: none;
      white-space: nowrap;
    }
    .btn-admin:hover {
      background: #f59e0b;
      box-shadow: 0 6px 20px rgba(245, 158, 11, 0.7);
    }
    /* Botón menú móvil */
    .mobile-menu-button {
      display: none;
      background: none;
      border: none;
      color:rgba(24, 24, 24, 0.85);
      font-size: 2rem;
      cursor: pointer;
      filter: drop-shadow(0 0 3px rgba(0, 0, 0, 0.3));
      user-select: none;
    }
    /* Cambiar color con scroll */
#nav-container.scrolled .mobile-menu-button {
  color: white;
}
    /* Menú móvil */
    #mobile-menu {
      display: none;
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      background: white;
      border-top-left-radius: 1.5rem;
      border-top-right-radius: 1.5rem;
      box-shadow: 0 -8px 24px rgba(8, 61, 145, 0.15);
      padding: 1.5rem 1.5rem 2rem;
      z-index: 999;
      max-height: 70vh;
      overflow-y: auto;
    }
    #mobile-menu.show {
      display: block;
    }
    #mobile-menu a,
    #mobile-menu button {
      font-weight: 600;
      font-size: 1.125rem;
      color: #1e293b;
      border-radius: 1rem;
      padding: 0.75rem 1.25rem;
      transition: background 0.3s ease, color 0.3s ease;
      display: flex;
      align-items: center;
      user-select: none;
      gap: 1rem;
      white-space: nowrap;
    }
    #mobile-menu a:hover,
    #mobile-menu button:hover {
      background: #3b82f6;
      color: white;
    }
    #mobile-menu a i,
    #mobile-menu button i {
      font-size: 1.5rem;
      filter: drop-shadow(0 0 2px rgba(0, 0, 0, 0.1));
    }
    /* Submenús móviles */
    #mobile-integrantes-submenu,
    #mobile-comunidad-submenu {
      padding-left: 2.5rem;
    }
    #mobile-integrantes-submenu a,
    #mobile-comunidad-submenu a {
      font-weight: 500;
      font-size: 1rem;
      padding: 0.5rem 1rem;
      border-radius: 0.75rem;
      color: #475569;
      white-space: nowrap;
    }
    #mobile-integrantes-submenu a:hover,
    #mobile-comunidad-submenu a:hover {
      background: #bfdbfe;
      color: #1e40af;
    }
    /* Responsive */
    @media (max-width:1220px) {
      nav {
        display: none;
      }
      .mobile-menu-button {
        display: block;
      }
    }
  </style>
</head>
<body>
   <!-- Preloader -->
<div class="fondo-navbar">
<div class="nav-container" id="nav-container" role="navigation" aria-label="Barra de navegación principal">
<div class="logo-container">
    <img class="logo-img" src="/PROYECTO-MILITAR/views/assets/img/logo.jpg" alt="Logo with red star and green text reading CABO" />
    <div class="logo-text" aria-label="Promoción Cabo Alberto Reyes Gamarra">
      <p>PROMOCIÓN</p>
      <p class="bold">CABO ALBERTO</p>
      <p class="bold">REYES GAMARRA</p>
    </div>
  </div>
    <nav>
      <a href="/PROYECTO-MILITAR/home" aria-label="Inicio">
        <i class="fas fa-home"></i>
        <span>Inicio</span>
      </a>
      <a href="/PROYECTO-MILITAR/sobrenosotros" aria-label="Sobre Nosotros">
        <i class="fas fa-info-circle"></i>
        <span>Sobre Nosotros</span>
      </a>
      <a href="/PROYECTO-MILITAR/eventos" aria-label="Eventos">
        <i class="fas fa-calendar-alt"></i>
        <span>Eventos</span>
      </a>
      <div class="dropdown">
        <button id="integrantes-btn" aria-haspopup="true" aria-expanded="false" aria-controls="integrantes-menu">
          <i class="fas fa-users"></i>
          <span>Integrantes</span>
          <i class="fas fa-caret-down caret-icon"></i>
        </button>
        <div id="integrantes-menu" class="dropdown-menu" role="menu" aria-labelledby="integrantes-btn">
          <a href="/PROYECTO-MILITAR/miembros" role="menuitem">Miembros</a>
          <a href="/PROYECTO-MILITAR/miembros_fallecidos" role="menuitem">En memoria</a>
          <a href="/PROYECTO-MILITAR/finanzas-public" role="menuitem">Finanzas</a>
          <a href="/PROYECTO-MILITAR/especialidad_index" role="menuitem">Especialidad</a>
        </div>
      </div>
      <div class="dropdown">
        <button id="comunidad-btn" aria-haspopup="true" aria-expanded="false" aria-controls="comunidad-menu">
          <i class="fas fa-comments"></i>
          <span>Comunidad</span>
          <i class="fas fa-caret-down caret-icon"></i>
        </button>
        <div id="comunidad-menu" class="dropdown-menu" role="menu" aria-labelledby="comunidad-btn">
          <a href="/PROYECTO-MILITAR/negocios" role="menuitem">Emprendimiento</a>
          <a href="/PROYECTO-MILITAR/galeria" role="menuitem">Galería</a>
          <a href="/PROYECTO-MILITAR/logros" role="menuitem">Logros</a>
          <a href="/PROYECTO-MILITAR/noticias-public" role="menuitem">Noticias</a>
        </div>
      </div>
      <button type="button" class="btn-admin" aria-label="Botón Admin" onclick="location.href='index.php?action=auth/loginForm'">
        <i class="fas fa-user-shield"></i> Admin
      </button>
    </nav>
    <button class="mobile-menu-button" aria-label="Abrir menú móvil" id="mobile-menu-button">
      <i class="fas fa-bars"></i>
    </button>
  </div>

  <div id="mobile-menu" aria-label="Menú móvil">
    <a href="/PROYECTO-MILITAR/home" aria-label="Inicio">
      <i class="fas fa-home"></i>
      Inicio
    </a>
    <a href="/PROYECTO-MILITAR/sobrenosotros" aria-label="Sobre Nosotros">
      <i class="fas fa-info-circle"></i>
      Sobre Nosotros
    </a>
    <button aria-expanded="false" aria-controls="mobile-integrantes-submenu" aria-label="Menú Integrantes móvil" id="mobile-integrantes-btn">
      <i class="fas fa-users"></i>
      Integrantes
      <i class="fas fa-caret-down caret-icon" style="margin-left:auto;"></i>
    </button>
    <div id="mobile-integrantes-submenu" style="display:none; padding-left: 2.5rem;">
      <a href="/PROYECTO-MILITAR/miembros">Miembros</a>
      <a href="/PROYECTO-MILITAR/miembros_fallecidos">En memoria</a>
      <a href="#">Finanzas</a>
      <a href="/PROYECTO-MILITAR/especialidad_index">Especialidad</a>
    </div>
    <button aria-expanded="false" aria-controls="mobile-comunidad-submenu" aria-label="Menú Comunidad móvil" id="mobile-comunidad-btn">
      <i class="fas fa-comments"></i>
      Comunidad
      <i class="fas fa-caret-down caret-icon" style="margin-left:auto;"></i>
    </button>
    <div id="mobile-comunidad-submenu" style="display:none; padding-left: 2.5rem;">
      <a href="/PROYECTO-MILITAR/negocios">Emprendimiento</a>
      <a href="/PROYECTO-MILITAR/galeria">Galería</a>
      <a href="/PROYECTO-MILITAR/logros">Logros</a>
      <a href="#">Noticias</a>
    </div>
    <button type="button" class="btn-admin" aria-label="Botón Admin" onclick="location.href='index.php?action=auth/loginForm'">
      <i class="fas fa-user-shield"></i> Admin
    </button>
  </div>
</div>

  <script>
// Función para mostrar el menú desplegable
  function showDropdown(button, menu) {
    button.setAttribute('aria-expanded', 'true');
    menu.classList.add('show');
  }

  // Función para ocultar el menú desplegable
  function hideDropdown(button, menu) {
    button.setAttribute('aria-expanded', 'false');
    menu.classList.remove('show');
  }

  // Configurar eventos para menús desplegables escritorio
  document.addEventListener('DOMContentLoaded', () => {
    const integrantesBtn = document.getElementById('integrantes-btn');
    const integrantesMenu = document.getElementById('integrantes-menu');
    const comunidadBtn = document.getElementById('comunidad-btn');
    const comunidadMenu = document.getElementById('comunidad-menu');

    // Eventos para el menú Integrantes
    integrantesBtn.addEventListener('mouseenter', () => {
      showDropdown(integrantesBtn, integrantesMenu);
      hideDropdown(comunidadBtn, comunidadMenu);
    });

    integrantesMenu.addEventListener('mouseleave', () => {
      hideDropdown(integrantesBtn, integrantesMenu);
    });

    // Eventos para el menú Comunidad
    comunidadBtn.addEventListener('mouseenter', () => {
      showDropdown(comunidadBtn, comunidadMenu);
      hideDropdown(integrantesBtn, integrantesMenu);
    });

    comunidadMenu.addEventListener('mouseleave', () => {
      hideDropdown(comunidadBtn, comunidadMenu);
    });

    // También podemos agregar eventos para el contenedor padre para mejor usabilidad
    const dropdowns = document.querySelectorAll('.dropdown');
    dropdowns.forEach(dropdown => {
      dropdown.addEventListener('mouseleave', () => {
        const button = dropdown.querySelector('button');
        const menu = dropdown.querySelector('.dropdown-menu');
        hideDropdown(button, menu);
      });
    });
  });

  // Alternar menú móvil
  const mobileMenuButton = document.getElementById('mobile-menu-button');
  const mobileMenu = document.getElementById('mobile-menu');
  mobileMenuButton.addEventListener('click', () => {
    mobileMenu.classList.toggle('show');
  });

  // Alternar submenú Integrantes móvil
  const mobileIntegrantesBtn = document.getElementById('mobile-integrantes-btn');
  const mobileIntegrantesSubmenu = document.getElementById('mobile-integrantes-submenu');
  mobileIntegrantesBtn.addEventListener('click', () => {
    const expanded = mobileIntegrantesBtn.getAttribute('aria-expanded') === 'true';
    mobileIntegrantesBtn.setAttribute('aria-expanded', expanded ? 'false' : 'true');
    if (expanded) {
      mobileIntegrantesSubmenu.style.display = 'none';
    } else {
      mobileIntegrantesSubmenu.style.display = 'block';
    }
  });

  // Alternar submenú Comunidad móvil
  const mobileComunidadBtn = document.getElementById('mobile-comunidad-btn');
  const mobileComunidadSubmenu = document.getElementById('mobile-comunidad-submenu');
  mobileComunidadBtn.addEventListener('click', () => {
    const expanded = mobileComunidadBtn.getAttribute('aria-expanded') === 'true';
    mobileComunidadBtn.setAttribute('aria-expanded', expanded ? 'false' : 'true');
    if (expanded) {
      mobileComunidadSubmenu.style.display = 'none';
    } else {
      mobileComunidadSubmenu.style.display = 'block';
    }
  });

  // Sombra y fondo del contenedor al hacer scroll
  const navContainer = document.getElementById('nav-container');
  window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
      navContainer.classList.add('scrolled');
    } else {
      navContainer.classList.remove('scrolled');
    }
  });

  // Cambiar fondo de la barra al hacer scroll
  window.addEventListener('scroll', function () {
    const fondo = document.querySelector('.fondo-navbar');
    if (window.scrollY > 50) {
      fondo.classList.add('transparent');
    } else {
      fondo.classList.remove('transparent');
    }
  });
  </script>
</body>
</html>