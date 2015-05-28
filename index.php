<?php

//to bounce OPTIONS requests right away
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    error_log("Bounce options");
    exit;
}

require_once("includes/toro.php");
require_once("includes/dbconnect.php");
require_once("includes/classlist.php");
require_once("includes/helpers.php");

Toro::serve(array(
    //Does not work
    "/" => "Hello",
    
    //GET Return list of games that have been played
    //POST Creates a new game
    "/Games" => "Games",

    //GET Returns details about a specific game
    //POST Adds players to a game
    //DELETE removes game data, gameplayers and rounds
    "/Games/:number" => "Game",

    //GET Returns a list of all the rounds in a game
    //POST Adds a round to a game
    "Games/:number/Rounds" => "Rounds",

    //GET Return list of offically sanctioned Footsquare players
    //POST Creates a new player
    "/Players" => "Players",

    //GET Look at details for one player
    //POST Update a players details
    "/Players/:number" => "Player"
));

?>
