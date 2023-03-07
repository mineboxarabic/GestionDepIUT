<H2>Liste de départements IUT</h2>
<?php if (count($depIUTs) > 0) { ?>
	<table border='1'>
	<th>Id</th><th>Nom</th><th>Consulter</th><th>Éliminer</th>
	<?php foreach($depIUTs as $depIUT): ?>
		<tr>
		<td><?= $depIUT->getId() ?></td>
		<td><?= $depIUT->getNom() ?></td>
		<td><a href="<?= base_url(); ?><?= route_to('ConsulterDepIUT', $depIUT->getId()) ?>">Consulter</td>
		<?php if ($depIUT->getDeleted() == null) { ?>
			<td><a href="<?= base_url() ?>/Controleur/eliminerDepIUT.php?Id=<?= $depIUT->getId() ?>">Éliminer</td>
		<?php } ?>
		</tr>
	<?php endforeach ?>
	</table>	 
<?php } else { ?>
		<H2>Il n'y a pas de départements à lister</H2>
<?php } ?>
