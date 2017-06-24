<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;

class CountryController extends Controller
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
     * Show the country list.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$country = Country::get();
    	return view('country',['country' => $country]);
    }

    /**
     * Show the country form.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
    	return view('country_form');
    }

    /**
     * Save the country information.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    	// apply validation.
    	$this->validate($request, [
    		'country_name' => 'required|max:255',
    		'short_name' => 'required|min:2|max:3',
    		'phone_code' => 'required|max:5',
    		]);
        // save country record in products table.
    	$country          			= new Country;
    	$country->name    			= $request['country_name'];
    	$country->shortname    		= $request['short_name'];
    	$country->phonecode    		= $request['phone_code'];
    	$country->save();
    	return redirect('country')->with('status', 'Country Added Successfully');
    }

    /**
     * Get the machine information.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id="")
    {
    	$country = Country::where('id',$id)->get();
    	//dd($machine);
    	return view('edit_country',compact('country'));
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
    		'country_name' => 'required|max:255',
    		'short_name' => 'required|min:2|max:3',
    		'phone_code' => 'required|max:5',
    		]);

        // save country record in products table.
    	$country          			= Country::find($id);
    	$country->name    			= $request['country_name'];
    	$country->shortname    		= $request['short_name'];
    	$country->phonecode    		= $request['phone_code'];
    	$country->update();
    	return redirect('country')->with('status', 'Country Updated Successfully');;
    }

    /**
     * Save the country information.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id=" ")
    {
        // delete country record.
    	$country 		= Country::find($id);
    	$country->delete();
    	return redirect('country')->with('status', 'country Deleted Successfully');

    }


}
