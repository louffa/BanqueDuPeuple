


<!-- #header -->
<section id="hero">
    <div class="hero-container">
        <div class="wow fadeIn">
            <div class="hero-logo">
                <img class="" src="img/logo.png" alt="Imperial">
            </div>

            <h1>BIENVENUE DANS BANQUE DU PEUPLE </h1>
            <h2>Nous assurons : <span class="rotating">la sécurité de vos données, la gestion de vos opérations, une disponibilité 24h/24h</span></h2>
            <div class="actions">
                <a href="#about" class="btn-get-started">Get Started</a>

            </div>
        </div>
    </div>
</section>
<!--==========================
About Section
============================-->
<section id="about">
    <div class="container wow fadeInUp">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title">About Us</h3>
                <div class="section-title-divider"></div>
                <p class="section-description">La banque du peuple est une institution financière qui a 12 agences et plus de 500 clients dans les régions du Sénégal.</p>
            </div>
        </div>
    </div>
    <div class="container about-container wow fadeInUp">
        <div class="row">

            <div class="col-lg-6 about-img">
                <img src="img/about-img.jpg" alt="">
            </div>

            <div class="col-md-6 about-content">
                <h2 class="about-title">We provide great services and ideass</h2>
                <p class="about-text">
                    Être client de la BDP, c'est profiter d'une relation bancaire unique et de services exclusifs vous permettant de réaliser en toute sérénité votre projet immobilier et de faire face à vos besoins particuliers.
                </p>
                <p class="about-text">
                    PLUS UN CASSE TÊTE GRÂCE À BDP E-COMMERCE.
                    BDP e-commerce est une solution qui permet d’accepter et de gérer avec sécurité les paiements en ligne de vos clients.
                </p>
                <p class="about-text">
                    Elle s’adresse à tout type d’entreprises souhaitant développer son activité via la vente en ligne.
                    Elle donne la possibilité aux e-commerçants de proposer le paiement par carte Visa ou Mastercard ainsi que différents autres types d’avantages.
                </p>
            </div>
        </div>
    </div>
</section>

<!--==========================
Services Section
<section id="services">
    <div class="container wow fadeInUp">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title">Gestion Compte</h3>
                <div class="section-title-divider"></div>
                <p class="section-description">Dans cette section nous avons la liste des comptes clients et la possibilité de creer un nouveau client.</p>
            </div>
        </div>

        <div class="row">
            <?php
require_once '/model/modelCompte.php';
$comptesAvecCllients = getAllCompteAvecClients();
?>
            <br>
            <table class="table table-striped" cellspacing="1">
                <tr>
                    <th>NUMERO</th>
                    <th>DATE CREATION</th>
                    <th>SOLDE</th>
                    <th>NOM CLIENT</th>
                    <th id="A">ACTIONS</th>
                </tr>
                <?php
foreach ($comptesAvecCllients as $key => $value) {
    if ($value['etat']=='1') {
        echo'<tr>';
    }else{
        echo "<tr style='background-color: red'>";
    }

    echo '
        <td>'.$value["numero"].'</td> 
        <td>'.$value["dateCreation"].'</td>
        <td>'.$value["solde"].'</td>
        <td>'.$value["nom"].' '.$value["prenom"].'</td>';
    if ($value['etat']=='1') {
        echo '<td> 
            <a href="/controller/compteController.php?num='.$value["numero"].'">LISTE DES OP</a>  
            </td></tr>';
    }else{
        echo '<td> 
            <a href="/controller/compteController.php?num='.$value["numero"].'">LISTE DES OP</a> 
            </td></tr>';
    }

}
?>
            </table>
            <br>
            <div class="aligner">
                <a href="nouveauCompte.php"><button class="btn">Nouveau Client</button></a>
            </div><br>
        </div>
    </div>
</section>
============================-->




<!--==========================
Subscrbe Section
============================-->


<!--==========================
Porfolio Section
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
            <div class="aligner"><a href="indexFinance.php?view=rechercheClient" id="deconnexion">
                    <button class="btn btn-primary btn-lg">RECHERCHE</button></a></div>
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

                                <a href="/controller/clientController.php?supClient=<?= $client['id'] ?>" >Supprimer/ </a>
                                <a href="/controller/clientController.php?modifClient=<?= $client['id'] ?>" >Modifier </a>
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
    </div>
</section>
============================-->


<!--==========================
Testimonials Section
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
            <div class="aligner">
                <input type="text" name="numeroCompte" class=" " style="width: 300px" id="numeroCompte" placeholder="NUMERO DE COMPTE" value="<?= $numCompte ?>" onblur="recherche()">
            </div>
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
                            <form method="POST" action="../controller/opController.php?idCompte=<?= $compte['id'] ?>">
                                <fieldset class="newOp">
                                    <legend>INFOS COMPTE</legend>
                                    <table class="tab_complet">
                                        <tr>
                                            <td class="formul_tab">
                                                <select class="champsNewC" style="width: 200px;" name="typeOperation">
                                                    <option selected>depot</option>
                                                    <option>retrait</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="formul_tab"><input class="champsNewC" type="number" name="montant" id="montant" placeholder="Montant" min="500" required></td>
                                        </tr>
                                    </table>
                                </fieldset><br>
                                <div class="aligner"><input class="btn" type="submit" name="ajoutOp" value="Valider"></div>
                            </form>
                            <br>
                            <?php
                if (isset($_GET['op'])) {
                    if($_GET['op'] == 1)
                    {
                        echo '<div class="aligner"><span class="reussi">OPERATION REUSSIE</span></div>';
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



                        <span class="titre"><u>LISTE DES OPERATIONS</u></span>
                        <table class="tableauPlein1" style="height: auto;">
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
============================-->


<!--==========================
Team Section
<section id="team">
    <div class="container wow fadeInUp">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title">Gestion Utilisateurs</h3>
                <div class="section-title-divider"></div>
                <p class="section-description">Dans cette section vous avez la possibilité de créer des utilisateurs.</p>
            </div>
        </div>

        <div class="row">
            <br>
            <?php
if (isset($_GET['ok'])) {
    if ($_GET['ok']==1) {
        ?>
                    <div align='center' style="color:blue;">utilisateur creer avec succes::::</div>
                <?php } else{
        ?>
                    <div align='center' style="color:blue;">erreur lors de l'insertion </div>

                <?php }
    ?>


                <?php
}
?>



            <form method="POST" action="../model/modelUser.php" id="nouveauUtilisateur">
              <div style="text-align: center">
                <fieldset id="newAccount">
                    <legend>AJOUT UTILISATEUR</legend>
                    <table class="table table-striped">
                        <tr>
                            <td class="formul_tab">
                                <input type="text" placeholder="NOM" name="nom" id="nom" class="champsNewC"/>
                            </td>
                            <td class="formul_tab">
                                <input type="text" placeholder="PRENOM" name="prenom" id="prenom" class="champsNewC"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="formul_tab">
                                <input type="text" placeholder="LOGIN" name="login" id="login" class="champsNewC" required/>
                            </td>
                            <td class="formul_tab">
                                <input type="password" placeholder="MOT DE PASSE" name="mdp" id="mdp" class="champsNewC" required/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="formul_tab">
                                <select name="profil" class="champsNewC">
                                    <option selected>admin</option>
                                    <option>Gestionnaire de comptes</option>
                                    <option>caissier</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </fieldset>
              </div>
                <br><br>
                <div class="aligner"><input class="btn btn-success" type="submit" name="ajoutCompteUtilisateur" value="Valider" ></div>
            </form>

        </div>
    </div>
</section>
============================-->





<!--==========================
Footer
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    &copy; Copyright <strong>ISI SENEGAL</strong>. All Rights Reserved
                </div>
                <div class="credits">

                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </div>
        </div>
    </div>
</footer>
============================-->

<!-- #footer
 <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
 -->



<!-- Required JavaScript Libraries
 <script src="lib/jquery/jquery.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script src="lib/superfish/hoverIntent.js"></script>
<script src="lib/superfish/superfish.min.js"></script>
<script src="lib/morphext/morphext.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/stickyjs/sticky.js"></script>
<script src="lib/easing/easing.js"></script>
 -->


<!-- Template Specisifc Custom Javascript File
<script src="js/custom.js"></script>

<script src="contactform/contactform.js"></script> -->




