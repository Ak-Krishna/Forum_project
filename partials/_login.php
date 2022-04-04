<?php
$userexist = false;
$passmatch = false;
include "_dbconnection.php";
if (isset($_POST['loginsubmit'])){
 $log_email = $_POST['login_useremail'];
 $log_password = $_POST['login_userpass'];
 
 $userexistQuery= "SELECT * FROM `users` WHERE `user_email`='$log_email';";
 $resultquery=mysqli_query($conn, $userexistQuery);

 //echo $resultquery;
$row_cnts = mysqli_num_rows($resultquery);
$row=mysqli_fetch_assoc($resultquery);
 if($row_cnts==1){
  if($log_password==$row['user_pass']){
  // session_start();
   $_SESSION['username']=$row['user_name'];
   $_SESSION['loggedin']=true;
  }
  else{
   $passmatch=true;
  }
 }
 else{
 $user_exit=true;
}
}