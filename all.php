<?php 
require_once("lib/lib.php");
require_once("lib/header.php");
$call->CheckLoggedin("login.php");
$msg = "";

$email = $_SESSION['logged_in'];

if(isset($_GET['courseid'])&&!empty($_GET['courseid'])){
    $courseid = $_GET['courseid'];
    $msg = $call->deleteCourse($courseid);
  }
?>
<br> <br>
<table border="1" style="width:80%; margin:auto" >
<thead>
            <tr>
            <th>ID</th>
            <th>Course Name</th>
            <th>Course Title</th>
            <th>Unit Load</th>
            <th>Edit</th>
            <th>Delete</th>
            </tr>
</thead>
<tbody>
<?php $sql = $call->sql_query("SELECT * FROM $course_tb WHERE `email`='".$email."' ");  
                if(mysqli_num_rows($sql)>0){ 
                    $i = 1;
                    while($row = mysqli_fetch_assoc($sql)){ ?>
        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['title'];?></td>
            <td><?php echo $row['unit'];?></td>
            <td><button style="width: 100%;cursor:pointer"><a href="editc.php?courseid=<?php echo $row['id'];?>"> Edit</a></button></td>
            <td><button style="width: 100%;cursor:pointer"><a href="all.php?courseid=<?php echo $row['id'];?>"> Delete</a> </button></td>
        </tr>



<?php $i++;}
    }else{?>
    <tr>  <td colspan="7"> No Record Found</td> </tr>
    <?php }?>

</tbody>
</table>
<div class="nav"> <bUtton style="font-size:large;background:brown;padding:20px;width:100%"><a href="dashboard.php" style="color:white;">Home</a></bUtton></div>
<?php require_once("lib/footer.php");?>