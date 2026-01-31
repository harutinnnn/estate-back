var featuredPropertiesSlider = new Swiper("#featured-properties-slider", {
    slidesPerView: 6,
    spaceBetween: 20,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",

    },
    breakpoints: {
        1150: {
            slidesPerView: 5,
        },
        900: {
            slidesPerView: 4,
        },
        700: {
            slidesPerView: 3,
        },
        600: {
            slidesPerView: 2,
        },
        100: {
            slidesPerView: 1,
        }

    }
});

var ourAgentsSlider = new Swiper("#our-agents-slider", {
    slidesPerView: 6,
    spaceBetween: 20,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        1150: {
            slidesPerView: 5,
        },
        900: {
            slidesPerView: 4,
        },
        600: {
            slidesPerView: 3,
        },
        100: {
            slidesPerView: 1,
        }

    }
});

var sideFeaturedProperties = new Swiper("#sideFeaturedProperties", {
    spaceBetween: 20,
    pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
    }
});


$(document).ready(function () {
    $('.properties-filter-toggle').click(function () {
        $('.properties-sidebar').addClass('opened')
        $('body').addClass('no-scroll')
    })

    $('.properties-sidebar').click(function (e) {
        if ($(e.target).hasClass('properties-sidebar')) {
            $('.properties-sidebar').removeClass('opened')
            $('body').removeClass('no-scroll')
        }
    })


    $('.filter-mobile-head i.fa-xmark').click(function (e) {
        $('.properties-sidebar').removeClass('opened')
        $('body').removeClass('no-scroll')
    })


    $('#advanced-filters-list').click(function (e) {
        if ($('.advanced-search-container-list').hasClass('opened')) {
            $('.advanced-search-container-list').removeClass('opened')
            $('.advanced-search-container-list').slideUp(300)
        } else {
            $('.advanced-search-container-list').addClass('opened')
            $('.advanced-search-container-list').slideDown(300)
        }
    })


    $('#price-range').click(function () {
        if ($(this).hasClass('shown')) {
            $('#price-range-hidden').fadeOut(150);
            $(this).removeClass('shown')
        } else {
            $('#price-range-hidden').fadeIn(150);
            $(this).addClass('shown')
        }
    })


    $('.show-more-desc').click(function () {
        const innerHeight = $('.description-container-inner').height()

        if (!$(this).hasClass('opened')) {


            $('.description-container').animate({height: (innerHeight + 30) + 'px'}, 500)
            $(this).addClass('opened');

        } else {
            $(this).removeClass('opened');
            $('.description-container').animate({height: '100px'}, 500)
        }
    })


    $('.floor-plan-item-btn').click(function () {

        if (!$(this).hasClass('opened')) {

            $(this).addClass('opened')
            $(this).closest('.floor-plan-item').find('.floor-plan-item-img').slideDown(300)

        } else {

            $(this).removeClass('opened')
            $(this).closest('.floor-plan-item').find('.floor-plan-item-img').slideUp(300)

        }

    })

})

document.getElementById('profile-img').addEventListener('change', function (event) {
    const file = event.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function (e) {
        document.querySelector('.profile-img-container img').src = e.target.result;
    };
    reader.readAsDataURL(file);
});

