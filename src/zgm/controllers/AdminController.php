<?php
class AdminController extends BaseController {

	public function __construct()
	{

	}

	public function Index()
	{
		$this->layout->content = View::make('admin.index');
	}

	public function setCloseSite()
	{

	}

	public function getRegister()
	{
		$this->layout->content = View::make('admin.register');
	}

	public function postRegister()
	{
		$user = new Account();
		$validator = Validator::make(Input::all(),$user->adminRules());

		if($validator->fails())
		{
			return Redirect::to('admin/member/register')->withErrors($validator);
		}

		$user->username = Input::get('username');
		$user->password = Hash::make(Input::get('password'));
		$user->email 	= Input::get('email');
		$user->ip 		= Request::getClientIp();
		$user->save();
	}

	public function getAccounts()
	{
		//$users = Account::all();
		$this->layout->content = View::make('admin.accounts');
	}

	public function getAccountsJson()
	{
		$skip = (int) Input::get('iDisplayStart');
		$take = (int) Input::get('iDisplayLength');

		switch ((int) Input::get('iSortCol_0')) {
			case '0':
				$orderby = 'username';
				break;
			case '1':
				$orderby = 'email';
				break;
			case '2':
				$orderby = 'logintime';
				break;
			case '3':
				$orderby = 'lastlogintime';
				break;
			case '4':
				$orderby = 'ip';
				break;
			case '5':
				$orderby = 'lastloginip';
				break;
			default:
				$orderby = 'username';
				break;
		}

		$users_count = Account::count();
		$users = Account::select(array('id', 'username', 'email', 'logintime', 'lastlogintime', 'ip', 'lastloginip', 'group'))
				->where('username', 'like', '%'.Input::get('sSearch').'%')
				->orWhere('email', 'like', '%'.Input::get('sSearch').'%')
				->orWhere('logintime', 'like', '%'.Input::get('sSearch').'%')
				->orWhere('lastlogintime', 'like', '%'.Input::get('sSearch').'%')
				->orWhere('ip', 'like', '%'.Input::get('sSearch').'%')
				->orWhere('lastloginip', 'like', '%'.Input::get('sSearch').'%')
				->orderBy($orderby, (string) Input::get('sSortDir_0'))
				->skip($skip)
				->take($take)
				->get();
		$data = array(
			'sEcho'  =>(int) Input::get('sEcho'),
			'iTotalRecords' => $users_count,
			'iTotalDisplayRecords' => $users_count,		
			'aaData' => $users->toArray()
			);

		return Response::json($data);
	}

	public function editAccount($id)
	{
		$user = Account::find($id);

		$this->layout->content = View::make('admin.editaccount',array('user' => $user));
	}

	public function postDelAccount($id)
	{
		$user = Account::find($id)->delete();
		if(Input::get('ajax') == "true")
		{
			return Response::json(array(
					'type'	=> "succ",
					'title'	=> Lang::get('account.del_succ'),
					'body'	=> Lang::get('account.del_succ2')
				));
		}
	}

	public function postEditAccount($id)
	{
		$user = Account::find($id);

		//Validator Input
		$validator = Validator::make(Input::all(),$user->adminRules());

		if($validator->fails())
		{
			if(Input::get('ajax') == "true")
			{
				return Response::json($validator->messages());
			}
			return Redirect::to("admin/member/$id")->withErrors($validator);
		}

		//Update row
		$user->update(Input::all());

		if(Input::get('ajax') == "true")
		{
			return "true";
		}

		$this->layout->content = View::make('admin.editaccount',array('user' => $user, 'msg' => 'Update success.'));
	}

	public function BanAccount($id)
	{
		$user = Account::find($id);
		$user->group = '-1';
		$user->save();

		if(Input::get('ajax') == "true")
		{
			return Response::json(array(
					'type'	=> "succ",
					'title'	=> Lang::get('account.del_succ'),
					'body'	=> Lang::get('account.del_succ2')
				));
		}
		
		$this->layout->content = View::make('admin.message',array('title' => '', 'msg' => ''));
	}

	public function Test()
	{
		$user = new Account();
		$count = $user->count();
		$data = array();
		for ($i=4000; $i < 7000; $i++) {
			$data[$i]['username'] = 'tester'.$i;
			$data[$i]['password'] = '123456';
			$data[$i]['email'] 	= 'test@test.com'.$i;
			$data[$i]['ip']		= '127.0.0.1';
		}
		$user->insert($data);
	}
}