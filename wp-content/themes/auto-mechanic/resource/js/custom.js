jQuery(function($) {

    /* -----------------------------------------
    Preloader
    ----------------------------------------- */
    $('#preloader').delay(1000).fadeOut();
    $('#loader').delay(1000).fadeOut("slow");

    /* -----------------------------------------
    Navigation
    ----------------------------------------- */
    $('.menu-toggle').click(function() {
        $(this).toggleClass('open');
    });

    /* -----------------------------------------
    Keyboard Navigation
    ----------------------------------------- */
    $(window).on('load resize', testing)

    function testing(event) {
        if ($(window).width() < 1200) {
            $('.main-navigation').find("li").last().bind('keydown', function(e) {
                if (e.shiftKey && e.which === 9) {
                    if ($(this).hasClass('focus')) {
                    }

                } else if (e.which === 9) {
                    e.preventDefault();
                    $('#masthead').find('.menu-toggle').focus();
                }                
            })
        } else {
            $('.main-navigation').find("li").unbind('keydown')
        }
    }

    testing()

    var auto_mechanic_primary_menu_toggle = $('#masthead .menu-toggle');
    auto_mechanic_primary_menu_toggle.on('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        var shiftKey = e.shiftKey;

        if (auto_mechanic_primary_menu_toggle.hasClass('open')) {
            if (shiftKey && tabKey) {
                e.preventDefault();
                const $the_last_li = $('.main-navigation').find("li").last()
                $the_last_li.find('a').focus()
                if (!$the_last_li.hasClass('focus')) {

                    const $is_parent_on_top = true
                    let $the_parent_ul = $the_last_li.closest('ul.sub-menu')

                    let count = 0

                    while (!!$the_parent_ul.length) {
                        ++count

                        const $the_parent_li = $the_parent_ul.closest('li')

                        if (!!$the_parent_li.length) {
                            $the_parent_li.addClass('focus')
                            $the_parent_ul = $the_parent_li.closest('ul.sub-menu')

                            // Blur the cross
                            $(this).blur()
                            $the_last_li.addClass('focus')
                        }

                        if (!$the_parent_ul.length) {
                            break;
                        }
                    }

                }

            };
        }
    })

    /* -----------------------------------------
    Main Slider
    ----------------------------------------- */
    $('.banner-slider').slick({
        autoplaySpeed: 3000,
        dots: false,
        arrows: true,
        nextArrow: '<button class="fas fa-angle-right slick-next"></button>',
        prevArrow: '<button class="fas fa-angle-left slick-prev"></button>',
        responsive: [{
            
            breakpoint: 1025,
            settings: {
                dots: true,
                arrows: false,
            }
        },
        {
            breakpoint: 480,
            settings: {
                dots: true,
                arrows: false,
            }
        }]
    });

    /* -----------------------------------------
    Scroll Top
    ----------------------------------------- */
    var auto_mechanic_scrollToTopBtn = $('.auto-mechanic-scroll-to-top');

    $(window).scroll(function() {
        if ($(window).scrollTop() > 400) {
            auto_mechanic_scrollToTopBtn.addClass('show');
        } else {
            auto_mechanic_scrollToTopBtn.removeClass('show');
        }
    });

    auto_mechanic_scrollToTopBtn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, '300');
    });
    
});

/* ===============================================
  TABS
=============================================== */

jQuery(document).ready(function () {
  jQuery( ".tablinks" ).first().addClass( "active" );
  jQuery( ".tabcontent" ).first().addClass( "active" );
});

function auto_mechanic_services_tab(evt, cityName) {
  var auto_mechanic_i, auto_mechanic_tabcontent, auto_mechanic_tablinks;
  auto_mechanic_tabcontent = document.getElementsByClassName("tabcontent");
  for (auto_mechanic_i = 0; auto_mechanic_i < auto_mechanic_tabcontent.length; auto_mechanic_i++) {
    auto_mechanic_tabcontent[auto_mechanic_i].style.display = "none";
  }
  auto_mechanic_tablinks = document.getElementsByClassName("tablinks");
  for (auto_mechanic_i = 0; auto_mechanic_i < auto_mechanic_tablinks.length; auto_mechanic_i++) {
    auto_mechanic_tablinks[auto_mechanic_i].className = auto_mechanic_tablinks[auto_mechanic_i].className.replace(" active", "");
  }
  jQuery('#'+ cityName).show()
  evt.currentTarget.className += " active";
}