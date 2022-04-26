<?php
include_once ('include/functions.php');
?>

<?php
if (isset($_POST['name'], $_POST['street'], $_POST['price'], $_POST['status'], $_POST['created_at'], $_FILES['image'], $_POST['Seller_id'], $_POST['PropertyType_id']) !== null) {
    if (empty($_POST['name'] || empty($_POST['street']) || empty($_POST['price']) || empty($_POST['status']) || empty($_POST['created_at']) || empty($_FILES['image']) || empty($_POST['Seller_id']) || empty($_POST['PropertyType_id']))) {
    if (empty($_POST['name'] || empty($_POST['street']) || empty($_POST['price']) || empty($_POST['status']) || empty($_POST['created_at']) || empty($_FILES['image']) || empty($_POST['Seller_id']) || empty($_POST['PropertyType_id']))) {
        $messageErreur = 'Veuillez saisir tous les champs requis';
    } else {
        if (createProperty($_POST['name'], $_POST['street'], $_POST['price'], $_POST['status'], $_POST['created_at'], $_FILES['image'], $_POST['Seller_id'], $_POST['PropertyType_id']) === true) {
            //Redirect vers l'accueil
            header('Location: /rentup-php-base/index.php');
        } else {
            $messageErreur = 'Une erreur est survenue';
        }
    }}
}
?>


<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RentUp - Ajouter une propriété</title>
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
        <form action="createProperty.php" method="POST">
        <?php if (isset($messageErreur)): ?>
            <div class="alert alert-danger" role="alert">
                <?= $messageErreur ?>
            </div>
        <?php endif ?>
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            </br>
            <div class="mb-3">
                <label for="street" class="form-label">Rue</label>
                <input type="text" class="form-control" id="street" name="street">
            </div>
            </br>
            <div class="mb-3">
                <label for="postal_code" class="form-label">Code postal</label>
                <input type="text" class="form-control" id="postal_code" name="postal_code">
            </div>
            </br>
            <div class="mb-3">
                <label for="city" class="form-label">Ville</label>
                <input type="text" class="form-control" id="city" name="city">
            </div>
            </br>
            <div class="mb-3">
                <label for="state" class="form-label">Etat</label>
                <input type="text" class="form-control" id="state" name="state">
            </div>
            </br>
            <div class="mb-3">
                <label for="price" class="form-label">Prix</label>
                <input type="text" class="form-control" id="price" name="price">
            </div>
            </br>
            <div class="mb-3">
                <label for="status">Statut :</label>

                <select name="status" id="status">
                    <option value="">Choix du statut</option>
                    <option value="rent">A louer</option>
                    <option value="sell">A vendre</option>
                </select>
            </div>
            </br>
            <div class="mb-3">
                <label for="image">Ajouter une image:</label>

                <input type="file"
                       id="image" name="image"
                       accept="image/png, image/jpeg">
            </div>
            </br>
            <div class="mb-3">
                <label for="seller">Agent :</label>

                <select name="seller" id="status">
                    <option value="">Choix de l'agent</option>
                    <option value="anne">Anne Young</option>
                    <option value="hari">Harijeet Siller</option>
                    <option value="sargam">Sargam Singh</option>
                </select>
            </div>
            </br>
            <div class="mb-3">
                <label for="propertytype">Type de propriété :</label>

                <select name="propertytype" id="propertytype">
                    <option value="">Choix du type de bien</option>
                    <option value="house">Maison</option>
                    <option value="Apartment">Apartment</option>
                    <option value="villa">Villa</option>
                    <option value="office">Office</option>
                    <option value="family-house">Maison secondaire</option>
                </select>
            </div>
            </br>

            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
        </br>

<?php include('./include/pre_footer.html'); ?>

</main>

<?php include('./include/footer.html'); ?>

<?php include('./include/back_to_top.html'); ?>
<script src="dist/app.js"></script>
</body>

</html>