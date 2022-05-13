@extends('layout.navigation')

@section('title', 'Home')
@section('content')
    <div class="background">
        <div class="contact-wrapper pb-5 d-flex justify-content-center">
            <div class="content-header mt-5 text-center">
                <h1 class="satisfy-font">Contact Us</h1>
                <span class="nunito-font h5 text-white">Feel free to drop us a line below!</span>
            </div>
        </div>
    </div>

    <div class="container contact-body">
        <div class="row">
            <div class="col-md-8">
                <form class="contact100-form">
            <div class="wrap-input100">
                <span class="label-input100">Full Name:</span>
                <input class="input100" type="text" name="name" placeholder="Enter full name">
            </div>
            <div class="wrap-input100 ">
                <span class="label-input100">Email:</span>
                <input class="input100" type="text" name="email" placeholder="Enter email addess">
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 ">
                <span class="label-input100">Phone:</span>
                <input class="input100" type="text" name="phone" placeholder="Enter phone number">
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 ">
                <span class="label-input100">Message:</span>
                <textarea class="input100" name="message" placeholder="Your Comment..." style="height: 164px;"></textarea>
                <span class="focus-input100"></span>
            </div>
            <div class="container-contact100-form-btn">
                <button class="contact100-form-btn">
                    <span>
                        Submit
                        <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                    </span>
                </button>
            </div>
        </form>
            </div>
        </div>
        
    </div>

    <div class="vh-100"></div>

@endsection

@section('javascript')

    <script>
        $(document).ready(function() {});
    </script>

@endsection
