<?php

use App\Helper\HTTP;
use App\Model\Products;

// calcul

if ((int)$_POST['recup'] === 1){
    $leafScore = 10;
}
else{
    $leafScore = 1;
    switch ($_POST['categorie']){
        case 'alimentation' || 'cosmetique' || 'textile' :
            if ((int)$_POST['bio'] === 1){
                $leafScore += 2;
            }
            if ($_POST['animal'] === 'vegan'){
                $leafScore += 1.5;
            }
            if ($_POST['animal'] === 'vegetarien'){
                $leafScore += 1;
            }
            if ($_POST['provenance'] === 'charente'){
                $leafScore += 5.5;
            }
            if ($_POST['provenance'] === 'nouvelle-aquitaine'){
                $leafScore += 4.5;
            }
            if ($_POST['provenance'] === 'france'){
                $leafScore += 3.5;
            }
            if ($_POST['provenance'] === 'europe'){
                $leafScore += 2;
            }
            break;
        case 'electromenager' || 'bricolage' || 'mobilier' || 'vehicule' || 'entretien' || 'loisirs':
            if ($_POST['provenance'] === 'charente'){
                $leafScore += 9;
            }
            if ($_POST['provenance'] === 'nouvelle-aquitaine'){
                $leafScore += 7;
            }
            if ($_POST['provenance'] === 'france'){
                $leafScore += 5;
            }
            if ($_POST['provenance'] === 'europe'){
                $leafScore += 2;
            }
            break;
        case 'maroquinerie':
            if ($_POST['animal'] === 'vegan'){
                $leafScore += 3;
            }
            if ($_POST['provenance'] === 'charente'){
                $leafScore += 6;
            }
            if ($_POST['provenance'] === 'nouvelle-aquitaine'){
                $leafScore += 5;
            }
            if ($_POST['provenance'] === 'france'){
                $leafScore += 3;
            }
            if ($_POST['provenance'] === 'europe'){
                $leafScore += 1;
            }
            break;
    }
}

Products::getInstance()->create([
    'libelle' => $_POST['libelle'],
    'idEnt' => $_POST['entreprise'],
    'categorie' => $_POST['categorie'],
    'provenance' => $_POST['provenance'],
    'prix' => $_POST['prix'],
    'bio' => isset($_POST['bio']) ? $_POST['bio'] : "",
    'impactAnimal' => isset($_POST['animal']) ? $_POST['animal'] : "",
    'recup' => isset($_POST['recup']) ? $_POST['recup'] : "",
    'leafScore' => $leafScore
]);

HTTP::redirect('/add');
die();