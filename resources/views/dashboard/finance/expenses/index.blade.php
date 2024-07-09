@extends('layouts.dash',['title'=>'Expenses'])
@section('dashboard')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class="d-flex justify-content-between">
                    <h3 class="box-title">Expense History</h3>

                    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createEx"><i class="fa fa-plus"></i> Add Expense</button>
                </div>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">#</th>
                                <th class="border-top-0">Affected Account</th>
                                <th class="border-top-0">Purpose</th>
                                <th class="border-top-0">Recepient</th>
                                <th class="border-top-0">Amount</th>
                                <th class="border-top-0">Date</th>
                                <th class="border-top-0">Logged By</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($expenses as $key=>$expense)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$expense->account->name}}</td>
                                <td>{{$expense->purpose}}</td>
                                <td>{{$expense->recepient}}</td>
                                <td>{{$expense->amount}}</td>
                                <td>{{date_format($expense->created_at, 'jS F, Y')}}</td>
                                <td>{{$expense->treasurer->fname}} {{$expense->treasurer->lname}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">{{$expenses->links()}}</div>
                    <!-- <div class="d-flex justify-content-end">
                        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#print"><i class="fa fa-print"></i> Print</button>
                        <button class="btn btn-outline-danger ms-2" data-bs-toggle="modal" data-bs-target="#mail"><i class="fa fa-envelope"></i> Mail</button>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="createEx" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Expense</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('expense.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    @csrf
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Recepient') }}</label>

                        <div class="col-md-6">
                            <input id="recepient" type="text" class="form-control @error('recepient') is-invalid @enderror" name="recepient" value="{{ old('recepient') }}" required autocomplete="recepient" autofocus>

                            @error('recepient')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="source" class="col-md-4 col-form-label text-md-end">Source Account</label>

                        <div class="col-md-6">
                            <select class="form-select" aria-label="Default select example" name='source'>
                                <option selected disabled>Select Source Account</option>
                                @foreach($accounts as $account)
                                <option value="{{$account->id }}">{{$account->name }}</option>
                                @endforeach
                            </select>
                            @error('source')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Purpose') }}</label>

                        <div class="col-md-6">
                            <input id="purpose" type="text" class="form-control @error('purpose') is-invalid @enderror" name="purpose" value="{{ old('purpose') }}" required autocomplete="purpose" autofocus>

                            @error('purpose')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="amount" class="col-md-4 col-form-label text-md-end">{{ __('Amount') }}</label>
                        <div class="col-md-6">
                            <input id="amount" type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" required autocomplete="amount" autofocus>

                            @error('amount')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection