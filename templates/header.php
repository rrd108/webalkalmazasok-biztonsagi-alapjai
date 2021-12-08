<header>
    <h1 id="logo">
        <a href="./"><i class="fas fa-carrot"></i> Vulnerable Shop</a>
    </h1>
    <h1>
        <a href="./?order=name"><i class="fas fa-long-arrow-alt-up"></i> <?= count($products) ?> termék <i class="fas fa-long-arrow-alt-down"></i></a>
    </h1>
    <h1>
        <?php if (isset($_SESSION['user'])) : ?>
            <a href="./?admin"><?= $_SESSION['user']['email'] ?></a>
            <a href="./?logout"><i class="fas fa-sign-out-alt"></i></a>
        <?php else : ?>
            <a href="./?page=login"><i class="fas fa-user-astronaut"></i> Login</a>
        <?php endif; ?>
    </h1>

    <div id="cart">
        <i class="fas fa-shopping-cart" id="cartIcon"></i>
        <form action="?sendOrder" method="POST" id="cartForm">
            <ul></ul>
            <p>Összesen: <span id="totalAmount"></span> Ft</p>
            <input type="hidden" name="total" value="0" id="cartTotal">
            <input type="submit" value="Megrendelem">
        </form>
    </div>
</header>