<?php 
include('config.php');
session_start();
if(!isset($_SESSION['userid']))
header('location:login.php');

if(isset($_GET['loadData']))
{
  $sql = "SELECT * FROM `members` ORDER BY `members`.`id`  DESC";
  $query = mysqli_query($link, $sql);
  $rowcount = mysqli_num_rows($query);
  $output = '';
     if($rowcount > 0){
       while($row = mysqli_fetch_array($query)){
           $output .= '
          <tr>
          <td>'.$row['id'].'</td>
          <td>'.$row['name'].'</td>
          <td>'.$row['age'].'</td>
          <td>'.$row['address'].'</td>
          <td>'.$row['contact'].'</td>
          <td>'.$row['email'].'</td>
          <td>'.$row['gender'].'</td>
          <td>'.$row['shift'].'</td>          
          <td>
          <a href="#" class="edit-btn text-info" data.eid='.$row["id"].'><i class="fa fa-pencil" aria-hidden="true"></i></a>
          <a href="#" class="dlt-btn text-danger" data.did='.$row['id'].'><i class="fa fa-trash" aria-hidden="true"></i></a>
          </td>
          </tr>
           ';
       }
    echo $output;
       
     }
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
  if($query){
    echo 1;
  }

}

?>