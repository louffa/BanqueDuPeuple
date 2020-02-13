<?php
require_once 'bd.php';

function verifierConnexion($login, $mdp)
{
    $sql = "SELECT * FROM utilisateur WHERE login='$login' AND password = '$mdp'";
    global $bd;
    return $bd -> query($sql) -> fetch();
    // fetch permet de retourner un seul resultat
}

//AJOUTER UN UTILISATEUR

if (isset($_POST['ajoutCompteUtilisateur'])) {

    $nom=htmlspecialchars($_POST['nom']);
    $prenom=htmlspecialchars($_POST['prenom']);
    $login=htmlspecialchars($_POST['login']);
    $password=sha1($_POST['mdp']);
    $profil=htmlspecialchars($_POST['profil']);


    $insrt=$bd->prepare("INSERT INTO utilisateur(nom,prenom,login,password,profil) VALUES (?, ?, ?, ?, ?)");
    $insrt->execute(array($nom,$prenom,$login,$password,$profil));
    if ($insrt >0) {
        //header('location:../accueil.php?team&ok=1');
		header('location:../view/indexFinance.php');
    } else{
        header('location:../view/accueil.php?team&ok=0');
    }


}


?>
