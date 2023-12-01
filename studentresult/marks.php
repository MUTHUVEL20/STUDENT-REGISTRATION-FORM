<?php
     include 'connect.php';
     
     $sql = "SELECT * FROM studentinfo";
     $result1 = $connection->query($sql);
      echo '<label for = "select_student_name">'.'</label>';
    //   if($result->num_rows > 0){
    //      echo '<select name="user_select" id="user_select"  style="width:250px;">';

    //      while($row = $result->fetch_assoc()){
    //          echo '<option value='.$row['id']. '>'.$row['id'] .'-' . $row['name'].'</option>';
    //      }
    //      echo'</select>';
    //   }else {
    //      echo "0 results";
    //   } 
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"> -->
</head>
<body>
    <?php include 'mainpage.php' ?>
    <h1>STUDENTS MARK ENTRY</h1>
    <form action="main2.php" method="post">
    <label for="user_select1">Select Stud Name</label>
        <select id="user_select1" name="user_select1">

       <?php if($result1->num_rows > 0){
        
        while($row = $result1->fetch_assoc()){ ?>
            <option value=<?php echo $row['id'] ?>><?php echo $row['id'] .'-' . $row['name'] ?></option>
            <?php }
       
     }?>
            
            
        </select><br>
        
        <label for="semester">Semester</label>
        <select id="semester" name="semester">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select><br>    
        <label for="eng">enter eng mark:</label>
        <input type="number" placeholder="enter mark" name="eng_mark" id="eng" required><br><br>
        <label for="tam">enter tam mark:</label>
        <input type="number" placeholder="enter mark" name="tam_mark" id="tam"  required><br><br>
        <label for="mat">enter mat mark:</label>
        <input type="number" placeholder="enter mark" name="mat_mark" id="mat" required><br><br>
        <label for="sci">enter sci mark:</label>
        <input type="number" placeholder="enter mark" name="sci_mark" id="sci" required><br><br>
        <label for="soc">enter soc mark:</label>
        <input type="number" placeholder="enter mark" name="soc_mark" id="soc" required><br><br>
        <input type="submit" value="submit" name="submit">
        <input type="button" value="reset" name="reset" onclick="clearfield()">
        
        <button class="btn btn-primary my-5"><a href="dashboard.php" class="text-light">Close</a></button>
        <!-- <button class="btn btn-primary my-5"><a href="table.php" class="text-light"> Student Marks Report</a></button><br> -->
        

        <script>
            function clearfield(){
                
                document.getElementById("eng").value="";
                document.getElementById("tam").value="";
                document.getElementById("mat").value="";
                document.getElementById("sci").value="";
                document.getElementById("soc").value="";
                document.getElementById("tam").value="";
                
            }
        </script>
    </form>
    
</body>
</html>
