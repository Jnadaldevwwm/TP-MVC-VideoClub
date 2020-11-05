<?php
    function resa2(){
        require_once 'views/vueResa2.php';
        require_once 'models/video.php';

        $user = 'utilweb';
        $password = 'utilweb';

        $rowTypeFilm = VideoDAO::RetourneTypeFilm($user, $password, $_GET['typef']);

        $dataFilms = array();
        $dataFilms = VideoDAO::ListeFilmsParType($user, $password, $_GET['typef']);

        AfficheListeFilms($rowTypeFilm, $dataFilms);
    }
?>