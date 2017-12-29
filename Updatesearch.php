<?php

function updatesearch($cerca){

  $connection = mysql_connect('127.0.0.1','root')
  or die ('Non riesco a connettermi al DB: '.mysql_error());
  mysql_select_db('DBFilm',$connection)
  or die ('Non trovo il DB: '.mysql_error());

  $conta = "SELECT Conta FROM Ricerche WHERE Nome LIKE '$cerca'";
  $getconta = mysql_query($conta)
  or die ('Query fallita: '.mysql_error());
  $valconta = mysql_fetch_array($getconta);
  $newconta = $valconta[0] + 1;
  $sql = "UPDATE Ricerche SET Conta = '$newconta' WHERE Nome = '$cerca'";
  $ris = mysql_query($sql)
  or die ('Query fallita: '.mysql_error());
  mysql_close();

}

 ?>
