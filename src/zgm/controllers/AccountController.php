<?php

class AccountController extends BaseController {

	protected $layout = 'layouts.master';

	public function __construct()
	{
		$this->beforeFilter('auth');
	}
	/*
	|------------|
	| Show Index |
	|------------|
	*/
	public function Index()
	{	
		return View::make('account.index');
	}

	/*
	|--------------|
	| Show Account |
	|--------------|
	*/

	public function getAccount()
	{
		$this->layout->content = View::make('account.account');
	}

	/*
	|-------------------|
	| Show user profile |
	|-------------------|
	*/

	public function getProfile()
	{
		$this->layout->content = View::make('account.get.profile');
	}

	/**
	 * Update account profile
	 *
	 * Method : Post , URL : account/profile
	 *
	 */

	public function updateProfile()
	{
		$user = Account::find(Auth::user()->id);

		$validator = Validator::make(Input::all(), $user->updateProfileRule());

		if($validator->fails())
		{
			return Redirect::to('account/profile')->withErrors($validator);
		}

		if(!Hash::check(Input::get('password'),$user->password))
		{
			return Redirect::to('account/profile')->withErrors(array('password' => 'Password not match.'));
		}

		if(Input::get('new_password') !== Input::get('new_password2'))
		{
			return Redirect::to('account/profile')->withErrors(array('new_password2' => 'Password not match.'));
		}

		if(Input::has('email'))
		{
			$user->email = Input::get('email');
		}

		if(Input::has('new_password'))
		{
			$user->password = Hash::make(Input::get('new_password'));
		}

		$user->save();
		
		$this->layout->content = View::make('account.get.profile');
	}

	/*
	|----------------------|
	| Show Add new account |
	|----------------------|
	*/
	public function getAddAccount($name)
	{
		$Loader = new $name();

		return $this->layout->content = $Loader->renderRegister();
	}

	/*
	|--------------
	| Add account |
	|--------------
	|
	*/
	public function postAddAccount($name)
	{
		$Loader = new $name();
		$register = $Loader->register();

		if($register !== true)
		{
			if($register !== false)
			{
				return Redirect::to("account/add/$name")->withErrors($register);
			}
			return Redirect::to("account/add/$name")->withErrors(array('msg_error' => 'มีบางอย่างผิดพลาดโปรดติดต่อ Admin #fail'));
		}
		return Redirect::to("account/view/$name");
	}

	public function getShowAccount($name)
	{
		$Loader = new $name();

		return $this->layout->content = $Loader->renderAccount();
	}
	
}
