<?php 

include 'connect.php';
if(isset($_GET['mid'])){
   // $id=$_GET['sid'];
    $markid=$_GET['mid'];
    //$semester=$_GET['sem'];

    $sql="delete from studentmark where markid= $markid";             //id = $id AND semester='$semester' "; //AND markid= $markid";
    $result=mysqli_query($connection,$sql);
    if($result){
        //echo "Deleted Successfull";
        header('location:table.php');
    }
    else
    {
        die(mysqli_error($connection));
    }
}
?>

<?php 

// include 'connect.php';
// //if(isset($_GET['sid'])){
//     $id=$_REQUEST['sid'];
//     //$markid=$_GET['mid'];
//     $semester=$_REQUEST['sem'];

//     $sql="delete from studentmark where id = $id AND semester='$semester' "; //AND markid= $markid";
//     $result=mysqli_query($connection,$sql);
//     if($result){
//         //echo "Deleted Successfull";
//         header('location:table.php');
//     }
//     else
//     {
//         die(mysqli_error($connection));
//     }
// //}
// ?>