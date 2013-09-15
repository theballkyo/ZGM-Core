@extends('layouts.master')
@section('content')

@if(isset($msg))
	{{ $msg }}
@endif

<h2>
	Edit Account
</h2>
<table class="table table-hover">
	<tr>
		<td>{{ Lang::get('account.username') }}</td>
		<td>{{ $user->username }}</td>
	</tr>
	<tr>
		<td>{{ Lang::get('account.email') }}</td>
		<td>{{ $user->email }}</td>
	</tr>
	<tr>
		<td>{{ Lang::get('account.logintime') }}</td>
		<td>{{ $user->logintime }}</td>
	</tr>
	<tr>
		<td>{{ Lang::get('account.lastlogintime') }}</td>
		<td>{{ $user->lastlogintime }}</td>
	</tr>
	<tr>
		<td>{{ Lang::get('account.ip') }}</td>
		<td>{{ $user->ip }}</td>
	</tr>
	<tr>
		<td>{{ Lang::get('account.lastloginip') }}</td>
		<td>{{ $user->lastloginip }}</td>
	</tr>
</table>
{{ var_dump($errors) }}
@stop