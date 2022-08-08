
<?php
// 1. Đưa connect vào
require_once('db.php');
// 2. Định nghĩa câu truy vấn
if(!isset($_GET['id']) || $_GET['id']===""){
    // Nếu không tồn tại id trên url thì quay về danh sách
    header("location: quan_tri_user.php.php");
}
$user_id = $_GET['id'];
$sql = "select * from user where id = $user_id";
// 3. Nạp truy vấn
$statement = $connect->prepare($sql);
// 4. Thực thi
$statement->execute();
// 5. Lấy dữ liệu
$user = $statement->fetch();
// Sử dụng fetch để lấy ra 1 phần tử thay vì fetchALL lấy ra mảng phẩn tử
if($user == false){
    header("location: quan_tri_user.php");
}

    if(isset($_POST['btn-update'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $password = $_POST['password'];
     
        $sql = "UPDATE user
                    set name='$name',password='$password'
                where id = '$id';
                ";
        $statement = $connect->prepare($sql);
        $statement->execute();
        header('location: quan_tri_user.php');
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
                <h1>Form sửa</h1>
                <form action="chinh_sua_user.php" method="POST">
                <input type="hidden" name="id" value="<?= $user['id']?>">
                    <div class="form-group">
                        <label for="">Tên đăng nhập</label>
                        <input type="text" name="name" class="form-control" value="<?= $user['name']?>">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="text" name="password" class="form-control" value="<?= $user['password']?>">
                    </div>
                   
                   
                  
                    <div>
                        <button type="submit" class="btn btn-primary" name="btn-update">Cập nhật</button>
                        <button type="reset" class="btn btn-warning">Nhập lại</button>
                    </div>
                </form>

        </div>
</body>
</html>