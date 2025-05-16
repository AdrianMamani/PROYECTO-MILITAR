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
    
    public function dispatch() {
        session_start();
        
        // Depuración con comentarios HTML
        echo "<!-- Depuración del Router -->\n";
        echo "<!-- URI: " . $_SERVER['REQUEST_URI'] . " -->\n";
        echo "<!-- Parámetro action: " . ($_GET['action'] ?? 'no definido') . " -->\n";
        
        // Obtener la acción del parámetro GET
        $action = isset($_GET['action']) ? $_GET['action'] : 'carrusel/index';
        $partes = explode('/', $action);
        $controller = $partes[0];
        $method = $partes[1] ?? 'index';
        $id = $partes[2] ?? null;
        
        echo "<!-- Controller: $controller, Method: $method, ID: $id -->\n";
        
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
                    $middlewareInstance = new $middleware();
                    if (!$middlewareInstance->handle()) {
                        return;
                    }
                }
                
                // Instanciar controlador y llamar al método
                $controllerClass = $route['controllerClass'];
                $methodName = $route['methodName'];
                
                // Depuración
                echo "<!-- Instanciando controlador: $controllerClass -->\n";
                
                try {
                    // Instanciar el controlador
                    $controllerInstance = new $controllerClass();
                    
                    // Llamar al método con o sin ID
                    echo "<!-- Llamando al método: $methodName -->\n";
                    if ($id) {
                        $controllerInstance->$methodName($id);
                    } else {
                        $controllerInstance->$methodName();
                    }
                    echo "<!-- Método ejecutado correctamente -->\n";
                } catch (Exception $e) {
                    echo "<!-- Error al ejecutar el controlador: " . $e->getMessage() . " -->\n";
                    echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
                }
                
                return;
            }
        }
        
        // Si no se encontró la ruta, mostrar un mensaje de depuración
        if (!$routeFound) {
            echo "<!-- Ruta no encontrada: $controller/$method -->\n";
            echo "<!-- Rutas disponibles: -->\n";
            foreach ($this->routes as $route) {
                echo "<!-- " . $route['controller'] . "/" . $route['method'] . " -> " . $route['controllerClass'] . "::" . $route['methodName'] . " -->\n";
            }
        }
        
        // Ruta no encontrada
        if ($this->notFoundCallback) {
            $controllerClass = $this->notFoundCallback['controllerClass'];
            $methodName = $this->notFoundCallback['methodName'];
            
            // Instanciar el controlador
            $controllerInstance = new $controllerClass();
            $controllerInstance->$methodName();
        } else {
            header("HTTP/1.0 404 Not Found");
            echo "404 Not Found - Ruta no encontrada: $controller/$method";
        }
    }
}