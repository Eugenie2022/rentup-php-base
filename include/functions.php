<?php

function connectDatabase() {
    try {
        $db = new PDO('mysql:host=localhost;dbname=rentu-up;charset=utf8', 'root', '');
        return $db;
    } catch (Exception $e) {
        die ('Erreur : ' . $e->getMessage());
    }
}

function getPropertyTypes(): array
{
    $db = connectDatabase();

    $sqlQuery = 'SELECT * FROM propertytype';
    $parameters = [];

    $propertytypesStatement = $db->prepare($sqlQuery);
    $propertytypesStatement->execute($parameters);

    return $propertytypesStatement->fetchAll();
}

function getProperties(): array
{
    $db = connectDatabase();

    $sqlQuery = 'SELECT * FROM property, propertytype WHERE property.PropertyType_id = propertytype.id ORDER BY created_at DESC;';
    $parameters = [];

    $propertiesStatement = $db->prepare($sqlQuery);
    $propertiesStatement->execute($parameters);

    return $propertiesStatement->fetchAll();

}

function isSoldOrRented($property): bool
{
    if ($property['status'] === 'A louer') {
        return true;
    } elseif ($property['status'] === 'A vendre') {
        return true;
    }

    return false;

}


function getAgents(): array
{
    $db = connectDatabase();

    $sqlQuery = 'SELECT * FROM seller';
    $parameters = [];

    $agentsStatement = $db->prepare($sqlQuery);
    $agentsStatement->execute($parameters);

    return $agentsStatement->fetchAll();
}

function getAgentsPropertyCount($agent) : array
{
    $db = connectDatabase();

    $sqlQuery = 'SELECT COUNT(seller.id) FROM seller, property WHERE property.Seller_id = Seller.id AND Seller.id = ' . $agent['id'];
    $parameters = [];

    $agentsPropertyCount = $db->prepare($sqlQuery);
    $agentsPropertyCount->execute($parameters);

    return $agentsPropertyCount->fetchAll();

}

function createProperty($name, $street, $postalCode, $city, $state, $price,  $status,  $image, $sellerId, $propertyTypeId) {

    $db = connectDatabase();

    $sqlQuery = "INSERT INTO property (name, street, postal_code, city, state, country, price, status, created_at, image, Seller_id, PropertyType_id) VALUE 
    (:name, :street, :postal_code, :city, :state, :country, :price, :status, NOW(), :image, :Seller_id, :PropertyType_id)";
    $insertProperty = $db->prepare($sqlQuery);
    return $insertProperty->execute([
        'name' => $name,
        'street' => $street,
        'postal_code' => $postalCode,
        'city' => $city,
        'state' => $state,
        'country' => $state,
        'price' => $price,
        'status' => $status,
        'image' => $image,
        'Seller_id' => $sellerId,
        'PropertyType_id' => $propertyTypeId
    ]);
}



