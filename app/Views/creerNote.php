<H2>Formulaire de création d'un(e) Etudiant(e)</H2>
<form method="POST" action="<?php echo base_url(); ?><?= route_to('AjouterNote') ?>">
    <table>
        <!-- id	note	commentaires	controle	etudiant-->
        <tr>
            <td>note : </td>
            <td><input name="note" type="number" max="20" min="0" /></td>
        </tr>
        <tr> 
            <td>commentaires : </td>
            <td><textarea name="commentaires" rows="5" cols="33"></textarea></td>
        </tr>
        <tr>
            <td>controle : </td>
            <td>
                <select name="controle">
                    <?php 
                        echo "<option value='IdOfTestControl'>NameOFTestControle</option>";
                    ?>
                </select>
            </td>
        </tr> 
        <tr>
            <td>etudiant : </td>
            <td>
                <select name="etudiant">
                    <?php 
                    if (!is_null($etudiants)) {
                        foreach ($etudiants as $etudiant) {
                            echo "<option value='" . $etudiant->getDni() . "'>" . $etudiant->getNom() . "</option>";
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