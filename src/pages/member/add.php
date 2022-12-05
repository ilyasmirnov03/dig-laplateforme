<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.la-plate-forme.fr/themes/lpf/assets/cache/theme-ea2af4199.css" media="all" />
    <link rel="stylesheet" href="./../../styles.css">
    <title>Espace membre</title>
</head>

<body>
    <div class="form-wrapper">
        <h1>Ajout produit</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="libelle" class="form-label">Libellé produit</label>
                <input name="libelle" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <select class="form-select">
                    <option selected>--Choisissez votre catégorie--</option>
                    <option value="alimentation">Alimentation</option>
                    <option value="textile">Textile</option>
                    <option value="cosmetique">Cosmétique</option>
                    <option value="electromenager">Électroménager</option>
                    <option value="bricolage">Bricolage</option>
                    <option value="mobilier">Mobilier</option>
                    <option value="vehicule">Véhicule</option>
                    <option value="entretien">Produit d'entretien</option>
                    <option value="loisirs">Loisirs</option>
                    <option value="bagagerie">Bagagerie</option>
                </select>
            </div>
        </form>
    </div>
</body>

</html>