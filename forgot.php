<?php
require_once("lib/lib.php");
require_once("lib/header.php");
$msg = "";

if(isset($_POST['sub'])){
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$cpass = $_POST['cpass'];

	if(!empty($email)&&!empty($pass)&&!empty($cpass)){
		$msg = $call->resetPassword($email , $pass , $cpass);
	}else{ 
		$msg = "Please Fill All fields!!!";
	}
}
?>

<div class="header">
  	<h2>Forget Password</h2>
  </div>
	
     
  <form method="post">
  <div> <?php echo $msg;?></div>
  	<div class="input-group">
  		<label>Email</label>
  		<input type="email" name="email" >
  	</div>
	  <div class="input-group">
  		<label>New Password</label>
  		<input type="password" name="pass" >
  	</div>
	  <div class="input-group">
  		<label>Confirm Pasword</label>
  		<input type="password" name="cpass" >
  	</div>
  
      <p> <button style="width: 100%;padding:10px" name="sub">Submit</button> <br>
	  <button style="width: 100%;margin-top:10px; height:50px" name="sub"><a href="index.php">Home</a></button></p>
  </form>
<?php require_once("lib/footer.php");?>