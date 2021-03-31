<!DOCTYPE html>
<?php require_once("config.php");

if(!isset($_SESSION["login_sess"])) 
{
    header("location:login.php"); 
}
if(isset($_SESSION["login_email"]))
{
  //$email=$_SESSION["login_email"];
  $uid=$_SESSION["login_id"];
  $qry="select * from users where id=$uid";
  $findresult = mysqli_query($dbc,$qry) or die(mysqli_error($dbs));;
  //$_SESSION["login_email"];
  $res = mysqli_fetch_array($findresult);
  //echo "somwthing is wrong";
$_SESSION['user']=$res['id'];

$username = $res['username']; 
$fname = $res['fname'];   
$lname = $res['lname'];  
$email = $res['email'];  
$datecreated=$res['date'];
$phone=$res['phone'];

}
?> 


<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
      .logo{
        width: 90px;
        height: 60px;
        border-radius: 15px;
      }
      .box{
        background: whitesmoke;
        box-shadow: 5px 5px 5px rgb(173, 173, 173);
        border-radius: 10px;
      }
      .container{
        width:auto;
        height: auto;
      }

      .btn:hover{
        background: rgba(209, 123, 123, 0.883);
      }
      
      
  </style>
</head>
<body>


<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="dashboard_common.php"><img src="logo.png" alt="nettantra" class="logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
  <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white btn font-weight-bold" href="personal.php">Personal Details</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white btn font-weight-bold" href="education.php">Educational Details</a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn btn-danger text-white" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>  
</nav>
<br>

<div class="container">
  
  <h3>Personal Details:</h3>
  
        <div class="container-fluid box">
          <table class="table">
            <tr>
              <tr>
              <th>First Name: </th>
              <td><?php echo $fname; ?></td>  
              </tr> 
  
              <tr>
              <th>Last Name: </th>
              <td><?php echo $lname; ?></td>
              </tr>
  
              <tr>
              <th>Username: </th>
              <td><?php echo $username; ?></td>
              </tr>
  
              <tr>
              <th>Email: </th>
              <td><?php echo $email; ?></td>
              </tr>
  
              <tr>
              <th>Account Creation Date: </th>
              <td><?php echo $datecreated; ?></td>
              </tr>

              <tr>
                <th>Phone Number: </th>
                <td><?php echo $phone; ?></td>
                
                </tr>

                <tr>
                  <td colspan="2">
                  <a href="edit.php?id=<?php echo $uid;?>"> <button class="btn btn-dark form-control">Edit</button> </a> 
                  </td>
                  
                </tr>
                
                

            </table>
            
    

        </div>


          
</div>

</body>
</html>


