<?php

  include 'connect.php';
  $sql="select * from studentinfo";
  $result1=$connection->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Fees Report</title>
</head>
<body>
     <?php include 'mainpage.php' ?>
    <form action="student_fees_main.php" method="post">

      <!-- <label for="receiptno">Receipt No:</label>
      <input type="number" name="receipt" id="receipt"> -->

      <label for = "transaction">Transaction Date</label>
      <input type="date" name="transdate" id="transdate" value="<?php if(isset($_POST["transdate"])) {  echo $_POST["transdate"]; } else {echo date("Y-m-d"); }?>"><br><br>
       
      <label for = "userselect1">Select Student Name</label>
      <select id="userselect1" name="userselect1">
        <?php
            if($result1 -> num_rows >0)
            {
              while ($row = $result1->fetch_assoc()){?>
              <option value=<?php echo $row['id'] ?>><?php echo $row['id'].'-'.$row['name']?></option>
              <?php }

            }?>
    
        ?>
      </select><br><br>

      

        <label for="amount">Fees Amount</label>
        <input type="number" name="amount" id="name"><br><br>

        <input type="submit" value="submit" name="submit">
        <!-- <button class="btn btn-primary my-5"><a href="student_fees_table.php" class="text-light">Student Fees Details</a></button> -->

        <button class="btn btn-primary my-5"><a href="dashboard.php" class="text-light">Close</a></button><br>
   </form>    
</body>
</html>