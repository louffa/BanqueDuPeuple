<?php
require_once 'bd.php';
function getTypeOpByNom($nom){
    $sql = "SELECT * FROM typeoperation WHERE nom='$nom'";
    global $bd;
    return $bd -> query($sql) -> fetch();
}
function depot($numero, $dateOperation, $montant, $idCompte, $idTypeOp, $idUser){
    global $bd;
    $lastId = lastInsertIdForTable("operation") ;
    $sql = "INSERT INTO operation VALUES ('$lastId', '$numero','$dateOperation', $montant, $idCompte, $idTypeOp, $idUser,1)";

    if($bd -> exec($sql) > 0){
        $sql1 = "UPDATE compte SET solde=solde+$montant WHERE id=$idCompte";
        return $bd -> exec($sql1);
    }

}
function genererNumeroOperation(){
    $sql = "SELECT max(id) FROM operation";
    global $bd;
    $array =  $bd -> query($sql) -> fetch();
    if($array == NULL){
        $id = 1;
    }else{
        $array[0]++;
        $id = $array[0];
    }
    $numero = "FSN_".date('d').date('m').date('Y')."_OP".$id;
    return $numero;
}
// creer la fonction de retrait
function retrait($numero, $dateOperation, $montant, $idCompte, $idTypeOp, $idUser)
{
    global $bd;
    $rep = $bd -> query('SELECT solde FROM compte WHERE id='.$idCompte.'');
    $solde = $rep -> fetch();
    if (($solde['solde'] - $montant) >= 500) {
        $lastId = lastInsertIdForTable("operation");
        $sql = "INSERT INTO operation VALUES ('$lastId', '$numero','$dateOperation', $montant, $idCompte, $idTypeOp, $idUser,1)";
        if($bd -> exec($sql) > 0){
            $sql1 = "UPDATE compte SET solde=solde-$montant WHERE id=$idCompte";
            return $bd -> exec($sql1);
        }
    }
    else
    {
        return 0;
    }
}
function listOpByNomCompte($id){
    $sql= "SELECT operation.id as idOps,operation.numero,operation.dateOperation,operation.montant,operation.etatOperation, utilisateur.*,typeoperation.nom as typeOP FROM operation,utilisateur,typeoperation WHERE operation.idUser=utilisateur.id AND operation.idTypeOpe=typeoperation.id AND operation.idCompte = $id";
    global $bd;
    return $bd -> query($sql) -> fetchall();
    /*
    $reponse = $bd -> query($sql);
    while($donnees = $reponse -> fetch())
    {
        $operations[] = $donnees;
    }
    */
}

function supprimerOP($opID){

    $sql1="SELECT solde FROM compte WHERE id = ( SELECT idCompte FROM operation WHERE id='$opID')";
    $sql2="SELECT O.montant,T.nom as type FROM operation as O,typeoperation as T WHERE O.idTypeOpe=T.id AND O.id='$opID' ";
    global $bd;
    $solde = $bd -> query($sql1) -> fetch();
    $solde=$solde['solde'];
    $reponse = $bd -> query($sql2) -> fetch();
    $montant = $reponse['montant'];
    $type =	$reponse['type'];

    if ($type == "depot") {
        if (($solde - $montant) >=500 ) {
            $sql = "UPDATE operation set etatOperation = 0 WHERE id='$opID' ";
            $sql3="UPDATE compte set solde=($solde - $montant) WHERE id = ( SELECT idCompte FROM operation WHERE id='$opID')";
        }else{
            return 0;
        }
    }else{
        $sql = "UPDATE operation set etatOperation = 0 WHERE id='$opID' ";
        $sql3="UPDATE compte set solde=($solde + $montant) WHERE id = ( SELECT idCompte FROM operation WHERE id='$opID')";
    }

    $bd -> exec($sql);
    $bd -> exec($sql3);
    return 1;

}

function depotNewCompte($numero, $dateOperation, $montant, $idCompte, $idTypeOp, $idUser){
    global $bd;
    $lastId = lastInsertIdForTable("operation") ;
    $sql = "INSERT INTO operation VALUES ('$lastId', '$numero','$dateOperation', $montant, $idCompte, $idTypeOp, $idUser,1)";

    if($bd -> exec($sql) > 0){
        $sql1 = "UPDATE compte SET solde=solde+$montant WHERE id=$idCompte";
        return $bd -> exec($sql1);
    }
}


// Creer une methode qui liste toutes les operations d'un compte(numero, date, montant, responsable).
// Creer une methode qui retourne la liste des comptes (getAllCompte).
// Appel de la fonction findCompteByNumero($numero).
?>
