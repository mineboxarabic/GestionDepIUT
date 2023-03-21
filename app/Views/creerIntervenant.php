<H2>Formulaire de création de Intervenant</H2>
<form method="POST" action="<?php echo base_url(); ?><?= route_to('AjouterIntervenant') ?>">
    <table>
        <!-- dni	nom	prenom	adresse	naissance	numProf	statut	utilisateur	motDePasse	role depIUT-->
        <tr>
            <td>nom : </td>
            <td><input type="text" name="nom" /></td>
        </tr>
        <tr>
            <td>prenom : </td>
            <td><input type="text" name="prenom" /></td>
        </tr>
        <tr>
            <td>adresse : </td>
            <td><textarea type="text" name="adresse"></textarea></td>
        </tr>
        <tr>
            <td>naissance : </td>
            <td><input type="date" name="naissance" /></td>
        </tr>
        <tr>
            <td>numProf : </td>
            <td><input type="text" name="numProf" /></td>
        </tr>
        <tr>
            <td>statut : </td>
            <td><input type="text" name="statut" /></td>
        </tr>
        <tr>
            <td>utilisateur : </td>
            <td><input type="text" name="utilisateur" /></td>
        </tr>
        <tr>
            <td>motDePasse : </td>
            <td><input type="text" name="motDePasse" /></td>
        </tr>
        <tr>
            <td>role : </td>
            <td> <select name="role">
                    <option value="Etudiant">Etudiant</option>
                    <option value="Admin">Admin</option>
                    <option value="Professeur">Professeur</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Dep IUT : </td>
            <td>
                <select name="DepIUT">
                    <?php 
                    if (!is_null($DepIUTs)) {
                        foreach ($DepIUTs as $DepIUT) {
                            echo "<option value='" . $DepIUT->getId() . "'>" . $DepIUT->getNom() . "</option>";
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