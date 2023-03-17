<H2>Formulaire de consultation de module</H2>
<form method="POST" action="<?php echo base_url(); ?><?= route_to('ModifierModule') ?>">
    <table>
        <!-- id	code	nom	credits	volume	description	ue-->
        <tr>
            <td>id : </td>
            <td><input name="id" type="text"  value="<?=$Module->getId()?>" readonly /></td>
        </tr>
        <tr>
            <td>Code : </td>
            <td><input name="code" type="text" value="<?=$Module->getCode()?>" /></td>
        </tr>
        <tr>
            <td>Nom : </td>
            <td><input name="nom" type="text" value="<?=$Module->getNom()?>" /></td>
        </tr>
        <tr> 
            <td>credits : </td>
            <td><input name="credits" type="number" value="<?=$Module->getCredits()?>"/></td>
        </tr>
        <tr>
            <td>volume : </td>
            <td><input name="volume" type="number" value="<?=$Module->getVolume()?>"/></td>
        </tr>
        <tr>
            <td>description : </td>
            <td><textarea name="description" rows="5" cols="33"><?=$Module->getDescription()?></textarea></td>
        </tr>
        <tr>
            <td>ue : </td>
            <td>
                <select name="ue">
                    <?php 
                    if (!is_null($UEs)) {
                        foreach ($UEs as $ue) {
                            $ueOfModule = $Module->getUe();
                            if($ueOfModule == $ue->getId() ){
                                echo "<option value='" . $ue->getId() . "' selected>" . $ue->getCode() . "</option>";
                            }
                            else{
                                echo "<option value='" . $ue->getId() . "'>" . $ue->getCode() . "</option>";
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