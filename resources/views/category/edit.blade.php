@extends('layouts.master')
@section('title')
    Edit Category
@endsection
@section('content')
    <h4>Edit Category</h4>
    <form action="{{ route('category.update',$category->id) }}" method="post">
        @method("put")
        @csrf
        <div>
            <label for="" class="form-label">Categroy Title</label>
            <input type="text" name="title" value="{{ $category->title }}" class="form-control" id="">
        </div>
        <div>
            <label for="" class="form-label">Description</label>
            <textarea name="description" id="" rows="7" class="form-control">
                {{ $category->description }}
            </textarea>
        </div>
        <button class="btn btn-dark mt-3">Update Category</button>
    </form>
@endsection

