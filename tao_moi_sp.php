<?php
    require_once('db.php');
    if(isset($_POST['btn-creat'])){
        $name = $_POST['name'];
        $des = $_POST['descripition'];
        $color = $_POST['color'];
        $price = $_POST['price'];
        $img = $_POST['image_url'];
        $category_id = $_POST['category_id'];
     
        
        $sql = "INSERT INTO products(name,descripition, color,price,image_url,category_id)"."values('$name','$des','$color','$price','$img','$category_id')";
        $statement = $connect -> prepare($sql);
        $statement->execute();
        header('location:quan_tri_san_pham.php');
    }
    
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        button{
            margin-top: 10px;
        }
    </style>
</head>
<body>
        <div class="container">
                <h1>Form thêm mới sản phẩm</h1>
                <form action="tao_moi_sp.php" method="POST">
              
                    <div class="form-group">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Mô tả</label>
                        <input type="text" name="descripition" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Màu sắc</label>
                        <input type="text" name="color" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Giá</label>
                        <input type="number" name="price" class="form-control" min="0" step="5000">
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh</label>
                        <input type="file" name="image_url" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Danh mục id</label>
                        <input type="number" name="category_id" class="form-control" min="0" step="1">
                    </div>
                  
                  
                  
                    
                   
                    <div>
                        <button type="submit" class="btn btn-primary" name="btn-creat">Tạo mới</button>
                        <button type="reset" class="btn btn-warning">Nhập lại</button>
                    </div>
                </form>

        </div>
</body>
</html>l