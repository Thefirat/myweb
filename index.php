<?php // http://localhost/myweb
require_once __DIR__ . '/classes/Template.php';
Template::header('');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
       <img src="/myweb/assets/images/5f5f30b30bd04353d9cdb92b_champagnemousse.png" alt="chocolate">
       <h2>Champagnemousse</h2>
       <h3>Price: 89 kr</h3>
    </div>
    <div>
       <img src="/myweb/assets/images/5f5f315927b419fe85e23f96_halloncreme.png" alt="chocolate">
       <h2>Halloncreme</h2>
       <h3>Price: 79 kr</h3>
    </div>
    <div>
       <img src="/myweb/assets/images/5f97f787eda532ff8849d716_0H3A8336.png" alt="chocolate">
       <h2>Lakritsdream</h2>
       <h3>Price: 99 kr</h3>
    </div>
    <div>
       <img src="/myweb/assets/images/5f97f7f6c7194f22e3f2ec0d_0H3A8347.png" alt="chocolate">
       <h2>Lovedream</h2>
       <h3>Price: 75 kr</h3>
    </div>
</body>
</html>


<?php
Template::footer();
