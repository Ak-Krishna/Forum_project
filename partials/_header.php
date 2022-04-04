<?php include "_signup.php"; ?>
<?php include "_login.php"; ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
 <div class="container-fluid">
  <a class="navbar-brand" href="/forum_project/">I_Discuss</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
   <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item">
     <a class="nav-link active" aria-current="page" href="/forum_project/">Home</a>
    </li>
    <li class="nav-item">
     <a class="nav-link" href="/forum_project/about.php">About</a>
    </li>
    <li class="nav-item dropdown">
     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      Top Categories
     </a>
     <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
      <?php
      include "_dbconnection.php";
      $fetchdata = "SELECT*FROM `thread_table`";
      $resultquery = mysqli_query($conn, $fetchdata);
      // echo $resultquery;
      while ($row = mysqli_fetch_assoc($resultquery)) {
       $title = $row['thread_title'];
       echo ' <li><a class="dropdown-item" href="/forum_project/threadlist.php?threadid=' . $row['threadId'] . '">' . $title . '</a></li>';
      }
      ?>
     </ul>
    </li>
    <li class="nav-item">
     <a class="nav-link" href="/forum_project/contact.php">Contact Us</a>
    </li>
   </ul>
   <form class="d-flex">
    <?php
    if (isset($_SESSION['loggedin']) && ($_SESSION['loggedin']) == true) {
     $user = substr($_SESSION['username'], 0, 8);
     echo '<input class="form-control me-2 mx-1" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
    <a href="/forum_project/_logout.php"><button type="button" class="btn btn-outline-danger mx-2" >Logout</button></a>';
     echo '<h5 class="text-light m-auto">Hi,' . $user . '</h5>';
    } else {
     echo '<button type="button" class="btn btn-outline-success mx-1" data-bs-toggle="modal" data-bs-target="#loginmodal">Login</button>
    <button type="button" class="btn btn-outline-success"data-bs-toggle="modal" data-bs-target="#signupmodal">Signup</button>';
    }
    ?>
   </form>
  </div>
 </div>
</nav>
<?php include "_alerts.php"; ?>
<script>
 console.log("bloody hell");
 let alert = document.getElementsByClassName('show');
 console.log(alert);
</script>