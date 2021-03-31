<!DOCTYPE html>
<?php require_once("config.php");

if($_SESSION["login_id"]==1 || $_SESSION["login_id"]==2){
  if(!isset($_SESSION["login_sess"])) 
  {
      header("location:login.php"); 
  }
    $name=$_SESSION["login_name"];
    $findresult = mysqli_query($dbc, "SELECT * FROM users");
  if($res = mysqli_fetch_array($findresult))
  {
  
  $selectquery=" select * from users ";
  $query=mysqli_query($dbc,$selectquery);
  $nums=mysqli_num_rows($query);
  //echo $nums;
  //$resultall=mysqli_fetch_array($query);
  // while($resall=mysqli_fetch_array($query)) {
  //   echo $resall['fname']."<br>";
  // }
  
  
  
  // $username = $res['username'];
  // $_SESSION["user_name"]=$username; 
  //$fname = $res['fname'];   
  // $lname = $res['lname'];  
  // $email = $res['email'];  
  // $datecreated=$res['date'];
  // $phone=$res['phone'];
  
  }

}
else{
 header("Location:dashboard_common.php");
}

 ?> 


<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
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
        width: auto;
        height: auto;
      }

      .btn:hover{
        background: rgba(209, 123, 123, 0.883);
      }
      .fa{font-size: 20px;}
      .fa-pencil-square{ color:rgb(55, 194, 0) }
      .fa-trash{ color:red }

    


      
  </style>
</head>
<body>


<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" data-toggle="tooltip" href="dashboard.php" title="Dashboard">
    
  <img src="logo.png" alt="nettantra" class="logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <!-- <li class="nav-item">
        <a class="nav-link" href="personal.php">Personal Details</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="education.php">Educational Details</a>
      </li>
      <li class="nav-item"> -->
        <a class="nav-link btn btn-danger text-white" href="logout.php">
        Logout
      </a>
      </li>
    </ul>
  </div>  
</nav>
<br>

<div class="container">
  
  <h3>List of users registered:</h3>
  
        <div class="container-fluid box">
              <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th colspan="2">Operation</th>
                      </tr>
                    </thead>
                    <tbody class="bg-white rounded">
                      <?php 
                      
                      while($resall=mysqli_fetch_array($query)) {
                        //echo $resall['fname']."<br>";
                      ?>

                      <tr>
                        <td><?php echo $resall['id']; ?></td>
                        <td><?php echo $resall['fname']." ".$resall['lname']; ?></td>
                        <td><?php echo $resall['email']; ?></td>
                        <td><?php echo $resall['phone']; ?></td>
                        
                        <td>
                        <a href="edit.php?id=<?php echo $resall['id'] ?>" data-toggle="tooltip" title="Edit" data-placement="left">
                          <i class="fa fa-pencil-square" aria-hidden="true"></i>
                          </a>
                        </td>
                        <td>
                          <a href="delete.php?id=<?php echo $resall['id'] ?>" data-toggle="tooltip" title="Delete" data-placement="left">
                          <i class="fa fa-trash" aria-hidden="true"></i>
                          </a>
                        </td>
                      </tr>
                      <?php
                    }
                    ?>
                    </tbody>
                </table>
              </div>
        </div>
</div><!--main container end-->

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
</body>
</html>


