$("#home-lm").click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $("#services").offset().top
    }, 1000);
});
$("#services-lm").click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $("#services-page").offset().top
    }, 1000);
});
$("#events-lm").click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $("#events-page").offset().top
    }, 1000);
});
$("#about-lm").click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $("#about-page").offset().top
    }, 1000);
});
