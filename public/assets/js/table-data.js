$(document).ready(function () {
    listYears();

    function listYears() {
        $.get('/views/allYears.php?method=list')
            .then(function (data) {
               var years = JSON.stringify(data);
                $('.addYears').append(years.html);
                console.log(years.html);

            })
    }
});
