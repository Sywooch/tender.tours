$(document).ready(function() {

    $(document).on('click', '#reg_tender_btn', function() {
        loadRegForm('tourist');
    });
    $(document).on('submit', '#reg_form_block form', function (e) {
        e.preventDefault();
        submitTenderRegForm();
    });
});

function loadRegForm(type) {
    $('#reg_form_block').load('/tender/registrate', 'type=' + type);
}

function submitTenderRegForm() {
    var data = $('#reg_form_block form').serializeArray();
    $.post('/tender/registrate', data, function(data) {
        $('#reg_form_block').html(data);
    });
}

//функция поля календаря
$(function () {
    $("#datepicker1").datepicker({});
});
$(function () {
    $("#datepicker2").datepicker({});
});