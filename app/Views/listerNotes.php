<H2>Liste les Notes</h2>


<?php  
	if(count($Notes) > 0 ){
		echo "<table border='1'>";
		echo "<th>Id</th><th>Nom</th><th>Consulter</th><th>Éliminer</th>";
		foreach($Notes as $note) {
			echo "<tr>";
			echo "<td>".$note->getId()."</td>";
			echo "<td>".$note->getNom()."</td>";
            echo "<td>".$note->getPrenom()."</td>";
			echo "<td><a href='".base_url()."/".route_to('ConsulterNote', $note->getId())."'>Consulter</td>";
			if ($note->getDeleted() == null) {
				echo "<td><a href='".base_url()."/".route_to('EliminerNote', $note->getId())."'>Éliminer</td>";
			} else {
				echo "<td><a href='".base_url()."/".route_to('RestaurerNote', $note->getId())."'>Restaurer</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	} else {
		echo "<H2>Il n'y a pas de départements à lister</H2>";
	}
?>