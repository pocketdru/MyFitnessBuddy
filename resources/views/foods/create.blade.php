@extends("layouts.app")

@section("title")
 Add meal details
@stop



@section("content")
<div class="container">
    <div class="row">
        <a href="/meals">
            <i class="fas fa-arrow-circle-left"></i>  
        </a>  
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
                <span class="meal-data label label-pill label-info">             
                  {{ $meal->food->sum("cholesterol") }} Cholesterol
                </span>
                <span class="meal-data label label-pill label-info">             
                  {{ $meal->food->sum("sodium") }} Sodium
                </span>
                <span class="meal-data label label-pill label-info">             
                  {{ $meal->food->sum("fiber") }} Fiber
                </span>
                <span class="meal-data label label-pill label-info">             
                  {{ $meal->food->sum("sugars") }} Sugars
                </span>
            <hr/>
            <h4>Foods</h4>
            @if($meal->food->isEmpty())
                <p>No Foods associated with this meal. Add some below.</p>
            @else
            <ul class="list-group">
                @foreach($meal->food as $foods)
                <li class="list-group-item"> 
                    <span>{{ $foods->foodName }}</span>
                    <span class="pull-right spacing col-md-2"> {{ $foods->protein }} : {{ $foods->carbs }} : {{ $foods->fat }} </span>
                    <span class="pull-right col-md-1">
                        <a href="foods/{{ $foods->id }}/edit" class="btn btn-default">Edit</a>
                    </span>
                    <span class="pull-right col-md-1">
                        <a href="#" class="btn btn-default delete" id="{{ $foods->id }}" data="{{ $foods->foodame }}" data-toggle="modal" data-target="#delete">Delete</a>
                    </span>

                </li>
                @endforeach
            </ul> 
            <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="delete">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h3 class="modal-title" id="exampleModalLabel"></h3>
                        </div>
                        <div class="modal-body">
                            <h4>Are you sure you want to delete this food?</h4>
                        </div>
                        @php

                        @endphp
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form method="post" action="" class="btn btn-primary">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="delete" class="btn-link">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
             </div> 
            @endif    
        </div> 
    </div>
    <div class="row justify-content-center meal-details">
        <div class="col-8 register-col p-2 panel">
            <form action="/foods" method="post">
                <input type="hidden" name="meal_id" value=" {{ $meal->id}} ">
                <div class="form-group">
                    <label for="exampleInputName">Food Name<span class="required">*<span></label>
                    <input name="foodName" class="form-control" id="exampleInputName" placeholder="">
                    @if ($errors->has('foodName'))
                <div class="error ml-5 mr-5">
                    <p> {{ $errors->first('foodName') }} </p>
                </div>
                     @endif
                </div>

                <div class="form-group">
                    <label for="exampleInputName">Protein<span class="required">*<span></label>
                    <input name="protein" class="form-control" id="exampleInputName" placeholder="Protein/g">
                    @if ($errors->has('protein'))
                <div class="error ml-5 mr-5">
                    <p> {{ $errors->first('protein') }} </p>
                </div>
                     @endif
                </div>

                <div class="form-group">
                    <label for="exampleInputName">Carbohydrates<span class="required">*<span></label>
                    <input name="carbs" class="form-control" id="exampleInputName" placeholder="Carbohydrates/g">
                    @if ($errors->has('carbs'))
                <div class="error ml-5 mr-5">
                    <p> {{ $errors->first('carbs') }} </p>
                </div>
                     @endif
                </div>

                <div class="form-group">
                    <label for="exampleInputName">Fat<span class="required">*<span></label>
                    <input name="fat" class="form-control" id="exampleInputName" placeholder="Fat/g">
                    @if ($errors->has('fat'))
                <div class="error ml-5 mr-5">
                    <p> {{ $errors->first('fat') }} </p>
                </div>
                     @endif
                </div>
            <button class="btn btn-primary">Submit</button>
            <div class="row">
            <div class="col-md-12">
                <h3 class="p5   ">Additional info</h3>
            <div class="form-group col-md-3">
                    <label for="exampleInputName">Cholesterol</label>
                    <input name="cholesterol" class="form-control" id="exampleInputName" placeholder="Cholesterol/mg">
                    @if ($errors->has('cholesterol'))
                <div class="error ml-5 mr-5">
                    <p> {{ $errors->first('cholesterol') }} </p>
                </div>
                     @endif
                </div>

                <div class="form-group col-md-3">
                    <label for="exampleInputName">Sodium</label>
                    <input name="sodium" class="form-control" id="exampleInputName" placeholder="Sodium/mg">
                    @if ($errors->has('sodium'))
                <div class="error ml-5 mr-5">
                    <p> {{ $errors->first('sodium') }} </p>
                </div>
                     @endif
                </div>

                <div class="form-group col-md-3">
                    <label for="exampleInputName">Fiber</label>
                    <input name="fiber" class="form-control" id="exampleInputName" placeholder="Fiber/g">
                    @if ($errors->has('fiber'))
                <div class="error ml-5 mr-5">
                    <p> {{ $errors->first('fiber') }} </p>
                </div>
                     @endif
                </div>

                <div class="form-group col-md-3">
                    <label for="exampleInputName">Sugars</label>
                    <input name="sugars" class="form-control" id="exampleInputName" placeholder="Sugars/g">
                    @if ($errors->has('sugars'))
                <div class="error ml-5 mr-5">
                    <p> {{ $errors->first('sugars') }} </p>
                </div>
                     @endif
                </div>
            </div>
            </div>

            {{ csrf_field() }}
            </form>
        </div>    
    </div>
</div>

@stop