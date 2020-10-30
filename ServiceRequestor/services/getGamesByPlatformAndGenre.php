<?php

//Include soap client
require_once "soap-client.php";

if(isset($_POST['genre']) && isset($_POST['platform'])) {
    $platform = $_POST['platform'];
    $genre = $_POST['genre'];

    echo $client->getGamesByPlatformAndGenre($platform, $genre);
}