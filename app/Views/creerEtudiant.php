<H2>Formulaire de création d'un(e) Etudiant(e)</H2>
<form method="POST" action="<?php echo base_url(); ?><?= route_to('AjouterEtudiant') ?>">
    <table>
        <!-- nom	prenom	adresse	naissance	utilisateur	motDePasse	role	formation-->
        <tr>
            <td>Nom : </td>
            <td><input name="nom" type="text" /></td>
        </tr>
        <tr> 
            <td>prenom : </td>
            <td><input name="prenom" type="text" /></td>
        </tr>
        <tr>
            <td>adresse : </td>
            <td><textarea name="adresse" rows="5" cols="33"></textarea></td>
        </tr>
        <tr>
            <td>naissance : </td>
            <td><input name="naissance" type="date" /></td>
        </tr>
        <tr>
            <td>utilisateur : </td>
            <td><input name="utilisateur" type="text" /></td>
        </tr>
        <tr>
            <td>motDePasse : </td>
            <td><input name="motDePasse" type="text" /></td>
        </tr>
        <tr>
            <td>role : </td>
            <td>
                <select name="role">
                    <option value="Etudiant">Etudiant</option>
                    <option value="Admin">Admin</option>
                    <option value="Professeur">Professeur</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>formation : </td>
            <td>
                <select name="formation">
                    <?php 
                    if (!is_null($formations)) {
                        foreach ($formations as $formation) {
                            echo "<option value='" . $formation->getId() . "'>" . $formation->getNom() . "</option>";
                        }
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="Envoyer" /></td>
            <td><input type="reset" value="Effacer"></td>
        </tr>
    </table>
</form>