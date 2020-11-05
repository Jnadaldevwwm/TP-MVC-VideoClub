<?php

    require_once 'controlers/VCIResa.php';
    require_once 'controlers/VCIResa2.php';
    
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
            
        default:
            require 'controlers/VCIAccueil.php';
            break;
    }