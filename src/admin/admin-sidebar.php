<button
  type="button"
  class="btn-submit btn-floating btn-lg"
  id="btn-back-to-top"
  >
  <i class="bi bi-arrow-up"></i>
</button>

<script>
let mybutton = document.getElementById("btn-back-to-top");

window.onscroll = function () {
scrollFunction();
};

function scrollFunction() {
if (
  document.body.scrollTop > 20 ||
  document.documentElement.scrollTop > 20
) {
  mybutton.style.display = "block";
} else {
  mybutton.style.display = "none";
}
}

mybutton.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

<section class="admin-panel-wrapper container">
  <div class="row my-5">
    <div class="col admin-sidebar">
      <div class="sticky-top">
        <div class="row">
          <div class="col d-flex justify-content-center">
            <img src="../../assets/logoA.png" alt="RedVelvetKH Logo" class="img-fluid">
          </div>
        </div>
        <div class="row">
          <div class="col">
            <h2 class="text-center">
                Admin <?php echo $_SESSION['adminfname']?>
            </h3>
          </div>
        </div>
        <div class="d-flex flex-column justify-content-center align-items-center my-4">
          <a class="btn" href="admin-panel.php">Product Listing</a></br>
          <a class="btn mt-3" href="admin-orders.php">Orders</a>
        </div>
        <div class="row d-flex justify-content-start mt-5">
          <div class="rc-admin-links">
            <a href="admin-signup.php"><i class="bi bi-person-plus btn-lg"></i>Create New Admin</a>
            <a href="admin-logout.php"><i class="bi bi-box-arrow-left btn-lg"></i>Logout</a>
          </div>
        </div>
      </div>
    </div>
  