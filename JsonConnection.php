<?php

function JsonConnection($cerca){

$contenuto = file_get_contents("http://www.omdbapi.com/?s=".$cerca."&plot=full&apikey=PUT YOUR KEY HERE");
$json = json_decode($contenuto, true);
return $json;

}
