<?php

namespace Config;

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

/*
* Routes pour les départements IUT.
*
*/
$routes->add('/listerDepIUTs', 'Home::listerDepIUTs', ['as' => 'ListerDepIUTs']);
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
