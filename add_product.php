<?php include "process.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<?php include_once "header.php";  ?>
    <div class="container">
    <?php// include "process.php";?>
        <?php if($update==true):  ?>
            <h2>Update Product</h2>
        <?php else:  ?>

            <h2>Add Product</h2>
        <?php endif; ?>
        <div id="content">
           
              
                
             <form action="add_product.php" method="get">
                 <input type="hidden" name="id" value="<?php echo $id; ?>">
                 <input type="text" placeholder="Enter  Product Name" name="product" value="<?php echo $product; ?>"><br><br>
                <input type="text" placeholder="Enter Category" name="category" value="<?php echo $category;  ?>"><br><br>
                <input type="text" name="qty" id="" placeholder="Enter Quantity" value="<?php echo $qty; ?>"><br><br>
                <input type="text" name="price" id="" placeholder="Enter Unit Price" value="<?php echo $price; ?>"><br><br>
                <?php if($update==true):  ?>
                    <button name="btn_update">Update</button>
                <?php else:  ?>
                    <button name="btn_add">Add</button>
                <?php endif; ?>
            </form>
                
        </div>
        
    </div>
</body>
</html>