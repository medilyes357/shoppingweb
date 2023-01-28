<?php 
    require_once("../required/verify_login.php");
    require_once("../required/connexion.php");
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

    <h1>Products</h1>
    <p>Total des achats : <?php echo $_SESSION['cart_total'];?></p>
    <a href="../cart/index.php">View Cart</a>
    <a href="../auth/logout.php">Logout</a>


    <table>
    <?php

        $sql = "SELECT * FROM products";
        $result = mysqli_query($con, $sql);

        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td><h1>".$row["name"]."</h1></td>";
            echo "<td><h1>".$row["price"]."</h1></td>";
            echo "<td><a href='../cart/add_to_cart.php?id=".$row['id']."'>Add to Cart</a></td>";
            echo "</tr>";
        }
    ?>
</table>

</body>

</html>