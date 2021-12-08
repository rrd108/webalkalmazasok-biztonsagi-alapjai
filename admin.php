<?php
$stmt = $pdo->prepare('SELECT * FROM orders ORDER BY created DESC');
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

$ordersList = [];

foreach ($orders as $i => $order) {
    $order['content'] = json_decode($order['content']);
    //var_dump($order);

    $ordersList[$i]['title'] = $order['id'] . ' : ' . $order['created'] . ' Fizetendő: ' . number_format($order['total']) . ' Ft';

    foreach ($order['content']->productId as $j => $item) {
        $ordersList[$i]['content'][] = [
            'name' => $order['content']->product[$j],
            'price' => $order['content']->price[$j],
        ];
    }
}
