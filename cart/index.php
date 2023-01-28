<?php 
    require_once("../required/verify_login.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>

<body>

    <h1>Cart</h1>
    <p>Total des achats : <?php echo $_SESSION['cart_total'];?></p>
    <a href="../products/index.php">Products</a>
    <a href="../auth/logout.php">Logout</a>


    <table>
    <?php


        foreach($_SESSION['cart'] as $item){
            echo "<tr>";
            echo "<td><h1>".$item["name"]."</h1></td>";
            echo "<td><h1>".$item["price"]."</h1></td>";
            echo "<td><h1>".$item["quantity"]."</h1></td>";
            echo "<td><h1>".$item["total"]."</h1></td>";
            echo "<td><a href='../cart/delete.php?id=".$item['id']."'>Delete</a></td>";
            echo "</tr>";
        }
    ?>
</table>

<a href="checkout.php">Checkout</a>
</body>

</html>