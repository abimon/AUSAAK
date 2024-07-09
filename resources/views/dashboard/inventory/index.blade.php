@extends('layouts.dash',['title'=>'Inventory'])
@section('dashboard')
<div class="container">
    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="bi bi-plus"></i> Add Item
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Item</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('inventory.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-floating mb-2">
                            <input type="text" name="name" placeholder=" " id="" class="form-control">
                            <label for="">Item Name</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" name="quantity" value=1 id="" class="form-control">
                            <label for="">Quantity</label>
                        </div>
                        <div class='form-floating mb-2'>
                            <select id="intake" class="form-select" name="purchase_year" required>
                                <?php $years = array_combine(range(date("Y"), 2015), range(date("Y"), 2015)); ?>
                                @foreach($years as $year)
                                <option value="{{$year}}" class="form-control">{{$year}}</option>
                                @endforeach
                            </select>
                            <label for="intake">Year of Purchase</label>
                            @error('purchase_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-floating mb-2">
                            <input type="number" name="purchase_price" placeholder=" " id="" class="form-control">
                            <label for="">Unit Purchase Price</label>
                        </div>
                        <div class="">
                            <label for="">Item Image</label>
                            <div class="m-3 card p-3 border-dark bg-transparent" style="border-style:dashed;">
                                <img id="out" src="" style="width: 100%; object-fit:contain;" />
                                <input type="file" accept="image/jpeg, image/png, image/webp" name="image" id="cover" style="display: none;" class="form-control" onchange="loadCoverFile(event)">
                                <div class="pt-2" id="desc">
                                    <div class="text-center" style="font-size: xxx-large; font-weight:bolder;">
                                        <i class="bi bi-upload"></i>
                                    </div>
                                    <div class="text-center">
                                        <label for="cover" class="btn btn-success text-white" title="Upload new profile image">Browse</label>
                                    </div>
                                    <div class="text-center prim">*File supported .png .jpg .webp</div>
                                </div>
                                <script>
                                    var loadCoverFile = function(event) {
                                        var image = document.getElementById('out');
                                        image.src = URL.createObjectURL(event.target.files[0]);
                                        document.getElementById('cover').value == image.src;
                                    };
                                </script>
                            </div>
                        </div>
                        <div class="">
                            <label for="">Receipt Image</label>
                            <div class="m-3 card p-3 border-dark bg-transparent" style="border-style:dashed;">
                                <img id="output" src="" style="width: 100%; object-fit:contain;" />
                                <input type="file" accept="image/jpeg, image/png, image/webp" name="receipt" id="receipt" style="display: none;" class="form-control" onchange="loadFile(event)">
                                <div class="pt-2" id="desc">
                                    <div class="text-center" style="font-size: xxx-large; font-weight:bolder;">
                                        <i class="bi bi-upload"></i>
                                    </div>
                                    <div class="text-center">
                                        <label for="receipt" class="btn btn-success text-white" title="Upload new profile image">Browse</label>
                                    </div>
                                    <div class="text-center prim">*File supported .png .jpg .webp</div>
                                </div>
                                <script>
                                    var loadFile = function(event) {
                                        var image = document.getElementById('output');
                                        image.src = URL.createObjectURL(event.target.files[0]);
                                        document.getElementById('receipt').value == image.src;
                                    };
                                </script>
                            </div>
                        </div>
                        <div class="form-floating mb-2">
                            <select name="condition" id="" class="form-select">
                                <?php $conditions = ['Working', 'Need repair', 'Under repair', 'Dispossable']; ?>
                                @foreach ($conditions as $condition)
                                <option value="{{$condition}}">{{$condition}}</option>
                                @endforeach
                            </select>
                            <label for="">Condition</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save item</button>
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
                <th scope="col">Unit Purchase Price</th>
                <th scope="col">Condition</th>
                <th scope="col">Logged By</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $k=>$item)
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
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection