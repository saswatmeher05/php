<?php
$insert=false;
if(isset($_POST['name'])){
//create connection variables
$servername="localhost";
$username="root";
$password="";

//create connection(procedural method)
$conn=mysqli_connect($servername,$username,$password);

//check connection
if(!$conn){
    die("Connection Failed ".mysqli_connect_error());
}

//echo "Successfully connected to the database";


//create POST variables
$name=$_POST['name'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$other=$_POST['other'];


$sql="INSERT INTO `testwebapp`.`testwebapp` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());" ;

//echo $sql;

//execute query
if($conn->query($sql)==true){
    //echo "Data inserted successfully click below link to go back to form page:";
    //echo "<a href='index.php'>Home</a>";
    $insert=true;
}
else{
    echo "Error  $sql <br> $conn->error";
}

//close connection
$conn->close();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <link rel="stylesheet" href="style.css" class="css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
</head>
<body>
    <img src="bg.jpg" class="bg" alt="BG">
    <div class="container">
        
        
            <h1>Welcome to Registration page</h1>
            
            <form action="index.php" method="post">
            
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" placeholder="Enter your email">
            <input type="text" name="phone" placeholder="Enter your phone number">
            <textarea name="other" id="other" rows="15" cols="30"></textarea>

            <button class="btn">Submit</button>



        </form>

        <?php  
            
            if($insert==true){
            echo "<span id='message'>Thanks for submitting your details</span>";
            }
            ?>
        
    </div>

    <script src="index.js"></script>
    
</body>
</html>