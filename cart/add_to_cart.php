<?php
    require_once("../required/verify_login.php");
    require_once("../required/connexion.php");

    $id_product = $_GET["id"];
    $sql = "SELECT * FROM products WHERE id = $id_product";

    $result = mysqli_query($con, $sql);
    if($row = mysqli_fetch_assoc($result)){

        $exists = false;
        foreach($_SESSION['cart'] as $key => $item ){
            
            if($key == $id_product){
                $_SESSION['cart'][$id_product]['quantity'] = $_SESSION['cart'][$id_product]["quantity"] +1;
                $_SESSION['cart'][$id_product]['total'] = $_SESSION['cart'][$id_product]["quantity"] * $_SESSION['cart'][$key]["price"];
                $exists = true;
                break; 
            }
        }

        if(!$exists){
            $product = array(
                "id" => $row["id"], 
                "name" => $row["name"], 
                "price" => $row["price"], 
                "quantity" => 1, 
                "total" => $row["price"] * 1
            );                    
            $_SESSION['cart'][$id_product] = $product;
        }
        

    }


    $total = 0;
    foreach($_SESSION['cart'] as $key => $item ){
        $total = $total + $item['total'];
    }

    $_SESSION['cart_total'] = $total;


    header("location: ../products/index.php");
