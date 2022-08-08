
<?php
// 1. Đưa connect vào
require_once('db.php');
// 2. Định nghĩa câu truy vấn
if(!isset($_GET['id']) || $_GET['id']===""){
    // Nếu không tồn tại id trên url thì quay về danh sách
    header("location: quan_tri_user.php.php");
}
$category_id = $_GET['id'];
$sql = "select * from categories where id = $category_id";
// 3. Nạp truy vấn
$statement = $connect->prepare($sql);
// 4. Thực thi
$statement->execute();
// 5. Lấy dữ liệu
$category = $statement->fetch();
// Sử dụng fetch để lấy ra 1 phần tử thay vì fetchALL lấy ra mảng phẩn tử
if($category == false){
    header("location: quan_tri_danh_muc.php");
}

    if(isset($_POST['btn-update'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
    
     
        $sql = "UPDATE categories
                    set name='$name'
                where id = '$id';
                ";
        $statement = $connect->prepare($sql);
        $statement->execute();
        header('location: quan_tri_danh_muc.php');
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
                <form action="chinh_sua_danh_muc.php" method="POST">
                <input type="hidden" name="id" value="<?= $category['id']?>">
                    <div class="form-group">
                        <label for="">Tên danh mục</label>
                        <input type="text" name="name" class="form-control" value="<?= $category['name']?>">
                    </div>
                    
                   
                   
                  
                    <div>
                        <button type="submit" class="btn btn-primary" name="btn-update">Cập nhật</button>
                        <button type="reset" class="btn btn-warning">Nhập lại</button>
                    </div>
                </form>

        </div>
</body>
</html>