<?php

class VideoDAO{

    private static function ConnectVideo($user, $password){
        $host ='localhost';
        $bdd = 'video';

        try {
            $mysqlPDO = new PDO("mysql:host=$host;dbname=$bdd;charset=utf8",
            $user, $password,
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch(Exception $e) {
            die('<h1>Erreur de connexion : </h1>'.$e->getMessage());
        }
        return $mysqlPDO;
    }

    private static function DisconnectVideo($mysqlPDO){
        unset($mysqlPDO);
    }

    public static function ListeTypeFilms($user, $password){
        $mysqlPDO = VideoDAO::ConnectVideo($user, $password);
        $sql = 'SELECT CODE_TYPE_FILM, LIB_TYPE_FILM FROM typefilm ORDER BY LIB_TYPE_FILM';
       
        try{
            $res = $mysqlPDO->prepare($sql);
            $res->execute();
            $data=$res->fetchAll();
            $res->closeCursor();
            VideoDAO::DisconnectVideo($mysqlPDO);
        } catch(Exception $e) {
            die('<h1>Erreur de lecture en base de données : </h1>'.$e->getMessage());
        }
        return $data;
    }

    public static function RetourneTypeFilm($user, $password, $typevoulu){
        $mysqlPDO = VideoDAO::ConnectVideo($user, $password);

        $sql = 'SELECT CODE_TYPE_FILM, LIB_TYPE_FILM FROM typefilm WHERE CODE_TYPE_FILM=?';

        $res = $mysqlPDO->prepare($sql);
        $res->execute(array($typevoulu));

        $data = $res->fetch(PDO::FETCH_ASSOC);

        $res->closeCursor();
        VideoDAO::DisconnectVideo($mysqlPDO);

        return $data;
    }

    public static function ListeFilmsParType($user, $password, $typevoulu){
        $mysqlPDO = VideoDAO::ConnectVideo($user, $password);

        $sql = 'SELECT ID_FILM, TITRE_FILM, ANNEE_FILM, ID_REALIS, REF_IMAGE, RESUME, NOM_STAR, PRENOM_STAR FROM film f INNER JOIN star s ON f.ID_REALIS = s.ID_STAR WHERE CODE_TYPE_FILM=? ORDER BY TITRE_FILM';

        $res = $mysqlPDO->prepare($sql);
        $res->execute(array($typevoulu));

        $data = $res->fetchAll();

        $res->closeCursor();
        VideoDAO::DisconnectVideo($mysqlPDO);

        return $data;
    }
}
?>