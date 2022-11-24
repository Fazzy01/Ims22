<?php include_once "server.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SALES PAGE</title>
    <link rel="stylesheet" href="sales.css">
</head>
<body>
    <div class="container">
        <h2>Sale Form</h2>
        <form action="process.php" method="get">
            <select name="staff" id="">
                <option value="Select">Select Staff</option>
                <option value="Al-amin Bin Ahmad">Al-amin Bin Ahmad</option>
                <option value="Kabir Usman">Kabir Usman</option>
                <option value="Amina Sabo Abdul">Amina Sabo Abdul</option>
            </select><br><br>
            <input type="text" placeholder="Customer Name" name="cname"><br><br>
            <input type="text" placeholder="Customer Address" name="caddress"><br><br>
            <input type="text" placeholder="Customer Phone" name="cphone"><br><br>
            <select name="product" id="">
                <option value="Select">Select Product</option>
                <?php  
                $query = "SELECT * FROM product";
                $result = mysqli_query($server, $query);
                while($row=mysqli_fetch_assoc($result)): ?>
                 <option value="<?php echo $row['product_name']; ?>"><?php echo $row['product_name'].'-N'.$row['product_price']; ?></option>
                <?php endwhile; ?>
            </select><br><br>
            <input type="number" placeholder="Quantity" name="qty"><br><br>
            <input type="number" placeholder="Price" name="price"><br><br>
            <select name="paymode" id="">
                <option value="Mode">Mode of Payment</option>
                <option value="Cash">Cash</option>
                <option value="Transfer">Transfer</option>
                <option value="POS">POS</option>
            </select><br><br>
            <button name="sale">Process Order</button>

        </form>
    </div>
</body>
</html>