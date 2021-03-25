/* js */
jQuery(function ($) {
    var url = location.href;
    var method = url.split('/');
    var cnt = 0;
    var windowWidthSize = $(window).width();
    var len = $('.sub_nav > li > a').length;
    img = 0;
    end = $('.ani-li').length-1;
    var scnt = 0;

    //header 메뉴 hover


    //이미지 슬라이드

    var slide = {
        slide: null,
        on : function () {
            slide.off();
            this.slide = setTimeout(function () {
                if ( img === 3 ) {
                    scnt = 1;
                }
                if ( scnt === 1) {
                    img--;
                }
                if ( img === -1 ){
                    scnt = 0;
                    img++;
                }
                if ( scnt === 0 ) {
                    img++;
                }
                // img === end ? img = scnt : img ++;
                ani(img);
            },6000)
        },
        off : function () {
            clearTimeout(this.slide);
        }
    }

    function ani(img) {
        $(".ani-indexbutton").each(function(index, element) {
            if($(element).hasClass(img)) {
                $(".ani-indexbutton").not(this).css({
                    'background':'none',
                    'border':'1px solid #fff'
                });
                $(this).css({
                    'background-color':'#333',
                    'border':'none'
                });
            }
        });
        slide.on();

        $(".ani-ul").animate({"margin-left": - 100 * img + "%"}, 1500);

    }

    ani(img);

    $(".ani-indexbutton").on("click", function(e){
        img = Number($(this).attr("title"));
        ani(img);
        e.preventDefault();
    })

    $(".ani-a1213").on("click", function(e){
        cnt++;
        if ( cnt % 2 == 1 ) {
            slide.off();
            $(".ani-a1213").css({
                width: 0,
                height: 0,
                "border-top":"5px solid transparent",
                "border-bottom":"5px solid transparent",
                "border-left":"8px solid white",
                "border-right":0
            })
            $(".ani-indexbutton").on("click", function(e){
                img = Number($(this).attr("title"));
                ani(img);
                $(".ani-a1213").css({
                    width: "8px",
                    height: "10px",
                    "border-top":0,
                    "border-bottom":0,
                    "border-left":"2px solid #fff",
                    "border-right":"2px solid #fff"
                })
                e.preventDefault();
            })
        }else if ( cnt % 2 == 0 ) {
            slide.on();
            $(".ani-a1213").css({
                width: "8px",
                height: "10px",
                "border-top":0,
                "border-bottom":0,
                "border-left":"2px solid #fff",
                "border-right":"2px solid #fff"
            })
        }
    })

    //서브페이지 메뉴색칠하는곳
    for (len = 0; len <= 19; len++) {
        var dataKey = $('.sub_nav > li > a').eq(len).data('name');
        if ( method[5] == dataKey ) {
            $('.sub_nav > li').eq(len).css("background-color","#333")
            $('.sub_nav > li').eq(len).css("color","#fff");
        }
    }

    //서브페이지 메뉴바 화면사이즈가 1024 이하만 클릭가능
    $('.sub_menu:not(.first_menu)').on('click', function (e) {
        if (windowWidthSize <= 1024 ) {
            cnt++;
            e.preventDefault()
            if (cnt % 2 == 0) {
                $('.sub_nav > li').slideUp(500)
                $(this).children().children().eq(0).removeClass('_active');
            } else {
                $('.sub_nav > li').slideDown(500);
                $(this).children().children().eq(0).addClass('_active');
            }
        }
    })


    //서브페이지 중 1
    $('.sub_step > li > img:not(.first_img)').on('click', function () {
        if($(this).hasClass('checked')) {
            return false;
        }

        var count = $(this).parent().index()+1;
        var data = $('.sub_step').data('step');
        if ( data === "first") {
            $('.sub_step_content').html("<img src='../../../static/img/coconsulting/consulting-2-" + count +".jpg'>")
        }else if (data === "second") {
            $('.sub_step_content').html("<img src='../../../static/img/coconsulting/agencies-text-2-" + count +".png'>")
        }else if  (data === "third") {
            //서브페이지 메뉴바 화면사이즈가 1024 이상일떈 append() 아닐떈 html()
            if (windowWidthSize > 1024 ) {
                $(this).addClass('checked');

                $('.sub_step_content').append("<img src='../../../static/img/qudesign/blind-1-" + count + ".png'>")
                $('.sub_step_content > img:not(".first_img")').css("width",'15%')
            }else if (windowWidthSize <= 1024 ) {
                $('.sub_step_content').html("<img src='../../../static/img/qudesign/blind-1-" + count + ".png'>")
            }
        }
    })

    $('.menu_btn').on('click', function () {
        $(this).css("width","10%")

    })

    $('.search_wrap_on').on('click',function () {
        $('.search_wrap_on').css('display','none');
        $('.search_wrap_off').slideDown();
    })


    // 모바일 버전 메뉴바
    $('.top_menu').on('click',function () {
        cnt++;
        $('.sub_gnb_nav').clearQueue().stop();
        if (cnt % 2 == 1) {
            $('.sub_gnb_nav').slideDown(300);
        } else if (cnt % 2 == 0) {
            $('.sub_gnb_nav').slideUp(300);
        }
    });

    // 화면 사이즈가 1024이상일떄 모바일 떄 메뉴 안눌림
    if (windowWidthSize <= 1024 ) {
        $('.sub_gnb_nav_inner > ul > li').on('click', function () {
            cnt++;

            $('.sub_gnb_nav_inner > ul > li ').clearQueue().stop()
            if (cnt % 2 == 1) {
                $(this).children().removeClass('_active');
                $(this).children().eq(1).slideUp(300)
            } else if (cnt % 2 == 0) {
                $(this).children().eq(0).addClass('_active');
                $(this).children().eq(1).slideDown(300)
            }
        })
    }


    // url의 4번쨰 값이 more이거나 file일떄 sub_title의 border 제거
    if ( method[4] == "more" || method[4] == "file") {
        $('.sub_title').css('border','0')
    }
})