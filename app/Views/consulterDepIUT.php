<H2>Formulaire de consultation d'un département IUT</H2>
<form method="POST" action="<?php echo base_url(); ?><?= route_to('ModifierDepIUT') ?>">
<table>
<tr>
<td>Identifiant : </td>
<td><input name="Id" type="text" value="<?= $depIUT->getId() ?>" readonly /></td>
</tr>
<tr>
<td>Nom : </td>
<td><input name="Nom" type="text" value="<?= $depIUT->getNom() ?>"/></td>
</tr>
<tr>
<td>Adresse : </td>
<td><input name="Adresse" type="text" value="<?= $depIUT->getAdresse() ?>" /></td>
</tr>
<tr>
<td>Ville : </td>
<td><input name="Ville" type="text" value="<?= $depIUT->getVille() ?>" /></td>
</tr>
<tr>
<td>Observations : </td>
<td><textarea name="Description" rows="5" cols="33"><?= $depIUT->getDescription() ?></textarea></td>
</tr>
<tr>
<td><input type="submit" value="Envoyer" /></td>
<td><input type="reset" value="Effacer"></td>
</tr>
</table>
</form>
