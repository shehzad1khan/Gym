<?php
 include('config.php');
  
  if(isset($_POST['action'])){
    $planname = mysqli_real_escape_string($link, $_POST['plan']);
    $planamount = mysqli_real_escape_string($link, $_POST['amount']);

    if($_POST['action'] == 'insert'){
        $sql = "INSERT into plans(plan, amount) VALUES('$planname','$planamount')";
        $query = mysqli_query($link, $sql);
        if($query){
            echo 1;
        }    
    }

    if($_POST['action'] == 'update'){
        $id = $_POST['id'];
        $sql = "UPDATE plans set plan = '$packname', amount = '$packamount' where id = '$id'";
        $query = mysqli_query($link, $sql);
        if($query){
           echo 2;
        } 
    }
      

  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Gym-Plans</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/icon.jpg">
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="./plugins/datatables/jquery.dataTables.min.css"> 
    <link  href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet">
      <!-- Toaster CSS -->
      <link href="./plugins/toastr/css/toastr.min.css" rel="stylesheet">
    <!-- toaster js and css -->
    <script src="plugins/online-toastr/jquery.min.js"></script>
    <link href="plugins/online-toastr/toastr.css" rel="stylesheet"/>
    <script src="plugins/online-toastr/toastr.js"></script>

    <style>
       input[type=search] {
        border: 2px solid #ccc;
        border-radius: 4px;
      }
      #example tr td{
        font-size: 15px;
        color: black;
        font-weight: bold;

      }
      thead, tfoot{
        background-color: #BBa;
        color: #000;
        font-size: 18px;
        text-align: left !important;
      }
      .list-span{
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        font-size: 25px;
        font-weight: bold;
        color: #6A5ACD;
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
                <span class="offset-5 list-span">Plans Details</span>  
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Plans</a></li>
                    </ol>
                </div>
            </div>
     <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 float-left card">
                <form id="form">
                    <h3 class="offset-3"><i class="fa fa-plus-square pr-2"></i>Add Plan</h3>
                    <input type="hidden" name="id" value="0" id="id">
                    <input type="hidden" name="action" value="insert" id="action">    
                    <div class="col-md-12">
                      <label for="plan" class="form-label">Plan</label>
                      <input type="number" class="form-control" name="plan" id="plan" required>
                    </div>
                    <div class="col-12">
                         <label for="amount" class="form-label">Amount</label>
                         <input type="number" class="form-control" name="amount" id="amount" required>
                    </div>                    
                    <div class="col-12">
                        <input type="submit" class="btn btn-block btn-primary" name="submit" id="submit" value="SUBMIT">
                    </div>
               </form>
          </div>
             
          <!-- ******** table column ********* -->
<div class="col-md-8 float-right card">
     <!-- *********** table row start ********** -->
     <table id="example" class="table cell-border border-radius-2 table-hover table-responsive-lg table-striped table-bordered" style="width:100%;">
     <h3 class="m-auto"><i class="fa fa-list pr-2"></i>Plans List</h3>
        <thead>
            <tr class="">
                <th>ID</th>
                <th>Plans</th>
                <th>Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        
        <tfoot>
            <tr class="border">
                <th>ID</th>
                <th>Plans</th>
                <th>Amount</th>
                <th>Actions</th>
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="plugins/common/common.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>  
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
$(document).ready(function() {
     $('#example').DataTable({
        order: [[0, 'desc']],
        "processing": false,
        ajax: {
        url: "fetch.php?loadPlans",
        type: "GET",
        },
        "columns": [
            {data: 'id'},
            {data: 'plan'},
            {data: 'amount'},
            {data: 'action'}
        ]
     });
// ****** insert data ***********
    $('#form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url : "plans.php",
            type: "POST",
            data: $("#form").serialize(),
            success: function(data) {
                if(data == '1'){
                  toastr.success('Plan Added successfully');               
                $('#form')[0].reset();
                var table = $('#example').DataTable(); 
                  table.ajax.reload( null, true );
                }else{
                    toastr.success('Plan updated successfully');
                    $('#form')[0].reset();
                var table = $('#example').DataTable(); 
                  table.ajax.reload( null, true );
                }                           
            }
        });             
    });
// ******** Click edit button ***********
    $(document).on('click', '.pledit-btn', function() {
        var id = $(this).data("plid");        
        $.ajax({
            url : "fetch.php?editPlan="+id,
            type: "GET",
            dataType: "json", 
            success: function(data) {
                console.log(data);
                $('#submit').val('UPDATE');
                $('#id').val(data.id);
                $('#plan').val(data.plan);
                $('#amount').val(data.amount);
                $('#action').val('update');
            }
        })
    });
 //  ********** Delete data from database **********
 $(document).on("click", ".pldlt-btn", function(){
           if(confirm("Are you sure you want to delete this record?")){
              var id = $(this).data("pldid");
              var something = $(this);             
               $.ajax({
                url : "delete.php?planId="+id,
                type : "GET",                
                success : function(data){
                  if(data == 1){
                    $(something).closest("tr").fadeOut(1000);
                    toastr.error('Plan Deleted Successfully');
                  }
                }
              });
            }
          });;


 });
</script>

</body>

</html>