<main class="g3">
    <?php foreach ($products as $product) : ?>
        <section class="product">
            <h2>
                <span><?= $product['name'] ?></span>
                <a href="./?category=<?= $product['category'] ?>" class="category"><i class="fas fa-filter"></i> <?= $product['category'] ?></a>
            </h2>
            <p><?= $product['description'] ?></p>
            <img src="./img/<?= $product['picture'] ?>">
            <h3><?= $product['price'] ?> Ft</h3>
            <p>
                <?php if ($product['stock']) : ?>
                    <button id="<?= $product['id'] ?>" class="addToCart"><i class="fas fa-shopping-cart"></i> Kosárba</button>
                <?php else : ?>
                    Nem rendelhető
                <?php endif; ?>
            </p>
        </section>
    <?php endforeach; ?>
</main>