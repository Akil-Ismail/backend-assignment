<?php
require("../connection/connection.php");


$query = "ALTER TABLE articles
ADD CONSTRAINT fk_articles_cetegory_id
FOREIGN KEY (category_id)
REFERENCES categories(id)
ON UPDATE CASCADE
ON DELETE CASCADE;";

$execute = $mysqli->prepare($query);
$execute->execute();
