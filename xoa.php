<?php
    require_once('db.php');
    $products_id = $_GET['id'];
    $sql = "DELETE FROM products where id = $products_id ";
    $statement = $connect -> prepare($sql);
    $statement->execute();
    header('location: quan_tri_san_pham.php');

    // $category_id = $_GET['id'];
    // $sql1 = "DELETE FROM categories where id = $$category_id";
    // $statement = $connect -> prepare($sql1);
    // $statement->execute();
  
?>