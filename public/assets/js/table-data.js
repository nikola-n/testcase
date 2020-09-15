$(document).ready(function () {
    listYears();

    function listYears() {
        $.get('/views/allYears.php?method=list')
            .then(function (data) {
                data = JSON.stringify(data);
            })
    }


    // $('#yearForm').on('click', function () {
    //     $.get('/app/Controllers/submited_form.php', {
    //         method: 'list',
    //     }).done(function (data) {
    //         listYears();
    //     })
    // })
});
