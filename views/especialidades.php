<html class="scroll-smooth" lang="es">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   Especialidades
  </title>
  <link rel="icon" href="/PROYECTO-MILITAR/views/assets/img/logo.jpg" type="image/png">
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
      font-family: 'Montserrat', sans-serif;
    }
  </style>
 </head>
 <body class="bg-gray-50 text-gray-900">
    <?php
    include 'layout/header.php';
    ?>
  <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
 <h2 class="text-3xl font-extrabold text-center mb-10">
  Nuestras Especialidades
 </h2>
 <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
  <?php foreach ($especialidades as $esp): ?>
  <div class="flex flex-col items-center bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
   <img alt="Imagen de <?= htmlspecialchars($esp['nombre']) ?>" 
        class="w-full h-48 object-cover" 
        height="300" loading="lazy" 
        src="<?= htmlspecialchars($esp['imagen']) ?>" width="400"/>
   <h3 class="text-xl font-semibold mt-4 mb-4">
    <?= htmlspecialchars($esp['nombre']) ?>
   </h3>
   <a href="<?= BASE_URL ?>especialidad_index/<?= $esp['id'] ?>" 
   aria-label="Más información sobre <?= htmlspecialchars($esp['nombre']) ?>" 
   class="mb-6 px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition text-center">
   Información
</a>
  </div>
  <?php endforeach; ?>
 </div>
</section>
 <?php
    include 'layout/footer.php';
    ?>
 </body>
</html>