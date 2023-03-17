<H2>Liste les UEs</h2>


<?php  
	if(count($UEs) > 0 ){
		echo "<table border='1'>";
		echo "<th>Id</th><th>Nom</th><th>Consulter</th><th>Éliminer</th>";
		foreach($UEs as $UE) {
			echo "<tr>";
			echo "<td>".$UE->getId()."</td>";
			echo "<td>".$UE->getCode()."</td>";
			echo "<td><a href='".base_url()."/".route_to('ConsulterUE', $UE->getId())."'>Consulter</td>";
			if ($UE->getDeleted() == null) {
				echo "<td><a href='".base_url()."/".route_to('EliminerUE', $UE->getId())."'>Éliminer</td>";
			} else {
				echo "<td><a href='".base_url()."/".route_to('RestaurerUE', $UE->getId())."'>Restaurer</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	} else {
		echo "<H2>Il n'y a pas de départements à lister</H2>";
	}
?>