<?php
class Finanzas {
    private $db;
    private $nombreTabla = 'seccion_finanzas';

    public function __construct() {
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

    // Nuevos métodos para la vista pública
    public function obtenerTodosPaginado($limit = 20, $offset = 0) {
        try {
            $query = "SELECT * FROM " . $this->nombreTabla . " 
                     ORDER BY numero_orden ASC 
                     LIMIT :limit OFFSET :offset";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error al obtener registros paginados: " . $e->getMessage());
        }
    }

    public function contarTotalRegistros() {
        try {
            $query = "SELECT COUNT(*) as total FROM " . $this->nombreTabla;
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total'];
        } catch (PDOException $e) {
            throw new Exception("Error al contar registros: " . $e->getMessage());
        }
    }

    public function buscarRegistros($termino, $limit = 10, $offset = 0) {
        try {
            $query = "SELECT * FROM " . $this->nombreTabla . " 
                     WHERE apellidos_nombres LIKE :termino OR numero_orden LIKE :termino
                     ORDER BY numero_orden ASC 
                     LIMIT :limit OFFSET :offset";
            $stmt = $this->db->prepare($query);
            $termino_busqueda = '%' . $termino . '%';
            $stmt->bindParam(':termino', $termino_busqueda);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error al buscar registros: " . $e->getMessage());
        }
    }

    public function contarRegistrosBusqueda($termino) {
        try {
            $query = "SELECT COUNT(*) as total FROM " . $this->nombreTabla . " 
                     WHERE apellidos_nombres LIKE :termino OR numero_orden LIKE :termino";
            $stmt = $this->db->prepare($query);
            $termino_busqueda = '%' . $termino . '%';
            $stmt->bindParam(':termino', $termino_busqueda);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total'];
        } catch (PDOException $e) {
            throw new Exception("Error al contar búsqueda: " . $e->getMessage());
        }
    }

    public function obtenerEstadisticas() {
        try {
            $query = "SELECT 
                        COUNT(*) as total_registros,
                        SUM(total_pagos) as total_pagos_general,
                        SUM(total_deuda) as total_deuda_general,
                        AVG(total_pagos) as promedio_pagos,
                        AVG(total_deuda) as promedio_deuda,
                        MAX(total_pagos) as max_pagos,
                        MIN(total_pagos) as min_pagos
                      FROM " . $this->nombreTabla;
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error al obtener estadísticas: " . $e->getMessage());
        }
    }
}
?>
