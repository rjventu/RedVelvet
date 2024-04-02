<?php
session_start();

if(!isset($_SESSION["adminid"])){
  header("location: admin-login.php");
}
else
{
  $success_msg = $error_msg = "";

  include("classes/Database.class.php");
  include("classes/Order.class.php");
  include("classes/OrderCon.class.php"); 
  include("../main/classes/Item.class.php");
  include("../main/classes/ItemCon.class.php"); 

  if($_SERVER['REQUEST_METHOD'] == 'GET')
  {

    if (!isset($_GET["id"])){
      header('location: admin-panel.php');
      exit();
    }

    $order_id = $_GET["id"];
    $order = new OrderController();
    $result = $order->getRecord($order_id);
    $row = $result->fetch(PDO::FETCH_ASSOC);

    $order_name = $row["order_name"];
    $order_email = $row["order_email"];
    $order_contact = $row["order_contact"];
    $order_add = $row["order_add"];
    $order_date = $row["order_date"];
    $order_pay = $row["order_pay"];
    $order_time = $row["order_time"];
    $order_status = $row["order_status"];

    $item = new ItemController(null,null,null,null,null,$order_id);
    $item_result = $item->getTable();
  }
  else
  {
    // gets values from table
    $order_id = $_POST["order_id"];
    $order = new OrderController();
    $result = $order->getRecord($order_id);
    $row = $result->fetch(PDO::FETCH_ASSOC);

    $order_name = $row["order_name"];
    $order_email = $row["order_email"];
    $order_contact = $row["order_contact"];
    $order_add = $row["order_add"];
    $order_time = $row["order_time"];

    $item = new ItemController(null,null,null,null,null,$order_id);
    $item_result = $item->getTable();

    // gets values from form
    $order_date = $_POST["order_date"];
    $order_pay = $_POST["order_pay"];
    $order_status = $_POST["order_status"];
    
    $order_change = new OrderController($order_id, null, null, null, null, $order_date, $order_pay);
    $order_change->setStatus($order_status);
    $order_change->editOrder();

    $success_msg = "Order edited successfully!";
  }
}
?>

<!doctype html>
<html lang="en">

<!-- Head -->
<?php include("..\main\head-tags.php")?>
  <title>Red Velvet KH - Edit Product</title>
</head>
  
<body>

<!-- Admin Panel Header -->
<?php include("admin-header.php")?>

<section class="signup-wrapper">
    <div class="container-md product-add-container p-5">
      <div class="row mb-4">
        <div class="col">
          <h2 class="text-center">View Order</h2>
        </div>
      </div>
      <div class="row mb-4">
        <div class="col d-flex justify-content-center">
          <!-- Displays error/success message -->
          <?php  
            if(!empty($success_msg)){ 
            ?> 
            <span class="alert alert-success"><?php echo $success_msg; ?></span> 
            <?php  
            }
            if (!empty($error_msg)){
            ?> 
            <span class="alert alert-danger"><?php echo $error_msg; ?></span> 
            <?php  
            }
          ?>
        </div>
      </div>
      <!-- Form -->
      <div class="row">
        <form class="container product-add-form" action="admin-orders-view.php" method="post" enctype="multipart/form-data">
          <input type="number" name="order_id" value="<?php echo $order_id?>" readonly hidden>

          <!-- Customer Details -->
          <div class="mb-5">
            <div class="row mb-3">
              <div class="col">
                <h3 class="admin-order-label">Customer Details</h3>
              </div>
            </div>
  
            <div class="row">
              <div class="col">
                <div class="form-group mb-5">
                  <div class="form-label">Name</div>
                  <input class="disabled-input" type="text" id="order_name" name="order_name" value="<?php echo $order_name; ?>" disabled>
                </div>
              </div>
              <div class="col">
                <div class="form-group mb-5">
                  <div class="form-label">Email</div>
                  <input class="disabled-input" type="email" id="order_email" name="order_email" value="<?php echo $order_email; ?>" disabled>
                </div>
              </div>
            </div>
  
            <div class="row">
              <div class="col">
                <div class="form-group mb-3">
                  <div class="form-label">Contact Number</div>
                  <input class="disabled-input" type="tel" id="order_contact" name="order_contact" value="<?php echo $order_contact; ?>" disabled>
                </div>
              </div>
              <div class="col">
                <div class="form-group mb-3">
                  <div class="form-label">Address</div>
                  <input class="disabled-input" type="text" id="order_add" name="order_add" value="<?php echo $order_add; ?>" disabled>
                </div>
              </div>
            </div>
          </div>

          <!-- Order Details -->
          <div class="mb-5"> 
            <div class="row mb-3">
              <div class="col">
                <h3 class="admin-order-label">Order Details</h3>
              </div>
            </div>
  
            <div class="row mb-4">
              <div class="col">
                <div class="form-group mb-3">
                  <div class="form-label">Order Timestamp</div>
                  <input class="disabled-input" type="datetime-local" id="order_time" name="order_time" value="<?php echo $order_time; ?>" disabled>
                </div>
              </div>
              <div class="col">
                <div class="form-group mb-3">
                  <div class="form-label">Delivery Date</div>
                  <input type="date" id="order_date" name="order_date" value="<?php echo $order_date; ?>">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <div class="form-group mb-3">
                  <div class="form-label">Payment Method</div>
                  <select id="order_pay" name="order_pay">
                    <option value="1" <?=$order_pay == '1' ? ' selected="selected"' : '';?>>ABA Pay</option>
                    <option value="2" <?=$order_pay == '2' ? ' selected="selected"' : '';?>>Cash</option>
                  </select><br>
                </div>
              </div>
              <div class="col">
                <div class="form-group mb-3">
                  <div class="form-label">Status</div>
                  <select id="order_status" name="order_status">
                    <option value="Pending" <?=$order_status == 'Pending' ? ' selected="selected"' : '';?>>Pending</option>
                    <option value="Paid" <?=$order_status == 'Paid' ? ' selected="selected"' : '';?>>Paid</option>
                    <option value="Delivering" <?=$order_status == 'Delivering' ? ' selected="selected"' : '';?>>Delivering</option>
                    <option value="Delivered" <?=$order_status == 'Delivered' ? ' selected="selected"' : '';?>>Delivered</option>
                  </select><br>
                </div>
              </div>
            </div>
          </div>

          <!-- Items Ordered -->
          <div class="mb-5">
            <div class="row mb-3">
              <div class="col">
                <h3 class="admin-order-label">Items Ordered</h3>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="rc-table" id="rc-table">
                  <div class="rc-table-head">
                    <div class="row d-flex ml-3 mr-3 rc-table-title">
                      <div class="col-6 p-0">Name</div>
                      <div class="col-2 p-0" style="text-align: center">Product ID</div>
                      <div class="col-2 p-0" style="text-align: center">Qty</div>
                      <div class="col-2 p-0" style="text-align: right">Subtotal</div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <hr>
                      </div>
                    </div>
                  </div>
                  <div id="rc-table-list">
                    <!-- cart contents go here -->
                    <?php
                      while($row = $item_result->fetch(PDO::FETCH_ASSOC)){
  
                        $variety = $row["item_variety"] == "none" ? "" : " - " . $row["item_variety"];
  
                        echo '
                        <div class="row d-flex ml-2 mr-2 rc-table-item">
                          <div class="col-6 p-2">' . $row["item_name"] . $variety . '</div>
                          <div class="col-2 p-2" style="text-align: center">' . $row["item_id"] . '</div>
                          <div class="col-2 p-2 d-flex justify-content-center" style="font-style: normal">
                          <span> ' . $row["item_qty"] . ' </span>
                          </div>
                          <div class="col-2 p-2" style="text-align: right; font-style: italic">$' .  $row["item_qty"] * $row["item_price"] . '</div>
                        </div>
                        ';
                      }
                    ?>
                  </div>
                  <div class="rc-table-foot" id="rc-table-total">
                    <div class="row">
                      <div class="col">
                        <hr>
                      </div>
                    </div>
                    <div class="row d-flex ml-3 mr-3">
                      <div class="col-6 p-0"></div>
                      <div class="col-3 p-0" style="text-align: center">Total:</div>
                      <div class="col-3 p-0" style="text-align: right">$
                        <?php
                          $total = 0;
                          $item_result = $item->getTable();
                          while($row = $item_result->fetch(PDO::FETCH_ASSOC)){
                            $total = $total + ($row["item_price"] * $row["item_qty"]);
                          }
                          echo $total;                    
                        ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <hr>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">

              <div class="form-group">
                <div class="row d-flex justify-content-center">
                  <input type="submit" name="submit" value="EDIT ORDER" class="btn px-3 py-1" style="width:auto">
                </div> 
                
                <div class="row d-flex justify-content-center">
                  <a class="mt-3" href="admin-orders.php" style="color:gray;">Cancel</a>
                </div>  
              </div>

            </div>
          </div>
        </form>
      </div>
    </div>
</section>

</body>

</html>