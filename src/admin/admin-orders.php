<?php
session_start();

if(!isset($_SESSION["adminid"])){

  header("location: admin-login.php");

}
else
{

  include("classes/Database.class.php");
  include("classes/Order.class.php");
  include("classes/OrderCon.class.php");


  $order = new OrderController();
  $result = $order->getTable();
}
?>

<!doctype html>
<html lang="en">

<!-- Head -->
<?php include("..\main\head-tags.php")?>
  <title>Red Velvet KH - Admin Panel</title>
</head>
  
<body>

<!-- Admin Panel Header -->
<?php include("admin-header.php")?>


<!-- Admin Panel Sidebar -->
<?php include("admin-sidebar.php")?>
    <div class="col-md-9 content">
      <div class="row mb-4">
        <div class="col">
          <h2>Orders</h2>
        </div>
      </div>
      <div class="row product-listing-table mx-1">
        <div class="col">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Contact</th>
                <th scope="col">Address</th>
                <th scope="col">Date</th>
                <th scope="col">Payment</th>
              </tr>
            </thead>
            <tbody>
              
              <?php
                while($row = $result->fetch(PDO::FETCH_ASSOC)){
                  echo 
                  "<tr>
                    <td>" . $row["order_id"] . "</td>
                    <td>" . $row["order_name"] . "</td>
                    <td>" . $row["order_email"] . "</td>
                    <td>" . $row["order_contact"] . "</td>
                    <td>" . $row["order_add"] . "</td>
                    <td>" . $row["order_date"] . "</td>
                    <td>" ; echo ($row["order_pay"] == 1) ? "ABA Pay" : "Cash"; echo "</td>
                    </tr>";
                }
              ?>
              
            </tbody>
          </table>
        </div>
        
      </div>
    </div>
  </div>
</section>

</body>

</html>

