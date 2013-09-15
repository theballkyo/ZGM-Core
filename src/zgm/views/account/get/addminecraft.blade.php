@extends('layouts.member')
@section('content')
@if(!empty($msg_error))
	<div class="alert alert-danger">
		<strong>Error ! </strong> {{ $msg_error }}
	</div>
	<a href="{{ URL::to('account/view') }}" class="btn btn-info">ย้อนกลับ</a>
@else
<h2>เพิ่ม ไอดี Minecraft</h2>

{{ Form::open(array('class' => 'form-horizontal')) }}

<div class="form-group">
	{{ Form::label('username', Lang::get('account.username'), array('class' => 'col-lg-2 control-label')) }}
	<div class="col-lg-4">
	{{ Form::text('username', '', array('class' => 'form-control')) }}   
	</div>
	<div class="error-msg"> 
		{{ $errors->first('username') }}
	</div>
</div><!-- /.form-group -->

<div class="form-group">
	{{ Form::label('password', Lang::get('account.password'), array('class' => 'col-lg-2 control-label')) }}
	<div class="col-lg-4">
	{{ Form::password('password', array('class' => 'form-control')) }}   
	</div>
	<div class="error-msg"> 
		{{ $errors->first('password') }}
	</div>
</div><!-- /.form-group -->

<div class="form-group">
	{{ Form::label('password_confirmation', Lang::get('account.password_confirmation'), array('class' => 'col-lg-2 control-label')) }}
	<div class="col-lg-4">
	{{ Form::password('password_confirmation',  array('class' => 'form-control')) }}   
	</div>
	<div class="error-msg"> 
		{{ $errors->first('password_confirmation') }}
	</div>
</div><!-- /.form-group -->

{{ Form::submit('Register', array('class' => 'btn btn-success col-offset-2 col-lg-4'))}}
{{ Form::close() }}
@endif
@stop