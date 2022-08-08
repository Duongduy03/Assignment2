
<?php
// 1. Đưa connect vào
require_once('db.php');
// 2. Định nghĩa câu truy vấn
if(!isset($_GET['id']) || $_GET['id']===""){
    // Nếu không tồn tại id trên url thì quay về danh sách
    header("location: quan_tri_user.php.php");
}
$product_id = $_GET['id'];
$sql = "select * from products where id = $product_id";
// 3. Nạp truy vấn
$statement = $connect->prepare($sql);
// 4. Thực thi
$statement->execute();
// 5. Lấy dữ liệu
$products = $statement->fetch();
// Sử dụng fetch để lấy ra 1 phần tử thay vì fetchALL lấy ra mảng phẩn tử
if($products == false){
    header("location: quan_tri_san_pham.php");
}

    if(isset($_POST['btn-update'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $des = $_POST['descripition'];
        $color = $_POST['color'];
        $price = $_POST['price'];
        $img = $_POST['image_url'];
        $category_id = $_POST['category_id'];
     
        $sql = "UPDATE products
                    set name='$name',descripition = '$des',color = '$color',price = '$price',image_url = '$img',category_id = '$category_id'
                where id = '$id';
                ";
        $statement = $connect->prepare($sql);
        $statement->execute();
        header('location: quan_tri_san_pham.php');
    }
      
      


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <title>Phòng ban + bootstrap</title>
    <style>
        button{
            margin: 10px 0px;
        }
    </style>
</head>
<body>
<div class="container">
                <h1>Form sửa danh mục</h1>
                <form action="chinh_sua_sp.php" method="POST">
                <input type="hidden" name="id" value="<?= $products['id']?>">
                    <div class="form-group">
                        <label for="">Tên danh mục</label>
                        <input type="text" name="name" class="form-control" value="<?= $products['name']?>">
                    </div>
                    <div class="form-group">
                        <label for="">Mô tả</label>
                        <input type="text" name="descripition" class="form-control" value="<?= $products['descripition']?>">
                    </div>
                    <div class="form-group">
                        <label for="">Màu sắc</label>
                        <input type="text" name="color" class="form-control" value="<?= $products['color']?>">
                    </div>
                    <div class="form-group">
                        <label for="">Giá</label>
                        <input type="number" name="price" class="form-control" value="<?= $products['price']?>" min="0" step="5000">
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh</label>
                        <input type="file" name="image_url" class="form-control" value="<?= $products['image_url']?>">
                    </div>
                    <div class="form-group">
                        <label for="">Danh mục id</label>
                        <input type="number" name="category_id" class="form-control" value="<?= $products['category_id']?>" min="0" step="1">
                    </div>
                    
                   
                   
                  
                    <div>
                        <button type="submit" class="btn btn-primary" name="btn-update">Cập nhật</button>
                        <button type="reset" class="btn btn-warning">Nhập lại</button>
                    </div>
                </form>

        </div>
</body>
</html>