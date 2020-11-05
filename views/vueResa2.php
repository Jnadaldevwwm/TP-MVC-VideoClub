<?php

    require_once 'views/inc/entete.php';
    require_once 'views/inc/titre.php';
    require_once 'views/inc/menu.php';

    function AfficheListeFilms($rowTypeFilm, $dataFilms){
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
            <h1>Liste des films du type <?= $rowTypeFilm['LIB_TYPE_FILM'];?></h1>
            <?php
                if(count($dataFilms)==0){
                    ?>
                    <div class='center'>
                        <span class='erreur'>Désolé, aucun film disponible pour le type <?= $rowTypeFilm['LIB_TYPE_FILM'];?></span>
                    </div>
                    <?php
                } else {
                    ?>
                    <h2>Sélectionnez le film que vous désirez réserver :</h2>
                    <div class="centrer cent">
                        <table class="listefilms">
                            <tr>
                                <th >Titre du film</th>
                                <th >Son année</th>
                                <th colspan="2">Réalisateur</th>
                                <th >Affiche</th>
                            </tr>
                            <?php
                                foreach($dataFilms as $rowFilm){
                                    ?>
                                    <tr>
                                        <td> <a href="?action=resa3&filmchoisi=<?= $rowFilm['ID_FILM'] ;?>&libfilmchoisi=<?= urlencode($rowFilm['TITRE_FILM']) ;?>&anfilmchoisi=<?= $rowFilm['ANNEE_FILM'] ; ?>&reafilmchoisi=<?= urlencode($rowFilm['PRENOM_STAR'] . ' ' . $rowFilm['NOM_STAR']);?>&affiche=<?= urlencode($rowFilm['REF_IMAGE']) ; ?>"><?= $rowFilm['TITRE_FILM'] ; ?> </a></td>
                                        <td> <?= $rowFilm['ANNEE_FILM'] ; ?></td>
                                        <td> <?= $rowFilm['NOM_STAR'] ; ?></td>
                                        <td> <?= $rowFilm['PRENOM_STAR'] ; ?></td>
                                        <td><a href="VCIResa3.php?filmchoisi=<?= $rowFilm['ID_FILM'];?>&libfilmchoisi=<?= urlencode($rowFilm['TITRE_FILM']);?>&anfilmchoisi=<?= $rowFilm['ANNEE_FILM'] ;?>&reafilmchoisi=<?= urlencode($rowFilm['PRENOM_STAR'] . ' ' .$rowFilm['NOM_STAR']) ;?>&affiche=<?= urlencode($rowFilm['REF_IMAGE']) ; ?>"><img border="0" src="public/images/affiches/<?= $rowFilm['REF_IMAGE'] ;?>" title="<?= $rowFilm['RESUME'];?>"></a></td>
                                    </tr> 
                                <?php
                                }
                                ?>
                    </table>
                </div>
                <?php
                }
                ?>
                <div class="centrer cent">
                    <table border="0" width="80%">
                        <tr>
                            <td width="50%" align="right">
                                <form action="">
                                    <input type="hidden" name="action" value="reserve">
                                    <input type="submit" value="Autre type de film">
                                </form>
                            </td>
                            <td width="50%" align="left">
                                <form action="">
                                <input type="hidden" name="action" value="accueil">
                                    <input type="submit" value="Retour accueil">
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </main>
        </body>
    </html>
    <?php
    }
    ?>