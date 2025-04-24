<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
  <div class="container mt-5">
    <h1>Bienvenido al Dashboard</h1>
    <p>Aquí puedes gestionar el contenido de tu sitio web.</p>

    <!-- Botón para salir -->
    <a href="index.php?controller=admin&action=logout" class="btn btn-danger">Salir</a>

    <!-- Botón para administrar la sección "Nosotros" -->
    <a href="index.php?controller=nosotros&action=edit" class="btn btn-primary mt-3">Administrar Nosotros</a>

    <!-- Botón para administrar especialidades -->
    <a href="index.php?controller=especialidad&action=adminIndex" class="btn btn-success mt-3">Administrar Especialidades</a>

    <!-- Botón para administrar comentarios -->
    <a href="index.php?controller=comentarioadmin&action=index" class="btn btn-info mt-3">Administrar Comentarios</a>

    <!-- Botón para editar contacto -->
    <a href="index.php?controller=contacto&action=editar" class="btn btn-warning mt-3">Editar Contacto</a>

    <!-- Botón para administrar miembros -->
    <a href="index.php?controller=miembro&action=admin" class="btn btn-secondary mt-3">Administrar Miembros</a>

    <!-- Botón para administrar emprendimiento -->
    <a href="index.php?controller=emprendimiento&action=adminIndex" class="btn btn-dark mt-3">Administrar Emprendimiento</a>

    <!-- Botón para administrar blogs -->
    <a href="index.php?controller=blogadmin&action=index" class="btn btn-dark mt-3">Administrar Blogs</a>

    <!-- Botón para administrar logros -->
    <a href="http://localhost/promocion/index.php?controller=logro&action=indexadmin" class="btn btn-dark mt-3">Administrar Logros</a>

    <!-- Botón para administrar en memoria -->
    <a href="index.php?controller=inMemoriaAdmin&action=index" class="btn btn-dark mt-3">Administrar In Memoria</a>

    <!-- Botón para administrar noticias -->
    <a href="index.php?controller=noticiaAdmin&action=index" class="btn btn-dark mt-3">Administrar Noticias</a>

     <!-- Botón para administrar noticias -->
     <a href="index.php?controller=carruselAdmin&action=index" class="btn btn-dark mt-3">Administrar Carrusel</a>
  
  </div>
</body>
</html>
