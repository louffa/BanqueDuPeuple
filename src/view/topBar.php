

<header id="header">
    <div class="container">

        <div id="logo" class="pull-left">
            <a href="?view=accueil"><img src="../../img/logo.png" alt="" title="" /></img></a>
            <!-- Uncomment below if you prefer to use a text image -->
            <!--<h1><a href="#hero">Header 1</a></h1>-->
        </div>

        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li class="menu-active"><a href="?view=accueil">Accueil</a></li>
                <li><a href="?view=compte" <?php if($_SESSION['profil'] == 'caissier'){echo  'hidden';} ?>>Gestion Compte</a></li>
                <li><a href="?view=client" <?php if($_SESSION['profil'] == 'caissier'){echo  'hidden';} ?>>Gestion Client</a></li>
                <li><a href="?view=operation">Gestion operation</a></li>
                <li><a href="?view=utilisateur" <?php if($_SESSION['profil'] == 'caissier'){echo  'hidden';} ?>>gestion Utilisateur</a></li>

                <li><a a href="../controller/userController.php?deconnexion=1">Deconnexion</a></li>
            </ul>
        </nav>
        <!-- #nav-menu-container -->
    </div>
</header>