<?php
namespace Config;
$session = \Config\Services::session();
namespace App\Controllers;


class LoginController extends BaseController {
    public function login(){
        return view('loginPage');
        
    }
    public function logout(){

    }

    public function verifierLogin(){
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $data = [
            'username' => $username,
            'password' => $password
        ];
        $depiutModel = model('App\Models\DepIUTModel');
        $depIUTs = $depiutModel->findAll();
        $etudiantsModel = model('App\Models\EtudiantModel');
        //$intervenantModel = model('App\Models\IntervenantModel');

        $etudiant = $etudiantsModel->where('utilisateur', $username)->where('motDePasse', $password)->first();
        
        if($etudiant != null){
            
            $session = \Config\Services::session();
            $session->set('role', $etudiant->getRole());


            $data = [
                'etudiant' => $etudiant
            ];

            $depIUTs =[
                'depIUTs' => $depIUTs
            ];
            $Role =[
                'Role' => $etudiant->getRole()
            ];
            return 
           view('test',$Role).
            view('PiedDePage');
        }
        else{
            return view('loginPage', $data);
        }
    }

    public function finirSession(){
        $session = \Config\Services::session();
        $session->destroy();
        return view('loginPage');
    }

    public function noAcces(){
        return view('noAcces');
    }
}

?>