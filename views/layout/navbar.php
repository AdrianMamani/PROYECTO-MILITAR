
  <style>
    /* Estilos generales para el dropdown */
    .rd-navbar-dropdown {
      display: none;
      position: absolute;
      background: #fff;
      list-style: none;
      padding: 10px 0;
      margin: 0;
      border: 1px solid #ddd;
      z-index: 1000;
    }
    .rd-nav-item.rd-navbar--has-dropdown {
      position: relative;
    }
    /* Opcional: mostrar dropdown al pasar el mouse */
    .rd-nav-item.rd-navbar--has-dropdown:hover > .rd-navbar-dropdown {
      display: block;
    }
    .rd-navbar-dropdown li {
      margin: 0;
    }
    .rd-navbar-dropdown a {
      text-decoration: none;
      color: #333;
      padding: 5px 15px;
      display: block;
      font-size: 16px;
    }
    .rd-navbar-dropdown a:hover {
      background-color: #f0f0f0;
    }
    /* Mostrar dropdown al agregar la clase 'open' */
    .rd-nav-item.rd-navbar--has-dropdown.open > .rd-navbar-dropdown {
      display: block;
    }
    /* Estilo para la flechita del dropdown */
    .dropdown-arrow {
      font-size: 12px;
      margin-left: 5px;
    }
    /* Estilos para el menú Admin */
    .rd-nav-item.admin-menu a {
      background-color: #e0e0e0; /* Fondo diferente */
      font-size: 12px;           /* Letra más pequeña */
      padding: 5px 10px;
      display: inline-flex;
      align-items: center;
    }
    .rd-nav-item.admin-menu a .icon {
      margin-right: 5px;
    }
  
.rd-navbar-contacts-2 a {
    color:rgb(82, 82, 82) !important; /* Un gris medio */
}

  </style>

  <!-- Page Header -->
  <header class="section page-header">
    <!-- RD Navbar-->
    <div class="rd-navbar-wrap">
      <nav class="rd-navbar rd-navbar-modern"
           data-layout="rd-navbar-fixed"
           data-sm-layout="rd-navbar-fixed"
           data-md-layout="rd-navbar-fixed"
           data-md-device-layout="rd-navbar-fixed"
           data-lg-layout="rd-navbar-static"
           data-lg-device-layout="rd-navbar-fixed"
           data-xl-layout="rd-navbar-static"
           data-xl-device-layout="rd-navbar-static"
           data-xxl-layout="rd-navbar-static"
           data-xxl-device-layout="rd-navbar-static"
           data-lg-stick-up-offset="56px"
           data-xl-stick-up-offset="56px"
           data-xxl-stick-up-offset="56px"
           data-lg-stick-up="true"
           data-xl-stick-up="true"
           data-xxl-stick-up="true">
        <div class="rd-navbar-inner-outer">
          <div class="rd-navbar-inner">
            <!-- RD Navbar Panel-->
            <div class="rd-navbar-panel">
              <!-- RD Navbar Toggle-->
              <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
              <!-- RD Navbar Brand-->
              <div class="rd-navbar-brand">
                <a class="brand" href="index.php">
                  <img class="brand-logo-dark" src="views/assets/template/images/logo.png" alt="Logo" width="108" height="46"/>
                </a>
              </div>
            </div>
            <div class="rd-navbar-right rd-navbar-nav-wrap">
              <div class="rd-navbar-aside">
                <?php if ($contacto): ?>
                <ul class="rd-navbar-contacts-2">
                  <li>
                    <div class="unit unit-spacing-xs">
                      <div class="unit-left">
                        <span class="icon mdi mdi-phone"></span>
                      </div>
                      <div class="unit-body">
                        <a class="phone" href="tel:#"><?= htmlspecialchars($contacto['celular']); ?></a>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="unit unit-spacing-xs">
                      <div class="unit-left">
                        <span class="icon mdi mdi-map-marker"></span>
                      </div>
                      <div class="unit-body">
                        <a class="address" href="#"><?= htmlspecialchars($contacto['lugar']); ?></a>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="unit unit-spacing-xs">
                      <div class="unit-left">
                        <span class="icon mdi mdi-email"></span>
                      </div>
                      <div class="unit-body">
                        <a class="address" href="#"><?= htmlspecialchars($contacto['correo']); ?></a>
                      </div>
                    </div>
                  </li>
                </ul>
               
                <?php else: ?>
                <p>No hay información de contacto disponible.</p>
                <?php endif; ?>
              </div>
              <div class="rd-navbar-main">
                <!-- RD Navbar Nav-->
                <ul class="rd-navbar-nav">
                  <li class="rd-nav-item active">
                    <a class="rd-nav-link" href="index.php">Inicio</a>
                  </li>

                  <li class="rd-nav-item">
                    <a class="rd-nav-link" href="index.php?controller=blog&action=index">Blog</a>
                  </li>
                
                 

                    <!-- Menú desplegable para Comunidad -->
                    <li class="rd-nav-item rd-navbar--has-dropdown">
                    <a class="rd-nav-link" href="#">
                    Integrantes <span class="dropdown-arrow">▼</span>
                    </a>
                    <ul class="rd-navbar-dropdown">
                    <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="index.php?controller=especialidad&action=index">Especialidades</a></li>
                    <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="index.php?controller=miembro&action=index">Miembros</a></li>
                      <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="index.php?controller=enMemoria&action=index">En Memoria</a></li>
                      <li class="rd-dropdown-item"><a class="rd-dropdown-link" >Finanzas</a></li>
                    </ul>
                  </li>
                 
                  <!-- Menú desplegable para Comunidad -->
                  <li class="rd-nav-item rd-navbar--has-dropdown">
                    <a class="rd-nav-link" href="#">
                      Comunidad <span class="dropdown-arrow">▼</span>
                    </a>
                    <ul class="rd-navbar-dropdown">
                      <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="index.php?controller=emprendimiento&action=index">Emprendimientos</a></li>
                      <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="index.php?controller=logro&action=index">Logros</a></li>
                      <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="index.php?controller=noticia&action=index">Noticias</a></li>
                      <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="index.php?controller=comentarioweb&action=index">Comentarios</a></li>
                    </ul>
                  </li>
                  <li class="rd-nav-item">
    <a class="rd-nav-link" href="index.php?controller=admin&action=login">
        <span class="icon mdi mdi-lock"></span> Admin
    </a>
</li>

                  
                 
                </ul>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>

  <!-- Script para alternar los dropdowns al hacer clic -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var dropdownToggles = document.querySelectorAll('.rd-nav-item.rd-navbar--has-dropdown > a');
      dropdownToggles.forEach(function(toggle) {
        toggle.addEventListener('click', function(event) {
          event.preventDefault();
          this.parentElement.classList.toggle('open');
        });
      });
      
      // Cerrar dropdown si se hace clic fuera
      document.addEventListener('click', function(event) {
        dropdownToggles.forEach(function(toggle) {
          if (!toggle.parentElement.contains(event.target)) {
            toggle.parentElement.classList.remove('open');
          }
        });
      });
    });
  </script>
