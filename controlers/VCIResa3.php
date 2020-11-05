<?php
    function resa3(){
        require_once 'views/vueResa3.php';

        $dataFilm['filmchoisi'] = htmlentities($_GET['filmchoisi']);
        $dataFilm['libfilmchoisi'] = htmlentities($_GET['libfilmchoisi']);
        $dataFilm['affiche'] = htmlentities($_GET['affiche']);
        $dataFilm['anfilmchoisi'] = htmlentities($_GET['anfilmchoisi']);
        $dataFilm['reafilmchoisi'] = htmlentities($_GET['reafilmchoisi']);

        AfficheFormSaisieAdherent($dataFilm);
    }