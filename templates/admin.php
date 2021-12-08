<main id="admin">
    <?php foreach ($ordersList as $order) : ?>
        <h2><?= $order['title'] ?></h2>
        <ul>
            <?php foreach ($order['content'] as $content) : ?>
                <li>
                    1 db <?= $content['name'] ?> (<?= number_format($content['price']) ?> Ft/db)
                </li>
            <?php endforeach; ?>
        </ul>
        <hr>
    <?php endforeach; ?>
</main>