<H2>Formulaire de création d'un UE</H2>
<form method="POST" action="<?php echo base_url(); ?><?= route_to('AjouterUE') ?>">
    <table>
        <!-- id	code	credits	volume	description	semestre-->
        <tr>
            <td>code : </td>
            <td><input name="code" type="text" /></td>
        </tr>
        <tr> 
            <td>credits : </td>
            <td><input name="credits" type="number" /></td>
        </tr>
        <tr>
            <td>volume : </td>
            <td><input name="volume" type="number" /></td>
        </tr>
        <tr>
            <td>description : </td>
            <td><textarea name="description" rows="5" copls="33"></textarea></td>
        </tr>
        <tr>
            <td>semestre : </td>
            <td>
                <select name="semestre">
                    <?php 
                    if (!is_null($semestres)) {
                        foreach ($semestres as $semestre) {
                            echo "<option value='" . $semestre->getId() . "'>" . $semestre->getNom() . "</option>";
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