@extends('layouts.master')
@section('title')
    Create Category
@endsection
@section('content')
    <h4>Create Category</h4>
    <form action="{{ route('category.store') }}" method="post">
        @csrf
        <div>
            <label for="" class="form-label
            @error('title')
                is-invalid
            @enderror">
                Categroy Title
            </label>
            <input type="text" name="title" class="form-control" id="">
            @error('title')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="" class="form-label
            @error('description')
                is-invalid
            @enderror">
                Description
            </label>
            <textarea name="description" id="" rows="7" class="form-control"></textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-dark mt-3">Create Category</button>
    </form>
@endsection

