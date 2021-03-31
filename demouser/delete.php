<?php 
include 'config.php';
$id=$_GET['id'];
if($_SESSION["login_id"]==1){
$deletequery="delete users,education from users inner join education on education.user_id=users.id where users.id=$id";
$query=mysqli_query($dbc,$deletequery);

header("Location:dashboard.php");
}
else{
    header("Location:dashboard_common.php");
}
?>
