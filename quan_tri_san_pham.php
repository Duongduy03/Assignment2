<?php
    require_once('db.php');
    
    $sql = 'select * from products';
    $statement = $connect -> prepare($sql);
    $statement->execute();
    $products = $statement->fetchAll();

    $sql2 = 'select * from categories';
    $statement2 = $connect -> prepare($sql2);
    $statement2->execute();
    $categories = $statement2->fetchAll();

    
    if(isset($_POST['btn_search'])){
     
     
     
     
     
        $item = $_POST['item'] ;
    $sql3 = "(SELECT * FROM products p INNER JOIN categories c on p.category_id = c.id WHERE c.name = '$item')";
    
    
   
    $statement3 = $connect -> prepare($sql3);
    $statement3->execute();
    $pro = $statement3->fetchAll();
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
        <h1>Quản trị sản phẩm</h1>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>descripition</th>
                    <th>color</th>
                    <th>price</th>
                    <th>image_url</th>
                    <th>category_id</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($products as $key => $value):?>
                    <tr>
                        <td>
                            <?= $value['id']?>     
                    </td>
                        <td><?= $value['name']?>
                     
                    </td>
                        <td><?= $value['descripition']?>
                       
                    </td>
                        <td><?= $value['color']?>
                       
                    </td>
                        <td><?= $value['price']?>
                         
                    </td>
                    <td>

                        <img src="
                        <?= $value['image_url'] ?>
                        " alt="">
                      
                    </td>
                        <td><?= $value['category_id']?>
                    </td>
                    <td>
                        <a href="chinh_sua_sp.php?id=<?= $value['id']?>">
                            <button class="btn btn-warning">Sửa</button>
                         
                        </a>
                        <a href="xoa.php?id=<?= $value['id']?>">
                            <button class="btn btn-danger">Xóa</button>
                        </a>
                    </td>
                      
                    </tr>
                    <?php endforeach ?>
            </tbody> 
        </table>
        <form action="danhsachsp.php" method="POST">
            <div class="timkiem">
                <select name="item" id="">
                    <option value="" hidden></option>
                    <option value="1" >Tất cả</option>
                    <?php foreach ($categories as $field => $value2) : ?>
                        <option value="<?=$value2['name']?>"><?=$value2['name']?></option>
                        
                    <?php endforeach ?>
                </select>
                <span>
                    <button name="btn_search" type="submit">Tìm kiếm</button>
                </span>
            </div>
        </form>

        <?php if(isset($pro)) : ?>
            <table class="table table-hover">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>descripition</th>
                    <th>color</th>
                    <th>price</th>
                    <th>image_url</th>
                    <th>category_id</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php foreach($pro as $value3):?>
                    <tr>
                        <td>
                            <?= $value3['id']?>     
                    </td>
                        <td><?= $value3['name']?>
                     
                    </td>
                        <td><?= $value3['descripition']?>
                       
                    </td>
                        <td><?= $value3['color']?>
                       
                    </td>
                        <td><?= $value3['price']?>
                         
                    </td>
                    <td>

                        <img src="
                        <?= $value3['image_url'] ?>
                        " alt="">
                      
                    </td>
                        <td><?= $value3['category_id']?>
                    </td>
                        
                      
                    </tr>
                    <?php endforeach ?>
            </tbody>
        </table>
        <?php endif ?>
        <a href="tao_moi_sp.php">
             <button class="btn btn-primary" >Tạo mới</button> 
        </a>
     
    </div>
</body>
</html>
