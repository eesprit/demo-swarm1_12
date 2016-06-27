<?php 
    $color = getenv('COLOR') ? getenv('COLOR') : "red";
    echo "<font color=\"" . $color . "\">" . gethostname() . "</font>";
?>
