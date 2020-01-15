<?php
require_once 'bd.php';
function insererClient($cni, $nom, $prenom, $adresse,  $tel,$etatClient)
{
    $lastId = lastInsertIdForTable("client");

    $insert = "INSERT INTO client VALUES ('$lastId','$cni','$nom','$prenom','$adresse','$tel',1)";
    /*
        Ou bien
        $insert = "INSERT INTO client VALUES (null,$cni,$nom,$prenom,$adresse,$tel)";
    */
    global $bd;
    $bd -> exec($insert);
    return $bd -> lastInsertId();
}
function ajoutCompte($numero, $dateCreation, $solde, $idClient, $idGestCompte)
{
    //$idClient = insererClient();
    $lastId = lastInsertIdForTable("compte");
    $insert = "INSERT INTO compte VALUES ('$lastId','$numero','$dateCreation',0,$idClient,$idGestCompte,1)";
    global $bd;
    $bd -> exec($insert);
    return $bd -> lastInsertId();
}



function genererNumero(){
    $sql = "SELECT max(id) FROM compte";
    global $bd;
    $array =  $bd -> query($sql) -> fetch();
    if($array == NULL){
        $id = 1;
    }else{
        $array[0]++;
        $id = $array[0];
    }
    $numero = "FSN_".date('d').date('m').date('Y')."_C".$id;
    return $numero;
}
// Creer une methode findCompteByNumero($numero).
function findCompteByNumero($numero){
    $sql = "SELECT * FROM compte WHERE numero='$numero'";
    global $bd;
    return $bd -> query($sql) -> fetch();
}
// Creer une methode qui retourne la liste des comptes (getAllCompte).
function getAllCompte(){
    $sql = "SELECT * FROM compte";
    global $bd;
    return $bd -> query($sql) -> fetchall();
}
function getAllCompteAvecClients(){
    $sql = "SELECT Co.* , Cl.nom,Cl.prenom FROM compte Co,client Cl WHERE Co.idClient = Cl.id";
    global $bd;
    return $bd -> query($sql) -> fetchall();
}
function modifierEtat($idCompte){
    $sql="SELECT etat from compte Where id='$idCompte'";
    global $bd;
    $etat = $bd -> query($sql) -> fetch();
    if ($etat['0']=='1') {
        $sql = "UPDATE compte set etat=0 Where id='$idCompte' ";
        return $bd -> exec($sql);
    }else{
        $sql = "UPDATE compte set etat=1 Where id='$idCompte'";
        return $bd -> exec($sql);
    }
}
//recupere le numero du compte a partir de l'id de l'operation
function recupNumCompteByIdOp($opID){
    $sql="SELECT numero from compte Where id=( SELECT idCompte FROM operation WHERE id='$opID')";
    global $bd;
    return $bd -> query($sql) ->fetch();

}

/*function getIdCompte(){
        $sql = "SELECT max(id) FROM compte";
        global $bd;
        return $bd -> query($sql) ->fetch();
    }

*/

?>
