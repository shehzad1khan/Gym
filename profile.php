<?php 
if (!isset($_SESSION)) session_start();
include('config.php');

if(isset($_POST['change'])){
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if($password == $cpassword){  
           $update = "UPDATE admin SET password = '$password' WHERE id = ".$_SESSION['userid']."";
           $query = mysqli_query($link, $update);         
              if($query){
              
               $_SESSION['flash_message'] = "Password Updated Successfuly...";
               $_SESSION['flash_message_type'] = "success";
            //    echo "<script>window.open('profile.php','_self')</script>";  
              }                   
           }
           else{
            $_SESSION['flash_message'] = "New Password and Confirm Password are not matched";
            $_SESSION['flash_message_type'] = "error";
            //    echo '<div class="alert alert-danger text-center">New Password and Confirm Password are not matched.</div>';
               }
}
   if(isset($_POST['submit'])){  
    $target = "db_images/admin/".basename($_FILES['image']['name']);    
    $name = mysqli_real_escape_string($link, $_POST['Name']);    
    $username = mysqli_real_escape_string($link, $_POST['username']); 
    $image = $_FILES['image']['name'];   

    if($image == null || $image == ''){
        $image = $_POST['image2'];
     }
        
     $update = "UPDATE admin SET name = '$name', image = '$image' WHERE id = ".$_SESSION['userid']."";
     $query = mysqli_query($link, $update);
     move_uploaded_file($_FILES['image']['tmp_name'], $target);
     
        
         $_SESSION['flash_message'] = "Profile Updated Successfuly...";
         $_SESSION['flash_message_type'] = "success";
        //echo "<script>window.open('profile.php','_self')</script>";
    
            }             
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>GMS-Profile</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/icon.jpg">
    <!-- Custom Stylesheet -->  
    <link href="css/style.css" rel="stylesheet">
      <!-- Toaster CSS -->
      <link href="./plugins/toastr/css/toastr.min.css" rel="stylesheet">
    <!-- toaster js and css -->
    <script src="plugins/online-toastr/jquery.min.js"></script>
    <link href="plugins/online-toastr/toastr.css" rel="stylesheet"/>
    <script src="plugins/online-toastr/toastr.js"></script>

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <?php include('includes/navheader.php');?>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <?php include('includes/header.php'); ?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php include('includes/sidenav.php'); ?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">             

        <?php
          $sql = "SELECT * FROM admin WHERE id = ".$_SESSION['userid']."";
          $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_assoc($result);
        ?>   
        <!-- Card Start -->
        <div class="card">
            <div class="card-header">
                Profile
            </div>
        <div class="card-body">

        <!---- Alert Record Inserted ---->
       
        <?php 
            if(isset($_SESSION['flash_message']) && isset($_SESSION['flash_message_type'])) {
              $message = $_SESSION['flash_message'];
              $type = $_SESSION['flash_message_type'];
              unset($_SESSION['flash_message']);
              echo '<script type="text/javascript">toastr.'.$type.'("'.$message.'")</script>';
            }
        ?>   


          <div class="col-md-6 float-right">
               <div class="row">
                 <h3 class="offset-4 mb-3"><?php echo $row['name']; ?></h3>
               </div>
               <div class="row">
                 <img src="db_images/admin/<?php echo $row['image'];?>" class="mb-5 rounded-5 img-fluid offset-3" style="width: 300px; hight: 300px;">
               </div>
          </div>

           <!-- Form Column -->
        <div class="col-md-6 float-left">
            <h2 class="offset-4">UPDATE PROFILE</h2>
      
        <?php           
            $select = "SELECT * FROM admin where id = ".$_SESSION['userid']."";
            $selection = mysqli_query($link, $select);

            if(mysqli_num_rows($selection) > 0){
            while($row = mysqli_fetch_array($selection)){
        ?>
         
            <form class="row g-3" method="post" enctype="multipart/form-data">
                <div class="col-md-6">
                  <label for="title" class="form-label">Name:</label>
                  <input type="text" class="form-control" id="title" name="Name" required value="<?php echo $row['name']; ?>">
                </div>
                <div class="col-md-6">
                  <label for="uname" class="form-label">Username:</label>
                  <input type="text" class="form-control" id="uname" name="username" required value="<?php echo $row['username']; ?>">
                </div>
                <div class="col-md-12">
                  <label for="img">Profile Picture</label><br>
                  <input type="file" name="image" id="img" class="form-control" value="<?php echo $row['image']; ?>">
                  <input type="hidden" name="image2" value="<?php echo $row['image']; ?>">
                </div>
                <div class="col-12">
                    <button type="submit" name="submit" class="btn btn-block btn-primary">Update</button>
                </div>
            </form> <br>

            <form class="row g-3 mt-5" method="post">
            <div class="mb-3 mt-3 col-6">      
                  <label for="pass" class="form-label">New Password:</label>
                  <input type="password" class="form-control" id="pass" placeholder="************" name="password" required>
                  <input type="hidden" name="password2" value="<?php echo $row['password']; ?>">
                </div>                    
                <div class="mt-3 mb-3 col-6">    
                    <label for="cpass" class="form-label">Confirm Password:</label>
                    <input type="password" class="form-control" id="cpass" placeholder="************" name="cpassword" required>
                    <input type="hidden" name="cpassword2" value="<?php echo $row['password']; ?>">
                </div>  

                <div class="col-12">
                    <button type="submit" name="change" class="btn btn-block btn-info">Change Password</button>
                </div>
            </form>
         <?php } } ?>
   	           </div>

              </div>

            </div>      
        <!-- Card End -->            

            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        <?php include('includes/footer.php') ?>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>

</body>

</html>