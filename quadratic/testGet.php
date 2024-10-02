<?php
if(isset($_GET['submitValues'])) {

    $a_value = $_GET['a'];
    $b_value = $_GET['b'];
    $c_value = $_GET['c'];

    $discriminant = $b_value**2 - (4*$a_value*$c_value);

    echo "<p>$discriminant</p>";
}
?>