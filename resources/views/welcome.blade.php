@extends('layouts.app')

@section("title")
My Fitness buddy
@stop

@section("content")
<div class="container">
    <div class="row home">
        <div class="col-md-6 col-md-offset-3 panel">
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
    <div class="row">
        <div class="col-md-12">
            <!-- Carousel container -->
<div id="my-pics" class="carousel slide" data-ride="carousel" style="margin:auto;">

<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#my-pics" data-slide-to="0" class="active"></li>
<li data-target="#my-pics" data-slide-to="1"></li>
<li data-target="#my-pics" data-slide-to="2"></li>
</ol>

<!-- Content -->
<div class="carousel-inner" role="listbox">

<!-- Slide 1 -->
<div class="item active">
<img src="assets/img/12.jpg" alt="Sunset over beach">
<div class="carousel-caption">
<a href="/register">Create account</a>
<p>To start tracking your daily nutrition.</p>
</div>
</div>

<!-- Slide 2 -->
<div class="item">
<img src="assets/img/11.jpg" alt="Rob Roy Glacier">
<div class="carousel-caption">
<a href="/home">Create a new meal</A>
<p>To track your calories total amount.</p>
</div>
</div>

<!-- Slide 3 -->
<div class="item">
<img src="assets/img/10.jpg" alt="Longtail boats at Phi Phi">
<div class="carousel-caption">
<a href="/home">Add meals you eat throughout the day</a>
<p>Along with the foods that comprise the meal. Track macro-nutrient data</p>
</div>
</div>

</div>

<!-- Previous/Next controls -->
<a class="left carousel-control" href="#my-pics" role="button" data-slide="prev">
<span class="icon-prev" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#my-pics" role="button" data-slide="next">
<span class="icon-next" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>

</div>
        </div>
    </div>
</div>  
@endsection