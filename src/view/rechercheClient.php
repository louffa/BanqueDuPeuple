

<section id="services">
    <?php

    if (isset($_SESSION['recupClient']) && isset($_GET['trouve']) && $_GET['trouve'] == 1) {
        $cniCli = $_SESSION['recupClient']['cni'];
    }
    else
    {
        $cniCli = "";
    }
    ?>
    <br><br><br>
    <form method="POST" action="../controller/clientController.php">


        <div style="text-align: center">
            <input type="text" name="cni" class="champsNewC" style="width: 300px" id="cni" placeholder="CNI" value="<?= $cniCli ?>" >
            <input type="submit" class="btnDeconnexion" name="rechercher" value="recherccher" >


        </div>
    </form>
    <br>
    <?php
    if (isset($_GET['trouve'])) {
        if($_GET['trouve']){



            $nom = $_GET['nom'];
            $prenom = $_GET['prenom'];
            $adresse = $_GET['adresse'];
            $tel = $_GET['tel'];
            $test2 = $_GET['liste'];


            //var_dump($test2);
            //	var_dump($tests);?>

            <LEGEND align='center'>INFOS CLIENT</LEGEND>
            <br>
            <table  border="" width="50%" height="200px" align="center">

                <tr>
                    <td align="center">NOM : <?=$nom ?></td>
                    <td align="center">PRENOM : <?=$prenom ?></td>
                </tr>

                <tr>
                    <td align="center">ADRESSE : <?=$adresse ?></td>
                    <td align="center">TEL : <?=$tel?></td>
                </tr>
            </table></br>
            <?php
            if (isset($_SESSION['recupClient']) && isset($_SESSION['recupListCompte'] )) {
                $tests = $_SESSION['recupClient'];
                $test2 = $_SESSION['recupListCompte'];
                ?>
                <br><br><br>
                <div style="text-align: center"><span class="titre"><u>LISTE DES COMPTES</u></span></div>
                <br><br><br>
                <table class="table table-striped" style="height: auto;">
                    <tr>
                        <th>NUMERO COMPTE</th>
                        <th>DATE DE CREATION</th>
                        <th>SOLDE</th>
                        <th>GESTIONNAIRE</th>

                    </tr>
                    <?php foreach ($test2 as $key => $value) {


                        ?>
                        <tr>
                            <td><?= $value['numero'] ?></td>
                            <td><?= $value['dateCreation'] ?></td>
                            <td><?= $value['solde'] ?></td>
                            <td><?= $value['prenom'] ?> <?= $value['nom'] ?></td>


                        </tr>
                    <?php }


                    ?>
                </table>

                <?php
            }

            ?>




            <?php


        }else{
            ?>
            <div align='center' style="color:red;">CE CLIENT N'EXISTE PAS</div>
            <?php
        }
    }

    ?>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</section>


