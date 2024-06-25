<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/wishlist_cart.php';

$sort_option = isset($_GET['sort']) ? $_GET['sort'] : '';
$filter_category = isset($_GET['category']) ? $_GET['category'] : '';

$query = "SELECT * FROM `products`";
$conditions = [];
$params = [];

// Filter by category
if ($filter_category) {
    $conditions[] = "`category_id` = ?";
    $params[] = $filter_category;
}

// Apply conditions to the query
if (count($conditions) > 0) {
    $query .= " WHERE " . implode(" AND ", $conditions);
}

// Sort by the selected option
if ($sort_option) {
    if ($sort_option == 'price_asc') {
        $query .= " ORDER BY `price` ASC";
    } elseif ($sort_option == 'price_desc') {
        $query .= " ORDER BY `price` DESC";
    } elseif ($sort_option == 'name_asc') {
        $query .= " ORDER BY `name` ASC";
    } elseif ($sort_option == 'name_desc') {
        $query .= " ORDER BY `name` DESC";
    }
}

$select_products = $conn->prepare($query);
$select_products->execute($params);

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Shop</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/styles.css?v=<?php echo time(); ?>">

   <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">

   <style>
      .sort-filter-form select {
         background-color: transparent;
         color: white;
         border: 2px solid #159EC7;
         padding: 5px;
         margin: 5px;
         border-radius: 5px;
      }
      .sort-filter-form {
         display: flex;
         justify-content: center;
         align-items: center;
         margin-bottom: 20px;
      }
      .sort-filter-form select:focus {
         outline: none;
         background-color:#00121F;
      }
   </style>

   <script>
      function applyFilter() {
         const category = document.querySelector('select[name="category"]').value;
         const sort = document.querySelector('select[name="sort"]').value;
         const url = new URL(window.location.href);
         url.searchParams.set('category', category);
         url.searchParams.set('sort', sort);
         window.location.href = url.toString();
      }

      document.addEventListener('DOMContentLoaded', function() {
         document.querySelector('select[name="category"]').addEventListener('change', applyFilter);
         document.querySelector('select[name="sort"]').addEventListener('change', applyFilter);
      });
   </script>
</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="products">

   <h1 class="heading">Products</h1>

   <!-- Sort and Filter Form -->
   <form action="" method="get" class="sort-filter-form">
      <select name="category">
         <option value="">All Categories</option>
         <option value="1" <?= $filter_category == '1' ? 'selected' : '' ?>>CPU</option>
         <option value="2" <?= $filter_category == '2' ? 'selected' : '' ?>>GPU</option>
         <option value="3" <?= $filter_category == '3' ? 'selected' : '' ?>>Motherboard</option>
         <option value="4" <?= $filter_category == '4' ? 'selected' : '' ?>>Memory</option>
         <option value="5" <?= $filter_category == '5' ? 'selected' : '' ?>>Storage</option>
         <option value="6" <?= $filter_category == '6' ? 'selected' : '' ?>>PSU</option>
         <option value="7" <?= $filter_category == '7' ? 'selected' : '' ?>>Case</option>
         <option value="8" <?= $filter_category == '8' ? 'selected' : '' ?>>Cooler</option>
      </select>
      <select name="sort">
         <option value="">Sort By</option>
         <option value="price_asc" <?= $sort_option == 'price_asc' ? 'selected' : '' ?>>Price: Low to High</option>
         <option value="price_desc" <?= $sort_option == 'price_desc' ? 'selected' : '' ?>>Price: High to Low</option>
         <option value="name_asc" <?= $sort_option == 'name_asc' ? 'selected' : '' ?>>Name: A to Z</option>
         <option value="name_desc" <?= $sort_option == 'name_desc' ? 'selected' : '' ?>>Name: Z to A</option>
      </select>
   </form>

   <div class="box-container">

   <?php
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="box">
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
      <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
      <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
      <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_product['name']; ?></div>
      <div class="flex">
         <div class="price"><span>₱</span><?= $fetch_product['price']; ?></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products found!</p>';
   }
   ?>

   </div>

</section>

<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>
