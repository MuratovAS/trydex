<!DOCTYPE html >
<html lang="ru">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="UTF-8"/>
        <meta name="description" content="Private front-end for yandex"/>
        <meta name="referrer" content="no-referrer"/>
        <link rel="stylesheet" type="text/css" href="static/css/styles.css"/>
        <link title="TrydeX search" type="application/opensearchdescription+xml" href="/opensearch.xml?method=POST" rel="search"/>
        <link rel="stylesheet" type="text/css" href="<?php
                $config = require "config.php";
                echo "static/css/";
                echo $config->theme;
        ?>"/>
