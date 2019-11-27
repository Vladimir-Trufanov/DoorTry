// JavaScript Document
// console.log('SiteHost');

// Горизонтальная полоса прокрутки сверху и снизу
// https://www.it-swarm.net/ru/javascript/gorizontalnaya-polosa-prokrutki-sverhu-i-snizu-tablicy/970615983/
$(function(){
    $(".TopScroll").scroll(function(){
        $(".CodeText")
            .scrollLeft($(".TopScroll").scrollLeft());
    });
    $(".CodeText").scroll(function(){
        $(".TopScroll")
            .scrollLeft($(".CodeText").scrollLeft());
    }); 
});
/*
$(function(){
    $(".TopScroll").scroll(function(){
        $("code")
            .scrollLeft($(".TopScroll").scrollLeft());
    });
    $("code").scroll(function(){
        $(".TopScroll")
            .scrollLeft($("code").scrollLeft());
    });
});
*/
