@extends('layout.navigation')

@section('title', 'Contact Us')
@section('content')
    <div class="background">
        <div class="contact-wrapper pb-5 d-flex justify-content-center">
            <div class="content-header mt-5 text-center">
                <h1 class="satisfy-font">Contact Us</h1>
                <span class="nunito-font h5 text-white">Feel free to drop us a line below!</span>
            </div>
        </div>
    </div>

    <div class="container contact-body py-5 ">
        <div class="row ps-5">
            <div class="col-md-8 pe-5 mt-4 show-animation-slideLeftFade">
                <h2 class="p-3 text-uppercase">Send As a Message</h2>
                <form class="">
                    <fieldset>
                        <div class="form-group d-flex ">
                            <div class="form-outline shadow-4 m-2 half-col">
                                <input type="text" class="form-control" />
                                <label class="form-label" for="typeText">Firstname</label>
                            </div>
                            <div class="form-outline shadow-4 m-2 half-col">
                                <input type="text" class="form-control" />
                                <label class="form-label" for="lastname">Lastname</label>
                            </div>
                        </div>
                        <div class="form-group d-flex ">
                            <div class="form-outline shadow-4 m-2 half-col">
                                <input type="email" class="form-control" />
                                <label class="form-label" for="typeText">Email</label>
                            </div>
                            <div class="form-outline shadow-4 m-2 half-col">
                                <input type="text" class="form-control" />
                                <label class="form-label" for="lastname">Subject</label>
                            </div>
                        </div>
                        <div class="form-outline shadow-4 m-2 full-col">
                            <textarea class="form-control" id="textAreaExample" rows="10"></textarea>
                            <label class="form-label" for="textAreaExample">Message</label>
                        </div>
                        <div class="form-group mt-4 ms-2">
                            <button type="button"
                                class="btn btn-outline-danger py-3 px-4 fw-bold viewAll-btn ripple-surface-dark"
                                data-mdb-ripple-color="dark" style="">Send Now</button>
                        </div>
                    </fieldset>
                </form>
            </div>

            <div class="col-md-4 my-4 show-animation-slideRightFade">
                <div class="contact-person">
                    <h2 class="py-3 px-2">Where To Find Us</h2>
                    <div class="single-info">
                        <h2>Address</h2>
                        <p>Lorem ipsum dolor sit amet, eros rem dui sollicitudin eros sapien, volutpat mattis a, tempus
                            etiam ut nostra non, eu vestibulum mi purus justo fringilla nulla, amet et volutpat. In morbi
                            fusce facilisis, turpis et lorem in vitae odio.</p>
                    </div>
                    <div class="single-info">
                        <h2>Email: </h2>
                        <p>yourdomain@gmail.com</p>
                    </div>
                    <div class="single-info">
                        <h2>Phone:</h2>
                        <p>(+45) 123 456 789</p>
                    </div>
                    <div class="single-info">
                        <h2>Skype:</h2>
                        <p>your_skype</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 px-5 mt-5 col-map">
            <div class="map-heading">
                <h2>Find Us on Google Map</h2>
            </div>
            <div class="map-wrapper p-3 shadow-5">
                <div class="map-responsive">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m21!1m12!1m3!1d1929.3602782639757!2d121.13389868407523!3d14.728384546105053!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m6!3e0!4m0!4m3!3m2!1d14.728389199999999!2d121.13441619999999!5e0!3m2!1sen!2sph!4v1652470343538!5m2!1sen!2sph"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
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
