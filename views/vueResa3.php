<?php
      require_once 'views/inc/entete.php';
      require_once 'views/inc/titre.php';
      require_once 'views/inc/menu.php';

      function AfficheFormSaisieAdherent($dataFilm){
          afficheEntete();
          ?>
          <script type="text/javascript">
            function vazy(){
                var erreur = false;
                if(!(erreur)){
                    document.getElementById('coordonnee').submit();
                }
            }
          </script>
          </head>
          <body onload="document.getElementById('nom').focus();">
          <header>
            <?php afficheTitre(); ?>
          </header>
          <nav>
             <?php afficheMenu(); ?>
          </nav>
          <main>
          <form id="coordonnee" action="" method = "get">
          <input type="hidden" name="action" value="resa4">
            <input type = "hidden" name="codfil" value="<?= $_GET['filmchoisi']; ?>">
            <input type="hidden" name ="libfil" value="<?= $_GET['libfilmchoisi'] ;?>">
            <h1 >Voici le film que vous avez sélectionné</h1>
            <div class="centrer cent">
                <table class="recap">
                    <tr>
                        <td rowspan="3"><img src="public/images/affiches/<?= $_GET['affiche'] ;?>" /></td>
                        <td>titre :</td>
                        <th><?= $_GET['libfilmchoisi']; ?></th>
                    </tr>
                    <tr>
                        <td>année :</td>
                        <th><?= $_GET['anfilmchoisi']; ?></th>
                    </tr>
                    <tr>
                        <td>réalisateur :</td>
                        <th><?= $_GET['reafilmchoisi']; ?></th>
                    </tr>
                </table>
                <h2 >Veuillez saisir vos coordonnées:</h2>
                <table class="recap">
                <tr>
                    <td>Nom : </td>
                    <td> <input type="text" name="nom" id=""> </td>
                </tr>
                <tr>
                    <td>N° adhérent</td>
                    <td> <input type="text" name="numadherent" id=""> </td>
                </tr>
                <tr>
                    <td></td>
                    <td> <input type="submit" value="Réserver"> 
                     <button type="cancel" onclick="javascript:history.go(-1)">Annuler</button></td>
                </tr>
                </table>
            </div>
          </form>
        </main>
    </body>
</html>
<?php
      }
?>