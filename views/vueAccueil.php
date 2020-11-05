<?php 

require_once 'views/inc/entete.php';
require_once 'views/inc/titre.php';
require_once 'views/inc/menu.php';

function AfficheEcranAccueil(){
    afficheEntete();
    ?>
    </head>
    <body>
        <header>
            <?php afficheTitre(); ?>
        </header>
        <nav>
            <?php afficheMenu(); ?>
        </nav>
        <main>
            <h1>
                Bienvenue sur le siet du Vidéo Club !
            </h1>
        </main>

    </body>
</html>

<?php } ?>