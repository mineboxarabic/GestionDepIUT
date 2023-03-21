<H2>Liste de Assurer</h2>


<?php 
	if(count($Assurers) > 0) {
		echo "<table border='1'>";
		echo "<th>Id</th><th>Nom</th><th>Consulter</th><th>Éliminer</th>";
		foreach($Assurers as $Assurer) {
			echo "<tr>";
			echo "<td>".$Assurer->getId()."</td>";
			echo "<td>".$Assurer->getIntervenant()."</td>";
			echo "<td><a href='".base_url()."/".route_to('ConsulterAssurer', $Assurer->getId())."'>Consulter</td>";
			if ($Assurer->getDeleted() == null) {
				echo "<td><a href='".base_url()."/".route_to('EliminerAssurer', $Assurer->getId())."'>Éliminer</td>";
			} else {
				echo "<td><a href='".base_url()."/".route_to('RestaurerAssurer', $Assurer->getId())."'>Restaurer</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	} else {
		echo "<H2>Il n'y a pas de Assurers à lister</H2>";
	}
?>