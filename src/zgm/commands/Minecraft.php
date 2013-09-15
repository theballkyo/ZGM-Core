<?php
class MC_DB extends Eloquent{

	protected $table = 'authme';

	public $timestamps = false;

	protected $guarded = array('id');

}
class Minecraft{

	private $user;

	private $limit_per_user = 2;

	public function __construct()
	{
		$this->loadUser();
	}

	/**
	 * Load user data 
	 *
	 * @return object
	 *
	 */
	public function loadUser()
	{
		if($this->user == null)
		return $this->user = Account::where('id', '=', '789456')->get();
	}

	/**
	 * Count account in this app
	 *
	 * @return int
	 *
	 */
	public function countUser()
	{
		return $this->user->count();
	}
	
	/**
	 * Register user
	 *
	 * @return true , array[Error]
	 *
	 */
	public function register()
	{
		if($this->canRegister())
		{
			$validator = Validator::make(Input::all(), array(
							'username'				=> array('required', 'between:3,12'),
							'password'				=> array('required', 'between:6,18', 'confirmed'),
							'password_confirmation'	=> array('required'),
							));

			if($validator->fails())
			{
				return $validator;
			}

			$user = MC_DB::create(array(
				'owner_id'	=> Auth::user()->id,
				'username'	=> Input::get('username'),
				'password'	=> $this->hash(Input::get('password')),
				));

			return true;
		}
		return false;
	}

	/**
	 * Check user can register ?
	 *
	 * @return bool
	 *
	 */
	public function canRegister()
	{
		if($this->countUser() >= $this->limit_per_user){ return false; }

		return true;
	}

	/**
	 * Render register
	 *
	 */
	public function renderRegister()
	{
		if($this->canRegister())
		{
			return View::make('account.get.addminecraft');
		}
		return View::make('account.get.addminecraft',array('msg_error' => 'คุณไม่สามารถสมัครบริการนี้ได้อีกแล้ว !'));
	}

	/**
	 * Render account
	 *
	 */
	public function renderAccount()
	{
		return View::make('account.get.minecraft', array('account' => $this->user));
	}

	/**
	 * Hash function
	 *
	 * @return string
	 *
	 */
	public function hash($text)
	{
		return sha1($text);
	}
}

?>