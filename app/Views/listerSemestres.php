<H2>Liste les Semestres</h2>


<?php  
	if(count($Semestres) > 0 ){
		echo "<table border='1'>";
		echo "<th>Id</th><th>Nom</th><th>Consulter</th><th>Éliminer</th>";
		foreach($Semestres as $Semestre) {
			echo "<tr>";
			echo "<td>".$Semestre->getId()."</td>";
			echo "<td>".$Semestre->getNom()."</td>";
			echo "<td><a href='".base_url()."/".route_to('ConsulterSemestre', $Semestre->getId())."'>Consulter</td>";
			if ($Semestre->getDeleted() == null) {
				echo "<td><a href='".base_url()."/".route_to('EliminerSemestre', $Semestre->getId())."'>Éliminer</td>";
			} else {
				echo "<td><a href='".base_url()."/".route_to('RestaurerSemestre', $Semestre->getId())."'>Restaurer</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	} else {
		echo "<H2>Il n'y a pas de départements à lister</H2>";
	}
?>