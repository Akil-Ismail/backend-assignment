<?php

require(__DIR__ . "/../models/Article.php");
require(__DIR__ . "/../connection/connection.php");
require(__DIR__ . "/../services/ArticleService.php");
require(__DIR__ . "/../services/ResponseService.php");

class ArticleController
{

    public function getAllArticles()
    {
        global $mysqli;

        try {
            $articles = Article::all($mysqli);
            $articles_array = ArticleService::articlesToArray($articles);
            echo ResponseService::success_response($articles_array);
            return;
        } catch (Exception) {
            echo ResponseService::fail_response();
        }
    }

    public function getArticle()
    {
        global $mysqli;

        try {
            $id = $_GET["id"];
            $article = Article::find($mysqli, $id)->toArray();
            echo ResponseService::success_response($article);
            return;
        } catch (Exception) {
            echo ResponseService::fail_response();
        }
    }

    public function deleteAllArticles()
    {
        global $mysqli;
        try {
            $result = Article::deleteAll($mysqli);
            echo ResponseService::success_response($result);
            return;
        } catch (exception) {
            echo ResponseService::fail_response();
        }
    }

    public function deleteArticle()
    {
        global $mysqli;
        try {
            $id = $_GET["id"];
            $result = Article::delete($mysqli, $id);
            echo ResponseService::success_response($result);
            return;
        } catch (exception) {
            echo ResponseService::fail_response();
        }
    }

    public function addArticle()
    {
        global $mysqli;

        try {
            $result = Article::add($mysqli, $_POST);
            echo ResponseService::success_response($result);
        } catch (Exception) {
            echo ResponseService::fail_response();
        }
    }
    public function updateArticle()
    {
        global $mysqli;

        try {
            $id = $_POST['id'];
            $article = new Article([]);
            $result = $article->update($mysqli, $_POST, $id);
            echo ResponseService::success_response($result);
        } catch (exception) {
            echo ResponseService::fail_response();
        }
    }
}

//To-Do:

//1- Try/Catch in controllers ONLY!!! 
//2- Find a way to remove the hard coded response code (from ResponseService.php)
//3- Include the routes file (api.php) in the (index.php) -- In other words, seperate the routing from the index (which is the engine)
//4- Create a BaseController and clean some imports 