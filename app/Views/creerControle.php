<H2>Formulaire de création d'un(e) Controle(e)</H2>
<form method="POST" action="<?php echo base_url(); ?><?= route_to('AjouterControle') ?>">
    <table>
        <!-- id	type	duree	sujet	bareme	description	seance-->
        <tr> 
            <td>type : </td>
            <td><input maxlength="50" name="type" type="text" /></td>
        </tr>
        <tr>
            <td>duree : </td>
            <td><input max="99999999999" name="duree" type="number" /></td>
        </tr>
        <tr>
            <td>sujet : </td>
            <td><input maxlength="1000" name="sujet" type="text" /></td>
        </tr>
        <tr>
            <td>bareme : </td>
            <td><input max="99999999999" name="bareme" type="number" /></td>
        </tr>
        <tr>
            <td>description : </td>
            <td><textarea maxlength="500" name="description" rows="4" cols="50"></textarea></td>
        </tr>
        <tr>
            <td>seance : </td>
            <td>
                <select name="seance">
                    <?php 
                    if (!is_null($seances)) {
                        foreach ($seances as $seance) {
                            echo "<option value='" . $seance->getId() . "'>" . $seance->getTitre() . "</option>";
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