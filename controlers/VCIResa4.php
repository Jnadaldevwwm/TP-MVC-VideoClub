<?php

    function resa4(){
        require 'views/vueResa4.php';
        require 'models/video.php';

        $cejour = getdate();
        $libcejour = $cejour['year'].'-'.$cejour['mon'].'-'.$cejour['mday'];

        $dataResa['numadherent'] = htmlentities($_GET['numadherent']);
        $dataResa['nom'] = htmlentities($_GET['nom']);
        $dataResa['codfil'] = htmlentities($_GET['codfil']);
        $dataResa['libfil'] = htmlentities($_GET['libfil']);
        $dataResa['libcejour'] = $libcejour;

        $user = 'utilweb';
        $password = 'utilweb';

        AfficheDebutPage();

        if(!(VideoDAO::ExisteAdherent($user,$password,$dataResa))){
            AfficheErreurAdherentInconnu();
        } else if(VideoDAO::ExisteResaPourCeClient($user,$password,$dataResa)){
            AfficheErreurResa($dataResa);
        } else {
            VideoDAO::InsereResa($user,$password,$dataResa);
            AfficheOKResa($dataResa);
        }
    }
