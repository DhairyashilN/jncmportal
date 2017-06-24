<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Machine;

class MachineController extends Controller
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
     * Show the machine list.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$machine = Machine::where('isDelete',0)->get();
    	return view('machine',['machine' => $machine]);
    }

    /**
     * Show the machine form.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
    	return view('machine_form');
    }

    /**
     * Save the machine information.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    	// apply validation.
    	$this->validate($request, [
    		'machine_name' => 'required|max:255',
    		]);
        // save machine record in products table.
    	$machine          			= new Machine;
    	$machine->machine_name    	= $request['machine_name'];
    	$machine->save();
    	return redirect('machinery')->with('status', 'Machine Added Successfully');
    }

    /**
     * Get the machine information.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id="")
    {
    	$machine = Machine::where('id',$id)->get();
    	//dd($machine);
    	return view('edit_machine',compact('machine'));
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
    		'machine_name' => 'required|max:255',
    	]);

    	$machine = Machine::find($id);
    	$machine->machine_name = $request['machine_name'];
    	$machine->update();
    	return redirect('machinery')->with('status', 'Machine Updated Successfully');;
    }

	/**
     * Save the machine information.
     *
     * @return \Illuminate\Http\Response
     */
	public function destroy($id=" ")
	{
        // delete machine record.
		$machine 		= Machine::find($id);
    	//dd($machine);
		$machine->isDelete = 1;
		$machine->update();
		return redirect('machinery')->with('status', 'Machine Deleted Successfully');

	}
}
