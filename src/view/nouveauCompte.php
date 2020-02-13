

<section id="services">
<?php
require_once '../model/modelCompte.php';
require_once '../model/modelClient.php';
$numero = genererNumero();
if(isset($_GET['ok'])){
    if ($_GET['ok']==1) {
        echo "Compte créee avec succés !!!";
    }else {
        echo "Erreur !!!";
    }
}
?>
<form method="POST" action="../controller/compteController.php" id="nouveauCompte">
    <div style="text-align: center">
    <fieldset id="newAccount">
        <legend>INFOS CLIENT</legend>
        <div style="text-align: center">
            <table class="table table-striped">
                <tr>
                    <td class="formul_tab"><input type="text" placeholder="NUMERO CNI" name="cni" id="cni" class="champsNewC" /></td>
                    <td class="formul_tab"><input type="text" placeholder="NOM" name="nom" id="nom" class="champsNewC" /></td>
                </tr>
                <tr>
                    <td class="formul_tab"><input type="text" placeholder="PRENOM" name="prenom" id="prenom" class="champsNewC" /></td>
                    <td class="formul_tab"><input type="text" placeholder="ADRESSE" name="adresse" id="adresse" class=" champsNewC" /></td>
                </tr>
                <tr>
                    <td colspan="2" class="formul_tab"><input type="text" placeholder="TELEPHONE" name="tel" id="tel" class="champsNewC" /></td>
                </tr>
        </table>
        </div>
    </fieldset>
    <fieldset id="newAccount">
        <legend>INFOS COMPTE</legend>
        <div style="text-align: center">
        <table class="table table-striped">
            <tr>
                <td class="formul_tab"><input class="champsNewC" type="text" name="numero" id="numero" value="<?= $numero ?>" readonly/></td>
                <td class="formul_tab"><input class="champsNewC" type="number" name="solde" id="solde" min="500" ></td>
            </tr>
        </table>
        </div>
    </fieldset>
    <br><br>
    <div class="aligner"><input class="btn btn-success" type="submit" name="ajoutCompte" value="Valider" ></div>
    </div>
</form>
<?php?>



    </section>


