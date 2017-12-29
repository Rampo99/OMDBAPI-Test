<?php

function AddValues($titolo,$anno,$immagine,$imdbID,$cerca){

  $connection = mysql_connect('127.0.0.1','root')
  or die ('Non riesco a connettermi al DB: '.mysql_error());
  mysql_select_db('DBFilm',$connection)
  or die ('Non trovo il DB: '.mysql_error());
  for($i = 0; $i < strlen($titolo); $i++){
    if($titolo[$i] == "'"){
      $titolo[$i] = " ";
    }
  }

  $sql = "INSERT INTO Film(ImdbID,Nome,Titolo,Anno,Poster) VALUES('$imdbID','$cerca','$titolo',$anno,'$immagine')";
  $ris = mysql_query($sql)
  or die ('Query fallita AddValues: '.mysql_error());
  mysql_close();

}

 ?>
