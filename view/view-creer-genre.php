<?php
echo("<div class='modif-nom-genre'>
        <form method='post'>
            <label for='genre-name'>Nom du nouveau genre:</label>
            <input type='text' id='genre-name' name='genre-name' value='' required>
            <input class='btn-generique' type='submit' name='confirme-creer-genre' value='Créer'>
            <a href=?genres>Annuler</a>
        </form></div>");
?>