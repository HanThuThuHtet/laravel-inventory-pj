@extends('layouts.master')
@section('title')
    Item List
@endsection
@section('content')
    <h4>Item List</h4>
    @if (session('status'))
        <div class=" alert alert-success">
            {{  session('status') }}
        </div>
    @endif

    {{-- Search --}}
    <div class="row py-3">
        <div class="col-md-7">
            <a href="{{ route('item.create') }}" class="btn btn-outline-dark">Create</a>
        </div>
        <div class="col-md-5">
            <form action="{{route('item.index')}}" method="get">
                <div class=" input-group">
                    <input type="text" class="form-control" name="keyword"
                   @if (request()->has("keyword"))
                   value="{{ request()->keyword }}"
                   @endif>

                    @if (request()->has("keyword"))
                        <a href="{{ route('item.index') }}" class="btn btn-secondary">Clear</a>
                    @endif
                    <button class="btn btn-dark">Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class=" d-flex justify-content-end align-items-center">
        @if (request()->has("keyword"))
            <h6 class=" text-secondary"><b class="text-dark">{{ count($items) }}</b> matching results for <b class="text-dark">{{ request()->keyword }}</b></h6>
        @endif
    </div>

    <table class="table ">
        <thead>
            <tr>
                <th>#</th>
                <th>Name
                    {{-- <a href="{{ route('item.index') }}?name=asc">ASC</a> --}}
                </th>
                <th>Price</th>
                <th>Stock</th>
                <th>Control</th>
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
                    <td>
                        <a href="{{ route('item.show',$item->id) }}" class=" btn btn-sm btn-outline-dark">Details</a>
                        <a href="{{ route('item.edit',$item->id) }}" class="btn btn-sm btn-outline-success">Edit</a>
                        <form class=" d-inline-block" action="{{ route("item.destroy",$item->id) }}" method="post">
                            @method("delete")
                            @csrf
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
           @empty
                <tr>
                    <td colspan="5" class=" text-center py-4">
                        <p>
                            No Item Available
                        </p>
                        <a href="{{ route("item.create") }}" class=" btn btn-dark">Create Item</a>
                    </td>
                </tr>
           @endforelse
        </tbody>
    </table>

    {{-- pagination --}}
    {{ $items->onEachSide(2)->links() }}

@endsection
