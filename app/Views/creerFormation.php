<H2>Formulaire de création d'une formation</H2>
<form method="POST" action="<?php echo base_url(); ?><?= route_to('AjouterFormation') ?>">
<table>
<tr>
<td>Nom : </td>
<td><input name="Nom" type="text" /></td>
</tr>
<td>Capacité : </td>
<td><input name="Capacite" type="number" max="60" min="30"  /></td>
</tr>
<tr>
<td>Programme national : </td>
<td><textarea name="PN" rows="5" cols="33"></textarea></td>
</tr>
<tr>
<td>Description : </td>
<td><textarea name="Description" rows="5" cols="33"></textarea></td>
</tr>
<tr>
<td>Département : </td>
<td>
<select name="DepIUT">
<?php	if (!is_null($depIUTs)) { ?>
		<?php foreach($depIUTs as $depIUT): ?>
		 <option value='<?= $depIUT->getId() ?>'><?= $depIUT->getNom() ?></option>
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