<?php

include 'getJsonValues.php';
include 'DBConnection.php';
include 'Updatesearch.php';

$cerca = $_POST['Cerca'];
for($i = 0; $i < strlen($cerca); $i++){
  if($cerca[$i] == " "){
    $cerca[$i] = "+";
  }
}

?>

<html>
<title>Ricerca Film</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
<form method="POST" action="Risultati.php">
  <header class="w3-container w3-teal">
    <div class="w3-bar-item w3-animate-top">
    	<h1>Ricerca Film<h1>
    </div>
        <input type="text" name="Cerca" placeholder="Inserisci il nome del Film" value=<?php echo $cerca; ?> />
        <input type="submit" value="Cerca"/>
      </form>
    </div>
    <br /><br />
  </header>

<div class="w3-container">
  <p>Ecco i risultati della tua ricerca:</p>
    <ul class="w3-ul w3-card-4 w3-hoverable" style="width:60%">
<?php

$cerca = $_POST['Cerca'];
$cerca = strtolower($cerca);
for($i = 0; $i < strlen($cerca); $i++){
  if($cerca[$i] == " "){
    $cerca[$i] = "+";
  }
}

$DBPastResearchs = Connection($cerca);
If(!empty($DBPastResearchs)){
echo updatesearch($cerca);
}

echo getJsonValues($cerca);


?>
</ul>
</div>
</body>
</html>
