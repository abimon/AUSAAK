@extends('layouts.dash',['title'=>'Transact'])
@section('dashboard')
<div class="container-fluid">
    <a href="{{route('transaction.index')}}">< Transactions</a>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <div class="d-flex justify-content-between m-3">
                <a class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">Member</a>
                <a class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">Non-Member</a>
            </div>
        </div>
        <div class="accordion-item">
            <div id="flush-collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <div class="card d-flex align-items-center justify-content-center">
                        <div class="card-body w-100">
                            <form action="{{route('transaction.store')}}" method="post">
                                @csrf
                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                    <div class="col-md-6">
                                        <select class="form-select" aria-label="Default select example" name='user_id' required>
                                            <option selected disabled>Select Member</option>
                                            @foreach ($users as $user )
                                            <option value="{{$user->id}}">{{$user->fname}} {{$user->lname}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Transaction Type') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-select" aria-label="Default select example" name='transactionType' required>
                                            <option selected disabled>Select transaction type</option>
                                            <?php $types = ['Mpesa Send Money', 'Mobile', 'Bank Deposit', 'Cash']; ?>
                                            @foreach($types as $type)
                                            <option value="{{$type}}">{{$type}}</option>
                                            @endforeach
                                        </select>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                @foreach($accounts as $account)
                                <div class="row mb-3">
                                    <label for="amount" class="col-md-4 col-form-label text-md-end">{{$account->name}}</label>

                                    <div class="col-md-6">
                                        <input id="amount" onfocus="this.value=''" value=0 type="number" class="form-control @error('amount') is-invalid @enderror" name="account[{{$account->name}}]" value="{{ old('amount') }}" required autocomplete="amount">
                                        @error('amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                @endforeach
                                <div class="modal-footer">
                                    <button class="btn btn-outline-info" type='submit'>Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <div class="card d-flex align-items-center justify-content-center">
                        <div class="card-body w-100">
                            <form action="/accountGuest" method="post">
                                @csrf
                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                    <div class="col-md-6">
                                        <input type="text" name="name" id="" class="form-control">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Contact') }}</label>
                                    <div class="col-md-6">
                                        <input type="number" name="contact" id="" class="form-control">
                                        @error('contact')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Transaction Type') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-select" aria-label="Default select example" name='transactionType'>
                                            <option selected disabled>Select transaction type</option>
                                            <?php $types = ['Mpesa Send Money', 'Mobile', 'Bank Deposit', 'Cash']; ?>
                                            @foreach($types as $type)
                                            <option value="{{$type}}">{{$type}}</option>
                                            @endforeach
                                        </select>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                @foreach($accounts as $account)
                                <div class="row mb-3">
                                    <label for="amount" class="col-md-4 col-form-label text-md-end">{{$account->trust}}</label>

                                    <div class="col-md-6">
                                        <input id="amount" onfocus="this.value=''" value=0 type="number" class="form-control @error('amount') is-invalid @enderror" name="account[{{$account->trust}}]" value="{{ old('amount') }}" required autocomplete="amount">
                                        @error('amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                @endforeach
                                <div class="modal-footer">
                                    <button class="btn btn-outline-info" type='submit'>Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection