<H2>Formulaire de consultation d'un Note</H2>
<form method="POST" action="<?php echo base_url(); ?><?= route_to('ModifierNote') ?>">
    <table>
        <!-- id	note	commentaires	controle	etudiant-->
        <tr>
            <td>id : </td>
            <td><input name="id" type="number" value="<?= $Note->getId() ?>" readonly/></td>
        </tr>
        <tr>
            <td>note : </td>
            <td><input name="note" type="number" max="20" min="0" value="<?= $Note->getNote() ?>" /></td>
        </tr>
        <tr> 
            <td>commentaires : </td>
            <td><textarea name="commentaires" rows="5" cols="33"><?= $Note->getCommentaires()?></textarea></td>
        </tr>
        <tr>
            <td>controle : </td>
            <td>
                <select name="controle">
                    <?php 
                    if (!is_null($controles)) {
                        foreach ($controles as $controle) {
                          if($controle->getId() == $Note->getControle()){
                            echo "<option value='" . $controle->getId() . "' selected>" . $controle->getType() . "</option>";
                            }else{
                            echo "<option value='" . $controle->getId() . "'>" . $controle->getType() . "</option>";
                            }
                        }
                    }
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
                            if($etudiant->getDni() == $Note->getEtudiant()){
                                echo "<option value='" . $etudiant->getDni() . "' selected>" . $etudiant->getNom() . "</option>";
                                }else{
                                echo "<option value='" . $etudiant->getDni() . "'>" . $etudiant->getNom() . "</option>";
                                }
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