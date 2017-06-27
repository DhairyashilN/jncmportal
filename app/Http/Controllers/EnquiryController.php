<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customerenquiry;

class EnquiryController extends Controller
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
     * Show the enquiry list.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$enquiries = Customerenquiry::where('isDelete',0)->orderBy('id', 'desc')->get();
    	return view('enquiries',['enquiries' => $enquiries]);
    }

    /**
     * Show the enquiry form.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
    	return view('enquiry_form');
    }

    /**
     * Save the enquiry information.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    	// apply validation.
    	$this->validate($request, [
    		'customer_name' => 'required|max:255',
    		'address' => 'required',
    		'contact1' => 'required',
    		'enq_date' => 'required',
            'comments' => 'required',
            'followupdate' => 'required',
            ]);
        // save enquiry record in products table.
    	$enquiry          			= new Customerenquiry;
    	$enquiry->customer_name    	= $request['customer_name'];
    	$enquiry->address    		= $request['address'];
    	$enquiry->contact1    		= $request['contact1'];
    	$enquiry->contact2    		= isset($request['contact2'])? $request['contact2'] : '';
    	$enquiry->email    			= isset($request['email'])? $request['email'] : '';
    	$enquiry->enquiry_date    	= $request['enq_date'];
        $enquiry->comments          = $request['comments'];
        $enquiry->followup_date    	= $request['followupdate'];
        $enquiry->save();
        return redirect('enquiries')->with('status', 'Enquiry Added Successfully');
    }

    /**
     * Get the enquiry.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id="")
    {
    	$enquiry = Customerenquiry::where('id',$id)->get();
    	//dd($machine);
    	return view('edit_enquiry',compact('enquiry'));
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
    		'contact1' => 'required',
    		'enq_date' => 'required',
    		'comments' => 'required',
            'followupdate' => 'required',
            ]);

    	$enquiry          			= Customerenquiry::find($id);
    	$enquiry->customer_name    	= $request['customer_name'];
    	$enquiry->address    		= $request['address'];
    	$enquiry->contact1    		= $request['contact1'];
    	$enquiry->contact2    		= isset($request['contact2'])? $request['contact2'] : '';
    	$enquiry->email    			= isset($request['email'])? $request['email'] : '';
    	$enquiry->enquiry_date    	= $request['enq_date'];
    	$enquiry->comments          = $request['comments'];
        $enquiry->followup_date     = $request['followupdate'];
        $enquiry->update();
        return redirect('enquiries')->with('status', 'Enquiry Updated Successfully');;
    }




    /**
     * Delete the enquiry.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id=" ")
    {
        // delete machine record.
      $enquiry 		= Customerenquiry::find($id);
    	//dd($machine);
      $enquiry->isDelete = 1;
      $enquiry->update();
      return redirect('enquiries')->with('status', 'Enquiry Deleted Successfully');

  }
}
