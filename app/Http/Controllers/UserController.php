<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\LevelUser;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
use DB;
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

		try {
			DB::table('role_user')->insert(
				['role_id' => $request->role, 'user_id' => $user->id]
			);
		} catch (Exception $e) {
			DB::rollback();
		    throw $e;
		}

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

		try {
			$roleuser= DB::table('role_user')->where('user_id', $user->id);
			if ($roleuser->count() > 0) {
				$roleuser->update(
					['role_id' => $request->role, 'user_id' => $user->id]
				);
			}else{
				DB::table('role_user')->insert(
					['role_id' => $request->role, 'user_id' => $user->id]
				);
			}
			
		} catch (Exception $e) {
			DB::rollback();
		    throw $e;
		}

		return redirect('user')->with('message',\AHelper::format_message('Data Berhasil diubah','success'));
	}

	public function manageExisting() {

		$admin = \Auth::user();
		$user = User::join('role_user',function($join){
			$join->on('Users.id', '=', 'role_user.user_id');
		})
		->join('roles','roles.id','=','role_user.role_id')
		->get(['Users.id','Users.name','Users.name','Users.email','Users.username','Users.na','roles.name as rolename']);
		$title = 'Manage Existing User';

		return view('page.useradmin')->with('title', $title)->with('users', $user)->with('admin', $admin);
	}

	public function editExisting($id) {

		$admin = \Auth::user();
		//$users = User::find($id);
		$users = DB::table('Users')->join('role_user',function($join){
			$join->on('Users.id', '=', 'role_user.user_id');
		})->where('Users.id','=',$id)->first();
		$title = 'Edit Existing User';

		return view('page.useradminedit',compact('title','users','admin','leveluser'));
	}

	public function createNew() {

		$admin = \Auth::user();
		$title = 'Create New User';

		return view('page.useradminadd')->with('title', $title)->with('admin', $admin);
	}

	public function NAUser($id){
		$user = User::find($id);

		$status = ($user->na == 'N') ? 'Y' : 'N' ;
		$user->na = $status;
		$user->save();
		return redirect('user')->with('message',\AHelper::format_message('User Berhasil diubah','success'));
	}



}
