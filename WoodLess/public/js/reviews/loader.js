$(function() {
    $('body').on('click', '#pageSelector a', function(e) {
        e.preventDefault();

        //$('#pageSelector a').css('color', '#dfecf6');
        var url = $(this).attr('href');
        getReviews(url);
        window.history.pushState("", "", url);
    });

    function getReviews(url) {
        $.ajax({
            url : url
        }).done(function (data) {
            $('.reviews').html(data);
        }).fail(function () {
            alert('Reviews could not be loaded.');
        });
    }
});