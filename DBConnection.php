<?php

function Connection($cerca){

  $connection = mysql_connect('127.0.0.1','root')
  or die ('Non riesco a connettermi al DB: '.mysql_error());
  mysql_select_db('DBFilm',$connection)
  or die ('Non trovo il DB: '.mysql_error());

$sql = "SELECT Nome FROM Ricerche WHERE Nome LIKE '$cerca'";
$ris = mysql_query($sql)
or die ('Query fallita: '.mysql_error());
$tuple = mysql_fetch_array($ris);
return $tuple[0];
mysql_close();
}
