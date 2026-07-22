<?php
session_start();
include("connection.php");

if (isset($_POST['add_to_cart'])) {
    $prodid = $_POST['prodid'];

    $stmt = $conn->prepare("SELECT * FROM products WHERE prodid = ?");
    $stmt->bind_param("i", $prodid); // "i" means integer
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    if ($product) {
        // 2. Initialize cart if it doesn't exist
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // 3. Check if product is already in the cart
        // Using the ID as the key allows us to just increment quantity
        if (isset($_SESSION['cart'][$prodid])) {
            $_SESSION['cart'][$prodid]['quantity'] += 1;
        } else {
            // Add new product with a starting quantity of 1
            $product['quantity'] = 1;
            $_SESSION['cart'][$prodid] = $product;
        }
    }

    //header("Location: cartpage.php");
    //header("Location: " . $_SERVER['PHP_SELF']);
    //exit();
    $return_url = $_POST['return_url'] ?? 'index.php';

    header("Location: " . $return_url);
    exit();
}
?>