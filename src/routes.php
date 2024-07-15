<?php
use App\Controllers\BookController;
use App\Controllers\UserController;
use App\Middleware\AuthMiddleware;

$config = require 'config/database.php';
$pdo = new PDO("mysql:host={$config['host']};dbname={$config['dbname']}", $config['user'], $config['password']);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$bookController = new BookController($pdo);
$userController = new UserController($pdo);

$method = $_SERVER['REQUEST_METHOD'];
$uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

if ($uri[0] === 'register' && $method === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $userController->register($data);
} elseif ($uri[0] === 'login' && $method === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $userController->login($data);
} elseif ($uri[0] === 'books') {
    $userId = AuthMiddleware::authenticate();

    if ($method === 'GET' && count($uri) === 1) {
        $bookController->index();
    } elseif ($method === 'GET' && count($uri) === 2) {
        $bookController->show($uri[1]);
    } elseif ($method === 'POST' && count($uri) === 1) {
        $data = json_decode(file_get_contents('php://input'), true);
        $bookController->store($data);
    } elseif ($method === 'PUT' && count($uri) === 2) {
        $data = json_decode(file_get_contents('php://input'), true);
        $bookController->update($uri[1], $data);
    } elseif ($method === 'DELETE' && count($uri) === 2) {
        $bookController->destroy($uri[1]);
    } else {
        http_response_code(405);
        echo json_encode(['message' => 'Method Not Allowed']);
    }
} else {
    http_response_code(404);
    echo json_encode(['message' => 'Not Found']);
}
?>
