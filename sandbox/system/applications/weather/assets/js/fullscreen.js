$(function() {

    $('body').dblclick(function() {
        $('#motion').toggle();
    });

    $('.menu .item.news').click(function() {
        $('.frame.news').toggle();
        $('.frame.quotes').toggle();
    });

    $('.menu .item.quotes').click(function() {
        $('.frame.quotes').toggle();
        $('.frame.news').toggle();
        // url: http://www.brainyquote.com/quotes/authors/w/walt_disney.html
    });

    $('.menu .item.weather').click(function() {
        $('div.controls').toggle();
    });

});
