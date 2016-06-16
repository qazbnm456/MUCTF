<?php
    highlight_file(__FILE__);

    $dir = 'sandbox/';
    if (!file_exists($dir)) mkdir($dir);
    chdir($dir);

    $args = $_GET['args'];
    for($i = 0; $i < count($args); $i++) {
        if(!preg_match('/^\w+$/', $args[$i])) exit();
    }
    exec("/bin/lobsiinvok " . implode(" ", $args));
?>
