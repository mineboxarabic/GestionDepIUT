<?php 
    namespace App\Controllers;

    class PresenceController extends BaseController{
        function listerPresences(){
            try 
            {
                $PresenceModel = model('App\Models\PresenceModel');    
                $Presences = $PresenceModel->withDeleted()->findAll();
                $data = ['Presences' => $Presences ];
                return view('Entete', ['titre' => 'Liste des Presences'] ) . 
                             view('listerPresences', $data).
                             view('PiedDePage');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }

        function creerPresence(){

           $seanceModel = model('App\Models\SeanceModel');
            $seances = $seanceModel->findAll();

            $etudiantsModel = model('App\Models\EtudiantModel');
            $etudiants = $etudiantsModel->findAll();

            $data = [
                'seances' => $seances,
                'etudiants' => $etudiants
            ];

            $titre = [
                'titre' => 'Créer un Presence'
            ];
            return view('Entete',$titre).view('creerPresence', $data).view('PiedDePage');
        }

        public function ajouterPresence()
        {

            try 
            {	  // id	justifie	commentaires	seance	etudiant

                $justifie = $this->request->getPost('justifie');
                $commentaires = $this->request->getPost('commentaires');
                $seance = $this->request->getPost('seance');
                $etudiant = $this->request->getPost('etudiant');




                $PresenceModel = model('App\Models\PresenceModel');
                $builder = $PresenceModel->builder();
                $connexion = $builder->db();
                

                $connexion->transException(true)->transStart();  	  	
                


                $Presence = [
                    'justifie' => $justifie,
                    'commentaires' => $commentaires,
                    'seance' => $seance,
                    'etudiant' => $etudiant,];

                
                $res = $PresenceModel->insert($Presence, false);
                
                $connexion->transComplete();
                if ($res)							   	  	
                return redirect()->route('ListerPresences');
                
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
            
        }

        public function consulterPresence($id)
        {
            try 
            {
                $PresenceModel = model('App\Models\PresenceModel');


                $seanceModel = model('App\Models\SeanceModel');
                $seances = $seanceModel->findAll();
    
                $etudiantsModel = model('App\Models\EtudiantModel');
                $etudiants = $etudiantsModel->findAll();


                $Presence = $PresenceModel->find($id);

                $data = ['Presence' => $Presence,
                 'seances' => $seances,
                 'etudiants' => $etudiants];

                return view('Entete', ['titre' => 'Consulter un Presence'] ) . 
                             view('consulterPresence', $data).
                             view('PiedDePage');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }

        public function modifierPresence(){
            try 
            {	 //id	nom	credits	description	UE
                $id = $this->request->getPost('id');
                $justifie = $this->request->getPost('justifie');
                $commentaires = $this->request->getPost('commentaires');
                $seance = $this->request->getPost('seance');
                $etudiant = $this->request->getPost('etudiant');

                    $PresenceModel = model('App\Models\PresenceModel');
                    $builder = $PresenceModel->builder();
                    $connexion = $builder->db();


                    $connexion->transException(true)->transStart();	  	
                    $Presence = [
                        'justifie' => $justifie,
                        
                        'commentaires' => $commentaires,
                        'seance' => $seance,
                        'etudiant' => $etudiant,
                    ];

                    
                        $res = $PresenceModel->update($id, $Presence);

                    $connexion->transComplete();
                    if ($res)							   	  	
                    return redirect()->route('ListerPresences');
                    
            }
            catch(\DatabaseException $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
            
        }


        public function EliminerPresence($id){
            try 
            {
                $PresenceModel = model('App\Models\PresenceModel');
                $PresenceModel->delete($id);
                return redirect()->route('ListerPresences');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }
    
        public function restaurerPresence($id){
            try{
                $PresenceModel = model('App\Models\PresenceModel');
                $builder = $PresenceModel->builder();
                $connexion = $builder->db();
                // Début de la transaction.
                $connexion->transException(true)->transStart();
                $dataUE = ["deleted" => null];
                $res = $PresenceModel->update($id, $dataUE);
                $connexion->transComplete();
                return redirect()->route('ListerPresences');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }
    }
?>