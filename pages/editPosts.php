
<?php
  include_once '../controller/postsController.php';
  $post = new ArticleController();
  $article = $post->edit();
  // die(var_dump($post));
  if(isset($_POST['updateArticle'])){
    $id = $_GET['postEditId'];
    // die;:
    $update = $post->update($id, "title updated", "content updated", 2);
  }
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body style="background-color: #EEE">
<div class="col-md-7 col-12 mx-auto p-3 shadow shadow-sm bg-white mt-3">
  <form action="editPosts.php?postEditId=<?php echo $_GET['postEditId'] ;?>" method="POST" id="form-blog" enctype="multipart/form-data">
    <div class="modal-header">
      <h5 class="modal-title">Add Posts</h5>
      <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
    </div>
    <div class="modal-body">

      <!-- This Input Allows Storing Product Index  -->
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
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
        </select>
      </div>
      
        <div class="mb-3">
          <label class="form-label">Content</label>
          <!-- <input type="text" class="form-control" name="content" id="blog-description" required/> -->
          <textarea class="form-control" name="content" id="blog-description" placeholder="Content..."><?=$article['content'];?></textarea>
        </div>
        
        
        <!-- <div class="mb-3">
          <label class="form-label">Price</label>
          <input type="text" class="form-control" name="productPrice" id="blog-quantity" required/>
        </div> -->
      
      </div>
    <div class="modal-footer">
      <a href="dashboard.php" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
      <button type="submit" name="updateArticle" class="btn btn-primary task-action-btn" id="updateArticle">Update</button>
    </div> 
  </form>
</div>

                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>