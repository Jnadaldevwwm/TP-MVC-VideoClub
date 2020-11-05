<?php

    require_once 'controlers/VCIResa.php';
    require_once 'controlers/VCIResa2.php';
    require_once 'controlers/VCIResa3.php';
    require_once 'controlers/VCIResa4.php';
    require_once 'controlers/VCIAdmin.php';
    
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    
    switch ($action) {
        case 'accueil':
            require 'controlers/VCIAccueil.php';
            break;
        
        case 'reserve':
            resa();
        break;

        case 'choixtype':
            resa2();
        break;

        case 'constru':
            require 'controlers/VCIConstru.php';
        break;
            
        case 'resa3' :
            resa3();
        break;

        case 'resa4':
            resa4();
        break;

        case 'admin':
            admin();
        break;

        default:
            require 'controlers/VCIAccueil.php';
            break;
    }