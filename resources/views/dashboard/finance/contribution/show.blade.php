@extends('layouts.dash',['title'=>'Transact'])
@section('dashboard')
<div class="container">
    <div class="text-end mb-2">
        <a href="{{route('transaction.create')}}">
            <button class="btn btn-outline-primary"><i class="bi bi-plus"></i> Add transaction</button></a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Account</th>
                <th scope="col">Amount</th>
                <th scope="col">Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contributions as $key=>$cont)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$cont->giver->fname}} {{$cont->giver->lname}}</td>
                <td>{{$cont->account->name}}</td>
                <td>{{$cont->amount}}</td>
                <td>{{date_format($cont->created_at,'jS F, Y')}}</td>
                <th type="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{$cont->id}}"><i class="bi bi-vector-pen"></i></th>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{$cont->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Transaction</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('transaction.update',$cont->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                        <div class="col-md-6">
                                            <select class="form-select" aria-label="Default select example" name='user_id'>
                                                @foreach(App\Models\User::select('id','fname','lname')->get() as $user)
                                                <?php
                                                $contN = $cont->giver->id;
                                                $uname = $user->id;
                                                ?>
                                                <option {{($contN)==($uname)?'selected':''}} value="{{$user->id}}" style="text-transform: uppercase;">{{$user->fname}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Transaction Type') }}</label>

                                        <div class="col-md-6">
                                            <select class="form-select" aria-label="Default select example" name='transactionType'>
                                                <?php $types = ['Mpesa Send Money', 'Mobile', 'Bank Deposit', 'Cash'];
                                                $transB = $cont->transactionType; ?>
                                                @foreach($types as $type)
                                                <option {{($type==$transB)?'selected':''}} value="{{$type}}">{{$type}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="amount" class="col-md-4 col-form-label text-md-end">Account</label>
                                        <div class="col-md-6">
                                            <select class="form-select" aria-label="Default select example" name='account_id'>

                                                @foreach(App\Models\AKAccount::all() as $trust)
                                                <?php $tr = $trust->id;
                                                $trx = $cont->account_id;
                                                ?>
                                                <option {{($tr==$trx)?'select':''}} value="{{$tr}}" style="text-transform: uppercase;">{{$trust->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="amount" class="col-md-4 col-form-label text-md-end">Amount</label>
                                        <div class="col-md-6">
                                            <input type="number" name="amount" value='{{$cont->amount}}' class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{$cont->id}}"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Destroy</button></a>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">{{$contributions->links()}}</div>
</div>
@endsection