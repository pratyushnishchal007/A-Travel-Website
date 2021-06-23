<?php
$insert=false;
if(isset($_POST['name'])){

$server="localhost";
$username="root";
$password="";
$database="ustrip";
//Connecting to database
$con=mysqli_connect($server,$username,$password,$database);
if(!$con){
    die("Connection to this database failed due to ".mysqli_connect_error());
}else{
    // echo "Successfully connected to the database";
} 
$name=$_POST["name"];
$age=$_POST["age"];
$gender=$_POST["gender"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$other=$_POST["desc"];

$sql="INSERT INTO `trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";
// echo $sql;
if($con->query($sql)==true){
    // echo "Successfully inserted";
    $insert=true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}

$con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travell Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="image" src="campus-banner.jpg" alt="VIT" height="670px">
    <div class="container">
        <h1>Welcome to Vellore Institute Of Technology US Trip Form</h1><br>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        <?php
        if($insert==true){
        echo "<p class='message'>Thank for submitting the form.we are happyto see you joining us for the US trip</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="number" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="number" name="phone" id="phone" placeholder="Enter your phone number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter some information"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>