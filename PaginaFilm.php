<?php

include 'Addnewvalues.php';
include 'Filmpagevalue.php';

$imdbID = $_POST['hidden'];
$x = filmpagevalues($imdbID);


  $contenuto = file_get_contents('http://www.omdbapi.com/?i='.$imdbID.'&apikey=20ef005e');
  $risultati = json_decode($contenuto, true);
     $titolo = $risultati['Title'];
     $anno = $risultati['Year'];
     $immagine = $risultati['Poster'];
     if(isset($risultati['Runtime'])){
       $durata = $risultati['Runtime'];
     }
     if(isset($risultati['Genre'])){
       $genere = $risultati['Genre'];
     }
     if(isset($risultati['Director'])){
     $regista = $risultati['Director'];
     }
     if(isset($risultati['Actors'])){
     $attori = $risultati['Actors'];
     }
     if(isset($risultati['Plot'])){
     $descrizione = $risultati['Plot'];
     }
     if(isset($risultati['Language'])){
     $lingua = $risultati['Language'];
     }
     if(empty($x)){
     echo Addnewvalues($lingua,$regista,$genere,$attori,$descrizione,$durata,$imdbID);
    }


?>


<html>
<title><?php
echo $titolo;
?>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
  <header class="w3-container w3-teal">
    <div class="w3-bar-item w3-animate-top">
      <h1><?php
      echo $titolo;
      ?><h1>
  </header>
  <div class="w3-bar-item">
    <div class="w3-bar-item w3-animate-left" style="float: left">
    <img src=<?php echo $immagine; ?> class="w3-border w3-padding" style="width:300px">
    </div>
    <div class="w3-bar-item w3-animate-left">
    Titolo: <span class="w3-large"><?php echo $titolo;?> </span><br />
    Anno: <span class="w3-large"><?php echo $anno;?> </span><br />
    Durata: <span class="w3-large"><?php echo $durata;?> </span><br />
    Genere: <span class="w3-large"><?php echo $genere;?> </span><br />
    Regista: <span class="w3-large"><?php echo $regista;?> </span><br />
    Attori: <span class="w3-large"><?php echo $attori;?> </span><br />
    Descrizione: <span class="w3-large"><?php echo $descrizione;?> </span><br />
    Lingue: <span class="w3-large"><?php echo $lingua;?> </span><br />

  </div>
</div>
</body>
</html>
