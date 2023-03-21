<?php 
    namespace App\Controllers;

    class ControleController extends BaseController{
        function listerControles(){
            try 
            {
                $ControleModel = model('App\Models\ControleModel');    
                $Controles = $ControleModel->withDeleted()->findAll();
                $data = ['Controles' => $Controles ];
                return view('Entete', ['titre' => 'Liste des Controles'] ) . 
                             view('listerControles', $data).
                             view('PiedDePage');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }

        function creerControle(){

           $seanceModel = model('App\Models\SeanceModel');
            $seances = $seanceModel->findAll();



            $data = [
                'seances' => $seances,
            ];

            $titre = [
                'titre' => 'Créer un Controle'
            ];
            return view('Entete',$titre).view('creerControle', $data).view('PiedDePage');
        }

        public function ajouterControle()
        {

            try 
            {	  // id	type	duree	sujet	bareme	description	seance	

                $type = $this->request->getPost('type');
                $duree = $this->request->getPost('duree');
                $sujet = $this->request->getPost('sujet');
                $bareme = $this->request->getPost('bareme');
                $description = $this->request->getPost('description');
                $seance = $this->request->getPost('seance');





                $ControleModel = model('App\Models\ControleModel');
                $builder = $ControleModel->builder();
                $connexion = $builder->db();
                

                $connexion->transException(true)->transStart();  	  	
                


                $Controle = [
                    'type' => $type,
                    'duree' => $duree,
                    'sujet' => $sujet,
                    'bareme' => $bareme,
                    'description' => $description,
                    'seance' => $seance];

                
                $res = $ControleModel->insert($Controle, false);
                
                $connexion->transComplete();
                if ($res)							   	  	
                return redirect()->route('ListerControles');
                
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
            
        }

        public function consulterControle($id)
        {
            try 
            {
                $ControleModel = model('App\Models\ControleModel');


                $seanceModel = model('App\Models\SeanceModel');
                $seances = $seanceModel->findAll();
    



                $Controle = $ControleModel->find($id);

                $data = ['Controle' => $Controle,
                 'seances' => $seances,];

                return view('Entete', ['titre' => 'Consulter un Controle'] ) . 
                             view('consulterControle', $data).
                             view('PiedDePage');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }

        public function modifierControle(){
            try 
            {	 //id	nom	credits	description	UE
                $id = $this->request->getPost('id');
                $type = $this->request->getPost('type');
                $duree = $this->request->getPost('duree');
                $sujet = $this->request->getPost('sujet');
                $bareme = $this->request->getPost('bareme');
                $description = $this->request->getPost('description');
                $seance = $this->request->getPost('seance');

                    $ControleModel = model('App\Models\ControleModel');
                    $builder = $ControleModel->builder();
                    $connexion = $builder->db();


                    $connexion->transException(true)->transStart();	  	
                    $Controle = [
                        'type' => $type,
                        'duree' => $duree,
                        'sujet' => $sujet,
                        'bareme' => $bareme,
                        'description' => $description,
                        'seance' => $seance
                    ];

                    
                        $res = $ControleModel->update($id, $Controle);

                    $connexion->transComplete();
                    if ($res)							   	  	
                    return redirect()->route('ListerControles');
                    
            }
            catch(\DatabaseException $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
            
        }


        public function EliminerControle($id){
            try 
            {
                $ControleModel = model('App\Models\ControleModel');
                $ControleModel->delete($id);
                return redirect()->route('ListerControles');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }
    
        public function restaurerControle($id){
            try{
                $ControleModel = model('App\Models\ControleModel');
                $builder = $ControleModel->builder();
                $connexion = $builder->db();
                // Début de la transaction.
                $connexion->transException(true)->transStart();
                $dataUE = ["deleted" => null];
                $res = $ControleModel->update($id, $dataUE);
                $connexion->transComplete();
                return redirect()->route('ListerControles');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }
    }
?>