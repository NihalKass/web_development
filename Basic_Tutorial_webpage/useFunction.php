<?php
    echo '<a href="index.php"><h3>back</h3></a>';
?>

<?php
    function callme() {
        echo "i am called by a function</br>";
    }
    function add($num1, $num2){
        $sum = $num1 + $num2;
        echo "$num1 + $num2 = " . "$sum" ;
    }
    callme();
    add(10,20);
?>