<?php

function germanizer($min, $max, $day)
{
    $difference = $max - $min;
    
    if ($difference > 0) {
        $median = (int) $difference / 2;
    } else {
        $median = 0;
    }

    $r = ($day / 7);

    $germanized = $day % 2 == 0 ? $max - ($r * $median) : $min + ($r * $median);

    return (int) $germanized;
}

?>