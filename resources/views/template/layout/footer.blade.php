<div class="footer">
    <div class="footer-article padding-top-bottom">
        <div class="wrap-content d-flex flex-wrap align-items-start justify-content-between">
            <div class="footer-news">
                <p class="footer-title"> thông tin liên hệ </p>
                <div class="footer-info"> {!! $footer ? $footer['content'] : '' !!} </div>
            </div>
            <div class="footer-news">
                <p class="name-company-footer"> {{ $footer ? $footer['name'] :''  }} </p>
                <p class="name-company-footer1">   {!! $footer ? $footer['desc']  : ''!!} </p>
                @if(!empty($social) )
                <div class="social social-footer d-flex align-items-center justify-content-center">
                    @foreach($social as $k => $v)
                        <div class="mx-2">
                            <img class="lazyload"src="{{ asset('http://localhost:8000/storage/'.$v->photo) }}" alt="{{$v->name}}" />
                        </div>
                    @endforeach
                </div>
                @endif

            </div>
            <div class="footer-news">
                <p class="footer-title">Fanpage facebook</p>
                <div id="fb-root"></div>
                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v16.0"
                    nonce="YXJW5Iw5"></script>

                <div class="fb-page" data-href="https://www.facebook.com/coolmate.me" data-tabs="timeline" data-width="350" data-height="300" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/coolmate.me" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/coolmate.me">Coolmate</a></blockquote></div>
            </div>
        </div>
    </div>
</div>


<iframe
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.3875757185633!2d106.67894201524098!3d10.781598562045277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f28c2cd55c1%3A0xe27fb6cfb3584c2f!2zVHJ1bmcgdMOibSBN4bulYyB24bulIETDsm5nIENow7phIEPhu6l1IFRo4bq_!5e0!3m2!1svi!2s!4v1678193878192!5m2!1svi!2s"
    width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
    referrerpolicy="no-referrer-when-downgrade"></iframe>
