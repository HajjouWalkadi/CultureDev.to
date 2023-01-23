<?php 
include_once '../controller/categoriesController.php';
include_once '../functions/script.php';
$CategorieController = new CategorieController();
$CategorieController->createCa();
$Allcategories = $CategorieController->readCa();

if(isset($_GET['idc'])){
    $CategorieController->deleteCa($_GET['idc']);
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
     
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
     <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
     <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <title>Categories</title>

  </head>
<body style="height: 100vh;">
  <!-- ***************************************::NAVBAR::*****************************************************  -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      

        <a class="navbar-brand"  href="#" class="origingamer">CultureDev.to™</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

      <div class="collapse navbar-collapse col-2 " id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../pages/dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="#">Blogs</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link text-primary bolder" href="#"><?php
            if(isset($_SESSION['user_name'] )){
              echo $_SESSION['user_name'] ;
            }
            ?></a>
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
                          <a href="../pages/dashboard.php"  class="nav-link px-0 align-middle">
                              <i class="fas fa-dashboard"></i> <span class="ms-1 d-none d-md-inline text-white">Dashboard</span> </a>
                        
                      </li>    
                      <li>
                          <a href="../pages/categories.php" class="nav-link px-0 align-middle">
                              <i class="fas fa-cubes"></i> <span class="ms-1 d-none d-md-inline text-white">Categories</span> </a>
                        
                      </li>                 
                      
                      <li>
                          <a href="../authentication/logout.php" class="nav-link px-0 align-middle">
                          <i class="fas fa-lock"></i><span class="ms-1 d-none d-md-inline text-white">Logout</span></a>
                      </li>
                    
                  </ul>
                
                
                </div>
            </div>
          <!---------------------------------END SIDBAR------------- -->
          <!-- Button Add post -->
   
      <div class="col">
            <div class="d-flex justify-content-lg-end ps-2 mt-5">
              <button type="button" class="btn btn-dark fw-bold p-2" data-bs-toggle="modal" data-bs-target="#modal-blog">
                Add Categories
              </button>
            </div>
              <!-- Tableau des elements -->
              
              <div class="overflow-scroll tab1 w-100 mt-5" style="height:27rem;">
              <table id="tableCategorie" class="table table-striped table-hover" style="width:100%">
                <thead>
                        <tr>
                          <th scope="col">Id</th>
                          <th scope="col">Title</th>
                          <th scope="col">Edit</th>
                          <th scope="col">Delete</th>
                        </tr>
                </thead>
                <tbody>
                <?php 
                   if(empty($Allcategories))
                       echo '<tr class="align-middle"><th class="col-3">No result found.</th> </tr>';
                   else{foreach($Allcategories as $categorie){?>
                      
                    <tr>
                      <th scope="row"><?=$categorie['id']; ?></th>
                      <td><?=$categorie['title']; ?></td>
                      
                      <td><a name="editCategory" href="editCategories.php?categoryEditId=<?=$categorie['id'];?>"><span onclick="editProduct()" class="btn btn-sm btn-success text-black"><i class="fas fa-edit text-white"></i></span></a></td>
                     
                            
                      <td>
                      <a href="categories.php?idc=<?=$categorie['id']; ?>"><span class="btn btn-sm btn-danger"><i class="fas fa-trash text-white"></i></span></a>
                            
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
                        <h5 class="modal-title">Add Categories</h5>
                        <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                      </div>
                      <div class="modal-body">

                        <!-- This Input Allows Storing Product Index  -->
                        <input type="hidden" id="blog-id" name="blogId">
                        <div class="mb-3">
                          <label class="form-label">Title</label>
                          <input type="text" class="form-control" name="title" id="blog-title" required/>
                        </div>
                        </div>
                      <div class="modal-footer">
                        <a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
                        <button type="submit" name="saveCategorie" class="btn btn-primary task-action-btn" id="saveCategorie">Save</button>
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