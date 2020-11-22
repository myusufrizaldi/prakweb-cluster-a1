<?php

function get_factorial($a) {
    if($a == 0) {
        return 1;
    } else {
        return $a * get_factorial($a - 1);
    }
}

echo get_factorial(0) . '<br>';
echo get_factorial(1) . '<br>';
echo get_factorial(2) . '<br>';
echo get_factorial(3) . '<br>';
echo get_factorial(4) . '<br>';
echo get_factorial(5) . '<br>';
echo get_factorial(6) . '<br>';

?>