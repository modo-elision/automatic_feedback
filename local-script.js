$(function($) {
    let url = window.location.href;
    $('.navbar-nav li a').each(function() {
        if (this.href === url) {
            $(this).addClass('active');
        }
    });
});

$(document).ready(function(){
    var navHeight = $("nav").height();
    $('body').css({'padding-top': navHeight + 33 + 'px'});
    $('.app-status-block').hide();
    $('.link-btn').on('click', function(){
        var textChange = $(this).parents('.open-job-tile').find('.link-btn');
        var text = $(this).parents('.open-job-tile').find('.link-btn').text();
        if(text === 'Show Status'){
            $(textChange).text('Hide Status');
        }else {
            $(textChange).text('Show Status');
        }
        $(this).parents('.open-job-tile').find('.app-status-block').toggle();

        // $('.app-status-block').toggle();
    })
})