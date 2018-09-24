<?php
    echo '<a href="index.php"><h3>back</h3></a>';
?>

<?php
    require 'connect.php';
    $select_db = mysqli_select_db($conn, 'practice');
    if(!$select_db)
    {
        echo "<center><h1 style='color:red'>Database <strong style='color:black'>Practice</strong> Connection Failed</h1><center>";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Students information</title>
    <script>
        function getUserDetails(id){
            if(id==""){
                document.getElementById('info').innerHTML="";
                return;
            }
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("info").innerHTML=this.responseText;
                }
            }
  
            xmlhttp.open("GET","getTable.php?id=" + id,true);
            xmlhttp.send();
        }
    </script>
</head>
<body>
    <center>
    <div>
        <h1>Students Information</h1>
            <strong>Users :</strong>
            <select name="users" onchange="getUserDetails(this.value)">
                <option value="0">Select user</option>
                <?php
                    $sql = "SELECT * FROM students";
                    $result = mysqli_query($conn,$sql);
                    
                    if($result)
                    {
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_assoc($result)){
                                echo '<option value="' . $row['id'] .'">'. $row['fname'] .'</option>';
                            }
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
            </select>
        </div>
    <div>
        <hr>
        <span style='color:red' id='info'><strong>No record selected</strong></span>
    </div>
    </center>
</body>
</html>