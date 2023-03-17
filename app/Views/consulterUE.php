<H2>Formulaire de modifier d'un UE</H2>
<form method="POST" action="<?php echo base_url(); ?><?= route_to('ModifierUE') ?>">
    <table>
        <!-- id	code	credits	volume	description	semestre-->
        <tr>
            <td>id : </td>
            <td><input name="id" type="text"  value="<?=$UE->getId()?>" readonly /></td>
        </tr>
        <tr>
            <td>code : </td>
            <td><input name="code" type="text"  value="<?=$UE->getCode()?>" /></td>
        </tr>
        <tr> 
            <td>credits : </td>
            <td><input name="credits" type="number" value="<?=$UE->getCredits()?>"/></td>
        </tr>
        <tr>
            <td>volume : </td>
            <td><input name="volume" type="number" value="<?=$UE->getVolume()?>" /></td>
        </tr>
        <tr>
            <td>description : </td>
            <td><textarea name="description" rows="5" cols="33"><?=$UE->getDescription()?></textarea></td>
        </tr>
        <tr>
            <td>semestre : </td>
            <td>
                <select name="semestre">
                    <?php 
                    if (!is_null($Semestres)) {

                        foreach ($Semestres as $semestre) {
                            if($semestre->getId() == $UE->getSemestre()){
                                echo "<option value='" . $semestre->getId() . "' selected>" . $semestre->getNom() . "</option>";
                            }else{
                                echo "<option value='" . $semestre->getId() . "'>" . $semestre->getNom() . "</option>";
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