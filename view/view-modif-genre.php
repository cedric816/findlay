<?php
echo("<div class='modif-nom-genre'><form method='post'>
    <h2>Ancien nom: ".htmlentities($nom, ENT_QUOTES)."</h2></br>
    <label for='nom'>Nouveau nom:</label>
    <input type='text' name='nom' required>
    <input type='hidden' name='id' value=".$id.">
    <input class='btn-generique' type='submit' name='valider-nom' value='Valider le nouveau nom'>
    <a href=?genres>Annuler</a>
</form></div>")
?>