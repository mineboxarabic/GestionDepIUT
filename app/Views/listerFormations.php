<H2>Liste de formations</h2>
<?php if (count($formations) > 0) { ?>
	<table border='1'>
	<th>Id</th><th>Nom</th><th>Consulter</th><th>Éliminer</th>
	<?php foreach($formations as $formation): ?>
		<tr>
		<td><?= $formation->getId() ?></td>
		<td><?= $formation->getNom() ?></td>
		<td><a href="<?= base_url(); ?><?= route_to('ConsulterFormation', $formation->getId()) ?>">Consulter</td>
		<?php if ($formation->getDeleted() == null) { ?>
			<td><a href="<?= base_url() ?>/Controleur/eliminerDepIUT.php?Id=<?= $formation->getId() ?>">Éliminer</td>
		<?php } else { ?>
			<td><a href="<?= base_url() ?>/Controleur/eliminerDepIUT.php?Id=<?= $formation->getId() ?>">Restaurer</td>			
		<?php } ?>
		</tr>
	<?php endforeach ?>
	</table>	 
<?php } else { ?>
		<H2>Il n'y a pas de formations à lister</H2>
<?php } ?>
