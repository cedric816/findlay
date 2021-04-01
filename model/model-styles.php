<?php

    class Style{

        private $_pdo;

        public function __construct($pdo){
            $this->_pdo = $pdo;
        }
        
        public function lireTous(){
            $req = "SELECT * FROM `styles` ORDER BY `style_name` COLLATE utf8mb4_general_ci";
            $prep = $this->_pdo->prepare($req);
            $prep->execute();
            return $prep;
        }

        public function creer($nomStyle, $idGenre){
            $req = "INSERT INTO `styles` (`style_name`, `style_genre_id`)
                    VALUES(:styleName, :genreId)";
            $prep = $this->_pdo->prepare($req);
            $prep->execute(array(
                ':styleName' => $nomStyle,
                ':genreId' => $idGenre
            ));
        }

        public function modifier($nom, $id){
            $req = "UPDATE `styles` SET `style_name` = :nom WHERE `style_id` = :id";
            $prep = $this->_pdo->prepare($req);
            $prep->execute(array(
                ':nom' => $nom,
                ':id' => $id
            ));
        }

        public function supprime($id){
            $req1 = "DELETE FROM `artists_styles` WHERE `artist_style_style_id` = :id";
            $prep1 = $this->_pdo->prepare($req1);
            $prep1->execute(array(
                ':id' => $id
            ));

            $req = "DELETE FROM `styles` WHERE `style_id` = :id";
            $prep = $this->_pdo->prepare($req);
            $prep->execute(array(
                ':id' => $id
            ));
        }

    }
?>