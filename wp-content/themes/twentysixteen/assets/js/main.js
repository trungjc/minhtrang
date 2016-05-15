jQuery(document).ready(function() {
    /* mobile menu */
    jQuery('#banner').slick({
        dots: false,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 5000,
        arrows: false,
        speed: 500,
        fade: true,
        cssEase: 'linear'
    });
    jQuery('#list-product').slick({
        dots: false,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 10000,
        arrows: false,
        pauseOnFocus: false,
        speed: 500,
    });
    jQuery('.ico-menu').click(function() {
        if (jQuery('.content-mb-menu').is(':hidden')) {
            jQuery('.content-mb-menu').show();
        } else {
            jQuery('.content-mb-menu').hide();
        }
    });
    jQuery('.mb-menu .content-mb-menu  li  a').click(function() {
        if (jQuery(this).has('ul') && jQuery(this).next('ul').is(':hidden')) {
            jQuery(this).next('ul').show();
            jQuery(this).parent('.has-sub:after').css({ "content": "" });
        } else {
            jQuery(this).next('ul').hide();
            jQuery(this).parent('.has-sub:after').css({ "content": "" });
        }
    });
    jQuery(".partners").slick({
        dots: false,
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 3
    });
});
jQuery(window).load(function() {

});
