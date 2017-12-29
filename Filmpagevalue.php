<?php

function filmpagevalues($imdbID){

  $connection = mysql_connect('127.0.0.1','root')
  or die ('Non riesco a connettermi al DB: '.mysql_error());
  mysql_select_db('DBFilm',$connection)
  or die ('Non trovo il DB: '.mysql_error());

  $sql = "SELECT * FROM Film WHERE ImdbID LIKE '$imdbID' AND Durata <> 0";
  $ris = mysql_query($sql)
  or die ('Query fallita: '.mysql_error());
  $tuple = mysql_fetch_array($ris);
  mysql_close();
  return $tuple[0];
}


 ?>
