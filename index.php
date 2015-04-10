<?php

//to bounce OPTIONS requests right away
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit;
}

require_once("includes/toro.php");
require_once("includes/dbconnect.php");
require_once("includes/classlist.php");
require_once("includes/helpers.php");

Toro::serve(array(
    "/" => "HelloWorld",
    "/Games" => "Games",
    "/Games/:number" => "Game",
    "/Players" => "Players",
    "/Players/:number" => "Player"
));

?>