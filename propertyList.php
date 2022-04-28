<?php
include_once ('include/functions.php');
?>


<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RentUp - Propriétés</title>

</head>

<body>
    <!-- https://themezhub.net/rentup-live/rentup/home-3.html -->

<?php include('./include/header.html');?>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>

    <main>
        <section class="section">
            <div class="container">
        <div class="property-list">
            <?php foreach (getProperties() as $property) : ?>
                    <article class="card">
                        <div class="card-img-container">
                            <img src="./images/<?php echo $property['image']; ?>" alt="<?php echo $property['name']; ?>">
                        </div>
                        <div class="card-content">
                            <header class="card-content-header">
                                <div class="badge badge-warning"><?php echo $property['status']; ?></div>
                                <i class="fa fa-heart-o"></i>
                            </header>
                            <h3><?php echo $property['name']; ?></h3>
                            <p>
                                <i class="fa fa-map-marker"></i>
                                <?php echo $property['street'] . ', ' . $property['postal_code'] . ', ' . $property['city'] . ', ' .
                                    $property['state'] . ', ' . $property['country']; ?>
                            </p>
                        </div>
                        <footer class="card-footer">
                            <div>
                                <div class="btn btn-primary">
                                    <?php echo $property['price']; ?>
                                </div>
                                <span>/sqft</span>
                            </div>
                            <div><?php echo $property['type']; ?></div>
                            <a href="modifyProperty.php?id=<?php echo $property['id_property']; ?>" class="btn btn-secondary">
                                Modifier
                            </a>
                        </footer>
                        <div>
                            Vendeur : <?php echo getFullName($property); ?>
                        </div>
                    </article>
            <?php endforeach ?>
        </div>
            </div>
        </section>
    </main>
    <?php include('./include/pre_footer.html'); ?>
    <?php include('./include/footer.html'); ?>

    <?php include('./include/back_to_top.html'); ?>
    <script src="dist/app.js"></script>
</body>

</html>