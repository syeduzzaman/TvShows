<?php

    //Headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    include_once "../classes/tvmaze.classes.php";

    //Get search Name
    $searchQuery = isset($_GET["q"]) ? $_GET["q"] : die(json_encode(array("Error"=>"invalid argument supplied to the api")));
    //Receive result from Tvmaze
    $result = new Tvmaze();   
    echo $result->getDetails($searchQuery);

?>