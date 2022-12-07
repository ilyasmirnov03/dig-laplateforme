<?php

use App\Helper\HTTP;
use App\Model\Products;

// calcul

Products::getInstance()->create([
    'libelle' => $_POST['libelle'],
    'idEnt' => $_POST['entreprise'],
    'categorie' => $_POST['categorie'],
    'provenance' => $_POST['provenance'],
    'prix' => $_POST['prix'],
    'bio' => isset($_POST['bio']) ? $_POST['bio'] : "",
    'impactAnimal' => isset($_POST['animal']) ? $_POST['animal'] : "",
    'recup' => isset($_POST['recup']) ? $_POST['recup'] : ""
]);

HTTP::redirect('/add');
die();