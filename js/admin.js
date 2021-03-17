$(document).ready(function () {
    // $('.hide-article').on('click', function () {
    //     if ($(this).hasClass('active')) {
    //         let thisImg = $(this);
    //         thisImg.removeClass('active').attr('tooltip', 'Sakriveno');
    //         thisImg.find('svg').fadeOut();
    //         setTimeout(function () {
    //             thisImg.find('img').fadeIn();
    //         }, 100);
    //     } else {
    //         let thisImg = $(this);
    //         thisImg.addClass('active').attr('tooltip', 'Vidljivo');
    //         thisImg.find('.hidden-article').fadeOut();
    //         setTimeout(function () {
    //             thisImg.find('svg').fadeIn();
    //         }, 100);
    //     }
    // });
    let dropdownLink = $('.dropdown-link');
    let opened = false;
    dropdownLink.on('click', function () {
        console.log('radi');
        opened = !opened;
        console.log(opened);
        showDropdown($(this), opened);
    });

    function showDropdown(thisLink, opened) {
        if (opened) {
            let dropdownHeight = thisLink.find('.dropdown').outerHeight();
            thisLink.css('height', 55 + dropdownHeight + 'px');
            thisLink.find('#arrowDrop').css('transform', 'translateY(-50%)rotate(180deg)');
            setTimeout(function () {
                thisLink.find('.dropdown').addClass('activeDrop');
            }, 200);
        } else {
            thisLink.find('.dropdown').removeClass('activeDrop');
            thisLink.find('#arrowDrop').css('transform', 'translateY(-50%)rotate(0deg)');
            setTimeout(function () {
                thisLink.css('height', '55px');
            }, 200)
        }
    }

    let minimizeMenu = $('.minimize-menu');
    minimizeMenu.on('click', function () {
        if (minimizeMenu.hasClass('active')) {
            $(this).removeClass('active');
            $('.menu-list > a p').fadeIn();
            $('.menu-list > .dropdown-link > div > p').fadeIn();
            minimizeMenu.find('p').fadeIn();
            $('section > .sidebar').css('max-width', '270px');
            $('.menu-list > a').removeClass('minimizeActive');
            minimizeMenu.find('svg').removeClass('minimizeActive').css('transform', 'rotate(0deg)translateX(0px)');
            $('.dropdown-link > div').removeClass('minimizeActive');
        } else {
            $(this).addClass('active');
            $('.menu-list > a p').fadeOut();
            $('.menu-list > .dropdown-link > div > p').fadeOut();
            minimizeMenu.find('p').fadeOut();
            setTimeout(function () {
                $('section > .sidebar').css('max-width', '80px');
                $('.menu-list > a:not(a.dropdown-link)').addClass('minimizeActive');
                $('.dropdown-link > div').addClass('minimizeActive');
                minimizeMenu.find('svg').addClass('minimizeActive').css('transform', 'rotate(180deg)translateX(-20px)');
            }, 200);
        }
    });

    let logoutHeight = $('.logout').outerHeight();
    let logout = $('#logout');
    logout.on('click', function () {
        $('.logout').css('bottom', -logoutHeight + 'px');
        setTimeout(function () {
            $('.logout').toggleClass('active');
        }, 200);
    });

    let alert = $('.alert');
    if($('body').find(alert)){
        setTimeout(function () {
            alert.addClass('slideRight');
            setTimeout(function () {
                alert.css('visibility', 'hidden');
            },100);
        },3000);
    }
});

