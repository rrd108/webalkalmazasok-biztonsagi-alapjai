<?php

$pdo = new PDO('mysql:host=' . $secrets['db']['host'] . ';dbname=' . $secrets['db']['name'], $secrets['db']['user'], $secrets['db']['pass']);


$stmt = $pdo->query('SELECT products.id AS productId, products.name, products.description, products.picture, products.price, products.stock, categories.id AS categoryId, categories.category 
    FROM  products, categories
    WHERE categories.id = products.category_id 
    ORDER BY RAND()');

if (isset($_GET['category'])) {
    $stmt = $pdo->prepare('SELECT products.id AS productId, products.name, products.description, products.picture, products.price, products.stock, categories.id AS categoryId, categories.category
        FROM products, categories 
        WHERE categories.id = products.category_id 
        AND categories.category = ?
        ORDER BY RAND()');
    $stmt->execute([$_GET['category']]);
}

if (isset($_GET['order'])) {
    $order = $_GET['order'] == 'name' ? 'products.name' : 'products.price';
    $stmt = $pdo->prepare('SELECT products.id AS productId, products.name, products.description, products.picture, products.price, products.stock, categories.id AS categoryId, categories.category
        FROM products, categories 
        WHERE categories.id = products.category_id 
        ORDER BY ' . $order . ' ASC');
    $stmt->execute();
}

$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
//var_dump($products);
