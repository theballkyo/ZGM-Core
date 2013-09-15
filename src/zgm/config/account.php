<?php 
return array(

	/*
	|--------------|
	| Name for url |
	|--------------|
	*/
	'minecraft' => array(
		'title'		=> 'Minecraft',

		/*
		|-------------------------|
		| Detail in register page |
		|-------------------------|
		| Can use html code in this detail.
		|
		*/
		'detail'	=> '
		This is a Minecraft !!!<br><h3>Username is your zone-gamer username.</h3>
		',

		'table'		=> 'taccounts',
		'columns'	=> array(
			/*
			|-----------------------------------------------------------|
			| Ex. 'column name' => array(Type, Labelname, Value) |
			|-----------------------------------------------------------|
			| Important! Create column zgm_user for checking account owner.
			| @"Password" column use column name  = "password" only.
			| @'fix_value' => | default = Using value same account. | new = Using new value.
			| @'no_insert' => | don't insert to database.
			| @'hidden' => | hidden in form register.
			|
			*/
			'username'	=> array('type' => 'text', 'fix_value' => 'username', 'hidden' => true),
			'password'	=> array('type' => 'password'),
			//'password2'	=> array('type' => 'password', 'value' => 'new', 'no_insert' => true),
			'email'		=> array('type' => 'text'),
			'ip'		=> array('fix_value' => 'ip', 'hidden' => true),
			),
		'columns_rules'	=> array(
			/*
			|------------------|
			| Validation Rule. |
			|------------------|
			| Use validation rules like laravel validation rules
			| http://laravel.com/docs/validation#available-validation-rules
			|
			*/
			//'username'	=> array('required','between:4,16'),
			'password'	=> array('required','between:6,24'),
			//'email'		=> array('required')
			//'password2'	=> array('required','same:password'),
			),			
		'custom_db'	=> array(
			/*
			|----------------|
			| Only MySQL !!! |
			|----------------|
			*/
			'driver'	=> 'mysql',
			'host'		=> 'localhost',
			'database'	=> 'zgm',
			'username'	=> 'root',
			'password'	=> '',
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',

		),
		'is_open'	=> true
	), /* End */

	'minecraft2' => array(
		'title'		=> 'Minecraft2',
		'detail'	=> 'This is a Minecraft',
		'table'		=> 'taccounts',
		'columns'	=> array(

			/*
			|----------------------------|
			| Ex. 'column name' => rules |
			|----------------------------|
			*/
			'username' => array('type' => 'text', 'labelname' => 'Name....', 'value' => 'default'),
			'password' => array('type' => 'password', 'value' => 'new'),
			
			),

		'custom_db'	=> array(
			/*
			|----------------|
			| Only MySQL !!! |
			|----------------|
			*/
			'driver'	=> 'mysql',
			'host'		=> 'localhost',
			'database'	=> 'zgm',
			'username'	=> 'root',
			'password'	=> '',
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',

		),
		'is_open'	=> false
	)
);
?>