<?php
    echo '<a href="index.php"><h3>back</h3></a>';
?>

<?php
if(isset($_GET["fname"]) && isset($_GET["lname"])){
    $fname = $_GET["fname"];
    $lname = $_GET["lname"];
    if(!empty($fname) && !empty($lname)){
        echo '<center style="color:green">';
        echo '<b>First name : </b>' .'<span>'. $fname .'</span><br>';
        echo '<b>Last name : </b>' .'<span>'. $lname .'</span><br>';
        echo '</center>';
    }
}
else {
        echo "<center><h1 style='color:red'>Please fill the form</h1><center>";
}
?>

<html>
    <body>
        <center>
            <div>
                <h1>Send Value by GET</h1>
                <form method="GET" action="useGET.php">
                    first name : <input type="text" name="fname"><br>
                    last name : <input type="text" name="lname"><br>

                    <input type="submit">
                </form>
            </div>
        </center>
    </body>
</html>