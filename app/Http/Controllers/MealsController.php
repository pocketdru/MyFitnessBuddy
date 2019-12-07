<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;



use App\Meal;
use App\Food;

class MealsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("meals.show");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("meals.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // var_dump($request->input('user_id'));
        $rules = array(
            "name" =>'required|unique:meals,name,NULL,id,' . 'user_id,' . $request->user_id . '|max:20|min:3'
        );

        $messages = [
            'name.required' => 'The meal name field is required.',
            'name.unique' => 'This meal name has already been taken.'
        ];

        $validator = Validator::make(Input::all(), $rules, $messages);

        if ($validator->fails()) 
        {
            return Redirect::back()
            ->withErrors($validator)
            ->withInput();
        } else {
            $meal = new Meal();
            $meal->name = $request->name;
            $meal->user_id = $request->user_id;
    
            $meal->save();
        }

        return redirect()->action(
            'MealsController@show', $meal
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        return view("foods.create")->withMeal(Meal::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $meal = Meal::find($id);
        return view("meals.edit")->with("meal", $meal);
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
            "name" =>'required|unique:meals,name,NULL,id,' . 'user_id,' . $request->user_id . '|max:20|min:3'
        );

        $messages = [
            'name.required' => 'The meal name field is required.',
            'name.unique' => 'This meal name has already been taken.'
        ];

        $validator = Validator::make(Input::all(), $rules, $messages);

        if ($validator->fails()) 
        {
            return Redirect::back()
            ->withErrors($validator)
            ->withInput();
        } else {
            $meal = Meal::find($request->id);
            $meal->name = $request->name;
            $meal->save();
            return redirect("/meals");
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
        Meal::where('id', $id)->delete();
        return redirect("/meals");
    }
}
