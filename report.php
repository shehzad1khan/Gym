<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Dashboard-Report</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/icon.jpg">
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style>
         thead, tfoot{
               background-color: #F08080;
               color: white;
               font-weight: bold;
               font-size: 18px;
         }
         .brnd{
              color: #6A5ACD;
              padding-top: 5px;
              font-size: 30px;
              font-weight: bold;
         }
         tbody{
                 background-color: #fff;
                 color:black
         }
    </style>

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
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Report</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
         
         <div class="row" style="">
               <div class="mr-auto col-2">
                    <p class="brnd">Extreme Soft</p>
               </div>
                 <div class="col-2 ml-auto mt-3">
                    <strong class="pr-1 text-primary">SEARCH</strong>                         
                    <input type="text" name="search" id="search" placeholder="Type Something" autofocus>
                 </div>
               <!-- <a href="pdf.php" style="display: none;" class="btn btn-danger btn-sm offset-2" id="printBtn">Print</a> -->              
          </div>
               <!-- table -->
            <div class="row">
                 <div class="col-md-12">  
                 <table class="table table-hover table-responsive-lg" style="width:100%;" id="table">
                   <thead class="text-white">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Age</th>
                      <th scope="col">Address</th>
                      <th scope="col">Contact</th>
                      <th scope="col">Email</th>
                      <th scope="col">Gender</th>
                      <th scope="col">Shift</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                   <?php
                    include('config.php');
                    $sql = "SELECT * FROM members";
                    $query = mysqli_query($link, $sql);
                    $rowcount = mysqli_num_rows($query);

                    for($j = 1; $j <= $rowcount; $j++){

                        $row = mysqli_fetch_array($query);                   
                     ?>

                  <tbody id="tbody">
                    <tr>
                      <th><?php echo $j ?></th>
                      <td><?php echo $row['name'] ?></td>
                      <td><?php echo $row['age'] ?></td>
                      <td><?php echo $row['address'] ?></td>
                      <td><?php echo $row['contact'] ?></td>
                      <td><?php echo $row['email'] ?></td>
                      <td><?php echo $row['gender'] ?></td>
                      <td><?php echo $row['shift'] ?></td>
                      <td><a href="pdf.php" class="btn btn-info btn-sm offset-2" id="printBtn">Print</a></td>
                    </tr>                   
                  </tbody>
                  <?php } ?>
                  <tfoot class="text-white">
                    <tr>
                    <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Age</th>
                      <th scope="col">Address</th>
                      <th scope="col">Contact</th>
                      <th scope="col">Email</th>
                      <th scope="col">Gender</th>
                      <th scope="col">Shift</th>
                      <th scope="col">Action</th>

                    </tr>
                  </tfoot>
                </table>
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

    <script>
         $(document).ready(function(){
              $("#search").on("keyup", function(){
                   var search = $(this).val();
                   $.ajax({
                        url : "fetch.php",
                        type : "POST",
                        data : {search : search},
                        success : function(data){                           
                             console.log(data);
                         //     $("#tbody").hide();
                             $("#tbody").html(data);
                        }
                             
                   })
               });
         });
    </script>

</body>

</html>