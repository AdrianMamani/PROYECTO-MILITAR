<?php
require_once './models/FinanzasModel.php';
require_once './config/database.php';

class FinanzasController {
    private $modelo;
    private $isAdmin = false;

    public function __construct() {
        $this->modelo = new Finanzas();
    }

    public function setAdminContext($isAdmin) {
        $this->isAdmin = $isAdmin;
    }

    public function index() {
        $registros = $this->modelo->obtenerTodos();
        require_once './views/admin/finanzas.php';
    }

    public function agregar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $datos = [
                    'numero_orden' => $_POST['numero_orden'],
                    'apellidos_nombres' => $_POST['apellidos_nombres'],
                    'ene' => $_POST['ene'] ?? 0,
                    'feb' => $_POST['feb'] ?? 0,
                    'mar' => $_POST['mar'] ?? 0,
                    'abr' => $_POST['abr'] ?? 0,
                    'may' => $_POST['may'] ?? 0,
                    'jun' => $_POST['jun'] ?? 0,
                    'jul' => $_POST['jul'] ?? 0,
                    'ago' => $_POST['ago'] ?? 0,
                    'sep' => $_POST['sep'] ?? 0,
                    'oct' => $_POST['oct'] ?? 0,
                    'nov' => $_POST['nov'] ?? 0,
                    'dic' => $_POST['dic'] ?? 0,
                    'deuda_2025' => $_POST['deuda_2025'] ?? 0,
                    'deuda_2024' => $_POST['deuda_2024'] ?? 0,
                    'deuda_2023' => $_POST['deuda_2023'] ?? 0,
                    'deuda_2022' => $_POST['deuda_2022'] ?? 0,
                    'deuda_2021' => $_POST['deuda_2021'] ?? 0,
                    'otros_deudas' => $_POST['otros_deudas'] ?? 0,
                    'lugar' => $_POST['lugar'] ?? '',
                    'fecha' => $_POST['fecha'] ?? date('Y-m-d')
                ];

                $resultado = $this->modelo->agregar($datos);
                
                if ($resultado) {
                    header('Location: index.php?action=finanzas/index');
                    exit();
                } else {
                    throw new Exception("No se pudo agregar el registro.");
                }
            } catch (Exception $e) {
                echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
                $registros = $this->modelo->obtenerTodos();
                require_once './views/admin/finanzas.php';
            }
        } else {
            $registros = $this->modelo->obtenerTodos();
            require_once './views/admin/finanzas.php';
        }
    }

    public function eliminar($id) {
        try {
            $resultado = $this->modelo->eliminar($id);
            
            if ($resultado) {
                header('Location: index.php?action=finanzas/index');
                exit();
            } else {
                throw new Exception("No se pudo eliminar el registro.");
            }
        } catch (Exception $e) {
            echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
        }
    }

    public function ver() {
        // Obtener el ID del parámetro GET
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        
        if (!$id) {
            echo '<div class="alert alert-danger">ID no proporcionado</div>';
            return;
        }
        
        try {
            $registro = $this->modelo->obtenerPorId($id);
            
            if (!$registro) {
                echo '<div class="alert alert-danger">Registro no encontrado</div>';
                return;
            }
            
            // Generar HTML directamente para el modal de detalles
            ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 200px">ID</th>
                        <td><?= htmlspecialchars($registro['id']) ?></td>
                    </tr>
                    <tr>
                        <th>Número de Orden</th>
                        <td><?= htmlspecialchars($registro['numero_orden']) ?></td>
                    </tr>
                    <tr>
                        <th>Apellidos y Nombres</th>
                        <td><?= htmlspecialchars($registro['apellidos_nombres']) ?></td>
                    </tr>
                    <tr>
                        <th colspan="2" class="bg-light">Pagos Mensuales</th>
                    </tr>
                    <tr>
                        <th>Enero</th>
                        <td><?= htmlspecialchars($registro['ene']) ?></td>
                    </tr>
                    <tr>
                        <th>Febrero</th>
                        <td><?= htmlspecialchars($registro['feb']) ?></td>
                    </tr>
                    <tr>
                        <th>Marzo</th>
                        <td><?= htmlspecialchars($registro['mar']) ?></td>
                    </tr>
                    <tr>
                        <th>Abril</th>
                        <td><?= htmlspecialchars($registro['abr']) ?></td>
                    </tr>
                    <tr>
                        <th>Mayo</th>
                        <td><?= htmlspecialchars($registro['may']) ?></td>
                    </tr>
                    <tr>
                        <th>Junio</th>
                        <td><?= htmlspecialchars($registro['jun']) ?></td>
                    </tr>
                    <tr>
                        <th>Julio</th>
                        <td><?= htmlspecialchars($registro['jul']) ?></td>
                    </tr>
                    <tr>
                        <th>Agosto</th>
                        <td><?= htmlspecialchars($registro['ago']) ?></td>
                    </tr>
                    <tr>
                        <th>Septiembre</th>
                        <td><?= htmlspecialchars($registro['sep']) ?></td>
                    </tr>
                    <tr>
                        <th>Octubre</th>
                        <td><?= htmlspecialchars($registro['oct']) ?></td>
                    </tr>
                    <tr>
                        <th>Noviembre</th>
                        <td><?= htmlspecialchars($registro['nov']) ?></td>
                    </tr>
                    <tr>
                        <th>Diciembre</th>
                        <td><?= htmlspecialchars($registro['dic']) ?></td>
                    </tr>
                    <tr>
                        <th>Total Pagos</th>
                        <td><strong><?= htmlspecialchars($registro['total_pagos']) ?></strong></td>
                    </tr>
                    <tr>
                        <th colspan="2" class="bg-light">Deudas</th>
                    </tr>
                    <tr>
                        <th>Deuda 2025</th>
                        <td><?= htmlspecialchars($registro['deuda_2025']) ?></td>
                    </tr>
                    <tr>
                        <th>Deuda 2024</th>
                        <td><?= htmlspecialchars($registro['deuda_2024']) ?></td>
                    </tr>
                    <tr>
                        <th>Deuda 2023</th>
                        <td><?= htmlspecialchars($registro['deuda_2023']) ?></td>
                    </tr>
                    <tr>
                        <th>Deuda 2022</th>
                        <td><?= htmlspecialchars($registro['deuda_2022']) ?></td>
                    </tr>
                    <tr>
                        <th>Deuda 2021</th>
                        <td><?= htmlspecialchars($registro['deuda_2021']) ?></td>
                    </tr>
                    <tr>
                        <th>Otras Deudas</th>
                        <td><?= htmlspecialchars($registro['otros_deudas']) ?></td>
                    </tr>
                    <tr>
                        <th>Total Deuda</th>
                        <td><strong><?= htmlspecialchars($registro['total_deuda']) ?></strong></td>
                    </tr>
                    <tr>
                        <th>Lugar</th>
                        <td><?= htmlspecialchars($registro['lugar']) ?></td>
                    </tr>
                    <tr>
                        <th>Fecha</th>
                        <td><?= htmlspecialchars($registro['fecha']) ?></td>
                    </tr>
                </table>
            </div>
            <?php
        } catch (Exception $e) {
            echo '<div class="alert alert-danger">Error: ' . $e->getMessage() . '</div>';
        }
    }

    public function editar() {
        // Obtener el ID del parámetro GET
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        
        if (!$id) {
            echo '<div class="alert alert-danger">ID no proporcionado</div>';
            return;
        }
        
        try {
            $registro = $this->modelo->obtenerPorId($id);
            
            if (!$registro) {
                echo '<div class="alert alert-danger">Registro no encontrado</div>';
                return;
            }
            
            // Generar HTML directamente para el formulario de edición
            ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="numero_orden">Número de Orden</label>
                        <input type="number" class="form-control" id="numero_orden" name="numero_orden" value="<?= htmlspecialchars($registro['numero_orden']) ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="apellidos_nombres">Apellidos y Nombres</label>
                        <input type="text" class="form-control" id="apellidos_nombres" name="apellidos_nombres" value="<?= htmlspecialchars($registro['apellidos_nombres']) ?>" required>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <h5>Pagos Mensuales</h5>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="ene">Enero</label>
                        <input type="number" step="0.01" class="form-control" id="ene" name="ene" value="<?= htmlspecialchars($registro['ene']) ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="feb">Febrero</label>
                        <input type="number" step="0.01" class="form-control" id="feb" name="feb" value="<?= htmlspecialchars($registro['feb']) ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="mar">Marzo</label>
                        <input type="number" step="0.01" class="form-control" id="mar" name="mar" value="<?= htmlspecialchars($registro['mar']) ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="abr">Abril</label>
                        <input type="number" step="0.01" class="form-control" id="abr" name="abr" value="<?= htmlspecialchars($registro['abr']) ?>">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="may">Mayo</label>
                        <input type="number" step="0.01" class="form-control" id="may" name="may" value="<?= htmlspecialchars($registro['may']) ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="jun">Junio</label>
                        <input type="number" step="0.01" class="form-control" id="jun" name="jun" value="<?= htmlspecialchars($registro['jun']) ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="jul">Julio</label>
                        <input type="number" step="0.01" class="form-control" id="jul" name="jul" value="<?= htmlspecialchars($registro['jul']) ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="ago">Agosto</label>
                        <input type="number" step="0.01" class="form-control" id="ago" name="ago" value="<?= htmlspecialchars($registro['ago']) ?>">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="sep">Septiembre</label>
                        <input type="number" step="0.01" class="form-control" id="sep" name="sep" value="<?= htmlspecialchars($registro['sep']) ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="oct">Octubre</label>
                        <input type="number" step="0.01" class="form-control" id="oct" name="oct" value="<?= htmlspecialchars($registro['oct']) ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="nov">Noviembre</label>
                        <input type="number" step="0.01" class="form-control" id="nov" name="nov" value="<?= htmlspecialchars($registro['nov']) ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="dic">Diciembre</label>
                        <input type="number" step="0.01" class="form-control" id="dic" name="dic" value="<?= htmlspecialchars($registro['dic']) ?>">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <h5>Deudas</h5>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="deuda_2025">Deuda 2025</label>
                        <input type="number" step="0.01" class="form-control" id="deuda_2025" name="deuda_2025" value="<?= htmlspecialchars($registro['deuda_2025']) ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="deuda_2024">Deuda 2024</label>
                        <input type="number" step="0.01" class="form-control" id="deuda_2024" name="deuda_2024" value="<?= htmlspecialchars($registro['deuda_2024']) ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="deuda_2023">Deuda 2023</label>
                        <input type="number" step="0.01" class="form-control" id="deuda_2023" name="deuda_2023" value="<?= htmlspecialchars($registro['deuda_2023']) ?>">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="deuda_2022">Deuda 2022</label>
                        <input type="number" step="0.01" class="form-control" id="deuda_2022" name="deuda_2022" value="<?= htmlspecialchars($registro['deuda_2022']) ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="deuda_2021">Deuda 2021</label>
                        <input type="number" step="0.01" class="form-control" id="deuda_2021" name="deuda_2021" value="<?= htmlspecialchars($registro['deuda_2021']) ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="otros_deudas">Otras Deudas</label>
                        <input type="number" step="0.01" class="form-control" id="otros_deudas" name="otros_deudas" value="<?= htmlspecialchars($registro['otros_deudas']) ?>">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lugar">Lugar</label>
                        <input type="text" class="form-control" id="lugar" name="lugar" value="<?= htmlspecialchars($registro['lugar']) ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" value="<?= htmlspecialchars($registro['fecha']) ?>">
                    </div>
                </div>
            </div>
            <?php
        } catch (Exception $e) {
            echo '<div class="alert alert-danger">Error: ' . $e->getMessage() . '</div>';
        }
    }

    public function update() {
        // Start output buffering to capture any unexpected output
        ob_start();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $id = $_POST['id'];
                $datos = [
                    'numero_orden' => $_POST['numero_orden'],
                    'apellidos_nombres' => $_POST['apellidos_nombres'],
                    'ene' => $_POST['ene'] ?? 0,
                    'feb' => $_POST['feb'] ?? 0,
                    'mar' => $_POST['mar'] ?? 0,
                    'abr' => $_POST['abr'] ?? 0,
                    'may' => $_POST['may'] ?? 0,
                    'jun' => $_POST['jun'] ?? 0,
                    'jul' => $_POST['jul'] ?? 0,
                    'ago' => $_POST['ago'] ?? 0,
                    'sep' => $_POST['sep'] ?? 0,
                    'oct' => $_POST['oct'] ?? 0,
                    'nov' => $_POST['nov'] ?? 0,
                    'dic' => $_POST['dic'] ?? 0,
                    'deuda_2025' => $_POST['deuda_2025'] ?? 0,
                    'deuda_2024' => $_POST['deuda_2024'] ?? 0,
                    'deuda_2023' => $_POST['deuda_2023'] ?? 0,
                    'deuda_2022' => $_POST['deuda_2022'] ?? 0,
                    'deuda_2021' => $_POST['deuda_2021'] ?? 0,
                    'otros_deudas' => $_POST['otros_deudas'] ?? 0,
                    'lugar' => $_POST['lugar'] ?? '',
                    'fecha' => $_POST['fecha'] ?? date('Y-m-d')
                ];
                
                $result = $this->modelo->actualizar($id, $datos);
                
                // Clear any buffered output
                ob_end_clean();
                
                // Send a clean JSON response
                header('Content-Type: application/json');
                echo json_encode(['success' => $result]);
                exit;
            } catch (Exception $e) {
                // Clear buffer and send error
                ob_end_clean();
                header('Content-Type: application/json');
                echo json_encode(['success' => false, 'message' => $e->getMessage()]);
                exit;
            }
        }
        
        // Clear buffer and send error for non-POST requests
        ob_end_clean();
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'message' => 'Método no permitido']);
        exit;
    }
}
?>