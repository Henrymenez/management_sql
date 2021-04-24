<?php 
require_once("lib/lib.php");
require_once("lib/header.php");
$call->CheckLoggedin("login.php");
$msg = "";

if(isset($_POST['sub'])){
  $email = $_SESSION['logged_in'];
    $coursen = $_POST['coursen'];
    $courset = $_POST['courset'];

        $msg = $call->addcourse($email,$coursen,$courset);

}

?>
 <div class="header">
        <h2>Add Courses</h2>
    </div>
    <form action="" method="post">
    <div><?php print $msg;?> </div>
  <div class="input-group">
  <label>Course Name</label>
  <input type="text" name="coursen" >
</div>
<div class="input-group">
  <label>Course Title</label>
  <input type="text" name="courset" >
</div>
<div class="input-group">
  		<button type="submit" class="btn" name="sub"> Add course</button>
  	</div>
      <div class="nav">
        <a href="all.php" style="font-size: 20px">All Course</a>
         <a href="dashboard.php" style="font-size: 20px">Home</a>
    </div>
   
    </form>

<?php require_once("lib/footer.php");?>