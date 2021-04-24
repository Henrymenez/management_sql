<?php 
require_once("lib/lib.php");
require_once("lib/header.php");
$call->CheckLoggedin("login.php");

?>
    <div class="header">
        <h2>Welcome to Controla Dashboard <?php echo $_SESSION['logged_in'];?></h2>
    </div>
    <div class="nav">
        <a href="add.php">Add Course</a>
    </div>
    <div class="nav">
        <a href="all.php">All Course</a>
    </div>
    <div class="nav">
        <a href="logout.php">Logout</a>
    </div> 
    
     <?php require_once("lib/footer.php");?>