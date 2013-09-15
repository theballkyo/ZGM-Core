@extends('layouts.master')
@section('nav')
<li class="active dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
      Member <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
		<li{{ Request::is('account/view') ? ' class="active"' : '' }}><a href="{{ URL::to('account/view') }}">จัดการ Account</a></li>
		<li{{ Request::is('account/profile') ? ' class="active"' : '' }}><a href="{{ URL::to('account/profile') }}">Profile</a></li>
    </ul>
</li>
@stop