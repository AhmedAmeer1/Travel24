$(document).ready(function() {


    $(document).ready(function() {
        $("#menu-btn").click(function() {
            $("body").toggleClass("layer");
            $(".menu-side-wrapper").toggleClass("expand-menu");
        });
    });

    $('#collapseExample').on('shown.bs.collapse', function() {

        this.scrollIntoView();

    });




});

$(function() {
    $("#datepicker").datepicker();
});
$(function() {
    $("#timepicker").timepicker();
});