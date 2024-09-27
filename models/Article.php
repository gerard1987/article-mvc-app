<?php

class Article 
{
    public $name;
    public $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public static function all() 
    {
        $list = [];
        $db = new PDO('mysql:host=localhost;dbname=article-app;charset=utf8', 'root', '');
       
        $req = $db->query('SELECT * FROM articles');
        $articles = $req->fetchAll(PDO::FETCH_OBJ);

        return $articles;
    }

    public static function getById($id) 
    {
        $list = [];
        $db = new PDO('mysql:host=localhost;dbname=article-app;charset=utf8', 'root', '');
        
        // Prepare query
        $stmt = $db->prepare('SELECT * FROM articles WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    
        $article = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $article;
    }    

    public static function edit($data) 
    {
        $db = new PDO('mysql:host=localhost;dbname=article-app;charset=utf8', 'root', '');
    
        $id = $data['id'];
        $name = $data['name'];
        $price = $data['price'];
    
        // Prepare query
        $stmt = $db->prepare('UPDATE articles SET name = :name, price = :price WHERE id = :id');
        
        // Bind parameters
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR); // Bind name
        $stmt->bindParam(':price', $price, PDO::PARAM_STR); // Bind price
    
        return $stmt->execute();
    }
    
    public static function delete() 
    {
        $list = [];
        $db = new PDO('mysql:host=localhost;dbname=article-app;charset=utf8', 'root', '');
       
        // query the database for all articles
        $req = $db->query('SELECT * FROM articles');
        $articles = $req->fetchAll(PDO::FETCH_OBJ);

        return $articles;
    }    
    
}