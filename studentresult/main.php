<?php
include 'connect.php';
if(isset($_POST['submit'])){
    
    $name=$_POST['name'];
    $age=$_POST['age'];
    $gender=SUBSTR($_POST['gender'],0,1);
    $year=$_POST['year'];
    $dob = $_POST['dob'];
    
    
    
$query1="insert into studentinfo (name,age,gender,Year,dob,Date_time) values ('$name',$age,'$gender','$year','$dob',NOW())";

$res=mysqli_query($connection,$query1);
if($res){
    echo "<script> alert('Data Inserted Successfully'); </script>";
    header("Refresh:0;url=studreg.php");
}
else{
  die(mysqli_error($connection));
}}?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
</head>
<body>
    <p> Name:<?php echo $name ?></p>
    
    <p>age:<?php echo $age ?></p>
    
    <p>gender:<?php echo $gender ?></p>
    
    <p>Year:<?php echo $year ?></p>
    
   
    <a href="studreg.php">Home</a>
</body>
</html>
 -->
