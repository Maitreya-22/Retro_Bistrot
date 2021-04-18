
<?php 

//index.php

$connect = new PDO("mysql:host=localhost;dbname=test", "root", "");

$message = '';

if(isset($_POST["add_to_cart"]))
{
 if(isset($_COOKIE["shopping_cart"]))
 {
  $cookie_data = stripslashes($_COOKIE['shopping_cart']);

  $cart_data = json_decode($cookie_data, true);
 }
 else
 {
  $cart_data = array();
 }

 $item_id_list = array_column($cart_data, 'item_id');

 if(in_array($_POST["hidden_id"], $item_id_list))
 {
  foreach($cart_data as $keys => $values)
  {
   if($cart_data[$keys]["item_id"] == $_POST["hidden_id"])
   {
    $cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $_POST["quantity"];
   }
  }
 }
 else
 {
  $item_array = array(
   'item_id'   => $_POST["hidden_id"],
   'item_name'   => $_POST["hidden_name"],
   'item_price'  => $_POST["hidden_price"],
   'item_quantity'  => $_POST["quantity"]
  );
  $cart_data[] = $item_array;
 }

 
 $item_data = json_encode($cart_data);
 setcookie('shopping_cart', $item_data, time() + (86400 * 30));
 header("location:new.php?success=1");
}

if(isset($_GET["action"]))
{
 if($_GET["action"] == "delete")
 {
  $cookie_data = stripslashes($_COOKIE['shopping_cart']);
  $cart_data = json_decode($cookie_data, true);
  foreach($cart_data as $keys => $values)
  {
   if($cart_data[$keys]['item_id'] == $_GET["id"])
   {
    unset($cart_data[$keys]);
    $item_data = json_encode($cart_data);
    setcookie("shopping_cart", $item_data, time() + (86400 * 30));
    header("location:new.php?remove=1");
   }
  }
 }
 if($_GET["action"] == "clear")
 {
  setcookie("shopping_cart", "", time() - 3600);
  header("location:new.php?clearall=1");
 }
}

if(isset($_GET["success"]))
{
 $message = '
 <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Item Added into Cart
 </div>
 ';
}

if(isset($_GET["remove"]))
{
 $message = '
 <div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  Item removed from Cart
 </div>
 ';
}
if(isset($_GET["clearall"]))
{
 $message = '
 <div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  Your Shopping Cart has been clear...
 </div>
 ';
}


?>

<!DOCTYPE html>
<html>
 <head>
     <link rel="stylesheet" href="css/login.css">
  <title>Webslesson Demo | Simple PHP Mysql Shopping Cart</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
     body{
         position:relative;
        
     }
.cta-home{
    display:flex;
    align-items:center;
    justify-content:center;
    text-transform:uppercase;
    font-weight:400;
    font-size:15px;
    color:white;
    padding:10px 15px;
    background-color:#251f47;
    border-radius:20px;
    width:25%;
    position:absolute;
    left:50%;
    top:20px;
    transform:translate(-50%);
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    letter-spacing:1px;
    line-height:1;
    transition:all ease-in-out 500ms;
}
.cta-home:hover{
    color:grey;
    cursor:pointer;

}
.form-control{
    width:98px;
    text-align:center;
    border:none;
    outline:none;
   
}
.order{
    text-align:center;
    text-transform:uppercase;
    font-weight:400;
    font-size:15px;
    color:white;
    padding:10px 15px;
    background-color:#251f47;
    border-radius:20px;
    width:25%;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    letter-spacing:1px;
    line-height:1;
    transition:all ease-in-out 500ms;
}
.order:hover{
    color:grey;
    cursor:pointer;

}

.order-div{
    width:100%;
    display:flex;
    align-items:center;
    justify-content:center;
}

.show-modal{
    display:none;
}

.ok{
    position:absolute;
    top:60%;
    left:50%;
    transform:translate(-50%);
    background-color:white;
    color:#251f47;
    border:none;
    outline:none;
}
.ok a{
    text-decoration:none;
}

  </style>
 </head>
 <body style="background-color:#afcbff;">

<a href="index.php" class="cta-home" style="text-decoration:none;"><i class="fas fa-arrow-left fa-1.5x"></i> &nbsp Back to Home</a>
  <br />
  <div class="container">
   <br />
   
   <br /><br />
   <?php
   $query = "SELECT * FROM tbl_product ORDER BY id ASC";
   $statement = $connect->prepare($query);
   $statement->execute();
   $result = $statement->fetchAll();
   foreach($result as $row)
   {
   ?>
   <div class="col-md-5 col-lg-6" style="margin-bottom:20px;">
    <form method="post">
     <div style=" box-shadow:white; background-color:#251f47; border-radius:5px; padding:16px;" align="center">
      <img src="images/<?php echo $row["image"]; ?>" class="img-responsive" / style="height:300px;"><br />

      <h44 class="text-info" style="color:beige; font-size:18px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;"><?php echo $row["name"]; ?></h44>&nbsp &nbsp &nbsp &nbsp

      <h44 class="text-danger"  style="color:green; background:white; padding:10px; border-radius:8px;">$ <?php echo $row["price"]; ?></h44>
      &nbsp
      <h44 class="text-danger"  style="color:green; background:white; padding:10px; border-radius:8px;"><i class="fas fa-star"></i> <?php echo $row["star"]; ?></h44>
<br><br>
      <input type="number" name="quantity" value="1" class="form-control" />
      <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
      <input type="hidden" name="hidden_price"  value="<?php echo $row["price"]; ?>" />
      <input type="hidden" name="hidden_id" value="<?php echo $row["id"]; ?>" />
      <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
     </div>
    </form>
   </div>
   <?php
   }
   ?>
   
   
   <div style="clear:both"></div>
   <br />
   <h3>Order Details</h3>
   <div class="table-responsive">
   <?php echo $message; ?>
   <div align="right">
    <a href="new.php?action=clear"><b>Clear Cart</b></a>
   </div>
   <table class="table table-bordered " style="background-color:#251f47; color:white">
    <tr>
     <th width="40%">Item Name</th>
     <th width="10%">Quantity</th>
     <th width="20%">Price</th>

     <th width="15%">Total</th>
     <th width="5%">Action</th>
    </tr>
   <?php
   if(isset($_COOKIE["shopping_cart"]))
   {
    $total = 0;
    $cookie_data = stripslashes($_COOKIE['shopping_cart']);
    $cart_data = json_decode($cookie_data, true);
    foreach($cart_data as $keys => $values)
    {
   ?>
    <tr>
     <td><?php echo $values["item_name"]; ?></td>
     <td><?php echo $values["item_quantity"]; ?></td>
     <td>$ <?php echo $values["item_price"]; ?></td>
     <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
     <td><a href="new.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
    </tr>
   <?php 
     $total = $total + ($values["item_quantity"] * $values["item_price"]);
    }
   ?>
    <tr>
     <td colspan="3" align="right">Total</td>
     <td align="right">$ <?php echo number_format($total, 2); ?></td>
     <td></td>
    </tr>
   <?php
   }
   else
   {
    echo '
    <tr>
     <td colspan="5" align="center">No Item in Cart</td>
    </tr>
    ';
   }
   ?>
   </table>
   </div>
  </div>
  <br/>
  <div class="order-div"> 
  <div class='modal-bg show-modal'>

        <span class='err-modal'>Order Placed.
        <button class='err-close'>X</button>
        <br><br>
        <button class="ok"><a href="index.php">OK</a></button>
        </span>
        </div>
  <a href="#" class="order"  style="text-decoration:none;"><i class="fas fa-cart-plus fa-1.5x"></i> &nbsp Place Order</a>
</div> <br><br><br>
</body>
<script src="js/error-handler.js"></script>
</html>
