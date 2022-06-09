<?php 
 include('config.php');

 session_start();
 if(!isset($_SESSION['userid']))
 header('location:login.php?session=unset');

//  ********* Insert Data to database ***********
if(isset($_POST['name'])){
   $target = "db_images/members/".basename($_FILES['image']['name']);
   $name = $_POST['name'];
   $age = $_POST['age'];
   $address = $_POST['address'];
   $contact = $_POST['contact'];
   $email = $_POST['email'];
   $gender = $_POST['gender'];
   $shift = $_POST['shift'];
   $image = $_FILES['image']['name']; 

   $sql = "INSERT into members(name, age, address, contact, email, gender, shift, image) VALUES('$name','$age','$address','$contact','$email','$gender','$shift','$image')";
   $query = mysqli_query($link, $sql);
   move_uploaded_file($_FILES['image']['tmp_name'], $target);
   if($query){
     echo 1;
   }else{
      echo 0;
   }   
}
//  ********* Update Data to database ***********
if(isset($_POST['uid'])){
   $id = $_POST['uid'];
   $target = "db_images/members/".basename($_FILES['image']['name']);
   $name = $_POST['name'];
   $age = $_POST['age'];
   $address = $_POST['address'];
   $contact = $_POST['contact'];
   $email = $_POST['email'];
   $gender = $_POST['gender'];
   $shift = $_POST['shift'];
   $image = $_FILES['image']['name']; 

   $sql = "UPDATE members SET name = '$name', age = '$age', address = '$address', contact = '$contact', email = '$email', gender = '$gender', shift = '$shift', image = '$image' WHERE id = '$id'";
   $query = mysqli_query($link, $sql);
   move_uploaded_file($_FILES['image']['tmp_name'], $target);
   if($query){
     echo 1;
   }else{
      echo 0;
   }   
}
?>