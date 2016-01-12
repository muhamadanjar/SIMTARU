<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\LevelUser;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
//use Illuminate\Http\Request;

class UserController extends Controller {

	
	public function __construct() {

		$this->middleware('auth');
		
	}

	public function create(CreateUserRequest $request) {
		
		$user = new User;
		$user->name = $request->name;
		$user->email = $request->email;
		$user->username = $request->username;
		$user->password = bcrypt($request->password);
		$user->leveluser = implode(",", (array)$request->leveluser);
		$user->save();

		return redirect('user/create-new-user/success');
	}

	public function delete($id) {

		$user = User::find($id);

		$user->delete();

		return redirect('user/manage-existing-user/delete/' . $id . '/success');
	}

	public function edit(EditUserRequest $request) {

		$user = User::find($request->id);
		$user->name = $request->name;
		$user->email = $request->email;
		$user->username = $request->username;

		if($request->oldpassword == $request->password){
			$user->password = $request->oldpassword;
		}else{
			$user->password = bcrypt($request->password);	
		}
		$user->leveluser = implode(",", (array)$request->leveluser);

		$user->save();
		$user->touch();

		return redirect('user/manage-existing-user/edit/' . $request->id . '/success');
	}

	public function manageExisting() {

		$admin = \Auth::user();
		$user = User::all();
		$title = 'Manage Existing User';

		return view('page.useradmin')->with('title', $title)->with('users', $user)->with('admin', $admin);
	}

	public function editExisting($id) {

		$admin = \Auth::user();
		$users = User::find($id);
		$leveluser = LevelUser::all();
		$title = 'Edit Existing User';

		return view('page.useradminedit',compact('title','users','admin','leveluser'));
	}

	public function createNew() {

		$admin = \Auth::user();
		$title = 'Create New User';

		return view('page.useradminadd')->with('title', $title)->with('admin', $admin);
	}

}
