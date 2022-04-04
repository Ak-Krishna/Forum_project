<?php
$useralert = false;
$passalert = false;
include "_dbconnection.php";
if (isset($_POST['submit'])){
 $name = $_POST['username'];
 $email = $_POST['useremail'];
 $password = $_POST['userpass'];
 $cpassword = $_POST['usercpass'];
 
 $userdata= "SELECT * FROM `users` WHERE `user_email`='$email';";
 $resultquery=mysqli_query($conn,$userdata);

 //echo $resultquery;
$row_cnt = mysqli_num_rows($resultquery);
$useralert=false;
 if($row_cnt>0){
  $useralert=true;
 }
 else{
 $passalert=false;
 if($password==$cpassword){
  $sql = "INSERT INTO `users`(`user_name`,`user_email`,`user_pass`)values('$name','$email','$password');";
  $result = mysqli_query($conn, $sql);
 }
 else{
  $passalert=true;
 }
}
}
?>