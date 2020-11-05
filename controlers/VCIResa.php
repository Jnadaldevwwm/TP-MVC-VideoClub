<?php
    function resa(){
        require_once 'views/vueResa.php';
        require_once 'models/video.php';

        $user = 'utilweb';
        $password = 'utilweb';

        $data = array();
        $data = VideoDAO::ListeTypeFilms($user, $password);

        AfficheListeTypeFilms($data);
    }

?>