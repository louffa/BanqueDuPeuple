<section id="portfolio">
    <div class="container wow fadeInUp">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title">Gestion Client</h3>
                <div class="section-title-divider"></div>
                <p class="section-description">Dans cette section nous avons la liste des clients avec la possibilité d'ajouter un nouveau compte pour un client donné, de modifier, supprimer un compte. </p>
            </div>
        </div>

        <div class="row">

            <?php
            require_once '/model/modelClient.php';
            $clients = getAllClients();
            //var_dump($clients);
            ?>
            <br>

            <br><br>
            <table  class="table table-striped" cellspacing="1" >
                <tr>
                    <th>CNI</th>
                    <th>NOM</th>
                    <th>PRENOM</th>
                    <th>ADRESSE</th>
                    <th>TEL</th>
                    <th id="A">ACTIONS</th>
                </tr>
                <?php
                foreach ($clients as $key => $client) {
                    if ($client['etatClient']=='1') {


                        ?>
                        <tr>
                            <td><?=$client['cni'] ?></td>
                            <td><?=$client['nom'] ?></td>
                            <td><?=$client['prenom'] ?></td>
                            <td><?=$client['adresse'] ?></td>
                            <td><?=$client['tel'] ?></td>
                            <td><a name="nouveauCompteB" href="/controller/clientController.php?num=<?= $client["id"] ?>">Ajouter compte/</a>

                                <a href="/controller/clientController.php?supClient=<?= $client['id'] ?>" >Supprimer </a>

                            </td>

                        </tr>
                        <?php


                        /*
                    ?num1=<?=$client['cni'] ?>?num2=<?=$client['nom'] ?>?num3=<?=$client['prenom'] ?>?num4=<?=$client['adresse'] ?>?num5=<?=$client['tel'] ?>

                    au lieu de transferer les données par l'url créer une fonction qui recupere les données du client a partir de son id passé en parametre recuperer via l'url
                    */




                    }
                }
                ?>

            </table>
            </br>
            <?php
            if (isset($_GET['ok'])) {
                if($_GET['ok'] == 1)
                {
                    if (isset($_GET['numb'])) {
                        $numb=$_GET['numb'];
                        $teste=essai($numb);
                        //var_dump($teste);

                        ?>
                        <form method="POST" action="/controller/compteController.php?ajoutCC=<?=$numb?>" >
                            <div style="text-align: center"> <fieldset id="newAccount">
                                    <legend>INFOS COMPTE</legend>
                                    <table class="table table-striped">
                                        <tr>
                                            <td class="formul_tab"><input class="champsNewC" type="text" name="numero" id="numero" value="<?= $teste['numero'] ?>" readonly/></td>
                                            <td class="formul_tab"><input class="champsNewC" type="number" placeholder="SOLDE" name="solde" id="solde" min="500" ></td>
                                        </tr>
                                    </table>
                                    <div class="aligner"><input class="btn btn-primary" type="submit" name="ajoutNewCompte" value="Ajouter compte" ></div>
                                </fieldset></div>
                            <br><br>
                        </form>
                    <?php }
                }
            }
            ?>

            <?php

            if (isset($_GET['o']) AND $_GET['o']==1) {
                echo "ce compte a été ajouté avec succes !!!!";
                ?>


                <script type="text/javascript">
                    $(document).ready(function(){
                        alert("ce compte a été ajouté avec succes !!!!");
                    })
                </script>
                <?php
            }
            ?>

        </div>
        <div style="text-align: center"><a href="indexFinance.php?view=rechercheClient" id="deconnexion">
                <button class="btn btn-primary btn-lg">RECHERCHE</button></a></div>
    </div>
</section>