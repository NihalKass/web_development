<?php
    echo '<a href="index.php"><h3>back</h3></a>';
?>

<?php
require_once 'connect.php';
if(!$conn)
{
    #die("cann't connect to localhost");
    echo "<center><h1 style='color:red'>Cannot connect to localhost</h1><center>";
} 
else 
{
    echo "<center><h1 style='color:green'>Connection Successful</h1><center>";
    
    $select_db = mysqli_select_db($conn, 'practice');
    if($select_db)
    {
        echo "<center><h1 style='color:green'>Database <strong style='color:black'>Practice</strong> Connected Successfully</h1><center>";
    }
    else
    {
        echo "<center><h1 style='color:red'>Cannot connect to database</h1><center>";
    }
}
echo '<hr>';
?>