<H2>Liste les Etudiant</h2>


<?php  
	if(count($Etudiants) > 0 ){
		echo "<table border='1'>";
		echo "<th>Id</th><th>Nom</th><th>Consulter</th><th>Éliminer</th>";
		foreach($Etudiants as $Etudiant) {
			echo "<tr>";
			echo "<td>".$Etudiant->getDni()."</td>";
			echo "<td>".$Etudiant->getNom()."</td>";
            echo "<td>".$Etudiant->getPrenom()."</td>";
			echo "<td><a href='".base_url()."/".route_to('ConsulterEtudiant', $Etudiant->getDni())."'>Consulter</td>";
			if ($Etudiant->getDeleted() == null) {
				echo "<td><a href='".base_url()."/".route_to('EliminerEtudiant', $Etudiant->getDni())."'>Éliminer</td>";
			} else {
				echo "<td><a href='".base_url()."/".route_to('RestaurerEtudiant', $Etudiant->getDni())."'>Restaurer</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	} else {
		echo "<H2>Il n'y a pas de départements à lister</H2>";
	}
?>