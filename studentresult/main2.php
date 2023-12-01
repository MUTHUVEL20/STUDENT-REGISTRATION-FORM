<?php
include 'connect.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $id=$_POST['user_select1'];
    $eng=$_POST['eng_mark'];
    $tam=$_POST['tam_mark'];
    $mat=$_POST['mat_mark'];
    $sci=$_POST['sci_mark'];
    $soc=$_POST['soc_mark'];
    $semester=$_POST['semester'];
    $tot=$eng+$tam+$mat+$sci+$soc;
    if ($eng >25 and $tam >25 and $mat>25 and $sci >25 and $soc >25){
        $grd="pass";
    }
    else{
        $grd="fail";
    }

$query1="insert into studentmark(id,semester,eng,tam,mat,sci,soc,total,grade,Date_time) values ('$id','$semester',$eng,$tam,$mat,$sci,$soc,$tot,'$grd',NOW())";
$res=mysqli_query($connection,$query1);
if($res){
   /*  // echo 'Your Result'; */
   //echo "Successfully Inserted";
   echo "<script> alert('Data Inserted Successfully'); </script>";
   header("Refresh:0;url=marks.php");
   
}
else{
  die(mysqli_error($connection));
}}?>
/*
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <p>Semester:<?php echo $semester ?></p>

    <p>eng mark:<?php echo $eng ?></p>
    
    <p>tam mark:<?php echo $tam ?></p>
    
    <p>mat mark:<?php echo $mat ?></p>
    
    <p>sci mark:<?php echo $sci ?></p>
    
    <p>soc mark:<?php echo $soc ?></p>
    
    <p>total mark:<?php echo $tot ?></p>
    
    <p>result:<?php echo $grd ?></p>

    <a href="studreg.php">Home</a> -->
</body>
</html>
*/