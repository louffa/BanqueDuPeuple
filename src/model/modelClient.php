<?php
require_once 'bd.php';

function getClientByIdCompte($idCompte)
{
    $sql = "SELECT Cl.* FROM client Cl, Compte Cp WHERE Cp.idCLIENT=Cl.id AND Cp.id='$idCompte' ";
    global $bd;
    return $bd ->query($sql) -> fetch();

}

function getAllClients(){
    $sql = "SELECT * FROM client";
    global $bd;
    return $bd ->query($sql) -> fetchall();
}

function essai($idClient){
    $sql=" SELECT a.numero FROM compte a, client b WHERE a.idCLIENT=b.id AND b.id='$idClient'";
    global $bd;
    return $bd ->query($sql) -> fetch();

}

function newessaie($numero){
    $sql="SELECT id from compte WHERE numero='$numero' ";
    global $bd;
    return $bd ->query($sql) -> fetch();

}


function findClientByCNI($cni){
    $sql = "SELECT * FROM client WHERE cni='$cni'";
    global $bd;
    return $bd -> query($sql) -> fetch();
}

function listComptebyClient($idClient){
    $sql="SELECT a.id, a.numero, a.dateCreation, a.solde, a.idGestCompte, u.nom, u.prenom FROM compte a, utilisateur u WHERE a.idGestCompte=u.id AND a.id='$idClient'";
    global $bd;
    return $bd -> query($sql) -> fetchall();
}



function ajoutNewCompte($numero, $dateCreation, $solde, $idClient, $idGestCompte)
{
    //$idClient = insererClient();
    $lastId = lastInsertIdForTable("compte");
    $insert = "INSERT INTO compte VALUES ('$lastId','$numero','$dateCreation',0,$idClient,$idGestCompte, 1)";
    global $bd;
    $bd -> exec($insert);
    return $bd -> lastInsertId();
}
function supprimerClient($idClient){
    $sql="UPDATE client set etatClient = 0 WHERE id='$idClient' ";
    global $bd;
    $bd -> exec($sql);
    return 1;

}
function modifierClient($idClient){
    $sql="UPDATE client SET nom='$nom' WHERE id='$idClient' ";
    global $bd;
    $bd -> exec($sql);
    return 1;


}

function findClientByid($id){
    $sql = "SELECT * FROM client WHERE id='$id'";
    global $bd;
    return $bd -> query($sql) -> fetch();
}

?>
