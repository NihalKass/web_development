<?php
    require 'connect.php';
    
    $select_db = mysqli_select_db($conn, 'practice');
    if(!$select_db)
    {
        echo "<center><h1 style='color:red'>Database <strong style='color:black'>Practice</strong> Connection Failed</h1><center>";
    }
    
    $id = 0;
    if(isset($_GET['id'])){
        $id = intval($_GET['id']);
        //echo "$id";
        if($id > 0) {
            $sql = "SELECT * FROM students WHERE id = '". $id ."'";
            $result = mysqli_query($conn,$sql);
    
            echo "<center><div><table border='1'>
                    <tr><th>Firstname</th><th>Lastname</th><th>Roll no</th><th>Department</th></tr>";
            while($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['fname'] . "</td>";
                echo "<td>" . $row['lname'] . "</td>";
                echo "<td>" . $row['rollno'] . "</td>";
                echo "<td>" . $row['dept'] . "</td>";
                echo "</tr>";
            }
            echo "</table></center></div>";
            mysqli_close($conn);
        } else {
            echo "<center><h1 style='color:red'>No record selected</h1><center>";
        }
    }
?>