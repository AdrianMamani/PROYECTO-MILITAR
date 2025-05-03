<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Promoción Militar Navbar with Stable Hover Submenus</title>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');
  * {
    box-sizing: border-box;
  }
  body {
    margin: 0;
    font-family: 'Inter', sans-serif;
    background-color: #fff;
  }
  nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 24px;
    max-width: 100%;
    border-bottom: 2px solid #D61B1B;
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
    color: #000;
    font-size: 10px;
    font-weight: 400;
    text-transform: uppercase;
    font-family: 'Inter', sans-serif;
  }
  .logo-text p {
    margin: 0;
  }
  .logo-text .bold {
    font-weight: 700;
    font-size: 13px;
    line-height: 15px;
    text-transform: none;
  }
  ul.nav-links {
    list-style: none;
    display: flex;
    gap: 28px;
    margin: 0;
    padding: 0;
  }
  ul.nav-links li {
    position: relative;
  }
  ul.nav-links li a {
    font-weight: 700;
    font-size: 13px;
    color: #000;
    text-decoration: none;
    padding: 6px 14px;
    border-radius: 10px;
    transition: color 0.3s ease;
    letter-spacing: 0.03em;
    display: inline-block;
  }
  ul.nav-links li a:hover {
    color: #008000; /* green text on hover */
  }
  ul.nav-links li.active > a {
    background-color: #e6f0e6; /* light green background */
    color: #000;
    font-weight: 800;
  }
  ul.nav-links li.active > a:hover {
    color: #008000; /* green text on hover for active */
  }
  /* Submenu styles */
  ul.submenu {
    display: none;
    position: absolute;
    top: 38px;
    left: 0;
    background: #fff;
    border: 1.5px solid #008000;
    border-radius: 12px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.15);
    min-width: 180px;
    z-index: 200;
    padding: 12px 0;
    font-size: 14px;
    font-weight: 600;
    font-family: 'Inter', sans-serif;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.2s ease;
  }
  ul.submenu li {
    padding: 0;
    margin: 0;
  }
  ul.submenu li a {
    padding: 10px 20px;
    color: #000;
    text-decoration: none;
    display: block;
    border-radius: 8px;
    transition: background-color 0.3s ease, color 0.3s ease;
  }
  ul.submenu li a:hover {
    background-color: #e6f0e6;
    color: #008000;
  }
  ul.nav-links li:hover > ul.submenu,
  ul.nav-links li:focus-within > ul.submenu {
    display: block;
    opacity: 1;
    pointer-events: auto;
  }
  /* Remove default list styles */
  ul.nav-links, ul.submenu {
    list-style: none;
  }
  /* Remove bullet points in submenu */
  ul.submenu li {
    list-style: none;
  }
  button.admin-btn {
    background-color: #D61B1B;
    color: #fff;
    font-weight: 900;
    font-size: 11px;
    text-transform: uppercase;
    border: none;
    border-radius: 9999px;
    padding: 8px 20px;
    cursor: pointer;
    box-shadow: 0 0 6px rgba(214, 27, 27, 0.7);
    letter-spacing: 0.05em;
    transition: background-color 0.3s ease;
  }
  button.admin-btn:hover {
    background-color: #a31515;
  }
  /* Hamburger menu button */
  .menu-button {
    display: none;
    background: none;
    border: none;
    cursor: pointer;
    padding: 6px;
    position: relative;
    width: 40px;
    height: 32px;
  }
  .menu-button svg {
    width: 100%;
    height: 100%;
    fill: none;
    stroke: #000;
    stroke-width: 3.5;
    stroke-linecap: round;
    stroke-linejoin: round;
    transition: stroke 0.3s ease;
  }
  .menu-button:hover svg,
  .menu-button:focus svg {
    stroke: #008000;
  }
  /* Modal styles */
  .modal-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background-color: rgba(0,0,0,0.5);
    z-index: 1000;
    justify-content: flex-start;
    align-items: flex-start;
  }
  .modal-overlay.active {
    display: flex;
  }
  .modal-content {
    background-color: #fff;
    border-radius: 12px 0 0 12px;
    width: 320px;
    max-width: 90vw;
    height: 80vh;
    padding: 24px 20px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.2);
    position: relative;
    font-family: 'Inter', sans-serif;
    margin: 16px 0 0 0;
    overflow-y: auto;
  }
  .modal-close {
    position: absolute;
    top: 12px;
    right: 12px;
    background: none;
    border: none;
    font-size: 28px;
    font-weight: 700;
    cursor: pointer;
    color: #D61B1B;
    line-height: 1;
  }
  .modal-nav {
    list-style: none;
    padding: 0;
    margin: 0 0 24px 0;
    display: flex;
    flex-direction: column;
    gap: 16px;
  }
  .modal-nav li {
    position: relative;
  }
  .modal-nav li a {
    font-weight: 700;
    font-size: 16px;
    color: #000;
    text-decoration: none;
    padding: 10px 14px;
    border-radius: 10px;
    border: 2.5px solid transparent;
    transition: border-color 0.3s ease, color 0.3s ease;
    display: block;
  }
  .modal-nav li.active > a {
    background-color: #e6f0e6; /* light green background */
    font-weight: 800;
    border-color: transparent;
  }
  .modal-nav li a:hover {
    color: #008000;
  }
  /* Modal submenu toggle button */
  .submenu-toggle {
    background: none;
    border: none;
    font-size: 14px;
    font-weight: 700;
    cursor: pointer;
    color: #000;
    padding: 10px 14px;
    width: 100%;
    text-align: left;
    border-radius: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  .submenu-toggle:hover {
    color: #008000;
  }
  .submenu-toggle:focus {
    outline: 2px solid #008000;
    outline-offset: 2px;
  }
  .submenu-arrow {
    border: solid #000;
    border-width: 0 2.5px 2.5px 0;
    display: inline-block;
    padding: 4px;
    margin-left: 8px;
    transform: rotate(45deg);
    transition: transform 0.3s ease;
  }
  .submenu-arrow.open {
    transform: rotate(-135deg);
  }
  .modal-submenu {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease;
    padding-left: 16px;
    margin-top: 4px;
    margin-bottom: 12px;
  }
  .modal-submenu.open {
    max-height: 500px; /* enough to show all items */
  }
  .modal-submenu li a {
    font-weight: 600;
    font-size: 14px;
    padding: 8px 14px;
    border-radius: 8px;
  }
  .modal-submenu li a:hover {
    background-color: #e6f0e6;
    color: #008000;
  }
  .modal-admin-btn {
    width: 100%;
    background-color: #D61B1B;
    color: #fff;
    font-weight: 900;
    font-size: 14px;
    text-transform: uppercase;
    border: none;
    border-radius: 9999px;
    padding: 12px 0;
    cursor: pointer;
    box-shadow: 0 0 6px rgba(214, 27, 27, 0.7);
    letter-spacing: 0.05em;
    transition: background-color 0.3s ease;
  }
  .modal-admin-btn:hover {
    background-color: #a31515;
  }
  @media (max-width: 768px) {
    ul.nav-links {
      display: none;
    }
    button.admin-btn {
      display: none;
    }
    .menu-button {
      display: block;
    }
  }
</style>
</head>
<body>
<nav>
  <div class="logo-container">
    <img class="logo-img" src="https://storage.googleapis.com/a1aa/image/039aab5e-f041-49a8-d02e-7883e6fc4575.jpg" alt="Logo with red star and green text reading CABO" />
    <div class="logo-text" aria-label="Promoción Cabo Alberto Reyes Gamarra">
      <p>PROMOCION</p>
      <p class="bold">CABO ALBERTO</p>
      <p class="bold">REYES GAMARRA</p>
    </div>
  </div>
  <ul class="nav-links" role="menubar" aria-label="Primary navigation">
    <li class="active" role="none"><a role="menuitem" href="#" aria-current="page">Inicio</a></li>
    <li role="none"><a role="menuitem" href="#">Sobre Nosotros</a></li>
    <li role="none"><a role="menuitem" href="#">Blog</a></li>
    <li role="none" tabindex="0" aria-haspopup="true" aria-expanded="false" aria-controls="submenu-miembros">
      <a role="menuitem" href="#" id="miembros-link">Miembros ▾</a>
      <ul class="submenu" id="submenu-miembros" role="menu" aria-label="Submenu Miembros">
        <li role="none"><a role="menuitem" href="#">Usuarios</a></li>
        <li role="none"><a role="menuitem" href="#">Memoria</a></li>
      </ul>
    </li>
    <li role="none" tabindex="0" aria-haspopup="true" aria-expanded="false" aria-controls="submenu-comunidad">
      <a role="menuitem" href="#" id="comunidad-link">Comunidad ▾</a>
      <ul class="submenu" id="submenu-comunidad" role="menu" aria-label="Submenu Comunidad">
        <li role="none"><a role="menuitem" href="#">Emprendimientos</a></li>
        <li role="none"><a role="menuitem" href="#">Noticias</a></li>
        <li role="none"><a role="menuitem" href="#">Finanzas</a></li>
      </ul>
    </li>
  </ul>
  <button class="admin-btn" type="button" aria-label="Administrador">
    ADMINISTRADOR
  </button>
  <button class="menu-button" aria-label="Abrir menú" aria-haspopup="true" aria-controls="mobile-menu" aria-expanded="false" id="menu-button">
    <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
      <line x1="3" y1="6" x2="21" y2="6"></line>
      <line x1="3" y1="12" x2="21" y2="12"></line>
      <line x1="3" y1="18" x2="21" y2="18"></line>
    </svg>
  </button>
</nav>

<div class="modal-overlay" id="mobile-menu" role="dialog" aria-modal="true" aria-labelledby="modal-title" tabindex="-1">
  <div class="modal-content" style="margin-left:0; margin-right:16px; border-radius: 0 12px 12px 0;">
    <button class="modal-close" aria-label="Cerrar menú" id="modal-close">&times;</button>
    <ul class="modal-nav" role="menu" aria-labelledby="modal-title">
      <li class="active" role="none"><a role="menuitem" href="#" aria-current="page">Inicio</a></li>
      <li role="none"><a role="menuitem" href="#">Sobre Nosotros</a></li>
      <li role="none"><a role="menuitem" href="#">Blog</a></li>
      <li role="none">
        <button class="submenu-toggle" aria-expanded="false" aria-controls="modal-submenu-miembros" id="toggle-miembros">
          Miembros <span class="submenu-arrow"></span>
        </button>
        <ul class="modal-submenu" id="modal-submenu-miembros" role="menu" aria-label="Submenu Miembros">
          <li role="none"><a role="menuitem" href="#">Usuarios</a></li>
          <li role="none"><a role="menuitem" href="#">Memoria</a></li>
        </ul>
      </li>
      <li role="none">
        <button class="submenu-toggle" aria-expanded="false" aria-controls="modal-submenu-comunidad" id="toggle-comunidad">
          Comunidad <span class="submenu-arrow"></span>
        </button>
        <ul class="modal-submenu" id="modal-submenu-comunidad" role="menu" aria-label="Submenu Comunidad">
          <li role="none"><a role="menuitem" href="#">Emprendimientos</a></li>
          <li role="none"><a role="menuitem" href="#">Noticias</a></li>
          <li role="none"><a role="menuitem" href="#">Finanzas</a></li>
        </ul>
      </li>
    </ul>
    <button class="modal-admin-btn" type="button">ADMINISTRADOR</button>
  </div>
</div>

<script>
  const menuButton = document.getElementById('menu-button');
  const modal = document.getElementById('mobile-menu');
  const modalClose = document.getElementById('modal-close');

  function openModal() {
    modal.classList.add('active');
    menuButton.setAttribute('aria-expanded', 'true');
    modal.focus();
  }

  function closeModal() {
    modal.classList.remove('active');
    menuButton.setAttribute('aria-expanded', 'false');
    menuButton.focus();
  }

  menuButton.addEventListener('click', () => {
    if (modal.classList.contains('active')) {
      closeModal();
    } else {
      openModal();
    }
  });

  modalClose.addEventListener('click', closeModal);

  // Close modal on overlay click
  modal.addEventListener('click', (e) => {
    if (e.target === modal) {
      closeModal();
    }
  });

  // Close modal on Escape key
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modal.classList.contains('active')) {
      closeModal();
    }
  });

  // Accessibility: update aria-expanded on hover/focus for desktop submenus
  const miembrosLi = document.querySelector('ul.nav-links li[aria-controls="submenu-miembros"]');
  const comunidadLi = document.querySelector('ul.nav-links li[aria-controls="submenu-comunidad"]');

  function setAriaExpanded(element, value) {
    const link = element.querySelector('a[aria-haspopup="true"]');
    if (link) {
      link.setAttribute('aria-expanded', value);
    }
  }

  // Add event listeners to manage aria-expanded and prevent flicker
  [miembrosLi, comunidadLi].forEach((li) => {
    let timeoutId;
    li.addEventListener('mouseenter', () => {
      clearTimeout(timeoutId);
      setAriaExpanded(li, 'true');
    });
    li.addEventListener('mouseleave', () => {
      timeoutId = setTimeout(() => {
        setAriaExpanded(li, 'false');
      }, 200);
    });
    li.addEventListener('focusin', () => {
      clearTimeout(timeoutId);
      setAriaExpanded(li, 'true');
    });
    li.addEventListener('focusout', () => {
      timeoutId = setTimeout(() => {
        setAriaExpanded(li, 'false');
      }, 200);
    });
  });

  const adminButtons = document.querySelectorAll('.admin-btn, .modal-admin-btn');
  adminButtons.forEach((btn) => {
    btn.addEventListener('click', () => {
      window.location.href = 'index.php?action=auth/loginForm';
    });
  });

</script>
</body>
</html>