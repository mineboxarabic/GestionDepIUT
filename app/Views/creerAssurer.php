<H2>Formulaire de création de Assurer</H2>
<form method="POST" action="<?php echo base_url(); ?><?= route_to('AjouterAssurer') ?>">
    <table>
        <!-- // id	debut	fin	intervenant	module-->
        <tr>
            <td>Debut : </td>
            <td><input name="debut" type="date" /></td>
        </tr>
        <tr>
            <td>Fin : </td>
            <td><input name="fin" type="date" /></td>
        </tr>
        <tr>
            <td>Intervenant : </td>
            <td>
                <select name="intervenant">
                    <?php 
                    if (!is_null($intervenants)) {
                        foreach ($intervenants as $intervenant) {
                            echo "<option value='" . $intervenant->getDni() . "'>" . $intervenant->getNom() . "</option>";
                        }
                    }
                    ?>
                </select>
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