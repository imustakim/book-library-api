<?php
namespace App\Controllers;

use App\Models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use PDO;

class UserController
{
    private $user;

    public function __construct($db)
    {
        $this->user = new User($db);
    }

    public function register($data)
    {
        echo json_encode($this->user->create($data));
    }

    public function login($data)
    {
        $user = $this->user->findByUsername($data['username']);
        if ($user && password_verify($data['password'], $user['password'])) {
            $payload = [
                'iss' => "http://localhost",
                'aud' => "http://localhost",
                'iat' => time(),
                'exp' => time() + (60 * 60),
                'user_id' => $user['id']
            ];

            $jwt = JWT::encode($payload, 'your_secret_key', 'HS256');
            echo json_encode(['token' => $jwt]);
        } else {
            http_response_code(401);
            echo json_encode(['message' => 'Invalid credentials']);
        }
    }
}
?>
