<?php
    class MFilm{
        private $ID_FILM;
        private $CODE_TYPE_FILM;
        private $ID_REALIS;
        private $TITRE_FILM;
        private $ANNE_FILM;
        private $REF_IMAGE;
        private $RESUME;

        public function __construct(){}

        public function getID_FILM(){
            return this->ID_FILM;
        }
        public function getCODE_TYPE_FILM(){
            return this->CODE_TYPE_FILM;
        }
        public function getID_REALIS(){
            return this->ID_REALIS;
        }
        public function getTITRE_FILM(){
            return this->TITRE_FILM;
        }
        public function getANNE_FILM(){
            return this->ANNE_FILM;
        }
        public function getREF_IMAGE(){
            return this->REF_IMAGE;
        }
        public function getRESUME(){
            return this->RESUME;
        }

        public function setID_FILM($value){
            $this->ID_FILM = $value;
        }
        public function setID_REALIS($value){
            $this->ID_REALIS = $value;
        }
        public function setCODE_TYPE_FILM($value){
            $this->CODE_TYPE_FILM = $value;
        }
        public function setTITRE_FILM($value){
            $this->TITRE_FILM = strtoupper($value);
        }
        public function setANNE_FILM($value){
            $this->ANNE_FILM = $value;
        }
        public function setREF_IMAGE($value){
            $this->REF_IMAGE = $value;
        }
        public function setRESUME($value){
            $this->RESUME = ucfirst($value);
        }
        
        public function __toString(){
            return "Film : ". $this->ID_FILM." - ". $this->TITRE_FILM. " (". $this->ANNEE_FILM. ")";
        }

    }