$(document).ready(function () {

    $(window).on("scroll", function () {

    });

    $('.header-burger-menu').click(function () {
        if (!$(this).hasClass('opened')) {
            openMobileMenu($(this))
        } else {
            closeMobileMenu($(this))
        }
    })

    $('.mobile-menu').click(function (e) {
        if (e.target.className === 'mobile-menu') {
            closeMobileMenu($('.header-burger-menu'))
        }
    })

    $('.mobile-menu .nav > li').click(function () {
        if (!$(this).hasClass('active')) {
            openMobileSubMenu($(this))
        } else {
            closeMobileSubMenu($(this))
        }
    })


    $('#advanced-filters').click(function () {
        if ($(this).hasClass('shown')) {
            $('.advanced-search-container').fadeOut(150);
            $(this).removeClass('shown')
        } else {
            $('.advanced-search-container').fadeIn(150);
            $(this).addClass('shown')

        }
    })
})

/**
 * @param e
 */
function openMobileSubMenu(e) {
    $(e).addClass('active');
    if ($(e).find('ul.sub-nav').length > 0) {
        $(e).find('ul.sub-nav').slideDown(300);
    }
}

/**
 * @param e
 */
function closeMobileSubMenu(e) {
    $(e).removeClass('active');
    $(e).find('ul.sub-nav').slideUp(300);
}

/**
 * @param e
 */
function openMobileMenu(e) {
    $(e).addClass('opened')
    $('.inner-mobile-menu').animate({left: 0});
    $('body').addClass('no-scroll')
}

/**
 * @param e
 */
function closeMobileMenu(e) {
    $(e).removeClass('opened')
    $('.inner-mobile-menu').animate({left: '-300px'})
    $('body').removeClass('no-scroll')
}