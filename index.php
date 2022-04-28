<?php
include_once('./include/functions.php');

?>


<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RentUp - Home</title>
</head>

<body>
    <!-- https://themezhub.net/rentup-live/rentup/home-3.html -->

<?php include('./include/header.html');?>

    <main>

        <section class="section-home">
            <div class="container section-home-content">
                <h1>Search Your Next Home</h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis porro doloremque consequuntur,
                    error incidunt, sed natus qui temporibus eius alias nemo beatae explicabo sint ratione consequatur.
                    Deleniti minus vero quas.</p>
            </div>
        </section>

        <section class="section section-bg-grey">
            <div class="container">

                <header class="section-header">
                    <h2>Featured Property Types</h2>
                    <p>Find All Type of Property.</p>
                </header>
                <div class="property-type-list">
                    <?php foreach (getPropertyTypes() as $propertytype) : ?>
                    <article class="card">
                        <div class="icon">
                            <?php echo $propertytype['picto']; ?>
                        </div>
                        <h3><?php echo $propertytype['type']; ?></h3>
                        <p><?php echo $propertytype['value']; ?> propriétés</p>
                    </article>
                    <?php endforeach ?>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">

                <header class="section-header">
                    <h2>Recent Property Listed</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae excepturi animi amet incidunt ad,
                        ut et quisquam eveniet tenetur asperiores ipsum obcaecati doloremque cupiditate totam deserunt
                        officia quia atque nam.</p>
                </header>

                <div class="property-list">
                    <?php foreach (getPropertiesFirstPage() as $property) : ?>
                    <?php if(isSoldOrRented($property)): ?>
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
                    </article>
                    <?php endif; ?>
                    <?php endforeach ?>
                </div>
                <div><a href="propertyList.php">Voir toutes les propriétés</a></div>

            </div>
        </section>

        <section class="section">
            <div class="container">
                <header class="section-header">
                    <h2>Explore By Location</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae excepturi animi amet incidunt ad,
                        ut et quisquam eveniet tenetur asperiores ipsum obcaecati doloremque cupiditate totam deserunt
                        officia quia atque nam.</p>
                </header>
                <div class="city-list">
                    <div class="city-list-item">
                        <div class="city-bg-grey"></div>
                        <h3 class="city-list-title">New Orleans, Louisiana</h3>
                        <div class="city-list-infos">
                            <span>12 Villas</span>
                            <span>10 Apartments</span>
                            <span>07 Offices</span>
                        </div>
                    </div>
                    <div class="city-list-item">
                        <div class="city-bg-grey"></div>
                        <h3 class="city-list-title">Jerrsy, United State</h3>
                        <div class="city-list-infos">
                            <span>12 Villas</span>
                            <span>10 Apartments</span>
                            <span>07 Offices</span>
                        </div>
                    </div>
                    <div class="city-list-item">
                        <div class="city-bg-grey"></div>
                        <h3 class="city-list-title">Liverpool, London</h3>
                        <div class="city-list-infos">
                            <span>12 Villas</span>
                            <span>10 Apartments</span>
                            <span>07 Offices</span>
                        </div>
                    </div>
                    <div class="city-list-item">
                        <div class="city-bg-grey"></div>
                        <h3 class="city-list-title">New York, United States</h3>
                        <div class="city-list-infos">
                            <span>12 Villas</span>
                            <span>10 Apartments</span>
                            <span>07 Offices</span>
                        </div>
                    </div>
                    <div class="city-list-item">
                        <div class="city-bg-grey"></div>
                        <h3 class="city-list-title">Montreal, Canada</h3>
                        <div class="city-list-infos">
                            <span>12 Villas</span>
                            <span>10 Apartments</span>
                            <span>07 Offices</span>
                        </div>
                    </div>
                    <div class="city-list-item">
                        <div class="city-bg-grey"></div>
                        <h3 class="city-list-title">California, USA</h3>
                        <div class="city-list-infos">
                            <span>12 Villas</span>
                            <span>10 Apartments</span>
                            <span>07 Offices</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <header class="section-header">
                    <h2>Our Featured Agents</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae excepturi animi amet incidunt ad,
                        ut et quisquam eveniet tenetur asperiores ipsum obcaecati doloremque cupiditate totam deserunt
                        officia quia atque nam.</p>
                </header>
                <div class="agents-list">
                    <?php foreach (getAgents() as $agent) : ?>
                    <article class="card">
                        <div class="card-img-container">
                            <div class="badge">
                                <?= getAgentsPropertyCount($agent); ?>
                                listings
                            </div>
                            <div class="agent-img">
                                <span>
                                    <img class="check" src="./images/verified.svg" alt="">
                                </span>
                                <img class="agent-photo" src="./images/<?php echo $agent['profil_picture']; ?>" alt="portrait-agent-2">
                            </div>
                            <div class="agent-localisation">
                                <i class="fa fa-map-marker"></i> <?php echo $agent['location']; ?>
                            </div>
                            <div class="agent-name">
                                <h3><?php echo getFullName($agent) ?></h3>
                            </div>
                            <div class="agent-contact">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i id="facebook" class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i id="linkedin" class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i id="instagram" class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i id="twitter" class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <footer class="card-footer">
                                <div class="btn btn-primary">
                                    <i class="fa fa-envelope-o"></i>
                                    Message
                                </div>
                                <div class="btn btn-secondary">
                                    <i class="fa fa-phone"></i>
                                </div>
                            </footer>
                        </div>
                    </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php include('./include/pre_footer.html'); ?>

    </main>

    <?php include('./include/footer.html'); ?>

    <?php include('./include/back_to_top.html'); ?>
    <script src="dist/app.js"></script>
</body>

</html>