<?php

require(__DIR__ . "/../models/Category.php");
require(__DIR__ . "/../connection/connection.php");
require(__DIR__ . "/../services/CategoryService.php");
require(__DIR__ . "/../services/ResponseService.php");

class categorController
{

    public function getAllCategories()
    {
        global $mysqli;

        try {
            $categories = category::all($mysqli);
            $categories_array = CategoryService::CategoriesToArray($categories);
            echo ResponseService::success_response($categories_array);
            return;
        } catch (Exception) {
            echo ResponseService::fail_response();
        }
    }

    public function getCategory()
    {
        global $mysqli;

        try {
            $id = $_GET["id"];
            $category = Category::find($mysqli, $id)->toArray();
            echo ResponseService::success_response($category);
            return;
        } catch (Exception) {
            echo ResponseService::fail_response();
        }
    }

    public function deleteAllCategories()
    {
        global $mysqli;
        try {
            $result = Category::deleteAll($mysqli);
            echo ResponseService::success_response($result);
            return;
        } catch (exception) {
            echo ResponseService::fail_response();
        }
    }

    public function deleteCategory()
    {
        global $mysqli;
        try {
            $id = $_GET["id"];
            $result = Category::delete($mysqli, $id);
            echo ResponseService::success_response($result);
            return;
        } catch (exception) {
            echo ResponseService::fail_response();
        }
    }

    public function addcategor()
    {
        global $mysqli;

        try {
            $result = Category::add($mysqli, $_POST);
            echo ResponseService::success_response($result);
        } catch (Exception) {
            echo ResponseService::fail_response();
        }
    }
    public function updatecategor()
    {
        global $mysqli;

        try {
            $id = $_POST['id'];
            $categor = new Category([]);
            $result = $categor->update($mysqli, $_POST, $id);
            echo ResponseService::success_response($result);
        } catch (exception) {
            echo ResponseService::fail_response();
        }
    }
}
