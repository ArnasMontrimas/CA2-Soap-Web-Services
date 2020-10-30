<?php

//Include soap client
require_once "soap-client.php";

if(isset($_POST['name'])) {
    $name = $_POST['name'];
    echo $client->getGamesByName($name);
}