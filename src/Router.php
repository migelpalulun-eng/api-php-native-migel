<?php
class Router {
    private $routes = [];

    // Tambahkan route baru
    public function add($method, $path, $callback) {
        $this->routes[] = compact('method', 'path', 'callback');
    }

    // Jalankan router
    public function dispatch($requestUri, $requestMethod) {
        foreach ($this->routes as $route) {
            if ($route['method'] === $requestMethod && preg_match("#^{$route['path']}$#", $requestUri, $params)) {
                array_shift($params);
                return call_user_func_array($route['callback'], $params);
            }
        }

        // Jika tidak ditemukan
        http_response_code(404);
        echo json_encode([
            "success" => false,
            "message" => "Route not found",
            "uri" => $requestUri,
            "method" => $requestMethod
        ]);
    }
}