@extends('layouts.master')
@section('title')
    Category List
@endsection
@section('content')
    <h4>Category List</h4>
    <table class="table ">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Control</th>
            </tr>
        </thead>
        <tbody>
           {{-- @foreach ($categories as $category)
               <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->price }}</td>
                    <td>{{ $category->stock }}</td>
               </tr>
           @endforeach --}}
           @forelse ($categories as $category)
            <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ Str::limit($category->description, 30, '...') }}</td>
                    <td>
                        <a href="{{ route('category.show',$category->id) }}" class=" btn btn-sm btn-outline-dark">Details</a>
                        <a href="{{ route('category.edit',$category->id) }}" class="btn btn-sm btn-outline-success">Edit</a>
                        <form class=" d-inline-block" action="{{ route("category.destroy",$category->id) }}" method="post">
                            @method("delete")
                            @csrf
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
           @empty
                <tr>
                    <td colspan="3" class=" text-center py-4">
                        <p>
                            No Category Available
                        </p>
                        <a href="{{ route("category.create") }}" class=" btn btn-dark">Create Category</a>
                    </td>
                </tr>
           @endforelse
        </tbody>
    </table>
@endsection

