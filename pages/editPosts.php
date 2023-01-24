
<?php
  include_once '../controller/postsController.php';
  include_once '../controller/categoriesController.php';
$CategorieController = new CategorieController();
$Allcategories = $CategorieController->readCa();
  $post = new ArticleController();
  $article = $post->edit();
  $categorie = $post->edit();
  if(isset($_POST['updateArticle'])){
    $id = $_GET['postEditId'];
    $update = $post->update($id, $_POST['title'], $_POST['content'], $_POST['category']);
  }
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CultureDev.to</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.tiny.cloud/1/pwpx476ishkvo2br9a50p1v88j46q425bc452jxv7vkd8auv/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

  </head>
  <body style="background-color: #EEE">
<div class="col-md-7 col-12 mx-auto p-3 shadow shadow-sm bg-white mt-3">
  <form action="editPosts.php?postEditId=<?php echo $_GET['postEditId'] ;?>" method="POST" id="form-blog" enctype="multipart/form-data">
    <div class="modal-header">
      <h5 class="modal-title">Edit Post</h5>
      <a href="dashboard.php" class="btn-close"></a>
    </div>
    <div class="modal-body">

      <!-- This Input Allows Storing Post Index  -->
      <input type="hidden" id="blog-id" name="blogId">
      <div class="mb-3">
        <label class="form-label">Image</label>
        <input type="file" class="form-control" name="my_image" id="blog-image"/>
      </div>
      
      <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" class="form-control" name="title" id="blog-title" value="<?=$article['title']?>" required/>
      </div>
      <div class="mb-3">
        <label class="form-label">Category</label>
        <select class="form-select" name= "category" id="blog-category" >
        <option value="" selected disabled>Please select</option>
              <?php foreach($Allcategories AS $categorie){ ?>
                <option value="<?= $categorie['id'] ?>" <?php if($article['categorie_id'] == $categorie['id']){ echo 'selected'; } ?> ><?= $categorie['title'] ?></option>';
              <?php } ?>
        </select>
      </div>
      
        <div class="mb-3">
          <label class="form-label">Content</label>
          <textarea class="form-control" name="content" id="blog-description" placeholder="Content..."><?=$article['content'];?></textarea>
        </div>
      </div>
    <div class="modal-footer">
      <a href="dashboard.php" class="btn btn-white" >Cancel</a>
      <button type="submit" name="updateArticle" class="btn btn-primary task-action-btn" id="updateArticle">Update</button>
    </div> 
  </form>
</div>
  <script src="../assets/js/script.js"></script>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>