@extends('layouts.master')
@section('content')
{{ Form::open(array('class' => 'form-horizontal')) }}

<div class="form-group">
	{{ Form::label('username','กรอก Username : ', array('class' => 'col-lg-2 control-label'))}}
	<div class="col-lg-4">
		{{ Form::text('username', '', array('class' => 'form-control')) }}
	</div>
	<div class="error-msg"> 
		{{ $errors->first('username') }}
	</div>
</div>
<div class="form-group">
	{{ Form::label('password','กรอก password : ', array('class' => 'col-lg-2 control-label'))}}
	<div class="col-lg-4">
		{{ Form::password('password', array('class' => 'form-control')) }}
	</div>
	<div class="error-msg"> 
		{{ $errors->first('password') }}
	</div>
</div>
<div class="form-group">
	{{ Form::label('password2','กรอก password2 : ', array('class' => 'col-lg-2 control-label'))}}
	<div class="col-lg-4">
		{{ Form::password('password2', array('class' => 'form-control')) }}
	</div>
	<div class="error-msg"> 
		{{ $errors->first('password2') }}
	</div>
</div>
<div class="form-group">
	{{ Form::label('email','กรอก email : ', array('class' => 'col-lg-2 control-label'))}}
	<div class="col-lg-4">
		{{ Form::text('email', '', array('class' => 'form-control')) }}
	</div>
	<div class="error-msg"> 
		{{ $errors->first('email') }}
	</div>
</div>
<div class="form-group">
	{{ Form::label('email2','กรอก email2 : ', array('class' => 'col-lg-2 control-label'))}}
	<div class="col-lg-4">
		{{ Form::text('email2', '', array('class' => 'form-control')) }}
	</div>
	<div class="error-msg">	 
		{{ $errors->first('email2') }}
	</div>
</div>
<div class="form-group">
	<div class="col-offset-2 col-lg-10">
		{{ Form::submit('register', array('class' => 'col-lg-2 btn btn-pimary btn-success')) }}
	</div>
</div>
{{ Form::close() }}
@stop