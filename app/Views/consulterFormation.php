<H2>Formulaire de consultation d'une formation</H2>
<form method="POST" action="<?php echo base_url(); ?><?= route_to('ModifierFormation') ?>">
<table>
<tr>
<td>Identifiant : </td>
<td><input name="Id" type="text" value="<?= $formation->getId() ?>" readonly /></td>
</tr>
<tr>
<td>Nom : </td>
<td><input name="Nom" type="text" value="<?= $formation->getNom() ?>"/></td>
</tr>
<td>Capacité : </td>
<td><input name="Capacite" type="number" max="60" min="30"  value="<?= $formation->capacite ?>" /></td>
</tr>
<tr>
<td>Programme national : </td>
<td><textarea name="PN" rows="5" cols="33"><?= $formation->pn ?>
</textarea></td>
</tr>
<tr>
<td>Description : </td>
<td><textarea name="Description" rows="5" cols="33"><?= $formation->getDescription() ?></textarea></td>
</tr>
<tr>
<td>Département : </td>
<td>
<select name="DepIUT">
<?php	if (!is_null($depIUTs)) { ?>
		<?php foreach($depIUTs as $depIUT): ?>
			<?php if ($depIUT->getId() == $formation->depIUT) { ?>
		 		<option value='<?= $depIUT->getId() ?>' selected><?= $depIUT->getNom() ?></option>
		 	<?php } else { ?>
		 		<option value='<?= $depIUT->getId() ?>'><?= $depIUT->getNom() ?></option>
		 	<?php } ?>
		<?php endforeach ?>
<?php	} ?>
</select>
</td>
</tr>
<tr>
<td><input type="submit" value="Envoyer" /></td>
<td><input type="reset" value="Effacer"></td>
</tr>
</table>
</form>