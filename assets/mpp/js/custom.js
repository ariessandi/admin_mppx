$("#agency, #agency2, #service, #time").select2({
    width: 'resolve'
});
$("#agency-search").select2({});

$('#loket-daterange').daterangepicker({
    opens: 'left',
    autoApply: true
});


$(window).on("load", function() {
    $('.btn-forget').on('click', function(e) {
        e.preventDefault();
        $('.form-items', '.form-content').addClass('hide-it');
        $('.form-sent', '.form-content').addClass('show-it');
    });
    $('.btn-tab-next').on('click', function(e) {
        e.preventDefault();
        $('.nav-tabs .nav-item > .active').parent().next('li').find('a').trigger('click');
    });
});

// galery
var sync1 = $("#sync1");
var sync2 = $("#sync2");
var slidesPerPage = 4; //globaly define number of elements per page
var syncedSecondary = true;

sync1.owlCarousel({
    items: 1,
    slideSpeed: 2000,
    nav: true,
    autoplay: true,
    dots: true,
    loop: true,
    responsiveRefreshRate: 200,
    navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
}).on('changed.owl.carousel', syncPosition);

sync2
    .on('initialized.owl.carousel', function() {
        sync2.find(".owl-item").eq(0).addClass("current");
    })
    .owlCarousel({
        items: slidesPerPage,
        dots: true,
        nav: true,
        smartSpeed: 200,
        slideSpeed: 500,
        slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
        responsiveRefreshRate: 100
    }).on('changed.owl.carousel', syncPosition2);

function syncPosition(el) {
    //if you set loop to false, you have to restore this next line
    //var current = el.item.index;

    //if you disable loop you have to comment this block
    var count = el.item.count - 1;
    var current = Math.round(el.item.index - (el.item.count / 2) - .5);

    if (current < 0) {
        current = count;
    }
    if (current > count)  {
        current = 0;
    }

    //end block

    sync2
        .find(".owl-item")
        .removeClass("current")
        .eq(current)
        .addClass("current");
    var onscreen = sync2.find('.owl-item.active').length - 1;
    var start = sync2.find('.owl-item.active').first().index();
    var end = sync2.find('.owl-item.active').last().index();

    if (current > end) {
        sync2.data('owl.carousel').to(current, 100, true);
    }
    if (current < start) {
        sync2.data('owl.carousel').to(current - onscreen, 100, true);
    }
}

function syncPosition2(el) {
    if (syncedSecondary) {
        var number = el.item.index;
        sync1.data('owl.carousel').to(number, 100, true);
    }
}

sync2.on("click", ".owl-item", function(e) {
    e.preventDefault();
    var number = $(this).index();
    sync1.data('owl.carousel').to(number, 300, true);
});


var feedbackSlider = $('.feedback-slider');
feedbackSlider.owlCarousel({
    items: 1,
    nav: true,
    dots: true,
    autoplay: true,
    loop: true,
    mouseDrag: true,
    touchDrag: true,
    navText: ["<i class='fa fa-long-arrow-left'></i>", "<i class='fa fa-long-arrow-right'></i>"],
    responsive: {

        // breakpoint from 767 up
        767: {
            nav: true,
            dots: false
        }
    }
});

feedbackSlider.on("translate.owl.carousel", function() {
    $(".feedback-slider-item h3").removeClass("animated fadeIn").css("opacity", "0");
    $(".feedback-slider-item img, .feedback-slider-thumb img, .customer-rating").removeClass("animated zoomIn").css("opacity", "0");
});

feedbackSlider.on("translated.owl.carousel", function() {
    $(".feedback-slider-item h3").addClass("animated fadeIn").css("opacity", "1");
    $(".feedback-slider-item img, .feedback-slider-thumb img, .customer-rating").addClass("animated zoomIn").css("opacity", "1");
});
feedbackSlider.on('changed.owl.carousel', function(property) {
    var current = property.item.index;
    var prevThumb = $(property.target).find(".owl-item").eq(current).prev().find("img").attr('src');
    var nextThumb = $(property.target).find(".owl-item").eq(current).next().find("img").attr('src');
    var prevRating = $(property.target).find(".owl-item").eq(current).prev().find('span').attr('data-rating');
    var nextRating = $(property.target).find(".owl-item").eq(current).next().find('span').attr('data-rating');
    $('.thumb-prev').find('img').attr('src', prevThumb);
    $('.thumb-next').find('img').attr('src', nextThumb);
    $('.thumb-prev').find('span').next().html(prevRating + '<i class="fa fa-star"></i>');
    $('.thumb-next').find('span').next().html(nextRating + '<i class="fa fa-star"></i>');
});
$('.thumb-next').on('click', function() {
    feedbackSlider.trigger('next.owl.carousel', [300]);
    return false;
});
$('.thumb-prev').on('click', function() {
    feedbackSlider.trigger('prev.owl.carousel', [300]);
    return false;
});