<?php

    $config = require "config.php";
    require "misc/tools.php";

    $url = $_REQUEST["url"];

    $image = $url;
    $image_src = request($image);

    header("Content-Type: image/jpeg");
    echo $image_src;

?>
