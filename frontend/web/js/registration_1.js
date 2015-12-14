$(document).ready(function() {

    $(document).on('click', '#reg_tourist_btn', function() {
        loadRegForm('tourist');
    });
    $(document).on('click', '#reg_agent_btn', function() {
        loadRegForm('agent');
    });
    $(document).on('submit', '#reg_form_block form', function(e) {
        e.preventDefault();
        submitRegForm();
    });
});



function loadRegForm(type) {
    $('#reg_form_block').load('/test/registration', 'type=' + type);
}

function submitRegForm() {
    var data = $('#reg_form_block form').serializeArray();
    $.post('/test/registration', data, function(data) {
        $('#reg_form_block').html(data);
    });
}