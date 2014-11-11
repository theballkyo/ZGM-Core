<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	public function __construct()
	{
		$this->beforeFilter('guest', array('only' => array('getLogin', 'getRegister', 'postLogin', 'postRegister')));
	}

	public function index()
	{
		return $this->layout->content = View::make('index');
	}
	public function help()
	{
		return View::make('help');
	}

	public function getLogin()
	{
		return $this->layout->content = View::make('login');
	}

	public function postLogin()
	{
		$userdata = array(
			'username'	=>	Input::get('username'),
			'password'	=>	Input::get('password')
		);

		$validator = Validator::make($userdata,array(
			'username'	=> array('required', 'between:4,16'),
			'password'	=> array('required', 'between:6,24')
			));

		if($validator->fails())
		{
			return Redirect::to('login')->withErrors($validator);
		}

		if(Auth::attempt($userdata))
		{
			Auth::user()->lastlogintime	= Auth::user()->logintime;
			Auth::user()->lastloginip	= Auth::user()->ip;
			Auth::user()->logintime = Date("Y-m-d h:i:s");
			Auth::user()->ip   = Request::getClientIp();
			Auth::user()->save();
			return Redirect::to('/account');
		}
		else
		{
			return Redirect::to('login')->withErrors(array('login' => 'Username or password incorrect.<br>'));
		}
	}
	
	public function getLogout()
	{
		Auth::Logout();
	}

	public function getRegister()
	{
		//$this->layout->content = View::make('register');
		return View::make('register');
	}

	/*
	 Register User
	*/
	public function postRegister()
	{
		$user = new Account();

		$validator = Validator::make(Input::all(),$user->rules());

		if($validator->fails())
		{
			return Redirect::to('register')->withErrors($validator);
		}
		$user->username = Input::get('username');
		$user->password = Hash::make(Input::get('password'));
		$user->email 	= Input::get('email');
		$user->ip 		= Request::getClientIp();
		$user->save();

	}

	public function tester()
	{
		return "Hello";
	}


}