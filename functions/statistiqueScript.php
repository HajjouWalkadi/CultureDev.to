<?php

include_once '../classes/database.php';
session_start();

// class getStatistics extends Database {
//     public function getTotalArticles(){
//         $stm = $this->connectPDO()->prepare("SELECT COUNT(title) FROM articles");
//         $stm->execute();
//         return $stm->fetchColumn();
//     }

//     public function getTotalCategories(){
//         $stm = $this->connectPDO()->prepare("SELECT COUNT(id) FROM categories");
//         $stm->execute();
//         return $stm->fetchColumn();
//     }

//     public function getUniqueAuthors(){
//         $stm = $this->connectPDO()->prepare("SELECT COUNT(DISTINCT author) FROM articles");
//         $stm->execute();
//         return $stm->fetchColumn();
//     }
// }
   
// class Statistique extends Database{
//     public function totalPost() {
//         $stmt = $this->connectPDO()->prepare("SELECT count(*) as total FROM articles");
//         $stmt->execute();
//         return $stmt->fetch(PDO::FETCH_ASSOC);
//     }

    // public function totalCategorie() {
    //     $stmt = $this->connectPDO()->prepare("SELECT count(*) as total FROM categorie");
    //     $stmt->execute();
    //     return $stmt->fetch(PDO::FETCH_ASSOC);
    // }
// }

// $db = new Database();
// $totalPost = $db->totalPost();
// $totalCategorie = $db->totalCategorie();
