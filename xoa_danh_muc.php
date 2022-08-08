<?php
    require_once('db.php');
    $category_id = $_GET['id'];
    $sql = "DELETE FROM categories where id = $category_id";
    $statement = $connect -> prepare($sql);
    $statement->execute();
    header('location:quan_tri_danh_muc.php');
?>