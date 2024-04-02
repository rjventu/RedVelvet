<?php include("includes/admin-orders.inc.php");?>

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
      <div class="row product-listing-table mx-1 p-4">
        <div class="col">
          <table class="table" id="admin-orders-table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th scope="col">View</th>
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
                    <td>" . $row["order_date"] . "</td>
                    <td>" . $row["order_status"] . "</td>
                    <td class='rc-links pt-2'>"?>
                      <a href='admin-orders-view.php?id=<?= $row["order_id"] ?>'><i class='bi bi-eye-fill'></i></a>
                    <?php "</td>
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

<script>
  $(document).ready(function() {
    $('#admin-orders-table').DataTable();
  });
</script>

</html>

