<?php
    require_once('db.php');
    if(isset($_POST['btn-creat'])){
        $name = $_POST['name'];
       
     
        
        $sql = "INSERT INTO categories(name)"."values('$name')";
        $statement = $connect -> prepare($sql);
        $statement->execute();
        header('location:quan_tri_danh_muc.php');
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
                <h1>Form thêm mới</h1>
                <form action="them_moi_danh_muc.php" method="POST">
              
                    <div class="form-group">
                        <label for="">Tên danh mục</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                  
                  
                  
                    
                   
                    <div>
                        <button type="submit" class="btn btn-primary" name="btn-creat">Tạo mới</button>
                        <button type="reset" class="btn btn-warning">Nhập lại</button>
                    </div>
                </form>

        </div>
</body>
</html>l