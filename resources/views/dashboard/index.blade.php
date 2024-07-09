@extends('layouts.dash',['title'=>'Dashboard'])
@section('dashboard')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

</div>
@if($account != null)
<!-- Content Row -->
<div class="row">

    <!--Account Target Card  -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            {{$account->name}} Target
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Ksh {{$account->g_target}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Contribution</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Ksh {{$total}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-plus fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Deficit
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Ksh {{($account->g_target)-$total}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-minus fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pending Requests Card Example -->

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Latest Contribution</div>
                        @if ($last!= null)
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Ksh {{$last->amount}}</div>
                        <small class="text-dark">{{$last->giver->lname}}</small>
                        @else
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Ksh 0</div>
                        <small class="text-dark"> </small>
                        @endif
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-cash-coin fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<div class="container">
    <div class="card text-gray-800 col-md-6">
        <div class="card-body">
            <h5 class="card-title fw-bold">My place in AUSAA Kenya</h5>
            <h6 class="card-subtitle mb-2 text-body-secondary">{{Auth()->user()->role}}</h6>
            <div class="card-text">
                <h6>My Responsibilities</h5>
                    @if (Auth()->user()->office != null)
                    <?php echo html_entity_decode(Auth()->user()->office->description); ?>
                    @endif
            </div>
        </div>
    </div>
</div>
<!-- Content Row -->
@endsection