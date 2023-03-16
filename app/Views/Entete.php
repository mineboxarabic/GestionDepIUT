<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Liste des départements</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/assets/css/global.css">

    <title><?= esc($titre) ?></title>
</head>

<body>
    <header>
        <div style="display:inline-block;width:10%;margin: 5px;">
            <a href="<?= base_url() ?>/Vue/killSession.php">Finir la session</a>
        </div>
        <div style="display:inline-block;width:10%;margin: 5px;">
            <div style="display:inline-block;width:100%;margin: 5px;">
                <a href="<?= base_url() ?><?= route_to('ListerDepIUTs') ?>">Lister les départements</a>
                <div style="display:inline-block;width:100%;margin: 5px;">
                </div>
                <a href="<?= base_url() ?><?= route_to('CreerDepIUT') ?>">Créer un département</a>
            </div>
        </div>
        <div style="display:inline-block;width:10%;margin: 5px;">
            <div style="display:inline-block;width:100%;margin: 5px;">
                <a href="<?= base_url() ?><?= route_to('ListerFormations') ?>">Lister les formations</a>
            </div>
            <div style="display:inline-block;width:100%;margin: 5px;">
                <a href="<?= base_url() ?><?= route_to('CreerFormation') ?>">Créer une formation</a>
            </div>
        </div>
        <div style="display:inline-block;width:10%;margin: 5px;">
            <div style="display:inline-block;width:100%;margin: 5px;">
                <a href="<?= base_url() ?><?= route_to('ListerEtudiants') ?>">Lister les Etudiant</a>
            </div>
            <div style="display:inline-block;width:100%;margin: 5px;">
                <a href="<?= base_url() ?><?= route_to('CreerEtudiant') ?>">Créer une Etudiant</a>
            </div>
        </div>
        <div style="display:inline-block;width:10%;margin: 5px;">
            <div style="display:inline-block;width:100%;margin: 5px;">
                <a href="<?= base_url() ?><?= route_to('ListerNotes') ?>">Lister les Notes</a>
            </div>
            <div style="display:inline-block;width:100%;margin: 5px;">
                <a href="<?= base_url() ?><?= route_to('CreerNote') ?>">Créer une Notes</a>
            </div>
        </div>
        <div style="display:inline-block;width:10%;margin: 5px;">
            <div style="display:inline-block;width:100%;margin: 5px;">
                <a href="<?= base_url() ?><?= route_to('ListerControles') ?>">Lister les Controles</a>
            </div>
            <div style="display:inline-block;width:100%;margin: 5px;">
                <a href="<?= base_url() ?><?= route_to('CreerControle') ?>">Créer une Controle</a>
            </div>
        </div>
        <div style="display:inline-block;width:10%;margin: 5px;">
            <div style="display:inline-block;width:100%;margin: 5px;">
                <a href="<?= base_url() ?>/Vue/listerSemestres.php">Lister les semestres</a>
            </div>
            <div style="display:inline-block;width:100%;margin: 5px;">
                <a href="<?= base_url() ?>/Vue/formSemestre.php">Créer un semestre</a>
            </div>
        </div>
        <div style="display:inline-block;width:10%;margin: 5px;">
            <div style="display:inline-block;width:100%;margin: 5px;">
                <a href="<?= base_url() ?>/Vue/listerUEs.php">Lister les unités d'enseignement</a>
            </div>
            <div style="display:inline-block;width:100%;margin: 5px;">
                <a href="<?= base_url() ?>/Vue/formUE.php">Créer une unité d'enseignement</a>
            </div>
        </div>
        <div style="display:inline-block;width:10%;margin: 5px;">
            <div style="display:inline-block;width:100%;margin: 5px;">
                <a href="<?= base_url() ?>/Vue/listerModules.php">Lister les modules</a>
            </div>
            <div style="display:inline-block;width:100%;margin: 5px;">
                <a href="<?= base_url() ?>/Vue/formModule.php">Créer un module</a>
            </div>
        </div>
        <div style="display:inline-block;width:10%;margin: 5px;">
            <div style="display:inline-block;width:100%;margin: 5px;">
                <a href="<?= base_url() ?>/Vue/listerIntervenants.php">Lister les intervenants</a>
            </div>
            <div style="display:inline-block;width:100%;margin: 5px;">
                <a href="<?= base_url() ?>/Vue/formIntervenant.php">Créer un intervenant</a>
            </div>
        </div>
        <div style="display:inline-block;width:10%;margin: 5px;">
            <div style="display:inline-block;width:100%;margin: 5px;">
                <a href="<?= base_url() ?>/Vue/listerEtudiants.php">Lister les étudiants</a>
            </div>
            <div style="display:inline-block;width:100%;margin: 5px;">
                <a href="<?= base_url() ?>/Vue/formEtudiant.php">Créer un étudiant</a>
            </div>
        </div>
        <div style="display:inline-block;width:10%;margin: 5px;">
            <div style="display:inline-block;width:100%;margin: 5px;">
                <a href="<?= base_url() ?>/Vue/listerAssurer.php">Lister les intervenants avec les modules</a>
            </div>
            <div style="display:inline-block;width:100%;margin: 5px;">
                <a href="<?= base_url() ?>/Vue/formAssurer.php">Affecter un module</a>
            </div>
        </div>
    </header>