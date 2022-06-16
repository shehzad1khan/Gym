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
//  ********* Delete Plan *********
if(isset($_GET['planId'])){
     $id = $_GET['planId'];
     $sql = "DELETE FROM `plans` WHERE id = '$id';";
     $query = mysqli_query($link, $sql);
     if($query){
          echo 1;
     }else{
          echo 0;
     }
}
//  ********* Delete Trainer *********
if(isset($_GET['TrainerId'])){
     $id = $_GET['TrainerId'];
     $sql = "DELETE FROM `trainers` WHERE id = '$id';";
     $query = mysqli_query($link, $sql);
     if($query){
          echo 1;
     }else{
          echo 0;
     }
}

?>