<?php

declare(strict_types=1);

namespace App;

use App\Exception\StorageException;
use App\Exception\ConfigurationException;
use PDO;
use PDOException;
use Throwable;

class Database
{
    private PDO $conn;
    public function __construct(array $config)
    {
        try {
            $this->validateConfig($config);
            $this->createConnection($config);
        } catch (PDOException $e) {
            throw new StorageException('Connection error');
        }
    }

    public function createNote(array $data): void
    {
        try {
            $title = $this->conn->quote($data['title']);
            $description = $this->conn->quote($data['description']);
            $created = date('Y-m-d H:i:s');
            $query = "INSERT INTO notes(title,description,created) VALUES($title,$description, '$created')";
            $result = $this->conn->exec($query);
        } catch (Throwable $e) {
            throw new StorageException('Nie udało się utworzyć notatki', 400, $e);
        }
    }

    public function getNotes(): array
    {
        try {
            $notes = [];
            $query = "SELECT id,title,created FROM notes";
            $result = $this->conn->query($query, PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                $notes[] = $row;
            }
            dump($notes);
            return $notes;
        } catch (Throwable $e) {
            throw new StorageException('NIe udało się pobrać danych o notatkach', 400, $e);
        }
    }

    private function validateConfig(array $config): void
    {
        if (empty($config['database']) || empty($config['user']) || empty($config['host'])) {
            throw new ConfigurationException('Problem z konfiguracją bazy danych - skontaktuj się z administratorem.');
        }
    }


    private function createConnection(array $config): void
    {
        $dsn = "mysql:dbname={$config['database']};host={$config['host']}";
        $this->conn = new PDO(
            $dsn,
            $config['user'],
            $config['password'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );
    }
}
