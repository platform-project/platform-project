$(function() {

    $('body').dblclick(function() {
        $('#motion').toggle();
    });

    $('.menu .item.quotes').click(function() {
        $('.frame.quotes').toggle();
        // url: http://www.brainyquote.com/quotes/authors/w/walt_disney.html
    });

    $('.menu .item.weather').click(function() {
        $('div.controls').toggle();
    });

});