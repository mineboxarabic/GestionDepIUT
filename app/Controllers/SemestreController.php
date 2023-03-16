<?php 
    namespace App\Controllers;

    class SemestreController extends BaseController{
        /*restaurerSemestre
        eliminerSemestre
        modifierSemestre
        consulterSemestre
        ajouterSemestre
        creerSemestre
        listerSemestres*/

        function listerSemestres(){
            try 
            {
                $SemestreModel = model('App\Models\SemestreModel');    
                $Semestres = $SemestreModel->withDeleted()->findAll();
                $data = ['Semestres' => $Semestres ];
                return view('Entete', ['titre' => 'Liste des Semestres'] ) . 
                             view('listerSemestres', $data).
                             view('PiedDePage');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }

        function creerSemestre(){

            $formationModel = new \App\Models\FormationModel();
            $formations = $formationModel->findAll();
            $formations = [
                'formations' => $formations
            ];
            $titre = [
                'titre' => 'Créer un étudiant'
            ];
            return view('Entete',$titre).view('creerSemestre', $formations).view('PiedDePage');
        }

        public function ajouterSemestre()
        {

            try 
            {	  //id	nom	credits	description	formation   
                $nom = $this->request->getPost('nom', FILTER_SANITIZE_STRING);
                $credits = $this->request->getPost('credits', FILTER_SANITIZE_STRING);
                $description = $this->request->getPost('description', FILTER_SANITIZE_STRING);
                $formation = $this->request->getPost('formation', FILTER_SANITIZE_STRING);

                
                $SemestreModel = model('App\Models\SemestreModel');
                $builder = $SemestreModel->builder();
                $connexion = $builder->db();
                

                $connexion->transException(true)->transStart();  	  	
                
                $id = $SemestreModel->obtenirMaxId($builder);

                $Semestre = ["id" => "S$id", 'nom' => $nom, 'credits' => $credits, 'description' => $description, 'formation' => $formation];

                


                $res = $SemestreModel->insert($Semestre, false);
                
                $connexion->transComplete();
                if ($res)							   	  	
                return redirect()->route('ListerSemestres');
                
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
            
        }

        public function consulterSemestre($id)
        {
            try 
            {
                $SemestreModel = model('App\Models\SemestreModel');
                $Semestre = $SemestreModel->find($id);
                
                $formationModel = new \App\Models\FormationModel();
                $formations = $formationModel->findAll();
                $data = ['Semestre' => $Semestre , 'formations' => $formations ];
                return view('Entete', ['titre' => 'Consulter un Semestre'] ) . 
                             view('consulterSemestre', $data).
                             view('PiedDePage');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }

        public function modifierSemestre(){
            try 
            {	 //id	nom	credits	description	formation   
                $id = $this->request->getPost('id', FILTER_SANITIZE_STRING);
                $nom = $this->request->getPost('nom', FILTER_SANITIZE_STRING);
                $credits = $this->request->getPost('credits', FILTER_SANITIZE_STRING);
                $description = $this->request->getPost('description', FILTER_SANITIZE_STRING);
                $formation = $this->request->getPost('formation', FILTER_SANITIZE_STRING);

                    $SemesterModel = model('App\Models\SemestreModel');
                    $builder = $SemesterModel->builder();
                    $connexion = $builder->db();


                    $connexion->transException(true)->transStart();	  	
                    $semester = [
                                "nom" => $nom ,
                                "credits" => $credits,
                                "description" => $description, 
                                "formation" => $formation
                                ];

                                
                    $res = $SemesterModel->update($id, $semester);
                    $connexion->transComplete();
                    if ($res)							   	  	
                    return redirect()->route('ListerSemestres');
                    
            }
            catch(\DatabaseException $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
            
        }


        public function EliminerSemestre($id){
            try 
            {
                $SemestreModel = model('App\Models\SemestreModel');
                $SemestreModel->delete($id);
                return redirect()->route('ListerSemestres');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }
    
        public function restaurerSemestre($id){
            try{
                $SemestreModel = model('App\Models\SemestreModel');
                $builder = $SemestreModel->builder();
                $connexion = $builder->db();
                // Début de la transaction.
                $connexion->transException(true)->transStart();
                $dataFormation = ["deleted" => null];
                $res = $SemestreModel->update($id, $dataFormation);
                $connexion->transComplete();
                return redirect()->route('ListerSemestres');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }
    }
?>