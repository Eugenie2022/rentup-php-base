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

function getPropertiesFirstPage(): array
{
    $db = connectDatabase();

    $sqlQuery = 'SELECT * FROM property, propertytype WHERE property.PropertyType_id = propertytype.id ORDER BY created_at DESC LIMIT 4;';
    $parameters = [];

    $propertiesStatement = $db->prepare($sqlQuery);
    $propertiesStatement->execute($parameters);

    return $propertiesStatement->fetchAll();

}

function getProperties(): array
{
    $db = connectDatabase();

    $sqlQuery = 'SELECT * FROM property, propertytype, seller WHERE property.PropertyType_id = propertytype.id AND property.Seller_id = seller.id ORDER BY created_at DESC;';
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

function getAgentsPropertyCount($id) : int
{
    $db = connectDatabase();

    $sqlQuery = 'SELECT COUNT(seller_id) FROM property LEFT JOIN seller ON property.Seller_id = seller.id WHERE seller_id =' . $id;
    $parameters = [];

    $propertyCountStatement = $db->prepare($sqlQuery);
    $propertyCountStatement->execute($parameters);

    return $propertyCountStatement->fetchColumn();
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

function modifyProperty($name, $street, $postalCode, $city, $state, $price,  $status,  $image, $sellerId, $propertyTypeId, $idProperty) {

    $db = connectDatabase();

    $sqlQuery = "UPDATE property SET 
                    name = :name, 
                    street = :street, 
                    postal_code = :postal_code,
                    city = :city, 
                    state = :state, 
                    country = :country,
                    price = :price, 
                    status = :status, 
                    created_at = NOW(), 
                    image = :image, 
                    Seller_id = :Seller_id, 
                    PropertyType_id = :PropertyType_id
                WHERE id_property = :id_property;";
    $modifyProperty = $db->prepare($sqlQuery);
    return $modifyProperty->execute([
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
        'PropertyType_id' => $propertyTypeId,
        'id_property' => $idProperty
    ]);
}

function getPropertiesId(): array
{
    $db = connectDatabase();

    $sqlQuery = 'SELECT * FROM property WHERE id_property = ?;';
    $parameters = [];

    $propertiesIdStatement = $db->prepare($sqlQuery);
    $propertiesIdStatement->execute(array($_GET['id']));

    return $propertiesIdStatement->fetchAll();

}

function getFullName($agent): string
{
    return htmlentities($agent['firstname'] . ' ' . $agent['lastname']);
}

function getFullAddress($property): string
{
    return htmlentities($property['street'] . ', ' . $property['postal_code'] . ', ' . $property['city'] . ', ' .
        $property['state'] . ', ' . $property['country']);
}

