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
