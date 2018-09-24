<?php
    echo '<a href="index.php"><h3>back</h3></a>';
?>

<?php
    echo '<h1>Simple Array</h1>';
    $students = array('Ambuja','Pappu','Ashish');
    foreach($students as $student){
        echo "$student" . '<br>';
    }
    echo '<h1>Multi-dimensional Array</h1>';
    $students = array(
        array('Ambuj','74','IT'),
        array('Ritwick','51','IT'),
        array('Rahul','49','IT')
    );
    foreach($students as $student => $row){
        #echo "$student" . '<br>';
        foreach($row as $temp){
            echo "$temp" . '<br>';
        }
        echo '<br>';
    }
?>