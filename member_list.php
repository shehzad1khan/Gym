<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Blank Page</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/icon.jpg">
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="./plugins/datatables/jquery.dataTables.min.css"> 
      <!-- Toaster CSS -->
      <link href="./plugins/toastr/css/toastr.min.css" rel="stylesheet">
      <!-- font awesome offline links -->
     <link href="./icons/font-awesome/css/font-awesome.min.css" rel="stylesheet"> 

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
                    <button class="btn btn-success add">Add</button>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">List</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="container-fluid">
        <!-- *********** table row start ********** -->
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                <table id="example" class="table border-radius-2 table-hover table-responsive-lg table-striped table-bordered" style="width:100%;">
        <thead>
            <tr class="table-warning">
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Gender</th>                
                <th>Shift</th>
                <th>Action</th>
            </tr>
        </thead>
        <!-- <tbody id="tbody">                  
        </tbody> -->
        <tfoot>
            <tr class="table-warning">
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Gender</th>                
                <th>Shift</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
                </div>
            </div>
    <!--******* Form Modal start **********-->
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
                  <input type="hidden" name="recordId" id="uid">
                    <div class="form-row">
                      <div class="col">
                        <label for="name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                      </div>
                      <div class="col">
                        <label for="age" class="col-form-label">Age:</label>
                        <input type="number" class="form-control" id="age" name="age">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col">
                        <label for="address" class="col-form-label">Address:</label>
                        <input type="text" class="form-control" id="address" name="address" >
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col">
                        <label for="contact" class="col-form-label">Contact:</label>
                        <input type="text" id="contact" class="input form-control" name="contact">
                      </div>
                      <div class="col">
                        <label for="email" class="col-form-label">Email:</label>
                        <input type="email" id="email" class="input form-control" name="email">
                      </div>                      
                    </div>
                    <div class="form-row">
                    <label class="offset-2 col-form-label">Gender :</label>                                       
                    <label class="col-lg-2 col-form-label text-center" for="male">Male <span class="text-danger">* </span>:
                        </label>
                        <div class="col-lg-2">
                        <input type="radio" class="form-check-input" name="gender" id="male" value="male">
                        </div>                             
                        <label class="col-lg-2 col-form-label" for="female">Female <span class="text-danger">* </span>:
                        </label>
                        <div class="col-lg-1">
                            <input type="radio" class="form-check-input" id="female" name="gender" value="female">
                        </div>
                      </div>
                      <div class="form-row ml-3">
                    <label class="offset-2 col-form-label">Shift :</label>                                       
                    <label class="col-lg-2 col-form-label text-center" for="morning">Morning <span class="text-danger">* </span>:
                        </label>
                        <div class="col-lg-2">
                        <input type="radio" class="form-check-input" name="shift" id="morning" value="morning">
                        </div>                             
                        <label class="col-lg-2 col-form-label" for="evening">Evening <span class="text-danger">* </span> :
                        </label>
                        <div class="col-lg-1">
                            <input type="radio" class="form-check-input" id="evening" name="shift" value="evening">
                        </div>
                      </div>
                    <div class="form-row">
                    <div class="col" id="file-div">
                      <label for="image" class="col-form-label">Picture:</label>
                      <input type="file" id="image" class="form-control" name="image">
                      <input type="hidden" name="image2" id="image2">                      
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
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="./js/dashboard/dashboard-1.js"></script>
    <script src="./js/bootsrap-icons/icons-5.1.3.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- ******** Script start ********* -->
    <script>
$(document).ready(function() {           
        $('#example').DataTable({
          order: [[0, 'desc']],
        "processing": true,
        ajax: {
        url: "fetch.php?loadData",
        type: "POST",
        },
        "columns": [
            {data: 'id'},
            {data: 'name'},
            {data: 'age'},
            {data: 'address'},
            {data: 'contact'},
            {data: 'email'},
            {data: 'gender'},
            {data: 'shift'},
            {data: 'action'}
        ]
    });

       $('.add').on('click', function() {
            $('#exampleModal').modal('show');
            $('#submit').val("Submit");
            $('#form')[0].reset();
        });
       
    // ******* insert data *********    
        $('#form').on('submit', function(e){
            e.preventDefault();    
            var formData = new FormData(this);
            $.ajax({
                url: "insert.php",
                method: "POST",
                data: formData,
                processData: false, 
                contentType: false,
                cache: false,              
                success: function(data) {
                    if(data == 1){
                      var table = $('#example').DataTable(); 
                      table.ajax.reload( null, false );
                      $('#form')[0].reset();
                        $('#exampleModal').modal('hide');
                        loadtable();    
                        toastr.success('Record Inserted Successfully');        
                    }
                    else{
                        alert("Data Inserted Failed");
                        $('#exampleModal').modal('hide');
                        
                    }                             
                }        
            });
        });
// ******* show fetch data in modal *********    
      $(document).on('click','.edit-btn', function(){
        $('#form')[0].reset();
         var id = $(this).data('eid');
         $('#submit').val("Update");
         $('#exampleModalLabel').html("Update Record");          
         $.ajax({
             url : "fetch.php?editId="+id,
             type : "GET",
             dataType : "json",
             success:function(data){                                                       
                 $('#name').val(data.name);
                 $('#age').val(data.age);
                 $('#address').val(data.address);
                 $('#contact').val(data.contact);
                 $('#email').val(data.email);                
                 $('#shift').val(data.shift);
                 $('#image').attr('src', 'data.image');                 

                 if(data.gender == 'male')
                 {
                   $('#male').prop("checked", true);
                 }
                 else if(data.gender == 'female'){
                  $('#female').prop("checked", true);
                 } 
                 if(data.shift == 'morning'){
                   $("#morning").prop("checked", true);
                 } else if(data.shift == 'evening'){
                   $("#evening").prop("checked", true)
                 }               
                 $('#exampleModal').modal('show');               

            }
         });
      });

      //  ********** update data to database **********
      $('#form').on('Update', function(e){
            e.preventDefault();    
            var formData = new FormData(this);
            console.log(this);
            $.ajax({
                url: "insert.php",
                method: "POST",
                data: formData,
                processData: false, 
                contentType: false,
                cache: false,              
                success: function(data) {
                  console.log(data);
                    if(data == 1){
                      $('#form')[0].reset();
                        $('#exampleModal').modal('hide');                           
                        toastr.success('Record Updated Successfully');        
                    }
                    else{
                        alert("Data Updation Failed");
                        $('#exampleModal').modal('hide');                        
                    }                             
                }        
            });
        });         

      //  ********** Delete data from database **********
      $("#example").delegate(".dlt-btn", "click", function(){
           if(confirm("Are you sure you want to delete this record?")){
              var id = $(this).data("did");
              var something = $(this);             
               $.ajax({
                url : "delete.php?recordId="+id,
                type : "GET",                
                success : function(data){
                  if(data == 1){
                    $(something).closest("tr").fadeOut(1000);
                    toastr.error('Record Deleted Successfully');
                  }
                }
              });
            }
          });       

});

    </script>

</body>

</html>