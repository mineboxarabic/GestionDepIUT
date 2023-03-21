<H2>Liste de Seance</h2>


<?php 
	if(count($Seances) > 0) {
		echo "<table border='1'>";
		echo "<th>Id</th><th>Nom</th><th>Consulter</th><th>Éliminer</th>";
		foreach($Seances as $Seance) {
			echo "<tr>";
			echo "<td>".$Seance->getId()."</td>";
			echo "<td>".$Seance->getTitre()."</td>";
			echo "<td><a href='".base_url()."/".route_to('ConsulterSeance', $Seance->getId())."'>Consulter</td>";
			if ($Seance->getDeleted() == null) {
				echo "<td><a href='".base_url()."/".route_to('EliminerSeance', $Seance->getId())."'>Éliminer</td>";
			} else {
				echo "<td><a href='".base_url()."/".route_to('RestaurerSeance', $Seance->getId())."'>Restaurer</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	} else {
		echo "<H2>Il n'y a pas de Seances à lister</H2>";
	}
?>