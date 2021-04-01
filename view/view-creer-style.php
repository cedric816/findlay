<?php
echo("<div class='modif-nom-style'>
        <form method='post'>
            <label for='style-name'>Nom du nouveau style:</label>
            <input type='text' id='style-name' name='style-name' value='' required>
            <label for='genre'>A quel genre appartient ce style?</label>
            <select name='genre-id'>");
                while($genre = $genreTous->fetch()){
                    echo("<option value=".$genre['genre_id'].">".htmlentities($genre['genre_name'], ENT_QUOTES)."</option>");
                }   
            echo("</select>
            <input class='btn-generique' type='submit' name='confirme-creer-style' value='Créer'>
            <a href=?styles>Annuler</a>
        </form></div>");
?>