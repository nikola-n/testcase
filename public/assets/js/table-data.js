$(document).ready(function () {
    listYears();

    function listYears() {
        $.get('/app/Controllers/ajax.php?method=list')
            .done(function (data) {
                data = JSON.parse(data);
                $('tbody').html(data.html);
            })
    }
});
