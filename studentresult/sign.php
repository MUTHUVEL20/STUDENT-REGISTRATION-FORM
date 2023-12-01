<?php 
  include 'connect.php';
 $success=0;
 $user=0;
 if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];

    // $sql="insert into student_user (username,password) VALUES ('$username','$password')";

    //  $result=mysqli_query($connection,$sql);

    //  if($result)
    //  {
    //      echo "Signup Successfull";
    //  }
    //  else 
    //  {
    //      die(mysqli_error($connection));
    //  } 
 
    $sql="select * from student_user where username='$username'";

    $result=mysqli_query($connection,$sql);

    if($result){
        $num=mysqli_num_rows($result);
        if($num>0)
        {
            //echo "User already exist";
            $user=1;
        }
        else 
        {
            $sql="insert into student_user (username,password) VALUES ('$username','$password')";

           $result=mysqli_query($connection,$sql);

           if($result)
           {
             // echo "Signup Successfull";
             $success=1;
           }
           else 
           {
              die(mysqli_error($connection));
           } 
        }
    }
 }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>

<?php 

if($user)
{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Ohh no sorry</strong> User already exist
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}


?>

<?php

if($success)
{
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success</strong> You are successfully signed up
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}


?>
    <h1>Signup Page</h1>
    <form action="sign.php" method="post">
        <label for="username">User Name </label>
        <input type="text" name="username" id="username">

        <label for="password">Password </label>
        <input type="password" name="password" id="password">

        <input type="submit" value="Sign up" name="Sign up">
        <button><a href="login.php">Log In </a></button>
    </form>
</body>
</html>