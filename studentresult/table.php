<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT MARK DETAILS</title>
</head>
<body>
    <?php include 'mainpage.php' ?>
    <h1>STUDENT MARK DETAILS</h1>
    <table border="1" cellspacing="10px" cellpadding="0">
        <thead>
            <th>MARK ID</th>
            <th>STUDENT ID</th>
            <th>STUDENT_NAME</th>
            <th>SEMESTER</th>
            <th>ENGLISH</th>
            <th>TAMIL</th>
            <th>MATHS</th>
            <th>SCIENCE</th>
            <th>SOCIAL</th>
            <th>TOTAL</th>
            <th>GRADE</th>
            <!-- <th>Date_time</th> -->
            <th colspan="2">OPERATION</th>
            

        </thead>
        <tbody>
            <?php
              include 'connect.php';
            $query="SELECT studentinfo.*,studentmark.* FROM studentinfo INNER JOIN studentmark ON studentinfo.id=studentmark.id ORDER BY studentinfo.name,studentmark.semester";
            $fire=mysqli_query($connection,$query) or die('query failed'.mysqli_error($connection));
            if(mysqli_num_rows($fire)>0)
            {
                while($result=mysqli_fetch_assoc($fire))
                {
                    echo "<tr>";
                    echo "<td>".$result['markid']."</td>";
                    echo "<td>".$result['id']."</td>";
                    echo "<td>".$result['name']."</td>";
                    echo "<td>".$result['semester']."</td>";
                    echo "<td>".$result['eng']."</td>";
                    echo "<td>".$result['tam']."</td>";
                    echo "<td>".$result['mat']."</td>";
                    echo "<td>".$result['sci']."</td>";
                    echo "<td>".$result['soc']."</td>";
                    echo "<td>".$result['total']."</td>";
                    echo "<td>".$result['grade']."</td>";
                    //echo "<td>".$result['Date_time']."</td>";
                    // echo "<td><a href=update_student_mark.php?studid=".$result['id']."&semester=".$result['semester'].">Update</a> </td>";
                    echo "<td><a href=update_student_mark.php?markid=".$result['markid'].">Update</a> </td>";
                    //echo "<td><a href=delete_student_mark.php?sid=".$result['id'].">Delete</a> </td>";
                    // echo "<td><a href=#  onclick=confirmDelete(".$result['id'].",'".$result['name']."',".$result['semester'].")>Delete</a> </td>";

                    echo "<td><a href=#  onclick=confirmDelete(".$result['markid'].",'".$result['name']."')>Delete</a> </td>";
                    

                    echo "</tr>";

                }


                $total_students = $fire->num_rows;
                echo "<tr>";
                echo "<td>Total Students: $total_students</td></tr>";

            }
            ?>
            </tbody>
    
            </table>
            <button class="btn btn-primary my-5"><a href="dashboard.php" class="text-light">Close</a></button><br><br>
</body>
<script>
    //     function confirmDelete(xidnum,xname,xsem)
    //     {
             
    //         var result = confirm("Are you sure you want to delete "+xname+" record?");
    //         if(result){
    //             //alert("Record deleted!");
    //             // location.replace("http://myproject/studentresult/delete_student_mark.php?sid="+xidnum+"&sem="+xsem)
    //             location.replace("http://myproject/studentresult/delete_student_mark.php?sid="+xidnum+"&sem="+xsem)
    //         }
    //         else
    //         {
    //             alert("Deletion canceled.");
    //         }
    //     }

    function confirmDelete(xidnum,xname)
        {
             
            var result = confirm("Are you sure you want to delete "+xname+" record?");
            if(result){
                //alert("Record deleted!");
                // location.replace("http://myproject/studentresult/delete_student_mark.php?sid="+xidnum+"&sem="+xsem)
                location.replace("http://myproject/studentresult/delete_student_mark.php?mid="+xidnum)
            }
            else
            {
                alert("Deletion canceled.");
            }
        }
    </script>
 </script>
</html>