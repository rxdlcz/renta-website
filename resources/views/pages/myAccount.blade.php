@extends('layout.navigation')

@section('title', 'My Account')
@section('content')
    <div class="container px-5" style="min-height: 40vw;">
        <div class="myacct-wrapper">
            <div class="content-header d-flex justify-content-between ps-3 align-items-center">
                <div class="d-flex">
                    <span>
                        <img src="img/icon/myAccount.png" alt="myAccount" height="55">
                    </span>
                    <h1 class="mx-3 paytone-font">My Account</h1>
                </div>

                <span class="">Date: <strong
                        class="current-date">{{ \Carbon\Carbon::parse($mytime)->format('F j, Y') }}</strong></span>
            </div>
            <hr>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-3 mt-3">
                        <div class="row text-center">
                            <!-- Tab navs -->
                            <div class="nav flex-column nav-tabs text-center" id="v-tabs-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link active" id="v-tabs-home-tab" data-mdb-toggle="tab" href="#v-tabs-home"
                                    role="tab" aria-controls="v-tabs-home" aria-selected="true">Overview</a>
                                <a class="nav-link d-flex " id="v-tabs-bill-tab" data-mdb-toggle="tab" href="#v-tabs-bill"
                                    role="tab" aria-controls="v-tabs-bill" aria-selected="true" style="cursor:pointer;">
                                    <p class="flex-grow-1 mb-0" style="padding-left: 1.6rem;">Bills</p>
                                    @if ($billsUnpaid > 0)
                                        <span class="badge bg-danger ms-2 float-right">{{ $billsUnpaid }}</span>
                                    @endif
                                </a>
                                <a class="nav-link" id="v-tabs-pay-tab" data-mdb-toggle="tab" href="#v-tabs-pay"
                                    role="tab" aria-controls="v-tabs-pay" aria-selected="false">Payment</a>
                                <a class="nav-link" id="v-tabs-cPass-tab" data-mdb-toggle="tab" href="#v-tabs-cPass"
                                    role="tab" aria-controls="v-tabs-cPass" aria-selected="false">Change Password</a>
                                <a class="nav-link" href="/logout" role="tab" aria-controls="v-tabs-messages"
                                    aria-selected="false">Logout</a>
                            </div>
                            <!-- Tab navs -->
                        </div>

                    </div>
                    <div class="col-md-9 border-start ps-4">
                        <!-- Tab content -->
                        <div class="tab-content mt-3" id="v-tabs-tabContent">
                            <div class="tab-pane fade show show-animation-slideLeft active" id="v-tabs-home" role="tabpanel"
                                aria-labelledby="v-tabs-account-tab">
                                <section>
                                    <header>
                                        <h3 class="ps-3 py-1 koulen-font tab-header">Account Overview</h3>
                                        <hr>
                                    </header>
                                    <div class="tab-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="" class="text-muted">Account Name:</label>
                                                <h5 class="text-uppercase text-secondary fw-bolder nunito-font">
                                                    {{ $tenant->firstname }}
                                                    {{ $tenant->lastname }}</h5>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="text-muted">Account Number:</label>
                                                <h5 class="text-uppercase text-secondary fw-bolder nunito-font">
                                                    {{ $tenant->identity_id }}</h5>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="text-muted">Email Address:</label>
                                                <h5 class=" text-secondary fw-bolder nunito-font">{{ $tenant->email }}
                                                </h5>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="text-muted">Account Status:</label>
                                                <h5 class=""><span
                                                        class="badge badge-secondary status text-secondary px-4 py-2 fw-bolder nunito-font">{{ switchStatus($tenant->status) }}</span>
                                                </h5>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="text-muted">Location:</label>
                                                <h5 class=" text-secondary fw-bolder nunito-font">
                                                    {{ $location->location }}
                                                </h5>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="text-muted">Unit:</label>
                                                <h5 class=" text-secondary fw-bolder nunito-font">{{ $unit->name }}</h5>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <header class="mt-5">
                                                <h3 class="ps-3 py-1 koulen-font tab-header">Contract Date</h3>
                                                <hr>
                                            </header>
                                            <div class="col-md-6">
                                                <label for="" class="text-muted">Date Started:</label>
                                                <h5 class="start-date text-secondary fw-bolder nunito-font">
                                                    {{ \Carbon\Carbon::parse($tenant->start_date)->format('F j, Y') }}
                                                </h5>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="text-muted">Ending Date:</label>
                                                <h5 class="end-date text-secondary fw-bolder nunito-font">
                                                    {{ \Carbon\Carbon::parse($tenant->due_date)->format('F j, Y') }}</h5>
                                            </div>
                                        </div>

                                    </div>
                                </section>

                            </div>
                            <div class="tab-pane fade show-animation-slideLeft" id="v-tabs-bill" role="tabpanel" aria-labelledby="v-tabs-bill-tab">
                                <section>
                                    <header>
                                        <h3 class="ps-3 py-2 koulen-font tab-header">Bills</h3>
                                        <hr>
                                    </header>
                                    <div class="tab-body">
                                        <table class="table align-items-center table-hover" id="table-content">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th>Type</th>
                                                    <th>Tenant</th>
                                                    <th>Billing period</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($bills as $bill)
                                                    <tr>
                                                        <td>{{ $bill->bill_type }}</td>
                                                        <td>{{ $bill->amount_balance }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($bill->created_at)->format('F j, Y') }}
                                                            -
                                                            {{ \Carbon\Carbon::parse($bill->due_date)->format('F j, Y') }}
                                                        </td>
                                                        <td class="h5"><span
                                                                class="badge rounded-pill badge-secondary px-3 py-2 text-uppercase">{{ switchStatus($bill->status) }}</span>
                                                        </td>
                                                    </tr>

                                                @empty
                                                    <tr>
                                                        <td colspan="4" class="text-center">No Bills yet</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>

                                </section>
                            </div>
                            <div class="tab-pane fade show-animation-slideLeft" id="v-tabs-pay" role="tabpanel" aria-labelledby="v-tabs-pay-tab">
                                <section>
                                    <header>
                                        <h3 class="ps-3 py-2 koulen-font tab-header">Payments</h3>
                                        <hr>
                                    </header>
                                    <div class="tab-body">
                                        <table class="table align-items-center table-hover" id="table-content">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th>Reference #</th>
                                                    <th>Amount</th>
                                                    <th>Receiver</th>
                                                    <th>Date of Payment</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($payments as $payment)
                                                    <tr>
                                                        <td>{{ $payment->reference_id }}</td>
                                                        <td>{{ $payment->amount }}</td>
                                                        <td>{{ $payment->receiver_id }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($payment->created_at)->format('F j, Y') }}
                                                        </td>
                                                    </tr>

                                                @empty
                                                    <tr>
                                                        <td colspan="4" class="text-center">No Payment yet</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>

                                </section>
                            </div>
                            <div class="tab-pane fade show-animation-slideLeft" id="v-tabs-cPass" role="tabpanel"
                                aria-labelledby="v-tabs-profile-tab">
                                <section>
                                    <header>
                                        <h3 class="ps-3 py-2 koulen-font tab-header">Change Password</h3>
                                        <hr>
                                    </header>
                                    <div class="tab-body">
                                        <form class="px-5 pt-3" id="updatePass-form">
                                            @csrf
                                            <div class="form-outline">
                                                <input type="password" id="oldPass" name="oldPassword"
                                                    class="form-control" />
                                                <label class="form-label" for="oldPass">Old Password</label>
                                            </div>
                                            <span class="txt_error text-danger mx-1 oldPassword_error"></span>

                                            <div class="form-outline mt-1">
                                                <input type="password" id="newPass" name="newPassword"
                                                    class="form-control" />
                                                <label class="form-label" for="newPass">New Password</label>
                                            </div>
                                            <span class="txt_error text-danger mx-1 newPassword_error"></span>

                                            <div class="form-outline mt-1">
                                                <input type="password" id="confirmPass" name="confirmPass"
                                                    class="form-control" />
                                                <label class="form-label" for="confirmPass">Confirm Password</label>
                                            </div>
                                            <span class="txt_error text-danger mx-1 confirmPass_error"></span>

                                            <div></div>
                                            <button type="submit" class="btn btn-primary btn-block mt-1">Change
                                                Password</button>
                                        </form>
                                    </div>
                                </section>
                            </div>
                        </div>
                        <!-- Tab content -->

                    </div>
                </div>
            </div>


            <!-- Change pass Success -->
            <div class="modal top fade" id="cPasslogout" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="false">
                <div class="modal-dialog  ">
                    <div class="modal-content">
                        <div class="modal-header bg-warning">
                            <h5 class="modal-title"><i class="fas fa-exclamation"></i> Notice</h5>
                        </div>
                        <div class="modal-body">
                            <h3>You have Successfully changed your password.</h3>
                            <h3 class="d-flex">Automatic logout in: <div class="countdown px-2">5</div>s</h3>
                        </div>
                        <div class="modal-footer">
                            <a href="logout">
                                <button type="button" class="btn btn-primary">logout now</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(function() {
            var doUpdate = function() {
                $('.countdown').each(function() {
                    var count = parseInt($(this).html());
                    if (count !== 0) {
                        $(this).html(count - 1);
                    }
                });
            };
            $('#updatePass-form').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "/updatePass",
                    processData: false,
                    data: $('#updatePass-form').serialize(),
                    beforeSend: function() {
                        $('.txt_error').text('')
                    },
                    success: function(data) {
                        if (data.status) {
                            //automatic logout
                            $('#cPasslogout').modal('toggle');
                            setInterval(doUpdate, 1000);
                            setTimeout(function() {
                                window.location = 'logout';
                            }, 5000);
                        } else {
                            //show validation
                            $.each(data.error, function(key, val) {
                                $('span.' + key + '_error').text(val[0]);
                                console.log(key + ':' + val);
                            })
                        }
                    }
                });
            });
        });
    </script>
@endsection
