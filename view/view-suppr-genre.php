<?php
echo("<div class='modif-nom-genre'>
    <form method='post'>
    <h2>Supprimer le genre '".htmlentities($nom, ENT_QUOTES)."' ?</h2>
    <input type='hidden' name='genre-id' value=".$id.">
    <input type='submit' name='confirme-suppr-genre' value='Oui'>
    <a href=?genres>Annuler</a>
    </form>
    </div>");
?>