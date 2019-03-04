@extends('shared.layout')
@section('title', 'Error Occurred')
@section("content")
        <!--Page Title-->
<section class="page-title" style="background-color: #fff;padding: 10px;">
    <div class="auto-container">
        <div class="sec-title">
            @if(isset($message))
                <h1>{{$message}}</h1>
            @else
                <h1>Your page couldn't be loaded at this time</h1>
            @endif
             <p>Sorry for the inconveniences. </p>
        </div>
    </div>
</section>
@endsection