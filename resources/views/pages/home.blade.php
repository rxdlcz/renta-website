@extends('layout.navigation')

@section('title', 'Home')
@section('content')

    <div class="location-content px-5 bg-light pt-3 mb-5">
        <div class="content-header">
            <div class="text-center">
                <h1 class="mx-3 paytone-font">Featured Location</h1>
                <span class="nunito-font">Choose The Best Place For You.</span>
            </div>
        </div>

        @if ($locations->count() > 0)
            <div id="coverflow" class="p-3">
                <ul class="flip-items">
                    @foreach ($locations as $location)
                        <li>
                            <div class="card text-center border border-primary shadow-0 "
                                style="height: 450px;width: 330px;">
                                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                    <img src="https://mdbootstrap.com/img/new/standard/nature/111.webp"
                                        class="img-fluid" />
                                    <a href="#!">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)">
                                        </div>
                                    </a>
                                </div>
                                <div class="card-header text-uppercase koulen-font">{{ $location->location }}</div>
                                <div class="card-body">
                                    <p class="card-text">
                                        Some quick example text to build on the card title and make up the bulk of the
                                        card's content.
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <a href="#cluster-{{ $location->id }}">
                                        <button type="button" class="btn btn-outline-info" data-mdb-ripple-color="dark">See
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

    @foreach ($locations as $location)
        <section id="cluster-{{ $location->id }}" class="scroller">
            <div class="content-header vh-100">
                <div class="text-center">
                    <h1 class="mx-3 paytone-font text-uppercase">{{ $location->location }}</h1>
                    <span class="nunito-font">Choose The Best Place For You.</span>
                    <hr>
                </div>
            </div>
        </section>
    @endforeach

@endsection

@section('javascript')

    <script>
        $(document).ready(function() {
            $('.location-content').addClass("show")
        });

        var myFlipster = $("#coverflow").flipster({
            style: 'carousel',
            spacing: -0.5,
            nav: false,
            buttons: true,
            loop: true,
            fadeIn: 1000,
            autoplay: 3000,
            pauseOnHover: true,
            scrollwheel: false,
            touch: true,
        });

        $("a").on('click', function(event) {

            if (this.hash !== "") {
                event.preventDefault();

                var hash = this.hash;

                if ($('.fixed-top').height() > 150) {
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top - 100
                    }, 1000, function() {});
                }else{
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top - $('.fixed-top').height()
                    }, 1000, function() {});
                }
            }
        });
    </script>

@endsection
