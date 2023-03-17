<?php 
    namespace App\Controllers;

    class ModuleController extends BaseController{
        /*restaurerModule
        eliminerModule
        modifierModule
        consulterModule
        ajouterModule
        creerModule
        listerModules*/

        function listerModules(){
            try 
            {
                $ModuleModel = model('App\Models\ModuleModel');    
                $Modules = $ModuleModel->withDeleted()->findAll();
                $data = ['Modules' => $Modules ];
                return view('Entete', ['titre' => 'Liste des Modules'] ) . 
                             view('listerModules', $data).
                             view('PiedDePage');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }

        function creerModule(){

            $UEModel = model('App\Models\UEModel');
            $UEs = $UEModel->findAll();
            $UEs = [
                'UEs' => $UEs
            ];
            $titre = [
                'titre' => 'Créer un Module'
            ];
            return view('Entete',$titre).view('creerModule', $UEs).view('PiedDePage');
        }

        public function ajouterModule()
        {

            try 
            {	  //id	code	nom	credits	volume	description	ue
                $code = $this->request->getPost('code', FILTER_SANITIZE_STRING);
                $nom = $this->request->getPost('nom', FILTER_SANITIZE_STRING);
                $credits = $this->request->getPost('credits', FILTER_SANITIZE_STRING);
                $volume = $this->request->getPost('volume', FILTER_SANITIZE_STRING);
                $description = $this->request->getPost('description', FILTER_SANITIZE_STRING);
                $UE = $this->request->getPost('UE', FILTER_SANITIZE_STRING);


                $ModuleModel = model('App\Models\ModuleModel');
                $builder = $ModuleModel->builder();
                $connexion = $builder->db();
                

                $connexion->transException(true)->transStart();  	  	
                
                $id = $ModuleModel->obtenirMaxId($builder);

                $Module = ["id" => "M$id", "code" => $code, "nom" => $nom, "credits" => $credits, "volume" => $volume, "description" => $description, "ue" => $UE];

                


                $res = $ModuleModel->insert($Module, false);
                
                $connexion->transComplete();
                if ($res)							   	  	
                return redirect()->route('ListerModules');
                
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
            
        }

        public function consulterModule($id)
        {
            try 
            {
                $ModuleModel = model('App\Models\ModuleModel');
                $Module = $ModuleModel->find($id);
                
                $UEModel = model('App\Models\UEModel');
                $UEs = $UEModel->findAll();
                $data = ['Module' => $Module , 'UEs' => $UEs ];
                return view('Entete', ['titre' => 'Consulter un Module'] ) . 
                             view('consulterModule', $data).
                             view('PiedDePage');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }

        public function modifierModule(){
            try 
            {	 //id	nom	credits	description	UE   
                $id = $this->request->getPost('id', FILTER_SANITIZE_STRING);
                $code = $this->request->getPost('code', FILTER_SANITIZE_STRING);
                $nom = $this->request->getPost('nom', FILTER_SANITIZE_STRING);
                $credits = $this->request->getPost('credits', FILTER_SANITIZE_STRING);
                $volume = $this->request->getPost('volume', FILTER_SANITIZE_STRING);
                $description = $this->request->getPost('description', FILTER_SANITIZE_STRING);
                $UE = $this->request->getPost('UE', FILTER_SANITIZE_STRING);

                    $SemesterModel = model('App\Models\ModuleModel');
                    $builder = $SemesterModel->builder();
                    $connexion = $builder->db();


                    $connexion->transException(true)->transStart();	  	
                    $semester = [
                        "code" => $code,
                        "nom" => $nom,
                        "credits" => $credits,
                        "volume" => $volume,
                        "description" => $description,
                        "ue" => $UE
                        
                                ];

                                
                    $res = $SemesterModel->update($id, $semester);
                    $connexion->transComplete();
                    if ($res)							   	  	
                    return redirect()->route('ListerModules');
                    
            }
            catch(\DatabaseException $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
            
        }


        public function EliminerModule($id){
            try 
            {
                $ModuleModel = model('App\Models\ModuleModel');
                $ModuleModel->delete($id);
                return redirect()->route('ListerModules');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }
    
        public function restaurerModule($id){
            try{
                $ModuleModel = model('App\Models\ModuleModel');
                $builder = $ModuleModel->builder();
                $connexion = $builder->db();
                // Début de la transaction.
                $connexion->transException(true)->transStart();
                $dataUE = ["deleted" => null];
                $res = $ModuleModel->update($id, $dataUE);
                $connexion->transComplete();
                return redirect()->route('ListerModules');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }
    }
?>