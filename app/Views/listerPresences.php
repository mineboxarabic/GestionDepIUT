<H2>Liste de Presence</h2>


<?php 
	if(count($Presences) > 0) {
		echo "<table border='1'>";
		echo "<th>Id</th><th>Nom</th><th>Consulter</th><th>Éliminer</th>";
		foreach($Presences as $Presence) {
			echo "<tr>";
			echo "<td>".$Presence->getId()."</td>";
			echo "<td>".$Presence->getJustifie()."</td>";
			echo "<td><a href='".base_url()."/".route_to('ConsulterPresence', $Presence->getId())."'>Consulter</td>";
			if ($Presence->getDeleted() == null) {
				echo "<td><a href='".base_url()."/".route_to('EliminerPresence', $Presence->getId())."'>Éliminer</td>";
			} else {
				echo "<td><a href='".base_url()."/".route_to('RestaurerPresence', $Presence->getId())."'>Restaurer</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	} else {
		echo "<H2>Il n'y a pas de Presences à lister</H2>";
	}
?>