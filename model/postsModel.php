<?php
include_once '../classes/database.php';
class Article extends Database{

    public function readDB(){
        $query = 'SELECT articles.* , categorie.title as nameCategorie FROM articles INNER JOIN categorie on categorie.id=articles.categorie_id ';
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

    public function createDB($admin,$title, $content, $image, $imageName, $category_id){
        $sql = "INSERT INTO articles (admin_id,title,content,image,categorie_id) VALUES (?,?,?,?,?)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->execute([$admin,$title,$content,$image,$category_id]);
        
        move_uploaded_file($imageName, '../assets/upload/'. $image);
        return 1;
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
};
