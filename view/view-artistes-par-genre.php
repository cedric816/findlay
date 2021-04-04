<?php
//liste des artistes pour le genre choisi
echo("<div class='resultat-tri'>
    <h2>Artistes du genre '".$nom."':</h2><div>");
    while ($artiste = $artistes->fetch()){
        echo("<p>".$artiste['artist_name']."</p>");
    }
echo("</div><a href='?genres'>Fermer</a></div>");
?>