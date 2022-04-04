<div class="modal fade" id="signupmodal" tabindex="-1" aria-labelledby="signupmodalLabel" aria-hidden="true">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h5 class="modal-title" id="signupmodalLabel">Signup Section</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
   <div class="modal-body">
    <form action="/forum_project/" method="POST">
     <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="username" aria-describedby="emailHelp">
     </div>
     <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" id="email" name="useremail" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
     </div>
     <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" name="userpass" id="exampleInputPassword1">
     </div>
     <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
      <input type="password" class="form-control" name="usercpass" id="exampleInputPassword1">
     </div>

     <button type="submit" name="submit" class="btn btn-primary">Signup</button>
    </form>
   </div>
  </div>
 </div>
</div>
<!--login Modal for user data -->
<div class="modal fade" id="loginmodal" tabindex="-1" aria-labelledby="loginmodalLabel" aria-hidden="true">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h5 class="modal-title" id="loginmodalLabel">Login Section</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
   <div class="modal-body">
    <form action="/forum_project/" method="POST">
     <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" id="email" name="login_useremail" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
     </div>
     <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" name="login_userpass" id="exampleInputPassword1">
     </div>
     <button type="submit" name="loginsubmit" class="btn btn-primary">Login</button>
    </form>
   </div>
  </div>
 </div>
</div>