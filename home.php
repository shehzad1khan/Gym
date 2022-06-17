<?php 
 include('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Gym-Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/icon.jpg">
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/84c83fa783.js" crossorigin="anonymous"></script>
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
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.html">
                    <b class="logo-abbr"><img src="images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <img src="images/logo-text.png" alt="">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
         <?php include("includes/header.php") ?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            SideNavbar start
        ***********************************-->
        <?php include("includes/sidenav.php") ?>
        <!--**********************************
            SideNavbar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li> 
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">

            <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Today Joining</h3>
                                <div class="d-inline-block">
                                   <?php
                                    $sql = "SELECT * FROM `members` WHERE `date` = CURDATE()";
                                    $result = mysqli_query($link, $sql);
                                    $count = mysqli_num_rows($result);
                                    if($count > 0){
                                       echo '<h2 class="text-white">'.$count.'</h2>';
                                    }else{
                                        echo '<h2 class="text-white">0</h2>';
                                    }
                                   ?>
                                    <p class="text-white mb-0">Jan - March 2019</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-handshake-o fa-shake" style="--fa-animation-duration: 10s; color:yellow"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Weekly Joining</h3>
                                <div class="d-inline-block">
                                <?php
                                    $sql = "SELECT * FROM `members` WHERE `date` Between CURDATE() - INTERVAL 7 DAY AND CURDATE()";
                                    $result = mysqli_query($link, $sql);
                                    $count = mysqli_num_rows($result);
                                    if($count > 0){
                                       echo '<h2 class="text-white">'.$count.'</h2>';
                                    }else{
                                        echo '<h2 class="text-white">0</h2>';
                                    }
                                ?>
                                    <p class="text-white mb-0">Jan - March 2019</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa-brands fa-weebly fa-flip" style="--fa-animation-duration: 10s; color:yellow"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Monthly Joining</h3>
                                <div class="d-inline-block">
                                <?php
                                    $sql = "SELECT * FROM `members` WHERE `date` Between CURDATE() - INTERVAL 30 DAY AND CURDATE()";
                                    $result = mysqli_query($link, $sql);
                                    $count = mysqli_num_rows($result);
                                    if($count > 0){
                                       echo '<h2 class="text-white">'.$count.'</h2>';
                                    }else{
                                        echo '<h2 class="text-white">0</h2>';
                                    }
                                ?>
                                    <p class="text-white mb-0">Jan - March 2019</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa-regular fa-m fa-spin" style="--fa-animation-duration: 10s; color:yellow"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Members</h3>
                                <div class="d-inline-block">
                                <?php
                                    $sql = "SELECT * FROM `members`";
                                    $result = mysqli_query($link, $sql);
                                    $count = mysqli_num_rows($result);
                                    if($count > 0){
                                       echo '<h2 class="text-white">'.$count.'</h2>';
                                    }else{
                                        echo '<h2 class="text-white">0</h2>';
                                    }
                                ?>
                                    <p class="text-white mb-0">Jan - March 2019</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa-solid fa-person-through-window fa-beat-fade"></i></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <?php include("includes/footer.php") ?>
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