<?php 
    namespace App\Controllers;

    class UEController extends BaseController{
        /*restaurerUE
        eliminerUE
        modifierUE
        consulterUE
        ajouterUE
        creerUE
        listerUEs*/
        //id	code	credits	volume	description	semestre
        function listerUEs(){
            try 
            {
                $UEModel = model('App\Models\UEModel');
                $UEs = $UEModel->withDeleted()->findAll();
                $data = ['UEs' => $UEs ];
                return view('Entete', ['titre' => 'Liste des UEs'] ) . 
                             view('listerUEs', $data).
                             view('PiedDePage');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }

        function creerUE(){

            $SemestreModel = model('App\Models\SemestreModel');
            $Semestres = $SemestreModel->findAll();
            $Semestres = [
                'semestres' => $Semestres
            ];
            $titre = [
                'titre' => 'Créer un UE'
            ];
            return view('Entete',$titre).view('creerUE', $Semestres).view('PiedDePage');
        }

        public function ajouterUE()
        {

            try 
            {	  //id	code	credits	volume	description	semestre
                $code = $this->request->getPost('code', FILTER_SANITIZE_STRING);
                $credits = $this->request->getPost('credits', FILTER_SANITIZE_STRING);
                $volume = $this->request->getPost('volume', FILTER_SANITIZE_STRING);
                $description = $this->request->getPost('description', FILTER_SANITIZE_STRING);
                $Semestre = $this->request->getPost('Semestre', FILTER_SANITIZE_STRING);


                
                $UEModel = model('App\Models\UEModel');
                $builder = $UEModel->builder();
                $connexion = $builder->db();
                

                $connexion->transException(true)->transStart();  	  	
                
                $id = $UEModel->obtenirMaxId($builder);

                $UE = ["id" => "U$id", 'code' => $code, 'credits' => $credits, 'volume' => $volume, 'description' => $description, 'Semestre' => $Semestre];

                


                $res = $UEModel->insert($UE, false);
                
                $connexion->transComplete();
                if ($res)							   	  	
                return redirect()->route('ListerUEs');
                
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
            
        }

        public function consulterUE($id)
        {
            try 
            {
                $UEModel = model('App\Models\UEModel');
                $UE = $UEModel->find($id);
                
                $SemestreModel =  model('App\Models\SemestreModel');
                $Semestres = $SemestreModel->findAll();
                $data = ['UE' => $UE , 'Semestres' => $Semestres ];
                return view('Entete', ['titre' => 'Consulter un UE'] ) . 
                             view('consulterUE', $data).
                             view('PiedDePage');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }

        public function modifierUE(){
            try 
            {	 //id	nom	credits	description	Semestre
                $id = $this->request->getPost('id', FILTER_SANITIZE_STRING);   
                $code = $this->request->getPost('code', FILTER_SANITIZE_STRING);
                $credits = $this->request->getPost('credits', FILTER_SANITIZE_STRING);
                $volume = $this->request->getPost('volume', FILTER_SANITIZE_STRING);
                $description = $this->request->getPost('description', FILTER_SANITIZE_STRING);
                $Semestre = $this->request->getPost('Semestre', FILTER_SANITIZE_STRING);

                $SemesterModel = model('App\Models\UEModel');
                $builder = $SemesterModel->builder();
                $connexion = $builder->db();


                $connexion->transException(true)->transStart();	  	
                $semester = [
                    'code' => $code,
                    'credits' => $credits,
                    'volume' => $volume,
                    'description' => $description,
                    'Semestre' => $Semestre

                            ];

                            
                $res = $SemesterModel->update($id, $semester);
                $connexion->transComplete();
                if ($res)							   	  	
                return redirect()->route('ListerUEs');
                    
            }
            catch(\DatabaseException $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
            
        }


        public function EliminerUE($id){
            try 
            {
                $UEModel = model('App\Models\UEModel');
                $UEModel->delete($id);
                return redirect()->route('ListerUEs');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }
    
        public function restaurerUE($id){
            try{
                $UEModel = model('App\Models\UEModel');
                $builder = $UEModel->builder();
                $connexion = $builder->db();
                // Début de la transaction.
                $connexion->transException(true)->transStart();
                $dataSemestre = ["deleted" => null];
                $res = $UEModel->update($id, $dataSemestre);
                $connexion->transComplete();
                return redirect()->route('ListerUEs');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }
    }
?>