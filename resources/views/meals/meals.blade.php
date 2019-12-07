@extends("layouts.app")

@section("title")
 Add meal details
@stop



@section("content")
<div class="container">
    <div class="row">
        <div class="col-12 foods meal-name panel">
            <h3> {{ $meal->name }} </h3>
                <span class="meal-data label label-pill label-primary">             
                  {{ ($meal->food->sum("protein") * 4) + ($meal->food->sum("carbs") * 4) + ($meal->food->sum("fat") * 9) }} kCal
                </span>
                <span class="meal-data label label-pill label-default">             
                  {{ $meal->food->sum("protein") }} Protein
                </span>
                <span class="meal-data label label-pill label-default">             
                  {{ $meal->food->sum("carbs") }} Carbohydrates
                </span>
                <span class="meal-data label label-pill label-default">             
                  {{ $meal->food->sum("fat") }} Fat
                </span>
            <hr/>
            <h4>Foods</h4>
            @if($meal->food->isEmpty())
                <p>No Foods associated with this meal. Add some below.</p>
            @else
            <ul class="list-group">
                @foreach($meal->food as $foods)
                <li class="list-group-item"> {{ $foods->foodName }} 
                    <span class="pull-right spacing"> {{ $foods->protein }} : {{ $foods->carbs }} : {{ $foods->fat }} </span>
                    <span class="pull-right col-md-2">
                        <a href="foods/{{ $foods->id }}/edit" class="btn btn-default">Edit</a>
                    </span>
                </li>
                @endforeach
            </ul> 
            @endif    
        </div> 
    </div>
    <div class="row justify-content-center meal-details">
        <div class="col-8 register-col p-2 panel">
            <form action="/meals/{{ $meal->id }}/food" method="post">
                <input type="hidden" name="meal_id" value=" {{ $meal->id}} ">
                <div class="form-group">
                    <label for="exampleInputName">Food Name*</label>
                    <input name="foodName" class="form-control" id="exampleInputName" placeholder="">
                </div>

                <div class="form-group">
                    <label for="exampleInputName">Protein</label>
                    <input name="protein" class="form-control" id="exampleInputName" placeholder="Protein/g">
                </div>

                <div class="form-group">
                    <label for="exampleInputName">Carbohydrates</label>
                    <input name="carbs" class="form-control" id="exampleInputName" placeholder="Carbohydrates/g">
                </div>

                <div class="form-group">
                    <label for="exampleInputName">Fat</label>
                    <input name="fat" class="form-control" id="exampleInputName" placeholder="Fat/g">
                </div>
                <!-- <div class="form-group">
                    <label for="exampleInputName">Confirm Password</label>
                    <input name="confirmPassword" class="form-control" id="exampleInputName" placeholder="">
                </div> -->


            <button class="btn btn-primary">Submit</button>

            {{ csrf_field() }}
            </form>
        </div>    
    </div>
</div>

@stop