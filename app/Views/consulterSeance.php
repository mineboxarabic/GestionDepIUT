<H2>Formulaire de création de Sceance</H2>
<form method="POST" action="<?php echo base_url(); ?><?= route_to('ModifierSeance') ?>">
    <table>
        <!-- date	heure	duree	titre	salle	description	type	module-->
        <tr>
            <td>id : </td>
            <td><input name="id" type="number" value="<?= $Seance->getId()?>" readonly /></td>
        </tr>
        <tr>
            <td>Date : </td>
            <td><input name="date" type="date" value="<?= $Seance->getDate()?>" /></td>
        </tr>
        <tr>
            <td>Heure : </td>
            <td><input name="heure" type="time" value="<?= $Seance->getHeure()?>"/></td>
        </tr>
        <tr> 
            <td>Duree : </td>
            <td><input name="duree" type="number" value="<?= $Seance->getDate()?>" /></td>
        </tr>
        <tr>
            <td>Titre : </td>
            <td><input name="titre" type="text" value="<?= $Seance->getTitre()?>"/></td>
        </tr>
        <tr>
            <td>Salle : </td>
            <td><input name="salle" type="text" value="<?= $Seance->getSalle()?>" /></td>
        </tr>
        <tr>
            <td>Description : </td>
            <td><textarea name="description" rows="5" copls="33"><?= $Seance->getDescription()?></textarea></td>
        </tr>
        <tr>
            <td>Type : </td>
            <td>
                <input type="text" name="type" value="<?= $Seance->getType()?>" />
            </td>
        </tr>
        <tr>
            <td>Module : </td>
            <td>
                <select name="module">
                    <?php 
                    if (!is_null($modules)) {
                        foreach ($modules as $module) {
                           if($module->getId() == $Seance->getModule())
                                echo "<option value='" . $module->getId() . "' selected>" . $module->getCode() . "</option>";
                            else
                                echo "<option value='" . $module->getId() . "'>" . $module->getCode() . "</option>";

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