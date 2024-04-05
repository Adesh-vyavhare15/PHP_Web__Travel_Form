<?php
$insert = false;
if(isset ($_POST['name'])){
    $server = "localhost";

    $username = "root";
    
    $password = "adesh@123";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection is not established".mysqli_connect_error());
    }
    
        // echo "Success connecting to the db";


    $name=$_POST["name"];
    $age=$_POST["age"];
    $gender=$_POST["gender"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $desc=$_POST["desc"];

    $sql="INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
    VALUES ('$name', '$age', '$gender', '$email', '$phone', 
    '$desc', current_timestamp());";
    
    
    if($con->query($sql) == true){
        // echo "Successfully inserted";}

        $insert=true;
    }
    else{
        echo "Error:$sql <br> $con->error";
    }
    $con->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your's Travel Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- <img class="imgg" src="travel1.jpg" alt="travel"> -->
    <video autoplay loop muted src="https://media.istockphoto.com/id/1480281718/video/4k-aerial-view-day-to-night-hyper-lapse-footage-of-central-business-district-of-melbourne.mp4?s=mp4-640x640-is&k=20&c=VUx-YRnDUkTBCl58lsHg_u_Bis77LsndiT3fj5ImObw="></video>
    <div class="container">
        <h1>Welcome to Adesh's Travel Form</h1>
        <p>Enter Your Details As Per Requirement And Submit This Form.</p>
        <?php
            if($insert == true){
                echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
            }
        ?>
        <form action="index.php" method="post">
            
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="number" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="text" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter Your Informative Feedback."></textarea>
            <button class="btn"  >Submit</button>
        
            
        </form>
        
    </div>
    <script src="index.js" ></script>
    <!--  -->
</body>
</html>