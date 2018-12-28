$(function () {
    $("#currency-convert-form").on("submit", function (event) {
        event.preventDefault();
        $('.result').html("<img src='../img/load.gif'>");
        $('#currency-convert-form-submit').attr("disabled", "");
        $('#currency-convert-form-result').val('');
        var amount = $('#currency-convert-form-amount').val();
        var toCurrency = $('#currency-convert-form-toCurrency').val();

        if (isNaN(Number(amount))) {
            $('.result').html("The value of the currency is incorrect");
            $('#currency-convert-form-submit').removeAttr("disabled");
            return;
        }
        amount = Number(amount);
        $.ajax({
            type:"post",
            url:"convertCurrency.php",
            data:{
                "amount":amount,
                "fromCurrency":"USD",
                "toCurrency":toCurrency,
            },
            dataType:"text",
            success:function (data) {
                if (data != 'error') {
                    $('.result').html(amount + ' USD = ' + data + ' ' + toCurrency);
                    $('#currency-convert-form-result').val(data);
                }else {
                    $('.result').html("The value of the currency is incorrect");
                }
                $('#currency-convert-form-submit').removeAttr("disabled");
            },
            error:function (error) {
                alert("There was an error processing your request.");
                $('#currency-convert-form-submit').removeAttr("disabled");
            }
        });
    });

    $('#currency-convert-form-amount').change(function () {
        $('#currency-convert-form-submit').removeAttr("disabled");
    });
});