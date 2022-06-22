<?php
 include('config.php');
  
  if(isset($_POST['action'])){
     $member_id = $_POST['member_id'];
     $start_date = $_POST['stdate'];
     $end_date = $_POST['endate'];
  

    if($_POST['action'] == 'insert'){
        $sql = "INSERT into schedul(member_id, start_date, end_date) VALUES('$member_id','$start_date','$end_date')";
        $query = mysqli_query($link, $sql);
        if($query){
            echo 1;
        }    
    }

    if($_POST['action'] == 'update'){
        $id = $_POST['id'];
        $sql = "UPDATE schedul set start_date = '$start_date', end_date = '$end_date' where id = '$id'";
        $query = mysqli_query($link, $sql);;
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
    <title>Gym-Schedual</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/icon.jpg">
    
    <link rel="stylesheet" href="./plugins/datatables/jquery.dataTables.min.css">
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
      <!-- Toaster CSS -->
      <link href="./plugins/toastr/css/toastr.min.css" rel="stylesheet">
      <!-- font awesome online links -->
      <script src="https://kit.fontawesome.com/84c83fa783.js" crossorigin="anonymous"></script>
    <link  href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet">
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
                <button class="btn btn-success add">Add Schedual</button>
                <span class="offset-5 list-span">Scheduale</span>    
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Schedual</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="container-fluid">

          <!-- *********** table row start ********** -->
            <div class="row">
                <div class="offset-1 col-lg-10 col-sm-10">
                <table id="example" class="table border-radius-2 table-hover table-responsive-lg table-striped table-bordered" style="width:100%;">
        <thead>
            <tr>
                <th style="width: 2%;">ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Start_Date</th>
                <th>End_Date</th>
                <th style="width: 15%; text-align: center;">Action</th>
            </tr>
        </thead>
        
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Start_Date</th>
                <th>End_Date</th>
                <th>Action</th>
            </tr>
        </tfoot>
     </table>
    </div>
</div>
<!-- ************* table row Ends ************* -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title offset-5" id="exampleModalLabel">ADD RECORD</h5>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <!-- --Dailog Form Tag-- -->
                <div class="modal-body">
                  <form method="POST" action="#" id="form" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="0" id="id">
                    <input type="hidden" name="action" value="insert" id="action">
                    <div class="form-row">
                      <div class="col select-col">
                        <label class="col-form-label">Members:</label>
                          <select class="form-select form-select-lg custom-select" name="member_id" id="memId">
                            <option disabled selected>Select Member</option>
                          <?php 
                            $sql = "SELECT * FROM members";
                            $result = mysqli_query($link, $sql);
                            while($row = mysqli_fetch_assoc($result)){
                              echo'<option value="'.$row['id'].'" id="member" class="font-weight-bold text-info text-capitalize">&nbsp;'.$row['name'].'&nbsp;/&nbsp;'.$row['id'].'</option>';
                            }?>
                          </select>
                      </div>
                      <div class="col">
                        <label for="stdate" class="col-form-label">Start_Date:</label>
                        <input type="date" class="form-control" id="stdate" name="stdate">
                      </div>
                      <div class="col">
                        <label for="endate" class="col-form-label">End_Date:</label>
                        <input type="date" class="form-control" id="endate" name="endate" >
                      </div>
                    </div>
                    <div class="form-group mr-auto mt-2">
                      <input type="submit" class="btn btn-success offset-9" name="submit" value="Submit" id="submit">
                      <button type="button" class="btn btn-danger ml-2" data-bs-dismiss="modal">Close</button>
                    </div>

                  </form>
                </div>
              </div>
            </div>
        </div>
        <!-- Form modal ends --> 

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
    <script src="./js/bootsrap-icons/icons-5.1.3.js"></script>
<!-- ********* Script Start here ***********-->
<script>
$(document).ready(function() {           
        $('#example').DataTable({
          order: [[0, 'desc']],
        "processing": true,
        ajax: {
        url: "fetch.php?loadSchedual",
        type: "POST",
        },
        "columns": [
            {data: 'id'},
            {data: 'image'},
            {data: 'name'},
            {data: 'st_date'},
            {data: 'en_date'},
            {data: 'action'}
        ]
     });
// ********** add button show modal ************
     $('.add').on('click', function() {
        $('#form')[0].reset();
        $('#exampleModal').modal('show');
         $('#action').val('insert');
         $('#id').val('0');
         $('#exampleModalLabel').html("Add Schedule");
         $('#submit').val("Submit");
         $(".select-col").show();
        });

 // ****** insert schedual ***********
    $('#form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url : "schedual.php",
            type: "POST",
            data: $("#form").serialize(),
            success: function(data) {
               console.log(data);
                if(data == '1'){
                  toastr.success('Schedual Added successfully');               
                $('#form')[0].reset();
                var table = $('#example').DataTable(); 
                  table.ajax.reload( null, true );
                  $('#exampleModal').modal('hide');
                }
                else{
                    toastr.success('Schedual updated successfully');
                    $('#form')[0].reset();
                var table = $('#example').DataTable(); 
                  table.ajax.reload( null, true );
                  $('#exampleModal').modal('hide');
                }                           
            }
        });             
    });

  // ****** edit schedual ***********
    $(document).on('click', '.edit-btn', function() {
        var id = $(this).data('eid');
        $.ajax({
            url : "fetch.php?editSchedual="+id,
            type: "POST",
            dataType: "json",
            success: function(data) {
               console.log(data);
              // var member = data.member_id;
              // // $("#memId selected").val(data.member_id);
              //  $('#memId option[value=member]').attr('selected', true);
              //   // $("#member").val(data.member_id);

                $("#stdate").val(data.stdate);
                $("#endate").val(data.endate);
                $("#id").val(data.member_id);
                $('#action').val('update');
                $('#submit').val('UPDATE');
                $('#exampleModalLabel').html("Edit Schedule");
                $(".select-col").hide();
                $('#exampleModal').modal('show');
                
            }
        });
    });

});
</script>

</body>

</html>