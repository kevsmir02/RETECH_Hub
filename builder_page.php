<?php

include 'components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
}

include 'components/wishlist_cart.php';

if (isset($_POST['clear_cart'])) {
    $clear_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
    $clear_cart->execute([$user_id]);
    $_SESSION['selected_products'] = [
        'cpu' => '',
        'gpu' => '',
        'motherboard' => '',
        'memory' => '',
        'storage' => '',
        'psu' => '',
        'case' => '',
        'cooler' => ''
    ];
    header('Location: builder_page.php');
    exit;
}

if (!isset($_SESSION['selected_products'])) {
    $_SESSION['selected_products'] = [
        'cpu' => '',
        'gpu' => '',
        'motherboard' => '',
        'memory' => '',
        'storage' => '',
        'psu' => '',
        'case' => '',
        'cooler' => ''
    ];
}

$selected_products = $_SESSION['selected_products'];
$total_price = 0;

// Join cart with products to fetch category_id and socket_type
$select_cart = $conn->prepare("
    SELECT cart.*, products.category_id, products.socket_type, products.name 
    FROM `cart` 
    LEFT JOIN `products` ON cart.pid = products.id 
    WHERE cart.user_id = ?
");
$select_cart->execute([$user_id]);

if ($select_cart) {
    while ($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)) {
        $product_name = $fetch_cart['name'];
        $category_id = $fetch_cart['category_id'];
        $price = $fetch_cart['price'];
        $socket_type = $fetch_cart['socket_type'];
        $total_price += $price;

        switch ($category_id) {
            case 1:
                $selected_products['cpu'] = ['name' => $product_name, 'socket_type' => $socket_type];
                break;
            case 2:
                $selected_products['gpu'] = ['name' => $product_name, 'socket_type' => $socket_type];
                break;
            case 4:
                $selected_products['motherboard'] = ['name' => $product_name, 'socket_type' => $socket_type];
                break;
            case 7:
                $selected_products['memory'] = ['name' => $product_name, 'socket_type' => $socket_type];
                break;
            case 8:
                $selected_products['storage'] = ['name' => $product_name, 'socket_type' => $socket_type];
                break;
            case 3:
                $selected_products['psu'] = ['name' => $product_name, 'socket_type' => $socket_type];
                break;
            case 5:
                $selected_products['case'] = ['name' => $product_name, 'socket_type' => $socket_type];
                break;
            case 6:
                $selected_products['cooler'] = ['name' => $product_name, 'socket_type' => $socket_type];
                break;
        }
    }
} else {
    echo "Error executing query: " . $select_cart->errorInfo()[2];
}

$_SESSION['selected_products'] = $selected_products;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC Builder</title>
    
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/styles.css?v=<?php echo time(); ?>">

    <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">

</head>
<body>
    
<?php include 'components/user_header.php'; ?>

<section class="builder">
    <div class="builder-card">
        <div class="builder-header">
            <span class="header-label">Category</span>
            <span class="header-label">Selection</span>
            <span class="header-label">Product</span>
        </div>
        <div class="divider"></div>
        <?php
        $categories = [
            'cpu' => 1,
            'gpu' => 2,
            'motherboard' => 4,
            'memory' => 7,
            'storage' => 8,
            'psu' => 3,
            'case' => 5,
            'cooler' => 6
        ];
        foreach ($categories as $category => $id) {
        ?>
        <div class="builder-item">
            <span class="item-label">Choose a <?= strtoupper($category) ?></span>
            <a href="#" class="select-button" data-category="<?= $category ?>" data-id="<?= $id ?>">Select</a>
            <span class="product-name" id="product-<?= $category ?>"><?= isset($selected_products[$category]['name']) ? $selected_products[$category]['name'] : '(chosen product)' ?></span>
        </div>
        <div class="divider"></div>
        <?php
        }
        ?>
    </div>

    <div class="builder-footer">
        <div class="compatibility-label" id="compatibility-label">Compatibility: </div>
        <div class="total-price" id="total-price">Total: ₱<?= $total_price ?></div>
    </div>

    <div class="action-buttons">
        <form action="" method="post" class="clear-form">
            <button type="submit" class="clear-button" name="clear_cart">Clear</button>
        </form>
        <form action="checkout.php" method="post" class="checkout-form">
            <?php foreach ($selected_products as $category => $product) { ?>
                <input type="hidden" name="selected_products[<?php echo $category; ?>]" value="<?php echo isset($product['name']) ? $product['name'] : ''; ?>">
            <?php } ?>
            <button type="submit" class="checkout-button">Checkout</button>
        </form>
    </div>
</section>

<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>
<script>
function updateCompatibility() {
    const selectedProducts = <?php echo json_encode($selected_products); ?>;
    const compatibilityLabel = document.getElementById('compatibility-label');

    let cpuSocket = selectedProducts['cpu'] ? selectedProducts['cpu']['socket_type'] : '';
    let motherboardSocket = selectedProducts['motherboard'] ? selectedProducts['motherboard']['socket_type'] : '';

    if (cpuSocket && motherboardSocket) {
        if (cpuSocket === motherboardSocket) {
            compatibilityLabel.textContent = 'Compatibility: Compatible';
        } else {
            compatibilityLabel.textContent = 'Compatibility: Incompatible';
        }
    } else {
        compatibilityLabel.textContent = 'Compatibility: ';
    }
    document.getElementById('total-price').textContent = 'Total: ₱' + <?php echo $total_price; ?>;
}

// Add event listeners to the select buttons
document.querySelectorAll('.select-button').forEach(button => {
    button.addEventListener('click', (e) => {
        e.preventDefault();
        const category = button.getAttribute('data-category');
        const category_id = button.getAttribute('data-id');
        const url = `builder_category.php?category=${category_id}`;
        window.location.href = url;

        fetch('components/select_product.php?category=' + category)
            .then(response => response.json())
            .then(data => {
                document.getElementById('product-' + category).textContent = data.product_name;
                updateCompatibility();
            })
            .catch(error => console.error('Error:', error));
    });
});

// Call the updateCompatibility function on page load to set the initial state
updateCompatibility();
</script>
</body>
</html>
