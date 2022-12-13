<?php
    require_once('db.php');
    // Khởi động

    session_start();
    // Sử dụng biến $_session để kiểm tra
   
    
    if(isset($_POST['btn_login'])){
        $name = $_POST['name'];
        $password = $_POST['password'];
        $sql = "select * from user where name = '$name'";
        $statement = $connect->prepare($sql);
        $statement->execute();
        $loginUser = $statement->fetch();
        // $password_hash = password_hash($password,PASSWORD_BCRYPT);
        if($password == ""){
            $errorsPass ='Bắt buộc nhập mật khẩu';
    
        } 
        if($name == ""){
            $errorsName ='Bắt buộc nhập tên đăng nhập';
        } else 
     
        
            if($loginUser == false){
                $errorsName = 'Thông tin đăng nhập sai!';
                $errorsPass = 'Mật khẩu sai!';
                // 2.2 Nếu có $loginUsser nhưng pass sai
            }
    
    
    // Giá trị mặc định của chuỗi là chuỗi rỗng


            else if(!password_verify($password,$loginUser['password'])){
                $errorsPass = 'Mật khẩu sai2!';
                // 2.3 Đúng thông tin
            }else{
                // Lưu thông tin vào phiên làm việc để các chỗ khsc đều đọc được
                // Nếu kết thúc phiên làm việc hoặc xóa thì mất luôn
                // 2.3.1 khởi động session
                session_start();
                // 2.3.2 Lưu thông tin tài khoản 
                $_SESSION['user'] = $loginUser;
                // Quay về forrm login xem xem có chuea
                header('location: login-form.php');
            }
            // Kiểm tra nếu có lỗi thì quay về màn login kèm lỗi đó 
            
                // Nếu không có lỗi thì bắt đầu công việc của db
                // 1. Lấy ra bản ghi email === email nhập
        
            
    
}
?>
<!-- Nếu trên url có biến errors được truyền vào theo method Get -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        a{
            text-decoration: none;
        }
        input{
            margin:10px 0px;
        }
        button{
            margin: 5px 0px;
        }
    </style>
</head>
<body>
    <div class="container">
       
        <?php
            if(isset($_SESSION['user'])){ ?>

                    <h1>Chào <?= $_SESSION['user']['name']?>!</h1>
                  
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Quản trị</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="quan_tri_user.php">
                                        <button class="btn btn-success">Quản trị user</button>
                                    </a> <br>
                                    <a href="quan_tri_danh_muc.php">
                                    <button class="btn btn-success">Quản trị danh mục</button>
                                    </a> <br>
                                    <a href="quan_tri_san_pham.php">
                                    <button class="btn btn-success">Quản trị sản phẩm</button>
                                    </a>
                                </td>
                            
                            </tr>
                        </tbody>
                    </table>
                    <a href="logout.php">
                                    <button class="btn btn-primary">Đăng xuất</button>
                                </a>
        <?php    } else{?>


        <h1>Đăng nhập</h1>
        <form action="login-form.php" method="POST">
            <input type="text" name="name" class="form-control" placeholder="Nhập tên đăng nhập">
            <div style="color: red;">
            <?php
                if(isset($errorsName)){
                    echo $errorsName;
                }
            ?>
        </div>
            <input type="password" name="password" class="form-control" placeholder="Nhập password">
            <div style="color: red;">
            <?php
                if(isset($errorsPass)){
                    echo $errorsPass;
                }
            ?>
        </div>
            <button type="submit" class="btn btn-primary" name="btn_login">Đăng nhập</button>
        </form>
        <?php }?>
    </div>
      
</body>
</html>
