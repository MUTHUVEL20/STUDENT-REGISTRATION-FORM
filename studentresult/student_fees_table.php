
<?php
       include 'connect.php';
          
       if(isset($_GET["from_date"]) && isset($_GET["to_date"]) )
       {
          $fromdate=date('Y-m-d',strtotime($_GET["from_date"])); 
          $todate=date('Y-m-d',strtotime($_GET["to_date"])); 
       }
        // $fromdate=$_GET["from_date"];
        // $todate=$_GET["to_date"];
       
        else{
            $fromdate=date('Y-m-d');
            $todate=date("Y-m-d");
        }

       $query2 = "SELECT si.*,sf.* FROM studentinfo si  INNER JOIN student_fees_report sf ON si.id=sf.id
                   WHERE sf.transdate BETWEEN '$fromdate' AND '$todate' "; 

        $fire = mysqli_query($connection,$query2) or die('query failed'.mysqli_error($connection));
       
     ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>STUDENT FEES</title>
</head>
<body>
    <?php include 'mainpage.php' ?>
    <form method="GET">
    <center><h1>STUDENT FEES DETAILS</h1></center>

    <label for = "from_date">FROM_DATE</label>
    <input type="date" name="from_date" id="from_date" value = "<?php if(isset($_GET['from_date'] )) { echo $_GET['from_date'];} else { echo date('Y-m-d');}?>">
    
    
    <label for = "to_date">TO_DATE</label>
    <input type="date" name="to_date" id="to_date" value="<?php if(isset($_GET['to_date'] )) { echo $_GET['to_date'];} else { echo date('Y-m-d');}?>">

    <button class="process" class="text-light">Process</button><br><br>
    </form>
    <table border="1" cellspacing="10px" cellpadding="0">

    <thead>
      <th>RECEIVED DATE</th>  
      <th>RECEIPT NO</th>  
      <th>STUDENT ID</th>
      <th>STUDENT NAME</th>
      <!-- <th>SEMESTER</th> -->
      <th>FEES AMOUNT</th>
      
      
    </thead>
    
    <tbody>
        <?php
           
           if(mysqli_num_rows($fire)>0) 
           {
            while ($result = mysqli_fetch_assoc($fire))
            {
                echo "<tr>"; 
                //echo "<td>".$result[date('d-m-Y',strtotime('transdate'))]."</td>";
                echo "<td>".$result['transdate']."</td>";
                echo "<td>".$result['ReciptNo']."</td>";
                echo "<td>".$result['id']."</td>";
                echo "<td>".$result['name']."</td>";
                // echo "<td>".$result['semester']."</td>";
                echo "<td>".$result['amount']."</td>";
                
                
                
                echo "</tr>";
            }
           }                                

        
        ?>
    </tbody>
    </table>
      
    <button class="btn btn-primary my-5"><a href="dashboard.php" class="text-light">Close</a></button><br>
</body>
</html>