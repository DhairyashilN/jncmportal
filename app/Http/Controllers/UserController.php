<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
     * Show the User list.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	Auth::user()->isAdmin;
    	$users = User::where('isDelete',0)->get();
    	return view('users',['users' => $users]);
    }

    /**
     * Show the enquiry form.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
    	return view('user_form');
    }

    /**
     * Save the user information.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // apply validation.
    	$this->validate($request, [
    		'name' => 'required|max:255',
    		'email' => 'required|min:8',
    		'password' => 'required',
    		'privilege' => 'required',
    		]);
        // save user record in products table.
    	$user                    = new User;
    	$user->name        		 = $request['name'];
    	$user->email             = $request['email'];
    	$user->password          = bcrypt($request['password']);
    	$user->isAdmin           = $request['privilege'];
    	$user->isSuperAdmin      = 0;
    	$user->save();
    	return redirect('users')->with('status', 'User Added Successfully');
    }

    /**
     * Get the User.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id="")
    {
    	$user = User::where('id',$id)->get();
        //return view('edit_user',compact('user'));
    	return view('edit_user',['user' => $user]);
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
    		'name' => 'required|max:255',
    		'email' => 'required',
    		//'privilege' => 'required',
    		]);
        // save user record in products table.
    	$user                    = User::find($id);
    	$user->name        		 = $request['name'];
    	$user->email             = $request['email'];
    	$user->password          = isset($request['password'])? bcrypt($request['password']) : $user->password;
    	$user->isAdmin           = isset($request['privilege'])? $request['privilege'] : 0;
    	$user->isSuperAdmin      = 0;
        $user->update();
    	return redirect('users')->with('status', 'User Added Successfully');
    }

    /**
     * Delete the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id=" ")
    {
        // delete user record.
        $user        = User::find($id);
        $user->isDelete = 1;
        $user->update();
        return redirect('users')->with('status', 'User Deleted Successfully');
    }

    public function check(Request $request)
    {
        dd($request);
    }

}
