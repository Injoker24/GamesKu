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
    $('button').removeClass('topup-type-button-selected');
    $(this).addClass('topup-type-button-selected');
});

function getPaymentType(paymentType){
    document.getElementById('forpayment').value = paymentType;
}
