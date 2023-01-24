<?php 

include_once '../model/postsModel.php';


class ArticleController extends Article{
    function uploadimage(){
        $img_name = $_FILES['my_image']['name'];
        $img_size = $_FILES['my_image']['size'];
        $tmp_name = $_FILES['my_image']['tmp_name'];
        $error    = $_FILES['my_image']['error'];

        if ($error === 0){   
            if ($img_size > 1000000) 
            {
                $_SESSION['Error'] = "Sorry, your file is too large.";
                 header('location: ../pages/dashboard.php');
            }
            else
            {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);// return extension of image
                $img_ex_lc = strtolower($img_ex);
                
                $allowed_exs = array("jpg", "jpeg", "png","webp"); 

                    if (in_array($img_ex_lc, $allowed_exs)) 
                    {
                        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                        $img_upload_path = '../assets/upload/'.$new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);
                    }
                    else {
                        $_SESSION['Error'] = "You can't upload files of this type";
                          /* */  header('location:../pages/dashboard.php');
                    }
            }
        }
        else{
            $_SESSION['Error'] = 'unknown error occurred!';
            header('location: ../pages/dashboard.php');   
        }
        return $new_img_name ;
    }
    
    public function read(){
        
        $result=$this->readDB();
        return $result;
        
    } 
    
    public function create(){
        if(isset($_POST['saveArticle'])){
            for($i = 0;$i < count($_POST['title']);$i++){
            // extract($_POST);
            // if(!empty($_FILES["my_image"])) {
            //     $image=$this->uploadimage();
            
            $result=$this->createDB($_SESSION['id'],$_POST['title'][$i],$_POST['content'][$i], $_FILES['my_image']['name'][$i], $_FILES['my_image']['tmp_name'][$i],$_POST['category'][$i]);
            if($result==1){
                header('location:../pages/dashboard.php');
            // }
            }
           }
            // else{
            //     $result=$this->createDB($title,$content,$category);
            // if($result==1){
            //     header('location:../pages/dashboard.php');
            // }
            // }
           
        }
    }
    public function delete($x){
        $result= $this->deleteDB($x);
            if($result==1){
                header('location:../pages/dashboard.php');
            }
    }

public function edit(){
    return $this->editDB($_GET['postEditId']);     
}

public function update($id, $title, $content, $category_id) {
    $query = 'UPDATE articles SET title = :title, content = :content,
              categorie_id = :category_id  WHERE id = :id';
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


