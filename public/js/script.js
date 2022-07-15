$(document).ready(function() {
    setTimeout(function(){
        $('body').addClass('loaded');
    }, 1000);
});

function addPrice(price){
    var priceinput = document.getElementById('priceinput');
    priceinput.innerHTML = "Price: Rp. " + price;
    document.getElementById('forprice').value = price;
}

$('button').on('click', function(){
    if($(this).attr('class') == 'topup-type-button'){
        $('.topup-type-button').removeClass('topup-type-button-selected');
        $(this).addClass('topup-type-button-selected');
    }
    else if($(this).attr('class') == 'payment-type-button'){
        $('.payment-type-button').removeClass('payment-type-button-selected');
        $(this).addClass('payment-type-button-selected');
    }
});

function getPaymentType(paymentType){
    document.getElementById('forpayment').value = paymentType;
}

function addNominal(type){
    console.log(type);
    var nominal = document.getElementById('inputnominal').value;
    var price = document.getElementById('inputprice').value;
    console.log(nominal, price);
    var table = document.getElementsByTagName('table')[0];
    console.log(table);
    var x = $('table tbody tr').length;
    console.log(x);
    var row = table.insertRow(x+1);
    row.className = "text-center";
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);

    cell1.innerHTML = "<input class='form-control text-center' type='text' value='" + nominal + " " + type + "' readonly style='background:none;border:none'name='nominal[]'> ";
    cell2.innerHTML = "<input class='form-control text-center' type='text' value='" + price + "' readonly style='background:none;border:none' name='price[]'>";
    cell3.innerHTML = '<a href="#" class="badge text-bg-danger rounded-pill text-decoration-none">DELETE</a>';
}

var loadFile = function(event) {
    var output = document.getElementById('output-preview');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src);
    }
};
