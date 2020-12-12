// MITS Imageslider v2.03 (c)2008-2020 by Hetfield - www.MerZ-IT-SerVice.de
$(document).ready(function () {
  $('.mits_bxslider').bxSlider({
    mode: 'horizontal',
    speed: 800,
    captions: true,
    adaptiveHeight: true,
    preloadImages: 'all',
    useCSS: false,
    infiniteLoop: true,
    auto: true,
    pause: 6000,
    autoHover: true,
    autoControls: true,
    autoStart: true,
    onSliderLoad: function(){
      jQuery(".mits_bxslider").css("visibility", "visible");
    }
  });
});