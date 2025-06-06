<!-- Footer -->
    <footer class="bg-dark text-light py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5><i class="fas fa-newspaper me-2"></i>Portal de Noticias</h5>
                    <p class="text-muted">Tu fuente confiable de información actualizada. Mantente al día con las últimas noticias y acontecimientos.</p>
                    <div class="social-links">
                        <a href="#" class="text-light me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 mb-4">
                    <h6>Navegación</h6>
                    <ul class="list-unstyled">
                        <li><a href="index.php?action=noticias-public/index" class="text-muted">Inicio</a></li>
                        <li><a href="#" class="text-muted">Categorías</a></li>
                        <li><a href="#" class="text-muted">Archivo</a></li>
                        <li><a href="#" class="text-muted">Contacto</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-4">
                    <h6>Información</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-muted">Acerca de</a></li>
                        <li><a href="#" class="text-muted">Política de Privacidad</a></li>
                        <li><a href="#" class="text-muted">Términos de Uso</a></li>
                        <li><a href="#" class="text-muted">RSS</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-4">
                    <h6>Suscríbete</h6>
                    <p class="text-muted small">Recibe las últimas noticias en tu email</p>
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="Tu email">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="text-muted small mb-0">&copy; <?= date('Y') ?> Portal de Noticias. Todos los derechos reservados.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="text-muted small mb-0">Desarrollado con <i class="fas fa-heart text-danger"></i></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?= isset($additional_js) ? $additional_js : '' ?>
</body>
</html>
