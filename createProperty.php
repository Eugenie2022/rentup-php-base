<?php
include_once ('include/functions.php');
?>

<?php
if (isset($_POST['name'], $_POST['street'], $_POST['postal_code'], $_POST['city'], $_POST['state'], $_POST['price'], $_POST['status'], $_FILES['image']['name'], $_POST['Seller_id'], $_POST['PropertyType_id'])) {

    $fileExt = explode('.', $_FILES['image']['name']);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if (in_array($fileActualExt, $allowed)) {
        if ($_FILES['image']['error'] === 0) {
            if ($_FILES['image']['size'] < 1000000) {
                move_uploaded_file($_FILES['image']['tmp_name'], 'images/'.$_FILES['image']['name']);
            } else {
                $messageErreur = "Taille de l'image trop importante";
            }
        } else {
            $messageErreur = 'Une erreur est survenue';
        }
    } else {
        $messageErreur = "Type de fichier image non autorisé";
    }
    if (empty($_POST['name']) || empty($_POST['street']) || empty($_POST['postal_code']) || empty($_POST['city']) || empty($_POST['state']) || empty($_POST['price']) || empty($_POST['status']) || empty($_FILES['image']['name']) || empty($_POST['Seller_id']) || empty($_POST['PropertyType_id'])) {
        $messageErreur = 'Veuillez saisir tous les champs requis';
    } else if (createProperty($_POST['name'], $_POST['street'], $_POST['postal_code'], $_POST['city'], $_POST['state'], $_POST['price'], $_POST['status'], $_FILES['image']['name'], $_POST['Seller_id'], $_POST['PropertyType_id']) === true) {
        //Redirect vers l'accueil
        header('Location: /rentup-php-base/index.php');
    } else {
        $messageErreur = 'Une erreur est survenue';
    }
}
?>


<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RentUp - Ajouter une propriété</title>
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
    >
</head>

<body>
    <!-- https://themezhub.net/rentup-live/rentup/home-3.html -->

<?php include('./include/header.html');?>
    <main>

        <section class="section-home">
            <div class="container section-home-content">
                <h1>Ajouter une propriété</h1>
            </div>
        </section>
    </br>

        <div class="container">
        <form enctype="multipart/form-data" action="createProperty.php" method="POST">
        <?php if (isset($messageErreur)): ?>
            <div class="alert alert-danger" role="alert">
                <?= $messageErreur ?>
            </div>
        <?php endif ?>
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="street" class="form-label">Rue</label>
                <input type="text" class="form-control" id="street" name="street">
            </div>
            <div class="mb-3">
                <label for="postal_code" class="form-label">Code postal</label>
                <input type="text" class="form-control" id="postal_code" name="postal_code">
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">Ville</label>
                <input type="text" class="form-control" id="city" name="city">
            </div>
            <div class="mb-3">
                <label for="state" class="form-label">Etat</label>
                <input type="text" class="form-control" id="state" name="state">
            </div>
            <div class="mb-3">
                <label for="country" class="form-label">Pays</label>
                <input type="text" class="form-control" id="country" name="country">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prix</label>
                <input type="text" class="form-control" id="price" name="price">
            </div>
            <div class="mb-3">
                <label for="status">Statut :</label>

                <select name="status" id="status">
                    <option value="">Choix du statut</option>
                    <option value="A louer">A louer</option>
                    <option value="A vendre">A vendre</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="image">Ajouter une image:</label>

                <input type="file"
                       id="image" name="image"
                       accept="image/png, image/jpeg">
            </div>
            <div class="mb-3">
                <label for="Seller_id">Agent :</label>

                <select name="Seller_id" id="Seller_id">
                    <option value="">Choix de l'agent</option>
                    <option value=1>Anne Young</option>
                    <option value=2>Harijeet Siller</option>
                    <option value=3>Sargam Singh</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="PropertyType_id">Type de propriété :</label>

                <select name="PropertyType_id" id="PropertyType_id">
                    <option value="">Choix du type de bien</option>
                    <option value=1>Maison</option>
                    <option value=2>Apartment</option>
                    <option value=3>Villa</option>
                    <option value=4>Office</option>
                    <option value=5>Maison secondaire</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Envoyer</button>

        </form>
            </br>
    </div>

<?php include('./include/pre_footer.html'); ?>

</main>

<?php include('./include/footer.html'); ?>

<?php include('./include/back_to_top.html'); ?>
<script src="dist/app.js"></script>
</body>

</html>