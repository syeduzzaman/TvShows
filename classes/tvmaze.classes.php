<?php

class Tvmaze {

    //Method
    public function getDetails($searchMovie){

        $api_link = "https://api.tvmaze.com/search/shows?q=".$searchMovie;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL,$api_link);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $responseJson = curl_exec($curl);
        $responseArray = json_decode($responseJson, true);
        $resultArray = array();
        if(count($responseArray)>0){ 
            foreach($responseArray as $respons){
                $movieName = $respons["show"]["name"];
                //Only the movies with exact name match(non-case-sensitive) is considered
                if(!empty($movieName) && strtolower($movieName) == strtolower($searchMovie)){
                    $resultArray[$movieName] = $respons;
                }
            }
        }

        $resultArray = count($resultArray) > 0 ? $resultArray : $resultArray = array("Error"=>"No Movie Found!");

        $resultJson = json_encode($resultArray);
        return $resultJson;

    }

}


?>