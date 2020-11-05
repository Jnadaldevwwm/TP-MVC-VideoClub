<?php
    require_once 'views/inc/entete.php';
    require_once 'views/inc/titre.php';
    require_once 'views/inc/menu.php';

    function AfficheDebutPage(){
        $cejour = getDate();
        $libcejour = $cejour['year'] . "-" . $cejour['mon'] . '-' . $cejour['mday'];
        afficheEntete();
        ?>
        </head>
        <body >
        <header>
            <?php afficheTitre(); ?>
        </header>
        <nav>
            <?php afficheMenu(); ?>
        </nav>
        <main>
        <h1 >Réservation de film</h1>
        <?php
        }

    function AfficheErreurAdherentInconnu(){
        ?>
        <div class="centrer erreur">
            Attention : les coordonnées client saisies sont erronnées !
            <form>
                <input type="button" value="Retour"onClick="javascript:history.go(-1)">
            </form>
        </div>
        <?php
            AfficheFinPage();
    }
    
    function AfficheErreurResa($dataResa){
        ?>
        <div class="centrer erreur">
            Attention : il y a déjà une réservation du film "<span class ="important"><?= $_GET["libfil"]; ?></span>" pour l'adhérent <span class ="important"><?= $_GET["nom"]?></span>
            <form>
                <input type="button" value="Retour" onClick="javascript:history.go(-1)">
            </form>
        </div>
        <?php
            AfficheFinPage();
    }

    function AfficheOKResa($dataResa){
        ?>
        <div class="centrer">
            <h2>Merci <span class ="important"><?= $_GET["nom"]; ?></span> pour votre réservation.</h2>
            <p>
                Il ne vous reste plus qu'à passer en boutique pour retirer votre exemplaire du film<span class ="important"><?= $_GET["libfil"]; ?></span>
            </p>
            <form>
                <input type="hidden" name="action" value="accueil">
                <input type="button" value="Retour au menu" onClick="javascript:window.location.href='index.php';">
            </form>
        </div>
        <?php
            AfficheFinPage();
    }

    function AfficheFinPage(){
        ?>
        </main>
        </body>
        </html>
        <?php
    }
    ?>