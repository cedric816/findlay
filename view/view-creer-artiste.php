<?php
echo("<div class='modif-nom-artiste'>
        <form method='post'>
            <label for='artist-name'>Nom du nouvel artiste:</label>
            <input type='text' id='artist-name' name='artist_name' value='' required>
            <input class='btn-generique' type='submit' name='confirme-creer-artiste' value='Créer'>
            <a href=?artistes>Annuler</a>
        </form></div>");
?>