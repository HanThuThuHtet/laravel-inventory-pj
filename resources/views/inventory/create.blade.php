@extends('layouts.master')
@section('title')
    Create Item
@endsection
@section('content')
    <h4>Create Item</h4>

    {{-- {{ dd($errors->all()) }}  [0,1,2]--}}
    {{-- @if ($errors->any())
       <ul class=" text-danger">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif --}}

    <form action="{{ route('item.store') }}" method="post">
        @csrf
        {{-- tokenization -> input with hidden type --}}
        <div class="mb-3">
            <label class="form-label" for="">Item Name</label>
            <input
                type="text"
                value="{{ old('name') }}"
                class=" form-control
                @error('name')
                    is-invalid
                @enderror "
                name="name"
            >
            @error('name')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Item Price</label>
            <input
                type="number"
                value="{{ old('price') }}"
                class=" form-control
                @error('price')
                    is-invalid
                @enderror
                " name="price"
            >
            @error('price')
                <div class=" invalid-feedback">{{ $message  }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Item Stock</label>
            <input
                type="number"
                value="{{ old('stock') }}"
                class=" form-control
                @error('stock')
                    is-invalid
                @enderror
                " name="stock"
            >
            @error('stock')
                <div class=" invalid-feedback">{{ $message  }}</div>
            @enderror
        </div>
        <div class="d-flex justify-content-between">
            <button class=" btn btn-dark">Create Item</button>
            <a href="{{ route('item.index') }}" class=" btn btn-outline-dark">Cancel</a>
        </div>
    </form>

@endsection
