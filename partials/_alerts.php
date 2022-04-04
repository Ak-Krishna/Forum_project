<?php
if ($useralert) {
 echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
 <strong>Error !</strong> user with this email is already exists kindly login <a data-bs-toggle="modal" data-bs-target="#loginmodal" href=""> here</a>.
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
} elseif ($passalert) {
 echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
 <strong>Error !</strong> Password Mismatch Try Again.
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
} elseif ($passmatch || $userexist) {
 echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
 <strong>Error !</strong> Invalid Username and Password ,please signup first.
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
} else {
 echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
 <strong>Success !</strong> Your Account Is Created Successfully Please ,You Can Login Now.
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
