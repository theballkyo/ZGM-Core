@extends('layouts.master')
@section('content')

{{ Form::open(array('url'=>'login' , 'class' => 'form-horizontal')) }}

<div class="form-group">
		{{ Form::label('username', 'กรอก Username', array('class' => 'col-lg-2 control-label'))}}
	<div class="col-lg-4">
		{{ Form::text('username', '', array('class' => 'form-control')) }}
	</div>
	<div class="error-msg"> 
		{{ $errors->first('username') }}
	</div>
</div>

<div class="form-group">
		{{ Form::label('username', 'กรอก Password', array('class' => 'col-lg-2 control-label'))}}
	<div class="col-lg-4">
		{{ Form::password('password', array('class' => 'form-control')) }}
	</div>
	<div class="error-msg"> 
		{{ $errors->first('password') }}
	</div>
</div>

<div class="form-group">

	<div class="col-offset-2 col-lg-10">
		{{ Form::submit('Login', array('class' => 'btn btn-primary btn-lg col-lg-2')) }}
	  <div class="col-lg-10 error-msg"> 
		{{ $errors->first('login') }}
	  </div>
	</div>

{{ Form::close() }}
</div>

@stop