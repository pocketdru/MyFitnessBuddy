<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;


use App\Food;
use App\Meal;

use Illuminate\Support\Facades\Redirect;


class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            "foodName" =>'required|unique:foods,foodName,NULL,id,' . 'meal_id,' . $request->meal_id . 'max:25|min:3',
            "protein" => 'required|max:5|min:1',
            "carbs" => 'required|max:5|min:1',
            "fat" => 'required|max:5|min:1',
            "cholesterol" => 'max:5|min:1',
            "sodium" => 'max:5|min:1',
            "fiber" => 'max:5|min:1',
            "sugars" => 'max:5|min:1'
        );

        $messages = [
            'foodName.required' => 'The food name field is required.',
            'foodName.unique' => 'This food name has already been taken in this meal.'
        ];

        $validator = Validator::make(Input::all(), $rules, $messages);

        if ($validator->fails()) 
        {
            return Redirect::back()
            ->withErrors($validator)
            ->withInput();
        } else {
            $food = new Food();
            $food->foodName = $request->foodName;
            $food->protein = $request->protein;
            $food->carbs = $request->carbs;
            $food->fat = $request->fat;
            $food->cholesterol = $request->cholesterol;
            $food->sodium = $request->sodium;
            $food->fiber = $request->fiber;
            $food->sugars = $request->sugars;
            $food->meal_id = $request->meal_id;
            $food->save();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meal_id = Food::find($id)->meal_id;
        return view("foods/create")->withMeal(Meal::find($meal_id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $meal_id = Food::find($id)->meal_id;
        return view('foods.edit',['meal'=> Meal::find($meal_id),'food'=>Food::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $rules = array(
            "foodName" =>'required|max:15|min:3',
            "protein" => 'required|max:5|min:1',
            "carbs" => 'required|max:5|min:1',
            "fat" => 'required|max:5|min:1',
            "cholesterol" => 'max:5|min:1',
            "sodium" => 'max:5|min:1',
            "fiber" => 'max:5|min:1',
            "sugars" => 'max:5|min:1'
        );

        $messages = [
            'foodName.required' => 'The food name field is required.',
        ];

        $validator = Validator::make(Input::all(), $rules, $messages);

        if ($validator->fails()) 
        {
            return Redirect::back()
            ->withErrors($validator)
            ->withInput();
        } else {
            $food = Food::find($request->id);
            $food->foodName = $request->foodName;
            $food->protein = $request->protein;
            $food->carbs = $request->carbs;
            $food->fat = $request->fat;
            $food->cholesterol = $request->cholesterol;
            $food->sodium = $request->sodium;
            $food->fiber = $request->fiber;
            $food->sugars = $request->sugars;
            $food->save();
            $meal_id = Food::find($request->id)->meal_id;
            return redirect("/meals/$meal_id");
        }
    }

    /** 
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $meal_id = Food::find($id)->meal_id;
        Food::where('id', $id)->delete();
        return redirect("/meals/$meal_id")->withMeal(Meal::find($meal_id));
    }
}


// СДЕЛАТЬ ЮНИК ФУДСОВ ДЛЯ КАЖДОГО МИЛА