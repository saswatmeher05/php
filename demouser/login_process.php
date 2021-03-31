<?php 
require_once("config.php"); 
if(isset($_POST['sublogin'])){ 
$login = $_POST['login_var'];
$password = $_POST['password'];
$query = "select * from users where (username='$login' OR email='$login')";

$res = mysqli_query($dbc,$query);
$numRows = mysqli_num_rows($res);
// $arruser=mysqli_fetch_array($res);

if($numRows  == 1){

        $row = mysqli_fetch_assoc($res);
        //verify password with hashcode
        if(password_verify($password,$row['password'])){

          if($row['username']=='admin'){
            $_SESSION["login_sess"]="1"; 
           $_SESSION["login_id"]=$row['id'];
             $_SESSION["login_name"]= $row['username'];
             $_SESSION["login_email"]= $row['email'];
              header("location:dashboard.php");
          }else{
            $_SESSION["login_sess"]="1"; 
           $_SESSION["login_id"]=$row['id'];
             $_SESSION["login_name"]= $row['username'];
             $_SESSION["login_email"]= $row['email'];
              header("location:dashboard_common.php");
          }
        }

        //---------------------------------------------------------
          //verify password without hashcode
          else if($password==$row['password']){

            if($row['username']=='admin' || $row['username']=='admin1' ){
              $_SESSION["login_sess"]="1"; 
             $_SESSION["login_id"]=$row['id'];
               $_SESSION["login_name"]= $row['username'];
               $_SESSION["login_email"]= $row['email'];
                header("location:dashboard.php");
            }else{
              $_SESSION["login_sess"]="1"; 
             $_SESSION["login_id"]=$row['id'];
               $_SESSION["login_name"]= $row['username'];
               $_SESSION["login_email"]= $row['email'];
                header("location:dashboard_common.php");
            }
          }
          //---------------------------------------------------------

        else{ 
     header("location:login.php?loginerror=".$login);
        }
    }
    else{
  header("location:login.php?loginerror=".$login);
    }
}
?>