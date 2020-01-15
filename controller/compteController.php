<?php
session_start();
require_once '../model/modelCompte.php';
require_once '../model/modelOperation.php';
require_once '../controller/clientController.php';


if(isset($_POST['ajoutCompte'])){
    extract($_POST);
    //var_dump($_POST);
    $dateCreation = date("d-m-Y");
    $idCli = insererClient($cni, $nom, $prenom, $adresse,  $tel,1);
    $idGestCompte = $_SESSION['idUser'];
    $idCompte = ajoutCompte($numero, $dateCreation, $solde, $idCli, $idGestCompte);
    if ($idCompte > 0) {
        $idTypeOperation = getTypeOpByNom("depot")['id'];
        $numeroOp = genererNumeroOperation();
        if(depot($numeroOp, $dateCreation, $solde, $idCompte, $idTypeOperation, $idGestCompte) > 0)
        {
            header('location:../indexFinance.php?view=nouveauCompte&ok=1');
        }else{
            header('location:../indexFinance.php?view=nouveauCompte&ok=0');
        }
    }//*/
}
if (isset($_GET['num'])) {
    $compte = findCompteByNumero($_GET['num']);
    if($compte == null)
    {
        header('location:../indexFinance.php?view=operation&ok=0');
    }
    else
    {
        $operations = listOpByNomCompte($compte['id']);
        $_SESSION['compte'] = $compte;
        $_SESSION['operations'] = $operations;
        header('location:../indexFinance.php?view=operation&ok=1');
    }
}

/*
if (isset($_GET['ajoutCC'])) {
	extract($_POST);

	$test=newessaie($_POST['numero']);
	//var_dump($test);

$dateCreation = date("d-m-Y");
$idCli=$test;
$idGestCompte = $_SESSION['idUser'];
		$idCompte = ajoutCompte1($numero, $dateCreation, $solde, $idCli, $idGestCompte);
		if ($idCompte > 0) {
			$idTypeOperation = getTypeOpByNom("depot")['id'];
			$numeroOp = genererNumeroOperation();
			if(depot($numeroOp, $dateCreation, $solde, $idCompte, $idTypeOperation, $idGestCompte) > 0)
			{
				header('location:../view/indexFinance.php?view=client&ok=1');
			}else{
				header('location:../view/indexFinance.php?view=client&ok=0');
			}
		}


}*/


if (isset($_GET['test'])) {
    $idCompte=$_GET['test'];
    //echo "$idCompte";
    if (modifierEtat($idCompte)> 0) {
        header('location:../indexFinance.php?view=compte&ok=1');
    }else{
        header('location:../indexFinance.php?view=compte&ok=0');
    }
}
?>

