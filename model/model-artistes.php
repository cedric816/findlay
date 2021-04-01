<?php

class Artiste{
    private $_pdo;

    function __construct($pdo){
        $this->_pdo=$pdo;
    }

    public function creer($nom){
        $req = "INSERT INTO `artists` (`artist_name`)
                VALUES (:nom)";
        $prep = $this->_pdo->prepare($req);
        $prep->execute(array(
            ':nom' => $nom
        ));
    }

    public function lireTous(){
        $req = "SELECT * FROM `artists` ORDER BY `artist_name` COLLATE utf8mb4_general_ci";
        $prep = $this->_pdo->prepare($req);
        $prep->execute();
        return $prep;
    }

    public function lireStyles($idArtiste){
        $req = "SELECT * FROM `styles` 
                WHERE `style_id` IN(SELECT `artist_style_style_id` FROM `artists_styles` 
                WHERE `artist_style_artist_id` = :id ORDER BY `style_name` COLLATE utf8mb4_general_ci)";
        $prep = $this->_pdo->prepare($req);
        $prep->execute(array(
            ':id' => $idArtiste
        ));
        return $prep;
    }

    public function lireStylesTous(){
        $req = "SELECT * FROM `styles` ORDER BY `style_name` COLLATE utf8mb4_general_ci";
        $prep = $this->_pdo->prepare($req);
        $prep->execute();
        return $prep;
    }

    public function ajouterStyle($idArtiste, $idStyle){
        $req = "INSERT INTO `artists_styles`(`artist_style_artist_id`, `artist_style_style_id`)
                VALUES (:artistId, :styleId)";
        $prep = $this->_pdo->prepare($req);
        $prep->execute(array(
            ':artistId' => $idArtiste,
            ':styleId' => $idStyle
        ));
    }

    public function modifierNom($idArtiste, $nom){
        $req = "UPDATE `artists`
                SET `artist_name` = :nom
                WHERE `artist_id` = :id";
        $prep = $this->_pdo->prepare($req);
        $prep->execute(array(
            ':nom' => $nom,
            ':id' => $idArtiste
        ));
    }

    public function supprimer($idArtiste){
        $req1 = "DELETE FROM `artists_styles`
                WHERE `artist_style_artist_id` = :id";
        $prep1 = $this->_pdo->prepare($req1);
        $prep1->execute(array(
            'id' => $idArtiste
        ));

        $req = "DELETE FROM `artists`
                WHERE `artist_id` = :id";
        $prep = $this->_pdo->prepare($req);
        $prep->execute(array(
            ':id'=> $idArtiste
        ));
    }
}
