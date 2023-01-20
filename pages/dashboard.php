<?php 
include_once '../controller/postsController.php';
include_once '../functions/script.php';
$ArticleController = new ArticleController();
$ArticleController->create();
$Allarticles = $ArticleController->read();
// $Allarticles = $ArticleController->update();
echo isset($_SESSION['uuuuuuuuuuuuuuuuuuuuuu']);
// if(!isset($_SESSION['uuuuuuuuuuuuuuuuuuuuuu'])){
//   // echo "ggggggggggg";
//   header('Location: ../authentication/signup.php');
// }

if(isset($_GET['ide'])){
$ArticleController->delete($_GET['ide']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tiny.cloud/1/pwpx476ishkvo2br9a50p1v88j46q425bc452jxv7vkd8auv/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <title>Dashboard</title>

  </head>
<body style="height: 100vh;">
  <!-- ***************************************::NAVBAR::***************************************************** -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      

        <a class="navbar-brand"  href="#" class="origingamer">CultureDev.to™</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

      <div class="collapse navbar-collapse col-2 " id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="#">Blogs</a>
          </li> 
          <li class="nav-item">
            <!-- <a class="nav-link text-primary bolder" href="#"><?php
            if(isset($_SESSION['username'] )){
              echo $_SESSION['username'] ;
            }
            ?></a> -->
          </li>
          
        </ul>
      </div>
    </div>
  </nav>
  <!-- ********::Sidebar::******************************************************* -->
   <div class="container-fluid ">
      <div class="row flex-nowrap">
          <div class="col-auto col-md-3 col-xl-2 px-sm-2  px-0 bg-dark">
              <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white ">
                  <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                      <span class="fs-5 d-none d-sm-inline"></span>
                  </a>
                  <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                  <li class="nav-item">
                          <a href="#" class="nav-link align-middle px-0">
                              <i class="fas fa-house"></i> <span class="origingamer ms-1 d-none d-md-inline text-white">Menu</span>
                          </a>
                      </li>
                      <li>
                          <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                              <i class="fas fa-dashboard"></i> <span class="ms-1 d-none d-md-inline text-white">Dashboard</span> </a>
                        
                      </li>                  
                      
                      <li>
                          <a href="logout.php" class="nav-link px-0 align-middle">
                          <i class="fas fa-lock"></i><span class="ms-1 d-none d-md-inline text-white">Logout</span></a>
                      </li>
                    
                  </ul>
                
                
                </div>
            </div>
          <!---------------------------------END SIDBAR------------- -->
          <!-- Button Add product -->
   
      <div class="col">
            <div class="d-flex justify-content-lg-end ps-2 mt-3">
              <button type="button" class="btn btn-dark fw-bold p-2" data-bs-toggle="modal" data-bs-target="#modal-blog">
                Add Posts
              </button>
            </div>

            
            
            <!-- statistiques -->
            <div class="container-fluid mt-5">
              <div class="row gap-3 p-4" >
              <!-- Total Product -->
              <div class="card col-10 col-md-5 col-lg-3 shadow pt-3 mb-4">
                <div class="card-body">
                  <div class="bg-gradient bg-secondary p-3 rounded-3 shadow position-absolute" style="top: -30px;">
                      <i class="fa-solid fa-square text-white fa-lg"></i>
                  </div>
                  <h5 class="card-title">Total Posts</h5>
                  <p class="card-text justify-content"></p>
                </div>
              </div>
              <!--Toatal for each category  -->
              <div class="card col-10 col-md-5 col-lg-3 shadow pt-3  mb-4">
              <div class="card-body">
              <div class="bg-gradient bg-secondary p-3 rounded-3 shadow position-absolute" style="top: -30px;">
                      <i class="fa-solid fa-cubes text-white fa-lg"></i>
                  </div>
                <h5 class="card-title">Total for each category</h5>
                
                <!-- //   while( $product=mysqli_fetch_assoc($result)){
                    
                  <span>laptops : <span></span></span><br>      
                  <span>keyboards : <span></span></span><br>  
                  <span>mouses : <span></span><br>
                  <span>games : <span></span> <br>      
                  <span>headphones : <span></span></span><br>        -->
                </div>          
              </div>
              <!-- Products out of stock -->
              <div class="card col-10 col-md-5 col-lg-3 shadow pt-3  mb-4">
                <div class="card-body">
                <div class="bg-gradient bg-secondary p-3 rounded-3 shadow position-absolute" style="top: -30px;">
                      <i class="fa-solid fa-person text-white fa-lg"></i>
                  </div>
                  <h5 class="card-title">Total posts for each Developper</h5>
                 
                  </div>          
              </div>
            </div>
            
      
              <!-- Tableau des elements -->
              
              <div class="overflow-scroll tab1 w-100" style="height:27rem;">
              <table class="table-striped  table table-hover">
                <thead>
                        <tr>
                          <!-- <th scope="col"></th>  -->
                          <!-- <th scope="col">Image</th> -->
                          <th scope="col">Id</th>
                          <th scope="col">Title</th>
                          <th scope="col">Category</th>
                          <th scope="col">Description</th>
                          <th scope="col">Edit</th>
                          <th scope="col">Delete</th>
                        </tr>
                </thead>
                <tbody>
                <?php 
                   if(empty($Allarticles))
                       echo '<tr class="align-middle"><th class="col-3">No result found.</th> </tr>';
                   else{foreach($Allarticles as $article){?>
                      
                    <tr>
                        <!-- <td><img src="../assets/upload/" style="width: 90px;"></td> -->
                      <th scope="row"><?=$article['id']; ?></th>
                      <td><?=$article['title']; ?></td>
                      <td><?=$article['nameCategorie']; ?></td>
                      <td><?=$article['content']; ?></td>
                      <td><a name="editArticle" href="editPosts.php?postEditId=<?=$article['id'];?>"><span onclick="editProduct()" class="btn btn-success text-black"><i class="fas fa-edit text-white"></i></span></a></td>
                     
                            
                      <td>
                      <!-- <a href="dashboard.php?ide=<?=$article['id']; ?>"><span class="btn btn-sm btn-danger">Delete</span></a> -->
                      <a href="dashboard.php?ide=<?=$article['id']; ?>"><span class="btn btn-sm btn-danger"><i class="fas fa-trash text-white"></i></span></a>
                            
                        <!-- <a href="#" onclick="if(confirm('Are you sure want to delete this record !')){ document.querySelector('#delete-product-').submit();}"><span class="btn btn-danger text-black"><i class="fas fa-trash text-white"></i></span></a>
                              <form action="" method="post" id="delete-product-">
                                <input type="hidden" name="delete" value="">
                              </form> -->
                            </td>
                          </tr>
                          <?php }
                   }?>
                        
                  </tbody>
              </table>   
            </div>

            <!-- Game Product MODAL -->

              <div class="modal fade" id="modal-blog">
                <div class="modal-dialog">
                  <div class="modal-content">
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
                          <input type="text" class="form-control" name="title" id="blog-title" required/>
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
                            <textarea class="form-control" name="content" id="blog-description" placeholder="Content..."><?php if(isset($row)) { echo $row['content']; } ?></textarea>
                          </div>
                          
                          
                          <!-- <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="text" class="form-control" name="productPrice" id="blog-quantity" required/>
                          </div> -->
                        
                        </div>
                      <div class="modal-footer">
                        <a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
                        <button type="submit" name="saveArticle" class="btn btn-primary task-action-btn" id="saveArticle">Save</button>
                      </div> 
                    </form>
                  </div>
                </div>
              </div>
              </div>    
  </div>

  <script src="../assets/js/script.js"></script>
</body>
</html>