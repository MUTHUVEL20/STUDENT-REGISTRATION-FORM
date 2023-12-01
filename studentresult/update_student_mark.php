<?php 
 include('connect.php');
//  $id = $_REQUEST['studid'];
//  $semester=$_REQUEST['semester'];
 $markid=$_REQUEST['markid'];
 

 $sqlgetstudent="SELECT id,name from studentinfo   ";
 // print $sql;
$getstudent= mysqli_query($connection, $sqlgetstudent);
  

 $sql="SELECT si.*,sm.* FROM studentmark sm INNER JOIN studentinfo si on si.id=sm.id where sm.markid=$markid ";
// print $sql;
 $fire = mysqli_query($connection, $sql);
 $result1=mysqli_fetch_assoc($fire);
  //print $result1['name'];
 
 

 if(isset($_POST['submit']))
 {
    $id=$_POST['user_select1'];
    $english=$_POST['eng_mark'];
    $tamil=$_POST['tam_mark'];
    $maths=$_POST['mat_mark'];
    $science=$_POST['sci_mark'];
    $social=$_POST['soc_mark'];
    $semester=$_POST['semester'];
   // $markid=$_POST['markid'];
    $tot=$english+$tamil+$maths+$science+$social;
    if ($english >25 and $tamil >25 and $maths>25 and $science >25 and $social >25){
        $grd="pass";
    }
    else{
        $grd="fail";
    }
    

    $sql="update studentmark set tam='$tamil',eng='$english',mat='$maths',sci='$science',soc='$social',total='$tot',grade='$grd',id=$id,semester=$semester  where  markid='$markid'";
    $result=mysqli_query($connection,$sql);

    if($result)
    {
        echo "updated successfully";
        header("Refresh:0;url=table.php");
    }
    else{
        die(mysqli_error($connection));
    }

 }





// <?php
//      include 'connect.php';
     
//      $sql = "SELECT * FROM studentinfo";
//      $result1 = $connection->query($sql);
//       echo '<label for = "select_student_name">'.'</label>';
//     //   if($result->num_rows > 0){
//     //      echo '<select name="user_select" id="user_select"  style="width:250px;">';

//     //      while($row = $result->fetch_assoc()){
//     //          echo '<option value='.$row['id']. '>'.$row['id'] .'-' . $row['name'].'</option>';
//     //      }
//     //      echo'</select>';
//     //   }else {
//     //      echo "0 results";
//     //   } 
 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <?php include 'mainpage.php' ?>
    <form action="" method="post">
    <label for="uname1"> Stud Name</label>
    <!-- <input type="text" readonly name="name" id="name" value="<?php echo $result1['name']?>"><br><br> -->
         <select id="user_select1" name="user_select1" style="width:200px;">

         <?php if($getstudent->num_rows > 0){
        
        while($row = $getstudent->fetch_assoc()){ ?>
            <option value=<?php echo $row['id'] ?> <?php if(strtoupper( $result1['name'])==strtoupper( $row['name'])) { ?> selected <?php } ?> ><?php echo $row['id'] .'-' . $row['name'] ?></option>
            <?php }
       
     }?>
            
            
        </select><br>  

        
        <label for="semester">Semester</label>
        <select id="semester" name="semester">
            <option value="1" <?php if($result1['semester']=="1") { ?> selected <?php } ?>>1</option>
            <option value="2" <?php if($result1['semester']=="2") { ?> selected <?php } ?>>2</option>
            <option value="3" <?php if($result1['semester']=="3") { ?> selected <?php } ?>>3</option>
            <option value="4" <?php if($result1['semester']=="4") { ?> selected <?php } ?>>4</option>
        </select><br>    
        <label for="eng">enter eng mark:</label>
        <input type="number"  name="eng_mark" id="eng" value="<?php echo $result1['eng']?>"><br><br>
        <label for="tam">enter tam mark:</label>
        <input type="number"  name="tam_mark" id="tam" value="<?php echo $result1['tam']?>"><br><br>
        <label for="mat">enter mat mark:</label>
        <input type="number"  name="mat_mark" id="mat" value="<?php echo $result1['mat']?>"><br><br>
        <label for="sci">enter sci mark:</label>
        <input type="number"  name="sci_mark" id="sci" value="<?php echo $result1['sci']?>"><br><br>
        <label for="soc">enter soc mark:</label>
        <input type="number"  name="soc_mark" id="soc" value="<?php echo $result1['soc']?>"><br><br>
        <input type="submit" value="submit" name="submit">
        <button class="btn btn-primary my-5"><a href="dashboard.php" class="text-light">Close</a></button><br><br> 
 

        <!-- <button class="btn btn-primary my-5"><a href="table.php" class="text-light"> Student Marks Report</a></button><br> -->
        
    </form>
    
</body>
</html>
