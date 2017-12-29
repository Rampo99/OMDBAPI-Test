<?php

include 'JsonConnection.php';
include 'addnewsearch.php';
include 'AddValues.php';
include 'searchpastsearchs.php';

function getJsonValues($cerca){
	$DBPastResearchs = searchpastsearchs($cerca);
	If(!empty($DBPastResearchs)){

			} else {
	echo addnewsearch($cerca);
	}
	$titolo = "N/A";
	$anno = 0;
	$immagine = "N/A";
	$imdbID = "N/A";
	$risultato = JsonConnection($cerca);
	if(isset($risultato['Search'])){
		$y = $risultato['Search'];
		for($i = 0; $i < count($y); $i++){

			$risultati = $y[$i];

			if(isset($risultati['Title'])){
				$titolo = $risultati['Title'];
				}

			if(isset($risultati['Year'])){

				if(is_numeric($risultati['Year'])){
				$anno = $risultati['Year'];
				}

				} else {

				if(isset($risultati['Year'])){
				$anno = $risultati['Year'];
				}
				for($i = 0; $i < strlen($anno); $i++){

					if(!is_numeric($anno[$i])){

					$anno[$i] = "";

					}

				}

			}

			if(isset($risultati['Poster'])){
			$immagine = $risultati['Poster'];
		  }
			if(isset($risultati['imdbID'])){
			$imdbID = $risultati['imdbID'];
			}

			echo '<li class="w3-bar">
						<div class="w3-bar-item">';
			if (isset($immagine)) {
				echo '<div class="w3-bar-item">
				<img src="'.$immagine.' class="w3-border w3-padding" style="width:200px">
				</div>';
			}
			if (isset($titolo)) {
				echo '<span class="w3-large">'.$titolo.'</span><br />';
			}
			if (isset($anno)) {
				echo "<span>".$anno."</span><br />";
			}
			if(isset($imdbID)){
				echo '<form method="POST" action="Paginafilm.php">
				<span>
				<input type="hidden" name="hidden" value='.$imdbID.'>
				<input class="w3-input w3-border w3-light-grey" type="submit" value="Vai alla pagina del Film">
				</span></form>';
			}

			If(!empty($DBPastResearchs)){
			} else {
			echo AddValues($titolo, $anno, $immagine, $imdbID, $cerca);
			}
			echo "</div></li>";
	}
} else {
		echo "Nessun risultato trovato";
	}

}
