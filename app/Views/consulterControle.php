<H2>Formulaire de consultation d'un Controle</H2>
<form method="POST" action="<?php echo base_url(); ?><?= route_to('ModifierControle') ?>">
    <table>
        <!-- id	type	duree	sujet	bareme	description	seance-->
        <tr>
            <td>id : </td>
            <td><input name="id" type="text" value="<?= $Controle->getId() ?>" /></td>
        </tr>
        <tr> 
            <td>type : </td>
            <td><input name="type" type="text" maxlength="50" value="<?= $Controle->getType() ?>" /></td>
        </tr>
        <tr>
            <td>duree : </td>
            <td><input name="duree" type="number" max="99999999999" value="<?= $Controle->getDuree() ?>" /></td>
        </tr>
        <tr>
            <td>sujet : </td>
            <td><input name="sujet" type="text" maxlength="1000" value="<?= $Controle->getSujet() ?>" /></td>
        </tr>
        <tr>
            <td>bareme : </td>
            <td><input name="bareme" type="number" max="99999999999" value="<?= $Controle->getBareme() ?>" /></td>
        </tr>
        <tr>
            <td>description : </td>
            <td>
                <textarea name="description" rows="4" cols="50" maxlength="500"><?= $Controle->getDescription() ?></textarea>
            </td>
        </tr>
        <tr>
            <td>seance : </td>
            <td>
                <select name="seance">
                    <?php 
                    if (!is_null($seances)) {
                        foreach ($seances as $seance) {
                            if($seance->getId() == $Controle->getSeance())
                                echo "<option value='" . $seance->getId() . "' selected>" . $seance->getTitre() . "</option>";
                            else
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