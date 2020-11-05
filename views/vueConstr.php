<?php

    require_once 'views/inc/entete.php';
    require_once 'views/inc/titre.php';
    require_once 'views/inc/menu.php';

    function AfficheEcranConstruction(){
        afficheEntete();
        ?>
        <meta http-equiv="refresh" content="3;url=?action='accueil'" />
    </head>
    <body>
        <header>
            <?php afficheTitre(); ?>
        </header>
        <nav>
            <?php afficheMenu(); ?>
        </nav>
        <main>
            <span class="constrLogo"><img src="public/images/constrct.gif" ></span>

            <h2 class="constrTitre">
                    Site en construction ; <br />
                    merci de repasser plus tard.
            </h2>
	
        </main>
    </body>
</html>
<?php } ?>