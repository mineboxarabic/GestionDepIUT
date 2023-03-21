<H2>Formulaire de consulter de Sceance</H2>
<form method="POST" action="<?php echo base_url(); ?><?= route_to('ModifierPresence') ?>">
    <table>
        <!-- id	justifie	commentaires	seance	etudiant	-->
        <tr>
            <td>Id : </td>
            <td><input name="id" type="text" value="<?= $Presence->getId()?>" readonly /></td>
        </tr>
        <tr>
            <td>Justifie : </td>
            <td><input name="justifie" type="text" value="<?= $Presence->getJustifie()?>" /></td>
        </tr>
        <tr>
            <td>Commentaires : </td>
            <td><textarea name="commentaires" rows="5" copls="33"><?= $Presence->getJustifie()?></textarea></td>
        </tr>

        <tr>
            <td>Seance : </td>
            <td>
                <select name="seance">
                    <?php 
                    if (!is_null($seances)) {
                        foreach ($seances as $seance) {
                            error_log('dddd');
                            if($seance->getId() == $Presence->getSeance())
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
            <td>Etudiant : </td>
            <td>
                <select name="etudiant">
                    <?php 
                    if (!is_null($etudiants)) {
                        foreach ($etudiants as $etudiant) {
                            if($etudiant->getDni() == $Presence->getEtudiant())
                                echo "<option value='" . $etudiant->getDni() . "' selected>" . $etudiant->getNom() . "</option>";
                            else
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