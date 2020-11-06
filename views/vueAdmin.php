<?php
      require_once '../views/inc/enteAdmin.php';
      require_once '../views/inc/titreAdmin.php';
      require_once '../views/inc/menuAdmin.php';

      function AffichageAdmin(){
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
                  </main>

            </body>
      </html>
      <?php            
      }
      ?>