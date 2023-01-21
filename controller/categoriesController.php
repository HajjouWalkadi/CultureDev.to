<?php 

include_once '../model/categoriesModel.php';

class CategorieController extends Categorie{
    
    public function read(){
        
        $result=$this->readCategorieDB();
        return $result;
        
    } 
    
    public function create(){
        if(isset($_POST['saveCategorie'])){
            extract($_POST);
            $result=$this->createCategorieDB($title);
            if($result==1){
                header('location:../pages/categories.php');
            }
        }
    }
    public function delete($x){
        $result= $this->deleteCategorieDB($x);
        if($result==1){
            header('location:../pages/categories.php');
        }
    }

public function edit(){
    return $this->editDB($_GET['postEditId']);     
}

public function update($id, $title, $content, $category_id) {
    $query = 'UPDATE articles SET title = :title, content = :content,
              category_id = :category_id  WHERE id = :id';
    $stmt = $this->connectPDO()->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    // $stmt->bindParam(':image', $image);
    $stmt->bindParam(':category_id', $category_id);
    if ($stmt->execute()) {
        header('location:dashboard.php');
    } 
}
}


?>


