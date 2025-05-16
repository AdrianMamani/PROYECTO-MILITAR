<?php
class Finanzas {
    private $db;
    private $nombreTabla = 'seccion_finanzas';

    public function __construct() {
        // Obtiene la conexión a la base de datos desde la clase Database
        $this->db = Database::connect();
    }

    public function obtenerTodos() {
        $query = "SELECT * FROM " . $this->nombreTabla . " ORDER BY numero_orden ASC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $registros = [];
        if ($stmt->rowCount() > 0) {
            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $registros[] = $fila;
            }
        }
        return $registros;
    }

    public function obtenerPorId($id) {
        $query = "SELECT * FROM " . $this->nombreTabla . " WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() == 1) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }

    public function agregar($datos) {
        // Calcular totales
        $total_pagos = $datos['ene'] + $datos['feb'] + $datos['mar'] + $datos['abr'] + 
                       $datos['may'] + $datos['jun'] + $datos['jul'] + $datos['ago'] + 
                       $datos['sep'] + $datos['oct'] + $datos['nov'] + $datos['dic'];
                       
        $total_deuda = $datos['deuda_2025'] + $datos['deuda_2024'] + $datos['deuda_2023'] + 
                       $datos['deuda_2022'] + $datos['deuda_2021'] + $datos['otros_deudas'];

        $query = "INSERT INTO " . $this->nombreTabla . " (
            numero_orden, apellidos_nombres, 
            ene, feb, mar, abr, may, jun, jul, ago, sep, oct, nov, dic, 
            total_pagos, deuda_2025, deuda_2024, deuda_2023, deuda_2022, deuda_2021, 
            otros_deudas, total_deuda, lugar, fecha
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $datos['numero_orden'], PDO::PARAM_INT);
        $stmt->bindParam(2, $datos['apellidos_nombres'], PDO::PARAM_STR);
        $stmt->bindParam(3, $datos['ene'], PDO::PARAM_STR);
        $stmt->bindParam(4, $datos['feb'], PDO::PARAM_STR);
        $stmt->bindParam(5, $datos['mar'], PDO::PARAM_STR);
        $stmt->bindParam(6, $datos['abr'], PDO::PARAM_STR);
        $stmt->bindParam(7, $datos['may'], PDO::PARAM_STR);
        $stmt->bindParam(8, $datos['jun'], PDO::PARAM_STR);
        $stmt->bindParam(9, $datos['jul'], PDO::PARAM_STR);
        $stmt->bindParam(10, $datos['ago'], PDO::PARAM_STR);
        $stmt->bindParam(11, $datos['sep'], PDO::PARAM_STR);
        $stmt->bindParam(12, $datos['oct'], PDO::PARAM_STR);
        $stmt->bindParam(13, $datos['nov'], PDO::PARAM_STR);
        $stmt->bindParam(14, $datos['dic'], PDO::PARAM_STR);
        $stmt->bindParam(15, $total_pagos, PDO::PARAM_STR);
        $stmt->bindParam(16, $datos['deuda_2025'], PDO::PARAM_STR);
        $stmt->bindParam(17, $datos['deuda_2024'], PDO::PARAM_STR);
        $stmt->bindParam(18, $datos['deuda_2023'], PDO::PARAM_STR);
        $stmt->bindParam(19, $datos['deuda_2022'], PDO::PARAM_STR);
        $stmt->bindParam(20, $datos['deuda_2021'], PDO::PARAM_STR);
        $stmt->bindParam(21, $datos['otros_deudas'], PDO::PARAM_STR);
        $stmt->bindParam(22, $total_deuda, PDO::PARAM_STR);
        $stmt->bindParam(23, $datos['lugar'], PDO::PARAM_STR);
        $stmt->bindParam(24, $datos['fecha'], PDO::PARAM_STR);
        
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public function actualizar($id, $datos) {
        // Calcular totales
        $total_pagos = $datos['ene'] + $datos['feb'] + $datos['mar'] + $datos['abr'] + 
                       $datos['may'] + $datos['jun'] + $datos['jul'] + $datos['ago'] + 
                       $datos['sep'] + $datos['oct'] + $datos['nov'] + $datos['dic'];
                       
        $total_deuda = $datos['deuda_2025'] + $datos['deuda_2024'] + $datos['deuda_2023'] + 
                       $datos['deuda_2022'] + $datos['deuda_2021'] + $datos['otros_deudas'];

        $query = "UPDATE " . $this->nombreTabla . " SET 
            numero_orden = ?, 
            apellidos_nombres = ?,
            ene = ?, feb = ?, mar = ?, abr = ?, may = ?, jun = ?, 
            jul = ?, ago = ?, sep = ?, oct = ?, nov = ?, dic = ?,
            total_pagos = ?, 
            deuda_2025 = ?, deuda_2024 = ?, deuda_2023 = ?, 
            deuda_2022 = ?, deuda_2021 = ?, otros_deudas = ?,
            total_deuda = ?, 
            lugar = ?, 
            fecha = ?
            WHERE id = ?";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $datos['numero_orden'], PDO::PARAM_INT);
        $stmt->bindParam(2, $datos['apellidos_nombres'], PDO::PARAM_STR);
        $stmt->bindParam(3, $datos['ene'], PDO::PARAM_STR);
        $stmt->bindParam(4, $datos['feb'], PDO::PARAM_STR);
        $stmt->bindParam(5, $datos['mar'], PDO::PARAM_STR);
        $stmt->bindParam(6, $datos['abr'], PDO::PARAM_STR);
        $stmt->bindParam(7, $datos['may'], PDO::PARAM_STR);
        $stmt->bindParam(8, $datos['jun'], PDO::PARAM_STR);
        $stmt->bindParam(9, $datos['jul'], PDO::PARAM_STR);
        $stmt->bindParam(10, $datos['ago'], PDO::PARAM_STR);
        $stmt->bindParam(11, $datos['sep'], PDO::PARAM_STR);
        $stmt->bindParam(12, $datos['oct'], PDO::PARAM_STR);
        $stmt->bindParam(13, $datos['nov'], PDO::PARAM_STR);
        $stmt->bindParam(14, $datos['dic'], PDO::PARAM_STR);
        $stmt->bindParam(15, $total_pagos, PDO::PARAM_STR);
        $stmt->bindParam(16, $datos['deuda_2025'], PDO::PARAM_STR);
        $stmt->bindParam(17, $datos['deuda_2024'], PDO::PARAM_STR);
        $stmt->bindParam(18, $datos['deuda_2023'], PDO::PARAM_STR);
        $stmt->bindParam(19, $datos['deuda_2022'], PDO::PARAM_STR);
        $stmt->bindParam(20, $datos['deuda_2021'], PDO::PARAM_STR);
        $stmt->bindParam(21, $datos['otros_deudas'], PDO::PARAM_STR);
        $stmt->bindParam(22, $total_deuda, PDO::PARAM_STR);
        $stmt->bindParam(23, $datos['lugar'], PDO::PARAM_STR);
        $stmt->bindParam(24, $datos['fecha'], PDO::PARAM_STR);
        $stmt->bindParam(25, $id, PDO::PARAM_INT);
        
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public function eliminar($id) {
        $query = "DELETE FROM " . $this->nombreTabla . " WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}
?>