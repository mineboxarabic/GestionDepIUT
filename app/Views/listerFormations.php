<H2>Liste de formations</h2>


<?php 
	if(count($formations) > 0) {
		echo "<table border='1'>";
		echo "<th>Id</th><th>Nom</th><th>Consulter</th><th>Éliminer</th>";
		foreach($formations as $formation) {
			echo "<tr>";
			echo "<td>".$formation->getId()."</td>";
			echo "<td>".$formation->getNom()."</td>";
			echo "<td><a href='".base_url()."/".route_to('ConsulterFormation', $formation->getId())."'>Consulter</td>";
			if ($formation->getDeleted() == null) {
				echo "<td><a href='".base_url()."/".route_to('EliminerFormation', $formation->getId())."'>Éliminer</td>";
			} else {
				echo "<td><a href='".base_url()."/".route_to('RestaurerFormation', $formation->getId())."'>Restaurer</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	} else {
		echo "<H2>Il n'y a pas de formations à lister</H2>";
	}
?>