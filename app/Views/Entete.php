<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Liste des départements</title>
    <!--<link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="<?= base_url() ?>/public/assets/css/global.css"> -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/assets/css/Entete.css">
    <script src="<?= base_url() ?>/public/assets/js/index.js"> </script>
    <title><?= esc($titre) ?></title>
</head>

<body>
    <header class="Main__Header">
        <h1> <?= $titre?></h1>
        <div>
            <a href="<?= base_url() ?><?= route_to('FinirSession')?>">Finir la session</a>
        </div>
        <div class="Choice__Container">
            <div >
                <a class="listerDepIUTs" onclick="testFunction()" href="<?= base_url() ?><?= route_to('ListerDepIUTs') ?>">Lister les départements</a>

                
            </div>
            <div >
                <a class="creerDepIUT" onclick="testFunction()" href="<?= base_url() ?><?= route_to('CreerDepIUT') ?>">Créer un département</a>
            </div>
        </div>
        <div class="Choice__Container">
            <div >
                <a class="listerFormations" href="<?= base_url() ?><?= route_to('ListerFormations') ?>">Lister les formations</a>
            </div>
            <div >
                <a class="creerFormation" href="<?= base_url() ?><?= route_to('CreerFormation') ?>">Créer une formation</a>
            </div>
        </div>
        <div class="Choice__Container">
            <div>
                <a class="listerEtudiants" href="<?= base_url() ?><?= route_to('ListerEtudiants') ?>">Lister les Etudiant</a>
            </div>
            <div>
                <a class="creerEtudiant" href="<?= base_url() ?><?= route_to('CreerEtudiant') ?>">Créer une Etudiant</a>
            </div>
        </div>
        <div class="Choice__Container">
            <div>
                <a class="listerPresences" href="<?= base_url() ?><?= route_to('ListerPresences') ?>">Lister les Presences</a>
            </div>
            <div>
                <a class="creerPresence" href="<?= base_url() ?><?= route_to('CreerPresence') ?>">Créer une Presence</a>
            </div>
        </div>
        <div class="Choice__Container">
            <div>
                <a class="listerNotes" href="<?= base_url() ?><?= route_to('ListerNotes') ?>">Lister les Notes</a>
            </div>
            <div>
                <a class="creerNote" href="<?= base_url() ?><?= route_to('CreerNote') ?>">Créer une Notes</a>
            </div>
        </div>
        <div class="Choice__Container">
            <div>
                <a class="listerControles" href="<?= base_url() ?><?= route_to('ListerControles') ?>">Lister les Controles</a>
            </div>
            <div>
                <a class="creerControle" href="<?= base_url() ?><?= route_to('CreerControle') ?>">Créer une Controle</a>
            </div>
        </div>
        <div class="Choice__Container">
            <div>
                <a class="listerSemestres" href="<?= base_url() ?><?= route_to('ListerSemestres') ?>">Lister les semestres</a>
            </div>
            <div>
                <a class="creerSemestre" href="<?= base_url() ?><?= route_to('CreerSemestre') ?>">Créer un semestre</a>
            </div>
        </div>
        <div class="Choice__Container"> 
            <div>
            <a class="listerUEs" href="<?= base_url() ?><?= route_to('ListerUEs') ?>">Lister les unités d'enseignement</a>
            </div>
            <div>
            <a class="creerUE" href="<?= base_url() ?><?= route_to('CreerUE') ?>">Créer une unité d'enseignement</a>
            </div>
        </div>
        <div class="Choice__Container">
            <div>
            <a class="listerModules" href="<?= base_url() ?><?= route_to('ListerModules') ?>">Lister les modules</a>
            </div>
            <div>
            <a class="creerModule" href="<?= base_url() ?><?= route_to('CreerModule') ?>">Créer un module</a>
            </div>
        </div>
        <div class="Choice__Container">
            <div>
            <a class="listerIntervenants" href="<?= base_url() ?><?= route_to('ListerIntervenants') ?>">Lister les intervenants</a>
            </div>
            <div>
            <a class="creerIntervenant" href="<?= base_url() ?><?= route_to('CreerIntervenant') ?>">Créer un intervenant</a>
            </div>
        </div>
        <div class="Choice__Container">
            <div>
            <a class="listerAssurer" href="<?= base_url() ?><?= route_to('ListerAssurer') ?>">Lister les Assurers</a>
            </div>
            <div>
            <a class="creerAssurer" href="<?= base_url() ?><?= route_to('CreerAssurer') ?>">Créer un Assurer</a>
            </div>
        </div>

        <div class="Choice__Container">
            <div>
            <a class="listerSeances" href="<?= base_url() ?><?= route_to('ListerSeances') ?>">Lister les Sceances</a>
            </div>
            <div>
            <a class="creerSeance" href="<?= base_url() ?><?= route_to('CreerSeance') ?>">Créer un Sceance</a>
            </div>
        </div>


        <div class="Choice__Container">
            <div>
                <a href="<?= base_url() ?>/Vue/listerAssurer.php">Lister les intervenants avec les modules</a>
            </div>
            <div>
                <a href="<?= base_url() ?>/Vue/formAssurer.php">Affecter un module</a>
            </div>
        </div>
    </header>