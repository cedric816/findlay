<?php
//liste des artistes pour le style choisi
echo("<div class='resultat-tri'>
    <h2>Artistes du style '".$nom."':</h2><div>");
    while ($artiste = $artistes->fetch()){
        echo("<p>".$artiste['artist_name']."</p>");
    }
echo("</div><a href='?styles'>Fermer</a></div>");
?>