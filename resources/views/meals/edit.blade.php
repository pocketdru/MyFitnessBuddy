@extends('layouts.app')

@section("title")
Create a meal
@stop

@section("content")
<div class="container">
  <div class="row">
    <div class="col-md-7 col-md-offset-2 panel"> 
      <div class="col-md-12">
        <a href="/meals">
          <i class="fas fa-arrow-circle-left"></i>  
        </a> 
      </div>
        <h2>Edit meal</h2>
      <form action="/meals/{id}/edit" method="post" value="POST">
        {{ method_field('PUT') }}
        {{ csrf_field() }}


      <div class="form-group">
        <input type="hidden" name="id" value="{{ $meal->id }}">
          <input name="name" class="form-control" id="exampleInputName" placeholder="Meal Name" type="textarea" value="{{ $meal->name }}">
          @if ($errors->has('name'))
                <div class="error ml-5 mr-5">
                    <p> {{ $errors->first('name') }} </p>
                </div>
            @endif
      </div>


        <button class="btn btn-primary" type="submit" value="Edit">Submit</button>  

      </form>
    </div>
  </div>
</div>
@endsection