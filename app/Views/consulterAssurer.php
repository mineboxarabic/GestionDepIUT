<H2>Formulaire de consultation de Assurer</H2>
<form method="POST" action="<?php echo base_url(); ?><?= route_to('ModifierAssurer') ?>">
    <table>
        <!-- // id	debut	fin	intervenant	module-->
        <tr>
            <td>Id : </td>
            <td><input name="id" type="text" value="<?=$Assurer->getId()?>" readonly/></td>
        </tr>
        <tr>
            <td>Debut : </td>
            <td><input name="debut" type="date" value="<?=$Assurer->getDebut()?>"/></td>
        </tr>
        <tr>
            <td>Fin : </td>
            <td><input name="fin" type="date" value="<?=$Assurer->getFin()?>"/> </td>
        </tr>
        <tr>
            <td>Intervenant : </td>
            <td>
                <select name="intervenant">
                    <?php 
                    if (!is_null($intervenants)) {
                        foreach ($intervenants as $intervenant) {
                           if($intervenant->getDni() == $Assurer->getIntervenant()){
                                echo "<option value='" . $intervenant->getDni() . "' selected>" . $intervenant->getNom() . "</option>";
                            }else{
                                echo "<option value='" . $intervenant->getDni() . "'>" . $intervenant->getNom() . "</option>";
                            }
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
                            if($module->getId() == $Assurer->getModule()){
                                echo "<option value='" . $module->getId() . "' selected>" . $module->getCode() . "</option>";
                            }else{
                                echo "<option value='" . $module->getId() . "'>" . $module->getCode() . "</option>";
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