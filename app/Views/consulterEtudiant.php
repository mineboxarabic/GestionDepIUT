<H2>Formulaire de consultation d'un(e) Etudiant(e)</H2>
<form method="POST" action="<?php echo base_url(); ?><?= route_to('ModifierEtudiant') ?>">
    <table>
        <!-- nom	prenom	adresse	naissance	utilisateur	motDePasse	role	formation-->
        <tr>
            <td>dni : </td>
            <td><input name="dni" type="text" value=<?=$Etudiant->getDni()?> readonly/></td>
        </tr>
        <tr>
            <td>Nom : </td>
            <td><input name="nom" type="text" value="<?=$Etudiant->getNom()?>" /></td>
        </tr>
        <tr> 
            <td>prenom : </td>
            <td><input name="prenom" type="text" value=<?=$Etudiant->getPrenom()?> /></td>
        </tr>
        <tr>
            <td>adresse : </td>
            <td><textarea name="adresse" rows="5" cols="33" ><?=$Etudiant->getAdresse()?></textarea></td>
        </tr>
        <tr>
            <td>naissance : </td>
            <td><input name="naissance" type="date" value=<?=$Etudiant->getNaissance()?> /></td>
        </tr>
        <tr>
            <td>utilisateur : </td>
            <td><input name="utilisateur" type="text" value=<?=$Etudiant->getUtilisateur()?> /></td>
        </tr>
        <tr>
            <td>motDePasse : </td>
            <td><input name="motDePasse" type="text" value=<?=$Etudiant->getMotDePasse()?> /></td>
        </tr>
        <tr>
            <td>role : </td>
            <td>
                <select name="role" >
                    <option value="Etudiant" <?php if($Etudiant->getRole() == "Etudiant") echo "selected"; ?>>Etudiant</option>
                    <option value="Admin" <?php if($Etudiant->getRole() == "Admin") echo "selected"; ?>>Admin</option>
                    <option value="Professeur" <?php if($Etudiant->getRole() == "Professeur") echo "selected"; ?>>Professeur</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>formation : </td>
            <td>
                <select name="formation" >
                    <?php 
                    if (!is_null($formations)) {
                        foreach ($formations as $formation) {
                            if($formation->getId() == $Etudiant->getFormation()){
                                echo "<option value='" . $formation->getId() . "' selected>" . $formation->getNom() . "</option>";
                            }
                            else{
                                echo "<option value='" . $formation->getId() . "'>" . $formation->getNom() . "</option>";
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