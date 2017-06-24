<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\state;
use App\Country;

class StateController extends Controller
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
    	$state 		= State::get();
    	return view('state',['state' => $state]);
    }

    /**
     * Show the country form.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
    	$country = Country::all();
    	return view('state_form',['country' => $country]);
    }

    /**
     * Save the state information.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    	// apply validation.
    	$this->validate($request, [
    		'state_name' => 'required|max:255',
    		'country' => 'required'
    		]);
        // save country record in products table.
    	$state          			= new State;
    	$state->name    			= $request['state_name'];
    	$state->country_id    		= $request['country'];
    	$state->save();
    	return redirect('state')->with('status', 'State Added Successfully');
    }

    /**
     * Get the state information.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id="")
    {
    	$state = State::where('id',$id)->get();
    	$country = Country::all(); 
    	return view('edit_state',['state'=>$state, 'country'=>$country]);
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
    		'state_name' => 'required|max:255',
    		'country' => 'required',
    		]);

        // save state record in products table.
    	$state          			= State::find($id);
    	$state->name    			= $request['state_name'];
    	$state->country_id    		= $request['country'];
    	$state->update();
    	return redirect('state')->with('status', 'State Updated Successfully');;
    }

    /**
     * Save the state information.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id=" ")
    {
        // delete state record.
    	$state 		= State::find($id);
    	$state->delete();
    	return redirect('state')->with('status', 'State Deleted Successfully');
    }
}
