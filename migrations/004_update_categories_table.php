<?php
require("../connection/connection.php");


$query = "ALTER TABLE categories
ADD CONSTRAINT fk_cetegory_articles_id
FOREIGN KEY (article_id)
REFERENCES articles(id)
ON UPDATE CASCADE
ON DELETE CASCADE;";

$execute = $mysqli->prepare($query);
$execute->execute();
