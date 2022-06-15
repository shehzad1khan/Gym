<?php
include('config.php');

if(isset($_GET['recordId'])){
     $id = $_GET['recordId'];
     $sql = "DELETE FROM `members` WHERE id = '$id';";
     $query = mysqli_query($link, $sql);
     if($query){
          echo 1;
     }else{
          echo 0;
     }
}
//  ********* Delete Package *********
if(isset($_GET['packageId'])){
     $id = $_GET['packageId'];
     $sql = "DELETE FROM `packages` WHERE id = '$id';";
     $query = mysqli_query($link, $sql);
     if($query){
          echo 1;
     }else{
          echo 0;
     }
}

?>