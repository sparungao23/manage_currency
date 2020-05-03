$(document).ready(function() {
    $('#rates').DataTable();

    $('.updateCurrency').on('click', function () {
        $('#hdCurrencyId').val($(this).attr('data-id'));
        $('#txtCurrency').text($(this).attr('data-currency'));
    });       
});