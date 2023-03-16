<H2>Liste les Controle</h2>


<?php  
//id	type	duree	sujet	bareme	description	seance
	if(count($Controles) > 0 ){
		echo "<table border='1'>";
		echo "<th>Id</th><th>Nom</th><th>Consulter</th><th>Éliminer</th>";
		foreach($Controles as $Controle) {
			echo "<tr>";
			echo "<td>".$Controle->getId()."</td>";
			echo "<td>".$Controle->getType()."</td>";
            echo "<td>".$Controle->getSujet()."</td>";
			echo "<td><a href='".base_url()."/".route_to('ConsulterControle', $Controle->getId())."'>Consulter</td>";
			if ($Controle->getDeleted() == null) {
				echo "<td><a href='".base_url()."/".route_to('EliminerControle', $Controle->getId())."'>Éliminer</td>";
			} else {
				echo "<td><a href='".base_url()."/".route_to('RestaurerControle', $Controle->getId())."'>Restaurer</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	} else {
		echo "<H2>Il n'y a pas de Controle à lister</H2>";
	}
?>