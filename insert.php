<?php 
 include('config.php');

 session_start();
 if(!isset($_SESSION['userid']))
 header('location:login.php?session=unset');

 if(isset($_POST['action'])){
  
   $target = "db_images/members/".basename($_FILES['image']['name']);
   $name = mysqli_real_escape_string($link, $_POST['name']);
   $age = mysqli_real_escape_string($link, $_POST['age']);
   $address = mysqli_real_escape_string($link, $_POST['address']);
   $contact = mysqli_real_escape_string($link, $_POST['contact']);
   $email = mysqli_real_escape_string($link, $_POST['email']);
   $gender = mysqli_real_escape_string($link, $_POST['gender']);
   $shift = mysqli_real_escape_string($link, $_POST['shift']);
   $image = $_FILES['image']['name'];
   
   //  ********* Insert Data to database ***********
if($_POST['action'] == 'insert'){
   $date = date('Y-m-d');
   $sql = "INSERT into members(name, age, address, contact, email, gender, shift, image, date) VALUES('$name','$age','$address','$contact','$email','$gender','$shift','$image', '$date')";
   $query = mysqli_query($link, $sql);
   move_uploaded_file($_FILES['image']['tmp_name'], $target);
   if($query){
     echo "Insert successful";
   }else{
      echo "Insert unsuccessful";
   }   
 }

 //  ********* Update Data to database ***********
elseif($_POST['action'] == 'update'){
   $id = $_POST['id'];
   $sql = "UPDATE members SET name = '$name', age = '$age', address = '$address', contact = '$contact', email = '$email', gender = '$gender', shift = '$shift', image = '$image' WHERE id = '$id'";
   $query = mysqli_query($link, $sql);
   move_uploaded_file($_FILES['image']['tmp_name'], $target);
   if($query){
      echo "update successful";
   }else{
      echo "update unsuccessful";
   }   
  }

 }

?>