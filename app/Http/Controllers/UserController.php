<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

use App\User;

class UserController extends Controller
{
    public function store(UserRequest $request)
    {
    	$user = new User();
    	
    	if($request->province == "Québec")
    		$salary = str_replace(',', '.', $request->salary);
    	else
    		$salary = $request->salary;
    	
    	$user->name = $request->name;
    	$user->province = $request->province;
    	$user->salary = filter_var($salary, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    	$user->save();
    	
    	return view('saved', compact('user'));

    }

    public function list(Request $request)
    {
    	$users = User::latest('created_at')->paginate(3);

        if ($request->ajax()) {
            return view('load', ['users' => $users])->render();  
        }

        return view('list', compact('users'));
    }

    public function delete(Request $request)
    {
    	$user = User::find($request->query('user'));

    	if($user)
    		$user->delete();

    	$users = User::latest('created_at')->paginate(3); 
    	return view('load', ['users' => $users])->render();
    }
}
