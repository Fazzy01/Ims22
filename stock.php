<?php
 include "server.php";
// if(isset($_SESSION['msg_type'])){
//     echo "<script>alert('Product Added Successful...')</script>";
    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Stock</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></head>
<body>
<?php if(isset($_SESSION['message'])):  ?>
        <div class="alert alert-<?php echo $_SESSION['msg_type']; ?>"><p><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></p></div>
        <?php 
        
    endif; ?>
    <?php include_once "header.php";  ?>
    <div class="fluid-container">
        <h2 class="text-center">Stock</h2>
    <table class="table">
  <thead class="table-dark">
    <div class="row">
        <th>S/No.</th>
        <th>Product_Name</th>
        <th>Category</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total</th>
        <th colspan="2" class='text-center'>Action</th>
    </div>
  </thead>
  <tbody>
      <?php
      $sno = 1;
      $query = "SELECT * FROM product";
      $result = mysqli_query($server, $query);

      while($row=mysqli_fetch_assoc($result)): ?>


      
      
  <div class="row">
    <tr>
        <td><?php echo $sno++;  ?></td>
        <td><?php echo $row['product_name'];  ?></td>
        <td><?php echo $row['product_category'];  ?></td>
        <td><?php echo $row['product_qty'];  ?></td>
        <td><?php echo $row['product_price'];  ?></td>
        <td><?php echo ($row['product_qty']*$row['product_price']); ?></td>
        <td class="col-1">
            <a href="add_product.php?edit=<?php echo $row['id']; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit</a>
        </td>
        <td class="col-1">
            <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i>&nbsp;&nbsp;Delete</a>
        </td>
    </tr>
   
  </div>
  <?php  endwhile; ?>
  </tbody>
</table>
    </div>
</body>
</html>