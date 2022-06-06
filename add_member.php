<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Gym-AddMember</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/icon.jpg">
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
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
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Add_Member</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
            <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="insert.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group row">
                                            <label class="text-center col-lg-2 col-form-label" for="name">Name<span class="text-danger">* </span>:
                                            </label>
                                            <div class="col-lg-3">
                                                <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                                            </div>
                                  
                                            <label class="col-lg-2 text-center col-form-label" for="age">Age <span class="text-danger">* </span>:
                                            </label>
                                            <div class="col-lg-3">
                                                <input type="number" class="form-control" id="age" placeholder="Age" name="age">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label text-center" for="address">Address <span class="text-danger">* </span>:
                                            </label>
                                            <div class="col-lg-3">
                                                <input type="text" name="address" class="form-control" id="address" placeholder="Address">
                                            </div>                             
                                            <label class="col-lg-2 col-form-label text-center" for="contact">Contact <span class="text-danger">* </span>:
                                            </label>
                                            <div class="col-lg-3">
                                                <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label text-center" for="email">Email <span class="text-danger">* </span>:
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                                            </div>                                         
                                        </div>
                                        <div class="form-group row"> 
                                            <label class="offset-2 col-form-label">Gender :</label>                                       
                                        <label class="col-lg-1 col-form-label text-center" for="male">Male <span class="text-danger">* </span>:
                                            </label>
                                            <div class="col-lg-1">
                                            <input type="radio" class="form-check-input" name="gender" id="male" value="male">
                                            </div>                             
                                            <label class="col-lg-1 col-form-label" for="female">Female <span class="text-danger">* </span>:
                                            </label>
                                            <div class="col-lg-1">
                                                <input type="radio" class="form-check-input" id="female" name="gender" value="female">
                                            </div>
                                        </div>
                                        <div class="form-group row"> 
                                            <label class="offset-2 col-form-label">Shift :</label>                                       
                                        <label class="col-lg-1 col-form-label text-center" for="morning">Morning <span class="text-danger">* </span>:
                                            </label>
                                            <div class="col-lg-1">
                                            <input type="radio" class="form-check-input" name="shift" id="morning" value="morning">
                                            </div>                             
                                            <label class="col-lg-1 col-form-label " for="evening">Evening <span class="text-danger">* </span>:
                                            </label>
                                            <div class="col-lg-1">
                                                <input type="radio" class="form-check-input" id="evening" name="shift" value="evening">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label text-center">Image <span class="text-danger">* </span>:
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="file" name="image" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-5 offset-3">
                                                <input type="submit" name="insert" class="btn btn-block btn-primary" value="Insert">
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
<!-- ******* Validation script **********     -->
    <script src="./plugins/validation/jquery.validate.min.js"></script>
    <script src="./plugins/validation/jquery.validate-init.js"></script>


</body>

</html>