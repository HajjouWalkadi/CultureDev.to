
<?php
  include_once '../controller/postsController.php';
  $post = new ArticleController();
  $post = $post->edit();
?>




<form action="" method="POST" id="form-blog" enctype="multipart/form-data">
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
                          <input type="text" class="form-control" name="title" id="blog-title" value="<?=$post['title']?>" required/>
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
                            <textarea class="form-control" name="content" id="blog-description" placeholder="Content..."><?=$post['content'];?></textarea>
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