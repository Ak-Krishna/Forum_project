 <div class="container my-3 text-capitalize">
  <h2 class="text-center">I_Discuss Categories</h2>
  <div class="row mx-5">
   <?php
   include "./partials/_dbconnection.php";
   $fetchdata = "SELECT*FROM `thread_table`";
   $resultquery = mysqli_query($conn, $fetchdata);
   // echo $resultquery;

   while ($row = mysqli_fetch_assoc($resultquery)) {
    $id = $row['threadId'];
    $title = $row['thread_title'];
    $disc = $row['thread_desc'];
    echo '
              <div class="col-md-4 my-2">
                <div class="card" style="width: 17rem;">
                   <img src="./images/' .$id. '.avif" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">'.$title. '</h5>
                    <p class="card-text">' .substr($disc,0,80) . '... <a href="threadlist.php?threadid=' . $id . '">more</a></p>
                    <a href="threadlist.php?threadid='.$id.'" class="btn btn-primary">Go somewhere</a>
                  </div>
                 </div>
             </div>
        ';
   }
   ?>
  </div>
 </div>