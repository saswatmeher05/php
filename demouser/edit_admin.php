                    <?php 
                        include 'config.php';
                        
                        $id_admin=1;          //$_GET['id'];
                        $showquery="select * from users where id=1";
                            $showdata=mysqli_query($dbc,$showquery);
                            $arrdata=mysqli_fetch_array($showdata);
                        

                        if(isset($_POST['update'])){
                            $idupdate=1;         //$_GET['id'];
                            $fname=$_POST['fname'];
                            $lname=$_POST['lname'];
                            $email=$_POST['email'];
                            $phone=$_POST['phone'];
                            // $metric_scl=$_POST['metric_scl'];
                            // $metric_mark=$_POST['metric_mark'];
                            // $degree_clg=$_POST['degree_clg'];
                            // $degree_mark=$_POST['degree_mark'];
                            // $grad_clg=$_POST['grad_clg'];
                            // $grad_mark=$_POST['grad_mark'];
                            // $file=$_FILES["image"]["name"];
                            // $imageContent=addslashes(file_get_contents($image));
                            // move_uploaded_file($_FILES['image']['tmp_name'], "$file");
                            
                            $query="update users set fname='$fname',lname='$lname',email='$email',phone='$phone' where id=$idupdate";

                            $res=mysqli_query($dbc,$query);
                            
                            if($res){
                                ?>
                                <script>
                                    alert("Data Updated Successfully");
                                    <?php header("location:dashboard.php"); ?>
                                </script>
                                <?php 
                            }else{
                                ?>
                                <script>
                                    alert("Data Not Updated");
                                </script>
                                <?php 
                            }
                        }
                    ?>




<!DOCTYPE html>
<?php require_once("config.php");  ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Page</title>
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
                

                <div class="signup_form">
                    <form action="" method="POST" enctype="multipart/form-data">

                    

                        <img src="logo.png" alt="Nettantra Technologies" class="logo img-fluid">
                        <h4>Personal Details:</h4>
                        <div class="form-group">
                            <label for="fname" class="label_txt">First Name</label>
                            <input type="text" name="fname" id="fname" value="<?php echo $arrdata['fname'];  ?>" class="form-control" required="">
                            <span id="fnameError"></span>
                        </div>

                        <div class="form-group">
                            <label for="lname" class="label_txt">Last Name</label>
                            <input type="text" name="lname" id="lname" value="<?php echo $arrdata['lname'];  ?>" class="form-control" required="">
                            <span id="lnameError"></span>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="label_txt">Email</label>
                            <input type="text" name="email" id="email" value="<?php echo $arrdata['email'];  ?>" class="form-control" required="">
                            <span id="phoneError"></span>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="label_txt">Phone Number</label>
                            <input type="text" name="phone" id="phone" value="<?php echo $arrdata['phone'];  ?>" class="form-control" required="">
                            <span id="phoneError"></span>
                        </div>

                        <!-- <div class="form-group">
                            <label for="phone" class="label_txt">Profile Photo</label>
                            <input type="file" name="image" id="image" class="form-control" >
                            <span id="phoneError"></span>
                        </div> -->

                        <button type="submit" name="update" id="update" class="btn btn-primary btn-group-lg form-control form_btn">Update</button>
                        <br><br>
                    
                        <?php //} ?>
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