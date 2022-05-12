@extends('layout.navigation')

@section('title', 'Home')
@section('content')
    <div class="background-parallax">
        <div class="coverflow-wrapper">
            <div class="location-content px-5 pt-3 mb-5">
                <div class="content-header">
                    <div class="text-center text-light">
                        <h1 class="mx-3 paytone-font">Featured Locations</h1>
                        <span class="nunito-font">Choose The Best Place For You.</span>
                        <div class="border-shape"></div>
                    </div>
                </div>

                @if ($locations->count() > 0)
                    <div id="coverflow" class="p-5">
                        <ul class="flip-items">
                            @foreach ($locations as $location)
                                <li>
                                    <div class="card text-center border border-primary shadow-0 "
                                        style="height: 450px;width: 330px;">
                                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                            <img src="https://mdbootstrap.com/img/new/standard/nature/111.webp"
                                                class="img-fluid" />
                                            <a>
                                                <div class="mask"
                                                    style="background-color: rgba(251, 251, 251, 0.15)">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="card-header text-uppercase koulen-font">{{ $location->location }}
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">
                                                Some quick example text to build on the card title and make up the bulk of
                                                the
                                                card's content.
                                            </p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="#cluster-{{ $loop->index }}" class="scroll-link">
                                                <button type="button" class="btn btn-outline-info"
                                                    data-mdb-ripple-color="dark">See
                                                    listing
                                                    unit</button>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="container-fluid">
        @foreach ($locations as $location)
            <section class="py-5 cluster-section" {{ $loop->index == 0 ? 'style=opacity:1;display:block;' : '' }}
                id="cluster-{{ $loop->index }}">
                <div class="content-header cHeader{{ $loop->index }}">
                    <div class="text-center">
                        <h1 class="mx-3 paytone-font text-uppercase">{{ $location->location }}</h1>
                        <span class="nunito-font">Available Room For You.</span>
                        <div class="border-shape"></div>
                        <div class="container locationNav-wrapper py-3 px-4 rounded-pill my-3">
                            @foreach ($locations as $locationNav)
                                <a href="#cluster-{{ $loop->index }}" class="scroll-link">
                                    <button type="button"
                                        class="btn btn-info m-1 btn-rounded">{{ $locationNav->location }}</button>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="container px-5 cluster cBody{{ $loop->index }}"
                    {{ $loop->index == 0 ? 'style=display:block;' : '' }}>
                    <div class=" row justify-content-center px-5">
                        @foreach ($units as $unit)
                            @if ($location->id == $unit->location_id)
                                @if ($loop->index < 4)
                                    <div class="col-md-4 unit-card">
                                        <div class="card mt-2">
                                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                                <img src="https://mdbootstrap.com/img/new/standard/nature/111.webp"
                                                    class="img-fluid" />
                                                <a>
                                                    <div class="mask"
                                                        style="background-color: rgba(251, 251, 251, 0.15)">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="card-body poppins-font">
                                                <h5 class="card-title text-capitalize fw-bold">Unit {{ $unit->name }}
                                                </h5>
                                                <p class="card-text">
                                                    Some quick example text to build on the card title and make up the bulk
                                                    of
                                                    the
                                                    card's content.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-4 unit-card more-card">
                                        <div class="card mt-2">
                                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                                <img src="https://mdbootstrap.com/img/new/standard/nature/111.webp"
                                                    class="img-fluid" />
                                                <a>
                                                    <div class="mask"
                                                        style="background-color: rgba(251, 251, 251, 0.15)">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="card-body poppins-font">
                                                <h5 class="card-title text-capitalize fw-bold">Unit {{ $unit->name }}
                                                </h5>
                                                <p class="card-text">
                                                    Some quick example text to build on the card title and make up the bulk
                                                    of
                                                    the
                                                    card's content.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                        <span class="no-unit d-none text-center bg-light pt-3 poppins-font" style="height:5rem;">Sorry
                            There's No Unit Available Yet. <br> Please See Other Places.</span>
                    </div>
                </div>
                <div class="footer text-center mt-5 cFooter{{ $loop->index }}">
                    <a href="#cluster-{{ $loop->index }}" class="viewAll-link">
                        <button type="button" class="btn btn-outline-danger py-4 px-5 fw-bold viewAll-btn"
                            data-mdb-ripple-color="dark">view all</button>
                    </a>
                </div>
            </section>
        @endforeach
    </div>

    <button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>
@endsection

@section('javascript')

    <script>
        $(document).ready(function() {
            $('.location-content').addClass("show-animation-slideDown")
        });

        //featured location coverflow initialize
        var myFlipster = $("#coverflow").flipster({
            style: 'carousel',
            spacing: -0.4,
            nav: false,
            buttons: true,
            loop: true,
            fadeIn: 1000,
            autoplay: 3000,
            pauseOnHover: true,
            scrollwheel: false,
            touch: true,
        });

        //scroll to location cluster
        $('.scroll-link').on('click', function(event) {

            if (this.hash !== "") {
                event.preventDefault();

                var hash = this.hash;

                var cardNum = $(hash + ' .cluster .row .unit-card').length;
                var noUnit = $(hash + ' .cluster .row .no-unit');
                if (cardNum > 0) {
                    noUnit.addClass('d-none');
                    noUnit.removeClass('d-block');
                } else {
                    noUnit.removeClass('d-none');
                    noUnit.addClass('d-block');
                }

                //Show animation
                $('.cluster-section').each(function() {
                    $('.cluster-section').removeAttr('style');
                    $('.cluster-section .cluster').removeAttr('style');
                });
                $(hash).show();

                $(hash + ' .cluster').fadeIn();

                //Scroll to Unit cluster
                if ($('.fixed-top').height() > 150) {
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top - 100
                    }, 1000, function() {});
                } else {
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top - $('.fixed-top').height()
                    }, 1000, function() {});
                }
            }
        });

        $('.viewAll-link').click('click', function(e) {
            event.preventDefault();
            var hash = this.hash;

            $(hash + ' .cluster .row .more-card').each(function(index) {
                $(hash + ' .cluster .row .more-card').slideToggle(function() {
                    if ($(this).is(':visible')) {
                        $('.btn.viewAll-btn').text('view less')
                    } else {
                        $('.btn.viewAll-btn').text('view all')
                    }
                });
            });
        });

        //Scroll to Top function
        $(window).scroll(function() {

            if ($(this).scrollTop() > 600) {
                $("#btn-back-to-top").fadeIn();
            } else {
                $("#btn-back-to-top").fadeOut();
            }
        });
        $("#btn-back-to-top").click(function() {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });
    </script>

@endsection



{{-- @foreach ($locations as $location)
@if ($loop->iteration % 2 == 0)
    <section class="py-5 bg-light">
    @else
        <section class="py-5">
@endif

<div id="cluster-{{ $loop->index }}" class="content-header cluster cHeader{{ $loop->index }}">
    <div class="text-center">
        <h1 class="mx-3 paytone-font text-uppercase">{{ $location->location }}</h1>
        <span class="nunito-font">Available Room For You.</span>
        <div class="border-shape"></div>
    </div>
</div>
<div class="container px-5 cluster cBody{{ $loop->index }}">
    <div class="row justify-content-center">
        @foreach ($units as $unit)
            @if ($location->id == $unit->location_id)
                <div class="col-md-4 unit-card">
                    <div class="card mt-2">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img src="https://mdbootstrap.com/img/new/standard/nature/111.webp"
                                class="img-fluid" />
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)">
                                </div>
                            </a>
                        </div>

                        <div class="card-body poppins-font">
                            <h5 class="card-title text-capitalize fw-bold">Unit {{ $unit->name }}</h5>
                            <p class="card-text">
                                Some quick example text to build on the card title and make up the bulk of
                                the
                                card's content.
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
<div class="footer text-center mt-5 cluster cFooter{{ $loop->index }}">
    <button type="button" class="btn btn-primary">View More..</button>
</div>
</section>
@endforeach --}}


{{-- <div class="count-up-sec">
    <div class="images-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 inner">
                <div class="counting_sl">
                    <span><i class="fa fa-gift"></i></span>
                    <h2 class="counter">250</h2>
                    <h4>Project Done</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 inner">
                <div class="counting_sl">
                    <span><i class="fa fa-users"></i></span>
                    <h2 class="counter">280</h2>
                    <h4>happy client</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 inner">
                <div class="counting_sl">
                    <span><i class="fa fa-institution"></i></span>
                    <h2 class="counter">120</h2>
                    <h4>Branches</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 inner">
                <div class="counting_sl">
                    <span><i class="fa fa-user"></i></span>
                    <h2 class="counter">240</h2>
                    <h4>Our employees</h4>
                </div>
            </div>
        </div>
    </div>
</div> --}}
