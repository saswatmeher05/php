<!DOCTYPE html>

<?php require_once("config.php");
if(!isset($_SESSION["login_sess"])) 
{
    header("location:login.php"); 
}
if(isset($_SESSION['login_id']))
{
  //$email=$_SESSION["login_email"];
  $id=$_SESSION["login_id"];
  $findresult = mysqli_query($dbc, "SELECT * FROM education WHERE user_id= '$id'") or die(mysqli_error($dbs));
  $res=mysqli_fetch_array($findresult);

  
  $metric_scl=$res['metric_scl'];
  $metric_mark=$res['metric_mark'];
  $degree_clg=$res['degree_clg'];
  $degree_mark=$res['degree_mark'];
  $grad_clg=$res['grad_clg'];
  $grad_mark=$res['grad_mark'];
  $photo=$res['photo'];
  

// $_SESSION['user']=$res['id'];

// $username = $res['username']; 
// $fname = $res['fname'];   
// $lname = $res['lname'];  
// $email = $res['email'];  
// $datecreated=$res['date'];
// $phone=$res['phone'];

}
 ?> 


<html lang="en">
<head>
  <title>Educational Details</title>
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
  <!-- <p> Welcome! <span style="color:#009900">
  <?php// echo $fname; ?> 
  </span> </p> -->
  <h3>Educational Details:</h3>
  <div class="container-fluid box">
              
            <table class="table ">
            
              <tbody><tr>
              <th>Metric School Name </th>
              <td><?php echo $metric_scl; ?></td>  
              </tr> 
  
              <tr>
              <th>Metric Mark </th>
              <td><?php echo $metric_mark; ?></td>
              </tr>
  
              <tr>
              <th>Degree College Name</th>
              <td><?php echo $degree_clg; ?></td>
              </tr>
  
              <tr>
              <th>Degree Mark </th>
              <td><?php echo $degree_mark; ?></td>
              </tr>
  
              <tr>
              <th>Graduation College Name: </th>
              <td><?php echo $grad_clg; ?></td>
              </tr>

              <tr>
                <th>Graduation Mark</th>
                <td><?php echo $grad_mark; ?></td>
                
               </tr>
               <tr>
                 <th>Photo</th>
                <td>
                  <img src="<?php echo $photo; ?>" alt="Profile Photo" height="120px" width="90px">
                
                </td>
                </tr>

                <tr>
                  <td colspan="2">
                  <a href="edit.php?id=<?php echo $id;?>"> <button class="btn btn-dark form-control">Edit</button> </a> 
                  </td>
                  
                </tr>

                
                

            </tbody>
          </table>
            
    

        </div>


          
</div>

</body>
</html>


