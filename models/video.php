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

    public static function ExisteAdherent($user,$password,$dataResa){
        $mysqlPDO = VideoDAO::ConnectVideo($user, $password);

        $sql = 'SELECT * FROM adherent WHERE NUM_ADHERENT=? AND NOM_ADHERENT=?';

        $res = $mysqlPDO->prepare($sql);
        $res->execute(array($dataResa['numadherent'],$dataResa['nom']));

        $data = $res->fetchAll();

        $nombre = count($data);

        $res->closeCursor();
        VideoDAO::DisconnectVideo($mysqlPDO);

        return ($nombre != 0);
    }

    public static function ExisteResaPourCeClient($user,$password,$dataResa){
        $mysqlPDO = VideoDAO::ConnectVideo($user,$password);

        $sql = 'SELECT * FROM location WHERE NUM_ADHERENT = ? AND ID_FILM = ? AND DEBUT_LOCATION = ?';

        $res = $mysqlPDO->prepare($sql);
        $res->execute(array($dataResa['numadherent'],$dataResa['codfil'],$dataResa['libcejour']));

        $data = $res->fetchAll();

        $nombre = count($data);
        $res->closeCursor();
        VideoDAO::DisconnectVideo($mysqlPDO);

        return ($nombre != 0);
    }

    public static function InsereResa($user,$password,$dataResa){
        $mysqlPDO = VideoDAO::ConnectVideo($user,$password);

        $sql = "insert into location (NUM_ADHERENT, ID_FILM,CODE_SUPPORT, DEBUT_LOCATION) values(:numadherent ,:codfil ,\"D\",:libcejour)";

        $res = $mysqlPDO-> prepare($sql);

        $res->execute(array(':numadherent' =>$dataResa["numadherent"],':codfil'=> $dataResa["codfil"],':libcejour' =>$dataResa["libcejour"]));


        $nombre = $res->rowCount();

        $res->closeCursor();
        VideoDAO::DisconnectVideo($mysqlPDO);
    }

    public static function ListeRealisateurs($user,$password){
        $mysqlPDO = VideoDAO::ConnectVideo($user,$password);

        $sql = 'SELECT * FROM star ORDER BY NOM_STAR';

        $res = $mysqlPDO->prepare($sql);
        $res->execute();

        $data = $res->fetchAll();

        $res->closeCursor();
        VideoDAO::DisconnectVideo($mysqlPDO);

        return $data;
    }

    public static function InsereNewFilm($newFilm, $user, $password){
        $mysqlPDO = VideoDAO::ConnectVideo($user,$password);
        $sql = 'INSERT INTO film(ID_FILM, TITRE_FILM, ID_REALIS,
        CODE_TYPE_FILM, ANNEE_FILM, REF_IMAGE, RESUME) VALUES (';

        $sql .= $newFilm->getID_FILM().', ';
        $sql .= $newFilm->getTITRE_FILM().', ';
        $sql .= $newFilm->getID_REALIS().', ';
        $sql .= $newFilm->getCODE_TYPE_FILM().', ';
        $sql .= $newFilm->getANNEE_FILM().', ';
        $sql .= $newFilm->getREF_IMAGE().', ';
        $sql .= $newFilm->getRESUME().')';

        $res = $mysqlPDO->prepare($sql);
        $res->execute();

        $res->closeCursor();
        VideoDAO::DisconnectVideo($mysqlPDO);
    }
}
?>