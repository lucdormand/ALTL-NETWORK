console.log('oui')
$(window).on('load',function() {
    $('.flexslider').flexslider({
        animation:"slide",
        slideshow: true,
        slideshowSpeed: 7000,
        controlNav: false,
    });
})

window.sr = ScrollReveal();

sr.reveal('.footer',{
    origin: 'bottom',
    duration: 2000,
    distance: '70%',
});
sr.reveal('.copyrights',{
    origin: 'bottom',
    duration: 2500,
    distance: '100%',
});


sr.reveal('.wrap2',{
    origin: 'bottom',
    duration: 2000,
    distance: '70%',

});



