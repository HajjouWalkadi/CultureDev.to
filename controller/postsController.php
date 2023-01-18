<?php 

include_once '../model/postsModel.php';

class ArticleController extends Article{
    
    public function read(){
        
        $result=$this->readDB();
        return $result;
        
    } 
    
    public function create(){
        if(isset($_POST['saveArticle'])){
            extract($_POST);
            $result=$this->createDB($title,$content,$category);
            echo 'hiiii';
            if($result==1){
                header('location:../pages/dashboard.php');
            }
        }
    }
    public function delete($x){
        $result= $this->deleteDB($x);
            if($result==1){
                header('location:../pages/dashboard.php');
            }
    }
    
}


?>


