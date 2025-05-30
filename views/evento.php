<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Blog</title>
  <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="/PROYECTO-MILITAR/views/assets/css/evento.css" />

</head>
<body>
  <!-- Preloader -->
    <div id="preloader">
        <img src="/PROYECTO-MILITAR/views/assets/img/logo.jpg" alt="Cargando..."> <!-- Cambia por la ruta de tu logo -->
    </div>
    <?php
include 'layout/header.php';
?>
  <header>
    <h1>BLOG</h1>
  </header>
  <main>
    <div class="intro">
      <h2>Explora Nuestro Blog</h2>
      <p>Descubre historias, curiosidades y anécdotas inspiradoras. Mantente al día con nuestras novedades y promociones especiales.</p>
    </div>
    <section class="grid" aria-label="Listado de artículos del blog">
      <?php if (!empty($eventos)): ?>
        <?php foreach ($eventos as $evento): ?>
      <article>
        <img 
  src="/PROYECTO-MILITAR/uploads/evento/<?= htmlspecialchars($evento['imagen']) ?>" 
  alt="<?= htmlspecialchars($evento['titulo']) ?>" 
/>
        <div class="meta"><span>FECHA DE EVENTO</span> |  <span><?= htmlspecialchars(date('d/m/Y', strtotime($evento['fecha']))) ?></span> </div>
        <p class="title"><?= htmlspecialchars($evento['titulo']) ?></p>
        <a href="index.php?action=eventos/ver/<?= $evento['id'] ?>" 
   aria-label="Leer más sobre <?= htmlspecialchars($evento['titulo']) ?>">
   <button type="button">Leer más</button>
</a>
      </article>
      <?php endforeach; ?>
    <?php else: ?>
        <p>No hay eventos disponibles.</p>
    <?php endif; ?>
    </section>
  </main>
  <script>
    const buttons = document.querySelectorAll('button');
    buttons.forEach(button => {
      button.addEventListener('click', () => {
        button.style.transform = 'scale(1.15)';
        setTimeout(() => {
          button.style.transform = 'scale(1)';
        }, 150);
      });
    });
  </script>
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
</body>
</html>