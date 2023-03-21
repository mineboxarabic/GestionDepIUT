<?php
namespace Config;
$session = \Config\Services::session();
namespace App\Controllers;

use CodeIgniter\I18n\Time;

class Home extends BaseController
{
		
    public function index()	
    {
        return view('welcome_message');
    }
    
    public function afficherDepIUT($titre)
    {
    	$depIUTModel = model('App\Models\DepIUTModel');    
    	//$depIUT = $depIUTModel->find('Metiers_du_Multimedia_2');
    	$depIUT = $depIUTModel->findAll();
    	$data = ['titre' => $depIUT[0]->Nom ];
    	
    	return view('afficher', $data);
    }
    
    public function listerDepIUTs()
    {
    	try 
    	{
	    	$depIUTModel = model('App\Models\DepIUTModel');    
  	  	$depIUTs = $depIUTModel->withDeleted()->findAll();
    		$data = ['depIUTs' => $depIUTs ];
			$session = \Config\Services::session();
			$test = $session->get('role');
    		return view('Entete', ['titre' => "Liste de départements IUT x$test "] ) . 
    					 view('listerDepIUTs', $data) .
    					 view('PiedDePage', $data);
    	}
    	catch(\Exception $e)
    	{    		
    		return view('pageErreur', ['exception' => $e]);
    	}
    	
    }

    public function creerDepIUT()
    {
    	try 
    	{
    		$data = ['titre' => 'Créer un département IUT'];
    		return view('Entete', $data ) . 
    					 view('creerDepIUT', $data) .
    					 view('PiedDePage', $data);
    	}
    	catch(\Exception $e)
    	{    		
    		return view('pageErreur', ['exception' => $e]);
    	}
    	
    }

    public function ajouterDepIUT()
    {
    	try 
    	{
				// Pour ré-diriger vers une route déjà définie.	
				// Par contre, elles font réapparaître le fichier index.php.
				// Il faut éliminer le fichier index.php de la variable indexPage du fichier App.php.     	
//	    	return redirect()->route('ListerDepIUTs');	
	    	//return redirect('ListerDepIUTs');
	    	
	    	// Pour ré-diriger vers un URI. En général, cela marche bien. 
	    	//return redirect()->to(base_url() . '/listerDepIUTs');
	    	
	    	// Cela laisse l'URL attribuée à cette requête.
	    	//return $this->listerDepIUTs();
	    	    
  	  	$nom = $this->request->getPost('Nom', FILTER_SANITIZE_STRING);
  	  	$ville = $this->request->getPost('Ville', FILTER_SANITIZE_STRING);
  	  	$adresse = $this->request->getPost('Adresse', FILTER_SANITIZE_STRING);
  	  	$description = $this->request->getPost('Description', FILTER_SANITIZE_STRING);
			
				$depIUTModel = model('App\Models\DepIUTModel');
				$builder = $depIUTModel->builder();
				$connexion = $builder->db();
				// Début de la transaction.
				// L'option transException s'assure qu'une Exception de base de données 
				// soit déclenchée si un problème est rencontrée avec la base de données.  
				$connexion->transException(true)->transStart();  	  	
  	  	$id = $depIUTModel->obtenirMaxIdDB($builder);
				$dataDepIUT = ["id" => "D$id",
											 "nom" => $nom, 
											 "adresse" => $adresse,
											 "ville" => $ville, 
											 "description" => $description];
				
				$res = $depIUTModel->insert($dataDepIUT, false);				
				//sleep(10);// Test pour voir si le champ Update marchait. 
				$connexion->transComplete();
				if ($res)							   	  	
	    		return redirect()->route('ListerDepIUTs');
				
    	}
    	catch(\DatabaseException $e)
    	{    		
    		return view('pageErreur', ['exception' => $e]);
    	}
    	
    }

    public function consulterDepIUT($id)
    {
    	try 
    	{
				$depIUTModel = model('App\Models\DepIUTModel');
				$depIUT = $depIUTModel->find($id); 
    		$data = ['titre' => 'Consulter un département IUT', 
    						 'depIUT' => $depIUT];
    		return view('Entete', $data ) . 
    					 view('consulterDepIUT', $data) .
    					 view('PiedDePage', $data);
    	}
    	catch(\Exception $e)
    	{    		
    		return view('pageErreur', ['exception' => $e]);
    	}
    	
    }

    public function modifierDepIUT()
    {
    	try 
    	{	
    		$id = $this->request->getPost('Id', FILTER_SANITIZE_STRING);    	    
  	  	$nom = $this->request->getPost('Nom', FILTER_SANITIZE_STRING);
  	  	$ville = $this->request->getPost('Ville', FILTER_SANITIZE_STRING);
  	  	$adresse = $this->request->getPost('Adresse', FILTER_SANITIZE_STRING);
  	  	$description = $this->request->getPost('Description', FILTER_SANITIZE_STRING);
			
				$depIUTModel = model('App\Models\DepIUTModel');
				$builder = $depIUTModel->builder();
				$connexion = $builder->db();
				// Début de la transaction.
				// L'option transException s'assure qu'une Exception de base de données 
				// soit déclenchée si un problème est rencontrée avec la base de données.  
				$connexion->transException(true)->transStart();  	  	
				$dataDepIUT = [ "nom" => $nom, 
											 "adresse" => $adresse,
											 "ville" => $ville, 
											 "description" => $description];
				// Actualisation avec le modèle.							 
				$res = $depIUTModel->update($id, $dataDepIUT);
				// Actualisation avec le query builder. Peut être utile pour faire plusieurs 
				// opérations. 
				//$dataDepIUT["id"] = $id;
				//$res = $builder->update($dataDepIUT);
				//sleep(10);// Test pour voir si le champ Update marchait. 
				$connexion->transComplete();
				if ($res)							   	  	
	    		return redirect()->route('ListerDepIUTs');
				
    	}
    	catch(\DatabaseException $e)
    	{    		
    		return view('pageErreur', ['exception' => $e]);
    	}
    	
    }


	public function eliminerDepIUT($id){
		try{
			$depIUTModel = model('App\Models\DepIUTModel');
			$depIUT = $depIUTModel->find($id);
			$depIUTModel->delete($id);
			return redirect()->route('ListerDepIUTs');

		}
		catch(\Exception $e)
		{    		
			return view('pageErreur', ['exception' => $e]);
		}

	}
    

	public function restaurerDepIUT($id){
		try{
			$DepiutModel = model('App\Models\DepIUTModel');
			$builder = $DepiutModel->builder();
			$connexion = $builder->db();
			// Début de la transaction.
			$connexion->transException(true)->transStart();
			$obj = ['deleted' => null];
			$DepiutModel->update($id, $obj);
			$connexion->transComplete();
			return redirect()->route('ListerDepIUTs');
		}
		catch(\Exception $e)
		{    		
			return view('pageErreur', ['exception' => $e]);
		}
	}
    
    
    /**
    * Méthodes pour la formation.
    *
    *
    **/

    public function listerFormations()
    {
    	try 
    	{
	    	$formationModel = model('App\Models\FormationModel');    
  	  	$formations = $formationModel->withDeleted()->findAll();
    		$data = ['formations' => $formations ];
    		return view('Entete', ['titre' => 'Liste des formations'] ) . 
    					 view('listerFormations', $data) .
    					 view('PiedDePage', $data);
    	}
    	catch(\Exception $e)
    	{    		
    		return view('pageErreur', ['exception' => $e]);
    	}
    	
    }
    
    
    public function creerFormation()
    {
    	try 
    	{
    		$depIUTModel = model('App\Models\DepIUTModel');
    		$depIUTs = $depIUTModel->findAll();
    		$data = ['titre' => 'Créer une formation', 
    						 'depIUTs' => $depIUTs];
    		return view('Entete', $data ) . 
    					 view('creerFormation', $data) .
    					 view('PiedDePage', $data);
    	}
    	catch(\Exception $e)
    	{    		
    		return view('pageErreur', ['exception' => $e]);
    	}
    	
    }

    public function ajouterFormation()
    {
    	try 
    	{	    	    
  	  	$nom = $this->request->getPost('Nom', FILTER_SANITIZE_STRING);
  	  	$capacite = $this->request->getPost('Capacite', FILTER_SANITIZE_STRING);
  	  	$pn = $this->request->getPost('PN', FILTER_SANITIZE_STRING);
  	  	$description = $this->request->getPost('Description', FILTER_SANITIZE_STRING);
  	  	$depIUT = $this->request->getPost('DepIUT', FILTER_SANITIZE_STRING);
			
				$formationModel = model('App\Models\FormationModel');
				$builder = $formationModel->builder();
				$connexion = $builder->db();
				// Début de la transaction.
				// L'option transException s'assure qu'une Exception de base de données 
				// soit déclenchée si un problème est rencontrée avec la base de données.  
				$connexion->transException(true)->transStart();  	  	
  	  	$id = $formationModel->obtenirMaxIdDB($builder);
				$formation = ["id" => "F$id",
											 "nom" => $nom, 
											 "pn" => $pn,
											 "capacite" => $capacite, 
											 "description" => $description, 
											 "depIUT" => $depIUT];
				$res = $formationModel->insert($formation, false);
				//sleep(10);// Test pour voir si le champ Update marchait. 
				//unset($dataDepIUT["id"]);				
				//$res = $depIUTModel->update("E_$id", $dataDepIUT, false);
				$connexion->transComplete();
				if ($res)							   	  	
	    		return redirect()->route('ListerDepIUTs');
				
    	}
    	catch(\DatabaseException $e)
    	{    		
    		return view('pageErreur', ['exception' => $e]);
    	}
    	
    }
    
    public function consulterFormation($id)
    {
    	try 
    	{
			$formationModel = model('App\Models\FormationModel');
			$formation = $formationModel->find($id); 
    		$depIUTModel = model('App\Models\DepIUTModel');
    		$depIUTs = $depIUTModel->findAll();
    		$data = ['titre' => 'Consulter une formation', 
							'formation' => $formation, 
							'depIUTs' => $depIUTs];
    		return view('Entete', $data ) . 
    					 view('consulterFormation', $data) .
    					 view('PiedDePage', $data);
    	}
    	catch(\Exception $e)
    	{    		
    		return view('pageErreur', ['exception' => $e]);
    	}
    	
    }
    
    public function modifierFormation(){
    	try 
    	{	
  	  	$id = $this->request->getPost('Id', FILTER_SANITIZE_STRING);    	
  	  	$nom = $this->request->getPost('Nom', FILTER_SANITIZE_STRING);
  	  	$capacite = $this->request->getPost('Capacite', FILTER_SANITIZE_STRING);
  	  	$pn = $this->request->getPost('PN', FILTER_SANITIZE_STRING);
  	  	$description = $this->request->getPost('Description', FILTER_SANITIZE_STRING);
  	  	$depIUT = $this->request->getPost('DepIUT', FILTER_SANITIZE_STRING);
			
				$formationModel = model('App\Models\FormationModel');
				$builder = $formationModel->builder();
				$connexion = $builder->db();
				// Début de la transaction.
				// L'option transException s'assure qu'une Exception de base de données 
				// soit déclenchée si un problème est rencontrée avec la base de données.  
				$connexion->transException(true)->transStart();  	  	
				$formation = [ "nom" => $nom, 
								"pn" => $pn,
								"capacite" => $capacite, 
								"description" => $description, 
								"depIUT" => $depIUT];
				// Actualisation avec le modèle.							 
				$res = $formationModel->update($id, $formation);
				$connexion->transComplete();
				if ($res)							   	  	
	    		return redirect()->route('ListerDepIUTs');
				
    	}
    	catch(\DatabaseException $e)
    	{    		
    		return view('pageErreur', ['exception' => $e]);
    	}
    	
    }

	public function EliminerFormation($id){
		try 
		{
			$formationModel = model('App\Models\FormationModel');
			$formationModel->delete($id);
			return redirect()->route('ListerFormations');
		}
		catch(\Exception $e)
		{    		
			return view('pageErreur', ['exception' => $e]);
		}
	}

	public function restaurerFormation($id){
		try{
			$formationModel = model('App\Models\FormationModel');
			$builder = $formationModel->builder();
			$connexion = $builder->db();
			// Début de la transaction.
			$connexion->transException(true)->transStart();
			$dataFormation = ["deleted" => null];
			$res = $formationModel->update($id, $dataFormation);
			$connexion->transComplete();
			return redirect()->route('ListerFormations');
		}
		catch(\Exception $e)
		{    		
			return view('pageErreur', ['exception' => $e]);
		}
	}


}
