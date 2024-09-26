<?php

class Article 
{
    public $name;
    public $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public static function all() {
        $list = [];
        $db = new PDO('mysql:host=localhost;dbname=article-app;charset=utf8', 'root', '');
       
        // query the database for all articles
        $req = $db->query('SELECT * FROM articles');
        $articles = $req->fetchAll(PDO::FETCH_OBJ);

        return $articles;
    }
}