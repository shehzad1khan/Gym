<?php 
include('config.php');
session_start();
if(!isset($_SESSION['userid']))
header('location:login.php');

// ********* load member table ***********

if(isset($_GET['loadData']))
{
  $sql = "SELECT * FROM `members` ORDER BY `members`.`id` DESC";
  $query = mysqli_query($link, $sql);    
    $count = 1;
    while($row = mysqli_fetch_array($query)){

 // edit Button
 $updateButton = '<a href="#" class="edit-btn text-info" data-eid="'.$row['id'].'"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
            
 // Delete Button
 $deleteButton = '<a href="#" class="dlt-btn text-danger" data-did="'.$row['id'].'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
             
 // View Button
 $viewButton = '<a href="#" class="view-btn text-success" data-vid="'.$row['id'].'"><i class="fa fa-eye" aria-hidden="true"></i></a>';

 $action = $viewButton." ".$updateButton."  ".$deleteButton;

        $array[] = array(
          "id" => $row['id'],
          "name" => $row['name'],
          "age" => $row['age'],
          "address" => $row['address'],
          "contact" => $row['contact'],
          "email" => $row['email'],
          "gender" => $row['gender'],
          "shift" => $row['shift'],
          "date" => $row['date'],
          "action" => $action
        );
        $count++;
       }    
        $dataset = array(
          "echo" => 1,
          "totalrecords" => count($array),
          "totaldisplayrecords" => count($array),
          "data" => $array
      );
         echo json_encode($dataset);
    } 

// ****** Update Record *********
if(isset($_GET['editId'])){
  $id = $_GET['editId'];
  $sql = "SELECT * from `members` where `id` = '$id'";
  $query = mysqli_query($link, $sql);
  $row = mysqli_fetch_array($query);   
  $array = array(
    'id' => $row['id'],
    'name' => $row['name'],
    'age' => $row['age'],
    'address' => $row['address'],
    'contact' => $row['contact'],
    'email' => $row['email'],
    'gender' => $row['gender'],
    'shift' => $row['shift'],
    'image' => $row['image'],
  );
  echo json_encode($array);
}
//  ******* Live Search *******
if(isset($_POST['search'])){
  $search = $_POST['search'];
  $sql = "SELECT * from `members` WHERE `name` like '%$search%' OR `age` like '%$search%' OR `address` like '%$search%' OR `contact` like '%$search%' OR `email` like '%$search%' OR `gender` like '%$search%' OR `shift` like '%$search%'";
  $query = mysqli_query($link, $sql);
  $count = 1;
  $output = "";
  if($row = mysqli_num_rows($query) > 0){
    while($row = mysqli_fetch_array($query)){
      $output .= '
      <tr>
        <th>'.$count.'</th>
        <td>'.$row['name'].'</td>
        <td>'.$row['age'].'</td>
        <td>'.$row['address'].'</td>
        <td>'.$row['contact'].'</td>
        <td>'.$row['email'].'</td>
        <td>'.$row['gender'].'</td>
        <td>'.$row['shift'].'</td>
        <td><a href="#" data-did = "'.$row['id'].'" class="btn btn-info btn-sm offset-2" id="printBtn">Print</a></td>
      </tr>
       ';        
       $count ++;      
    } 
      echo $output;     
  }
}
// ****** View Details *********
if(isset($_GET['viewId'])){
  $id = $_GET['viewId'];
  $sql = "SELECT * from `members` where `id` = '$id'";
  $query = mysqli_query($link, $sql);
  $row = mysqli_fetch_array($query);  
 
  $html = '
        <div class="row">
          <div class="float-left col-md-5">            
              <b class="d-inline">Name :</b> <p class="d-inline p-name">'.$row["name"].'</p> <br>
              <b class="d-inline">Age :</b> <p class="d-inline  p-age">'.$row["age"].'</p> <br>
              <b class="d-inline">Address :</b> <p class="d-inline p-address">'.$row["address"].'</p> <br>
              <b class="d-inline">Contact :</b> <p class="d-inline p-contact">'.$row["contact"].'</p> <br>
              <b class="d-inline">Email :</b> <p class="d-inline p-email">'.$row["email"].'</p> <br>
              <b class="d-inline">Gender :</b> <p class="d-inline p-gender">'.$row["gender"].'</p> <br>
              <b class="d-inline">Shift :</b> <p class="d-inline p-shift">'.$row["shift"].'</p> <br>            
              <b class="d-inline">Joining Date :</b> <p class="d-inline p-date">'.$row["date"].'</p> <br>            
          </div>  
       ';
  $html .= '
           <div class="float-right col-md-7">
           <large><b>Membership Plan Details</b></large>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Age</th>
                  <th>Address</th>
                  <th>Contact</th>
                  <th>Email</th>
                  <th>Gender</th>
                  <th>Shift</th>
                </tr>
              </thead>
              <tbody>
                 <tr>
                   <td>'.$row["id"].'</td>
                   <td>'.$row["name"].'</td>
                   <td>'.$row["age"].'</td>
                   <td>'.$row["address"].'</td>
                   <td>'.$row["contact"].'</td>
                   <td>'.$row["email"].'</td>
                   <td>'.$row["gender"].'</td>
                   <td>'.$row["shift"].'</td>
                 </tr>
              </tbody>
            </table>
           </div>
        </div>
  ';     
       echo $html; 
  }

  /// package table code start /// 
  if(isset($_GET['loadPackage']))
{
  $sql = "SELECT * FROM `packages`";
  $query = mysqli_query($link, $sql);    
    $count = 1;
    while($row = mysqli_fetch_array($query)){

 //Package edit Button
 $updateButton = '<a href="#" class="Pedit-btn text-info" data-peid="'.$row['id'].'"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
            
 //package Delete Button
 $deleteButton = '<a href="#" class="pdlt-btn text-danger" data-pdid="'.$row['id'].'"><i class="fa fa-trash" aria-hidden="true"></i></a>';

 $action = $updateButton." ".$deleteButton;

        $array[] = array(
          "id" => $count,
          "package" => $row['package'],
          "description" => $row['description'],
          "amount" => number_format($row['amount'],2),
          "action" => $action
        );
        $count++;
       }    
        $dataset = array(
          "echo" => 1,
          "totalrecords" => count($array),
          "totaldisplayrecords" => count($array),
          "data" => $array
      );
         echo json_encode($dataset);
    } 

    /// Plans table code start /// 
  if(isset($_GET['loadPlans']))
  {
    $sql = "SELECT * FROM `plans`";
    $query = mysqli_query($link, $sql);    
      $count = 1;
      while($row = mysqli_fetch_array($query)){
  
   //Plan edit Button
   $updateButton = '<a href="#" class="pledit-btn text-info" data-plid="'.$row['id'].'"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
              
   //Plan Delete Button
   $deleteButton = '<a href="#" class="pldlt-btn text-danger" data-pldid="'.$row['id'].'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
  
   $action = $updateButton." ".$deleteButton;
  
          $array[] = array(
            "id" => $count,
            "plan" => $row['plan'].' month/s',
            "amount" => '<i class="fa fa-usd pr-2"></i>'.number_format($row['amount'],2),
            "action" => $action
          );
          $count++;
         }    
          $dataset = array(
            "echo" => 1,
            "totalrecords" => count($array),
            "totaldisplayrecords" => count($array),
            "data" => $array
        );
           echo json_encode($dataset);
      } 

      /// Trainers table code start /// 
  if(isset($_GET['loadTrainer']))
  {
    $sql = "SELECT * FROM `trainers`";
    $query = mysqli_query($link, $sql);    
      $count = 1;
      while($row = mysqli_fetch_array($query)){
  
   //Trainer edit Button
   $updateButton = '<a href="#" class="tredit-btn text-info ml-3 pr-2" data-trid="'.$row['id'].'"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
              
   //Trainer Delete Button
   $deleteButton = '<a href="#" class="trdlt-btn text-danger" data-trdid="'.$row['id'].'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
  
   $action = $updateButton." ".$deleteButton;
  
          $array[] = array(
            "id" => $count,
            "information" =>'<i class="fa fa-user pr-2 mb-2"></i>'.$row['name'].'<br>
                            <i class="fa fa-phone pr-2 mb-2"></i>'.$row['contact'].'<br>
                            <i class="fa fa-envelope pr-2 mb-2"></i>'.$row['email'].'<br>
                            <i class="fa fa-usd pr-2 mb-2"></i>'.$row['rate'],
            "action" => $action 
          );
          $count++;
         }    
          $dataset = array(
            "echo" => 1,
            "totalrecords" => count($array),
            "totaldisplayrecords" => count($array),
            "data" => $array
        );
           echo json_encode($dataset);
      } 
    
    // ****** Update Package *********
if(isset($_GET['editPackage'])){
  $id = $_GET['editPackage'];
  $sql = "SELECT * from `packages` where `id` = '$id'";
  $query = mysqli_query($link, $sql);
  $row = mysqli_fetch_array($query);  
   
  $array = array(
    'id' => $row['id'],
    'package' => $row['package'],
    'description' => $row['description'],
    'amount' => $row['amount'],
  );
  echo json_encode($array);
}

 // ****** Update plans *********
 if(isset($_GET['editPlan'])){
  $id = $_GET['editPlan'];
  $sql = "SELECT * from `plans` where `id` = '$id'";
  $query = mysqli_query($link, $sql);
  $row = mysqli_fetch_array($query);  
   
  $array = array(
    'id' => $row['id'],
    'plan' => $row['plan'],
    'amount' => $row['amount'],
  );
  echo json_encode($array);
}
// ****** Update Trianer *********
if(isset($_GET['editTrainee'])){
  $id = $_GET['editTrainee'];
  $sql = "SELECT * from `trainers` where `id` = '$id'";
  $query = mysqli_query($link, $sql);
  $row = mysqli_fetch_array($query);  
   
  $array = array(
    'id' => $row['id'],
    'name' => $row['name'],
    'contact' => $row['contact'],
    'email' => $row['email'],
    'rate' => $row['rate'],
  );
  echo json_encode($array);
}



?>