<?php

class Template
{
    public static function header($title)
    {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>ChocoLoco</title>
        </head>

        <body>
            <h1><?= $title ?></h1>
            <a href=""><img src="" alt="Loggan">Start</a>
            <nav>
                <a href="/myweb/pages/products.php">Products</a>   
                <a href="/myweb/pages/register.php">Login</a>
                <a href="/myweb/pages/cart.php">Cart</a>
            </nav>
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
