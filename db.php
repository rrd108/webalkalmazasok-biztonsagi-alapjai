<?php

$pdo = new PDO('mysql:host=' . $secrets['db']['host'] . ';dbname=' . $secrets['db']['name'], $secrets['db']['user'], $secrets['db']['pass']);


$stmt = $pdo->query('SELECT * FROM products, categories 
    WHERE categories.id = products.category_id 
    ORDER BY rand()');

if (isset($_GET['category'])) {
    $query = 'SELECT * FROM products, categories 
    WHERE categories.id = products.category_id 
    AND categories.category = "' . $_GET['category'] . '"
    ORDER BY rand()';
    $stmt = $pdo->query($query);
}

if (isset($_GET['order'])) {
    $stmt = $pdo->query('SELECT * FROM products, categories 
        WHERE categories.id = products.category_id 
        ORDER BY ' . $_GET['order']);
}

$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
