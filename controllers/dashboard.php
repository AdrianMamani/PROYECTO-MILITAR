<?php
require_once './models/EmprendimientoModel.php';
require_once './models/EspecialidadModel.php';
require_once './models/logro_destacados.php';
require_once './models/ComentariosModel.php';
require_once './models/Usuario.php';
require_once './models/Evento.php';
require_once './models/galeria.php';
require_once './config/database.php';

class DashboardController {
    public function index() {

        $emprendimientoModel = new Emprendimiento();
        $especialidadModel = new Especialidad();
        $eventoModel = new Evento();
        $usuarioModel = new Usuario();
        $logroDestacadoModel = new Logros_descatado();
        $comentarioModel = new ComentariosModel();
        $galeriaModel = new Galeria();


        $totalEmprendimientos = $emprendimientoModel->contarEmprendimientos();
        $totalEspecialidades = $especialidadModel->contarEspecialidades();
        $totalEventos = $eventoModel->contarEventos();
        $totalUsuarios = $usuarioModel->contarMiembros();
        $totalUsuariosFallecidos = $usuarioModel->contarMiembrosF();
        $totalLogrosDestacados = $logroDestacadoModel->contarLogros();
        $totalComentarios = $comentarioModel->contarComentarios();
        $imagenesGaleria = $galeriaModel->obtenerTodos();


        // Puedes agregar más contadores de otros modelos si quieres

        require_once './views/admin/dashboard.php';
    }
}