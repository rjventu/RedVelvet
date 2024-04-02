let cart = JSON.parse(localStorage.getItem("data")) || [];

let receiptTable = document.getElementById("rc-table"),
    tableList = document.getElementById("rc-table-list"),
    label = document.getElementById("rc-table-label"),
    emptyLabel = document.getElementById("empty-cart-message"),
    totalTable = document.getElementById("rc-table-total"),
    totalLabel = document.getElementById("total-price"),
    checkoutLabel = document.getElementById("rc-table-checkout");

function generateCartItems(){
  if (cart.length === 0) {

    tableList.innerHTML = "";
    label.innerHTML = "<h2>Cart is Empty</h2>";
    receiptTable.style.display = 'none';
    checkoutLabel.style.display = 'none';
    totalTable.style.display = 'none';
    emptyLabel.style.display = 'block';

  } else {

    return (tableList.innerHTML = cart
      .map((x) => {
        return `
        <div class="row d-flex ml-2 mr-2 rc-table-item">
          <div class="col-6 p-2">${x.name} ${(x.variety === "none") ? "" : "- " + x.variety}</div>
          <div class="col-3 p-2 d-flex justify-content-center">
            <i onclick="decrement(${x.id}, '${x.variety}')" class="bi bi-dash-lg mr-3"></i>
            <span> ${x.item} </span>
            <i onclick="increment(${x.id}, '${x.variety}')" class="bi bi-plus-lg ml-3"></i>
          </div>
          <div class="col-3 p-2">$ ${x.price * x.item}</div>
        </div>
        `;
      })
      .join(""));
  }
};

function getTotalAmount(){
  if (cart.length !== 0) {
    var totalAmount = cart
      .map((x) => {
        let {item, price} = x;
        return price * item;
      })
      .reduce((x, y) => x + y, 0);

    return (totalLabel.innerHTML = `$ ${totalAmount}`);
  } else return;
};

function increment(selectedItem, selectedItemVar){
  var search = cart.find((x) => x.id === selectedItem && x.variety === selectedItemVar);
  search.item += 1;

  generateCartItems();
  getTotalAmount();
  localStorage.setItem("data", JSON.stringify(cart));
};

function decrement(selectedItem, selectedItemVar){
  var search = cart.find((x) => x.id === selectedItem && x.variety === selectedItemVar);

  search.item -= 1;
  if(search.item === 0){
    cart = cart.filter((x) => !(x.id === search.id && x.variety === search.variety));
  }
  
  generateCartItems();
  getTotalAmount()
  localStorage.setItem("data", JSON.stringify(cart));
};

generateCartItems();
getTotalAmount();