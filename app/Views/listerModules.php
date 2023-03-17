<H2>Liste les Modules</h2>


<?php  
	if(count($Modules) > 0 ){
		echo "<table border='1'>";
		echo "<th>Id</th><th>Nom</th><th>Consulter</th><th>Éliminer</th>";
		foreach($Modules as $Module) {
			echo "<tr>";
			echo "<td>".$Module->getId()."</td>";
			echo "<td>".$Module->getNom()."</td>";
			echo "<td><a href='".base_url()."/".route_to('ConsulterModule', $Module->getId())."'>Consulter</td>";
			if ($Module->getDeleted() == null) {
				echo "<td><a href='".base_url()."/".route_to('EliminerModule', $Module->getId())."'>Éliminer</td>";
			} else {
				echo "<td><a href='".base_url()."/".route_to('RestaurerModule', $Module->getId())."'>Restaurer</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	} else {
		echo "<H2>Il n'y a pas de départements à lister</H2>";
	}
?>