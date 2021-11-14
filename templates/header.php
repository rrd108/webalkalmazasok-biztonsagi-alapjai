<header>
    <h1 id="logo">
        <a href="./"><i class="fas fa-carrot"></i> Vulnerable Shop</a>
    </h1>
    <h1>
        <a href="./?order=name"><i class="fas fa-long-arrow-alt-up"></i> <?= count($products) ?> termék <i class="fas fa-long-arrow-alt-down"></i></a>
    </h1>
    <h1>
        <?php if (isset($_SESSION['user'])) : ?>
            <?= $_SESSION['user']['email'] ?> <a href="./?logout"><i class="fas fa-sign-out-alt"></i></a>
        <?php else : ?>
            <a href="./?page=login"><i class="fas fa-user-astronaut"></i> Login</a>
        <?php endif; ?>
    </h1>
</header>