<?php namespace App\Http\Controllers;

use App\Bookmark;
use App\User;
use App\Http\Requests;
use App\Http\Requests\CreateBookmarkRequest;
use App\Http\Requests\EditBookmarkRequest;
use App\Http\Controllers\Controller;
//use App\Http\Controllers\Auth;

class BookmarkController extends Controller {

	public function __construct() {

		$this->middleware('auth');
		
	}
	public function create(CreateBookmarkRequest $request) {
		
		//$destinationPath = public_path('images');
		//$fileName = str_random(20) . '.' . $request->file('image')->getClientOriginalExtension();
		
		$bookmark = new Bookmark;

		$bookmark->name = $request->name;
		$bookmark->x_min = $request->x_min;
		$bookmark->y_min = $request->y_min;
		$bookmark->x_max = $request->x_max;
		$bookmark->y_max = $request->y_max;
		$bookmark->wkid = $request->wkid;
		$bookmark->save();

		//$request->file('image')->move($destinationPath, $fileName);

		return redirect('bookmark');
	}

	public function createSuccess() {
		
		$admin = \Auth::user();
		
		$title = 'Bookmark Published';
		
		return view('bookmark.createsuccess')->with('title', $title)->with('admin', $admin);
	}


	public function delete($id) {

		$bookmark = Bookmark::find($id);

		$bookmark->delete();
		//\File::delete(public_path('images/' . $post->image));

		return redirect('bookmark/manage-existing-bookmark/delete/' . $id . '/success');
	}

	public function deleteSuccess() {
		
		$admin = \Auth::user();

		$title = 'Bookmark Deleted';

		return view('bookmark.deletesuccess')->with('title', $title)->with('admin', $admin);
	}

	public function editExistingBookmark($id) {

		$admin = \Auth::user();

		$bookmark = Bookmark::find($id);
		

		$title = 'Edit Existing Bookmark';

		return view('bookmark.edit')->with('title', $title)->with('bookmarks', $bookmark)->with('admin', $admin);
	}

	public function edit(EditBookmarkRequest $request) {

		$bookmark = Bookmark::find($request->id);

		$bookmark->name = $request->name;
		$bookmark->x_min = $request->x_min;
		$bookmark->y_min = $request->y_min;
		$bookmark->x_max = $request->x_max;
		$bookmark->y_max = $request->y_max;
		$bookmark->wkid = $request->wkid;

		$bookmark->save();
		$bookmark->touch();

		return redirect('bookmark/manage-existing-bookmark/edit/' . $request->id . '/success');
	}

	public function editSuccess() {
		
		$admin = \Auth::user();

		$title = 'Bookmark Updated';

		return view('bookmark.editsuccess')->with('title', $title)->with('admin', $admin);
	}

	public function viewAllBookmark() {
		
		$admin = \Auth::user();

		$bookmark = Bookmark::all();

		$title = 'Bookmark List';

		return view('bookmark.index')->with('bookmarks', $bookmark)->with('title', $title)->with('admin', $admin);
	}

	

	public function createNewBookmark() {

		$admin = \Auth::user();

		$title = 'Create New Bookmark';

		return view('bookmark.add')->with('title', $title)->with('admin', $admin);
	}

}
