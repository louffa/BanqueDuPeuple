<?php
session_start();
require_once '../model/modelUser.php';
if (isset($_POST['connexion']))
{
    extract($_POST);
    $user = verifierConnexion($login, $mdp);
    if($user != null)
    {
        $_SESSION['profil'] = $user['profil'];
        $_SESSION['nomComplet'] = $user['nom'].' '.$user['prenom'];
        /* OU
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['prenom'] = $user['prenom'];
        */
        $_SESSION['idUser'] = $user['id'];
        header('location:../view/indexFinance.php');
        echo  "ok";
    }
    else
    {
        header('location:../../index.php?connexion=0');
        return;
        echo "pas connecte";
    }

}
if (isset($_GET['deconnexion']))
{
    session_unset();
    $_SESSION = array();
    header('location:../../index.php');
}
?>
