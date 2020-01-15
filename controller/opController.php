<?php
session_start();
require_once '../model/modelOperation.php';
require_once '../model/modelCompte.php';

if (isset($_POST['ajoutOp'])) {
    //var_dump($_POST);
    extract($_POST);
    $dateCreation = date("d-m-Y");
    $numeroOp = genererNumeroOperation();
    $idGestCompte = $_SESSION['idUser'];
    $idTypeOperation = getTypeOpByNom($typeOperation)['id'];
    $idCompte = $_GET['idCompte'];
    //====================================

    //====================================
    if ($typeOperation == 'depot') {
        if(depot($numeroOp, $dateCreation, $montant, $idCompte, $idTypeOperation, $idGestCompte) > 0)
        {
            $operations = listOpByNomCompte($idCompte);
            $_SESSION['operations'] = $operations;
            header('location:../indexFinance.php?view=operation&ok=1&op=1');
        }else{
            header('location:../indexFinance.php?view=operation&ok=1&op=0');
        }
    }
    if ($typeOperation == 'retrait') {
        if(retrait($numeroOp, $dateCreation, $montant, $idCompte, $idTypeOperation, $idGestCompte) > 0)
        {
            $operations = listOpByNomCompte($idCompte);
            $_SESSION['operations'] = $operations;
            header('location:../indexFinance.php?view=operation&ok=1&op=1');
        }else{
            header('location:../indexFinance.php?view=operation&ok=1&op=0');
        }
    }
}

if (isset($_GET['sup'])) {
    $opID=$_GET['sup'];
    $numeroCompte = recupNumCompteByIdOp($opID);
    if (supprimerOP($opID)==0)
    {
        header('location:../indexFinance.php?view=operation&ok=1&supp=0');
    }
    else
    {
        header('location:compteController.php?num='.$numeroCompte['numero'].'');
    }
}

?>
