function Cart(){
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
                $(".giohang-subTotal-"+id).text(data["subTotal"]);
                // $(".giohang-tongtien span").text(data["total"]);
                return false;
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


function Home(){

    $('.list-hot a:first').addClass('active');
    var id = $('.list-hot a:first').data('id');
    var tenkhongdau = $('.list-hot a:first').data('tenkhongdau');
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/load_ajax_product',
        type: 'POST',
        data: {id:id,tenkhongdau:tenkhongdau},
        success:function(data){
            $('.load_ajax_product').html(data);
            OwlPage();
        }
    });

    $('.list-hot a').click(function(event) {
        $('.list-hot a').removeClass('active');
        $(this).addClass('active');
        var id = $(this).data('id');
        var tenkhongdau = $(this).data('tenkhongdau');

        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/load_ajax_product',
            type: 'POST',
            data: {id:id,tenkhongdau:tenkhongdau},
            success:function(data){
                $('.load_ajax_product').html(data);
                OwlPage();

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
    peShiner();
    Toasty();
    Cart();
    Slick();
    OwlPage();
    AosAnimation();
});
