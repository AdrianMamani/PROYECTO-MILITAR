<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <title>Sobre Nosotros</title>
  <link rel="icon" href="/PROYECTO-MILITAR/views/assets/img/logo.jpg" type="image/png">
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    rel="stylesheet"
  />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="<?= BASE_URL ?>views/assets/css/efecto.css">
  <style>
    body {
      font-family: "Poppins", sans-serif;
      background: white;
      min-height: 100vh;
    }
    
    /* Facebook style card */
    .fb-card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 2px 5px rgb(0 0 0 / 0.15);
      transition: box-shadow 0.3s ease;
      overflow: hidden;
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
    }
    .fb-card:hover {
      box-shadow: 0 8px 20px rgb(0 0 0 / 0.25);
    }
    .fb-card img {
      width: 144px;
      height: 144px;
      border-radius: 50%;
      margin-top: 1.5rem;
      object-fit: cover;
      box-shadow: 0 0 0 4px #1877f2;
      transition: box-shadow 0.3s ease;
    }
    .fb-card:hover img {
      box-shadow: 0 0 0 6px #0f5acb;
    }
    .fb-card h3 {
      margin-top: 1rem;
      font-weight: 600;
      font-size: 1.25rem;
      color: #050505;
    }
    .fb-card p {
      margin: 0.5rem 1.5rem 1.5rem;
      color: #606770;
      font-size: 0.9rem;
      line-height: 1.3;
    }
    .fb-btn {
      background-color: #1877f2;
      color: white;
      font-weight: 600;
      border-radius: 9999px;
      padding: 0.5rem 1.5rem;
      margin-bottom: 1.5rem;
      box-shadow: 0 2px 5px rgb(0 0 0 / 0.15);
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
      cursor: pointer;
      user-select: none;
      border: none;
      outline: none;
      width: fit-content;
    }
    .fb-btn:hover {
      background-color: #0f5acb;
      box-shadow: 0 4px 12px rgb(0 0 0 / 0.25);
    }
    /* Mission and Vision icon wrapper */
    .icon-wrapper {
      background-color: #047857; /* Tailwind green-700 */
      width: 80px;
      height: 80px;
      border-radius: 0.75rem; /* rounded-xl */
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.3s ease;
    }
    .icon-wrapper:hover {
      background-color: #065f46; /* Tailwind green-800 */
      transform: scale(1.1);
    }
    .icon-wrapper i {
      color: white;
      font-size: 2.5rem;
      filter: drop-shadow(0 2px 2px rgba(0,0,0,0.2));
    }
    /* Larger logo between mission and vision */
    
    /* Modern banner style */
    .modern-banner {
      background: linear-gradient(90deg, #047857 0%, #10b981 100%);
      color: white;
      font-weight: 700;
      font-size: 1.75rem;
      padding: 2rem 1.5rem;
      border-radius: 1rem;
      text-align: center;
      max-width: 1100px;
      margin: 0 auto;
      user-select: none;
      letter-spacing: 0.03em;
    }
    @media (min-width: 768px) {
      .modern-banner {
        font-size: 2.25rem;
        padding: 2.5rem 2rem;
      }
    }
  </style>
</head>
<?php include 'layout/header.php'; ?>
<body>
    <div id="preloader">
        <img src="/PROYECTO-MILITAR/views/assets/img/logo.jpg" alt="Cargando..."> <!-- Cambia por la ruta de tu logo -->
    </div>
  <section class="max-w-7xl mx-auto px-6 py-20 flex flex-col md:flex-row items-center md:items-start gap-16 md:gap-28">
    <div class="md:w-1/2 space-y-10">
  <h2 class="inline-block bg-gradient-to-r from-yellow-400 to-yellow-300 text-black text-3xl font-extrabold px-8 py-4 rounded-xl shadow-lg tracking-wide select-none">
    Sobre Nosotros
  </h2>

  <?php if (!empty($nosotrosItems)): ?>
      <?php foreach ($nosotrosItems as $item): ?>
          <?php
          $parrafos = preg_split('/\r\n|\r|\n/', $item['descripcion'], -1, PREG_SPLIT_NO_EMPTY);
          foreach ($parrafos as $p):
          ?>
              <p class="text-gray-900 text-lg leading-relaxed tracking-wide drop-shadow-sm">
                  <?= htmlspecialchars(trim($p)) ?>
              </p>
          <?php endforeach; ?>
      <?php endforeach; ?>
  <?php else: ?>
      <p>No hay información disponible.</p>
  <?php endif; ?>
</div>
    <div class="md:w-1/2 flex justify-center md:justify-end rounded-3xl overflow-hidden shadow-2xl transform hover:scale-105 transition-transform duration-500 h-[500px]">
  <img
    alt="Group of men in uniform posing in front of a monument with blue sky"
    class="w-full h-full object-cover"
    src="/PROYECTO-MILITAR/uploads/<?= htmlspecialchars($imagenId1['nombre_imagen']) ?>"
  />
</div>
  </section>

  <section class="max-w-7xl mx-auto px-6 py-20 grid grid-cols-1 md:grid-cols-[1fr_280px_1fr] gap-12 md:gap-8 items-center">
    <?php
        $mision = 'Nuestra misión es proporcionar formación de excelencia, desarrollando profesionales íntegros y comprometidos con los valores de honor, disciplina y servicio a la nación.';
        $vision = 'Ser reconocidos como una institución líder en la formación de profesionales de alto nivel, contribuyendo al desarrollo y seguridad del país a través de la excelencia educativa y el compromiso con la sociedad.';

        if (!empty($nosotrosItems) && is_array($nosotrosItems)) {
            // Asumimos que solo hay un registro en la tabla (o se toma el primero)
            $mision = $nosotrosItems[0]['mision'] ?? $mision;
            $vision = $nosotrosItems[0]['vision'] ?? $vision;
        }
        ?>
    <!-- Misión -->
    <div class="flex flex-col items-center md:items-end gap-6 pr-4">
        <div class="icon-wrapper text-yellow-500 text-4xl">
            <i class="fas fa-rocket"></i>
        </div>
        <h3 class="text-gray-900 font-extrabold text-3xl tracking-tight">
            Misión
        </h3>
        <p class="text-gray-800 text-base max-w-xs leading-relaxed text-right tracking-wide">
            <?= htmlspecialchars($mision) ?>
        </p>
    </div>

    <?php
// Buscar la primera imagen cuyo id no sea 1
$imagenMostrar = null;
foreach ($imagenesNosotros as $imagen) {
    if ($imagen['id'] != 1) {
        $imagenMostrar = $imagen;
        break;
    }
}
?>
    <div class="center-logo flex justify-center items-center">
        <?php if ($imagenMostrar): ?>
        <img
            alt="Emblema institucional"
            src="/PROYECTO-MILITAR/uploads/<?= htmlspecialchars($imagenMostrar['nombre_imagen']) ?>"
            width="280"
            class="object-contain"
        />
        <?php else: ?>
        <!-- Imagen por defecto si no hay ninguna -->
        <img src="../uploads/68409105e770c_logo.jpg" alt="Logo Institucional">
    <?php endif; ?>
    </div>

    <!-- Visión -->
    <div class="flex flex-col items-center md:items-start gap-6 pl-4">
        <div class="icon-wrapper text-yellow-500 text-4xl">
            <i class="fas fa-globe-americas"></i>
        </div>
        <h3 class="text-gray-900 font-extrabold text-3xl tracking-tight">
            Visión
        </h3>
        <p class="text-gray-800 text-base max-w-xs leading-relaxed text-left tracking-wide">
            <?= htmlspecialchars($vision) ?>
        </p>
    </div>
</section>

  <section class="max-w-7xl mx-auto px-6 pt-8 pb-12 flex flex-col items-center gap-8">
    <h2 class="text-3xl font-extrabold text-gray-900 tracking-wide">
      Video Institucional
    </h2>
    <div class="w-full max-w-4xl aspect-video rounded-3xl overflow-hidden shadow-2xl">
        <?php
                // Incluir el controlador para obtener el video
                
                // Obtener el código de video de YouTube
                $videoCode = '';
                if (!empty($itemsCarrusel) && is_array($itemsCarrusel)) {
                    $videoCode = $itemsCarrusel[0]['url_archivo'] ?? '';
                }
                
                // Si no hay código de video, usar uno predeterminado
                if (empty($videoCode)) {
                    $videoCode = 'dQw4w9WgXcQ'; // Video predeterminado
                }
                ?>
      <iframe
        class="w-full h-full"
        src="https://www.youtube.com/embed/<?php echo htmlspecialchars($videoCode); ?>"
        title="Video institucional"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen
      ></iframe>
    </div>
    <a
  href="https://www.youtube.com/watch?v=<?= htmlspecialchars($videoCode); ?>"
  target="_blank"
  rel="noopener noreferrer"
  class="flex items-center bg-red-600 hover:bg-red-700 text-white font-semibold rounded-full px-8 py-4 shadow-lg transition-colors duration-300 cursor-pointer select-none mt-6"
>
  <i class="fab fa-youtube text-3xl mr-4"></i> Ver en YouTube
</a>
  </section>

  <section class="max-w-[1200px] mx-auto px-6 mb-20">
    <div class="modern-banner">
      Forjando un legado de honor y compromiso
    </div>
  </section>

  <section class="max-w-7xl mx-auto px-6 pb-20">
    <h2 class="text-3xl font-extrabold text-gray-900 mb-12 text-center">
      Nuestro Equipo
    </h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
        <?php foreach ($miembros as $miembro): ?>
      <!-- Member 1 -->
      <div class="fb-card">
        <img
          alt="Retrato de miembro 1 con fondo neutro"
          src="<?= BASE_URL ?>uploads/usuarios/imagenes/<?= htmlspecialchars($miembro['imagen_usuario']) ?>"
          width="144"
          height="144"
        />
        <h3><?= htmlspecialchars($miembro['nombre']) ?></h3>
        <br>
        <a class="fb-btn" href="<?= BASE_URL ?>miembro/<?= $miembro['id'] ?>">Más información</a>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="flex justify-center mt-12">
      <a
  href="index.php?action=miembros"
  class="bg-gray-900 hover:bg-gray-800 text-white font-semibold rounded-full px-10 py-3 shadow-lg transition-colors duration-300 inline-block text-center"
>
  Ver todo
</a>
    </div>
  </section>
  <script>
    // Script para manejar el preloader
    document.addEventListener('DOMContentLoaded', function() {
        const preloader = document.getElementById('preloader');
        const body = document.body;
        
        // Forzar el repintado para asegurar que la animación funcione
        void preloader.offsetWidth;
        
        // Mostrar por exactamente 3 segundos
        setTimeout(function() {
            body.classList.add('loaded');
            
            // Eliminar el preloader después de la animación
            setTimeout(function() {
                preloader.remove();
                // Mostrar todo el contenido
                document.querySelectorAll('body > *:not(script)').forEach(el => {
                    el.style.visibility = 'visible';
                });
            }, 500); // Medio segundo para la transición de desvanecimiento
        }, 3000); // 3 segundos exactos
    });
</script>
<?php include 'layout/footer.php'; ?>
</body>
</html>