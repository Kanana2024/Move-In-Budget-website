
<?php
include("connection.php");

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Report</title>
</head>
<body>

<div class="container">

    <div class="header">
        <h2>Product Report</h2>

        <a href="../html/admin.html" class="back-btn">
            ← Back
        </a>
    </div>

    <div class="table-container">

        <table>

            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>

<?php while($row = $result->fetch_assoc()) { ?>

<tr>
    <td><?= $row['prodid']; ?></td>
    <td><?= $row['prodname']; ?></td>
    <td><?= $row['category']; ?></td>
    <td><?= $row['descr']; ?></td>
    <td>Ksh <?= number_format($row['price'],2); ?></td>
    <td><?= $row['quantity']; ?></td>

    <td>
        <img src="../pictures/<?= $row['prod_image']; ?>" class="product-img">
    </td>
    <td>
    <div class="action-buttons">
        <a class="edit-btn" href="edit_product.php?id=<?= $row['prodid']; ?>">Edit</a>
        <a class="delete-btn" href="delete_product.php?id=<?= $row['prodid']; ?>">Delete</a>
    </div>
    </td>
</tr>

<?php } ?>


</table>

</body>
</html>