<?php 
require_once("lib/lib.php");
require_once("lib/header.php");

$msg = "";

if(isset($_POST['sub'])){
    $username = $_POST['email'];
    $pass = $_POST['pass'];  
  
    if(!empty($username)&&!empty($pass)){
        $msg = $call->login($username,$pass);
    }else{
        $msg = 'Please  Fill Fields';
    }
   
}


?>  


<div class="header">
  	<h2>Login</h2>
  </div>
	
     
  <form method="post" >
  <div><?php print $msg;?> </div>
  	<div class="input-group">
  		<label>Email</label>
  		<input type="email" name="email" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="pass">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="sub">  Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
      <br>
      <p> <a href="forgot.php">Forgot Password</a></p>
  </form>

  <?php require_once("lib/footer.php");?>