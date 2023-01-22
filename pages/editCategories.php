
<?php
  include_once '../controller/categoriesController.php';
  $post = new CategorieController();
  $categorie = $post->edit();
  if(isset($_POST['updateCategory'])){
    $id = $_GET['categoryEditId'];
    
    // die;:
    $update = $post->updateCa($id, $_POST['title']);
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CultureDev.to</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body style="background-color: #EEE">
<div class="col-md-7 col-12 mx-auto p-3 shadow shadow-sm bg-white mt-3">
  <form action="editCategories.php?categoryEditId=<?php echo $_GET['categoryEditId'] ;?>" method="POST" id="form-blog" enctype="multipart/form-data">
    <div class="modal-header">
      <h5 class="modal-title">Add Category</h5>
      <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
    </div>
    <div class="modal-body">

      <!-- This Input Allows Storing Posts Index  -->
      <input type="hidden" id="blog-id" name="blogId">
      <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" class="form-control" name="title" id="blog-title" value="<?=$categorie['title']?>" required/>
      </div>
      </div>
    <div class="modal-footer">
      <a href="../pages/categories.php" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
      <button type="submit" name="updateCategory" class="btn btn-primary task-action-btn" id="updateCategory">Update</button>
    </div> 
  </form>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>