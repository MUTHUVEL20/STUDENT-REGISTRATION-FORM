<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>STUDENT MARK DETAILS</title>
    
</head>
<body>
    <?php include 'mainpage.php' ?>
    <h1>STUDENTS DETAILS</h1>
    <table border="1" cellspacing="10px" cellpadding="0">
        <thead>
            <th width="25" style="text-align:left;">STUDENT ID</th> 
            <th width="40" style="text-align:left;">STUDENT_NAME</th>
            <th width="25" style="text-align:left;">Age</th>
            <th width="40" style="text-align:left;">Gender</th>
            <th width="70" style="text-align:left;">Year</th>
            <th width="90" style="text-align:left;">Date Of Birth</th>
            <!-- <th>Admission Date</th> -->
            <th colspan="2">OPERATION</th>
             

        </thead>
        <tbody>
            <?php
              include 'connect.php';
            $query="SELECT * FROM studentinfo ORDER BY name  ";
            $fire=mysqli_query($connection,$query) or die('query failed'.mysqli_error($connection));
            if(mysqli_num_rows($fire)>0)
            {
                while($result=mysqli_fetch_assoc($fire))
                {
                    echo "<tr>";
                    echo "<td>".$result['id']."</td>";
                    echo "<td>".$result['name']."</td>";
                    echo "<td>".$result['age']."</td>";
                    // echo "<td>".$result['gender']."</td>";
                    if (strtoupper($result['gender'])=="M")
                    {
                    echo "<td>Male</td>";
                    }
                    else if (strtoupper($result['gender'])=="F")
                    {
                    echo "<td>Female</td>";
                    }
                    else
                    {
                        echo "<td>Others</td>";
                    }
                     
                    echo "<td>".$result['Year']."</td>";
                    echo "<td>".$result['dob']."</td>";

                   // echo "<td>".$result['Date_time']."</td>";
                    // echo "<td><a href=update_student_details.php?studid=".$result['id']."><i class=fa fa-edit style=font-size:60px;color:lightblue;></i></a> </td>";
                    echo "<td><a href=update_student_details.php?studid=".$result['id']."> Update</a> </td>";
                    echo "<td><a href=#  onclick=confirmDelete(".$result['id'].",'".$result['name']."')>Delete</a> </td>";

                    //echo "<td><a href=delete.php?sid1=".$result['id'].">Delete</a> </td>";
                    
                }  

                
                $total_students = $fire->num_rows;
                echo "<tr>";
                echo "<td colspan=8 >Total Students: $total_students</td></tr>";

            }
            ?>
            </tbody>
    
            </table>
            <button class="btn btn-primary my-5"><a href="dashboard.php" class="text-light">Close</a></button><br><br>
</body>

<script>
        function confirmDelete(xidnum,xname)
        {
             
            var result = confirm("Are you sure you want to delete "+xname+" record?");
            if(result){
                //alert("Record deleted!");
                location.replace("http://myproject/studentresult/delete.php?sid1="+xidnum);
                //windows.location.href="http://myproject/studentresult/delete.php"
                //windows.open("https://www.w3schools.com")
                // windows.location.href="http://localhost/myproject/studentresult/delete.php?sid1="+xidnum;
                //windows.location.href="delete.php?sid1="+xidnum;
            }
            else
            {
                alert("Deletion canceled.");
            }
        }
    </script>
</html>