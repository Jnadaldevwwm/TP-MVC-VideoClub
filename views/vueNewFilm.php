<?php

    require_once '../views/inc/enteAdmin.php';
    require_once '../views/inc/titreAdmin.php';
    require_once '../views/inc/menuAdmin.php';

    function AfficheFormNewFilm($dataType, $dataReal){
        afficheEntete();
        ?>
        </head>
        <body class="admin">
              <header>
                    <?php afficheTitre(); ?>
              </header>
              <nav>
                    <?php afficheMenu(); ?>
              </nav>
              <main>
                    <h1>
                        Saisie d'un nouveau film
                    </h1>
                    <table>
                        <form>
                            <tr>
                                <td>Titre :</td>
                                <td><input type="text" name="titre" id=""></td>
                            </tr>
                            <tr>
                                <td>Type de film :</td>
                                <td><select name="typefilm" id="">
                                    <?php
                                        foreach($dataType as $rowType){
                                            ?>
                                            <option value="<?= $rowType['CODE_TYPE_FILM']?>"><?= $rowType['LIB_TYPE_FILM']?></option>
                                        <?php
                                        }
                                        ?>
                                </select></td>
                            </tr>
                            <tr>
                                <td>Réalisateur</td>
                                <td><select name="realfilm" id="">
                                    <?php
                                            foreach($dataReal as $rowReal){
                                                ?>
                                                <option value="<?= $rowReal['ID_STAR']?>"><?= $rowReal['NOM_STAR'].' '.$rowReal['PRENOM_STAR']?></option>
                                            <?php
                                            }
                                            ?>
                                </select></td>
                            </tr>
                            <tr>
                                <td>Année de sortie :</td>
                                <td><input type="text" name="annee" id=""></td>
                            </tr>
                            <tr>
                                <td>Affiche : </td>
                                <td><input type="text" name="affiche" id=""></td>
                            </tr>
                            <tr>
                                <td>Résumé :</td>
                                <td><textarea name="resume" id="" cols="30" rows="10"></textarea></td>
                            </tr>
                            <tr>
                                <td><input type="submit" value="Créer"></td>
                                <td><input type="reset" value="Recommencer"></td>
                            </tr>
                            
                        </form>
                    </table>






              </main>

        </body>
  </html>

<?php
    }
    ?>