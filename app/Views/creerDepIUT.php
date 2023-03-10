<H2>Formulaire de création d'un département IUT</H2>
<form method="POST" action="<?= base_url(); ?><?= route_to('AjouterDepIUT') ?>">
<table>
<tr>
<td>Nom : </td>
<td><input name="Nom" type="text" /></td>
</tr>
<tr>
<td>Adresse : </td>
<td><input name="Adresse" type="text" /></td>
</tr>
<tr>
<td>Ville : </td>
<td><input name="Ville" type="text"  /></td>
</tr>
<tr>
<td>Description : </td>
<td><textarea name="Description" rows="5" cols="33"></textarea></td>
</tr>
<tr>
<td><input type="submit" value="Envoyer" /></td>
<td><input type="reset" value="Effacer"></td>
</tr>
</table>
</form>
