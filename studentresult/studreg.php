<?php
include 'connect.php';
if(isset($_POST['submit'])){
    
    $name=$_POST['name'];
    $age=$_POST['age'];
    $gender=SUBSTR($_POST['gender'],0,1);
    $year=$_POST['year'];
    
    
    
$query1="insert into studentinfo (name,age,gender,Year) values ('$name',$age,'$gender','$year')";

$res=mysqli_query($connection,$query1);
if($res){
    $infomsg='<script>alert("Record Inserted");</script>';
    //echo $infomsg;
    //header("Refresh:0;url=studreg.php");
    //$_SESSION['infomsg']="inserted";
    unset($_POST['name']);
    unset($_POST['age']);
}
else{
  die(mysqli_error($connection));
}}?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"> -->
</head>
<style>
* {
 
  margin: 0;
  padding: 0;
  box-sizing: border-box;
} 

.dropdown {
  display: flex;
  justify-content:center;
  margin-top:100px;
  list-style-type: none;
}
.home,.marks{
  display:block;
  width:800px;
  background-color:black;
  color: white;
  padding:10px 0;
  font-size:1.2rem;
  text-decoration:none;
  text-align:center;
}




.home:hover, .marks:hover{
  background-color:Skyblue;
}
</style>
<body>

<?php include 'mainpage.php' ?>
    <h1>Registration Form</h1>
	 
    
    <form action="main.php" method="post">

  <!-- <ul  class="dropdown">
  <li><a href="studreg.php" class="home">Home</a></li>
  <li><a href="marks.php" class="marks">Marks</a></li> -->
  
<!-- </ul><br><br>  -->
	   <div class="studname">
       <label for="Name">Student Name</label> 
       <input type="text" name="name" placeholder="Enter Your Name" pattern="[A-Z]+"  title="Please enter only capital letters" oninput="this.value = this.value.toUpperCase()" required autocomplete="off" >
       </div><br><br>

	   <div class="age">
	   <label for="Age">Age</label> 
       <input type="number" name="age"  min="15" max="30" autocomplete="off">
       </div><br><br>
      
      
	  
      
	  <div class="genderContainer">
                <label>Gender</label>
                <input type="radio" class="gender1" name="gender" value="male" checked >male
                <input type="radio" class="gender1" name="gender" value="female">female
                <input type="radio" class="gender1" name="gender" value="others">others<br><br>
        </div><br><br>


		<div class="year">
			<label>Year</label>
			<select name="year">
				<option value="1st Year">First Year</option>
				<option value="2nd Year">Second Year</option>
      </select>    	
		</div><br><br>

    <div class="dob">
      <label for = dob>Date Of Birth</label>
      <input type="date" name="dob" id="dob" value="<?php if(isset($_POST["dob"])) {  echo $_POST["dob"]; } else {echo date("Y-m-d"); }?>">
    </div>

    <p id="infomsg" name="infomsg"></p>
	  
    <input type="submit" value="submit" name="submit">

    <button class="btn btn-primary my-5"><a href="dashboard.php" class="text-light">Close</a></button><br>
	  <!-- <button class="btn btn-primary my-5"><a href="display.php" class="text-light">Student Details</a></button><br>  -->

    </form>

    
</body>
</html>






	