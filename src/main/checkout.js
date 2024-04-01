let cart = JSON.parse(localStorage.getItem("data")) || [];

let tableList = document.getElementById("rc-table-list"),
    totalLabel = document.getElementById("total-price");

function generateCartItems(){
  return (tableList.innerHTML = cart
      .map((x) => {
        return `
        <div class="row d-flex ml-2 mr-2 rc-table-item">
          <div class="col-6 p-2">${x.name} ${(x.variety === "none") ? "" : "- " + x.variety}</div>
          <div class="col-3 p-2 d-flex justify-content-center">
            <span> ${x.item} </span>
          </div>
          <div class="col-3 p-2">$ ${x.price * x.item}</div>
        </div>
        `;
      })
      .join(""));
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

function setMinDate(){
  let today = new Date(),
      minDate = new Date(today);
  
  minDate.setDate(minDate.getDate() + 2);
  
  let sDay = minDate.getDate(),
      sMonth = minDate.getMonth() + 1,
      sYear = minDate.getFullYear();
  
  if (sDay < 10)
    sDay = '0' + sDay;
  if (sMonth < 10)
    sMonth = '0' + sMonth;
  
  minDate = sYear + '-' + sMonth + '-' + sDay;
  
  document.getElementById("delDate").setAttribute("min", minDate);
  document.getElementById("delDate").setAttribute("value", minDate);
};

generateCartItems();
getTotalAmount();
setMinDate();

document.getElementById("cartArray").setAttribute("value", JSON.stringify(cart));
