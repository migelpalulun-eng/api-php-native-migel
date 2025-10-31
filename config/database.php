<?php
namespace Config;

use PDO;
use PDOException;

class Database
{
    private $host = 'localhost';
    private $db_name = 'db_api_native';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function connect()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name};charset=utf8",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo json_encode([
                'error' => 'Koneksi database gagal: ' . $e->getMessage()
            ]);
            exit;
        }

        return $this->conn;
    }
}
?>