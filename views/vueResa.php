<?php

    require_once 'views/inc/entete.php';
    require_once 'views/inc/titre.php';
    require_once 'views/inc/menu.php';

    function AfficheListeTypeFilms($data){
        afficheEntete();
        ?>
        <script type="text/javascript">
            function vazy(){
                if(!document.getElementById('typef').value==''){
                    document.getElementById('f_type').submit();
                }
            }
        </script>
        </head>
        <body>
            <header>
                <?php afficheTitre(); ?>
            </header>
            <nav>
                <?php afficheMenu(); ?>
            </nav>
            <main>
                <h1> Sélectionnez le type de film que vous recherchez :</h1>
                <form action="" id="f_type" method = "get">
                    <input type="hidden" name="action" value="choixtype">
                    <table class="cent">
                        <tr>
                            <td class="centrer">
                                <select name="typef" id="typef" onchange="vazy()" >
                                    <option selected value="">&lt;Sélectionnez le type recherché&gt;</option>
                                    <?php
                                        foreach($data as $row){
                                            ?>
                                            <option value="<?= $row['CODE_TYPE_FILM']?>"><?= $row['LIB_TYPE_FILM']?></option>
                                        <?php
                                        }
                                        ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                </form>
            </main>
        </body>
    </html>
    <?php
    }
    ?>