<?php
//constantes de connexion à la BDD
  const DB_HOST    = "localhost";
  const DB_NAME    = "musiques";
  const DB_LOGIN   = "nom_utilisateur_choisi";
  const DB_PASS    = "mot_de_passe_solide";

  const DB_DRIVER  = "mysql";
  const DB_CHARSET = "utf8mb4";
//options PDO 
  const DB_OPTIONS = [
    PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // turn on errors in the form of exceptions, good for dev (so no good for prod ^^)
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // make the default fetch be an associative array
    PDO::MYSQL_ATTR_FOUND_ROWS   => true // track affected SQL rows, using rowCount
  ];

  try {
    // création objet PDO
    $pdo = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
  } catch (PDOException $e) {
    $pdo = NULL; // gestion des éventuelles erreurs
    exit("OOPS - DB error : " . $e->getMessage());
  }

  ?>