@extends('layouts.master')
@section('title')
    Create Category
@endsection
@section('content')
    <h4>Create Category</h4>
    <form action="{{ route('category.store') }}" method="post">
        @csrf
        <div>
            <label for="" class="form-label">Categroy Title</label>
            <input type="text" name="title" class="form-control" id="">
        </div>
        <div>
            <label for="" class="form-label">Description</label>
            <textarea name="description" id="" rows="7" class="form-control"></textarea>
        </div>
        <button class="btn btn-dark mt-3">Create Category</button>
    </form>
@endsection

