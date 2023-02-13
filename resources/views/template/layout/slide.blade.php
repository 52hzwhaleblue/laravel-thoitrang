@if (count($slide))
<div class="slideshow">
    <div class="owl-page owl-carousel owl-theme"
        data-xsm-items="1:0"
        data-sm-items="1:0"
        data-md-items="1:0"
        data-lg-items="1:0"
        data-xlg-items="1:0"
        data-rewind="1"
        data-autoplay="1"
        data-loop="0"
        data-lazyload="0"
        data-mousedrag="1"
        data-touchdrag="1"
        data-smartspeed="800"
        data-autoplayspeed="800"
        data-autoplaytimeout="5000"
        data-dots="0"
        data-nav="1"
        data-navtext="<svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-arrow-narrow-left' width='50' height='37' viewBox='0 0 24 24' stroke-width='1' stroke='#ffffff' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><line x1='5' y1='12' x2='19' y2='12' /><line x1='5' y1='12' x2='9' y2='16' /><line x1='5' y1='12' x2='9' y2='8' /></svg>|<svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-arrow-narrow-right' width='50' height='37' viewBox='0 0 24 24' stroke-width='1' stroke='#ffffff' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><line x1='5' y1='12' x2='19' y2='12' /><line x1='15' y1='16' x2='19' y2='12' /><line x1='15' y1='8' x2='19' y2='12' /></svg>"
        data-navcontainer=".control-slideshow">
        @foreach ($slide as $v )
            <div class="slideshow-item">
                <img
                    src="{{
                        asset(
                            'backend/assets/img/photo/'.$v['photo']
                        )
                    }}"
                    alt="slide"
                />
            </div>
        @endforeach

    </div>
    <div class="control-slideshow control-owl transition"></div>
</div>
@endif
