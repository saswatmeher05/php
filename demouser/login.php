<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
    <div class="row">
        <div class="col-sm-3">

        </div>
        <div class="col-sm-6">
            <div class="login_form">
                <img src="logo.png" alt="Nettantra Technologies"class="logo img-fluid">

                <?php 
                if(isset($_GET['loginerror'])) {
                    $loginerror=$_GET['loginerror'];
                } 
                if(!empty($loginerror)){
                    echo '<p class="errmsg" style="color:red;">Invalid Username or Password, Try Again.</p>' ;
                }
                ?>

            <form action="login_process.php" method="POST">
                <div class="form-group">
                  <label for="login_var" class="label_txt  font-weight-bold">Username</label>
                  <input type="text" class="form-control" 
                  value="<?php if(!empty($loginerror)){ echo $loginerror; } ?>"
                  name="login_var" id="login_var" aria-describedby="emailHelp" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="password" class="label_txt  font-weight-bold">Password</label>
                  <input type="password" class="form-control" name="password" id="password" autocomplete="off">
                </div>
                <button type="submit" name="sublogin" class="form_btn btn btn-primary form-control">Login</button>
              </form>
              <p style="font-size: 15px;text-align: center;margin-top: 10px;">
                <a href="forgot-password.php" style="color: blue;">Forgot Password?</a><br>
                <p>Dont have an account?
                    <a href="signup.php" style="color: blue;">Sign Up</a>
                </p>
            </p>

            </div>
            <!--div login form end-->
        </div>

        <div class="col-sm-3">
            
        </div>
    </div>    


</div>
<!--container end-->
</body>

</html>