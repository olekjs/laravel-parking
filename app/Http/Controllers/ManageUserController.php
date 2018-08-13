<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ManageUserController extends Controller
{
    public function index()
    {
 		$users = User::paginate(20);

    	return view('admin.user.index', [
    		'users' => $users,
    	]);
    }
}
