<?php
require_once './models/FinanzasModel.php';

class FinanzasPublicController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Finanzas();
    }

    // Página principal de finanzas públicas
    public function index() {
        try {
            $page = $_GET['page'] ?? 1;
            $limit = 20; // Registros por página
            $offset = ($page - 1) * $limit;
            $search = $_GET['search'] ?? '';
            
            if (!empty($search)) {
                $registros = $this->modelo->buscarRegistros($search, $limit, $offset);
                $total_registros = $this->modelo->contarRegistrosBusqueda($search);
            } else {
                $registros = $this->modelo->obtenerTodosPaginado($limit, $offset);
                $total_registros = $this->modelo->contarTotalRegistros();
            }
            
            $total_pages = ceil($total_registros / $limit);
            
            // Calcular estadísticas generales
            $estadisticas = $this->modelo->obtenerEstadisticas();
            
            require_once './views/finanzas-index.php';
        } catch (Exception $e) {
            echo "Error al cargar los registros financieros: " . $e->getMessage();
        }
    }

    // Vista de detalle de un registro específico
    public function detalle() {
        try {
            $id = $_GET['id'] ?? 0;
            
            if (!$id) {
                header('Location: index.php?action=finanzas-public/index');
                exit;
            }
            
            $registro = $this->modelo->obtenerPorId($id);
            
            if (!$registro) {
                header('Location: index.php?action=finanzas-public/index');
                exit;
            }
            
            require_once './views/finanzas-detalle.php';
        } catch (Exception $e) {
            echo "Error al cargar el registro: " . $e->getMessage();
        }
    }

    // API para búsqueda de registros
    public function buscar() {
        header('Content-Type: application/json');
        
        try {
            $termino = $_GET['q'] ?? '';
            
            if (strlen($termino) < 2) {
                echo json_encode(['success' => false, 'message' => 'Término de búsqueda muy corto']);
                return;
            }
            
            $registros = $this->modelo->buscarRegistros($termino, 10, 0);
            
            echo json_encode(['success' => true, 'registros' => $registros]);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    // Exportar datos a CSV
    public function exportar() {
        try {
            $registros = $this->modelo->obtenerTodos();
            
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="registro_aportaciones_' . date('Y-m-d') . '.csv"');
            
            $output = fopen('php://output', 'w');
            
            // Encabezados
            fputcsv($output, [
                'N/O', 'Apellidos y Nombres', 'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
                'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic', 'Total Pagos',
                'Deuda 2025', 'Deuda 2024', 'Deuda 2023', 'Deuda 2022', 'Deuda 2021',
                'Otras Deudas', 'Total Deuda', 'Lugar', 'Fecha'
            ]);
            
            // Datos
            foreach ($registros as $registro) {
                fputcsv($output, [
                    $registro['numero_orden'], $registro['apellidos_nombres'],
                    $registro['ene'], $registro['feb'], $registro['mar'], $registro['abr'],
                    $registro['may'], $registro['jun'], $registro['jul'], $registro['ago'],
                    $registro['sep'], $registro['oct'], $registro['nov'], $registro['dic'],
                    $registro['total_pagos'], $registro['deuda_2025'], $registro['deuda_2024'],
                    $registro['deuda_2023'], $registro['deuda_2022'], $registro['deuda_2021'],
                    $registro['otros_deudas'], $registro['total_deuda'],
                    $registro['lugar'], $registro['fecha']
                ]);
            }
            
            fclose($output);
        } catch (Exception $e) {
            echo "Error al exportar: " . $e->getMessage();
        }
    }
}
?>
