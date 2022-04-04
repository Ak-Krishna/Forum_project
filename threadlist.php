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
<!-- query for thread table discription and display  -->
    <?php
    $id = $_GET['threadid'];
    $fetchquery = "SELECT*FROM `thread_table` where `threadId`='$id'";
    $resultQuery = mysqli_query($conn, $fetchquery);
    $tableData = mysqli_fetch_assoc($resultQuery);
    echo '<div class="container my-3 text-dark bgcolor">
        <div class="card mx-0" style="width:100% ;">
            <div class="card-body">
                <h2 class="card-title py-2">Welcome to ' . $tableData['thread_title'] . ' forum</h2>
                <p class="card-text">' . $tableData['thread_desc'] . '<p>
                <h6 class="card-subtitle mb-2 text-muted">Posted By : Kishan Aher</h6>
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
            </div>
        </div>
    </div>';
    ?>
    <!-- sections for user doubts and questions -->
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        // query for inserting data in thread questions table 
      if(isset($_POST['question_submit'])){
          $thread_cat_id=$_GET['threadid'];
          $question_title=$_POST['title'];
          $question_desc=$_POST['desc'];
          $user=$_SESSION['username'];

          $insertdata= "INSERT INTO `thread_questions`(`question_title`, `question_desc`, `question_cat_id`, `user_id`) VALUES('$question_title','$question_desc','$thread_cat_id','$user');";
          $insert_result=mysqli_query($conn,$insertdata);
          
      }

        // displaying form group 
        echo '<div class="container form-group">
            <h1 class="py-2">Start a Discussion</h1> 
            <form action="' . $_SERVER["REQUEST_URI"] . '" method="post">
                <div class="form-group">
                    <h6><label for="exampleInputEmail1">Problem Title</label></h6>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" required>
                    <small id="emailHelp" class="form-text text-muted">Keep your title as short and crisp as
                        possible</small>
                </div>
                <div class="form-group form-group">
                   <h6> <label for="exampleFormControlTextarea1">Ellaborate Your Concern</label></h6>
                    <textarea class="form-control" id="desc" name="desc" rows="3" required></textarea>
                </div>
                <button type="submit"name="question_submit" class="btn btn-success my-2">Submit</button>
            </form>
        </div>';
    } 
    else {
        echo '
        <div class="container form-group">
        <h1 class="py-2">Start a Discussion</h1> 
           <p class="lead">You are not logged in. Please login <a href=""data-bs-toggle="modal" data-bs-target="#loginmodal">here</a> to start a Discussion</p>
        </div>
        ';
    }

    ?>
    <div class="container my-4">
        <h1>Browse Questions</h1>
        <?php
           $thread_id = $_GET['threadid'];
           $fetchdata = "SELECT * FROM `thread_questions` WHERE `question_cat_id`='$thread_id';";
           $fetchResult = mysqli_query($conn, $fetchdata);
           $no_cnt = mysqli_num_rows($fetchResult);
           while($row=mysqli_fetch_assoc($fetchResult)){
           echo '<div class="media my-3">
            <img src="./images/user.png" width="53px" class="mr-3" alt="">
            <div class="media-body m-auto my-2">
                <h5 class="mt-0"><a class="text-dark" href="threadresponse.php?question_id=' . $row['question_id'] . '">'.$row['question_title']. '</a></h5>
               ' . $row['question_desc'] . '
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