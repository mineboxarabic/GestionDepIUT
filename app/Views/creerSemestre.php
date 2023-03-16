<H2>Formulaire de création d'un(e) Etudiant(e)</H2>
<form method="POST" action="<?php echo base_url(); ?><?= route_to('AjouterSemestre') ?>">
    <table>
        <!-- id	nom	credits	description	formation-->
        <tr>
            <td>Nom : </td>
            <td><input name="nom" type="text" /></td>
        </tr>
        <tr> 
            <td>credits : </td>
            <td><input name="credits" type="number" /></td>
        </tr>
        <tr>
            <td>description : </td>
            <td><textarea name="description" rows="5" copls="33"></textarea></td>
        </tr>
        <tr>
            <td>formation : </td>
            <td>
                <select name="formation">
                    <?php 
                    if (!is_null($formations)) {
                        foreach ($formations as $formation) {
                            echo "<option value='" . $formation->getId() . "'>" . $formation->getNom() . "</option>";
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