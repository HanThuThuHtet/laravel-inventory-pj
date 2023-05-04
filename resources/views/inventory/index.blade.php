@extends('layouts.master')
@section('title')
    Item List
@endsection
@section('content')
    <h4>Item List</h4>
    <table class="table ">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
           {{-- @foreach ($items as $item)
               <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->stock }}</td>
               </tr>
           @endforeach --}}
           @forelse ($items as $item)
            <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->stock }}</td>
                </tr>
           @empty
                <tr>
                    <td colspan="4" class=" text-center py-4">
                        No Item Available<br>
                        <a href="{{ route("item.create") }}" class=" btn btn-dark">Create Item</a>
                    </td>
                </tr>
           @endforelse
        </tbody>
    </table>
@endsection
