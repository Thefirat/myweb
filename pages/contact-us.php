<?php
require_once __DIR__ . '/../classes/Template.php';

Template::header('');

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
    <title>Contact Us</title>
  </head>
  <body>
    <div class="container">
        <div class="text">
            <h1 class="text-center">Contact Us</h1>        
            <hr class="w-25 m-auto bg-dark">    
        </div>
        <form action="/myweb/scripts/post-contact-form.php" method="POST" autocomplete="off">
            <div class="user">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="email">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="contact">
                <label for="contact">Contact</label>
                <input type="number" name="contact" id="contact" class="form-control">
            </div>
            <div class="message">
                <label for="message">Message</label>
                <textarea name="message" id="message" class="form-control" cols="30" rows="5"></textarea>
            </div>
            <button class="btn btn-success">Send Message</button>
        </form>
    </div>
  </body>
</html>








<?php

Template::footer();