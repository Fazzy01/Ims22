<?php
include "server.php";

$product = "";
$category = "";
$qty = "";
$price = "";
$update = false;


//Add to product table section
if(isset($_GET['btn_add'])){
    $product = $_GET['product'];
    $category = $_GET['category'];
    $quantity = $_GET['qty'];
    $price = $_GET['price'];
   

   $query = "INSERT INTO product (product_name,	product_category,	product_qty,	product_price) VALUES ('$product', '$category', '$quantity', '$price')";
   $result = mysqli_query($server, $query);
   $_SESSION['message'] = "Product Added Successfully...";
   $_SESSION['msg_type'] = "success";

   if($result){
       
       header("location: stock.php");
   }
}

//DELETE SECTION    
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $query = "DELETE FROM product WHERE id='$id'";
    $result = mysqli_query($server, $query);
    $_SESSION['message'] = "Product Deleted Successfully...";
    $_SESSION['msg_type'] = "danger";
    header("location: stock.php");
}

//EDIT SECTION WHEN EDIT BUTTON CLICKED
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;

    $query = "SELECT * FROM product WHERE id='$id'";
    $result = mysqli_query($server, $query);
    $row = mysqli_fetch_array($result);
        $product = $row['product_name'];
        $category = $row['product_category'];
        $qty = $row['product_qty'];
        $price = $row['product_price'];
}

//UPDATE SECTION WHEN UPDATE BUTTON CLICKED
if(isset($_GET['btn_update'])){
    $id = $_GET['id'];
    $product = $_GET['product'];
    $category = $_GET['category'];
    $quantity = $_GET['qty'];
    $price = $_GET['price'];

    $query = "UPDATE product SET product_name='$product', product_category='$category', product_qty='$quantity', product_price='$price' WHERE id='$id'";
    $result = mysqli_query($server, $query);
    $_SESSION['message'] = "Product Updated Successfully...";
    $_SESSION['msg_type'] = "success";
    if($result){
        
        header("location: stock.php");
    }
}


//SALES SECTION WHEN PROCESS ORDER BUTTON CLICKED
if(isset($_GET['sale'])){
    //variables Declaration
    $staff = $_GET['staff'];
    $customerName = $_GET['cname'];
    $customerAddress = $_GET['caddress'];
    $customerPhone = $_GET['cphone'];
    $product = $_GET['product'];
    $quantity = $_GET['qty'];
    $price = $_GET['price'];
    $modeOfPay = $_GET['paymode'];
    $total =  $quantity*$price;
    $date = date("d, F, Y, h:i:s");

    // echo $date;
    $query = "INSERT INTO sales (staff, customer_name, customer_address,	product_name,	customer_phone,	quantity,	product_price,	total,	date, modeOfPay) VALUES ('$staff', '$customerName', '$customerAddress', '$product',  '$customerPhone', '$quantity', '$price', '$total', '$date', '$modeOfPay')";
    $result = mysqli_query($server, $query);
    if($result){
        $sql = "SELECT * FROM product WHERE product_name = '$product' AND product_price='$price'";
        $res = mysqli_query($server, $sql);
        $row = mysqli_fetch_assoc($res);

        $id = $row['id'];
        //echo $id;
        $newQty = ($row['product_qty'])-$quantity;

        $query = "UPDATE product SET product_qty=$newQty WHERE id=$id";
        $result = mysqli_query($server, $query);

        header("location: invoice.php");
    }



}



?>