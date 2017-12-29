<?php

function Addnewvalues($lingua,$regista,$genere,$attori,$descrizione,$durata,$imdbID){

  $connection = mysql_connect('127.0.0.1','root')
  or die ('Non riesco a connettermi al DB: '.mysql_error());
  mysql_select_db('DBFilm',$connection)
  or die ('Non trovo il DB: '.mysql_error());

  $splitlin = explode(", ", $lingua);
  $countsplitlin = count($splitlin);
  foreach($splitlin as $key => $val){

	for($i = 0; $i < strlen($val); $i++){
		if($val[$i]=="'"){
		$val[$i] = "/";
	}
}

    $sqllingua = "INSERT INTO Lingue (ImdbID, Lingua) VALUES('$imdbID','$val')";
    $rislingua = mysql_query($sqllingua)
    or die ('Query Lingue fallita: '.mysql_error());

  }

  $splitgen = explode(", ", $genere);
  $countsplitgen = count($splitgen);

  foreach($splitgen as $key => $val){
	for($i = 0; $i < strlen($val); $i++){
		if($val[$i]=="'"){
		$val[$i] = "/";
	}}
    $sqlgen = "INSERT INTO Genere (ImdbID, Nome) VALUES('$imdbID','$val')";
    $risgen = mysql_query($sqlgen)
    or die ('Query Genere fallita: '.mysql_error());

  }

  $splitatt = explode(", ", $attori);
  $countsplitatt = count($splitatt);
  foreach($splitatt as $key => $val){
	for($i = 0; $i < strlen($val); $i++){
		if($val[$i]=="'"){
		$val[$i] = " ";
	}}
    $sqlatt = "INSERT INTO Attori (ImdbID, Nome) VALUES('$imdbID','$val')";
    $risatt = mysql_query($sqlatt)
    or die ('Query Attori fallita: '.mysql_error());

  }
for($i = 0; $i < strlen($descrizione); $i++){
  if($descrizione[$i]=="'"){
    $descrizione[$i] = "/";
  }

}
  $sqlregista = "UPDATE Film SET Regista = '$regista' WHERE ImdbID LIKE '$imdbID'";
  $risreg = mysql_query($sqlregista)
  or die ('Query fallita: '.mysql_error());
  $sqldescrizione = "UPDATE Film SET Plot = '$descrizione' WHERE ImdbID LIKE '$imdbID'";
  $risdescr = mysql_query($sqldescrizione)
  or die ('Query fallita: '.mysql_error());
  $sqldurata = "UPDATE Film SET Durata ='$durata' WHERE ImdbID LIKE '$imdbID'";
  $risdurata = mysql_query($sqldurata)
  or die ('Query fallita: '.mysql_error());

  $conta = "SELECT Conta FROM Film WHERE ImdbID LIKE '$imdbID'";
  $getconta = mysql_query($conta)
  or die ('Query fallita getFilmCount: '.mysql_error());
  $valconta = mysql_fetch_array($getconta);
  if($valconta[0] == 0){
    $sql = "UPDATE Film SET Conta = 1 WHERE ImdbID = '$imdbID'";
  } else {
    $newconta = $valconta[0] + 1;
    $sql = "UPDATE Film SET Conta = '$newconta' WHERE ImdbID = '$imdbID'";
  }
  $ris = mysql_query($sql)
  or die ('Query UpdateFIlmCount fallita: '.mysql_error());

  mysql_close();

}


 ?>
