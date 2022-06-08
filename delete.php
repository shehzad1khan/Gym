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

?>