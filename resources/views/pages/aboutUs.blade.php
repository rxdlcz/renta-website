@extends('layout.navigation')

@section('title', 'About Us')
@section('content')
    <div class="background">
        <div class="about-wrapper pb-5 d-flex justify-content-center">
            <div class="content-header mt-5 text-center">
                <h1 class="satisfy-font px-2">About Us</h1>
                <span class="nunito-font h5 text-white">Lorem ipsum dolor sit amet</span>
            </div>
        </div>
    </div>

    <div class="container about-body p-5 d-flex justify-content-center">
        <div class="innerWrapper text-center">
            <div class="content-header mt-5">
                <h1 class="satisfy-font mb-3 fs-3 show-delay" style="color:#ffa752;">Welcome to Our Renta</h1>
                <span class="nunito-font h5 text-black fs-1 show-animation-fade-3">A few words about</span>
            </div>
            <div class="content-body mt-5">
                <div class="img-border p-2 show-animation-slideUp-1">
                    <img src="https://mdbootstrap.com/img/new/standard/nature/111.webp" class="img-fluid"
                        loading="lazy" />
                </div>
                <div class="content-text text-black my-5">
                    <p>Lorem ipsum dolor sit amet, accumsan et ad rhoncus in ridiculus risus, orci integer sed aliquam
                        praesent, aliquam in vulputate metus. Pellentesque dignissim auctor nibh vel vestibulum, tempor sed
                        id ut faucibus. Quam vulputate adipiscing. Mauris penatibus vestibulum nec nulla pharetra non, ac
                        eget faucibus id turpis malesuada, urna eget, nam adipiscing, in et at turpis et porta.

                        Lorem ipsum dolor sit amet, accumsan et ad rhoncus in ridiculus risus, orci integer sed aliquam
                        praesent, aliquam in vulputate metus. Pellentesque dignissim auctor nibh vel vestibulum, tempor sed
                        id ut faucibus. Quam vulputate adipiscing. Mauris penatibus vestibulum nec nulla pharetra non, ac
                        eget faucibus id turpis malesuada, urna eget, nam adipiscing, in et at turpis et porta.Pellentesque
                        dignissim auctor nibh vel vestibulum, tempor sed id ut faucibus. Quam vulputate adipiscing. Mauris
                        penatibus vestibulum nec nulla pharetra non.</p>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('javascript')

    <script>
        $(document).ready(function() {
            $('.col-map').waypoint(function() {
                $('.col-map').css({
                    animation: "slide-up 1000ms,fade 1500ms",
                    opacity: "1"
                });
            }, {
                offset: '75%'
            });
        });
    </script>

@endsection
