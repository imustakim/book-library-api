<?php
namespace App\Middleware;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthMiddleware
{
    public static function authenticate()
    {
        $headers = getallheaders();
        if (!isset($headers['Authorization'])) {
            http_response_code(401);
            echo json_encode(['message' => 'Unauthorized']);
            exit;
        }

        $jwt = str_replace('Bearer ', '', $headers['Authorization']);
        try {
            $decoded = JWT::decode($jwt, new Key('your_secret_key', 'HS256'));
            return $decoded->user_id;
        } catch (\Exception $e) {
            http_response_code(401);
            echo json_encode(['message' => 'Unauthorized']);
            exit;
        }
    }
}
?>
