<?php
class Categorie {
    // propriétés de la classe
    public $id;
    public $title;
    private $pdo;

    // constructeur pour se connecter à la base de données
    public function __construct() {
        try {
            $this->pdo = new PDO('mysql:host=127.0.0.1;dbname=culturedevto', 'username', 'password');
        } catch (PDOException $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    // méthodes CRUD
    public function create($title) {
        $query = $this->pdo->prepare('INSERT INTO categorie (title) VALUES (:title)');
        $query->bindValue(':title', $title, PDO::PARAM_STR);
        $query->execute();
    }

    public function read() {
        $query = $this->pdo->query('SELECT * FROM categorie');
        return $query->fetchAll();
    }

    public function update($id, $title) {
        $query = $this->pdo->prepare('UPDATE categorie SET title = :title WHERE id = :id');
        $query->bindValue(':title', $title, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
    }

    public function delete($id) {
        $query = $this->pdo->prepare('DELETE FROM categorie WHERE id = :id');
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
    }
}


