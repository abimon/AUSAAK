@extends('layouts.dash',['title'=>'Inventory'])
@section('dashboard')
<div class="container">
    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="bi bi-plus"></i> Borrow Item
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Borrow Item</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('borrow.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-floating mb-2">
                            <select name="item_id" id="" class="form-select">
                                @foreach ($items as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            <label for="">Item</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" name="borrower_name" placeholder=" " id="" class="form-control">
                            <label for="">Borrower's Name</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="number" name="borrower_contact" placeholder=" " id="" class="form-control">
                            <label for="">Borrower's Contact</label>
                        </div>
                        <div class="form-floating mb-2">
                            <select name="ausaa_guarantor" id="" class="form-select">
                                @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->fname}} {{$user->lname}}</option>
                                @endforeach
                            </select>
                            <label for="">AUSAA Guarantor</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="date" name="return_date" placeholder=" " id="" class="form-control">
                            <label for="">Return Date</label>
                        </div>
                        <div class="form-floating mb-2">
                            <textarea name="details" id="" class="form-control" rows="3"></textarea>
                            <label for="">Details on Use</label>
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
    <table class="table table-responsive">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Item</th>
                <th scope="col">Qty</th>
                <th scope="col">Purchase Year</th>
                <th scope="col">Purchase Price</th>
                <th scope="col">Condition</th>
                <th scope="col">Logged By</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($borrows as $k=>$item)
            <tr>
                <td>{{$k+1}}</td>
                <td>
                    <img src="{{asset('storage/inventory/items/'.$item->image)}}" style="width: 60px; height: 60px; object-fit:scale-down;" alt=""><br>
                    {{$item->name}}
                </td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->purchase_year}}</td>
                <td>{{$item->purchase_price}}</td>
                <td>{{$item->condition}}</td>
                <td>{{$item->user->fname}} {{$item->user->lname}}</td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection