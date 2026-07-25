<?php
session_start();
include("connection.php");

$sql = "SELECT * FROM products WHERE category='Cleaning'";
$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Products - Cleaning</title>
    <link rel ="stylesheet" href="../css/products.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <h3>Move-In Budget</h3>

        <ol>
            <li><a href="../html/home.html"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="furniture.php"><i class="fas fa-couch"></i> Products</a></li>
            <li><a href="cartpage.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
        </ol>
    </nav>
    <div class="section-title"><h2>Cleaning products</h2></div>
        <section class="products_page">
            <aside class="categories">
                <h2>Categories</h2>
                <ul>
                    <li><i class="fas fa-chevron-right"></i> <a href="furniture.php">Furniture</a></li>
                    <li><i class="fas fa-chevron-right"></i> <a href="electronics.php">Electronics</a></li>
                    <li><i class="fas fa-chevron-right"></i> <a href="textiles.php">Textiles</a></li>
                    <li><i class="fas fa-chevron-right"></i> <a href="utensils.php">Utensils</a></li>
                    <li><i class="fas fa-chevron-right"></i> <a href="cleaning.php">Cleaning</a></li>
                </ul>
            </aside>
           <div class = "products_container">
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <form method="post" action="cart.php">
                <div class="furniture_card">
                    <img src="../pictures/<?php echo $row['prod_image']; ?>">
                    <div class="furniture_info">
                        <h3><?php echo $row['prodname']; ?></h3>
                        <p><?php echo $row['descr']; ?></p>
                        <p class="price">Ksh <?php echo number_format($row['price']); ?></p>

                        <input type="hidden" name="prodid" value="<?php echo $row['prodid']; ?>">
                        <input type="hidden" name="return_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">

                        <button type="submit" name="add_to_cart">Add to Cart</button>
                    </div>
                </div>
            </form>
        <?php endwhile; ?>
        </div>
        </section>
<p style="text-align:center;background-color: #90e0ef; padding: 23px;margin:auto">
    &copy 2026 Moving out budget list. All rights reserved.
</p>

</body>
</html>