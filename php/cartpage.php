<?php
session_start();
// Initialize total
$total = 0;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart - Move-In Budget</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600&family=Raleway:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/shoppingcart.css">
</head>
<body>
    <nav>
        <h3>Move-In Budget</h3>
        <ol>
            <li><i class="fas fa-home"></i> <a href="../html/home.html">Home</a></li>
            <li><i class="fa-solid fa-couch"></i> <a href="livingroom.php">Products</a></li>
            <li><a href="cartpage.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
        </ol>
    </nav>     

    <section class="cart_section">
        <div class="container">
            <h2 class="section_title">Your Shopping Cart</h2>
            <div class="cart_grid">
                <div class="checkoutitems_section">
                    <?php if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>

                        <div class="cart-items-grid">
                       <?php foreach($_SESSION['cart'] as $key => $item):

    $subtotal = $item['price'] * (isset($item['quantity']) ? $item['quantity'] : 1);
    $total += $subtotal;

?>
                        <div class="cart_item" style="grid-template-columns: 1fr 1fr 0.5fr 1fr; align-items: center; border-bottom: 1px solid #eee; padding: 10px 0;padding-left:10px;padding-right:10px;">
                            <div style="display:flex; align-items:center; gap:10px;">
                                <img src="../pictures/<?php echo $item['prod_image']; ?>" alt="Product Cover"
                                     style="width:60px; height:70px; object-fit:cover; border-radius:4px;">
                            </div>  
                            <div>
                                <p style="font-weight:600;"><?php echo htmlspecialchars($item['prodname']); ?></p>
                            </div>
                            <div style="text-align:center;">
                                <p><?php echo isset($item['quantity']) ? $item['quantity'] : 1; ?></p>
                            </div>
                            <div style="text-align:right;">
                                <strong>KSh <?php echo number_format($subtotal); ?></strong><br>
                                <a href="remove_item.php?id=<?php echo $key; ?>" class="remove_link" style="color:red; font-size:12px;">Remove</a>
                            </div>
                        </div>
                        
                        <?php endforeach; ?>
                    </div>

                        <div style="margin-top:20px;display:inline-flex; gap:800px;align-items:center; width:auto;">
                            <a href="furniture.php" class="checkout_btn"  style="display:inline-block; width:auto; padding:12px 24px;">
                                <i class="fas fa-arrow-left"></i> Continue Shopping
                            </a>
                            <a href="receipt.php"class="checkout_btn"  style="display:inline-block; width:auto; padding:12px 24px;"><i class="fas fa-arrow-right"></i> Generate receipt</a>
                        </div>

                    <?php else: ?>
                        <div style="text-align: center; padding: 3rem; background: white; border-radius: 10px;">
                            <i class="fas fa-shopping-basket" style="font-size: 48px; color: #cbd5e1; margin-bottom: 16px;"></i>
                            <p>Your cart is currently empty.</p>
                            <a href="furniture.php" class="checkout_btn"
                               style="display: inline-block; width: auto; padding: 12.8px 32px; text-decoration:none; margin-top:10px;">
                               Go Shopping
                            </a>
                        </div>
                    <?php endif; ?>
                </div>


            </div>    
        </div>
    </section>

    <footer style="text-align:center; margin-top: 50px;">
        <p>&copy 2026 Moving out budget list. All rights reserved.</p> 
    </footer>
</body>
</html>