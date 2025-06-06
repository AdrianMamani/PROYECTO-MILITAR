<?php
// router.php - Implementación completa y corregida

class Router {
    private $routes = [];
    private $notFoundCallback;
    
    public function add($controller, $method, $controllerClass, $methodName) {
        $this->routes[] = [
            'controller' => $controller,
            'method' => $method,
            'controllerClass' => $controllerClass,
            'methodName' => $methodName,
            'middleware' => []
        ];
        return $this;
    }
    
    public function middleware($middleware) {
        $lastRouteIndex = count($this->routes) - 1;
        if ($lastRouteIndex >= 0) {
            $this->routes[$lastRouteIndex]['middleware'][] = $middleware;
        }
        return $this;
    }
    
    public function notFound($controllerClass, $methodName) {
        $this->notFoundCallback = [
            'controllerClass' => $controllerClass,
            'methodName' => $methodName
        ];
        return $this;
    }
    
    // Método para cargar controladores automáticamente
    private function loadController($controllerClass) {
        $controllerFile = "./controllers/{$controllerClass}.php";
        
        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            return true;
        }
        
        return false;
    }
    
    public function dispatch() {
        session_start();
        
        // Obtener la acción del parámetro GET
        $action = isset($_GET['action']) ? $_GET['action'] : 'carrusel/index';
        $partes = explode('/', $action);
        $controller = $partes[0];
        $method = $partes[1] ?? 'index';
        $id = $partes[2] ?? null;
        
        // Verificar autenticación (excepto para auth)
        if (!isset($_SESSION['usuario']) && $controller !== 'auth') {
            header('Location: index.php?action=auth/loginForm');
            exit;
        }
        
        // Buscar la ruta correspondiente
        $routeFound = false;
        foreach ($this->routes as $route) {
            if ($route['controller'] === $controller && $route['method'] === $method) {
                $routeFound = true;
                
                // Ejecutar middleware si existe
                foreach ($route['middleware'] as $middleware) {
                    if (class_exists($middleware)) {
                        $middlewareInstance = new $middleware();
                        if (!$middlewareInstance->handle()) {
                            return;
                        }
                    }
                }
                
                // Cargar e instanciar controlador
                $controllerClass = $route['controllerClass'];
                $methodName = $route['methodName'];
                
                // Cargar el archivo del controlador
                if (!$this->loadController($controllerClass)) {
                    echo "<div class='alert alert-danger'>Error: No se pudo cargar el controlador $controllerClass</div>";
                    return;
                }
                
                // Verificar que la clase existe
                if (!class_exists($controllerClass)) {
                    echo "<div class='alert alert-danger'>Error: La clase $controllerClass no existe</div>";
                    return;
                }
                
                try {
                    // Instanciar el controlador
                    $controllerInstance = new $controllerClass();
                    
                    // Verificar que el método existe
                    if (!method_exists($controllerInstance, $methodName)) {
                        echo "<div class='alert alert-danger'>Error: El método $methodName no existe en $controllerClass</div>";
                        return;
                    }
                    
                    // Llamar al método con o sin ID
                    if ($id) {
                        $controllerInstance->$methodName($id);
                    } else {
                        $controllerInstance->$methodName();
                    }
                } catch (Exception $e) {
                    echo "<div class='alert alert-danger'>Error al ejecutar el controlador: " . $e->getMessage() . "</div>";
                }
                
                return;
            }
        }
        
        // Ruta no encontrada - usar callback por defecto
        if ($this->notFoundCallback) {
            $controllerClass = $this->notFoundCallback['controllerClass'];
            $methodName = $this->notFoundCallback['methodName'];
            
            // Cargar el controlador por defecto
            if ($this->loadController($controllerClass) && class_exists($controllerClass)) {
                $controllerInstance = new $controllerClass();
                if (method_exists($controllerInstance, $methodName)) {
                    $controllerInstance->$methodName();
                } else {
                    echo "404 Not Found - Método no encontrado";
                }
            } else {
                echo "404 Not Found - Controlador por defecto no encontrado";
            }
        } else {
            header("HTTP/1.0 404 Not Found");
            echo "404 Not Found - Ruta no encontrada: $controller/$method";
        }
    }
}
?>