<?php
//liste des artistes pour le genre choisi
echo("<div class='resultat-tri'>
    <h2>Artistes du genre '".$nom."':</h2>");
    while ($artiste = $artistes->fetch()){
        echo("<p>".$artiste['artist_name']."</p>");
    }

echo("<a href='?genres'>OK</a></div>");
?>