<?php 

include_once '../model/categoriesModel.php';

class CategorieController extends Categorie{
    
    public function readCa(){
        
        $result=$this->readCategorieDB();
        return $result;
        
    } 
    
    public function createCa(){
        if(isset($_POST['saveCategorie'])){
            extract($_POST);
            $result=$this->createCategorieDB($title);
            if($result==1){
                header('location:../pages/categories.php');
            }
        }
    }
    public function deleteCa($x){
        $result= $this->deleteCategorieDB($x);
        if($result==1){
            header('location:../pages/categories.php');
        }
    }

public function edit(){
    return $this->editCaDB($_GET['categoryEditId']);     
}

public function updateCa($id, $title) {
    $query = 'UPDATE categorie SET title = :title WHERE id = :id';
    $stmt = $this->connectPDO()->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':title', $title);
    if ($stmt->execute()) {
        header('location:categories.php');
    } 
}
}


?>


