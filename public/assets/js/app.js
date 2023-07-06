function Cart(){
    // SỐ lượng
    $('.giohang-qty').change(function(){
        let id = $(this).data('id');
        let qty = $(this).val();
        let price = $(this).data('price');
        let rowId = $(this).data('rowid');
        data = {
            id:id,
            qty:qty,
            price:price,
            rowId:rowId
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/cart/update_ajax',
            data: data,
            dataType: "JSON",
            method: "GET",
            success: function(data) {
                $(".giohang-subTotal-"+rowId).text(data["subTotal"]);
                $(".load-total-price").text(data["total"]);
                return false;
            },
            error: function(xhr, ajaxOptions, thrownError) {
                // alert(xhr.status);
                // alert(thrownError);
            }
        });
    });

    // Mã giảm giá
    $('.magiamgia_submit').click(function (){
        let promo_code = $(this).parents().find('.promo_code').val();
        // $(this).parents().find('.promo_code').attr('value',promo_code);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/cart/ma-giam-gia',
            data: {
                promo_code : promo_code,
            },
            method: "POST",
            success: function(result) {
                $('.promo_alert').html(result.alert);
                $('.product_total').text(result.totalText);
                $("input[name=product_total]").attr('value',result.total);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                // alert(xhr.status);
                // alert(thrownError);
            }
        });
    });

}
function AosAnimation(){
    AOS.init({});
}
function OwlData(obj){
    if(obj.length < 0) return false;
    var xsm_items = obj.attr("data-xsm-items");
    var sm_items = obj.attr("data-sm-items");
    var md_items = obj.attr("data-md-items");
    var lg_items = obj.attr("data-lg-items");
    var xlg_items = obj.attr("data-xlg-items");
    var rewind = obj.attr("data-rewind");
    var dotsData = obj.attr("data-dotsData");
    var autoplay = obj.attr("data-autoplay");
    var loop = obj.attr("data-loop");
    var lazyLoad = obj.attr("data-lazyload");
    var mouseDrag = obj.attr("data-mousedrag");
    var touchDrag = obj.attr("data-touchdrag");
    var animations = obj.attr("data-animations");
    var smartSpeed = obj.attr("data-smartspeed");
    var autoplaySpeed = obj.attr("data-autoplayspeed");
    var autoplayTimeout = obj.attr("data-autoplaytimeout");
    var dots = obj.attr("data-dots");
    var nav = obj.attr("data-nav");
    var navText = false;
    var navContainer = false;
    var responsive = {};
    var responsiveClass = true;
    var responsiveRefreshRate = 200;

    if(xsm_items != '') { xsm_items = xsm_items.split(":"); }
    if(sm_items != '') { sm_items = sm_items.split(":"); }
    if(md_items != '') { md_items = md_items.split(":"); }
    if(lg_items != '') { lg_items = lg_items.split(":"); }
    if(xlg_items != '') { xlg_items = xlg_items.split(":"); }
    if(rewind == 1) { rewind = true; } else { rewind = false; };
    if(dotsData == 1) { dotsData = true; } else { dotsData = false; };
    if(autoplay == 1) { autoplay = true; } else { autoplay = false; };
    if(loop == 1) { loop = true; } else { loop = false; };
    if(lazyLoad == 1) { lazyLoad = true; } else { lazyLoad = false; };
    if(mouseDrag == 1) { mouseDrag = true; } else { mouseDrag = false; };
    if(animations != '') { animations = animations; } else { animations = false; };
    if(smartSpeed > 0) { smartSpeed = Number(smartSpeed); } else { smartSpeed = 800; };
    if(autoplaySpeed > 0) { autoplaySpeed = Number(autoplaySpeed); } else { autoplaySpeed = 800; };
    if(autoplayTimeout > 0) { autoplayTimeout = Number(autoplayTimeout); } else { autoplayTimeout = 5000; };
    if(dots == 1) { dots = true; } else { dots = false; };
    if(nav == 1)
    {
        nav = true;
        navText = obj.attr("data-navtext");
        navContainer = obj.attr("data-navcontainer");

        if(navText != '')
        {
            navText = (navText.indexOf("|") > 0) ? navText.split("|") : navText.split(":");
            navText = [navText[0],navText[1]];
        }

        if(navContainer != '')
        {
            navContainer = navContainer;
        }
    }
    else
    {
        nav = false;
    };

    responsive = {
        0: {
            items: Number(xsm_items[0]),
            margin: Number(xsm_items[1])
        },
        576: {
            items: Number(sm_items[0]),
            margin: Number(sm_items[1])
        },
        768: {
            items: Number(md_items[0]),
            margin: Number(md_items[1])
        },
        992: {
            items: Number(lg_items[0]),
            margin: Number(lg_items[1])
        },
        1200: {
            items: Number(xlg_items[0]),
            margin: Number(xlg_items[1])
        }
    };

    obj.owlCarousel({
        rewind: rewind,
        autoplay: autoplay,
        loop: loop,
        lazyLoad: lazyLoad,
        dotsData: dotsData,
        mouseDrag: mouseDrag,
        touchDrag: touchDrag,
        smartSpeed: smartSpeed,
        autoplaySpeed: autoplaySpeed,
        autoplayTimeout: autoplayTimeout,
        dots: dots,
        nav: nav,
        navText: navText,
        navContainer: navContainer,
        responsiveClass: responsiveClass,
        responsiveRefreshRate: responsiveRefreshRate,
        responsive: responsive
    });
}

function OwlPage(){
    if($('.owl-page').length > 0){
        $('.owl-page').each(function(){
            OwlData($(this));
        });
    }
}
function Search()
{
    if ($("#keyword").length) {
        $("#keyword").keyup(function(event) {
            var key = $(this).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/load_ajax_search',
                type: "POST",
                data: {
                    key: key,
                },
                success: function(result) {
                    if (result != '') {
                        $('.show-search').removeClass('d-none');
                        $('.show-search').html(result);
                    } else {
                        if (!$('.show-search').hasClass('d-none')) {
                            $('.show-search').addClass('d-none');
                        }
                        $('.show-search').html('');
                    }
                }
            });
        });
    }
    var placeholderText = ['Nhập từ khóa sản phẩm...', 'Bạn cần tìm gì?'];
    $('#keyword').placeholderTypewriter({
        text: placeholderText
    });
}

function Photobox(){
    // applying photobox on a `gallery` element which has lots of thumbnails links.
    // Passing options object as well:
    //-----------------------------------------------
    $('#gallery').photobox('a',{ time:6 });

    // using a callback and a fancier selector
    //----------------------------------------------
    $('#gallery').photobox('li > a.family',{ time:0 }, callback);
    function callback(){
        console.log('image has been loaded');
    }

    // destroy the plugin on a certain gallery:
    //-----------------------------------------------
    $('#gallery').photobox('destroy');

    // re-initialize the photbox DOM (does what Document ready does)
    //-----------------------------------------------
    $('#gallery').photobox('prepareDOM');
}
function Home(){
    $('.list-hot a:first').addClass('active');
    var id_category = $('.list-hot a:first').data('id');
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/load_ajax_product',
        type: 'POST',
        data: {id_category:id_category,},
        success:function(data){
            $('.load_ajax_product').html(data);
            OwlData($('.owl-pronb'));

        }
    });

    $('.list-hot a').click(function(event) {
        $('.list-hot a').removeClass('active');
        $(this).addClass('active');
        var id_category = $(this).data('id');

        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/load_ajax_product',
            type: 'POST',
            data: {id_category:id_category,},
            success:function(data){
                $('.load_ajax_product').html(data);
                OwlData($('.owl-pronb'));
            }
        })
    });

    $('.name-header').textillate({
        in:{
            effect: 'animate__bounceIn'
        },
        out: {
            effect: 'animate__bounceOut'
        },
        loop: true
    });

}

function Menu(){
    /* Menu fixed */
    $(window).scroll(function(){
        var cach_top = $(window).scrollTop();
        var height_header = $('.header').height();

        if(cach_top >= height_header){
            if(!$('.header').hasClass('fix_head animate__animated animate__fadeIn')){
                $('.header').addClass('fix_head animate__animated animate__fadeIn');
            }
        }else{
            $('.header').removeClass('fix_head animate__animated animate__fadeIn');
        }
    });
}
function Slick(){
    if($('.rowDetailPhoto-for').length > 0){
        $('.rowDetailPhoto-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            arrows: false,
            asNavFor: '.rowDetailPhoto-nav'
          });
          $('.rowDetailPhoto-nav').slick({
            slidesToShow: 9,
            slidesToScroll: 1,
            asNavFor: '.rowDetailPhoto-for',
            dots: false,
            centerMode: false,
            vertical: true,
            focusOnSelect: true,
            arrows: false,
          });

    }
}

function Toasty(){
    $('.ToastyFunction').click(function(){
        var option =
        {
            animation : true,
            delay : 10000
        };
        var toastHTMLElement = document.getElementById( 'CheckLoginToast' );
        var toastElement = new bootstrap.Toast( toastHTMLElement, option );
        toastElement.show( );
    });

    $('.ToastyFunction').trigger('click');

}

function peShiner(){
    $(window).bind("load", function () {
        var api = $(".peShiner").peShiner({
          api: true,
          paused: true,
          reverse: true,
          repeat: 1,
          color: "fireHL",
      });

        api.resume();

    });
}

$(document).ready(function () {
    Home();
    Photobox();
    Search();
    peShiner();
    Toasty();
    Cart();
    Slick();
    OwlPage();
    AosAnimation();
    Menu();
});
