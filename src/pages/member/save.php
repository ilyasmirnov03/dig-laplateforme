<?php

use App\Model\Products;


Products::getInstance()->create([
    'libelle' => $_POST['libelle'],
    'idEnt' => $_POST['entreprise'],
    'categorie' => $_POST['categorie'],
    'provenance' => $_POST['provenance'],
    'bio' => isset($_POST['bio']) ? $_POST['bio'] : "",
    'impactAnimal' => isset($_POST['animal']) ? $_POST['animal'] : "",
    'recup' => isset($_POST['recup']) ? $_POST['recup'] : ""
]); 
