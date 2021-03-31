<!DOCTYPE html>
<?php require_once("config.php");  ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<?php 
if(isset($_POST['signup'])){
    extract($_POST);
    if(strlen($fname)<3){ //min
        $error[]='Enter first name using 3 characters at least';
    }
    if(strlen($fname)>25){  //max
        $error[]="First Name:Max 25 characters are allowed";
    }
    if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/",$fname)){
        $error[]='Invalid Entry for First Name. Please enter letters without any digits or special
        characters or symbols like (1,2,3..,#,%,&,*,!,~,`,^,-)';
    }

    if(strlen($lname)<3){ //min
        $error[]='Enter last name using 3 characters at least';
    }
    if(strlen($lname)>25){  //max
        $error[]="Max 25 characters are allowed";
    }
    if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/",$lname)){
        $error[]='Invalid Entry for Last Name. Please enter letters without any digits or special
        characters or symbols like (1,2,3..,#,%,&,*,!,~,`,^,-)';
    }

    if(strlen($username)<8){ //change minimum length
        $error[]='Username should be at least 8 characters';
    }
    if(strlen($username)>30){ //change minimum length
        $error[]='Max 30 characters are allowed for username';
    }
    if(!preg_match("/^^[^0-9][a-z0-9]+([_-]?[a-z0-9])*$/", $username)){
        $error[] = 'Invalid Entry for Username. Enter lowercase letters without any space 
        and No number at the start- Eg - myusername, okuniqueuser or myusername123';
    }

    if(strlen($email)>30){
        $error[]='Email: Max 30 characters are allowed.';
    }

    if($passwordConfirm==''){
        $error[]='Please comfirm password';
    }
    if($password!=$passwordConfirm){
        $error[]='Passwords do not match';
    }
    if(strlen($password)<8){    //min
        $error[]='password length should be at least 8';
    }
    if(strlen($password)>30){   //max
        $error[]='Password: Max length 30 characters';
    }
    if(strlen($phone)!=10){
        $error[]="Invalid length, Phone number must be of 10 digits.";
    }   

    $sql="select * from users where (username='$username' or email='$email');";
    $res=mysqli_query($dbc,$sql);

    if(mysqli_num_rows($res)>0){
        $row=mysqli_fetch_array($res);

        if($username==$row['username']){
            $error[]='Username already Exists';
        }
        if($email==$row['email']){
            $error[]='Email already Exists';
        }
    }

    if(!isset($error)){
        //convert password to hash code using password_hash() function for better security 
        $date=date('Y-m-d');
        $options=array("cost">=4);
        $password=password_hash($password,PASSWORD_BCRYPT,$options);

        //insert records into users table
        $result=mysqli_query($dbc,"INSERT into users values('','$fname','$lname',
        '$username','$email','$password','$phone','$date')") or die(mysqli_error($dbs));
        
        $user=mysqli_query($dbc,"select * from users where username='$username'");
        if($result=mysqli_fetch_array($user)){
            $userid=$result['id'];
        }
        //get and upload files
        $files=$_FILES["file"];
        $filename=$files['name'];
        $fileerror=$files['error'];
        $filetmp=$files['tmp_name'];
        $fileext=explode('.',$filename);
        $filecheck=strtolower(end($fileext));
        $fileextstored=array('png','jpg','jpeg');
        if(in_array($filecheck,$fileextstored))
        {
            //echo print_r($filename);
            $destinationfile='upload/'.$filename;
            move_uploaded_file($filetmp,$destinationfile);
        }

        // $filename=$_FILES["image"]["name"];
        // $tempname=$_FILES["image"]["tmp_name"];
        // $folder="image/".$filename;
        //$_SESSION['img_path']=$folder;
        //$imageContent=addslashes(file_get_contents($file));
        //insert records into education table
        $result1=mysqli_query($dbc,"INSERT into education values('$userid','$metric_scl','$metric_mark',
            '$degree_clg','$degree_mark','$grad_clg','$grad_mark','$destinationfile')") or die(mysqli_error($dbc));
        
        if($result && $result1){
            //echo "<p style='color:green;text-align:center;''>Registration Successful</p>";
            //move uploaded files
            

            $done=2;
            //header("Location:login.php");
            

        }
        else{
            $error[]="Failed Something went wrong";
        } 
    }
}
?>
    <div class="container">
        <!-- <div class="row">
        
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
            
            </div>
            <div class="col-sm-4">
            </div>
        </div> 
        row end -->

        <div class="row">


            <div class="col-sm-3">
            
            </div>
            <div class="col-sm-6">
                <?php if(isset($done)){  ?>
                    <div class="successmsg"><span style="font-size:100px;">&#9989;</span><br>
                    You have registered successfully.<br><a href="login.php" style="color:rgb(0, 0, 0);font-size: 20px;">Login Here</a>
                </div>
                <?php } else{ ?>

                <div class="signup_form">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <img src="logo.png" alt="Nettantra Technologies" class="logo img-fluid">
                        <h4>Personal Details:</h4>
                        <div class="form-group">
                            <label for="fname" class="label_txt">First Name</label>
                            <input type="text" name="fname" id="fname" value="<?php if(isset($error)){echo $fname;}  ?>" class="form-control" required="">
                            <span id="fnameError"></span>
                        </div>

                        <div class="form-group">
                            <label for="lname" class="label_txt">Last Name</label>
                            <input type="text" name="lname" id="lname" value="<?php if(isset($error)){echo $lname;}  ?>" class="form-control" required="">
                            <span id="lnameError"></span>
                        </div>

                        <div class="form-group">
                            <label for="username" class="label_txt">Username</label>
                            <input type="text" name="username" id="username" value="<?php if(isset($error)){echo $username;}  ?>" class="form-control" required="">
                            <span id="usernameError"></span>
                        </div>

                        <div class="form-group">
                            <label for="email" class="label_txt">Email</label>
                            <input type="email" name="email" id="email" value="<?php if(isset($error)){echo $email;}  ?>" class="form-control" required="">
                            <span id="emailError"></span>
                        </div>

                        <div class="form-group">
                            <label for="password" class="label_txt">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required="">
                            <span id="passwordError"></span>
                        </div>

                        <div class="form-group">
                            <label for="passwordConfirm" class="label_txt">Confirm Password</label>
                            <input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control" required="">
                            <span id="passwordConfirmError"></span>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="label_txt">Phone Number</label>
                            <input type="text" name="phone" id="phone" class="form-control" required="">
                            <span id="phoneError"></span>
                        </div>

                        <h4>Educational Details:</h4>

                        <div class="form-group">
                            <label for="metric_scl" class="label_txt">Metric School</label>
                            <input type="text" name="metric_scl" id="metric_scl" value="<?php if(isset($error)){echo $metric_scl;}  ?>" class="form-control" required="">
                            <span id="metric_sclError"></span>
                        </div>

                        <div class="form-group">
                            <label for="metric_mark" class="label_txt">Metric Mark</label>
                            <input type="text" name="metric_mark" id="metric_mark" value="<?php if(isset($error)){echo $metric_mark;}  ?>" class="form-control" required="">
                            <span id="metric_markError"></span>
                        </div>

                        <div class="form-group">
                            <label for="degree_clg" class="label_txt">Degree College</label>
                            <input type="text" name="degree_clg" id="degree_clg" value="<?php if(isset($error)){echo $degree_clg;}  ?>" class="form-control" required="">
                            <span id="usernameError"></span>
                        </div>

                        <div class="form-group">
                            <label for="degree_mark" class="label_txt">Degree Mark</label>
                            <input type="text" name="degree_mark" id="degree_mark" value="<?php if(isset($error)){echo $degree_mark;}  ?>" class="form-control" required="">
                            <span id="emailError"></span>
                        </div>

                        <div class="form-group">
                            <label for="grad_clg" class="grad_clg">Graduation College</label>
                            <input type="text" name="grad_clg" id="grad_clg" value="<?php if(isset($error)){echo $grad_clg;}  ?>" class="form-control" required="">
                            <span id="passwordError"></span>
                        </div>

                        <div class="form-group">
                            <label for="grad_mark" class="label_txt">Graduation Marks</label>
                            <input type="text" name="grad_mark" id="grad_mark" value="<?php if(isset($error)){echo $grad_mark;}  ?>" class="form-control" required="">
                            <span id="passwordConfirmError"></span>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="label_txt">Profile Photo</label>
                            <input type="file" name="file" id="file" class="form-control" >
                            <span id="phoneError"></span>
                        </div>

                        <input type="submit" name="signup" id="signup" class="btn btn-primary btn-group-lg form-control form_btn" value="Register">
                        <br><br><p>Already have an account?<a href="login.php">Login</a> </p>
                    
                        <?php } ?>
                    </form>
                </div>
            </div>
            <div class="col-sm-3">
            <?php
                if(isset($error)){
                    foreach ($error as $error) {
                       echo '<p class="errmsg">&#x26A0;'.$error.'</p>';
                    }
                }
                ?>
            </div>
            
        </div>
        <!--row end-->

        

    </div>
    <!--container end-->


</body>
</html>