<?php

namespace Config;
$session = \Config\Services::session() ?? null;
// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
//DepIUT <- Formation <- Semestre <- UE <- Module <- Assurer -> Intervenant
//Assurer <- Seance -> Contole <- Note
//Etudiant <- Presence 

/**
 * Routes pour La session
 */

/**
 * Routes pour les login.
 */

 $routes->add('/login', 'LoginController::login', ['as' => 'Login']);
 $routes->post('/verifierLogin', 'LoginController::verifierLogin', ['as' => 'VerifierLogin']);
 $routes->get('/logout', 'LoginController::logout', ['as' => 'Logout']);
 $routes->get('/noAcces', 'LoginController::noAcces', ['as' => 'NoAcces']);
$routes->get('/finirSession', 'LoginController::finirSession', ['as' => 'FinirSession']);

/*
* Routes pour les départements IUT.
*
*/

log_message('info', 'This is a log message');


    log_message('info', 'This is a log message');
    $routes->add( '/listerDepIUTs',($session->get('role') == "admin" ? 'Home::listerDepIUTs' :'LoginController::noAcces') , ['as' => 'ListerDepIUTs']);
    $routes->add('/creerDepIUT', 'Home::creerDepIUT', ['as' => 'CreerDepIUT']);
    $routes->post('/ajouterDepIUT', 'Home::ajouterDepIUT', ['as' => 'AjouterDepIUT']);
    $routes->get('/consulterDepIUT/(:alphanum)', 'Home::consulterDepIUT/$1', ['as' => 'ConsulterDepIUT']);
    $routes->post('/modifierDepIUT', 'Home::modifierDepIUT', ['as' => 'ModifierDepIUT']);
    $routes->get('/eliminerDepIUT/(:alphanum)' , 'Home::eliminerDepIUT/$1', ['as' => 'EliminerDepIUT']);
    $routes->get('/restaurerDepIUT/(:alphanum)' , 'Home::restaurerDepIUT/$1', ['as' => 'RestaurerDepIUT']);


/*
* Routes pour les formations.
*
*/
$routes->add('/listerFormations', 'Home::listerFormations', ['as' => 'ListerFormations']);
$routes->add('/creerFormation', 'Home::creerFormation', ['as' => 'CreerFormation']);
$routes->post('/ajouterFormation', 'Home::ajouterFormation', ['as' => 'AjouterFormation']);
$routes->get('/consulterFormation/(:alphanum)', 'Home::consulterFormation/$1', ['as' => 'ConsulterFormation']);
$routes->post('/modifierFormation', 'Home::modifierFormation', ['as' => 'ModifierFormation']);
$routes->get('/eliminerFormation/(:alphanum)' , 'Home::eliminerFormation/$1', ['as' => 'EliminerFormation']);
$routes->get('/restaurerFormation/(:alphanum)' , 'Home::restaurerFormation/$1', ['as' => 'RestaurerFormation']);


/**
 * Routes pour les étudiants.
 */
$routes->add('/listerEtudiants', 'EtudiantController::listerEtudiants', ['as' => 'ListerEtudiants']);
$routes->add('/creerEtudiant', 'EtudiantController::creerEtudiant', ['as' => 'CreerEtudiant']);
$routes->post('/ajouterEtudiant', 'EtudiantController::ajouterEtudiant', ['as' => 'AjouterEtudiant']);
$routes->get('/consulterEtudiant/(:alphanum)', 'EtudiantController::consulterEtudiant/$1', ['as' => 'ConsulterEtudiant']);
$routes->post('/modifierEtudiant', 'EtudiantController::modifierEtudiant', ['as' => 'ModifierEtudiant']);
$routes->get('/eliminerEtudiant/(:alphanum)' , 'EtudiantController::eliminerEtudiant/$1', ['as' => 'EliminerEtudiant']);
$routes->get('/restaurerEtudiant/(:alphanum)' , 'EtudiantController::restaurerEtudiant/$1', ['as' => 'RestaurerEtudiant']);


/**
 * Routes pour Notes
 */
$routes->add('/listerNotes', 'NoteController::listerNotes', ['as' => 'ListerNotes']);
$routes->add('/creerNote', 'NoteController::creerNote', ['as' => 'CreerNote']);
$routes->post('/ajouterNote', 'NoteController::ajouterNote', ['as' => 'AjouterNote']);
$routes->get('/consulterNote/(:alphanum)', 'NoteController::consulterNote/$1', ['as' => 'ConsulterNote']);
$routes->post('/modifierNote', 'NoteController::modifierNote', ['as' => 'ModifierNote']);
$routes->get('/eliminerNote/(:alphanum)' , 'NoteController::eliminerNote/$1', ['as' => 'EliminerNote']);
$routes->get('/restaurerNote/(:alphanum)' , 'NoteController::restaurerNote/$1', ['as' => 'RestaurerNote']);

/**
 * Routes pour les semestres.
 */
$routes->add('/listerSemestres', 'SemestreController::listerSemestres', ['as' => 'ListerSemestres']);
$routes->add('/creerSemestre', 'SemestreController::creerSemestre', ['as' => 'CreerSemestre']);
$routes->post('/ajouterSemestre', 'SemestreController::ajouterSemestre', ['as' => 'AjouterSemestre']);
$routes->get('/consulterSemestre/(:alphanum)', 'SemestreController::consulterSemestre/$1', ['as' => 'ConsulterSemestre']);
$routes->post('/modifierSemestre', 'SemestreController::modifierSemestre', ['as' => 'ModifierSemestre']);
$routes->get('/eliminerSemestre/(:alphanum)' , 'SemestreController::eliminerSemestre/$1', ['as' => 'EliminerSemestre']);
$routes->get('/restaurerSemestre/(:alphanum)' , 'SemestreController::restaurerSemestre/$1', ['as' => 'RestaurerSemestre']);

/**
 * Routes pour les UEs.
 */
$routes->add('/listerUEs', 'UEController::listerUEs', ['as' => 'ListerUEs']);
$routes->add('/creerUE', 'UEController::creerUE', ['as' => 'CreerUE']);
$routes->post('/ajouterUE', 'UEController::ajouterUE', ['as' => 'AjouterUE']);
$routes->get('/consulterUE/(:alphanum)', 'UEController::consulterUE/$1', ['as' => 'ConsulterUE']);
$routes->post('/modifierUE', 'UEController::modifierUE', ['as' => 'ModifierUE']);
$routes->get('/eliminerUE/(:alphanum)' , 'UEController::eliminerUE/$1', ['as' => 'EliminerUE']);
$routes->get('/restaurerUE/(:alphanum)' , 'UEController::restaurerUE/$1', ['as' => 'RestaurerUE']);

/**
 * Routes pour les Module.
 */

$routes->add('/listerModules', 'ModuleController::listerModules', ['as' => 'ListerModules']);
$routes->add('/creerModule', 'ModuleController::creerModule', ['as' => 'CreerModule']);
$routes->post('/ajouterModule', 'ModuleController::ajouterModule', ['as' => 'AjouterModule']);
$routes->get('/consulterModule/(:alphanum)', 'ModuleController::consulterModule/$1', ['as' => 'ConsulterModule']);
$routes->post('/modifierModule', 'ModuleController::modifierModule', ['as' => 'ModifierModule']);
$routes->get('/eliminerModule/(:alphanum)' , 'ModuleController::eliminerModule/$1', ['as' => 'EliminerModule']);
$routes->get('/restaurerModule/(:alphanum)' , 'ModuleController::restaurerModule/$1', ['as' => 'RestaurerModule']);

/**
 * Routes pour les Intervenant.
 */
 
$routes->add('/listerIntervenants', 'IntervenantController::listerIntervenants', ['as' => 'ListerIntervenants']);
$routes->add('/creerIntervenant', 'IntervenantController::creerIntervenant', ['as' => 'CreerIntervenant']);
$routes->post('/ajouterIntervenant', 'IntervenantController::ajouterIntervenant', ['as' => 'AjouterIntervenant']);
$routes->get('/consulterIntervenant/(:alphanum)', 'IntervenantController::consulterIntervenant/$1', ['as' => 'ConsulterIntervenant']);
$routes->post('/modifierIntervenant', 'IntervenantController::modifierIntervenant', ['as' => 'ModifierIntervenant']);
$routes->get('/eliminerIntervenant/(:alphanum)' , 'IntervenantController::eliminerIntervenant/$1', ['as' => 'EliminerIntervenant']);
$routes->get('/restaurerIntervenant/(:alphanum)' , 'IntervenantController::restaurerIntervenant/$1', ['as' => 'RestaurerIntervenant']);

/**
 * Routes pour les Assurer.
 */
$routes->add('/listerAssurer', 'AssurerController::listerAssurer', ['as' => 'ListerAssurer']);
$routes->add('/creerAssurer', 'AssurerController::creerAssurer', ['as' => 'CreerAssurer']);
$routes->post('/ajouterAssurer', 'AssurerController::ajouterAssurer', ['as' => 'AjouterAssurer']);
$routes->get('/consulterAssurer/(:alphanum)', 'AssurerController::consulterAssurer/$1', ['as' => 'ConsulterAssurer']);
$routes->post('/modifierAssurer', 'AssurerController::modifierAssurer', ['as' => 'ModifierAssurer']);
$routes->get('/eliminerAssurer/(:alphanum)' , 'AssurerController::eliminerAssurer/$1', ['as' => 'EliminerAssurer']);
$routes->get('/restaurerAssurer/(:alphanum)' , 'AssurerController::restaurerAssurer/$1', ['as' => 'RestaurerAssurer']);

/**
 * Routes pour les Seance.
 */
$routes->add('/listerSeances', 'SeanceController::listerSeances', ['as' => 'ListerSeances']);
$routes->add('/creerSeance', 'SeanceController::creerSeance', ['as' => 'CreerSeance']);
$routes->post('/ajouterSeance', 'SeanceController::ajouterSeance', ['as' => 'AjouterSeance']);
$routes->get('/consulterSeance/(:alphanum)', 'SeanceController::consulterSeance/$1', ['as' => 'ConsulterSeance']);
$routes->post('/modifierSeance', 'SeanceController::modifierSeance', ['as' => 'ModifierSeance']);
$routes->get('/eliminerSeance/(:alphanum)' , 'SeanceController::eliminerSeance/$1', ['as' => 'EliminerSeance']);
$routes->get('/restaurerSeance/(:alphanum)' , 'SeanceController::restaurerSeance/$1', ['as' => 'RestaurerSeance']);

/**
 * Routes pour les Presence.
 */

$routes->add('/listerPresences', 'PresenceController::listerPresences', ['as' => 'ListerPresences']);
$routes->add('/creerPresence', 'PresenceController::creerPresence', ['as' => 'CreerPresence']);
$routes->post('/ajouterPresence', 'PresenceController::ajouterPresence', ['as' => 'AjouterPresence']);
$routes->get('/consulterPresence/(:alphanum)', 'PresenceController::consulterPresence/$1', ['as' => 'ConsulterPresence']);
$routes->post('/modifierPresence', 'PresenceController::modifierPresence', ['as' => 'ModifierPresence']);
$routes->get('/eliminerPresence/(:alphanum)' , 'PresenceController::eliminerPresence/$1', ['as' => 'EliminerPresence']);
$routes->get('/restaurerPresence/(:alphanum)' , 'PresenceController::restaurerPresence/$1', ['as' => 'RestaurerPresence']);

/**
 * Routes pour les Contole.
 */
$routes->add('/listerControles', 'ControleController::listerControles', ['as' => 'ListerControles']);
$routes->add('/creerControle', 'ControleController::creerControle', ['as' => 'CreerControle']);
$routes->post('/ajouterControle', 'ControleController::ajouterControle', ['as' => 'AjouterControle']);
$routes->get('/consulterControle/(:alphanum)', 'ControleController::consulterControle/$1', ['as' => 'ConsulterControle']);
$routes->post('/modifierControle', 'ControleController::modifierControle', ['as' => 'ModifierControle']);
$routes->get('/eliminerControle/(:alphanum)' , 'ControleController::eliminerControle/$1', ['as' => 'EliminerControle']);
$routes->get('/restaurerControle/(:alphanum)' , 'ControleController::restaurerControle/$1', ['as' => 'RestaurerControle']);





/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
