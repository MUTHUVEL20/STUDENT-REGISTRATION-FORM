<?php 
 include('connect.php');
 $id = $_REQUEST['studid'];

 $sql="SELECT * FROM studentinfo  where id=$id";
// print $sql;
 $fire = mysqli_query($connection, $sql);
 $result1=mysqli_fetch_assoc($fire);
 //print strtoupper($result1['gender']);
 

 if(isset($_POST['submit']))
 {
    $name=$_POST['name'];
    $age=$_POST['age'];
    $gender=SUBSTR($_POST['gender'],0,1);
    $year=$_POST['year'];
    $dob = $_POST['dob'];

    $sql="update studentinfo set name='$name',age='$age',gender='$gender',year='$year',dob='$dob' where id=$id";
    $result=mysqli_query($connection,$sql);

    if($result)
    {
        //echo "updated successfully";
        echo "<script> alert('Data Updated Successfully'); </script>";
        header("Refresh:0;url=display.php");
    }
    else{
        die(mysqli_error($connection));
    }

 }


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
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
    <h1>Student Updation</h1>
	 
    
    <form action="" method="post">

	   <div class="studname">
       <label for="Name">Student Name</label> 
       <input type="text" name="name"  value="<?php echo $result1['name'] ; ?>" >
       </div><br><br>

	   <div class="age">
	   <label for="Age">Age</label> 
       <input type="number" name="age" value="<?php echo $result1['age'] ; ?>" >
       </div><br><br>
      
      
	  
      
	  <div class="genderContainer">
                <label>Gender</label>
                <input type="radio" class="gender1" name="gender" value="male" <?php if(strtoupper($result1['gender'])=="M") { ?> checked <?php }?> >male
                <input type="radio" class="gender1" name="gender" value="female" <?php if(strtoupper($result1['gender'])=="F" ) { ?> checked <?php }?>  >female
                <input type="radio" class="gender1" name="gender" value="others" <?php if(strtoupper($result1['gender'])=="O" ) {?> checked <?php } ?> >others<br><br> 
        </div><br><br>


		<div class="year">
			<label>Year</label>
			<select name="year">
				<option value="1st year" <?php if(strtoupper($result1['Year'])=="1ST YEAR" ) { ?> selected <?php } ?>>First Year</option>
				<option value="2nd year" <?php if(strtoupper($result1['Year'])=="2ND YEAR" ) { ?> selected <?php } ?>>Second Year</option>
      </select>    	
		</div><br><br>

    <div class="dob">
      <label for = dob>Date Of Birth</label>
      <input type="date" name="dob" id="dob" value="<?php echo $result1['dob'];?>" >
    </div>
	  
    <input type="submit" value="submit" name="submit"><br><br>

	  <button class="btn btn-primary my-5"><a href="dashboard.php" class="text-light">Close</a></button><br><br> 

    </form>

    
</body>
</html>