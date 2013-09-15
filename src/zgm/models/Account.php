<?php
use Illuminate\Auth\UserInterface;

class Account extends Eloquent implements UserInterface{

	protected $table = 'accounts';

	protected $fillable = array('username', 'password', 'group', 'email');
	
	public $timestamps = false;

	public function rules()
	{
		return array(
			'username'	=> array('required', 'between:4,16', 'unique:accounts,username'),
			'password'	=> array('required', 'between:6,24'),
			'password2'	=> array('required', 'same:password2'),
			'email'		=> array('required', 'unique:accounts,email', 'email'),
			'email2'	=> array('required', 'same:email')
			);
	}
	public function adminRules()
	{
		return array(
			'username'	=> array('unique:accounts,username'),
			'password'	=> array('between:6,24'),
			'email'		=> array('unique:accounts,email', 'email')
			);
	}
	public function updateProfileRule()
	{
		return array(
			'password'		=> array('required', 'between:6,24'),
			'new_password'	=> array('between:6,24', 'confirmed'),
			'email'			=> array('unique:accounts,email', 'email')
			);
	}
	public function getAuthPassword()
	{
		return $this->password;
	}
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}
}

?>