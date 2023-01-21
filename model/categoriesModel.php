<?php
include_once '../classes/database.php';
class Categorie extends Database {
    // propriétés de la classe
   

    // méthodes CRUD
    public function createCategorieDB($title) {
        $query = $this->connectPDO()->prepare('INSERT INTO categorie (title) VALUES (?)');
        // $query->bindValue(':title', $title, PDO::PARAM_STR);
        $query->execute([$title]);
        return 1;
    }

    public function readCategorieDB(){
        $query = 'SELECT * FROM categorie';
        $stmt = $this->connectPDO()->prepare($query);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }

    public function read_singleDB($id) {
        $query = 'SELECT * FROM articles WHERE id = :id LIMIT 0,1';
        $stmt = $this->connectPDO()->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt;
    }

    // public function createDB($title, $content, $category_id) {
      
    //     $sql = "INSERT INTO articles (title,content,category_id) VALUES (?,?,?)";
    //     $stmt = $this->connectPDO()->prepare($sql);
    //     $stmt->execute([$title,$content,$category_id]);
    //     return 1;
    // }


    public function editDB($id) {
        $query = 'SELECT * FROM articles WHERE id = :id';
        $stmt = $this->connectPDO()->prepare($query);
        $stmt->bindParam(':id', $id);
        // $stmt->bindParam(':admin_id', $admin_id);
        // $stmt->bindParam(':image', $image);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function deleteCategorieDB($id) {
        try{
            $query = 'DELETE FROM categorie WHERE id = :id';
            $stmt = $this->connectPDO()->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return 1 ;
             
        }catch(PDOException $e)
        {
            "Error".$e->getMessage();
        }
        
    }

   
}


