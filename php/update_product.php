
<?php
include("connection.php");

$id = $_POST['id'];
$name = $_POST['pname'];
$descr = $_POST['descr'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$prod_image = $_POST['prod_image'];

$sql = "UPDATE products SET 
        prodname='$name',
        descr='$descr',
        quantity='$quantity',
        price='$price',
        prod_image='$prod_image'
        WHERE prodid=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: report_product.php");
} else {
    echo "Error updating record";
}
?>