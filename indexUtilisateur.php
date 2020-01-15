<section id="team">
    <div class="container wow fadeInUp">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title">Gestion Utilisateurs</h3>
                <div class="section-title-divider"></div>
                <p class="section-description">Dans cette section vous avez la possibilité de créer des utilisateurs.</p>
            </div>
        </div>

        <div class="row">
            <br>



            <form method="POST" action="../model/modelUser.php" id="nouveauUtilisateur">
                <div style="text-align: center">
                    <fieldset id="newAccount">
                        <legend>AJOUT UTILISATEUR</legend>
                        <table class="table table-striped">
                            <tr>
                                <td class="formul_tab">
                                    <input type="text" placeholder="NOM" name="nom" id="nom" class="champsNewC"/>
                                </td>
                                <td class="formul_tab">
                                    <input type="text" placeholder="PRENOM" name="prenom" id="prenom" class="champsNewC"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="formul_tab">
                                    <input type="text" placeholder="LOGIN" name="login" id="login" class="champsNewC" required/>
                                </td>
                                <td class="formul_tab">
                                    <input type="password" placeholder="MOT DE PASSE" name="mdp" id="mdp" class="champsNewC" required/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="formul_tab">
                                    <select name="profil" class="champsNewC">
                                        <option selected>admin</option>
                                        <option>Gestionnaire de comptes</option>
                                        <option>caissier</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </div>
                <br><br>
                <div style="text-align: center"><input class="btn btn-success" type="submit" name="ajoutCompteUtilisateur" value="Valider" ></div>
            </form>

        </div>
    </div>
</section>