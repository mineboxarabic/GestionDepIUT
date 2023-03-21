<?php 
    namespace App\Controllers;

    class SeanceController extends BaseController{
        /*restaurerSeance
        eliminerSeance
        modifierSeance
        consulterSeance
        ajouterSeance
        creerSeance
        listerSeancess*/

        function listerSeances(){
            try 
            {
                $SeanceModel = model('App\Models\SeanceModel');    
                $Seances = $SeanceModel->withDeleted()->findAll();
                $data = ['Seances' => $Seances ];
                return view('Entete', ['titre' => 'Liste des Seances'] ) . 
                             view('listerSeances', $data).
                             view('PiedDePage');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }

        function creerSeance(){

            $modulModel = model('App\Models\ModuleModel');
            $modules = $modulModel->findAll();

            $data = [
                'modules' => $modules,
            ];

            $titre = [
                'titre' => 'Créer un Seance'
            ];
            return view('Entete',$titre).view('creerSeance', $data).view('PiedDePage');
        }

        public function ajouterSeance()
        {

            try 
            {	  // date	heure	duree	titre	salle	description	type	module

                $date = $this->request->getPost('date');

                $heure = $this->request->getPost('heure');
                $duree = $this->request->getPost('duree');
                $titre = $this->request->getPost('titre');
                $salle = $this->request->getPost('salle');
                $description = $this->request->getPost('description');
                $type = $this->request->getPost('type');
                $module = $this->request->getPost('module');



                $SeanceModel = model('App\Models\SeanceModel');
                $builder = $SeanceModel->builder();
                $connexion = $builder->db();
                

                $connexion->transException(true)->transStart();  	  	
                


                $Seance = [
                    'date' => $date,
                    'heure' => $heure,
                    'duree' => $duree,
                    'titre' => $titre,
                    'salle' => $salle,
                    'description' => $description,
                    'type' => $type,
                    'module' => $module,];

                
                $res = $SeanceModel->insert($Seance, false);
                
                $connexion->transComplete();
                if ($res)							   	  	
                return redirect()->route('ListerSeances');
                
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
            
        }

        public function consulterSeance($id)
        {
            try 
            {
                $SeanceModel = model('App\Models\SeanceModel');


                $modulModel = model('App\Models\ModuleModel');
                $modules = $modulModel->findAll();

                $Seance = $SeanceModel->find($id);

                $data = ['Seance' => $Seance, 'modules' => $modules];

                return view('Entete', ['titre' => 'Consulter un Seance'] ) . 
                             view('consulterSeance', $data).
                             view('PiedDePage');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }

        public function modifierSeance(){
            try 
            {	 //id	nom	credits	description	UE
                $id = $this->request->getPost('id');
                $date = $this->request->getPost('date');
                $heure = $this->request->getPost('heure');
                $duree = $this->request->getPost('duree');
                $titre = $this->request->getPost('titre');
                $salle = $this->request->getPost('salle');
                $description = $this->request->getPost('description');
                $type = $this->request->getPost('type');
                $module = $this->request->getPost('module');

                    $SeanceModel = model('App\Models\SeanceModel');
                    $builder = $SeanceModel->builder();
                    $connexion = $builder->db();


                    $connexion->transException(true)->transStart();	  	
                    $Seance = [
                        'date' => $date,
                        'heure' => $heure,
                        'duree' => $duree,
                        'titre' => $titre,
                        'salle' => $salle,
                        'description' => $description,
                        'type' => $type,
                        'module' => $module,];

                    
                        $res = $SeanceModel->update($id, $Seance);

                    $connexion->transComplete();
                    if ($res)							   	  	
                    return redirect()->route('ListerSeances');
                    
            }
            catch(\DatabaseException $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
            
        }


        public function EliminerSeance($id){
            try 
            {
                $SeanceModel = model('App\Models\SeanceModel');
                $SeanceModel->delete($id);
                return redirect()->route('ListerSeances');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }
    
        public function restaurerSeance($id){
            try{
                $SeanceModel = model('App\Models\SeanceModel');
                $builder = $SeanceModel->builder();
                $connexion = $builder->db();
                // Début de la transaction.
                $connexion->transException(true)->transStart();
                $dataUE = ["deleted" => null];
                $res = $SeanceModel->update($id, $dataUE);
                $connexion->transComplete();
                return redirect()->route('ListerSeances');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }
    }
?>