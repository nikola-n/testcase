$(document).ready(function () {
    listYears();

    function listYears() {
        $.get('/app/Controllers/ajax.php?method=list')
            .done(function (data) {
                data = JSON.parse(data);
                console.log(data.html);
                $('tbody').html(data.html);
                console.log(data.html);

            })
    }
});
