<?php
session_start();
require_once '../model/modelCompte.php';
require_once '../model/modelClient.php';
require_once '../model/modelOperation.php';
if (isset($_GET['num'])) {
    $test=$_GET['num'];
    //var_dump($test);
    $numeroo=essai($test);
    var_dump($numeroo);
    if (essai($test)==0) {
        header('location:../indexFinance.php?view=client&ok=1&numb=0');
    }
    else{
        header('location:../indexFinance.php?view=client&ok=1&numb='.$test["numero"].'');
    }

}

if (isset($_POST['rechercher'])) {
    extract($_POST);
    $cni=$_POST['cni'];
//var_dump($_POST);
    $recupClient = findClientByCNI($cni);
    //var_dump($recupClient);
    $_SESSION['recupClient'] = $recupClient;
    $recupListCompte = listComptebyClient($recupClient['id']);
    $_SESSION['recupListCompte']=$recupListCompte;
    //$tests = $_SESSION['recupClient'];
    //var_dump($tests);


    if($recupClient > 0 )
    {
        //echo "ok";
        //var_dump($recupClient);
        header('location:../indexFinance.php?view=rechercheClient&trouve='.$recupClient[1].'&nom='.$recupClient[2].'&prenom='.$recupClient[3].'&adresse='.$recupClient[4].'&tel='.$recupClient[5].'&liste='.$recupListCompte);
    }

    else
    {
        //echo "pas ok";
        header('location:../indexFinance.php?view=rechercheClient&trouve=0');
    }
}



if (isset($_POST["ajoutNewCompte"])) {

    extract($_POST);
    //var_dump($_POST);
    $solde =$_POST['solde'];
    $dateCreation = date("d-m-Y");
    if (isset($_GET['ajoutCC'])) {
        $idclien=$_GET['ajoutCC'];

    }
    //echo "$idclien";
    $numeroC=genererNumero();

    $idcli=$idclien;
    $idGestCompte = $_SESSION['idUser'];
    //echo "$numeroC </br>";
    //echo "id client = $idcli </br>";
    //echo("id utilisateur = $idGestCompte </br>");
    $newCompte = ajoutNewCompte($numeroC, $dateCreation, $solde, $idcli, $idGestCompte);
    //var_dump($newCompte);


    if ($newCompte > 0) {
        $idCompte=$newCompte;
        //echo "$idCompte";
        $idTypeOperation = getTypeOpByNom("depot")['id'];
        $numeroOp = genererNumeroOperation();
        if(depotNewCompte($numeroOp, $dateCreation, $solde, $idCompte, $idTypeOperation, $idGestCompte) > 0)
        {
            //echo "ok";
            header('location:../indexFinance.php?view=client&o=1');
        }else{
            //echo "pas ok";
            header('location:../indexFinance.php?view=client&o=0');
        }
    }



}






if (isset($_GET['supClient'])) {
    $idClient=$_GET['supClient'];
    if (supprimerClient($idClient)==1) {
        header('location:../indexFinance.php?view=client');

    }
}

if (isset($_GET['modifClient'])) {

    $idcl=$_GET['modifClient'];
    $info=findClientByid($idcl);
    var_dump($info);
    if (findClientByid($idcl)>0) {

        $_SESSION['info'] = $info;
        header('location:../indexFinance.php?view=modifierClient&bon=1');
    }
}

if (isset($_POST['modiClient'])) {
    extract($_POST);
    $id=$_GET['var'];
    var_dump($_POST);
    echo "$id";
    //$tester=modifierClient($id)

    /*if (modifierClient($id)>0) {
        echo "client modifier";
    }*/

}

?>
