@extends('layouts.master')
@section('title')
    Home Page
@endsection
@section('content')
    <h4>I am Home</h4>
    <p>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum ut minus, voluptatem nihil neque distinctio quidem, a accusamus tempore ullam, maxime illum obcaecati provident iure reiciendis? Blanditiis reprehenderit labore adipisci?
    </p>
    <div class="alert alert-info">
        {{-- route param --}}
        {{-- {{ route("item.show",[15,"a"=>"aaa","b"=>"bbb"]) }} --}}
        {{ route("multi",[5,10]) }}
    </div>
@endsection
