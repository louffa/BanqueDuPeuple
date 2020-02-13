<section id="testimonials">
    <div class="container wow fadeInUp">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title">Gestion Operation</h3>
                <div class="section-title-divider"></div>
                <p class="section-description">Dans cette section nous avons à partir de la recherche d'un client par son numero de compte la possibilité d'effectuer des operations sur ce compte</p>
            </div>
        </div>



        <div class="row">
            <?php

            if (isset($_SESSION['compte']) && isset($_GET['ok']) && $_GET['ok'] == 1) {
                $numCompte = $_SESSION['compte']['numero'];
            }
            else
            {
                $numCompte = "";
            }
            ?>
            <div class="aligner" style="text-align: center">
                <input type="text" name="numeroCompte" class=" " style="width: 300px" id="numeroCompte" placeholder="NUMERO DE COMPTE" value="<?= $numCompte ?>" onblur="recherche()">
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br>
            <?php
            if (isset($_GET['ok'])) {
                if($_GET['ok'] == 0)
                {
                    echo "COMPTE NON TROUVEE!!!!";
                    $_SESSION['compte'] = null;
                    $_SESSION['operations'] = null;
                }

                if($_GET['ok'] == 1)
                {
                    if (isset($_SESSION['compte']) AND isset($_SESSION['operations']))
                    {
                        $compte = $_SESSION['compte'];
                        $operations = $_SESSION['operations'];
                        $client = getClientByIdCompte($compte['id']);
                        //var_dump($client);
                        //var_dump($compte);
                        //var_dump($operations);
                        if ($compte['etat']=='1') {


                            ?>
                            <br><br>
                            <form method="POST" action="../controller/opController.php?idCompte=<?= $compte['id'] ?>">

                                <fieldset>
                                    <div style="text-align: center">
                                    <legend>INFOS OPERATION</legend>
                               </div>
                                    <div style="text-align: center">
                                    <table CLASS="table">
                                        <div style="text-align: center">  <tr>
                                            <td>
                                                <select class="champsNewC" style="width: 200px;" name="typeOperation">
                                                    <option selected>depot</option>
                                                    <option>retrait</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="formul_tab"><input class="champsNewC" type="number" name="montant" id="montant" placeholder="Montant" min="500" required></td>
                                        </tr></div>
                                    </table></div>
                                </fieldset><br>
                                <div style="text-align: center"><input class="btn btn-success btn-lg" type="submit" name="ajoutOp" value="Valider"></div>

                            </form>
                            <br>
                            <?php
                            if (isset($_GET['op'])) {
                                if($_GET['op'] == 1)
                                {
                                    echo '<div style="text-align: center" ><span style="color: #bd2130" class="reussi">OPERATION REUSSIE</span></div>';
                                }
                                if($_GET['op'] == 0)
                                {
                                    echo '<div class="aligner"><span class="echec">ECHEC DE L\'OPERATION</span></div>';
                                }
                            }
                        }
                        if (isset($_GET['supp']) AND $_GET['supp']==0) {
                            ?>
                            <div align='center' style="color:red;">IMPOSSIBLE DE SUPPRIMER LA DERNIERE OPERATION</div>

                            <?php
                        }



                        ?>
                        </br>

                        <LEGEND align='center'>INFOS CLIENT</LEGEND>
                        <table border="" width="50%" height="200px" align="center">

                            <tr>
                                <td align="center"><span>NOM : </span><?=$client['nom'] ?></td>
                                <td align="center"><span>PRENOM : </span><?=$client['prenom'] ?></td>
                            </tr>

                            <tr>
                                <td align="center"><span>ADRESSE : </span><?=$client['adresse'] ?></td>
                                <td align="center"><span>TEL : </span><?=$client['tel'] ?></td>
                            </tr>
                        </table></br>
                        <LEGEND align='center'>SOLDE COMPTE</LEGEND>
                        <table border="" width="50%" height="100px" align="center">

                            <tr>
                                <td align="center"><span>SOLDE : </span><?=$compte['solde'] ?></td>

                            </tr>
                        </table></br>



                        <div style="text-align: center"> <span class="titre"><u>LISTE DES OPERATIONS</u></span></div>
                        <br>
                        <table class="table table-striped" style="height: auto;">
                            <tr>
                                <th>NUMERO OPERATION</th>
                                <th>DATE DE L'OPERATION</th>
                                <th>MONTANT</th>
                                <th>TYPE</th>
                                <th>NUMERO COMPTE</th>
                                <th>NOM ET PRENOM GEST</th>
                                <th>ACTIONS</th>

                            </tr>
                            <?php foreach ($operations as $key => $value) {
                                if ($value['etatOperation']==1) {

                                    ?>
                                    <tr>
                                        <td><?= $value['numero'] ?></td>
                                        <td><?= $value['dateOperation'] ?></td>
                                        <td><?= $value['montant'] ?></td>
                                        <td><?= $value['typeOP'] ?></td>

                                        <td><?= $numCompte ?></td>
                                        <td><?= $value['prenom'] ?> <?= $value['nom'] ?></td>

                                        <?php
                                        if ($compte['etat']=='1') {
                                            ?>
                                            <td><a href="../controller/opController.php?sup=<?= $value['idOps'] ?>">Supprimer </a></td>
                                            <?php
                                        }else{
                                            ?>
                                            <td><a>Supprimer</a></td>
                                            <?php


                                        }
                                        ?>


                                    </tr>
                                    <?php
                                }
                            } ?>
                        </table>
                        <?php
                        //var_dump($_SESSION['compte']);
                        //var_dump($operations);
                    }
                }
            }

            /*if (isset($_GET['supp']) AND $_GET['supp']==0) {
                ?>
                <script src="../assets/jquery.js"></script>

                <script type="text/javascript">
                $(document).ready(function(){
            alert("impossible de supprimer cette operation");
                })
                </script>
                <?php
            }*/
            ?>
            <script src="/js/dom.js"></script>
        </div>

    </div>
</section>