<?php

//Routing starts here (Mapping between the request and the controller & method names)
//It's an key-value array where the value is an key-value array
//----------------------------------------------------------
$apis = [
    '/articles'         => ['controller' => 'ArticleController', 'method' => 'getAllArticles'],
    '/article'         => ['controller' => 'ArticleController', 'method' => 'getArticle'],
    '/delete_articles'         => ['controller' => 'ArticleController', 'method' => 'deleteAllArticles'],
    '/delete_article'         => ['controller' => 'ArticleController', 'method' => 'deleteArticle'],
    '/add_article'         => ['controller' => 'ArticleController', 'method' => 'addArticle'],
    '/update_article'         => ['controller' => 'ArticleController', 'method' => 'updateArticle'],

    '/categories'         => ['controller' => 'CategoryController', 'method' => 'getAllCategories'],
    '/category'         => ['controller' => 'CategoryController', 'method' => 'getCategory'],
    '/delete_categories'         => ['controller' => 'CategoryController', 'method' => 'deleteAllCategories'],
    '/delete_category'         => ['controller' => 'CategoryController', 'method' => 'deleteCategory'],
    '/add_category'         => ['controller' => 'CategoryController', 'method' => 'addCategory'],
    '/update_category'         => ['controller' => 'CategoryController', 'method' => 'updateCategory'],

    '/login'         => ['controller' => 'AuthController', 'method' => 'login'],
    '/register'         => ['controller' => 'AuthController', 'method' => 'register'],

];
