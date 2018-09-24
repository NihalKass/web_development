<?php
$hostname = "localhost";
$username = "root";
$password = "";
$conn = mysqli_connect($hostname, $username, $password);
if(!$conn)
{
    echo "<center><h1 style='color:red'>Cannot connect to localhost</h1><center>";
}
?>