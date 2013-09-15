@extends('layouts.master')
@section('content')
	คุณสมัครสมาชิก : {{ $account_name }} เสร็จเรียบร้อยแล้ว
	<br>
	Username : {{ $userdata['username'] }}
	Password : {{ $userdata['password'] }}
@stop