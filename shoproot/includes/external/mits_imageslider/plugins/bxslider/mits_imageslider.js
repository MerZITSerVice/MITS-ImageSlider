// Imageslider v2.01 (c)2008-2016 by Hetfield - www.MerZ-IT-SerVice.de
$(document).ready(function(){	
    $('.mits_bxslider').bxSlider({
        mode: 'horizontal',
        speed: 800,
        captions: true,
        adaptiveHeight: true,
        preloadImages: 'visible',
        useCSS: false,
        easing: 'easeInOutBack',
        infiniteLoop: true,
        auto: true,
        pause: 6000,
        autoHover: true,
        autoControls: true,
        autoStart: true
    });
});