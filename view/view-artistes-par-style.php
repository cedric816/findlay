<?php
//liste des artistes pour le style choisi
echo("<div class='resultat-tri'>
    <h2>Artistes du style '".$nom."':</h2>");
    while ($artiste = $artistes->fetch()){
        echo("<p>".$artiste['artist_name']."</p>");
    }
echo("<a href='?styles'>OK</a></div>");
?>