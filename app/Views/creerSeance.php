<H2>Formulaire de création de Sceance</H2>
<form method="POST" action="<?php echo base_url(); ?><?= route_to('AjouterSeance') ?>">
    <table>
        <!-- date	heure	duree	titre	salle	description	type	module-->
        <tr>
            <td>Date : </td>
            <td><input name="date" type="date" /></td>
        </tr>
        <tr>
            <td>Heure : </td>
            <td><input name="heure" type="time" /></td>
        </tr>
        <tr> 
            <td>Duree : </td>
            <td><input name="duree" type="number" /></td>
        </tr>
        <tr>
            <td>Titre : </td>
            <td><input name="titre" type="text" /></td>
        </tr>
        <tr>
            <td>Salle : </td>
            <td><input name="salle" type="text" /></td>
        </tr>
        <tr>
            <td>Description : </td>
            <td><textarea name="description" rows="5" copls="33"></textarea></td>
        </tr>
        <tr>
            <td>Type : </td>
            <td>
                <input type="text" name="type" />
            </td>
        </tr>
        <tr>
            <td>Module : </td>
            <td>
                <select name="module">
                    <?php 
                    if (!is_null($modules)) {
                        foreach ($modules as $module) {
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