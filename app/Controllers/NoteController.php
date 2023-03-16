<?php 
    namespace App\Controllers;

    class NoteController extends BaseController{
        /*restaurerNote
        eliminerNote
        modifierNote
        consulterNote
        ajouterNote
        creerNote
        listerNotes*/

        function listerNotes(){
            try 
            {
                $noteModel = model('App\Models\NoteModel');    
                $notes = $noteModel->withDeleted()->findAll();
                $data = ['Notes' => $notes ];
                return view('Entete', ['titre' => 'Liste des notes'] ) . 
                             view('listerNotes', $data).
                             view('PiedDePage');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }

        function creerNote(){

            $formationModel = new \App\Models\EtudiantModel();
            $etudiants = $formationModel->findAll();
            $etudiants = [
                'etudiants' => $etudiants
            ];
            $titre = [
                'titre' => 'Créer un Note'
            ];
            return view('Entete',$titre).view('creerNote', $etudiants).view('PiedDePage');
        }

        public function ajouterNote()
        {
            try 
            {	  //id	note	commentaires	controle	etudiant	

                $note = $this->request->getPost('note');
                $commentaires = $this->request->getPost('commentaires');
                $controle = $this->request->getPost('controle');
                $etudiant = $this->request->getPost('etudiant');

                
                    $noteModel = model('App\Models\NoteModel');
                    $builder = $noteModel->builder();
                    $connexion = $builder->db();
                  
                    $connexion->transException(true)->transStart();  	  	
                    $note = [ 'note' => $note, 'commentaires' => $commentaires, 'controle' => $controle, 'etudiant' => $etudiant];
                    $res = $noteModel->insert($note, false);
                    
                    $connexion->transComplete();
                    if ($res)							   	  	
                    return redirect()->route('ListerEtudiants');
                    
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
            
        }

        public function consulterNote($dni)
        {
            try 
            {
                $noteModel = model('App\Models\NoteModel');
                $note = $noteModel->withDeleted()->find($dni);
                $data = ['Note' => $note ];
                return view('Entete', ['titre' => 'Consulter un étudiant'] ) . 
                             view('consulterNote', $data).
                             view('PiedDePage');
            }
            catch(\Exception $e)
            {    		
                return view('pageErreur', ['exception' => $e]);
            }
        }
    }
?>