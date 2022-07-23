$(document).ready(function() {
    setTimeout(function(){
        $('body').addClass('loaded');
    }, 1000);
});

var loadFile = function(event) {
    var output = document.getElementById('output-preview');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src);
    }
};

function addPrice(price){
    var priceinput = document.getElementById('priceinput');
    // var text = "{{ trans('game_detail.price') }}";
    // console.log(text);
    priceinput.innerHTML = "Price: Rp. " + price;
    // priceinput.innerHTML = text + price;
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


// untuk editgame on admin
function addNominal(type){
    // console.log(type);
    if($('tr td:contains("EMPTY")')){
        $('tr td:contains("EMPTY")').parent().remove();
    }

    var nominal = document.getElementById('inputnominal').value;
    var price = document.getElementById('inputprice').value;
    // console.log(nominal, price);
    var table = document.getElementsByTagName('tbody')[0];
    // console.log(table);
    var row = table.insertRow();
    row.className = "text-center";
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);

    cell1.innerHTML = "<input class='form-control text-center' type='text' value='" + nominal + " " + type + "' readonly style='background:none;border:none'name='nominal[]'> ";
    cell2.innerHTML = "<input class='form-control text-center' type='text' value='" + price + "' readonly style='background:none;border:none' name='price[]'>";
    cell3.innerHTML = '<button type="button" class="btn btn-danger delete-new-column">DELETE</button>';
}

$(document).ready(function(){
    $('.delete-column').on('click', function(){
        // console.log($(this).parent().parent().remove());
        var id = $(this).attr('id');
        id = parseInt(id.replace(/[^0-9]/g, ''));
        // console.log(id);

        $(this).closest('tr').remove();

        var value = $('#fordeleted').val();
        if(value == ""){
            $('#fordeleted').val(id);
        }
        else{
            $('#fordeleted').val(value + "|" + id);
        }

        if($('tbody tr').length == 0){
            $('.tableNominal tbody').append('<tr class="text-center"><td colspan="3" class="p-5" style="background:none;border:none">EMPTY</td></tr>');

        }
        // console.log($('#fordeleted').val());
    });
});
// end of editgame on admin


// untuk addgame on admin
function addNewNominal(){
    var type = document.getElementById('topupType').value;
    addNominal(type);
}

// end of addgame on admin

//both addgame and editgame on admin
$("body").on('click', '.delete-new-column', function(){
    $(this).closest('tr').remove();
    if($('tbody tr').length == 0){
        $('.tableNominal tbody').append('<tr class="text-center"><td colspan="3" class="p-5" style="background:none;border:none">EMPTY</td></tr>');

    }
    // console.log($('tbody tr').length);
});
//end of add game and editgame on admin



//change lang
$("#lang").on("change", function () {
    window.location = $(this).val();
});

//popup for change lang 1st time only
$("#popup-button-navbar").on("click", function () {
    $('#popup').modal('show');
});

$(document).ready(function() {
    $("#popup-button").on("click", function () {
        var selected = $('#langHome option:selected').val();
        window.location = selected;
    });
});


