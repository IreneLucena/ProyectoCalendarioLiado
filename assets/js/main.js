$(document).ready(
    function () {
        $(".modalContainer .backdrop").click(function () {
            console.log($(this));
            $(this).parent().addClass("hidden");
        });
    }
);