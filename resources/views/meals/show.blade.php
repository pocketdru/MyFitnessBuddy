@extends('layouts.app')

@section('content')
<div class="container home">
    <div class="row justify-content-center meals-show">
        <div class="col-md-9 col-md-offset-2 panel">
        @if(Auth::user()->meal->isEmpty())
            <h3>No meals created yet</h3>
        @else
            <ul class="list-group">
            @foreach(Auth::user()->meal as $meals)
                <li class="list-group-item row">
                    <a href="meals/{{ $meals->id }}" class="col-md-4"> 
                        {{ $meals->name }} 
                    </a>
                    <span class="pull-right col-md-1">
                        <a href="meals/{{ $meals->id }}/edit" class="btn btn-default">Edit</a>
                    </span>
                    <span class="pull-right col-md-1">
                        <a href="#" class="btn btn-default delete" id="{{ $meals->id }}" data="{{ $meals->name }}" data-toggle="modal" data-target="#delete">Delete</a>
                    </span>
                    <span class="pull-right time col-md-6">
                        {{ $meals->updated_at->format('g:i:a e')}} on {{ $meals->updated_at->format('l, F j')}}
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
                            <h4>Are you sure you want to delete this meal?</h4>
                        </div>
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
</div>
@endsection