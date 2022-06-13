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
            <h1><?= $title ?></h1>
            <a href=""><img src="" alt="">ChocoLoco</a>
            <nav>
                <a href="/myweb/pages/cart.php"><i class="bi bi-bag"></i>Shoppingbag</a>
                <?php if(!$is_logged_in): ?>
                <a href="/myweb/pages/register.php"><i class="bi bi-people"></i></i>Login</a>                
               
                <?php elseif($is_admin): ?>
                    <a href="/myweb/pages/admin.php">Admin Page</a>
                    <?php endif; ?>
            </nav>
            <?php if($is_logged_in): ?>
                <p>
                    <b>Logged in as:</b>
                    <?= $logged_in_user->username ?>

                    <form action="/myweb/scripts/post-logout.php" method="post">
                        <input type="submit" value="Logout">
                    </form>
                </p>
            <?php endif; ?>
            <hr>


        <?php }

    public static function footer()
    { ?>
            <footer>
                <div>
                    <h2>About us</h2>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. <br>
                        Sed accusantium eaque aperiam minus. <br>
                        Architecto quaerat odio distinctio harum <br> voluptates temporibus eos ipsum labore minima. <br>
                        Blanditiis eligendi repellat quae inventore dignissimos?
                    </p>
                </div>
                <div>
                    <p>Loggan</p>
                    <p>&copy; ChocoLoco 2022</p>
                </div>
                <div>
                    <h2>Contact</h2>
                    <p>
                        as
                    </p>
                </div>
            </footer>

        </body>

        </html>

<?php }
}
