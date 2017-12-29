<?php

function addnewsearch($cerca){

  $connection = mysql_connect('127.0.0.1','root')
  or die ('Non riesco a connettermi al DB: '.mysql_error());
  mysql_select_db('DBFilm',$connection)
  or die ('Non trovo il DB: '.mysql_error());

  $sql = "INSERT INTO Ricerche VALUES('$cerca', 1)";
  $ris = mysql_query($sql)
  or die ('Query fallita addnewsearch: '.mysql_error());
  mysql_close();

}
