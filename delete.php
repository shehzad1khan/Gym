<?php
require "config.php";

if(isset($_POST['recordId'])){
     $id = $_POST['recordId'];
     $sql = "DELETE from members where id = $id";
     $query = mysqli_query($link, $sql);
     if($query){
          echo 1;
     }else{
          echo 0;
     }
}

?>