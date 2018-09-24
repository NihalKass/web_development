<?php
    echo '<a href="index.php"><h3>back</h3></a>';
?>

<?php
    # connect localhost
    require 'connect.php';
    # select database
    $select_db = mysqli_select_db($conn, 'practice');
    if(!$select_db)
    {
        echo "<center><h1 style='color:red'>Database <strong style='color:black'>Practice</strong> Connection Failed</h1><center>";
    }
    $sql = "SELECT * FROM students";
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        echo "<center><h1 style='color:green'>Student's Record</h1><center>";
        echo "<center>
                <div>
                    <table border='1'>
                        <tr><th>ID</th><th>Username</th><th>Firstname</th><th>Lastname</th><th>Roll no</th><th>Department</th></tr>";
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['user'] . "</td>";
                echo "<td>" . $row['fname'] . "</td>";
                echo "<td>" . $row['lname'] . "</td>";
                echo "<td>" . $row['rollno'] . "</td>";
                echo "<td>" . $row['dept'] . "</td>";
                echo "</tr>";
            }
            echo "</table></center></div>";
        }
        else
        {
            echo "<center><h1 style='color:red'>No data found</h1><center>";
        }
    } 
    else 
    {
        echo "<center><h1 style='color:red'>Wrong query</h1><center>";
    }
?>