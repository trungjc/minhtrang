var isTouchDevice = 'ontouchstart' in document.documentElement;

var iOS = /(iPhone|iPad|iPod)/i.test(navigator.userAgent);

var isMobileScreen = function() {
    return document.body.clientWidth < 800;
};
var isMobileMenuBreakpoint = function() {
    return document.body.clientWidth < 1200;
};

var _mcgc = {
    init: function() {
        'use strict';
        if ($('.feature-post').length) _mcgc.widgetPostSlie.init();
        _mcgc.mobileMenu.init();
        _mcgc.scrollToElement.init();
        if ($('.popup-media').length) _mcgc.videoPopup.init();
        if ($('.product-panel .product-item').length) _mcgc.elementInview.init();
    },
    topMenu: {
        init: function(ele) {
            'use strict';
            $('.parent-menu').hover(function() {
                    if ($('.navbar-toggle').css('display') == 'none') {
                        $(this).addClass('active').siblings().children('.dropdown-menu').hide();
                        var dropdownMenu = $(this).find('.dropdown-menu');
                        dropdownMenu.fadeIn(300);
                    }
                },
                function() {
                    if ($('.navbar-toggle').css('display') == 'none') {
                        var dropdownMenu = $(this).removeClass('active').find('.dropdown-menu');
                        dropdownMenu.fadeOut(300);
                    }
                });

            // Optional: Make the first link a working link! 
            // - expected behaviour on hover menus.
            $('.parent-menu').on('show.bs.dropdown', function() {
                if ($('.navbar-toggle').css('display') == 'none') {
                    var location = $(this).attr('href');
                    if (location) {

                        window.location.href = location;
                    }
                    return false;
                }
            });

            var header = $(".header"),
                pageBlocks = $('.site-body-header').next().offset().top,
                headerHeight = header.height();

            if ($('.secondary-menu').length) {
                var secondaryMenu = $('.secondary-menu'),
                    secondaryUl = secondaryMenu.find('.navbar-secondary'),
                    cloneSecondaryMenu = secondaryUl,
                    secondaryMenuPosition = secondaryMenu.offset().top;                   
                    secondaryUl.clone(true).prependTo(header);
            }

            $(window).scroll(function() {
                var scrolltop = $(window).scrollTop();
                //make header smaller when scroll down
                 if ($('.secondary-menu').length) {
                        if (!isMobileScreen()) {                            
                            if (scrolltop > secondaryMenuPosition) {
                                header.hide();
                                secondaryMenu.addClass("fixed");

                            } else {
                                header.show();
                                secondaryMenu.removeClass("fixed");
                            }
                        } else { //product secondary menu on mobile
                            if (scrolltop > secondaryMenuPosition) {
                                header.addClass('sticky-secondary-menu');

                            } else {
                                header.removeClass('sticky-secondary-menu');
                            }
                        }

                    }
                    else {
                         if (scrolltop > pageBlocks) {                    
                                header.addClass("smaller");

                            } else {
                                header.removeClass("smaller");                    
                            }
                    }
               

            });

        }
    },
    videoPopup: {
        init: function(ele) {
            'use strict';
            if (isMobileScreen()) {
                var height = screen.height / 4;
            } else {
                var height = screen.height / 2;
            }

            $('.popup-media').fancybox({
                fitToView: true,
                autoCenter: true,
                autoHeight: true,
                autoWidth: true,
                width: (16 / 9) * height,
                height: height,
                autoDimensions: false,
                helpers: {
                    media: {}
                }
            });
        }
    },
    mobileMenu: {
        init: function(ele) {
            'use strict';
            $('body').on(' show.bs.collapse', function() {
                $(this).addClass('no-scroll-y')
            });
            $('body').on('hidden.bs.collapse', function() {
                $(this).removeClass('no-scroll-y')
            });

            $('.icon-cross').on('click', function() {
                $('.navbar-toggle').trigger('click');
            });

        }
    },
    scrollToElement: {
        init: function() {
            $('.button-container .btn,.navbar-secondary .navbar-nav a').on('click', function(event) {
                var target = $($(this).attr('href'));
                if (target.length) {
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top - 90
                    }, 1000);

                }

            });
        }
    },
    widgetPostSlie: {
        init: function(ele) {
            'use strict';

            $('.feature-post').slick({
                arrows: false,
                dots: true,
                infinite: true,
                speed: 300,
                autoplaySpeed: 5000,
                slidesToShow: 3,
                //adaptiveHeight: true,
                responsive: [

                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            dots: false
                        }
                    }, {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });
        }

    },
    elementInview: {
        init: function(ele) {

            $('[data-class-in="in-animation"]').bind('inview', function(event, visible) {
                if (visible == true) {
                    $(this).addClass('in-animation');
                } else {
                    $(this).removeClass('in-animation');
                }
            });

            $('.hero-section.in-view').bind('inview', function(event, visible) {
                if (visible == true) {
                    $(this).addClass('in-view');
                    $('.hero-section').removeClass('out-view');
                } else {
                    $(this).removeClass('in-view');
                    $(this).addClass('out-view');
                }
            });

        }
    },
    parallaxHero: {
        init: function() {
            var footerElement = $('#footer'),
             mainElement = $('.wrapper');
             mainElement.css('padding-bottom', footerElement.outerHeight());

            $(window).scroll(function() {
                var scrolltop = $(window).scrollTop(),
                    heroCaption = $('.hero-section .slideshow-caption,.hero-section .hero-caption');
                //make header smaller when scroll down
                if (heroCaption.length !== 0) {
                    if (scrolltop > 20) {
                        heroCaption.addClass('inview');

                    } else {
                        heroCaption.removeClass('inview');
                    }
                }
                

            });

        }
    },
    slideShowHero: {
        init: function() {
            var $slideshowImage = $("#slideshow-image"),
                $slideshowInner = $('.slideshow-inner'),
                $slideWrapper = $('.hero-section .slideshow'),
                $slideshowImgElement = $(window).height() - $('.header').height() - 40,
                opts = {
                    fx: 'scrollDown',
                    speed: '300',
                    timeout: 10000,
                    pager: '#nav',
                    fit: 1
                };
            if ($slideshowImage.length > 0) {
                if ($slideshowInner.length) {
                    $slideshowInner.css('width', $slideshowInner.parents('.slideshow').width());
                    $slideWrapper.css('height', $slideshowImgElement);
                    // $slideshowInner.css('max-height', $slideshowImgElement);
                    opts.height = $slideshowImgElement;
                    $slideshowImage.before('<div id="nav">').cycle(opts);
                }
            }

            $(window).smartresize(function() {
                if ($slideshowImage.length > 0) {
                    $slideshowImgElement = $(window).height() - $('.header').height() - 40;
                    opts.height = $slideshowImgElement;
                    if ($slideshowInner.length) $slideshowInner.css('width', $slideshowInner.parents('.slideshow').width());
                    $slideWrapper.css('height', $slideshowImgElement);
                    // $slideshowInner.css('max-height', $slideshowImgElement);
                    $slideshowImage.cycle('destroy');
                    $slideshowImage.cycle(opts);

                }

                /*_mcgc.parallaxHero.init();*/


            });



        }
    }

};


function clearText(field) {
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
    //<input type="text" onblur="clearText(this)" onfocus="clearText(this)" value="value"/>
}

//Smart Resize
(function($, sr) {
    var debounce = function(func, threshold, execAsap) {
        var timeout;
        return function debounced() {
            var obj = this,
                args = arguments;

            function delayed() {
                if (!execAsap)
                    func.apply(obj, args);
                timeout = null;
            };
            if (timeout)
                clearTimeout(timeout);
            else if (execAsap)
                func.apply(obj, args);
            timeout = setTimeout(delayed, threshold || 200);
        };
    };
    // smartresize
    jQuery.fn[sr] = function(fn) {
        return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr);
    };
})(jQuery, 'smartresize');



$(document).ready(function() {
    'use strict';   
    _mcgc.init();

});

$(function() {
    $(window).load(function() {
        $('html, body').animate({scrollTop: 0}, 10);// force crolltop when reload page
        _mcgc.elementInview.init();
        _mcgc.slideShowHero.init();        
        _mcgc.topMenu.init();    
        _mcgc.parallaxHero.init();

        $(window).smartresize(function() {
            _mcgc.parallaxHero.init();
        });

    });
});
