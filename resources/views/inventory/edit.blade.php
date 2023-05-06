@extends('layouts.master')
@section('title')
    Edit Item
@endsection
@section('content')
    <h4>Edit Item</h4>
    <form action="{{ route('item.update',$item->id) }}" method="post">
        @method("put")
        @csrf
        {{-- tokenization -> input with hidden type --}}
        <div class="mb-3">
            <label class="form-label" for="">Item Name</label>
            <input type="text" class=" form-control" value="{{ $item->name }}" name="name">
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Item Price</label>
            <input type="number" class=" form-control" value="{{ $item->price
             }}" name="price">
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Item Stock</label>
            <input type="number" class=" form-control"  value="{{ $item->stock }}" name="stock">
        </div>
        <button class=" btn btn-dark">Update Item</button>
    </form>

@endsection
