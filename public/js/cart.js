


    var qty = document.getElementsByClassName('cartqty');
  /* qty.onchange = function () {
        qty = document.getElementsByClassName('cartqty');
        console.log(this);

        var totalproduct = document.getElementsByClassName('totalproduct')[0];
        var price = document.getElementsByClassName('price')[0];
        var text = parseFloat((price.innerText).substr(1)) * this.value;
        totalproduct.innerText = '$' + text;


    }*/

    function f() {
        var totalproduct = document.getElementsByClassName('totalproduct')[0];
        var price = document.getElementsByClassName('price')[0];
        var text = parseFloat((price.innerText).substr(1)) * this.value;

        return '$'+text;
    }
    function qtyproc(){
        var totprod = document.getElementById('totprod');
        var elem = document.querySelectorAll('input.cartqty');
        var td = document.querySelectorAll('td.totalproduct');

        var price = document.querySelectorAll('td.price');
        var nprice = [];
        for (var j =0;j<price.length;j++){
            nprice.push(parseFloat((price[j].innerText).substr(1)) * elem[j].value);
        }


        for (var j = 0; j<td.length;j++){
            td[j].innerText = '$'+nprice[j];

        }
        var totprice = 0;
        for (var j = 0; j<nprice.length;j++) {
            totprice+=nprice[j];
        }
        totprod.innerText = '$'+totprice;
    }