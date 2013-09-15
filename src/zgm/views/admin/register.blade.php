@extends('layouts.master')
@section('content')
<h1>
Register :: page
</h1>
{{ Form::open() }}
{{ Form::label('username',Lang::get('register.username'))}}
{{ Form::text('username') }}
{{ $errors->first('username') }}
<br>
{{ Form::label('password',Lang::get('register.password'))}}
{{ Form::password('password') }}
{{ $errors->first('password') }}
<br>
{{ Form::label('email',Lang::get('register.email'))}}
{{ Form::email('email')}}
{{ $errors->first('email') }}
<br>
{{ Form::submit('register') }}
{{ Form::close() }}
@stop