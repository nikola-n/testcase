$(document).ready(function () {

    $('#form').on('click', function (e) {
        e.preventDefault();
        $.ajax("/app/Models/Year.php", {
            type: 'GET',
            // dataType: '',
            success: function (data) {
                console.log(data.data);
                var newData = JSON.parse(data);
                //branch_id
                //
            },
            error: function (msg) {
                $('.table').append('Error:', msg);
            }
        })
    });
});