



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
            require_once '../model/modelCompte.php';
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
            <a href="../controller/compteController.php?num='.$value["numero"].'">LISTE DES OP</a>  
            </td></tr>';
                    }else{
                        echo '<td> 
            <a href="../controller/compteController.php?num='.$value["numero"].'">LISTE DES OP</a> 
            </td></tr>';
                    }

                }
                ?>
            </table>
            <br>
            <div class="aligner">
                <a href="indexFinance.php?view=nouveauCompte"><button class="btn">Nouveau Client</button></a>
            </div><br>
        </div>
    </div>
</section>

