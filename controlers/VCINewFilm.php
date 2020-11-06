<?php // ********** code PHP objet en couches ***************
 // script controleur saisie d'un nouveau film

// module presentation
require("../views/vueNewFilm.php");
// module DAO BDD Video
require("../models/video.PHP");
// pour se connecter а la BDD
$user = "utilweb";
$password = "utilweb";

//charger la liste des types de films en array()
$dataType = array();
$dataType = VideoDAO::ListeTypeFilms($user, $password);
// charger la liste des realisateurs
$dataReal = array();
$dataReal = VideoDAO::ListeRealisateurs($user, $password);
// afficher
AfficheFormNewFilm($dataType, $dataReal);
?>