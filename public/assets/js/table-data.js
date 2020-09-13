$(document).ready(function () {

    $.ajax("/app/Models/Year.php", {
        type: 'GET',
        // dataType: '',
        success: function (data) {
            console.log(data);
            var newData = JSON.parse(data);
            //branch_id
            //
        },
        error: function (msg) {
            $('.table').append('Error:', msg);
        }
    })

});