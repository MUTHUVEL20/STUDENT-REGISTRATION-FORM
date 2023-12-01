<?php
 
$connection=new mysqli('localhost','root','','studentdetails');
if($connection){
    //echo 'success';
}
else{
    die(mysqli_error($connection));
}




?>