<?php
require("../connection/connection.php");


$query = "INSERT INTO categories(name) VALUES ('Charbel'),('Is'),('The'),('Best'),('Mentor'),('Ever')";

$execute = $mysqli->prepare($query);
$execute->execute();
