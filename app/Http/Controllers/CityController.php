<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\City;

class CityController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    	$this->middleware('auth');
    }
    
    /**
     * Show the state list.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$city = City::get();
    	return view('city',['city' => $city]);
    }

    /**
     * Show the country form.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
    	$state = State::all();
    	return view('city_form',['state' => $state]);
    }

    /**
     * Save the city information.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    	// apply validation.
    	$this->validate($request, [
    		'city_name' => 'required|max:255',
    		'state' => 'required'
    		]);
        // save country record in products table.
    	$city          			= new City;
    	$city->name    			= $request['city_name'];
    	$city->state_id    		= $request['state'];
    	$city->save();
    	return redirect('city')->with('status', 'City Added Successfully');
    }

    /**
     * Get the city information.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id="")
    {
    	$city = City::where('id',$id)->get();
    	$state = State::all(); 
    	return view('edit_city',['city'=>$city, 'state'=>$state]);
    }

    /**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	*/
    public function update($id, Request $request)
    {
    	//apply validation
    	$this->validate($request, [
    		'city_name' => 'required|max:255',
    		'state' => 'required'
    		]);

        // save state record in products table.
    	$city           = City::find($id);
    	$city->name    	= $request['city_name'];
    	$city->state_id = $request['state'];
    	$city->update();
    	return redirect('city')->with('status', 'City Updated Successfully');;
    }

    /**
     * Save the state information.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id=" ")
    {
        // delete state record.
    	$city = City::find($id);
    	$city->delete();
    	return redirect('city')->with('status', 'City Deleted Successfully');
    }


}
