<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/styles.css">

   <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">



</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/about.png" alt="">
      </div>

      <div class="content">
         <h3>Why choose RETECH Hub?</h3>
         <p>
            At RE-TECH Hub, we understand the thrill of creating the perfect PC tailored to your unique needs.
            <br>
            But we don't stop there! Once you've crafted your ideal setup, you can send your build directly to our expert team.
            We'll assemble and test your PC, ensuring it meets the highest standards of performance and reliability.
            Whether you're a gamer, a professional, or a tech enthusiast...
         </p>

         <p>
            RETECH Hub is here to turn your dreams into reality. 
         </p>
            
         
      </div>

   </div>

</section>

<section class="reviews">
   
   <h1 class="heading">Reviews</h1>

   <div class="swiper reviews-slider">

   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         <img src="images/carlo.jpg" alt="">
         <p>Been using their services for quite a bit and have never had an issue with the quality of their products. Online e-products working great as well. Only issue I have is they usually deliver when I'm a little caught up, though I've set a preferred delivery time. Everything else has been good.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3> <a href="https://www.facebook.com/titan.gonzales" target="_blank">Christian Carlo Gonzales</a></h3>
      </div>

      <div class="swiper-slide slide">
         <img src="images/keihle.jpg" alt="">
         <p>It is the first online services in Philippines which we can trust completely.I always unbox making a video and instantly complain if there's anything wrong. Sometimes even don't need to return the item and they process the refund. Pampanga do heavy fine to sellers who send wrong products thats why its platform getting better day by day.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3><a href="https://www.facebook.com/keihle.pascual.7" target="_blank">Keihle Dianne Pascual</a></h3>
      </div>

      <div class="swiper-slide slide">
         <img src="images/brylle.png" alt="">
         <p>RETECH Hub is great if you choose good sellers . A variety of required item available . Customers can return and refund full amount within 7 days easily . RETECH Hub is boosting eCommerce business in Pampanga.It provides great opportunity to sale items online with ease.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3><a href="https://www.facebook.com/BRYLLEDIMINSIL14" target="_blank">Brylle Renzy Diminsil</a></h3>
      </div>

      <div class="swiper-slide slide">
         <img src="images/carlo.jpg" alt="">
         <p>Been using their services for quite a bit and have never had an issue with the quality of their products. Online e-products working great as well. Only issue I have is they usually deliver when I'm a little caught up, though I've set a preferred delivery time. Everything else has been good.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3> <a href="https://www.facebook.com/titan.gonzales" target="_blank">Christian Carlo Gonzales</a></h3>
      </div>

      <div class="swiper-slide slide">
         <img src="images/keihle.jpg" alt="">
         <p>It is the first online services in Philippines which we can trust completely.I always unbox making a video and instantly complain if there's anything wrong. Sometimes even don't need to return the item and they process the refund. KinBech do heavy fine to sellers who send wrong products thats why its platform getting better day by day.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3><a href="https://www.facebook.com/keihle.pascual.7" target="_blank">Keihle Dianne Pascual</a></h3>
      </div>

      <div class="swiper-slide slide">
         <img src="images/brylle.png" alt="">
         <p>RETECH Hub is great if you choose good sellers . A variety of required item available . Customers can return and refund full amount within 7 days easily . RETECH Hub is boosting eCommerce business in Pampanga.It provides great opportunity to sale items online with ease.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3><a href="https://www.facebook.com/BRYLLEDIMINSIL14" target="_blank">Brylle Renzy Diminsil</a></h3>
      </div>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>









<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".reviews-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
        slidesPerView:1,
      },
      768: {
        slidesPerView: 2,
      },
      991: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>