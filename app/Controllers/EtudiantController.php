<?php 
    namespace App\Controllers;

    class EtudiantController extends BaseController{
        /*restaurerEtudiant
        eliminerEtudiant
        modifierEtudiant
        consulterEtudiant
        ajouterEtudiant
        creerEtudiant
        listerEtudiants*/

        function listerEtudiants(){
            try 
            {
                $etudiantModel = model('App\Models\EtudiantModel');    
                $etudiants = $etudiantModel->withDeleted()->findAll();
                $data = ['Etudiants' => $etudiants ];
                return view('Entete', ['titre' => 'Liste des etudiants'] ) . 
                             view('listerEtudiants', $data).
                             view('PiedDePage');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }

        function creerEtudiant(){

            $formationModel = new \App\Models\FormationModel();
            $formations = $formationModel->findAll();
            $formations = [
                'formations' => $formations
            ];
            $titre = [
                'titre' => 'Créer un étudiant'
            ];
            return view('Entete',$titre).view('creerEtudiant', $formations).view('PiedDePage');
        }

        public function ajouterEtudiant()
        {
            try 
            {	  //nom	prenom	adresse	naissance	utilisateur	motDePasse	role	formation    
                $nom = $this->request->getPost('nom', FILTER_SANITIZE_STRING);
                $prenom = $this->request->getPost('prenom', FILTER_SANITIZE_STRING);
                $adresse = $this->request->getPost('adresse', FILTER_SANITIZE_STRING);
                $naissance = $this->request->getPost('naissance', FILTER_SANITIZE_STRING);
                $utilisateur = $this->request->getPost('utilisateur', FILTER_SANITIZE_STRING);
                $motDePasse = $this->request->getPost('motDePasse', FILTER_SANITIZE_STRING);
                $role = $this->request->getPost('role', FILTER_SANITIZE_STRING);
                $formation = $this->request->getPost('formation', FILTER_SANITIZE_STRING);

                
                    $etudiantModel = model('App\Models\EtudiantModel');
                    $builder = $etudiantModel->builder();
                    $connexion = $builder->db();
                  
                    $connexion->transException(true)->transStart();  	  	
                    $dni = $etudiantModel->obtenirMaxDniDB($builder);
                    $numEtu = $etudiantModel->obtenirMaxDniDB($builder);
                    $etudiant = ["dni" => "E$dni",
                                                 "nom" => $nom, 
                                                 "prenom" => $prenom,
                                                 "adresse" => $adresse,
                                                 "naissance" => $naissance,
                                                 "utilisateur" => $utilisateur,
                                                 "motDePasse" => $motDePasse,
                                                 "role" => $role,
                                                 "formation" => $formation,
                                                    "numEtu" => $numEtu
                                                ];
                    $res = $etudiantModel->insert($etudiant, false);
                    
                    $connexion->transComplete();
                    if ($res)							   	  	
                    return redirect()->route('ListerEtudiants');
                    
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
            
        }

        public function consulterEtudiant($dni)
        {
            try 
            {
                $etudiantModel = model('App\Models\EtudiantModel');
                $etudiant = $etudiantModel->withDeleted()->find($dni);
                $data = ['Etudiant' => $etudiant ];
                return view('Entete', ['titre' => 'Consulter un étudiant'] ) . 
                             view('consulterEtudiant', $data).
                             view('PiedDePage');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }
    }
?>