@extends('shared.layout')
@section('title', 'Page Not Found')
@section('activeHomeAbout','active')
@section("content")
        <!--Page Title-->
<section class="page-title" style="background-image:url(images/background/page-title-bg.jpg);">
    <div class="auto-container">
        <div class="sec-title">
            <h1>Page Not Found</h1>
            <p>The page you're accessing was not found or has been removed. </p>
        </div>
    </div>
</section>
@endsection
@section("notifications")
    {{--REMOVE NOTIFICATIONS ON THE HOME PAGES--}}
@endsection