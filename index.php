<?php

    $searchMovie = 'deadwood';
    $url = 'https://api.tvmaze.com/search/shows?q='.$searchMovie;
    $responseJson = file_get_contents($url);    
    $responseArray = json_decode($responseJson, true);
    $resultArray = [];
    if($responseArray && count($responseArray)>0){
        foreach($responseArray as $respons){
            $movieName = $respons['show']['name'];
            if(!empty($movieName) && strtolower($movieName) == strtolower($searchMovie)){
                $resultArray[$movieName] = $respons;
            }
        }
    }
    /*
    print '<pre>';
    print_r($resultArray);
    print '</pre>';
    */

?>