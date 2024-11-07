<?php
require_once "config.php";
$p_id=$_GET['id'];
$fetch_product = "SELECT * FROM products WHERE id='{$p_id}'";
$res_pro = mysqli_query($conn,$fetch_product);
$total_rows = mysqli_num_rows($res_pro);

if(isset($_POST['addproduct'])){
$p_id = $_POST['pid'];
$pname = $_POST['pname'];

$pdesc = $_POST['pdesc'];

$pprice = $_POST['pprice'];


if(isset($_FILES['pimage'])){
  if($_FILES['pimage']['name']!=null){
  //name,size,type,temp
  $filename = $_FILES['pimage']['name'];
  $filesize = $_FILES['pimage']['size'];
  $filetype = $_FILES['pimage']['type'];
  $filetemp = $_FILES['pimage']['tmp_name'];
  // print_r($_FILES['pimage']);
$update_product ="UPDATE products SET name = '{$pname}',description='{$pdesc}',price='{$pprice}',p_img='{$filename}' WHERE id='{$p_id}'";
$res = mysqli_query($conn,$update_product);

if($res){
  move_uploaded_file($filetemp,'media/'.$filename);
  echo "<script>alert('Product updated Successfully');</script>";
  echo "<script>window.location.href='viewproducts.php'</script>";
}
  }
  else{

  $update_product ="UPDATE products SET name = '{$pname}',description='{$pdesc}',price='{$pprice}' WHERE id='{$p_id}'";
  $res = mysqli_query($conn,$update_product);
  if($res){
   
    echo "<script>alert('Product updated Successfully');</script>";
    echo "<script>window.location.href='viewproducts.php'</script>";
  }

  }
}

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>RuangAdmin - Form Basics</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
  <?php
   require_once 'sidebar.php';
   ?>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
  
      <?php
   require_once 'header.php';
   ?>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Products</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Forms</li>
              <li class="breadcrumb-item active" aria-current="page">Add Products</li>
            </ol>
          </div>

          <div class="row justify-content-center">
            <div class="col-lg-6">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Update Product</h6>
                </div>
                <div class="card-body">
                  <?php
                  
                  if($total_rows!=0){
                    while($data = mysqli_fetch_assoc($res_pro)){

?>
                  <form method="post" enctype="multipart/form-data">
                  
                  <input type="text" class="form-control" name="pid"  hidden value="<?php echo $data['id']?>" id="exampleInputEmail1" aria-describedby="emailHelp"
                       >  
                  <div class="form-group">
                      <label for="exampleInputEmail1">Product Name</label>
                      <input type="text" class="form-control" name="pname" value="<?php echo $data['name']?>" id="exampleInputEmail1" aria-describedby="emailHelp"
                       >
                 
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Product Description</label>
                      <input type="text" class="form-control" name="pdesc" value="<?php echo $data['description']?>" id="exampleInputEmail1" aria-describedby="emailHelp"
                        >
                 
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Product Price</label>
                      <input type="text" class="form-control" name="pprice" value="<?php echo $data['price']?>" id="exampleInputEmail1" aria-describedby="emailHelp"
                        >
                 
                    </div>
                    <div class="form-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="pimage" onchange="previewImage(event)">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                    </div>
                    <div id="imagePreview">
                    <img src="media/<?php echo $data['p_img']?>" alt="" width="100" height="100">
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary" name="addproduct">Update Product</button>
                  </form>
                 <?php
                    }
                  }
                 
                 ?>
                </div>
              </div>

             

              
            </div>

         
          </div>
          <!--Row-->

          <!-- Documentation Link -->
          <div class="row">
            <div class="col-lg-12 text-center">
              <p>For more documentations you can visit<a href="https://getbootstrap.com/docs/4.3/components/forms/"
                  target="_blank">
                  bootstrap forms documentations.</a> and <a
                  href="https://getbootstrap.com/docs/4.3/components/input-group/" target="_blank">bootstrap input
                  groups documentations</a></p>
            </div>
          </div>

          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="login.html" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="https://indrijunanda.gitlab.io/" target="_blank">indrijunanda</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            // Get the result and set it as the source of the img tag
            var preview = document.getElementById('imagePreview');
            preview.innerHTML = '<img src="' + reader.result + '" alt="Preview Image" width="100" height="100">';
        };
        
        // Read the file as a data URL
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
</body>

</html>