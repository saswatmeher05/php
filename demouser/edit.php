   <?php
   include 'config.php';
   $id = $_GET['id'];
   if ($id == 1) {
       header("Location:edit_admin.php");
   } else {
       $showquery = "select u.id,u.fname,u.lname,u.email,u.phone,e.metric_scl,e.metric_mark,
   e.degree_clg,e.degree_mark,e.grad_clg,e.grad_mark from users u inner join 
   education e on u.id=e.user_id where u.id=$id";
       $showdata = mysqli_query($dbc, $showquery);
       $arrdata = mysqli_fetch_array($showdata);
       if (isset($_POST['update'])) {
           $idupdate = $_GET['id'];
           $fname = $_POST['fname'];
           $lname = $_POST['lname'];
           $email = $_POST['email'];
           $phone = $_POST['phone'];
           $metric_scl = $_POST['metric_scl'];
           $metric_mark = $_POST['metric_mark'];
           $degree_clg = $_POST['degree_clg'];
           $degree_mark = $_POST['degree_mark'];
           $grad_clg = $_POST['grad_clg'];
           $grad_mark = $_POST['grad_mark'];
           // $file=$_FILES["image"]["name"];
           // $imageContent=addslashes(file_get_contents($image));
           // move_uploaded_file($_FILES['image']['tmp_name'], "$file");
           $query = "update education inner join users on education.user_id=users.id set 
       users.fname='$fname',users.lname='$lname',users.email='$email',users.phone='$phone',
       education.metric_scl='$metric_scl',education.metric_mark=$metric_mark,
       education.degree_clg='$degree_clg',education.degree_mark=$degree_mark,
       education.grad_clg='$grad_clg',education.grad_mark=$grad_mark where users.id=$idupdate";
           $res = mysqli_query($dbc, $query);
           if ($res) {
   ?>
               <script>
                   alert("Data Updated Successfully");
                   <?php header("location:dashboard_common.php"); ?>
               </script>
           <?php
           } else {
           ?>
               <script>
                   alert("Data Not Updated");
               </script>
   <?php
           }
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
                               <label for="phone" class="label_txt">Phone Number</label>
                               <input type="text" name="phone" id="phone" value="<?php echo $arrdata['phone'];  ?>" class="form-control" required="">
                               <span id="phoneError"></span>
                           </div>
                           <div class="form-group">
                               <label for="phone" class="label_txt">Email</label>
                               <input type="text" name="email" id="email" value="<?php echo $arrdata['email'];  ?>" class="form-control" required="">
                               <span id="phoneError"></span>
                           </div>
                           <h4>Educational Details:</h4>
                           <div class="form-group">
                               <label for="metric_scl" class="label_txt">Metric School</label>
                               <input type="text" name="metric_scl" id="metric_scl" value="<?php echo $arrdata['metric_scl'];  ?>" class="form-control" required="">
                               <span id="metric_sclError"></span>
                           </div>
                           <div class="form-group">
                               <label for="metric_mark" class="label_txt">Metric Mark</label>
                               <input type="text" name="metric_mark" id="metric_mark" value="<?php echo $arrdata['metric_mark'];  ?>" class="form-control" required="">
                               <span id="metric_markError"></span>
                           </div>
                           <div class="form-group">
                               <label for="degree_clg" class="label_txt">Degree College</label>
                               <input type="text" name="degree_clg" id="degree_clg" value="<?php echo $arrdata['degree_clg'];  ?>" class="form-control" required="">
                               <span id="usernameError"></span>
                           </div>
                           <div class="form-group">
                               <label for="degree_mark" class="label_txt">Degree Mark</label>
                               <input type="text" name="degree_mark" id="degree_mark" value="<?php echo $arrdata['degree_mark'];  ?>" class="form-control" required="">
                               <span id="emailError"></span>
                           </div>
                           <div class="form-group">
                               <label for="grad_clg" class="grad_clg">Graduation College</label>
                               <input type="text" name="grad_clg" id="grad_clg" value="<?php echo $arrdata['grad_clg'];  ?>" class="form-control" required="">
                               <span id="passwordError"></span>
                           </div>
                           <div class="form-group">
                               <label for="grad_mark" class="label_txt">Graduation Marks</label>
                               <input type="text" name="grad_mark" id="grad_mark" value="<?php echo $arrdata['grad_mark'];  ?>" class="form-control" required="">
                               <span id="passwordConfirmError"></span>
                           </div>
                           <!-- <div class="form-group">
       <label for="phone" class="label_txt">Profile Photo</label>
       <input type="file" name="image" id="image" class="form-control" >
       <span id="phoneError"></span>
   </div> -->
                           <button type="submit" name="update" id="update" class="btn btn-primary btn-group-lg form-control form_btn">Update</button>
                           <br><br>
                           <?php //} 
                           ?>
                       </form>
                   </div>
               </div>
               <div class="col-sm-3">
                   <?php
                   if (isset($error)) {
                       foreach ($error as $error) {
                           echo '<p class="errmsg">&#x26A0;' . $error . '</p>';
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