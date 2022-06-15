<?php // http://localhost/myweb
require_once __DIR__ . "/classes/Template.php";

Template::header("");
?>

<div class="our-store">
<h2>Fine chocolate made by hand in Stockholm</h2>
<article>With us you will find chocolate in all forms. Luxury drinking chocolate, chocolate cakes and pastries. since we make everything by hand,<br>
   you can also find ingredients such as cocoa butter and cocoa nibs in our stores. The factory was started in 2016 in Alvik, Stockholm and <br>
   is run by Lorena, Firat and Moises. we also arrange courses and tests. Make room for more chocolate in life. It gets better that way.</article>
   
</div>

<div class="about-chocolate">
   <img class="about-chocolate-img" src="/myweb/assets/images/chokladnfokus.jpg" alt="bild">
   <div>
      <h2 class="text-about">About chocolate</h3>
   <p>
      Chocolate is so much more than candy. From the very beginning, when the cocoa is harvested at the equator until the pralines come out of our production, 
      it is surrounded by knowledge and care. That is one of the reasons why we feel so good about eating chocolate. 
      And the more you know about different cocoa beans, cocoa levels, cocoa butter and the importance of breathing calmly while eating, the better. 
      Therefore, we recommend that you try one of our chocolate tastings in peace and quiet at home with an exciting box in front of you.
   </p>
   
   <a href="/myweb/pages/products.php" class="get_products-btn">Get products</a>
      </div>
</div>

<div class="tasting-chocolate">
   <div>
   <h2 class="text-tasting">Tasting</h2>
   <p>
   Who makes the tastiest chocolate? How does cocoa grow? What is white chocolate? Now you can get answers at home on the couch, at work or wherever you want to sit, 
   stand or lie down. Our digital chocolate tastings are here to stay. The content of the tasting is the same as in a physical tasting with pure chocolate and chocolate pralines, 
   we send a box in the mail. When it's time, go to the link that came with the box, and the chocolate tasting can begin. (Remember not to peek at the box in advance, it will be more fun that way.) 
   We will take you through the contents of the box while you learn about everything from cocoa beans to praline production. If you like chocolate, we will have a very nice time together.
   </p>
   <a href="/myweb/pages/products.php" class="get_products-btn">Get products</a>
   </div>

   <img class="tasting-img" src="/myweb/assets/images/digital-chokladprovning-2.jpg" alt="bild">

</div>


<?php

Template::footer();
