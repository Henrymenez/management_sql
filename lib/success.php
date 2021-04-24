<?php
$title = 'Succes Page';

require_once("header.php");
if(isset($_GET['name'])&&!empty($_GET['name'])){
    $name =$_GET['name'];
}else{
    header("location:register.php");
}
?>
<div style="margin: auto; width:700px;padding:10px;border: 1px solid #a94442;background:#f2dede;" >
  <p style="font-family:sans-serif;font-style:bold">  WELCOME <b> <?php print @$name;?>  </b> YOUR REGISTRATION WAS SUCCESSFUL, CLICK HERE TO LOGIN. <a href="../login.php" class="btn btn-success">Login</a> </p>
</div>










<?php
require_once("footer.php");
?>