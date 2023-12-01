<?php 
  include 'connect.php';
 $login=0;
 $invalid=0;
 if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];

 
    $sql="select * from student_user where username='$username' and password='$password'";

    $result=mysqli_query($connection,$sql);

    if($result){
        $num=mysqli_num_rows($result);
        if($num>0)
        {
            //echo "Login successfull";
            $login=1;
            session_start();
            $_SESSION['username']=$username;
            header('location:dashboard.php');
        }
        else 
        {

            $invalid=1;
        }    
            
    }
 }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>

<?php

if($login)
{
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success</strong> You are successfully logged in.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}


?>
<?php

if($invalid)
{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error</strong>Invalid credentials.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}


?>

    <h1>Login to our website</h1>
    <form action="login.php" method="post">
        <label for="username">User Name </label>
        <input type="text" name="username" id="username">

        <label for="password">Password </label>
        <input type="password" name="password" id="password">

        <input type="submit" value="Log in" name="Log in">
    </form>
</body>
</html>