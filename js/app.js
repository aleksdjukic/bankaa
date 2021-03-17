let headerSlider = $('.header-slider');
let headerSliderText = $('.header-slider-text');
let newsSlider = $('.news-block');
let otherArticlesSlider = $('.other-articles');

headerSlider.slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    infinite: true,
    speed: 500,
    fade: true,
    cssEase: 'linear',
    arrows: true,
    autoplaySpeed: 3000,
    autoplay: true,
    asNavFor: headerSliderText
});

headerSliderText.slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: false,
    infinite: true,
    speed: 500,
    fade: true,
    cssEase: 'linear',
    arrows: false,
    autoplaySpeed: 3000,
    autoplay: true,
});

newsSlider.slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    infinite: true,
    speed: 500,
    arrows: true,
    autoplaySpeed: 3000,
    autoplay: true,
});

otherArticlesSlider.slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    infinite: true,
    speed: 500,
    arrows: true,
    autoplaySpeed: 3000,
    autoplay: true,
});

let bank = $('.ebank');
bank.on('click', function () {
    bank.find("img").toggleClass('active');
    bank.find('.ebank-dropdown').toggleClass('active');
});

let positionEl = $('.buttons').offset();
let positionY = positionEl.top;
let positionX = positionEl.left;
$('.header-slider .slick-dots').css({'top': positionY, 'left': positionX});

$(".js-video-button").modalVideo({
    youtube: {
        nocookie: true,
        autoplay: true
    }
});

