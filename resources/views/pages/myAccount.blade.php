@extends('layout.navigation')

@section('title', 'My Account')
@section('content')
    <div class="content-header d-flex justify-content-between ps-3 align-items-center">
        <div class="d-flex">
            <span>
                <img src="img/icon/myAccount.png" alt="myAccount" height="55">
            </span>
            <h1 class="mx-3">My Account</h1>
        </div>

        <span class="">Date: <strong class="current-date"></strong></span>
    </div>
    <hr>
    <div class="content-body">
        <div class="row" style="height:50vw;">
            <div class="col-md-3 mt-3">
                <div class="row text-center">
                    <!-- Tab navs -->
                    <div class="nav flex-column nav-tabs text-center" id="v-tabs-tab" role="tablist"
                        aria-orientation="vertical">
                        <a class="nav-link active" id="v-tabs-home-tab" data-mdb-toggle="tab" href="#v-tabs-home" role="tab"
                            aria-controls="v-tabs-home" aria-selected="true">Overview</a>
                        <a class="nav-link" id="v-tabs-profile-tab" data-mdb-toggle="tab" href="#v-tabs-profile"
                            role="tab" aria-controls="v-tabs-profile" aria-selected="false">Profile</a>
                        <a class="nav-link" id="v-tabs-messages-tab" data-mdb-toggle="tab" href="#v-tabs-messages"
                            role="tab" aria-controls="v-tabs-messages" aria-selected="false">Messages</a>
                    </div>
                    <!-- Tab navs -->
                </div>

            </div>
            <div class="col-md-9 border-start ps-4">
                <!-- Tab content -->
                <div class="tab-content mt-3" id="v-tabs-tabContent">
                    <div class="tab-pane fade show active" id="v-tabs-home" role="tabpanel"
                        aria-labelledby="v-tabs-account-tab">
                        <section>
                            <header>
                                <h3 class="ps-3" style="color:#8c01af;">Account Overview</h3>
                                <hr>
                            </header>
                            <div class="tab-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="opacity-75">Account Name:</label>
                                        <h5 class="text-uppercase text-secondary">{{ $tenant->firstname }} {{ $tenant->lastname }}</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="opacity-75">Account Number:</label>
                                        <h5 class="text-uppercase text-secondary">{{ $tenant->identity_id }}</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="opacity-75">Email Address:</label>
                                        <h5 class=" text-secondary">{{ $tenant->email }}</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="opacity-75">Account Status:</label>
                                        <h5 class="status text-secondary"></h5>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="opacity-75">Location:</label>
                                        <h5 class=" text-secondary">{{ $location->location }}</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="opacity-75">Unit:</label>
                                        <h5 class=" text-secondary">{{ $unit->name }}</h5>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="opacity-75">Date Started:</label>
                                        <h5 class="start-date text-secondary"></h5>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="opacity-75">Ending Date:</label>
                                        <h5 class="end-date text-secondary"></h5>
                                    </div>
                                </div>

                            </div>
                        </section>

                    </div>
                    <div class="tab-pane fade" id="v-tabs-profile" role="tabpanel" aria-labelledby="v-tabs-profile-tab">
                        <section>
                            <header>
                                <h3 class="ps-3" style="color:#8c01af;">Profile</h3>
                                <hr>
                            </header>
                            <div class="tab-body">

                            </div>
                        </section>
                    </div>
                    <div class="tab-pane fade" id="v-tabs-messages" role="tabpanel" aria-labelledby="v-tabs-messages-tab">
                        <section>
                            <header>
                                <h3 class="ps-3" style="color:#8c01af;">Message</h3>
                                <hr>
                            </header>
                            <div class="tab-body">

                            </div>
                        </section>
                    </div>
                </div>
                <!-- Tab content -->

            </div>
        </div>
    </div>

@endsection

@section('javascript')
    <script>
        $(".start-date").text(convertDate('{!! $tenant->start_date !!}'));
        $(".end-date").text(convertDate('{!! $tenant->end_date !!}'));
        $(".current-date").text(convertDate('{!! $mytime !!}'));
        $(".status").text(statusCode('{!! $tenant->status !!}'));
    </script>
@endsection
