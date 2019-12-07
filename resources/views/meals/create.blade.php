@extends('layouts.app')

@section("title")
Create a meal
@stop

@section("content")
<div class="container">
  <div class="row">
    <div class="col-md-7 col-md-offset-2 panel">
      <form action="/meals" method="post">
      <div class="form-group">
        <input type="hidden" name="user_id" value=" {{ Auth::user()->id }} ">

          <label for="exampleInputName" id="add-meal">Add Another Meal</label>
          <input name="name" class="form-control" id="exampleInputName" placeholder="Meal Name">
          @if ($errors->has('name'))
                <div class="error ml-5 mr-5">
                    <p> {{ $errors->first('name') }} </p>
                </div>
            @endif
      </div>


        <button class="btn btn-primary">Submit</button>

        {{ csrf_field() }}
      </form>
    </div>
  </div>
</div>

@endsection