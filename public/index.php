<?php
header('Content-Type: application/json');

// Load file router dan controller
require_once __DIR__ . '/../src/Router.php';
require_once __DIR__ . '/../src/Controllers/UserController.php';

// Inisialisasi objek
$router = new Router();
$userController = new UserController();

// Tambahkan route API
$router->add('GET', '/api/v1/users', [$userController, 'index']);
$router->add('GET', '/api/v1/users/(\d+)', [$userController, 'show']);

// Ambil request URI & method
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Hapus prefix folder jika perlu (agar bisa berjalan di Laragon)
$baseFolder = '/api-php-native-migel/public';
if (strpos($requestUri, $baseFolder) === 0) {
    $requestUri = substr($requestUri, strlen($baseFolder));
}

// Jalankan router
$router->dispatch($requestUri, $requestMethod);