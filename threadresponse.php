<?php
session_start();
$threadactive = false;
if (isset($_SESSION['loggedin']) && ($_SESSION['loggedin']) == true) {
 $threadactive = true;
} else {
 $threadactivea = false;
}
?>
<!doctype html>
<html lang="en">

<head>
 <!-- Required meta tags -->
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">

 <!-- Bootstrap CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

 <title>welcome to iforum</title>
 <link rel="stylesheet" href="./partials/style.css">
</head>
<?php include "modals.php"; ?>

<body>
 <?php include "./partials/_header.php"; ?>
 <!-- query for thread table discription and display forum -->
 <?php
 $id = $_GET['question_id'];
 $fetchcomment = "SELECT * FROM `thread_questions` WHERE `question_id`='$id'";
 $result = mysqli_query($conn, $fetchcomment);
 $commentData = mysqli_fetch_assoc($result);
 echo '<div class="container my-3 text-dark bgcolor">
        <div class="card mx-0" style="width:100% ;">
            <div class="card-body">
                <h2 class="card-title py-2">Your Result For : ' . $commentData['question_title'] . '</h2>
                <p class="card-text">' . $commentData['question_desc'] . '<p>
                <h6 class="card-subtitle mb-2 text-muted">Posted By : '  . $commentData['user_id'] .'</h6>
                <hr class="my-4">
                <h4>Rules and regulation you have to follow :</h4>
                <ul class="my-4">
                <li>No Spam / Advertising / Self-promote in the forums. ...</li>
               <li> Do not post “offensive” posts, links or images. ...</li>
               <li> Do not cross post questions. ...</li>
               <li> Do not PM users asking for help. ...</li>
               <li> Do not post copyright-infringing material. ...</li>
               <li> Remain respectful of other members at all times.</li>
                </ul>
                <a href="#" class="btn btn-danger">Go somewhere</a>
            </div>
        </div>
    </div>';
 ?>
 <!-- sections for user doubts and questions -->
 <?php
 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  // displaying form group 
  echo '<div class="container form-group">
            <h1 class="py-2">Post a Comment</h1> 
            <form action="/forum_project/threadresponse.php?question_id='.$_GET['question_id'].'" method="post">
                <div class="form-group form-group">
                   <h6> <label for="exampleFormControlTextarea1">Ellaborate Your Concern</label></h6>
                    <textarea class="form-control" id="desc" name="comment_content" rows="3" required></textarea>
                </div>
                <button type="submit"name="comment_submit" class="btn btn-success my-2">Submit</button>
            </form>
        </div>';
 } else {
  echo '
        <div class="container form-group">
        <h1 class="py-2"></h1> 
           <p class="lead">You are not logged in. Please login <a href=""data-bs-toggle="modal" data-bs-target="#loginmodal">here</a> to start a Discussion</p>
        </div>
        ';
 }
 // query for inserting data in thread questions table 
 if (isset($_POST['comment_submit'])) {
  $question_id = $_GET['question_id'];
  $comment = $_POST['comment_content'];
  $comment_user = $_SESSION['username'];

  $comment = str_replace("<", "&lt;", $comment);
  $comment = str_replace(">", "&gt;", $comment);

  $insertCommentData = "INSERT INTO `thread_comments`(`thread_comment`, `thread_ques_id`, `thread_user`) VALUES ('$comment','$question_id','$comment_user')";
  // "INSERT INTO `thread_comments`(`thread_comment`, `thread_ques_id`, `thread_user`) VALUES('$comment','$question_id','$user');";
  $insert_comment = mysqli_query($conn, $insertCommentData);
 }
 ?>
 <div class="container my-4" id="ques">
  <h1>Browse Comments</h1>
  <?php
  $comment_id = $_GET['question_id'];
  $fetchdata = "SELECT * FROM `thread_comments` WHERE `thread_ques_id`='$comment_id';";
  $fetchResult = mysqli_query($conn, $fetchdata);
  $no_cnt=mysqli_num_rows($fetchResult);
  if($no_cnt>0){
  while ($row = mysqli_fetch_assoc($fetchResult)) {
   echo '<div class="media ">
                    <img src="./images/user.png" width="53px" class="my-3 img" alt="">
                     <div class="media-body my-2">
                     <h6 class="my-0"><p>posted by: ' . $row['thread_user'] . ' at ' . $row['datetime'] . '</p></h6>
                     <h5 class="mt-0 my-0">' . $row['thread_comment'] . '</h5>
                    </div>
            </div>';
  }
 }
 else{
   echo '<div class="container my-3 text-dark bgcolor">
        <div class="card mx-0" style="width:100% ;">
            <div class="card-body">
            <div class="container">
                        <p class="display-4">No Comment Found</p>
                        <p class="lead"> Be the first person to add a comment</p>
                    </div>
            </div>
        </div>
    </div>';
 }
  ?>
 </div>
 <?php include "./partials/_footer.php"
 ?>


 <!-- Optional JavaScript; choose one of the two! -->

 <!-- Option 1: Bootstrap Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

 <!-- Option 2: Separate Popper and Bootstrap JS -->
 <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>