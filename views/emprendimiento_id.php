<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <title><?= htmlspecialchars($emprendimiento['nombre_emprendimiento']) ?></title>
  <link rel="icon" href="/PROYECTO-MILITAR/views/assets/img/logo.jpg" type="image/png">
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    rel="stylesheet"
  />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="<?= BASE_URL ?>views/assets/css/emprendimiento_id.css"/>
</head>
<body>
  <?php
    include 'layout/header.php';
    ?>
  <header>Nuestros emprendimientos</header>
  <main>
    <div class="container">
      <div class="thumbnails-scroll" role="list">
        <div class="thumbnails-container">
    <?php if (!empty($galeria)): ?>
        <?php foreach ($galeria as $imagen): ?>
            <?php
                $rutaImagen = "/PROYECTO-MILITAR/uploads/emprendimiento/" . htmlspecialchars($imagen['nombre_imagen']);
            ?>
            <button
                class="thumbnail-btn"
                aria-label="Vista previa de <?= htmlspecialchars($emprendimiento['nombre_emprendimiento']) ?>"
                data-img="<?= $rutaImagen ?>"
                type="button"
            >
                <img
                    src="<?= $rutaImagen ?>"
                    alt="Imagen de <?= htmlspecialchars($emprendimiento['nombre_emprendimiento']) ?>"
                    width="64"
                    height="64"
                />
            </button>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No hay imágenes disponibles.</p>
    <?php endif; ?>
</div>
      </div>
      <?php
// Ruta por defecto
$imagenPrincipal = "/PROYECTO-MILITAR/uploads/emprendimiento/default.png";

// Buscar la primera imagen si existe en la galería
if (!empty($galeria)) {
    foreach ($galeria as $img) {
        if (!empty($img['nombre_imagen'])) {
            $imagenPrincipal = "/PROYECTO-MILITAR/uploads/emprendimiento/" . htmlspecialchars($img['nombre_imagen']);
            break;
        }
    }
}
?>
<div class="main-image-container">
    <img
        id="mainImage"
        src="<?= $imagenPrincipal ?>"
        alt="Imagen destacada del emprendimiento"
        width="400"
        height="400"
    />
</div>
      <section class="right-content">
        <h1><?= htmlspecialchars($emprendimiento['nombre_emprendimiento']) ?></h1>
        <p class="price"><?= nl2br(htmlspecialchars($emprendimiento['contacto'])) ?></p>
        <p class="description-text">
          <?= nl2br(htmlspecialchars($emprendimiento['descripcion'])) ?>
        </p>
        <div class="social-label">Redes Sociales:</div>
<div class="social-icons">
  <?php if (!empty($emprendimiento['facebook'])): ?>
    <a
      href="<?= htmlspecialchars($emprendimiento['facebook']) ?>"
      target="_blank"
      rel="noopener noreferrer"
      aria-label="Facebook"
      class="social-icon facebook"
    >
      <i class="fab fa-facebook-f"></i>
    </a>
  <?php endif; ?>

  <?php if (!empty($emprendimiento['instagram'])): ?>
    <a
      href="<?= htmlspecialchars($emprendimiento['instagram']) ?>"
      target="_blank"
      rel="noopener noreferrer"
      aria-label="Instagram"
      class="social-icon instagram"
    >
      <i class="fab fa-instagram"></i>
    </a>
  <?php endif; ?>
</div>
        <hr />
        <?php if (!empty($emprendimiento['whatsapp'])): ?>
  <div>
    <a
      href="https://wa.me/<?= urlencode($emprendimiento['whatsapp']) ?>?text=<?= urlencode('Mas información') ?>"
      target="_blank"
      rel="noopener noreferrer"
      class="whatsapp-btn"
    >
      WhatsApp <i class="fab fa-whatsapp"></i>
    </a>
  </div>
<?php endif; ?>
      </section>
    </div>
    <div class="tabs">
      <nav class="tab-buttons" role="tablist">
        <button
          class="tab-button active"
          data-tab="description"
          role="tab"
          aria-selected="true"
          aria-controls="description"
          id="tab-description"
          type="button"
        >
          Description
        </button>
        <button
          class="tab-button"
          data-tab="video"
          role="tab"
          aria-selected="false"
          aria-controls="video"
          id="tab-video"
          type="button"
        >
          Video
        </button>
        <button
          class="tab-button"
          data-tab="map"
          role="tab"
          aria-selected="false"
          aria-controls="map"
          id="tab-map"
          type="button"
        >
          Map
        </button>
      </nav>
      <div
        class="tab-content"
        id="description"
        role="tabpanel"
        aria-labelledby="tab-description"
      >
        <p>
          <?= nl2br(htmlspecialchars($emprendimiento['subdescripcion'])) ?>
        </p>
        </p>
      </div>
      <div
        class="tab-content hidden"
        id="video"
        role="tabpanel"
        aria-labelledby="tab-video"
      >
        <?php if (!empty($videos)): ?>
    <div style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;">
        <iframe
            src="https://www.youtube.com/embed/<?= htmlspecialchars($videos[0]['codigo_video']) ?>"
            title="Video del emprendimiento"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
            style="position:absolute;top:0;left:0;width:100%;height:100%;border-radius:0.5rem"
        ></iframe>
    </div>
<?php else: ?>
    <p>No hay videos disponibles para este emprendimiento.</p>
<?php endif; ?>
      </div>
      <div
        class="tab-content hidden"
        id="map"
        role="tabpanel"
        aria-labelledby="tab-map"
      >
        <?php if (!empty($emprendimiento['ubicacion'])): ?>
  <iframe
    src="https://www.google.com/maps?q=<?= urlencode($emprendimiento['ubicacion']) ?>&output=embed"
    style="border:0; width:100%; height:384px; border-radius:0.5rem"
    allowfullscreen
    loading="lazy"
    title="Mapa de ubicación"
  ></iframe>
<?php endif; ?>
      </div>
    </div>
  </main>
  <button
    class="scroll-top-btn"
    aria-label="Scroll to top"
    type="button"
    onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
  >
    <i class="fas fa-arrow-up" aria-hidden="true"></i>
  </button>

  <button
    id="chatbotBtn"
    aria-label="Open chatbot"
    type="button"
    title="Open chatbot"
  >
    <i class="fab fa-whatsapp"></i>
  </button>

  <div id="chatbotModal" role="dialog" aria-modal="true" aria-labelledby="chatbotTitle" tabindex="-1">
    <div class="chatbot-content">
      <div class="chatbot-header">
        <h2 id="chatbotTitle" class="chatbot-title">
          <i class="fab fa-whatsapp"></i> Asistente Virtual
        </h2>
        <button id="closeChatbot" aria-label="Close chatbot" type="button" class="chatbot-close-btn">
          <i class="fas fa-times"></i>
        </button>
      </div>
      <div class="chatbot-message">
        Bienvenido a <strong><?= htmlspecialchars($emprendimiento['nombre_emprendimiento']) ?></strong>, si deseas más información aprieta aquí
      </div>
      <?php
$telefono = isset($emprendimiento['whatsapp']) ? preg_replace('/[^0-9]/', '', $emprendimiento['whatsapp']) : '';
$nombre = isset($emprendimiento['nombre_emprendimiento']) ? $emprendimiento['nombre_emprendimiento'] : '';
$mensaje = urlencode("Chatea en WhatsApp con \"$nombre\"");
$whatsappLink = "https://wa.me/$telefono?text=$mensaje";
?>
<div class="chatbot-link">
  <a href="<?= $whatsappLink ?>" target="_blank" rel="noopener noreferrer">
    Contactar por WhatsApp
  </a>
</div>
    </div>
  </div>

  <script>
    // Cambio de imagen principal al hacer click en miniaturas
    const thumbnails = document.querySelectorAll('.thumbnail-btn');
    const mainImage = document.getElementById('mainImage');

    thumbnails.forEach((btn) => {
      btn.addEventListener('click', () => {
        const newSrc = btn.getAttribute('data-img');
        mainImage.src = newSrc;

        thumbnails.forEach((b) => b.classList.remove('selected'));
        btn.classList.add('selected');
      });
    });

    // Funcionalidad de pestañas
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');

    tabButtons.forEach((btn) => {
      btn.addEventListener('click', () => {
        const target = btn.getAttribute('data-tab');

        tabButtons.forEach((b) => {
          b.classList.remove('active');
          b.setAttribute('aria-selected', 'false');
        });
        btn.classList.add('active');
        btn.setAttribute('aria-selected', 'true');

        tabContents.forEach((content) => {
          content.classList.add('hidden');
        });
        document.getElementById(target).classList.remove('hidden');
      });
    });

    // Toggle modal chatbot
    const chatbotBtn = document.getElementById('chatbotBtn');
    const chatbotModal = document.getElementById('chatbotModal');
    const closeChatbot = document.getElementById('closeChatbot');

    chatbotBtn.addEventListener('click', () => {
      chatbotModal.classList.add('active');
      chatbotModal.focus();
    });

    closeChatbot.addEventListener('click', () => {
      chatbotModal.classList.remove('active');
      chatbotBtn.focus();
    });

    chatbotModal.addEventListener('click', (e) => {
      if (e.target === chatbotModal) {
        chatbotModal.classList.remove('active');
        chatbotBtn.focus();
      }
    });
  </script>
  <?php
    include 'layout/footer.php';
    ?>
</body>
</html>