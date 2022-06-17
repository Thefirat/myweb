<?php
require_once __DIR__ . '/User.php';
session_start();
class Template
{
    public static function header($title)
    {
        $is_logged_in = isset($_SESSION['user']);
        $logged_in_user = $is_logged_in ? $_SESSION['user'] : null;
        $is_admin = $is_logged_in && ($logged_in_user->role == 'admin');

        $cart_count = isset($_SESSION["cart"]) ? count($_SESSION["cart"]) : 0;
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
            <link rel="stylesheet" href="/myweb/assets/style.css">
            <title>ChocoLoco</title>


        </head>

        <body>
            <div class="header-slogan">

                <h1>ChocoLoco</h1>
                <p class="header-text">the world of chocolate!</p>
            </div>

            <nav class="header-nav">
                <a href="/myweb"><img class="header-img" src="/myweb/assets/images/hero_v17.jpg" alt=""></a>
                <a href="/myweb"><i class="bi bi-house"></i>Home</a>
                <a href="/myweb/pages/products.php"><i class="bi bi-boxes"></i>Products</a>
                <a href="/myweb/pages/cart.php"><i class="bi bi-bag"></i>Cart (<?= $cart_count ?>)</a>
                <?php if (!$is_logged_in) : ?>
                    <a href="/myweb/pages/register.php"><i class="bi bi-people"></i>Login/Register</a>

                <?php elseif ($is_admin) : ?>
                    <a href="/myweb/pages/admin.php"> <i class="bi bi-key"></i>Admin Page</a>

                <?php endif; ?>
            </nav>
            <div class="logged_in_as">
                <?php if ($is_logged_in) : ?>
                    <p>
                        <b>Logged in as:</b>
                        <i><?= $logged_in_user->username ?></i>

                    <form action="/myweb/scripts/post-logout.php" method="post"><br>
                        <input class="logout-btn" type="submit" value="Logout">
                    </form>
                    </p>
                <?php endif; ?>
            </div>




        <?php }


    public static function footer()
    { ?>
            <hr>
            <footer>
                <div>
                    <h2>About us</h2>
                    <p>
                        With us you will find chocolate in all forms. <br>
                        Luxury drinking chocolate, chocolate cakes and pastries.<br>
                        The factory was started in 2016 in Alvik, <br>
                        Stockholm and is run by Lorena, Firat and Moises.<br>
                        Make room for more chocolate in life. It gets better that way.

                    </p>
                </div>

                <div>

                    <p>&copy; ChocoLoco 2022</p>

                </div>
                <div>
                    <h2>Contact</h2>
                    <a href="https://sv-se.facebook.com/"><i class="bi bi-facebook"></i></a>
                    <a href="https://giphy.com/gifs/quixyofficial-quixy-fixing-bugs-visual-description-Qkbm4jGMam7PfdWzHM"><i class="bi bi-instagram"></i></a>
                    <a href="https://giphy.com/gifs/bachelorinparadise-angry-frustrated-py2UYwTIX5SXm"><i class="bi bi-twitter"></i></a>

                </div>
            </footer>

        </body>

        </html>

<?php }
}
