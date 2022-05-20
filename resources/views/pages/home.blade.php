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
                                            <img src="{{ env('CRM_URL') . "/img/locationImg/$location->img"}}"
                                                class="img-fluid" loading="lazy" />
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
                                                {{ $location->description}}
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
            <section class="py-5 cluster-section sec-active"
                {{ $loop->index == 0 ? 'style=opacity:1;display:block;' : '' }} id="cluster-{{ $loop->index }}">
                <div class="content-header cHeader{{ $loop->index }}">
                    <div class="text-center">
                        <h1 class="mx-3 paytone-font text-uppercase location-name">{{ $location->location }}</h1>
                        <span class="nunito-font text-muted">Available Room For You.</span>
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
                        @foreach ($units->byUnit($location->id) as $unit)
                            @if ($loop->index < 3)
                                <div class="col-md-4 unit-card">
                                    <div class="card mt-3">
                                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                            <img src="{{ env('CRM_URL') . "/img/unitImg/$unit->img"}}" onerror="this.onerror=null;this.src='img/defaultimage.png';"
                                                class="img-fluid" loading="lazy" />
                                            <a>
                                                <div class="mask"
                                                    style="background-color: rgba(251, 251, 251, 0.15)">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="card-body poppins-font">
                                            <h5 class="card-title text-capitalize fw-bold">Unit {{ $unit->name }}</h5>
                                            <p class="card-text">
                                                {{$unit->description}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-4 more-card unit-card">
                                    <div class="card mt-3">
                                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                            <img src="https://mdbootstrap.com/img/new/standard/nature/111.webp"
                                                class="img-fluid" loading="lazy" />
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
                                                Some quick example text to build on the card title and make up the bulk of
                                                the card's content.
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
                    <a href="#cluster-{{ $loop->index }}" class="viewAll-link">
                        <button type="button" id="cluster-{{ $loop->index }}-btn"
                            class="btn btn-outline-danger py-4 px-5 fw-bold viewAll-btn" data-mdb-ripple-color="dark">view
                            all</button>
                    </a>
                </div>
            </section>
        @endforeach
    </div>

    <div class="mt-5 bookNow-container">
        <div class="mb-5 back-color">
            <div class="space-top"></div>
            <div class="contactHeader text-center">
                <h1 class="pt-5 text-white satisfy-font">Book Now</h1>
                <span class="nunito-font h5">Book Your Chosen Room</span>
            </div>
            <div class="container body-content p-5">
                <div class="container bg-light d-flex align-items-center justify-content-center px-5 shadow-5">
                    <form action="/bookNow" method="POST" id="bookNowForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label nunito-font text-dark ps-2">Location</label>
                                <input type="text" name="location" id="location-input"
                                    class="form-control form-control-lg bg-light" value="san jose" readonly />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label nunito-font text-dark ps-2">Room</label>
                                <input type="text" name="unit" id="unit-input" class="form-control form-control-lg bg-light"
                                    value="Choose Room" readonly />
                            </div>
                            <div class="col-md-4">
                                <label class="form-label nunito-font text-dark ps-2">Email</label>
                                <input type="email" name="email" id="email-input"
                                    class="form-control form-control-lg bg-light" required />
                            </div>
                            <div class="col-md-2 d-flex align-content-end flex-wrap">
                                <button class="contact100-form-btn nunito-font">
                                    <span>
                                        Book
                                        <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if (Session::has('confirmation'))
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content poppins-font">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title">Confirmation</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-4">{{ Session::get('confirmation') }}</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (Session::has('success'))
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content poppins-font">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title">Thank You for your Booking!</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-4">{{ Session::get('success') }}</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection

@section('javascript')

    <script>
        $(document).ready(function() {
            $('.location-content').addClass("show-animation-slideDown")
            homepage();
            $('#successModal').modal('show')
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
    </script>

@endsection
