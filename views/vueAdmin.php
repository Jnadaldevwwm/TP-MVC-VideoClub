<?php
      require_once '../views/inc/enteAdmin.php';
      require_once '../views/inc/titreAdmin.php';
      require_once '../views/inc/menuAdmin.php';

      function AffichageAdmin(){
            if(isset($_GET['error'])){
                  $erreur = $_GET['error'];
            } else {
                  $erreur ='';
            }
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
                        Administration du Vidéo-Club
                        </h1>
                        <?php 
                        if($erreur != '') echo "<div class='important centrer erreur'>".$erreur.'</div>';
                        ?>
                  </main>

            </body>
      </html>
      <?php            
      }
      ?>