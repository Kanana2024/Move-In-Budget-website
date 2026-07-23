<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Move-In Budget</title>
    <link rel ="stylesheet" href="../css/products.css">
    <link rel ="stylesheet" href="../css/receipt.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.6/dist/JsBarcode.all.min.js"></script>

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
    <section>

        <main class="receipt">
        
        <div class="receipt-header">Your Receipt</div>
        <div class="receipt-subheader">MOVE-IN BUDGET</div>
        
        <div class="divider"></div>

        <?php
            $total = 0;
            $categoryTotals = [];

            foreach ($_SESSION['cart'] as $item) {

                $quantity = isset($item['quantity']) ? $item['quantity'] : 1;
                $subtotal = $item['price'] * $quantity;

                $total += $subtotal;

                $category = $item['category'];

                if (!isset($categoryTotals[$category])) {
                    $categoryTotals[$category] = 0;
                }

                $categoryTotals[$category] += $subtotal;
            }
        ?>

        <div class="table-header">
            <span>Category</span>
            <span>Total</span>
        </div>

        <?php foreach ($categoryTotals as $category => $amount): ?>
        <div class="receipt-item">
            <span><?php echo htmlspecialchars($category); ?></span>
            <span>KSh <?php echo number_format($amount); ?></span>
        </div>
        <?php endforeach; ?>

        <div class="dashed-divider"></div>

        <div class="receipt-total">
            <span>Grand Total</span>
            <span>KSh <?php echo number_format($total); ?></span>
        </div>
        <div class="divider"></div>
    
        <!-- Dynamic/Styled Barcode -->
        
        <div class="barcode-container">
            <div>THANK YOU FOR VISITING</div>
            <svg id="barcode"></svg>
        </div>

        <script>
            JsBarcode("#barcode", "123456789012", {
                format: "CODE128",
                width: 2,
                height: 100,
                displayValue: true,
                lineColor: "#E05286" 
            });
        </script>
         </main>
    </section>
    <p style="text-align:center;background-color: #90e0ef; padding: 19px;margin:auto">
&copy 2026 Moving out budget list. All rights reserved.
</p>
    </body>
</html>
