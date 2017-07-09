<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Machine;
use App\Country;
use App\State;
use App\City;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '1000M');
    }
    
	/**
     * Show the enquiry list.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
	{
		$customers = Customer::where('isDelete',0)->orderBy('id', 'desc')->get();
        $countries  = Country::all();
        $state      = State::all();
        $city       = City::all();
        $cities     = City::all();
        $district   = City::all();
        $machine = Machine::where('isDelete',0)->get();
        return view('customers',['customers' => $customers,'machine' => $machine, 'countries' => $countries,'state' => $state,'city' => $city, 'cities' => $cities]);
    }

	/**
     * Show the add customer  form.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '1000M');
        $countries  = Country::all();
        $machine = Machine::where('isDelete',0)->get();
        return view('customer_form',['machine' => $machine, 'countries' => $countries]);
    }

    /**
     * Save the customer information.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // apply validation.
        $this->validate($request, [
            'customer_name' => 'required|max:255',
            'address' => 'required',
            'district' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'machine' => 'required',
            'quantity' => 'required',
            'purchase_year' => 'required',
            ]);
        // save customer record in products table.
        $customer                    = new Customer;
        $customer->customer_name     = $request['customer_name'];
        $customer->address           = $request['address'];
        $customer->city              = $request['city'];
        $customer->district          = $request['district'];
        $customer->state             = $request['state'];
        $customer->country           = $request['country'];
        $customer->machine           = $request['machine'];
        $customer->quantity          = $request['quantity'];
        $customer->contact           = isset($request['contact'])? $request['contact'] : '0';
        $customer->email             = isset($request['email'])? $request['email'] : '';
        $customer->purchase_date     = isset($request['purchase_date'])? $request['purchase_date'] : '';
        $customer->purchase_year     = $request['purchase_year'];
        $customer->save();
        return redirect('customers')->with('status', 'Customer Added Successfully');
    }

    /**
     * Get the customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id="")
    {
        $customer = Customer::where('id',$id)->get();
        $countries  = Country::all();
        $state      = State::all();
        $city       = City::all();
        $district   = City::all();
        $machine = Machine::where('isDelete',0)->get();
        //return view('edit_customer',compact('customer'));
        return view('edit_customer',['customer' => $customer,'machine' => $machine, 'countries' => $countries,'state' => $state,
            'city' => $city]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
    */
    public function update($id, Request $request)
    {
        // apply validation.
        $this->validate($request, [
            'customer_name' => 'required|max:255',
            'address' => 'required',
            'district' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'machine' => 'required',
            'quantity' => 'required',
            'purchase_year' => 'required',
            ]);
        // save customer record in products table.
        $customer                    = Customer::find($id);
        $customer->customer_name     = $request['customer_name'];
        $customer->address           = $request['address'];
        $customer->city              = $request['city'];
        $customer->district          = $request['district'];
        $customer->state             = $request['state'];
        $customer->country           = $request['country'];
        $customer->machine           = $request['machine'];
        $customer->quantity          = $request['quantity'];
        $customer->contact           = isset($request['contact'])? $request['contact'] : '0';
        $customer->email             = isset($request['email'])? $request['email'] : '';
        $customer->purchase_date     = isset($request['purchase_date'])? $request['purchase_date'] : '';
        $customer->purchase_year     = $request['purchase_year'];
        $customer->update();
        return redirect('customers')->with('status', 'Customer Updated Successfully');
    }

    /**
     * Delete the customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id=" ")
    {
        // delete machine record.
        $customer        = Customer::find($id);
        //dd($machine);
        $customer->isDelete = 1;
        $customer->update();
        return redirect('customers')->with('status', 'Customer Deleted Successfully');
    }

    /**
     * Get customers by country.
     *
     * @return \Illuminate\Http\Response
     */
    public function getcustomerbyCountry(Request $request)
    {
        if (empty($request['id'])) {
            return response()->json('Please Select Country');
        } else {
            $CustomerCount = Customer::where('country',$request['id'])->count();
            return response()->json($CustomerCount);
        }
    }

    /**
     * Get customers by Taluka(Tehsil) / City.
     *
     * @return \Illuminate\Http\Response
     */
    public function getcustomerbyCity(Request $request)
    {
        if (empty($request['id'])) {
            return response()->json('Please Select City');
        } else {
            $CustomerCount = Customer::where('city',$request['id'])->orWhere('district',$request['id'])->count();
            return response()->json($CustomerCount);
        }
    }






}
