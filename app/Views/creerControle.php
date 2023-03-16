<H2>Formulaire de création d'un(e) Etudiant(e)</H2>
<form method="POST" action="<?php echo base_url(); ?><?= route_to('AjouterEtudiant') ?>">
    <table>
        <!-- id	type	duree	sujet	bareme	description	seance-->
        <tr>
            <td>id : </td>
            <td><input name="id" type="text" /></td>
        </tr>
        <tr> 
            <td>type : </td>
            <td><input name="type" type="text" /></td>
        </tr>
        <tr>
            <td>duree : </td>
            <td><input name="duree" type="text" /></td>
        </tr>
        <tr>
            <td>sujet : </td>
            <td><input name="sujet" type="text" /></td>
        </tr>
        <tr>
            <td>bareme : </td>
            <td><input name="bareme" type="text" /></td>
        </tr>
        <tr>
            <td>description : </td>
            <td><input name="description" type="text" /></td>
        </tr>
        <tr>
            <td>seance : </td>
            <td>
                <select name="seance">
                    <?php 
                    if (!is_null($seances)) {
                        foreach ($seances as $seance) {
                            echo "<option value='" . $seance->getId() . "'>" . $seance->getNom() . "</option>";
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