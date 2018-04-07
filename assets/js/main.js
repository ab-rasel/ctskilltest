jQuery(function ($) {

    "use strict";
	
	// make some waves.
var ocean = document.getElementById("ocean"),
    waveWidth = 10,
    waveCount = Math.floor(window.innerWidth/waveWidth),
    docFrag = document.createDocumentFragment();

for(var i = 0; i < waveCount; i++){
  var wave = document.createElement("div");
  wave.className += " wave";
  docFrag.appendChild(wave);
  wave.style.left = i * waveWidth + "px";
  wave.style.webkitAnimationDelay = (i/100) + "s";
}

ocean.appendChild(docFrag);

    // fixed header
    if ($('.fixed-menu').length > 0) {
        $(window).on('scroll', function () {
            if ($(window).scrollTop() > 300) {
                $('.fixed-menu').addClass('fixed_header animated pulse');
                $('.review-page-sec').addClass('margin50');
            }
            else {
                $('.fixed-menu').removeClass('fixed_header animated pulse');
                $('.review-page-sec').removeClass('margin50');
            }
        });
    }
    // product zoom
    $('.product-zoom').zoom();

    if ($('.mobile-menu').length > 0) {
        $('.mobile-menu').on('click', function () {
            $('.header-menu .header-menu-list').slideToggle();
        });
    }
    $('#releted-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: false,
        responsive: [
            {
                breakpoint: 1250,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('#table-of-product-slider').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        dots: false,
        prevArrow: '#t-prev',
        nextArrow: '#t-next',
        responsive: [
            {
                breakpoint: 1250,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow:2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 567,
                settings: {
                    slidesToShow:1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.popular-product-slider').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        dots: false,
        vertical: true,
    });
    //
    // if ($('.hide-this').length >0){
    //     $('.hide-this').on('click',function () {
    //         $('.single-table-of-content').slideToggle();
    //         $(this).toggleClass('active');
    //     });
    // }

    //backg to top
    $(window).on('scroll', function () {
        if ($(window).scrollTop() > $(window).height()) {
            $(".backTo").fadeIn('slow');
        }
        else {
            $(".backTo").fadeOut('slow');
        }

    });
    $("body, html").on("click", ".backTo", function (e) {
        e.preventDefault();
        $('html, body').animate({scrollTop: 0}, 800);
    });
    if($('.scroll_key a').length > 0){
        $('.scroll_key a').on ('click',function () {
            $('html, body').animate({scrollTop: $(this.hash).offset().top -100}, 500);
        });
    }

    if ($('.hideThis').length >0){
        $('.hideThis').on('click',function (e) {
            e.preventDefault();
            $('.table-content').slideToggle();
            $('.hide-item').toggle();
        });
    }

}(jQuery));