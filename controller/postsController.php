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

//     public function update(){
//         if(isset($_POST['saveArticle'])){
//             extract($_POST);
//         $result=$this->updateDB($title, $content, $category_id);   
//         if($result==1){
//             header('location:../pages/dashboard.php');
//         }
//     }
    
// }
public function edit(){
        return $this->editDB($_GET['postEditId']);     
}
}


?>


