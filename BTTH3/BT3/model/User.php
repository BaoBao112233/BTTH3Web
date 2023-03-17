<?php

namespace BT3\Models;

use PDO;

class User
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function all()
    {
        $stmt = $this->db->query('SELECT * FROM users');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name, $email, $pass)
    {
        $stmt = $this->db->prepare('INSERT INTO users (name, email, pass) VALUES (:name, :email, :pass)');
        $stmt->execute([
            'name' => $name,
            'email' => $email,
            'pass' => $pass,
        ]);
    }

    public function update($id, $name, $email, $pass)
    {
        $stmt = $this->db->prepare('UPDATE users SET name = :name, email = :email, pass = :pass WHERE id = :id');
        $stmt->execute([
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'pass' => $pass,
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare('DELETE FROM users WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }
}
