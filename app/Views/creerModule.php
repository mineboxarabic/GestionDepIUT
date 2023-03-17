<H2>Formulaire de création de module</H2>
<form method="POST" action="<?php echo base_url(); ?><?= route_to('AjouterModule') ?>">
    <table>
        <!-- id	code	nom	credits	volume	description	ue-->
        <tr>
            <td>Code : </td>
            <td><input name="code" type="text" /></td>
        </tr>
        <tr>
            <td>Nom : </td>
            <td><input name="nom" type="text" /></td>
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
            <td>ue : </td>
            <td>
                <select name="ue">
                    <?php 
                    if (!is_null($UEs)) {
                        foreach ($UEs as $ue) {
                            echo "<option value='" . $ue->getId() . "'>" . $ue->getCode() . "</option>";
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