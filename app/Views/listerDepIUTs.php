<H2>Liste de départements IUT</h2>


<?php  
	if(count($depIUTs) > 0 ){
		echo "<table border='1'>";
		echo "<th>Id</th><th>Nom</th><th>Consulter</th><th>Éliminer</th>";
		foreach($depIUTs as $depIUT) {
			echo "<tr>";
			echo "<td>".$depIUT->getId()."</td>";
			echo "<td>".$depIUT->getNom()."</td>";
			echo "<td><a href='".base_url()."/".route_to('ConsulterDepIUT', $depIUT->getId())."'>Consulter</td>";
			if ($depIUT->getDeleted() == null) {
				echo "<td><a href='".base_url()."/".route_to('EliminerDepIUT', $depIUT->getId())."'>Éliminer</td>";
			} else {
				echo "<td><a href='".base_url()."/".route_to('RestaurerDepIUT', $depIUT->getId())."'>Restaurer</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	} else {
		echo "<H2>Il n'y a pas de départements à lister</H2>";
	}
?>