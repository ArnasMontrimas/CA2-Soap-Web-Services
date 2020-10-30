<?php

require_once "database.php";

$db = new Database();
$conn = $db->connect();

/**
 * Operation #1
 * This method is a 0 parameter method which gets all games from database
 */
function getAllGames() :String {
    global $conn;

    $query = "SELECT * FROM games;";

    $statement = $conn->prepare($query);

    try {
        $statement->execute();
    } catch (PDOException $ex) {
        echo "Error occurred: " . $ex->getMessage();
        die();
    }
    $games = $statement->fetchAll(PDO::FETCH_ASSOC);
    return json_encode($games);
}

/**
 * Operation #2
 * This method is a 1 parameter method which gets all games which match a user specified name
 */
function getGamesByName(String $name) :String {
    global $conn;

    $query = "SELECT * FROM games WHERE name = :name";

    $statement = $conn->prepare($query);
    $statement->bindValue(":name", $name);

    try {
        $statement->execute();
    } catch(PDOException $ex) {
        echo "Error occurred: " . $ex->getMessage();
        die();
    }
    $games = $statement->fetchAll(PDO::FETCH_ASSOC);
    return json_encode($games);
}


/**
 * Operation #3
 * This method is a 2 parameter method which gets all games which match user specified 'platform' AND, OR 'genre'
 */
function getGamesByPlatformAndGenre(String $platform, String $genre) :String {
    global $conn;

    //If all inputs are left black i dont want to return all games this prevents that from happening
    if($platform == "" && $genre == "") {
        $platform = "-1";
        $genre = "-1";
    }

    $query = "SELECT * FROM games WHERE platform LIKE :platform AND genre LIKE :genre";
    
    $statement = $conn->prepare($query);
    $statement->bindValue(":platform", "%".$platform."%");
    $statement->bindValue(":genre", "%".$genre."%");

    try {
        $statement->execute();
    } catch(PDOException $ex) {
        echo "Error occurred: " . $ex->getMessage();
        die();
    }
    $games = $statement->fetchAll(PDO::FETCH_ASSOC);
    return json_encode($games);
}

ini_set("soap.wsdl_cache_enabled", "0");

$server = new SoapServer("serviceProvider.wsdl");

$server->addFunction("getAllGames");                  //Operation #1
$server->addFunction("getGamesByName");               //Operation #2
$server->addFunction("getGamesByPlatformAndGenre");   //Operation #3

$server->handle();
