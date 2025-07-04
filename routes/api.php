<!-- , add a new article, update a specific article -->
<?php

//Routing starts here (Mapping between the request and the controller & method names)
//It's an key-value array where the value is an key-value array
//----------------------------------------------------------
$apis = [
    '/articles'         => ['controller' => 'ArticleController', 'method' => 'getAllArticles'],
    '/article'         => ['controller' => 'ArticleController', 'method' => 'getArticle'],
    '/delete_articles'         => ['controller' => 'ArticleController', 'method' => 'deleteAllArticles'],
    '/delete_article'         => ['controller' => 'ArticleController', 'method' => 'deleteArticle'],

    '/login'         => ['controller' => 'AuthController', 'method' => 'login'],
    '/register'         => ['controller' => 'AuthController', 'method' => 'register'],

];
