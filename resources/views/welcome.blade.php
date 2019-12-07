@extends('layouts.app')

@section("title")
My Fitness buddy
@stop

@section("content")
<div class="container home">
    <div class="col-md-9 col-md-offset-2 panel">
        <div class="heading ">
            <h4 class="pt-3 ml-3 pb-3">
                Welcome, Stranger!
            </h4>
        </div>    
        <p>
            <a href="login">Login </a> or <a href="users/create">register</a> to get started
        </p>  
    </div>
</div>  
@endsection