<H2>Formulaire de création de Sceance</H2>
<form method="POST" action="<?php echo base_url(); ?><?= route_to('AjouterPresence') ?>">
    <table>
        <!-- id	justifie	commentaires	seance	etudiant	-->
        <tr>
            <td>Justifie : </td>
            <td><input name="justifie" type="text" /></td>
        </tr>
        <tr>
            <td>Commentaires : </td>
            <td><textarea name="commentaires" rows="5" copls="33"></textarea></td>
        </tr>

        <tr>
            <td>Seance : </td>
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
            <td>Etudiant : </td>
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