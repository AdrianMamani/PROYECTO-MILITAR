<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
<!--ICONS-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />


  <link rel="stylesheet" href="./css/sidebar.css">
</head>
<body>
  <aside class="sidebar">
  <div class="sidebar-header">
    <img src="../assets/img/panel.png" alt="logo">
    <h2>Admin Dashboard</h2>
  </div>
  <ul class="sidebar-link">
    <h4>
      <span>Menu Dashboard</span>
      <div class="menu-separator"></div>
    </h4> 
    <li>
      <a href=""><span class="material-symbols-outlined">dashboard</span>Inicio</a>
    </li>
    <li>
      <a href="index.php?controller=nosotros&action=edit"><span class="material-symbols-outlined">folder_shared</span>Nosotros</a>
    </li>
    <li>
      <a href="index.php?controller=especialidad&action=adminIndex"><span class="material-symbols-outlined">assignment</span>Especialidades</a>
    </li>
    <li>
      <a href="index.php?controller=emprendimiento&action=adminIndex"><span class="material-symbols-outlined">shopping_cart</span>Emprendimiento</a>
    </li>
    <li>
      <a href="index.php?controller=blogadmin&action=index"><span class="material-symbols-outlined">person_pin</span>Blogs</a>
    </li>
    <li>
      <a href="index.php?controller=comentarioadmin&action=index"><span class="material-symbols-outlined">chat</span>Comentarios</a>
    </li>
    <li>
      <a href="index.php?controller=noticiaAdmin&action=index"><span class="material-symbols-outlined">language</span>Noticias</a>
    </li>
    <h4><span>Menu Personal</span>
    <div class="menu-separator"></div>
    </h4>
    <li>
      <a href="index.php?controller=miembro&action=admin"><span class="material-symbols-outlined">groups</span>Miembros</a>
    </li>
    <li>
      <a href="index.php?controller=miembro&action=admin"><span class="material-symbols-outlined">deceased</span>En memoria</a>
    </li>
    <li>
      <a href=""><span class="material-symbols-outlined">paid</span>Aportaciones</a>
    </li>
    <h4><span>Perfil</span>
    <div class="menu-separator"></div>
    </h4>
    <li>
      <a href=""><span class="material-symbols-outlined">settings</span>Configuracion</a>
    </li>
    <li>
      <a href="index.php?controller=carruselAdmin&action=index"><span class="material-symbols-outlined">image</span>Carrusel web</a>
    </li>
  </ul>
  <div class="user-account">
    <div class="user-profile">
      <img src="../assets/img/nosotros123.png" alt="profile-img">
      <div class="user-detail">
      <h3>CABO ALBERTO</h3>
      <span>REYES GAMARRA</span>
      </div>
    </div>
  </div>
  </aside>
</body>
</html>