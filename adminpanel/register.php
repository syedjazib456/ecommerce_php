<?php
require_once "config.php";
if(isset($_POST['register'])){
$adname = $_POST['admin_name'];

$ademail = $_POST['admin_email'];

$adpass = $_POST['admin_pass'];


if(isset($_FILES['admin_image'])){
  //name,size,type,temp
  $filename = $_FILES['admin_image']['name'];
  $filesize = $_FILES['admin_image']['size'];
  $filetype = $_FILES['admin_image']['type'];
  $filetemp = $_FILES['admin_image']['tmp_name'];
  // print_r($_FILES['pimage']);
$insert_admin ="INSERT INTO admin(adminname,adminemail,adminpass,admin_img) VALUES('{$adname}','{$ademail}','{$adpass}','{$filename}')";
$res = mysqli_query($conn,$insert_admin);

if($res){
  move_uploaded_file($filetemp,'media/'.$filename);
  echo "<script>alert('Admin Added Successfully');</script>";
  echo "<script>window.location.href='index.php'</script>";
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
  <title>RuangAdmin - Register</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
  <!-- Register Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Register</h1>
                  </div>
                  <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Admin Name</label>
                      <input type="text" class="form-control" id="exampleInputFirstName" name="admin_name" placeholder="Enter Your Name">
                    </div>
                    <div class="form-group">
                      <label>Admin Email</label>
                      <input type="email" class="form-control" id="exampleInputLastName" name="admin_email" placeholder="Enter Your Email">
                    </div>   
                   
                    <div class="form-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="admin_image">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword" name="admin_pass" placeholder="Password">
                    </div>
                  
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block" name="register">Register</button>
                    </div>
               
                   
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="index.php">Already have an account?</a>
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Register Content -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
</body>

</html>