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
                                            <a href="#cluster-{{ $loop->index }}">
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
            <section class="py-5 cluster-section {{ $loop->index == 0 ? 'show-block' : 'hidden-block' }}"
                id="cluster-{{ $loop->index }}">
                <div class="content-header cHeader{{ $loop->index }}">
                    <div class="text-center">
                        <h1 class="mx-3 paytone-font text-uppercase">{{ $location->location }}</h1>
                        <span class="nunito-font">Available Room For You.</span>
                        <div class="border-shape"></div>
                        @foreach ($locations as $locationNav)
                            <a href="#cluster-{{ $loop->index }}">
                                <button type="button" class="btn btn-primary">{{ $locationNav->location }}</button>
                            </a>   
                        @endforeach
                    </div>
                </div>
                <div class="container px-5 cluster cBody{{ $loop->index }}">
                    <div class="row justify-content-center px-5">
                        @foreach ($units as $unit)
                            @if ($location->id == $unit->location_id)
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
                        <span class="no-unit d-none text-center bg-light pt-3 poppins-font" style="height:5rem;">Sorry
                            There's No Unit Available Yet. <br> Please See Other Places.</span>
                    </div>
                </div>
                <div class="footer text-center mt-5 cFooter{{ $loop->index }}">
                    <button type="button" class="btn btn-primary">View More..</button>
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
            $('.location-content').addClass("show")
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
        $("a").on('click', function(event) {

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


                $('.cluster-section').each(function() {
                    $(this).removeClass('show-block');
                    $(this).addClass('hidden-block');
                });

                $(hash).addClass('show-block');
                $(hash).removeClass('hidden-block');
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

        //Get the button
        let mybutton = document.getElementById("btn-back-to-top");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction();
        };

        function scrollFunction() {
            if (
                document.body.scrollTop > 500 ||
                document.documentElement.scrollTop > 500
            ) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }
        // When the user clicks on the button, scroll to the top of the document
        mybutton.addEventListener("click", backToTop);

        function backToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }

        /* $("#coverflow li").each(function(index) {
            var controller = new ScrollMagic.Controller();
            var headerScene = new ScrollMagic.Scene({
                    offset: -400,
                    triggerElement: '.cHeader' + index
                })
                .setClassToggle('.cHeader' + index, 'show')
                .addTo(controller);

            var headerScene = new ScrollMagic.Scene({
                    offset: -400,
                    triggerElement: '.cBody' + index
                })
                .setClassToggle('.cBody' + index, 'show')
                .addTo(controller);

            var headerScene = new ScrollMagic.Scene({
                    offset: -450,
                    triggerElement: '.cFooter' + index
                })
                .setClassToggle('.cFooter' + index, 'show')
                .addTo(controller);
        }); */
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
