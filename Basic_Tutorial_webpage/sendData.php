<?php
    echo '<a href="index.php"><h3>back</h3></a>';
?>

<?php
    require 'connect.php';
    $select_db = mysqli_select_db($conn, 'practice');
    if(!$select_db)
    {
        echo "<center><h1 style='color:red'>Database Connection Failed</h1><center>";
    }
    $fname = $lname = $rollno = $dept = $user = $pass = "";
    if(isset($_POST['user']) && isset($_POST['pass']) && 
        isset($_POST['fname']) && isset($_POST['lname']) && 
        isset($_POST['rollno']) && isset($_POST['dept'])){
        
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $pass = md5($pass);
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $rollno = $_POST['rollno'];
        $dept = $_POST['dept'];
        if(!empty($user) && !empty($pass) && 
            !empty($fname) && !empty($lname) &&
            !empty($rollno) && !empty($dept)){
               
            $sql = "INSERT INTO students (user,pass,fname,lname,rollno,dept) VALUES ('$user','$pass','$fname','$lname',$rollno,'$dept')";
           
            $check_query = mysqli_query($conn,$sql) or die('wrong query');
            if($check_query){
                echo "<center><h1 style='color:green'>Data added to the Table <b style='color:black'>Students</b></h1><center>";
            }
            else {
                echo "<center><h1 style='color:red'>Wrong query</h1><center>";
            }
        }
        else {
            echo "<center><h1 style='color:red'>Forms are not filled</h1><center>";
        }
    }
    else {
        echo "<center><h1 style='color:red'>Please fill up the form</h1><center>";
    }
?>

<html>
    <body>
        <center>
            <div>
                <h1>Students Form</h1>
                <form method="POST" action="sendData.php">
                    Username : <input type="text" name="user"><br><br>
                    Password : <input type="password" name="pass"><br><br>
                    First name : <input type="text" name="fname"><br><br>
                    Last name : <input type="text" name="lname" ><br><br>
                    Roll no : <input type="text" name="rollno" ><br><br>
                    Department : <input type="text" name="dept" ><br><br>
                    <input type="submit">
                </form>
            </div>
        </center>
    </body>
</html>