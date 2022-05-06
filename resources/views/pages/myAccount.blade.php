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

        <span class="">Date: <strong
                class="current-date">{{ \Carbon\Carbon::parse($mytime)->format('F j, Y') }}</strong></span>
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
                        <a class="nav-link" id="v-tabs-bill-tab" data-mdb-toggle="tab" href="#v-tabs-bill" role="tab"
                            aria-controls="v-tabs-bill" aria-selected="true">Bills
                            @if ($billsUnpaid > 0)
                                <span class="badge bg-danger ms-2">{{ $billsUnpaid }}</span>
                            @endif
                        </a>
                        <a class="nav-link" id="v-tabs-pay-tab" data-mdb-toggle="tab" href="#v-tabs-pay" role="tab"
                            aria-controls="v-tabs-pay" aria-selected="false">Payment</a>
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
                    <div class="tab-pane fade show active" id="v-tabs-home" role="tabpanel"
                        aria-labelledby="v-tabs-account-tab">
                        <section>
                            <header>
                                <h3 class="ps-3 py-1" style="color:#8c01af;">Account Overview</h3>
                                <hr>
                            </header>
                            <div class="tab-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="text-muted">Account Name:</label>
                                        <h5 class="text-uppercase text-secondary">{{ $tenant->firstname }}
                                            {{ $tenant->lastname }}</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="text-muted">Account Number:</label>
                                        <h5 class="text-uppercase text-secondary">{{ $tenant->identity_id }}</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="text-muted">Email Address:</label>
                                        <h5 class=" text-secondary">{{ $tenant->email }}</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="text-muted">Account Status:</label>
                                        <h5 class=""><span
                                                class="badge badge-secondary status text-secondary px-4 py-2 ">{{ switchStatus($tenant->status) }}</span>
                                        </h5>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="text-muted">Location:</label>
                                        <h5 class=" text-secondary">{{ $location->location }}</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="text-muted">Unit:</label>
                                        <h5 class=" text-secondary">{{ $unit->name }}</h5>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="text-muted">Date Started:</label>
                                        <h5 class="start-date text-secondary">
                                            {{ \Carbon\Carbon::parse($tenant->start_date)->format('F j, Y') }}</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="text-muted">Ending Date:</label>
                                        <h5 class="end-date text-secondary">
                                            {{ \Carbon\Carbon::parse($tenant->due_date)->format('F j, Y') }}</h5>
                                    </div>
                                </div>

                            </div>
                        </section>

                    </div>
                    <div class="tab-pane fade" id="v-tabs-bill" role="tabpanel" aria-labelledby="v-tabs-bill-tab">
                        <section>
                            <header>
                                <h3 class="ps-3 py-2" style="color:#8c01af;">Bills</h3>
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
                                                <td>{{ $bill->created_at }} - {{ $bill->due_date }}</td>
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
                    <div class="tab-pane fade" id="v-tabs-pay" role="tabpanel" aria-labelledby="v-tabs-pay-tab">
                        <section>
                            <header>
                                <h3 class="ps-3 py-2" style="color:#8c01af;">Payments</h3>
                                <hr>
                            </header>
                            <div class="tab-body">
                                <table class="table align-items-center table-hover" id="table-content">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Tenant</th>
                                            <th>Billing period</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($payments as $payment)
                                            <tr>
                                                <td>{{ $payment->tenant_id }}</td>
                                                <td>{{ $payment->amount }}</td>
                                                <td>{{ $payment->created_at }}</td>
                                                <td class="h5"><span
                                                        class="badge rounded-pill badge-secondary px-3 py-2 text-uppercase">{{ switchStatus($payment->status) }}</span>
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
                    <div class="tab-pane fade" id="v-tabs-cPass" role="tabpanel" aria-labelledby="v-tabs-profile-tab">
                        <section>
                            <header>
                                <h3 class="ps-3 py-2" style="color:#8c01af;">Change Password</h3>
                                <hr>
                            </header>
                            <div class="tab-body">
                                <form class="px-5 pt-3" id="updatePass-form">
                                    @csrf
                                    <div class="form-outline">
                                        <input type="password" id="oldPass" name="oldPassword" class="form-control" />
                                        <label class="form-label" for="oldPass">Old Password</label>
                                    </div>
                                    <span class="txt_error text-danger mx-1 oldPassword_error"></span>

                                    <div class="form-outline mt-1">
                                        <input type="password" id="newPass" name="newPassword" class="form-control" />
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
                                    <button type="submit" class="btn btn-primary btn-block mt-1">Change Password</button>
                                </form>
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

    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
    Launch demo modal
  </button>
  
  <!-- Modal -->
  <div class="modal top fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
    <div class="modal-dialog  ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">...</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
            Close
          </button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('javascript')
    <script>
        $(function() {
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
                            console.log('success')
                        } else {
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
