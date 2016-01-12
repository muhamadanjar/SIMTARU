<?php namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

class CustomAuthController extends Controller {

    protected $redirectTo = 'map';
    protected $redirectPathEditor = 'map';

    public function __construct(Guard $auth){
        $this->auth = $auth;
        

        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function getLogin() {
        return view('custom_auth.login'); //or just use the default login page
    }

    public function postLogin(Request $request) {
     

        $this->validate($request, [
            'username' => 'required', 
            'password' => 'required',
        ]);
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials,$request->has('remember')))
        {
            return redirect()->intended($this->redirectPath());
        }

        return redirect($this->loginPath())
                    ->withInput($request->only('username', 'remember'))
                    ->withErrors([
                        'username' => $this->getFailedLoginMessage(),
                    ]);
    }

    public function getLoginEditor() {
        return view('custom_auth.logineditor'); //or just use the default login page
    }

    public function postLoginEditor(Request $request) {
     

        $this->validate($request, [
            'username' => 'required', 
            'password' => 'required',
        ]);
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials,$request->has('remember')))
        {
            return redirect()->intended($this->redirectPathEditor());
        }

        return redirect($this->loginPathEditor())
                    ->withInput($request->only('username', 'remember'))
                    ->withErrors([
                        'username' => $this->getFailedLoginMessage(),
                    ]);
    }

    public function getLogout()
    {
        $this->auth->logout();

        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }

    protected function getFailedLoginMessage()
    {
        return 'Username dan password yang anda masukan salah.';
    }

    public function redirectPath(){
        if (property_exists($this, 'redirectPath'))
        {
            return $this->redirectPath;
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }

    public function redirectPathEditor(){
        if (property_exists($this, 'redirectPathEditor'))
        {
            return $this->redirectPathEditor;
        }

        return property_exists($this, 'redirectToEditor') ? $this->redirectToEditor : '/home';
    }

    public function loginPath()
    {
        return property_exists($this, 'loginPath') ? $this->loginPath : '/cauth/login';
    }

    public function loginPathEditor()
    {
        return property_exists($this, 'loginPathEditor') ? $this->loginPathEditor : '/login/editor';
    }
}
