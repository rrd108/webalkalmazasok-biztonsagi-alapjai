<?php

$pdo = new PDO('mysql:host=' . $secrets['db']['host'] . ';dbname=' . $secrets['db']['name'], $secrets['db']['user'], $secrets['db']['pass']);


$stmt = $pdo->query('SELECT * FROM products, categories 
    WHERE categories.id = products.category_id 
    ORDER BY rand()');

if (isset($_GET['category'])) {
    // Nem biztonságos mód
    /*$query = 'SELECT * FROM products, categories 
    WHERE categories.id = products.category_id 
    AND categories.category = "' . $_GET['category'] . '"
    ORDER BY rand()';
    $stmt = $pdo->query($query);*/

    // Biztonságos mód
    $stmt = $pdo->prepare('SELECT * FROM products, categories 
    WHERE categories.id = products.category_id 
    AND categories.category = ?
    ORDER BY rand()');
    $stmt->execute([$_GET['category']]);
}

if (isset($_GET['order'])) {
    // Nem biztonságos mód
    $stmt = $pdo->query('SELECT * FROM products, categories 
        WHERE categories.id = products.category_id 
        ORDER BY ' . $_GET['order']);
    // Biztonságos mód
    /*$stmt = $pdo->prepare('SELECT * FROM products, categories 
    WHERE categories.id = products.category_id 
    ORDER BY ?');
    $stmt->execute([$_GET['order']]);*/
}

$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
