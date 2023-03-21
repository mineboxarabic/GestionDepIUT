<H2>Liste de Intervenant</h2>


<?php 
	if(count($Intervenants) > 0) {
		echo "<table border='1'>";
		echo "<th>Id</th><th>Nom</th><th>Consulter</th><th>Éliminer</th>";
		foreach($Intervenants as $Intervenant) {
			echo "<tr>";
			echo "<td>".$Intervenant->getDni()."</td>";
			echo "<td>".$Intervenant->getNom()."</td>";
			echo "<td><a href='".base_url()."/".route_to('ConsulterIntervenant', $Intervenant->getDni())."'>Consulter</td>";
			if ($Intervenant->getDeleted() == null) {
				echo "<td><a href='".base_url()."/".route_to('EliminerIntervenant', $Intervenant->getDni())."'>Éliminer</td>";
			} else {
				echo "<td><a href='".base_url()."/".route_to('RestaurerIntervenant', $Intervenant->getDni())."'>Restaurer</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	} else {
		echo "<H2>Il n'y a pas de Intervenants à lister</H2>";
	}
?>