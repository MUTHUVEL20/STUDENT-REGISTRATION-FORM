<?php 

include ('connect.php');
 
    $id=$_REQUEST['sid1'];

    $sql="delete from studentinfo where id = ".$id;
    print $sql;
    $result=mysqli_query($connection,$sql);
    if($result){
        //echo "Deleted Successfull";
        header('location:display.php');
       // header("Refresh:0;url=studreg.php");
    }
    else
    {
        die(mysqli_error($connection));
    }

?>