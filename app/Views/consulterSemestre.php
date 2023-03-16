<H2>Formulaire de création d'un Semester</H2>
<form method="POST" action="<?php echo base_url(); ?><?= route_to('ModifierSemestre') ?>">
    <table>
        <!--id nom credits description formation-->
        <tr>
            <td>id : </td>
            <td><input name="id" type="text" value="<?=$Semestre->getId()?>" readonly /></td>
        </tr>
        <tr>
            <td>Nom : </td>
            <td><input name="nom" type="text" value="<?=$Semestre->getNom()?>" /></td>
        </tr>
        <tr>
            <td>credits : </td>
            <td><input name="credits" type="number" value="<?=$Semestre->getCredits()?>" /></td>
        </tr>
        <tr>
            <td>description : </td>
            <td><textarea name="description" rows="5" cols="33"><?=$Semestre->getDescription()?></textarea></td>
        </tr>
        <tr>
            <td>formation : </td>
            <td>
                <select name="formation" >
                    <?php 
                    if (!is_null($formations)) {
                        foreach ($formations as $formation) {
                            $formationOfSemestre = $Semestre->getFormation();
                            if($formationOfSemestre == $formation->getId() ){
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