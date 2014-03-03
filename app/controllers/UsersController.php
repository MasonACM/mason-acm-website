<?php

class UsersController extends BaseController {
    protected $layout = "layouts.master";
    
    public function getLogin() {
        return View::make('users.login');
    }

    public function getRegister() {
        return View::make('users.register');
    }

    public function getLogout() {
        Auth::logout();
        return Redirect::to('users/login');
    }

    public function __construct() {
       $this->beforeFilter('csrf', array('on'=>'post'));
       $this->beforeFilter('auth', array('only'=>array('getDashboard')));       
    }

    public function postRemove()
    {
        $user = User::where('id', Input::get('id'))->first();
        $user->removeUser();

        return Redirect::to('superadmin/accounts'); 
    } 

    public function postEditrole()
    {
        $user = User::where('id', Input::get('id'))
                    ->update(array('role' => Input::get('role')));

        return Redirect::to('superadmin/accounts'); 
    }

    public function postCreate() {
        $validator = Validator::make(Input::all(), User::$rules);

        if ($validator->passes()) {
            $user = new User;
            $user->firstname =  Input::get('firstname');
            $user->lastname =   Input::get('lastname');
            $user->email =      Input::get('email');
            $user->password =   Hash::make(Input::get('password'));
            $user->grad_year =  Input::get('grad-year');
            $user->role = 0;
            $user->updated_at = time();
            $user->created_at = time();
            $user->save();

            Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')));
            return Redirect::to('/');
        } else {
            return Redirect::to('users/register')->with('message', 'Errors occurred during registration')->withErrors($validator)->withInput();   
        }
    }

    public function postLogin() {
        if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
            return Redirect::to('/');
        } 
        else {
            return Redirect::to('users/login')
                ->with('message', 'Your username/password combination was incorrect')
                ->withInput();
        }
    }
}

?>