<H2>Formulaire de Consultation de Intervenant</H2>
<form method="POST" action="<?php echo base_url(); ?><?= route_to('ModifierIntervenant') ?>">
    <table>
        <!-- dni	nom	prenom	adresse	naissance	numProf	statut	utilisateur	motDePasse	role depIUT-->
        <tr>
            <td>dni : </td>
            <td><input type="text" name="dni" value="<?=$Intervenant->getDni()?>" /></td>
        </tr>
        <tr>
            <td>nom : </td>
            <td><input type="text" name="nom" value="<?=$Intervenant->getNom()?>" /></td>
        </tr>
        <tr>
            <td>prenom : </td>
            <td><input type="text" name="prenom" value="<?=$Intervenant->getPrenom()?>" /></td>
        </tr>
        <tr>
            <td>adresse : </td>
            <td><textarea type="text" name="adresse"><?=$Intervenant->getAdresse()?></textarea> /></td>
        </tr>
    <tr>
            <td>naissance : </td>
            <td><input type="date" name="naissance" value="<?=$Intervenant->getNaissance()?>" /></td>
        </tr>
        <tr>
            <td>numProf : </td>
            <td><input type="text" name="numProf" value="<?=$Intervenant->getNumProf()?>" /></td>
        </tr>
        <tr>
            <td>statut : </td>
            <td><input type="text" name="statut" value="<?=$Intervenant->getStatut()?>" /></td>
        </tr>
        <tr>
            <td>utilisateur : </td>
            <td><input type="text" name="utilisateur" value="<?=$Intervenant->getUtilisateur()?>" /></td>
        </tr>
        <tr>
            <td>motDePasse : </td>
            <td><input type="text" name="motDePasse" value="<?=$Intervenant->getMotDePasse()?>"/></td>
        </tr>
        <tr>
            <td>role : </td>
            <td>
            <select name="role" >
                    <option value="Etudiant" <?php if($Intervenant->getRole() == "Etudiant") echo "selected"; ?>>Etudiant</option>
                    <option value="Admin" <?php if($Intervenant->getRole() == "Admin") echo "selected"; ?>>Admin</option>
                    <option value="Professeur" <?php if($Intervenant->getRole() == "Professeur") echo "selected"; ?>>Professeur</option>
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
                            if ($DepIUT->getId() == $Intervenant->getDepIUT()) {
                                echo "<option value='" . $DepIUT->getId() . "' selected>" . $DepIUT->getNom() . "</option>";
                            } else {
                                echo "<option value='" . $DepIUT->getId() . "'>" . $DepIUT->getNom() . "</option>";
                            }
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