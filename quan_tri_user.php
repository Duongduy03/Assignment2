<?php
    require_once('db.php');
    $sql = 'select * from user';
    $statement = $connect->prepare($sql);
    $statement->execute();
    $user = $statement ->fetchAll();


  
 
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
        a{
            text-decoration: none;
        }
        img{
            width: 200px;
        }
    </style>
</head>
<body>
    <div class="container">
     
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>Password</th>
                    <th>Chức năng</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php foreach($user as $key => $value):?>
                    <tr>
                        <td>
                            <?= $value['id']?>     
                    </td>
                        <td><?= $value['name']?>
                     
                    </td>
                        <td><?= $value['password']?>
                       
                    </td>
                    <td>
                    <a href="chinh_sua_user.php?id=<?= $value['id']?>">
                                <button class="btn btn-secondary">
                                    Chỉnh sửa
                                </button>
                            </a>
                           
                    </td>
                       
                       
                    
                  
                     
                        
                      
                    </tr>
                    <?php endforeach ?>
            </tbody>
        </table>
     
  
        <a href="them_moi_user.php">
             <button class="btn btn-primary" >Thêm mới</button> 
        </a>
    </div>
</body>
</html>