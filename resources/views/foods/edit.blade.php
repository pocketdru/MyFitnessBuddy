@extends('layouts.app')

@section("title")
Edit foods
@stop

@section("content")
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2 panel edit">
      <a href="/meals/{{ $meal->id }}">
        <i class="fas fa-arrow-circle-left"></i>  
      </a>     
      <h2 class="col-md-offset-5">{{ $meal->name }}</h2>
        <div class="col-md-5 foods-ul">
          <ul class="list-unstyled">
            <li>
             <span class="currentValues">Current Food Name</span>
              {{ $food->foodName }}
            </li>
            <li>
             <span class="currentValues">Protein</span>
              {{ $food->protein }}
            </li>            <li>
             <span class="currentValues">Carbohydrates</span>
              {{ $food->carbs }}
            </li>            <li>
             <span class="currentValues">Fat</span>
              {{ $food->fat }}
            </li>
          </ul>
        </div>
      <form action="/meals/foods/{id}/edit" method="post" value="POST" class="edit-form col-md-5">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <input type="hidden" name="id" value=" {{ $food->id }} ">
      <div class="col-md-12">
      <div class="form-group">
        <label for="exampleInputName">Food Name</label>
        <input name="foodName" class="form-control" id="exampleInputName" placeholder="" value="{{ $food->foodName }}">
        @if ($errors->has('foodName'))
          <div class="error ml-5 mr-5">
              <p> {{ $errors->first('foodName') }} </p>
          </div>
        @endif
      </div>
      <div class="form-group">
        <label for="exampleInputName">Protein</label>
        <input name="protein" class="form-control" id="exampleInputName" placeholder="Protein/g" value="{{ $food->protein }}">
        @if ($errors->has('protein'))
          <div class="error ml-5 mr-5">
            <p> {{ $errors->first('protein') }} </p>
          </div>
        @endif
      </div>
      <div class="form-group">
        <label for="exampleInputName">Carbohydrates</label>
        <input name="carbs" class="form-control" id="exampleInputName" placeholder="Carbohydrates/g" value="{{ $food->carbs }}">
        @if ($errors->has('carbs'))
          <div class="error ml-5 mr-5">
            <p> {{ $errors->first('carbs') }} </p>
          </div>
        @endif
      </div>
      <div class="form-group">
        <label for="exampleInputName">Fat</label>
        <input name="fat" class="form-control" id="exampleInputName" placeholder="Fat/g" value="{{ $food->fat }}">
        @if ($errors->has('fat'))
          <div class="error ml-5 mr-5">
            <p> {{ $errors->first('fat') }} </p>
          </div>
        @endif
      </div>
      </div>
        <button class="btn btn-primary" type="submit" value="Edit">Submit</button> 
        <h3 class="p5   ">Additional info</h3>
        <div class="form-group">
                    <label for="exampleInputName">Cholesterol</label>
                    <input name="cholesterol" class="form-control" id="exampleInputName" placeholder="Holesterol/mg" value="{{ $food->cholesterol }}">
                    @if ($errors->has('cholesterol'))
                <div class="error ml-5 mr-5">
                    <p> {{ $errors->first('cholesterol') }} </p>
                </div>
                     @endif
                </div>

                <div class="form-group">
                    <label for="exampleInputName">Sodium</label>
                    <input name="sodium" class="form-control" id="exampleInputName" placeholder="Sodium/mg" value="{{ $food->sodium }}">
                    @if ($errors->has('sodium'))
                <div class="error ml-5 mr-5">
                    <p> {{ $errors->first('sodium') }} </p>
                </div>
                     @endif
                </div>

                <div class="form-group">
                    <label for="exampleInputName">Fiber</label>
                    <input name="fiber" class="form-control" id="exampleInputName" placeholder="Fiber/g" value="{{ $food->fiber }}">
                    @if ($errors->has('fiber'))
                <div class="error ml-5 mr-5">
                    <p> {{ $errors->first('fiber') }} </p>
                </div>
                     @endif
                </div>

                <div class="form-group">
                    <label for="exampleInputName">Sugars</label>
                    <input name="sugars" class="form-control" id="exampleInputName" placeholder="Sugars/g" value="{{ $food->sugars }}">
                    @if ($errors->has('sugars'))
                <div class="error ml-5 mr-5">
                    <p> {{ $errors->first('sugars') }} </p>
                </div>
                     @endif
                </div> 
      </form>
    </div>
  </div>
</div>
@endsection