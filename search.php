<?php
$stmt = $pdo->prepare('SELECT products.id AS productId, products.name, products.description, products.picture, products.price, products.stock, categories.id AS categoryId, categories.category 
    FROM  products, categories
    WHERE categories.id = products.category_id 
    AND products.name LIKE ?
    ORDER BY RAND()');
$stmt->execute(['%' . $_GET['search'] . '%']);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
