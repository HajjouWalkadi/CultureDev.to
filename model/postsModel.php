<?php
include_once '../classes/database.php';
class Article extends Database{

    public function readDB(){
        $query = 'SELECT articles.* , categorie.title as nameCategorie FROM articles INNER JOIN categorie on categorie.id=articles.category_id ';
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

    public function createDB($title, $content, $category_id) {
      
        $sql = "INSERT INTO articles (title,content,category_id) VALUES (?,?,?)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->execute([$title,$content,$category_id]);
        return 1;
    }

    public function updateDB($id, $title, $content, $category_id) {
        $query = 'UPDATE articles SET title = :title, content = :content, 
                  category_id = :category_id WHERE id = :id';
        $stmt = $this->connectPDO()->prepare($query);
        $stmt->bindParam(':id', $id);
        // $stmt->bindParam(':admin_id', $admin_id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        // $stmt->bindParam(':image', $image);
        $stmt->bindParam(':category_id', $category_id);
        if ($stmt->execute()) {
            return true;
        } 
    }

    public function editDB($id) {
        $query = 'SELECT * FROM articles WHERE id = :id';
        $stmt = $this->connectPDO()->prepare($query);
        $stmt->bindParam(':id', $id);
        // $stmt->bindParam(':admin_id', $admin_id);
        // $stmt->bindParam(':image', $image);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function deleteDB($id) {
        try{
            $query = 'DELETE FROM articles WHERE id = :id';
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
