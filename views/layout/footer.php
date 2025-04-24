<!-- Botón de WhatsApp -->
<a href="https://wa.me/1234567890" target="_blank" class="whatsapp-button">
  <i class="fab fa-whatsapp"></i>
</a>

<!-- Botón de Facebook -->
<a href="https://www.facebook.com/people/XIV-Promoci%C3%B3n-ETE-Cabo-Alberto-Reyes-Gamarra/100083060895942/" target="_blank" class="facebook-button">
  <i class="fab fa-facebook-f"></i>
</a>

<!-- Asegúrate de incluir Font Awesome para los íconos -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
  .whatsapp-button, .facebook-button {
    display: inline-block;
    position: fixed;
    width: 80px;
    height: 80px;
    border-radius: 50%;
    text-align: center;
    line-height: 80px;
    color: #fff;
    font-size: 40px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    z-index: 1000;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  /* Botón de WhatsApp */
  .whatsapp-button {
    bottom: 20px;
    left: 20px;
    background-color: #25D366;
    animation: pulse 1.5s infinite;
  }

  /* Botón de Facebook (justo encima de WhatsApp) */
  .facebook-button {
    bottom: 110px; /* Ajustado para que quede encima de WhatsApp */
    left: 20px;
    background-color: #1877F2;
    animation: pulse 1.5s infinite;
  }

  /* Efecto hover individual */
  .whatsapp-button:hover {
    transform: scale(1.1);
    box-shadow: 0 4px 8px rgba(37, 211, 102, 0.5);
  }

  .facebook-button:hover {
    transform: scale(1.1);
    box-shadow: 0 4px 8px rgba(24, 119, 242, 0.5);
  }

  /* Animación de pulso */
  @keyframes pulse {
    0% {
      transform: scale(0.95);
      box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.2);
    }
    70% {
      transform: scale(1);
      box-shadow: 0 0 0 10px rgba(0, 0, 0, 0);
    }
    100% {
      transform: scale(0.95);
      box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
    }
  }
</style>



<footer class="section footer-modern bg-dark text-white py-5">
  <div class="container">
    <div class="row">
      <!-- Sección "What We Offer" -->
      <div class="col-md-6 col-lg-4">
        <h5 class="footer-modern-title  text-white">Integrantes</h5>
        <ul class="list-unstyled">
          <li><a href="#" class="text-white">Especialidades</a></li>
          <li><a href="#" class="text-white">Miembros</a></li>
          <li><a href="#" class="text-white">En Memoria</a></li>
          <li><a href="#" class="text-white">Finanzas</a></li>
        </ul>
      </div>

      <!-- Sección "Information" -->
      <div class="col-md-6 col-lg-4">
        <h5 class="footer-modern-title text-white" >Comunidad</h5>
        <ul class="list-unstyled">
          <li><a href="about-us.html" class="text-white">Emprendimientos</a></li>
          <li><a href="#" class="text-white">Logros</a></li>
          <li><a href="#" class="text-white">Noticias</a></li>
          <li><a href="#" class="text-white">Comentarios</a></li>
        </ul>
      </div>

      <!-- Dirección -->
      <div class="col-md-6 col-lg-4">
        <h5 class="footer-modern-title  text-white">Contactos</h5>
        <?php if ($contacto): ?>
        <p><?= htmlspecialchars($contacto['lugar']); ?></p>
        <p><?= htmlspecialchars($contacto['correo']); ?></p>
        <p><?= htmlspecialchars($contacto['redes_sociales']); ?></p>
        <?php else: ?>
                <p>No hay información de contacto disponible.</p>
                <?php endif; ?>
      </div>
    </div>
<br>
    <!-- Línea separadora -->
    <hr class="bg-white">

    <!-- Derechos de autor -->
    <div class="row justify-content-between">
      <div class="col-md-6">
        <p class="mb-0">&copy; <span class="copyright-year"></span> All Rights Reserved.</p>
      </div>
      <div class="col-md-auto">
        <p class="mb-0">Design by <a href="https://www.corpjuareztechnology.com" class="text-white">Corp. Juarez Technology</a></p>
      </div>
    </div>
  </div>
</footer>

  
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="views/assets/template/js/core.min.js"></script>
    <script src="views/assets/template/js/script.js"></script>
    <!-- coded by Himic-->