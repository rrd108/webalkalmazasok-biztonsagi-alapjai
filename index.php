<?php
session_start();
require './config.php';
require './db.php';

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ./');
}
if (isset($_GET['login'])) {
    require './login.php';
}

require './templates/head.php';
require './templates/header.php';

//routing 
if (isset($_GET['page']) && $_GET['page'] == 'login') {
    require './templates/login.php';
} else {
    require './templates/shop.php';
}


require './templates/footer.php';
