<?php 
    namespace App\Controllers;

    class AssurerController extends BaseController{
        /*restaurerAssurer
        eliminerAssurer
        modifierAssurer
        consulterAssurer
        ajouterAssurer
        creerAssurer
        listerAssurers*/

        function listerAssurer(){
            try 
            {
                $AssurerModel = model('App\Models\AssurerModel');    
                $Assurers = $AssurerModel->withDeleted()->findAll();
                $data = ['Assurers' => $Assurers ];
                return view('Entete', ['titre' => 'Liste des Assurers'] ) . 
                             view('listerAssurers', $data).
                             view('PiedDePage');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }

        function creerAssurer(){

            $modulModel = model('App\Models\ModuleModel');
            $modules = $modulModel->findAll();
            $intervenantModel = model('App\Models\IntervenantModel');
            $intervenants = $intervenantModel->findAll();


            $data = [
                'modules' => $modules,
                'intervenants' => $intervenants
            ];

            $titre = [
                'titre' => 'Créer un Assurer'
            ];
            return view('Entete',$titre).view('creerAssurer', $data).view('PiedDePage');
        }

        public function ajouterAssurer()
        {

            try 
            {	  //// id	debut	fin	intervenant	module
                
                    $debut = $this->request->getPost('debut');
                    $fin = $this->request->getPost('fin');
                    $intervenant = $this->request->getPost('intervenant');
                    $module = $this->request->getPost('module');



                $AssurerModel = model('App\Models\AssurerModel');
                $builder = $AssurerModel->builder();
                $connexion = $builder->db();
                

                $connexion->transException(true)->transStart();  	  	
                


                $Assurer = [
                    'debut' => $debut,
                    'fin' => $fin,
                    'intervenant' => $intervenant,
                    'module' => $module];

                
                $res = $AssurerModel->insert($Assurer, false);
                
                $connexion->transComplete();
                if ($res)							   	  	
                return redirect()->route('ListerAssurer');
                
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
            
        }

        public function consulterAssurer($id)
        {
            try 
            {
                $AssurerModel = model('App\Models\AssurerModel');


                $modulModel = model('App\Models\ModuleModel');
                $modules = $modulModel->findAll();
                $intervenantModel = model('App\Models\IntervenantModel');
                $intervenants = $intervenantModel->findAll();


                $Assurer = $AssurerModel->find($id);

                $data = ['Assurer' => $Assurer, 'modules' => $modules, 'intervenants' => $intervenants ];

                return view('Entete', ['titre' => 'Consulter un Assurer'] ) . 
                             view('consulterAssurer', $data).
                             view('PiedDePage');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }

        public function modifierAssurer(){
            try 
            {	 //id	nom	credits	description	UE
                $id = $this->request->getPost('id');
                $debut = $this->request->getPost('debut');
                $fin = $this->request->getPost('fin');
                $intervenant = $this->request->getPost('intervenant');
                $module = $this->request->getPost('module');

                    $SemesterModel = model('App\Models\AssurerModel');
                    $builder = $SemesterModel->builder();
                    $connexion = $builder->db();


                    $connexion->transException(true)->transStart();	  	
                    $semester = [
                        'debut' => $debut,
                        'fin' => $fin,
                        'intervenant' => $intervenant,
                        'module' => $module

                                ];
                    $res = $SemesterModel->update($id, $semester);
                    $connexion->transComplete();
                    if ($res)							   	  	
                    return redirect()->route('ListerAssurer');
                    
            }
            catch(\DatabaseException $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
            
        }


        public function EliminerAssurer($id){
            try 
            {
                $AssurerModel = model('App\Models\AssurerModel');
                $AssurerModel->delete($id);
                return redirect()->route('ListerAssurer');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }
    
        public function restaurerAssurer($id){
            try{
                $AssurerModel = model('App\Models\AssurerModel');
                $builder = $AssurerModel->builder();
                $connexion = $builder->db();
                // Début de la transaction.
                $connexion->transException(true)->transStart();
                $dataUE = ["deleted" => null];
                $res = $AssurerModel->update($id, $dataUE);
                $connexion->transComplete();
                return redirect()->route('ListerAssurer');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }
    }
?>