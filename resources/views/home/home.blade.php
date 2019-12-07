@extends('layouts.app')

@section('content')
<div class="container home">
    <div class="row justify-content-center home">
        <div class="col-md-9 col-md-offset-2 panel">
            <div class="heading ">
                <h4 class="pt-3 ml-3 pb-3">
                    Welcome, {{ Auth::user()->name }}!
                </h4>
            </div>  
            @if(!(Auth::user()->meal->isEmpty()))

                @if((date('m/d/Y', time())) > (Auth::user()->meal->last()->created_at->format('m/d/Y')))
                <p> Looks like you haven't eaten anything today. 
                    <a href="/meals/create"> You should change that. </a>
                </p>
                @endif
 
                @if((date('m/d/Y', time())) <= (Auth::user()->meal->last()->created_at->format('m/d/Y')) )
                <h5 class='p5'>Here's what you've eaten today.</h5>
                @endif
 
                <ul class="list-group">
                @foreach(Auth::user()->meal as $meals)
                    @php
                    $todaysDate = date('m/d/Y', time());
                    $postDate = $meals->created_at->format('m/d/Y');
                    @endphp
                    @if($todaysDate <= $postDate )
                    <li class="list-group-item row">
                    <a href="meals/{{ $meals->id }}" class="col-md-6"> 
                        {{ $meals->name }} 
                    </a>
                    <span class="pull-right time col-md-4">
                        {{ $meals->updated_at->format('g:i:a e')}} on {{ $meals->updated_at->format('l, F j')}}
                    </span>
                    <span class="pull-right col-md-2">
                        <a href="meals/{{ $meals->id }}/edit" class="btn btn-default">Edit</a>
                    </span>
                </li>
                    @endif

                @endforeach
                </ul>
      
                @if((date('m/d/Y', time())) <= (Auth::user()->meal->last()->created_at->format('m/d/Y')) )
                <h5>Why not <a href="/meals/create">keep track of your next meal</a>, too?</h5>              
                @endif

                @else
                <p> Looks like you haven't eaten anything today. 
                    <a href="/meals/create"> You should change that. </a>
                </p>
                @endif
                
        </div>    
    </div>
</div>
@endsection

