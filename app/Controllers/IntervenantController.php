<?php 
    namespace App\Controllers;

    class IntervenantController extends BaseController{
        /*restaurerIntervenant
        eliminerIntervenant
        modifierIntervenant
        consulterIntervenant
        ajouterIntervenant
        creerIntervenant
        listerIntervenants*/

        function listerIntervenants(){
            try 
            {
                $IntervenantModel = model('App\Models\IntervenantModel');    
                $Intervenants = $IntervenantModel->withDeleted()->findAll();
                $data = ['Intervenants' => $Intervenants ];
                return view('Entete', ['titre' => 'Liste des Intervenants'] ) . 
                             view('listerIntervenants', $data).
                             view('PiedDePage');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }

        function creerIntervenant(){

            $DepIUTModel = model('App\Models\DepIUTModel');
            $DepIUTs = $DepIUTModel->findAll();
            $DepIUTs = [
                'DepIUTs' => $DepIUTs
            ];
            $titre = [
                'titre' => 'Créer un Intervenant'
            ];
            return view('Entete',$titre).view('creerIntervenant', $DepIUTs).view('PiedDePage');
        }

        public function ajouterIntervenant()
        {

            try 
            {	  //dni	nom	prenom	adresse	naissance	numProf	statut	utilisateur	motDePasse	role depIUT
                $nom = $this->request->getPost('nom', FILTER_SANITIZE_STRING);
                $prenom = $this->request->getPost('prenom', FILTER_SANITIZE_STRING);
                $adresse = $this->request->getPost('adresse', FILTER_SANITIZE_STRING);
                $naissance = $this->request->getPost('naissance', FILTER_SANITIZE_STRING);
                $numProf = $this->request->getPost('numProf', FILTER_SANITIZE_STRING);
                $statut = $this->request->getPost('statut', FILTER_SANITIZE_STRING);
                $utilisateur = $this->request->getPost('utilisateur', FILTER_SANITIZE_STRING);
                $motDePasse = $this->request->getPost('motDePasse', FILTER_SANITIZE_STRING);
                $role = $this->request->getPost('role', FILTER_SANITIZE_STRING);
                $depIUT = $this->request->getPost('DepIUT', FILTER_SANITIZE_STRING);



                $IntervenantModel = model('App\Models\IntervenantModel');
                $builder = $IntervenantModel->builder();
                $connexion = $builder->db();
                

                $connexion->transException(true)->transStart();  	  	
                
               $dni = $IntervenantModel->obtenirMaxDniDB($builder);

                $Intervenant = [
                    'dni' => "I$dni",
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'adresse' => $adresse,
                    'naissance' => $naissance,
                    'numProf' => $numProf,
                    'statut' => $statut,
                    'utilisateur' => $utilisateur,
                    'motDePasse' => $motDePasse,
                    'role' => $role,
                    'depIUT' => $depIUT];

                
                $res = $IntervenantModel->insert($Intervenant, false);
                
                $connexion->transComplete();
                if ($res)							   	  	
                return redirect()->route('ListerIntervenants');
                
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
            
        }

        public function consulterIntervenant($id)
        {
            try 
            {
                $IntervenantModel = model('App\Models\IntervenantModel');
                $DepIUTModel = model('App\Models\DepIUTModel');


                $Intervenant = $IntervenantModel->find($id);
                $DepIUTs = $DepIUTModel->findAll();
                $data = ['Intervenant' => $Intervenant , 'DepIUTs' => $DepIUTs , "roles" => ['Professeur','Admin','Etudiant']];
                return view('Entete', ['titre' => 'Consulter un Intervenant'] ) . 
                             view('consulterIntervenant', $data).
                             view('PiedDePage');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }

        public function modifierIntervenant(){
            try 
            {	 //id	nom	credits	description	UE   
                $dni = $this->request->getPost('dni', FILTER_SANITIZE_STRING);
                $nom = $this->request->getPost('nom', FILTER_SANITIZE_STRING);
                $prenom = $this->request->getPost('prenom', FILTER_SANITIZE_STRING);
                $adresse = $this->request->getPost('adresse', FILTER_SANITIZE_STRING);
                $naissance = $this->request->getPost('naissance', FILTER_SANITIZE_STRING);
                $numProf = $this->request->getPost('numProf', FILTER_SANITIZE_STRING);
                $statut = $this->request->getPost('statut', FILTER_SANITIZE_STRING);
                $utilisateur = $this->request->getPost('utilisateur', FILTER_SANITIZE_STRING);
                $motDePasse = $this->request->getPost('motDePasse', FILTER_SANITIZE_STRING);
                $role = $this->request->getPost('role', FILTER_SANITIZE_STRING);
                $depIUT = $this->request->getPost('DepIUT', FILTER_SANITIZE_STRING);

                    $SemesterModel = model('App\Models\IntervenantModel');
                    $builder = $SemesterModel->builder();
                    $connexion = $builder->db();


                    $connexion->transException(true)->transStart();	  	
                    $semester = [
                        'nom' => $nom,
                        'prenom' => $prenom,
                        'adresse' => $adresse,
                        'naissance' => $naissance,
                        'numProf' => $numProf,

                        'statut' => $statut,
                        'utilisateur' => $utilisateur,
                        'motDePasse' => $motDePasse,
                        'role' => $role,
                        'depIUT' => $depIUT
                                ];
                    $res = $SemesterModel->update($dni, $semester);
                    $connexion->transComplete();
                    if ($res)							   	  	
                    return redirect()->route('ListerIntervenants');
                    
            }
            catch(\DatabaseException $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
            
        }


        public function EliminerIntervenant($id){
            try 
            {
                $IntervenantModel = model('App\Models\IntervenantModel');
                $IntervenantModel->delete($id);
                return redirect()->route('ListerIntervenants');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }
    
        public function restaurerIntervenant($id){
            try{
                $IntervenantModel = model('App\Models\IntervenantModel');
                $builder = $IntervenantModel->builder();
                $connexion = $builder->db();
                // Début de la transaction.
                $connexion->transException(true)->transStart();
                $dataUE = ["deleted" => null];
                $res = $IntervenantModel->update($id, $dataUE);
                $connexion->transComplete();
                return redirect()->route('ListerIntervenants');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }
    }
?>