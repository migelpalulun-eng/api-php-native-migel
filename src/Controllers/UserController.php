<?php
class UserController {
    private $users = [
        ["id" => 1, "name" => "Admin"],
        ["id" => 2, "name" => "Migel"]
    ];

    // Endpoint: GET /api/v1/users
    public function index() {
        echo json_encode([
            "success" => true,
            "data" => $this->users
        ]);
    }

    // Endpoint: GET /api/v1/users/{id}
    public function show($id) {
        foreach ($this->users as $user) {
            if ($user['id'] == $id) {
                echo json_encode([
                    "success" => true,
                    "data" => $user
                ]);
                return;
            }
        }

        echo json_encode([
            "success" => false,
            "message" => "User not found"
        ]);
    }
}