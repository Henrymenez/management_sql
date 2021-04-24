<?php 
require_once("lib/lib.php");
require_once("lib/header.php");

$msg = "";


if(isset($_POST['sub'])){
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $dob = $_POST['date'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    $msg = $call->register($fullname,$username,$email,$dob,$pass,$cpass);
}
?>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post">
  <div><?php print $msg;?> </div>
  
  <div class="input-group">
  
  	  <label>Fullname</label>
  	  <input type="text" name="fullname" value="">
  	</div>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="pass">
  	</div>
      <div class="input-group">
  	  <label>Confirm Password</label>
  	  <input type="password" name="cpass">
  	</div>
      <div>
      <label >Date Of Birth</label> 
      <input type="date" name="date">
      </div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="sub">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
<?php require_once("lib/footer.php");?>