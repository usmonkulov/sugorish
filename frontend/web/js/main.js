$(document).ready(function () {

    $(document).ready(function () {
        $(".footer-part").append("<link href=\'/css/service-cards.css?v3\' rel=\'stylesheet\'>");
        $(".footer-part").append("<link href=\'/css/jquery-ui.css\' rel=\'stylesheet\'>");
        $(".footer-part").append("<link href=\'/css/specialView.css\' rel=\'stylesheet\'>");
    })

    var liUse = $('.cabinetProfileMenu li>ul>li');
    if (liUse.hasClass('active')) {
        liUse.parent('ul').addClass('open');
    } else {
        liUse.parent('ul').removeClass('open');
    }

    /**
     * Replace all SVG images with inline SVG
     */
    jQuery('img.svg').each(function () {
        var $img = jQuery(this);
        var imgID = $img.attr('id');
        var imgClass = $img.attr('class');
        var imgURL = $img.attr('src');
        jQuery.get(imgURL, function (data) {
            // Get the SVG tag, ignore the rest
            var $svg = jQuery(data).find('svg');

            // Add replaced image's ID to the new SVG
            if (typeof imgID !== 'undefined') {
                $svg = $svg.attr('id', imgID);
            }
            // Add replaced image's classes to the new SVG
            if (typeof imgClass !== 'undefined') {
                $svg = $svg.attr('class', imgClass + ' replaced-svg');
            }

            // Remove any invalid XML tags as per http://validator.w3.org
            $svg = $svg.removeAttr('xmlns:a');

            // Replace image with new SVG
            $img.replaceWith($svg);
        }, 'xml');
    });

    $('.navigate_menu').click(function () {
        $('.slide_menu').toggleClass('active')
        $('.slide_content').toggleClass('active')
    });

    $('.btn-fix-menu').click(function () {
        $('.mobile-menu').slideToggle();
        $('.wrapper').toggleClass('close');
    });

    $('.cabinetProfileMenu>li>a').click(function (e) {
        if ($(this).parent('li').has('ul').length) {
            e.preventDefault();
        }
        if ($(this).parent('li').hasClass('active')) {
            $(this).parent('li').removeClass('active');
        } else {
            $(this).parent('li').addClass('active');
        }
    });


    $('.btn_wave').mousedown(function (e) {
        console.log('sasaasd');
        var target = e.target;
        var rect = target.getBoundingClientRect();
        var ripple = target.querySelector('.ripple');
        $(ripple).remove();
        ripple = document.createElement('span');
        ripple.className = 'ripple';
        ripple.style.height = ripple.style.width = Math.max(rect.width, rect.height) + 'px';
        target.appendChild(ripple);
        var top = e.pageY - rect.top - ripple.offsetHeight / 2 - document.body.scrollTop;
        var left = e.pageX - rect.left - ripple.offsetWidth / 2 - document.body.scrollLeft;
        ripple.style.top = top + 'px';
        ripple.style.left = left + 'px';
        return false;
    });

    if ($('div').hasClass('table-vert')) {
        $('.table-vert thead th:not(:first-child):not(:last-child)').each(function (i, e) {
            $(e).html('<p>' + $(e).text() + '</p>')
        });
    }

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

    $('.btn_check').click(function () {
        $('#receipt-content').print();
    });

    // $('.mobile-owl-tabs').owlCarousel({
    //     autoWidth: true,
    //     loop: true,
    //     nav: true,
    // });
});

function scrollToActiveStep(stepContent) {
    var objXPos = Math.round($(stepContent + ' li.active').offset().left - $(stepContent).offset().left);
    objXPos -= ($(stepContent).width() / 2) - ($(stepContent + ' li.active').width());
    $(stepContent).stop().animate({
        scrollLeft: '+=' + objXPos
    }, 1000, "easeOutQuad");
}

function toggleSidebar(side) {
    if (side !== "left" && side !== "right") {
        return false;
    }
    var left = $("#sidebar-left"),
        right = $("#sidebar-right"),
        content = $("#content"),
        openSidebarsCount = 0,
        contentClass = "";

    if (side === "left") {
        left.toggleClass("collapsed");
        right.addClass("collapsed");
    } else if (side === "right") {
        right.toggleClass("collapsed");
        left.addClass("collapsed");
    }

    if (!left.hasClass("collapsed")) {
        openSidebarsCount += 1;
    }

    if (!right.hasClass("collapsed")) {
        openSidebarsCount += 1;
    }

    if (openSidebarsCount === 0) {
        contentClass = "col-xs-12";
    } else if (openSidebarsCount === 1) {
        contentClass = "col-xs-9";
    } else {
        contentClass = "col-xs-6";
    }

    content.removeClass("col-xs-12 col-xs-9 col-xs-6")
        .addClass(contentClass);
}

$(document).ready(function () {

    $('.switch-btn').click(function (e) {
        e.preventDefault();

        var obj = $(this).attr('data-switch');

        $(obj).slideToggle(300);
    });


    $('.big_search .dropdownBtn').click(function () {
        $(this).parents('.big_search').toggleClass('open');
    });
    $('#servicefilterform-user_type .checkbox').addClass('select_user_type');
    $("#servicefilterform-user_type .checkbox label").replaceWith(function (index, oldHTML) {
        return $("<span>").html(oldHTML);
    });


    $('.select_tick, .select_user_type').click(function () {
        $(this).toggleClass('active');

        if (!$(this).hasClass('active')) {
            $(this).find('input').prop("checked", false);
        } else {
            $(this).find('input').prop("checked", true);
        }
    });

    $('[data-toggle="tooltip"], .dataTooltip').tooltip();

    $('.btn_link, .sphere ').hover(function () {
        $(this).parents('li').addClass('active')

    }, function () {
        $(this).parents('li').removeClass('active')
    });

    $('body').append('<div class="scroll_up"></div>');
    $(window).scroll(function () {
        if ($(this).scrollTop() > 170) {
            $('.scroll_up').fadeIn();
            $('.head').addClass('active');
        } else {
            $('.scroll_up').fadeOut();
            $('.head').removeClass('active');
        }
    });
    $('.scroll_up').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    (function ($) {

        $.fn.parallax = function (options) {
            var windowHeight = $(window).height();
            var settings = $.extend({
                speed: 0.15
            }, options);
            return this.each(function () {
                var $this = $(this);

                $(document).scroll(function () {
                    var scrollTop = $(window).scrollTop();
                    var offset = $this.offset().top;
                    var height = $this.outerHeight();

                    if (offset + height <= scrollTop || offset >= scrollTop + windowHeight) {
                        return;
                    }

                    var yBgPosition = Math.round((offset - scrollTop) * settings.speed);

                    $this.css('background-position', 'center ' + yBgPosition + 'px');
                });
            });
        }
    }(jQuery));

    $('.s1, .s2').parallax({
        speed: -0.6
    });
});


$(function () {
    $('body').on('click', '.kadastr_numb_list li a', function () {
        var id = $(this).parent().data('id');
        var container = '.informer[data-id="' + id + '"]';

        $('.kadastr_numb_list li').removeClass('active');
        $(this).parent().addClass('active');

        $('.informer').removeClass('active_informer_item');
        $(container).addClass('active_informer_item');

        return false;
    });

    $('#catBtn').click(function (e) {
        e.preventDefault();
        toggleSidebar('left');
    });

    $('#serviceInfoBtn').click(function (e) {
        e.preventDefault();
        toggleSidebar('right')

    });


    $('#w1.alert.fade.in').attr('data-tooltip', 'tr');
    $(function () {
        $("#w0 .task_status_blue").mousemove(function (eventObject) {
            $data_tooltip = $(this).attr("data-tooltip");
            $("#w1.alert.fade.in").html($data_tooltip)
                .css({
                    "top": eventObject.pageY + 5,
                    "left": eventObject.pageX + 5
                })
                .show();
        }).mouseout(function () {
            $("#w1.alert.fade.in").hide()
                .css({
                    "top": 0,
                    "left": 0
                });
        });
        toggleSidebar('right')
    });


    $('#w1.alert.fade.in').attr('data-tooltip', 'tr');
    $(function () {
        $("#w0 .task_status_blue").mousemove(function (eventObject) {
            $data_tooltip = $(this).attr("data-tooltip");
            $("#w1.alert.fade.in").html($data_tooltip)
                .css({
                    "top": eventObject.pageY + 5,
                    "left": eventObject.pageX + 5
                })
                .show();
        }).mouseout(function () {
            $("#w1.alert.fade.in").hide()
                .css({
                    "top": 0,
                    "left": 0
                });
        });
    });


    if (document.location.href == 'https://my.gov.uz/ru' || document.location.href == 'https://my.gov.uz/ru/juridicalCabinet/site/index') {
        $('body').addClass('main_body');
    }
    if (document.location.href == 'https://my.gov.uz/uz' || document.location.href == 'https://my.gov.uz/uz/juridicalCabinet/site/index') {
        $('body').addClass('main_body');
    }
    if (document.location.href == 'https://my.gov.uz/oz' || document.location.href == 'https://my.gov.uz/oz/juridicalCabinet/site/index') {
        $('body').addClass('main_body');
    }

    if (window.location.href.indexOf("https://my.gov.uz/uz/juridicalCabinet/all-services") > -1) {
        $('body').addClass('main_body');
    }
    if (window.location.href.indexOf("https://my.gov.uz/oz/juridicalCabinet/all-services") > -1) {
        $('body').addClass('main_body');
    }
    if (window.location.href.indexOf("https://my.gov.uz/ru/juridicalCabinet/all-services") > -1) {
        $('body').addClass('main_body');
    }

    if (window.location.href.indexOf("https://my.gov.uz/uz/all-services") > -1) {
        $('body').addClass('main_body');
    }
    if (window.location.href.indexOf("https://my.gov.uz/oz/all-services") > -1) {
        $('body').addClass('main_body');
    }
    if (window.location.href.indexOf("https://my.gov.uz/ru/all-services") > -1) {
        $('body').addClass('main_body');
    }

    $(function () {
        $("#tabs_car").tabs().addClass("ui-tabs-vertical ui-helper-clearfix");
        $("#tabs_car li").removeClass("ui-corner-top").addClass("ui-corner-left");
    });


    $('.drop_ftl').click(function () {
        if ($(this).hasClass("dropdown_3")) {
            $("#w2").toggleClass('flt_block_new');
        }
        $(this).parent('.sec-center').toggleClass('fl_new');
        if ($(".sec-center ").hasClass("fl_new")) {
            $("#w2").addClass('flt_block');
        } else {
            $("#w2").removeClass('flt_block');
        }
    });


    var btn_top_sc = $('#button_top');

    $(window).scroll(function () {
        if ($(window).scrollTop() > 300) {
            btn_top_sc.addClass('show');
        } else {
            btn_top_sc.removeClass('show');
        }
    });
    btn_top_sc.on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({scrollTop: 0}, '300');
    });


    if (window.location.href.indexOf("en/service/77") > -1) {
        $('body').addClass('body_inner_service');
    }
    if (window.location.href.indexOf("en/service/63") > -1) {
        $('body').addClass('body_inner_service');
    }
    if (window.location.href.indexOf("en/service/498") > -1) {
        $('body').addClass('body_inner_service');
    }
    if (window.location.href.indexOf("en/service/470") > -1) {
        $('body').addClass('body_inner_service');
    }
    if (window.location.href.indexOf("en/service/138") > -1) {
        $('body').addClass('body_inner_service');
    }
    if (window.location.href.indexOf("en/service/246") > -1) {
        $('body').addClass('body_inner_service');
    }
    if (window.location.href.indexOf("en/service/57") > -1) {
        $('body').addClass('body_inner_service');
    }
    if (window.location.href.indexOf("en/service/403") > -1) {
        $('body').addClass('body_inner_service');
    }
    if (window.location.href.indexOf("en/service/300") > -1) {
        $('body').addClass('body_inner_service');
    }
    if (window.location.href.indexOf("en/service/187") > -1) {
        $('body').addClass('body_inner_service');
    }

    let table_more = "<div class=\"table_more_btn\"><i class=\"fa fa-arrow-down\" aria-hidden=\"true\"></i></div>";
    let table_th1 = $("#myTabContent table.styledTable thead tr th:first-child").html();
    let table_th2 = $("#myTabContent table.styledTable thead tr th:nth-child(2)").html();
    let table_th3 = $("#myTabContent table.styledTable thead tr th:nth-child(3)").html();
    let table_th4 = $("#myTabContent table.styledTable thead tr th:nth-child(4)").html();
    let table_th5 = $("#myTabContent table.styledTable thead tr th:last-child").text();


    let table_tb2 = $("#myTabContent table.styledTable tbody tr td:nth-child(2)").prepend(table_th2);
    let table_tb3 = $("#myTabContent table.styledTable tbody tr td:nth-child(3)").prepend(table_th3);
    let table_tb4 = $("#myTabContent table.styledTable tbody tr td:nth-child(4)").prepend(table_th4);
    let table_tb5 = $("#myTabContent table.styledTable tbody tr td:last-child").prepend(table_th5);


    $('.tab-content .styledTable thead a').click(function (event) {
        event.preventDefault();
    });

    if (window.location.href.indexOf("mrzp") > -1) {
        $('.table.table-hover.noLinks thead a').click(function (evt) {
            evt.preventDefault();
        });
    }

    if (window.location.href.indexOf("all-services") > -1) {
        let txt = $(".serviceCatMenu .active").text();
        $("title").text(txt);
        console.log(txt);
    }

    $("#individualinfoformgettingattorneydrive-date").keydown(function (event) {
        return false;
    });
    $('#individualinfoformgettingattorneydrive-date').prop('readonly', true);


    $('#account_number').bind('input', function () {
        $(this).val(function (_, v) {
            return v.replace(/\s+/g, '');
        });
    });

    if (window.location.href.indexOf("all-services?id=12") > -1) {
        $('.serviceCardHolder .card_icon img').attr('src', '/uploads/sphere/f62314c5-bd1b-f614-74a3-625563e6404d.png?v=2');
    }

    $('.site-error .folder_error .cover ').empty();


    if($(window).width() < 991)
    {
        $('.tab-style.nav.nav-tabs.nopade.owl_kidergarten.owl-carousel').each(function(){
            const list=$(this),
                select=$(document.createElement('select')).insertBefore($(this).hide()).change(function(){
                    window.open($(this).val(),'_self');
                });
            select.addClass("kindergartenDrop");
            $('>li a', this).each(function(){
                const option=$(document.createElement('option'))
                    .appendTo(select)
                    .val(this.href)
                    .html($(this).html());
            });
            list.remove();
        });
    }



    $(".field-bankinfoformeducationalstudentscredit-pact.required label").append("<a href='https://lex.uz/uz/docs/6163025' target='_blank'>https://lex.uz/uz/docs/6163025</a>");

    $(".request-view #w1 + div.text-center ").prepend($(".request-view .alert-info.text-center"));

    if (window.location.href.indexOf("pages/service-price") > -1) {
        $('h4#userName').remove();
    }



});