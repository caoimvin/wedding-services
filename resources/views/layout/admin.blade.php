@extends('layout')

@section('body')
<div class="wrapper admin">
    @include('layout.sidebar')
    <div class="content">
        @yield('content')
    </div>
</div>
@endsection