<?php

    $x = 1;

    for($i=2; $i<51; $i++) {
        if(!($i == 0 || $i == 1)) {

            $is_prime = true;
            for($j=ceil($i/2); $j>1; $j--) {
                if($i % $j == 0) {
                    $is_prime = false;
                }
            }

            if($is_prime) echo $i . '<br>';
        }
    }

?>