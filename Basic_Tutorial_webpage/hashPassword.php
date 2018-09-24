<?php
    echo '<a href="index.php"><h3>back</h3></a>';
?>

<?php
$dbpassword = 'qwerty';
if(isset($_POST['password']) && !empty($_POST['password'])){
    $formpassword = $_POST['password'];
    echo '$dbpassword : ' . md5($dbpassword) . '<br>';
    echo '$formpassword :' . md5($formpassword) . '<br>';
    if(md5($formpassword) == md5($dbpassword)){
        echo "<center><h1 style='color:green'>Password Matched</h1><center>";
    }
    else {
        echo "<center><h1 style='color:red'>Password Not Matched</h1><center>";
    }
}
?>

<html>
    <body>
        <center>
            <div>
                <h1>Hash my password</h1>
                <span style="color:green" id="pass" value="hello"></span>
                <form method="POST" action="hashPassword.php">
                    password : <input type="text" name="password">
                    <input type="submit">
                </form>
            </div>
        </center>
    </body>
</html>