<?php
include 'connect.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $id=$_POST['userselect1'];
    $td=$_POST['transdate'];
    //$semester=$_POST['semester'];
    $fees=$_POST['amount'];

    $query="INSERT INTO student_fees_report (id,transdate,amount) VALUES ('$id','$td','$fees')";

    $amt=mysqli_query($connection,$query);

    if($amt){
        echo "<script> alert('Fees  Accepted Successfully'); </script>";
        header("Refresh:0;url=student_fees_entry.php");
   
    }
    else{
         die(mysqli_error($connection));
    }
}






?>