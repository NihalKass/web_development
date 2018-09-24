<?php
    echo '<a href="index.php"><h3>back</h3></a>';
?>

<?php
if(isset($_POST["username"]) && isset($_POST["password"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    if(!empty($username) && !empty($password)){
        echo '<center style="color:green">';
        echo '<b>Username : </b>' .'<span>'. $username .'</span>'. '<br>';
        echo '<b>Password : </b>' .'<span>'. $password .'</span>'. '<br>';
        echo '</center>';
    }
    else{
        echo "<center><h1 style='color:red'>Please fill the form</h1><center>";
    }
}
?>

<html>
    <body>
        <center>
            <div>
                <h1>Send Value by POST</h1>
                <form method="POST" action="usePOST.php">
                    username : 
                    <input type="text" name="username"><br>
                    password : 
                    <input type="password" name="password"><br>

                    <input type="submit">
                </form>
            </div>        
        </center>
    </body>
</html>